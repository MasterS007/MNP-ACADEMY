<?php

require_once('../../databaseConn/dbCon.php');

function deleteMaterialByCourseId($course_id)
{
    $conn = dbConnection();

    if(!$conn){
        echo "DB connection error";
    }
    $sql = "DELETE FROM class_materials  Where course_id = {$course_id}";
    if(mysqli_query($conn, $sql)){
			
        return true;
    }else{
        return false;
    }
     mysqli_close($conn);

}
function deleteMaterials($instructorId, $courseId) //by course id and instructor id
{
    $conn = dbConnection();

    if(!$conn){
        echo "DB connection error";
    }
    $sql = "DELETE FROM class_materials  Where course_id = {$courseId}  AND instructor_id={$instructorId}";
    if(mysqli_query($conn, $sql)){
			
        return true;
    }else{
        return false;
    }
     mysqli_close($conn);
}


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

    $sql = "SELECT * FROM class_materials  Where instructor_id={$id} AND course_id={$courseId} ORDER BY dateNtime DESC";
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

	$sql = "INSERT INTO class_materials (items_name, instructor_id, course_id, dateNtime) VALUES ('{$materials['filesName']}', '{$materials['instructorId']}','{$materials['courseId']}','{$materials['dateNtime']}')";
	if(mysqli_query($conn, $sql)){
			
			return true;
		}else{
			return false;
		}
	mysqli_close($conn);
    }
    
    ?>