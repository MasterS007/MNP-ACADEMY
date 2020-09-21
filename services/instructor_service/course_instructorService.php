<?php

require_once("../../databaseConn/dbCon.php");

function deleteInstrCourse($insid, $courseId)
{
    $conn = dbConnection();

    if(!$conn){
        echo "DB connection error";
    }
    $sql= "DELETE FROM instructor_course WHERE course_id={$courseId} AND instructor_id={$insid}";

    if(mysqli_query($conn, $sql)){

        return true;
    }else{
        echo "Error:". mysqli_error($conn);
        return false;
    }
        mysqli_close($conn);


}

function courseidget($id)
{
    $conn = dbConnection();

    if(!$conn){
        echo "DB connection error";
    }

    $sql = "SELECT instructor_id from instructor_course Where course_id={$id}";
    $result = mysqli_query($conn, $sql);
	$courses = [];

    while($row = mysqli_fetch_assoc($result)){
        array_push($courses, $row);
    }

    return $courses;
    mysqli_close($conn);
}




function insertIC($data)
{
    $conn = dbConnection();

    if(!$conn){
        echo "DB connection error";
    }

    $sql = "INSERT INTO instructor_course (instructor_id, course_id) VALUES ('{$data['instructor_id']}','{$data['course_id']}')";
    if(mysqli_query($conn, $sql)){

        return true;
    }else{
        return false;
    }
        mysqli_close($conn);
}

function getInsCourse($id)
{
    
    $conn = dbConnection();

    if(!$conn){
        echo "DB connection error";
    }

    $sql = "Select course_id from instructor_course Where instructor_id={$id} order by course_id";
    $result = mysqli_query($conn, $sql);
	$courses = [];

    while($row = mysqli_fetch_assoc($result)){
        array_push($courses, $row);
    }

    return $courses;
    mysqli_close($conn);
}
?>