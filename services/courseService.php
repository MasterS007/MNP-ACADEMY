<?php
    
    require_once('../../databaseConn/dbCon.php');
    
   
	function getByCategory($category){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		$sql = "select course_name from all_courses where course_category='$category'";
		$result = mysqli_query($conn, $sql);
        $courses = [];
        while($row = mysqli_fetch_assoc($result)){
            array_push($courses, $row);
            
           
		}
        mysqli_close($conn);
       
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

//INSERT METHOD
	// function insert($course){
	// 	$conn = dbConnection();

	// 	if(!$conn){
	// 		echo "DB connection error";
	// 	}

	// 	$sql = "INSERT INTO all_courses (course_name, course_category) VALUES ()";
	// 	if(mysqli_query($conn, $sql)){

	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// 	  mysqli_close($conn);
	// }


	// function update($user){
	// 	$conn = dbConnection();
	// 	if(!$conn){
	// 		echo "DB connection error";
	// 	}

	// 	$sql = "update users set username='{$user['username']}', password='{$user['password']}', email='{$user['email']}' where id={$user['id']}";

	// 	if(mysqli_query($conn, $sql)){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }

	// function delete($id){
	// 	$conn = dbConnection();
	// 	if(!$conn){
	// 		echo "DB connection error";
	// 	}

	// 	$sql = "DELETE FROM users WHERE id={$id}";

	// 	if(mysqli_query($conn, $sql)){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }
?>