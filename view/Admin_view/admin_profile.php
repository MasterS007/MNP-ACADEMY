<?php
  session_start();
  require_once('../../services/Admin_Service/admin_service.php');

 
  if(!isset($_SESSION['username'])){  
      header('location: ../login.php?error=invalid_request');
  }
  $id= $_SESSION['userid'];
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type ="text/css" rel="stylesheet" href="../../asset/all_designs/Admin_designs/admin_profileview.css"> </link>
       <script type="text/javascript" src="../../asset/js/Admin_js/admin_editProfile.js"></script>
        
        <title>Profile</title>
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
			<a  href="../../php/logout.php"><button>logout</button></a>
			</ul>
            </nav>
    </header>

    

    <div class ="card-container" id="cardContainer">

        <div class ="bg-modal" id="bg-modal">

        <div class="modal-content" >
            <div class="close" onclick="edit_popup_close()">+</div>
        
            <form action="" method="post">
                <input type="text" id="adminId" value="<?=$id?>" style="display:none;">
                        <table cellpadding="9"  style="color:white; width:100%;" cellspacing="0">
                        
                        <?php

                            $adminInfo = getAllFromAdmin($id);
                            ?> 
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                            
                                <td><input type="text" id="lname" name="name" value="<?=$adminInfo['u_name']?>"  onkeyup="nRemover()" onblur="neMpty()"></td>
                                <td><i  id="nameMsg" style="color:white; font-size: 10px;"></i></td>
                            </tr>		
                            <tr><td colspan="4"><hr/></td></tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>
                                    <input type="text" id="email"  name="email" value="<?=$adminInfo['email']?>"  onkeyup="eRemover()" onblur="eEMpty()">
                                    <abbr title="hint: sample@example.com"><b>i</b></abbr>
                                </td>
                                <td ><i id="emailMsg" style="color:white;font-size: 10px; white-space: pre;"  ></i></td>
                            </tr>		
                            <tr><td colspan="4"><hr/></td></tr>
                            <tr>
                                <td>User Name</td>
                                <td>:</td>
                                <td><input type="text"  id="username" name="userName" value="<?=$adminInfo['username']?>"  onkeyup="uRemover()" onblur="ueMpty()"></td>
                                <td><i id="unameMsg"  style="color:white;font-size: 10px;"></i></td>
                            </tr>		
                            <tr><td colspan="4"><hr/></td></tr>
                            <tr>
                                <td>New Password</td>
                                <td>:</td>
                                <td><input type="password"  id="password" value="<?=$adminInfo['u_password']?>" name="password" onkeyup="pRemover()" onblur="PeMpty()"></td>
                                <td><i id="passMsg" style="color:white; font-size: 10px;"></i></td>
                            </tr>		
                            <tr><td colspan="4"><hr/></td></tr>
                            <tr>
                                <td>Confirm Password</td>
                                <td>:</td>
                                <td><input type="password"  id="conpassword" name="confirmPassword" value="<?=$adminInfo['u_password']?>"  onkeyup="pconRemover()" onblur="PconeMpty()"></td>
                                <td><i id="conpassMsg" style="color:white; font-size: 10px;"></i></td>
                            </tr>
    
                                <td colspan="4"><hr style="color:#ddd; width:100%;">	
                                </td>
                            </tr>	
                        </table>
                        <input type="button"  name="edit" value="Submit" class="Submitbtn" onclick="profileEdit()" >
                        </form>  
                    </div>
    </div>
    
    <div class="upper-container">
        <div class ="image-container" id="imageContainer">
            <?php
             $profilePic=getAllFromAdmin($id);
             ?>
           <img src="../../asset/instructor_profilepic/<?= $profilePic['picture']?>"/>

        </div>
    </div>
   
    <div class="lower-container" id="lower-container">
      
    <?php

      $adminInfo = getAllFromAdmin($id);
    ?>  
        <div class="profileInfo">
        <h4 style="font-weight:bold;"><?=$adminInfo['u_name']?></h4> 
        <h5 style="color:#666; font-weight:bold;">Username: <?= $adminInfo['username']?></h5>
        <h5 style="color:#666; font-weight:bold;" >Email: <?= $adminInfo['email']?></h5>
        <h5 style="color:#666; font-weight:bold;">Gender: <?= $adminInfo['gender']?></h5>
        <h5 style="color:#666; font-weight:bold;">Date Of Birth: <?= $adminInfo['date_of_birth']?></h5>
        </div>


    </div>
    <div class="lower-container" id="loweButton">
        <input type="button" class="btn " value="Edit Profile" onclick=" popupOpen()">
        
        <a href ="AdminHome.php" class="btn"> Go Back </a>


    </div>
    

    

</div>  
  
            <!-- <div >
                <form>
                    <fieldset class="profile_div">
                    <legend class="mainLegend"><b>PROFILE</b></legend>
                        <table class="profile_table">
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td><?php //echo $_SESSION['name'];?></td>
                                <td rowspan="7">	
                                      
                                <?php
									// session_start();
									// if(isset($_COOKIE['updated']))
									// {
                                        
                                    //     $file_dir=scandir("profile_picture");
                                    //     $newpic_pos=2;
                                        
									?>
										<img width="128" height="200" src="<?php //echo "profile_picture/".$file_dir[$newpic_pos];?>"/>
										
									<?php 
									// //}
									// else
									// {
									?>
				                 	   <img width="128" src="all_designs/images/profile.ico"/>
									<?php 
									//}
									?>
									<br/>
                                     <a class="propic" href="changepicture.php">Change</a>
                                </td>
                                </tr>		
                                <tr><td colspan="3"><hr/></td></tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?php// echo $_COOKIE['email'];?></td>
                                </tr>		
                                <tr><td colspan="3"><hr/></td></tr>			
                                <tr>
                                    <td>Gender</td>
                                    <td>:</td>
                                    <td><?php //echo $_COOKIE['gender'];?></td>
                                </tr>
                                <tr><td colspan="3"><hr/></td></tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td>:</td>
                                    <td><?php// echo $_COOKIE['date']."/".$_COOKIE['month']."/".$_COOKIE['year'];?></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><hr/></td>
                                </tr>
                        </table>
                        <a href="edit_profile.php"> Edit Profile </a>	
                    </fieldset>	
                </form>       
            </div> -->
        </main>

        <footer>
       </footer>
    </body>
</html>
    
