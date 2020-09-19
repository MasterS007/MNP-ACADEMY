<?php
	require_once('../../databaseConn/dbCon.php');
	
	

	//get users(instructor)
    function getByID($id){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from users where id={$id}";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		mysqli_close($conn);
		return $row;
	}


	function getAllFromInst($id){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from instructors where id={$id}";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		mysqli_close($conn);
		return $row;
	}

	// function getAllUser(){
	// 	$conn = dbConnection();

	// 	if(!$conn){
	// 		echo "DB connection error";
	// 	}

	// 	$sql = "select * from users";
	// 	$result = mysqli_query($conn, $sql);
	// 	$users = [];

	// 	while($row = mysqli_fetch_assoc($result)){
	// 		array_push($users, $row);
	// 	}

	// 	return $users;
    // }
	
function Instructor_update($user){
	$conn = dbConnection();
	if(!$conn){
		echo "DB connection error";
	}

	$sql = "UPDATE users SET u_name='{$user['nameU']}', username='{$user['uname']}', u_password='{$user['password']}', email='{$user['email']}' where id={$user['instructorId']}";

	if(mysqli_query($conn, $sql)){
		return true;
	}else{
		return false;
	}
}


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