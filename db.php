<?php
	$host = "localhost"; 
	$username = "root"; 
	$password = "";
	$dbName = "hiragana";
	
	$con = mysqli_connect($host,$username,$password,$dbName);
	if(!$con)
	{
		die("COnnection failed");
	}

?>