<?php
$mysql_server = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_db_name = "auth_db";

// Create connection with mysql
$conn = mysqli_connect($mysql_server, $mysql_user, $mysql_password, $mysql_db_name);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }