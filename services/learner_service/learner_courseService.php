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


function getMyCourse()
{
	$conn = dbConnection();

    if(!$conn){
        echo "DB connection error";
    }
  
	
    $sql = "select * from learner_instructor ";
	$result = mysqli_query($conn, $sql);
	$courses = [];
	while($row = mysqli_fetch_assoc($result)){
		array_push($courses, $row);
		
	   
	}
	mysqli_close($conn);
   
	return $courses;
}

function getInstructorCourse($id)
{
	$conn = dbConnection();

    if(!$conn){
        echo "DB connection error";
    }
  
	

    $sql = "select users.u_name,users.id, all_courses.course_name, all_courses.course_id from learner_instructor join users join all_courses on learner_instructor.instructor_id=users.id and all_courses.course_id=learner_instructor.course_id where learner_instructor.learner_id='{$id}' ";

	$result = mysqli_query($conn, $sql);
	$courses = [];
	while($row = mysqli_fetch_assoc($result)){
		array_push($courses, $row);
		
	   
	}
	mysqli_close($conn);
   
	return $courses;
}


	
	?>