<?php
	require_once('../../databaseConn/dbCon.php');
	
	function updateProfilePic($pic)
	{
	  $conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}

	$sql = "UPDATE instructors SET picture='{$pic['filesName']}' WHERE instructorId='{$pic['instructorId']}'";

		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}
	function getByInstructorName($u_name)
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "SELECT id FROM users WHERE u_name LIKE '%{$u_name}%'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		
		return $row;
		mysqli_close($conn);
	}
	function getInstructorUsername($username, $id){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "SELECT username FROM users WHERE username LIKE '%{$username}%' AND id NOT IN ({$id})";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		
		return $row;
		mysqli_close($conn);
	}

	function getEmail($email, $id)
    {
        $conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

	$sql = "SELECT email FROM users WHERE email LIKE'%{$email}%' AND id NOT IN ({$id})";
		$result = mysqli_query($conn, $sql);
        $userEmail = mysqli_fetch_assoc($result);
        
        return $userEmail;
	}
	

    function getByInstructorsID($id){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from users where id={$id}";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);

		//echo "".mysql_error($conn);
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