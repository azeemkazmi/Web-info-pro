<?php
session_start();
	if(isset($_SESSION['user']))
	{
		header("location:./index.php");
	}
	include("db.php");
	$name = $_POST['txtSignupName'];
	$password = $_POST['txtSignupPassword'];
	
	$sql = "insert into user (name,password) values ('$name','$password')";
	$query = mysqli_query($con,$sql);
	
	if($query == true)
	{
		header("location:login.php");
	} else {
		echo mysqli_error($con);
	}
	mysqli_close($con);
?>