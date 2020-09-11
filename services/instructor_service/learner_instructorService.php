<?php

    require_once("../../databaseConn/dbCon.php");

    function getLearnerId($id) //by instructor id
    {
        $conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

    $sql = "SELECT * FROM `learner_instructor` WHERE instructor_id={$id} ORDER BY course_id";
		$result = mysqli_query($conn, $sql);
        $learners = [];

	 	while($row = mysqli_fetch_assoc($result)){
	 		array_push( $learners, $row);
	 	}
        return  $learners;
        mysqli_close($conn);
    }

    function getByID($id){ //from users table
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from users where id={$id}";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		mysqli_close($conn);
		return $row;
	}
?>