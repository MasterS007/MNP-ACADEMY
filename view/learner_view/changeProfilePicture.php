<?php
       session_start();
       require_once('../../services/learner_service/learnerService.php');

       $id= $_SESSION['userid'];
       if(!isset($_SESSION['username'])){  
           header('location: ../login.php?error=invalid_request');
       }

 ?> 


<!DOCTYPE html>
<html>
<head>
	<title>Add company</title>
</head>
<body>

	<form action="" method="post" enctype="multipart/form-data"  >
		<fieldset>
			<legend>Profile Picture </legend>
			<table>
				
                <tr>
					<td>Change Profile Picture </td><br>
					<td><input type="file" name="image"/></td><br>
				</tr>
                <tr>
					
				<tr>
					<td></td>
					<td>
						<input type="submit" name="Upload" value="upload"> 
						<a href="home.php">Back</a>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>