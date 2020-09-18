<?php
       session_start();
       require_once('../../services/learner_service/EditProfileService.php');

       $id= $_SESSION['userid'];
       if(!isset($_SESSION['username'])){  
           header('location: ../login.php?error=invalid_request');
       }

 ?> 

<!DOCTYPE html>
<html>
<head>
    <title>Profile Page</title>
    
    <link rel="stylesheet" type="text/css" href="../../asset/all_designs/learner_designs/learner_Profile.css">

    <script type="text/javascript" src="../../asset/js/learner_js/learnerProfile.js"></script>
    <!-- <script type="test/javascript" src="../../asset/js//learner_js/learnerProfile.js">   </script> -->
    
   
</head>


<body>
    <header>
        <div class="left_area" >
            <h3> MNP <span>ACADEMY</span> </h3>  
          </div>
        <nav>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Forum</a></li>
            
            </ul>
        </nav>
        <nav>
            <ul class="nav-links">
           
            <div class="right_area"> 
                <a href="#" class="logout_btn">Logout</a>
            </div>
           </ul>
    </nav>
    </header>
<div class ="card-container ">

<div class ="bg-modal" id="bg-modal">

       <div class="modal-content" >
           <div class="close" onclick="edit_popup_close()">+</div>
       
           <form action="../../php/learner_php/edit_learner_profile.php" onsubmit=return validation() method="post">
					<table cellpadding="9"  style="color:white" cellspacing="0">
						<tr>
                            
							<td>Name</td>
                            <td>:</td>
                           
							<td><input id="name" name="name"  type="text" onkeyup="nRemover()" onblur="neMpty()"></td>
							<td><i  id="nameMsg" style="color:white; font-size: 10px;"></i></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td>
								<input type="text" id="email"  name="email"  onkeyup="eRemover()" onblur="eEMpty()">
								<abbr title="hint: sample@example.com"><b>i</b></abbr>
							</td>
							<td ><i id="emailMsg" style="color:white;font-size: 10px; white-space: pre;"  ></i></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>User Name</td>
							<td>:</td>
							<td><input id="uname" name="userName" type="text"  onkeyup="uRemover()" onblur="ueMpty()"></td>
							<td><i id="unameMsg"  style="color:white;font-size: 10px;"></i></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Password</td>
							<td>:</td>
							<td><input id="password" name="password" type="password" value=" onkeyup="pRemover()" onblur="PeMpty()"></td>
							<td><i id="passMsg" style="color:white; font-size: 10px;"></i></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Confirm Password</td>
							<td>:</td>
							<td><input id="conpassword" name="confirmPassword" type="password"  onkeyup="pconRemover()" onblur="PconeMpty()"></td>
							<td><i id="conpassMsg" style="color:white; font-size: 10px;"></i></td>
                        </tr>
                        <tr>
							<td></td>
							<td>:</td>
							<td><input  type="hidden"  ></td>
							<td></td>
						</tr>		
						
							<td colspan="4"><hr>	
							</td>
						</tr>	
					 </table>
                	  <input type="submit"  name="edit" value="Submit" class="Submitbtn" >
            		</form>    
           
       </div>
    
    
    </div>


    
    <div class="upper-container">
        <div class ="image-container ">

           <img src="1.jpg" />

        </div>
    </div>
   
    <div class="lower-container">
      

        <div>
        <h3> Nila</h3> 
        <h4>Username :nila1313</h4>

        <h5>CSE Student</h5>
        <h5>Email Adress :chaity13x@gmail.com</h5>

        
        </div>

        <div>
        <p>Please insert your bio</p>

        </div>

        <div>
            <a href ="#" class="btn1"> Course Taken</a>
    
        </div>
       

      


    </div>
    <div class="lower-container">
        <input type="button" class="btn " name="" style="cursor:pointer;"   value="Edit Profile" onclick="edit_popup_open()">
        
        <a href ="dashboard.php" class="btn"> Go Back </a>


    </div>
    

    


    

</div>  
  
    
</body>
</html>