<?php
	require_once('../../db/db.php');

	function getByID($id){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from about_us where id={$id}";
        $result = mysqli_query($conn, $sql);
        $data="<table>
                <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr>";
		while($row = mysqli_fetch_assoc($result)){
            $data .="<tr>
                 <td>{$row['Id']}</td>
                <td>{$row['Title']}</td>
                <td>{$row['sub title']}</td>
                <td>{$row['Description']}</td>
                <td>Action</td>
                </tr>";
        }
        $data .="</table>";
        echo $data;
    }
       
?>