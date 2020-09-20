<?php
require_once('../../databaseConn/dbCon.php');
    
   
function insertCourses($course){
    $conn = dbConnection();

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

?>