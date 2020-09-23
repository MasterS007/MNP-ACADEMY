<?php

require_once('../../databaseConn/dbCon.php');
function insertLecture($materials)
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

	$sql = "INSERT INTO videoLecture (instructor_id, course_id, lecture_name, dateNtime) VALUES ( '{$materials['instructor_id']}','{$materials['course_id']}','{$materials['linkName']}','{$materials['dateNtime']}')";
	if(mysqli_query($conn, $sql)){
			
			return true;
		}else{
            echo mysqli_error($conn);
			return false;
		}
	mysqli_close($conn);
    }
    
    function showLectures($instructor_id, $course_id)
    {
        $conn = dbConnection();

    if(!$conn){
        echo "DB connection error";
    }

    $sql = "SELECT * FROM videoLecture  Where instructor_id={$instructor_id} AND course_id={$course_id} ORDER BY dateNtime DESC";
    $result = mysqli_query($conn, $sql);
	$courses = [];

    while($row = mysqli_fetch_assoc($result)){
        array_push($courses, $row);
    }

    return $courses;
    mysqli_close($conn);
    }
    ?>