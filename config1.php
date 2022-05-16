<?php
$servername = "localhost";
$username1 = "root";
$password1 = "";
$db = "ecommerce";
// Create connection
$con = mysqli_connect($servername, $username1, $password1,$db);

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
?>