<?php
       session_start();
       require_once('../../services/learner_service/learnerService.php');

       $id= $_SESSION['userid'];
       if(!isset($_COOKIE['username']) ){  
           header('location: ../login.php?error=invalid_request');
       }

 ?> 

<!DOCTYPE html>
<html>
<head>
   
    
    <link rel="stylesheet" type="text/css" href="../../asset/all_designs/learner_designs/learner_Profile.css">

    <script type="text/javascript" src="../../asset/js/learner_js/editProfile.js"></script>
    <title>Profile Page</title>
   
</head>


<body >
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
       
           <form action="" method="post">
               <input type="text" id="learnerid" value="<?=$id?>" style="display:none;">
					<table cellpadding="9"  style="color:white" cellspacing="0">
                      
                    <?php

                        $learnersInfo = getById($id);
                        ?> 
						<tr>
							<td>Name</td>
                            <td>:</td>
                           
							<td><input type="text" id="lname" name="name" value="<?=$learnersInfo['u_name']?>"  onkeyup="nRemover()" onblur="neMpty()"></td>
							<td><i  id="nameMsg" style="color:white; font-size: 10px;"></i></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td>
								<input type="text" id="email"  name="email" value="<?=$learnersInfo['email']?>"  onkeyup="eRemover()" onblur="eEMpty()">
								<abbr title="hint: sample@example.com"><b>i</b></abbr>
							</td>
							<td ><i id="emailMsg" style="color:white;font-size: 10px; white-space: pre;"  ></i></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>User Name</td>
							<td>:</td>
							<td><input type="text"  id="username" name="userName" value="<?=$learnersInfo['username']?>"  onkeyup="uRemover()" onblur="ueMpty()"></td>
							<td><i id="unameMsg"  style="color:white;font-size: 10px;"></i></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>New Password</td>
							<td>:</td>
							<td><input type="password"  id="password" name="password" onkeyup="pRemover()" onblur="PeMpty()"></td>
							<td><i id="passMsg" style="color:white; font-size: 10px;"></i></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Confirm Password</td>
							<td>:</td>
							<td><input type="password"  id="conpassword" name="confirmPassword"  onkeyup="pconRemover()" onblur="PconeMpty()"></td>
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
                	  <input type="button"  name="edit" value="Submit" class="Submitbtn" onclick="profileEdit()" >
            		</form>    
           
       </div>
    </div>


    
    <div class="upper-container">
        <div class ="image-container ">

           <img src="1.jpg" />

        </div>
    </div>
   
    <div class="lower-container">
      
    <?php

        $learnersInfo = getById($id);
    ?>  
        <div>
        <h2><?=$learnersInfo['u_name']?></h2> 
        <h4>Username:<?=$learnersInfo['username']?></h4>
        <h4  style="color:#666;" >Email:<?=$learnersInfo['email']?></h4>
        <h5 style="color:#666; font-weight:bold;">Gender:<?=$learnersInfo['gender']?></h5>
        <h5 style="color:#666; font-weight:bold;">Date Of Birth :<?=$learnersInfo['date_of_birth']?></h5>

        
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