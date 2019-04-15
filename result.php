<?php
	session_start();
	include("db.php");
		 $userIdSession = $_POST['userIdSession'];
		 $counterAns = $_POST['counterAns'];
		$sql = "insert into result (userId,correctAnswers) values ('$userIdSession','$counterAns')";
		$query = mysqli_query($con,$sql);
		
		if($query == true)
		{
			echo 1;
		} else {
			echo 2;
		}
		mysqli_close($con);
 
	

?>