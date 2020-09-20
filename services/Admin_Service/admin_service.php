<?php
	require_once('../../databaseConn/dbCon.php');

	function getAllAdmin(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from users where user_type='Admin'";
		$result = mysqli_query($conn, $sql);
		$allAdmin=[];

		while($row = mysqli_fetch_assoc($result))
		{
			array_push($allAdmin,$row);
		}
		
		return $allAdmin;
	}
	function getAllLearner(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from users where user_type='Learner'";
		$result = mysqli_query($conn, $sql);
		$allLearner=[];

		while($row = mysqli_fetch_assoc($result))
		{
			array_push($allLearner,$row);
		}
		
		return $allLearner;
	}

	function getAllInstructor(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from users where user_type='Instructor'";
		$result = mysqli_query($conn, $sql);
		$allInstructor=[];

		while($row = mysqli_fetch_assoc($result))
		{
			array_push($allInstructor,$row);
		}
		
		return $allInstructor;
	}
	
	