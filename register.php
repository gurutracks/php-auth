<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>User Registration</title>
</head>
<body>
    <h1>User Registration Form</h1>
    <!-- HTML form for user input. Form submits to itself to execute PHP code bellow -->
    <form action="<?php ($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="form_username">User Name</label>
        <input type="text" id="form_username" name="form_username" required>
        <label for="form_password">Password</label>
        <input type="password" id="form_password" name="form_password" required>
        <label for="form_email">Email</label>
        <input type="email" id="form_email" name="form_email" required>
        <input type="submit">
        <h4>Already have Account? <a href=login.php>Login</a></h4>
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
        //$input_password = $_POST["form_password"];
        $input_password = password_hash($_POST["form_password"], PASSWORD_DEFAULT);
        $input_email = $_POST["form_email"];

        $sql = "Select * from auth_table where username='$input_username'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) == 1) {
            echo "<h4>This username already exists. Please choose another username.</h4>";
        } else {
            // Insert the variables's data into table
            $sql = "INSERT INTO auth_table (username, password, email)
            VALUES ('$input_username', '$input_password', '$input_email')";

            // Execute the query
            if(mysqli_query($conn, $sql)){
                // On success, redirect to landing page
                header("location: login.php");
                //echo "Done.";
                exit();
            } else{
                // If faild, throw an error
                echo "<h3>Something went wrong. Please try again later.</h3>";
            }

        }
    }
// Close mysql connection
mysqli_close($conn);
?>