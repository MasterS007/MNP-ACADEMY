<?php

require_once('../../databaseConn/dbCon.php');

function insertPost($statusInfo)
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

	$sql = "INSERT INTO post_status (users_id, status_topic, dateNtime,course_id) VALUES ('{$statusInfo['users_id']}','{$statusInfo['status_topic']}','{$statusInfo['dateNtime']}','{$statusInfo['course_id']}')";
	if(mysqli_query($conn, $sql)){
			
			return true;
		}else{

            echo " ".mysqli_error($conn);
			return false;
		}
	mysqli_close($conn);
    }

    function showPost($id)
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

	$sql = "SELECT * FROM post_status WHERE users_id={$id} ORDER BY dateNtime DESC";
    $result = mysqli_query($conn, $sql);
    $allstatus=[];
    while($row = mysqli_fetch_assoc($result)){
        array_push($allstatus, $row);
    }

    return $allstatus;
    mysqli_close($conn);
    }

    function deleteStatus($status_id)
    {
        $conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

     $sql = "DELETE FROM post_status WHERE status_id={$status_id}";
        if(mysqli_query($conn, $sql)){
			
			return true;
		}else{

            echo " ".mysqli_error($conn);
			return false;
		}
	mysqli_close($conn);
    }

?>