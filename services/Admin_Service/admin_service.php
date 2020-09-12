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