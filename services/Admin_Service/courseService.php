<?php
    
    require_once('../../databaseConn/dbCon.php');

	

	function getInstructor($course_id){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		

		$sql = "select * from learner_instructor where course_id={$course_id}";
		$result = mysqli_query($conn, $sql);
		$allInstructor=[];

		while($row = mysqli_fetch_assoc($result))
		{
			array_push($allInstructor,$row);
		}
		// echo Mysql_error($conn);
		
		return $allInstructor;
	}


?>