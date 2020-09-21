<?php
	   session_start();
	   require_once("../../services/Admin_Service/admin_service.php");
       if(!isset($_SESSION['username'])){
   
           header('location: ../login.php?error=invalid_request');
       }

 ?>  
<!DOCTYPE html>
<html>
<head>
		<meta charset = "UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../../asset/all_designs/Admin_designs/addAdmin.css">
        <script type="text/javascript" src="../../asset/js/Admin_js/add_admin.js"></script>
		<title>
            MY Page
		</title>
</head>
<body>
    <header>
        <p class="logo">MNP ACADEMY</p>
		<nav>
			<ul class="nav-links">
				<li><a href="#">Home</a></li>
				<li><a href="AboutView.php">About</a></li>
				<li><a href="#">Service</a></li>
			</ul>
		</nav>
		<nav>
			<ul class="nav-links">
			<a  href="#"></a>
			<a  href="#"><button>logout</button></a>
			</ul>
            </nav>
    </header>
    <main>
		<div class="Gridviewdiv">
			<ul>
			<li>Welcome <?php echo $_SESSION['name'];?></li>
				<li><a href="#">Dashboard</a></li>
				<li><a href="Add_Admin">Admin Profile</a></li>
				<li>Manage Users</li>
				<li>Courses</li>
				<li>Learners</li>
				<li><a href="about_us.php">About Us</a></li>
				<li><a href="Manage_Blog.php">Manage Blog</a></li>
				
			</ul>

		</div>
		<div class="Gridviewdiv" >
			
			<div class="button_div">
					
					<input type="button" name="Admin_Profile" style="cursor:pointer;" class="button" value="Admin Profile">
					<input type="button" name="Add_New_Admin" style="cursor:pointer;" id="add_admin" class="button"  value="Add New Admin" onclick="add_admin_popup_open()">
					<input type="button" name="View_Admin_List" style="cursor:pointer;" class="button"value="View Admin List" onclick="view_admin_popup_open()">

		</div>
					
		<div class= "bg-modal_view"  id="bg-modal_view">
			<div class = "modal-content_view">
				<div class="close" onclick="view_admin_popup_close()">+</div>
				<div>
					<table border= "1px" class="Table" >
						<tr>
							<th>Admin Id</th>
							<th>Admin Name</th>
							<th>User Name</th>
							<th>Password</th>
							<th>Email</th>
							<th>Gender</th>
							<th>Date Of Birth</th>
							<th>Actions</th>
							</tr>
							<?php
							$allAdmin=getAllAdmin();
							for($i=0; $i<count($allAdmin); $i++)
							{
						    ?>
							<tr>
							   <td><?=$allAdmin[$i]['id']?></td>
							   <td><?=$allAdmin[$i]['u_name']?></td>
							   <td><?=$allAdmin[$i]['username']?></td>
							   <td><?=$allAdmin[$i]['u_password']?></td>
							   <td><?=$allAdmin[$i]['email']?></td>
							   <td><?=$allAdmin[$i]['gender']?></td>
							   <td><?=$allAdmin[$i]['date_of_birth']?></td>
							   <td> <a href="#">Edit></a>
							   <a href="#">Delete></a>
							</td>
							</tr><?php
							}?>
							
							
					</table>
				</div>
			</div>
		</div>

		<div class= "bg-modal"  id="bg-modal">
			<div class = "modal-content">
				<div class="close" onclick="add_admin_popup_close()">+</div>
		`	<form action="../../php/add_admin.php" onsubmit=return validation() method="post">
					<table class="table1" cellpadding="0" cellspacing="0">
						<tr>
							<td>Name</td>
							<td>:</td>
							<td><input id="name" name="name" type="text" onkeyup="nRemover()" onblur="neMpty()"></td>
							<td><i  id="nameMsg" style="color:white; font-size: 10px;"></i></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td>
								<input type="text" id="email" name="email"  onkeyup="eRemover()" onblur="eEMpty()">
								<abbr title="hint: sample@example.com"><b>i</b></abbr>
							</td>
							<td ><i id="emailMsg" style="color:white;font-size: 10px; white-space: pre;"  ></i></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>User Name</td>
							<td>:</td>
							<td><input id="uname" name="userName" type="text" onkeyup="uRemover()" onblur="ueMpty()"></td>
							<td><i id="unameMsg"  style="color:white;font-size: 10px;"></i></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Password</td>
							<td>:</td>
							<td><input id="password" name="password" type="password" onkeyup="pRemover()" onblur="PeMpty()"></td>
							<td><i id="passMsg" style="color:white; font-size: 10px;"></i></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Confirm Password</td>
							<td>:</td>
							<td><input id="conpassword" name="confirmPassword" type="password" onkeyup="pconRemover()" onblur="PconeMpty()"></td>
							<td><i id="conpassMsg" style="color:white; font-size: 10px;"></i></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td colspan="3">
								<fieldset class="innerField">
									<legend class="innerLegend">Gender</legend>    
											<input  name="gender" id="Male" type="radio" value="Male" onclick="gRemover()"  onmouseout="geMpty()">Male
											<input  name="gender" id="Female"  type="radio" value="Female" onclick="gRemover()"  onmouseout="geMpty()">Female
											<input  name="gender" id="Other" type="radio" value="Other" onclick="gRemover()"  onmouseout="geMpty()">Other
								</fieldset>
							</td>
							<td ><i id="genderMsg" style="color:white; font-size: 9px;"></i></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td colspan="3">
								<fieldset class="innerField">
									<legend class="innerLegend">Date of Birth</legend>    
									<input id="date" type="text" size="2" name="date" onkeyup="dRemover()" onblur="deMpty()" onclick="dRemover()" />/
									<input id="month" type="text" size="2" name ="month" onkeyup="dRemover()" onblur="deMpty()" onclick="dRemover()"/>/
									<input id="year" type="text" size="4" name = "year" onkeyup="dRemover()" onblur="deMpty()" onclick="dRemover()"/>
									<font size="2"><i>(dd/mm/yyyy)</i></font>
								</fieldset>
							</td>
							<td ><i id="dobMsg" style="color:white; font-size: 10px;"></i></td>
						</tr>
						<tr>
							<td colspan="4"><hr>	
							</td>
						</tr>	
					 </table>
                	  <input type="submit"  name="submit" value="Submit" class="Submitbtn" >
            		</form>                           
                 </div>               
            </div>              
     </main>
</body>
</html>