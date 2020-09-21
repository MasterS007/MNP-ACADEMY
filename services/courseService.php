<?php
    
    require_once('../../databaseConn/dbCon.php');
    

	function deleteByCoursename($course_name){
			$conn = dbConnection();
			if(!$conn){
				echo "DB connection error";
			}
	
			$sql = "DELETE FROM all_courses WHERE course_name='{$course_name}'";
	
			if(mysqli_query($conn, $sql)){
				return true;
			}else{
				return false;
			}
		}

function insertCourses($course){
    $conn = dbConnection();
	//echo $course['course_name'];
    if(!$conn){
        echo "DB connection error";
    }
    $sql = "INSERT INTO all_courses (course_name, course_category) VALUES ('{$course['course_name']}','{$course['course_category']}')";
    if(mysqli_query($conn, $sql)){
			
        return true;
    }else{
        return false;
    }
      mysqli_close($conn);
}

	function getByCategory($category){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		$sql = "select * from all_courses where course_category='$category'";
		$result = mysqli_query($conn, $sql);
        $courses = [];
        while($row = mysqli_fetch_assoc($result)){
            array_push($courses, $row);
            
           
		}
        mysqli_close($conn);
       
		return $courses;
    }

	function getAllCategory()
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from course_category";
		$result = mysqli_query($conn, $sql);
		$courses = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($courses, $row);
		}

		return $courses;
	}
	function getAllCourse(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from all_courses order by course_category";
		$result = mysqli_query($conn, $sql);
		$courses = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($courses, $row);
		}

		return $courses;
	}

	function getByCourseName($courseName){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select *  from all_courses where course_name like '%{$courseName}%' ";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getByCourseId($course_id){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select *  from all_courses where course_id={$course_id} ";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

?>