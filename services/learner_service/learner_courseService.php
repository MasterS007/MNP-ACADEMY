<?php

require_once("../../databaseConn/dbCon.php");

function insertCourse($infoCourse)
{
    $conn = dbConnection();

    if(!$conn){
        echo "DB connection error";
    }

    $sql = "INSERT INTO learner_instructor (instructor_id, course_id, learner_id) VALUES ('{$infoCourse['instructor_id']}','{$infoCourse['course_id']}','{$infoCourse['learner_id']}')";
		if(mysqli_query($conn, $sql)){
			
			return true;
		}else{
			return false;
		}
		  mysqli_close($conn);



}


?>