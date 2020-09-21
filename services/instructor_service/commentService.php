<?php

require_once('../../databaseConn/dbCon.php');

function insertComment($commentInfo)
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

	$sql = "INSERT INTO comment_section( status_id, users_id, dateNtime, comments) VALUES ('{$commentInfo['status_id']}','{$commentInfo['users_id']}','{$commentInfo['dateNtime']}','{$commentInfo['comments']}')";
	if(mysqli_query($conn, $sql)){
			
			return true;
		}else{

            echo " ".mysqli_error($conn);
			return false;
		}
	mysqli_close($conn);
    }

    function getAllComments($status_id)
    {
        $conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

	$sql = "SELECT * FROM comment_section WHERE status_id={$status_id} ORDER BY dateNtime DESC";
    $result = mysqli_query($conn, $sql);
    $allstatus=[];
    while($row = mysqli_fetch_assoc($result)){
        array_push($allstatus, $row);
    }

    return $allstatus;
    mysqli_close($conn);


	}
	
	function deleteComment($status_id)
    {
        $conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

     $sql = "DELETE FROM comment_section WHERE status_id={$status_id}";
        if(mysqli_query($conn, $sql)){
			
			return true;
		}else{

            echo " ".mysqli_error($conn);
			return false;
		}
	mysqli_close($conn);
    }
?>