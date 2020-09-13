<?php
	require_once('../../databaseConn/dbCon.php');

	function getScienceCourses(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from all_courses where course_catagory=='Science'";
		$result = mysqli_query($conn, $sql);
		$science=[];

		while($row = mysqli_fetch_assoc($result))
		{
			array_push($science,$row);
		}
		
		return $science;
	}