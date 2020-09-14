<?php

require_once('../../databaseConn/dbCon.php');

function deleteFile($itemName)
{
    $conn = dbConnection();

    if(!$conn){
        echo "DB connection error";
    }
    $sql = "DELETE FROM class_materials  Where items_name='{$itemName}'";
    if(mysqli_query($conn, $sql)){
			
        return true;
    }else{
        return false;
    }
     mysqli_close($conn);
}

function getCourseMaterialInfo($itemName)
{
    $conn = dbConnection();

    if(!$conn){
        echo "DB connection error";
    }
    $sql = "SELECT * FROM class_materials  Where items_name='{$itemName}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($conn);

    return $row;

    

}
function getCourseMaterial($id, $courseId) //by course id and instructor id
{
    $conn = dbConnection();

    if(!$conn){
        echo "DB connection error";
    }

    $sql = "SELECT * FROM class_materials  Where instructor_id={$id} AND course_id={$courseId} ORDER BY items_name DESC";
    $result = mysqli_query($conn, $sql);
	$courses = [];

    while($row = mysqli_fetch_assoc($result)){
        array_push($courses, $row);
    }

    return $courses;
    mysqli_close($conn);

}
function insertCourseMaterial($materials)
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

	$sql = "INSERT INTO class_materials (items_name, instructor_id, course_id) VALUES ('{$materials['filesName']}', '{$materials['instructorId']}','{$materials['courseId']}')";
	if(mysqli_query($conn, $sql)){
			
			return true;
		}else{
			return false;
		}
	mysqli_close($conn);
    }
    
    ?>