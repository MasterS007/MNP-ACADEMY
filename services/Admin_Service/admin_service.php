<?php
	require_once('../../databaseConn/dbCon.php');

	
	function getAllAdmin(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from users where user_type='Admin'";
		$result = mysqli_query($conn, $sql);
		$allAdmin=[];

		while($row = mysqli_fetch_assoc($result))
		{
			array_push($allAdmin,$row);
		}
		
		return $allAdmin;
	}
	function getAllLearner(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from users where user_type='Learner'";
		$result = mysqli_query($conn, $sql);
		$allLearner=[];

		while($row = mysqli_fetch_assoc($result))
		{
			array_push($allLearner,$row);
		}
		
		return $allLearner;
	}

	function getAllInstructor(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from users where user_type='Instructor'";
		$result = mysqli_query($conn, $sql);
		$allInstructor=[];

		while($row = mysqli_fetch_assoc($result))
		{
			array_push($allInstructor,$row);
		}
		
		return $allInstructor;
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
		
	function getUsername($username, $id){
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

	function admin_update($user){
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}
	
		$sql = "UPDATE users SET u_name='{$user['nameU']}', username='{$user['uname']}', u_password='{$user['password']}', email='{$user['email']}' where id={$user['adminId']}";
	
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}


	function getAllFromAdmin($id){
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

	function deleteByusername($u_name){   // Admin account delete by name 
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}

		$sql = "DELETE FROM users WHERE u_name='{$u_name}'";

		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

	
	