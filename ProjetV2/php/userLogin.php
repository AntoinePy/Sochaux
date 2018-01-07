<?php

$login=$_GET['l'];
$password=$_GET['p'];
$con = mysqli_connect('localhost','root','','fcsochaux');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"fcsochaux");
$sql="SELECT UserName, UserPassword FROM users WHERE UserName = '".$login."' AND UserPassword = '".$password."'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
if (isset($row[0])) {
	session_start();
	$_SESSION['login']=$login;
	header('Location: ../index.php');
}
else{
	header('Location: ../login.php');
}
mysqli_close($con);
?>