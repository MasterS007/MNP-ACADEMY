<?php

require_once('../../databaseConn/dbCon.php');

function insertLearnerAssignment() 
{
    $conn = dbConnection();

    if(!$conn){
        echo "DB connection error";
    }

    $sql = "INSERT INTO learner_instructor (instructor_id, course_id, learner_id) VALUES ('{$infoCourse['instructor_id']}','{$infoCourse['course_id']}','{$infoCourse['learner_id']}')";
		if(mysqli_query($conn, $sql)){
			
			return true;
		}else{

			echo "".mysqli_error($conn);
			return false;
		}
		  mysqli_close($conn);
}

function showLearnerAssignment($courseid,$learner_id) //ByCourseId and question_id
{
	$conn = dbConnection();

    if(!$conn){
        echo "DB connection error";
	}
	
$sql = "SELECT * FROM learner_assignment  Where course_id={$courseid} AND learner_id={$learner_id}";
    $result = mysqli_query($conn, $sql);
	$courses = [];

    while($row = mysqli_fetch_assoc($result)){
        array_push($courses, $row);
    }

    return $courses;
    mysqli_close($conn);

}


?>