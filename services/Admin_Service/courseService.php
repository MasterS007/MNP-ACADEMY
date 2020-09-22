<?php
    
    require_once('../../databaseConn/dbCon.php');

	function getInstructor($course_id){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select users.u_name, all_courses.course_name from learner_instructor join users join all_courses on learner_instructor.instructor_id=users.id and all_courses.course_id=learner_instructor.course_id where learner_instructor.course_id='$course_id'";
		$result = mysqli_query($conn, $sql);
		$courses = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($courses, $row);
		}

		return $courses;
	}




	

?>