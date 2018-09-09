<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
$username=$_POST['username'];
$password=$_POST['password'];
$connection = mysqli_connect("localhost", "root", "","dbms_project");
$username = stripslashes($username);
$password = stripslashes($password);
//$username = mysqli_real_escape_string($username);
//$password = mysqli_real_escape_string($password);
$query = "select * from login1 where pwd='".$password."' AND userid='".$username."';";
$rows = $connection->query($query);
$value=mysqli_num_rows($rows);

if ($value == 1) {
$_SESSION['login_user']=$username;
header("location: index1.html");
} else {
$error = "Username or Password is invalid";
}
$connection->close();
}
}
?>
