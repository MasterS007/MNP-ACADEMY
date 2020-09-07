<?php
	require_once('../../databaseConn/dbCon.php');
    
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
	function update($user){
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}

		$sql = "update users set username='{$user['username']}', password='{$user['password']}', email='{$user['email']}' where id={$user['id']}";

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