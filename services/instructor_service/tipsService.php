<?php

function getAllTipas()
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from instructors_tips";
		$result = mysqli_query($conn, $sql);
		$courses = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($courses, $row);
		}

		return $courses;
	}

?>