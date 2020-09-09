<?php

    require_once("../../databaseConn/dbCon.php");

    function getLearnerId() //by instructor id
    {
        $conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from learner_instructor where instructor_id={$id}";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
        mysqli_close($conn);
        $learners = [];

	 	while($row = mysqli_fetch_assoc($result)){
	 		array_push( $learners, $row);
	 	}
		return  $learners;
    }
?>