

<?php
	require_once('../../databaseConn/dbCon.php');
	function getUsername($username){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select username from users where username like '%{$username}%'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		mysqli_close($conn);
		return $row;
	}

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



function Learner_update($user){
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}

		$sql = "UPDATE users SET u_name='{$user['nameU']}', username='{$user['uname']}', u_password='{$user['password']}', email='{$user['email']}' where id={$user['learnerId']}";

		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
    }
    
    
?>