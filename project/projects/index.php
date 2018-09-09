<?php
include('login.php');

if(isset($_SESSION['login_user'])){
header("location: index1.html");
}
?>
<!DOCTYPE html>
<html>
<head>
<title >login</title>
<link  rel="stylesheet" href="styles.css">
</head>
<body >
  <div id="header">
    <img src="logo.jpg" >
  <b><h1>COLLEGE DATABASE MANAGEMENT </h1></b>
  <a href="contacts.php">Contact us</a>
  </div>
  <div id="conten">
<div id="main"><br>
<b><h1>ADMINISTRATION LOGIN</h1></b>
<div id="login">
<u><h2>Login Form</h2></u>
<form action="" method="post">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<br><br>
<input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</div>
</body>
</html>
