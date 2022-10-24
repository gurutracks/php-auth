<?php
echo "<style>";
include('styles.css');
echo "</style>";

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: login.php");
    exit;
}

echo "<h2>Welcome " . $_SESSION['username'] . "</h2>";
?>

<div style="text-align:center">
<a href=pass_reset.php><button>Change Password</button></a>&nbsp;
<a href=logout.php><button>Sign Out</button></a>
</div>