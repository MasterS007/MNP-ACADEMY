<?php

require_once('../../databaseConn/dbCon.php');

function insertIC($data)
{
    $conn = dbConnection();

    if(!$conn){
        echo "DB connection error";
    }

    $sql = "INSERT INTO instructor_course (instructor_id, course_id) VALUES ('{$data['instructor_id']}','{$data['instructor_id']}')";
    if(mysqli_query($conn, $sql)){

        return true;
    }else{
        return false;
    }
        mysqli_close($conn);
}
?>