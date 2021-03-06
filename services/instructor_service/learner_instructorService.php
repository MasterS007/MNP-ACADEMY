<?php

    require_once("../../databaseConn/dbCon.php");

	function deleteLearnerByCourseId($course_id)
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

	   $sql = "DELETE FROM learner_instructor WHERE  course_id = {$course_id}";
		if(mysqli_query($conn, $sql)){

			return true;
		}else{
			return false;
		}
			mysqli_close($conn);
	}
	
	function deleteLearnerInstructor($instructorId, $learnerId, $courseId)
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

	   $sql = "DELETE FROM learner_instructor WHERE instructor_id={$instructorId} AND course_id = {$courseId} AND learner_id={$learnerId}";
		if(mysqli_query($conn, $sql)){

			return true;
		}else{
			return false;
		}
			mysqli_close($conn);
	}
	function showLearners($id, $course) //by instructor _id and corse_name
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

        $sql = "SELECT learner_id FROM learner_instructor WHERE instructor_id={$id} AND course_id = 
		(SELECT course_id FROM all_courses WHERE course_name ='{$course}')";
		$result = mysqli_query($conn, $sql);
        $learners = [];

	 	while($row = mysqli_fetch_assoc($result)){
	 		array_push( $learners, $row);
	 	}
        return  $learners;
        mysqli_close($conn);

	}
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

    function getByLearnerID($id){ //from users table
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from users where id={$id}";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		
		return $row;
		mysqli_close($conn);
	}
?>