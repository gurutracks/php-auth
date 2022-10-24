<?php
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    header("location: index.php");
    exit;
}
?>

<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>User Login</title>
</head>
<body>
    <h1>User Login Form</h1>
    <!-- HTML form for user input. Form submits to itself to execute PHP code bellow -->
    <form action="<?php ($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="form_username">User Name</label>
        <input type="text" id="form_username" name="form_username">
        <label for="form_password">Password</label>
        <input type="password" id="form_password" name="form_password">
        <input type="submit" value="Login">
        <h4>No Account? <a href=register.php>Signup for an Account</a></h4>
    </form>
</body>
</html>

<?php  
    // Include the config file
    include('config.php');

    // If form submits and method is POST
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Get form session variables
        $input_username = $_POST["form_username"];
        $input_password = $_POST["form_password"];

        $sql = "Select * from auth_table where username='$input_username'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) == 1) {
            while($row=mysqli_fetch_assoc($result)){
                if (password_verify($input_password, $row['password'])){ 
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $input_username;
                    header("location: index.php"); 
                } 
                else{
                    echo "<h3>Invalid Password</h3>";
                }
            }
        } 
        else{
            echo "<h3>Invalid User</h3>";
        }
    }

// Close mysql connection
mysqli_close($conn);
?>