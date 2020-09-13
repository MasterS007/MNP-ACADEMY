<?php
	require_once('../../databaseConn/dbCon.php');

	function getAboutUs(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from about_us";
		$result = mysqli_query($conn, $sql);
		$aboutUs=[];

		while($row = mysqli_fetch_assoc($result))
		{
			array_push($aboutUs,$row);
		}
		
		return $aboutUs;
	}




	function getSubTitle($sub_Title_Id)
    {
        $conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select SubTitle from about_us where SubTitle like '%{$sub_Title_Id}%'";
		$result = mysqli_query($conn, $sql);
        $SubTitle = mysqli_fetch_assoc($result);
        
        return $SubTitle;
	}