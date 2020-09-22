<?php
  session_start();
  require_once('../../services/courseService.php');
  require_once('../../services/instructor_service/course_instructorService.php');
  require_once('../../services/instructor_service/instructorService.php');

  if(!isset($_COOKIE['username']) ){  
      header('location: ../login.php?error=invalid_request');
  }
  $id= $_COOKIE['userid'];
  $instrInfo=getByID($id);
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type ="text/css" rel="stylesheet" href="../../asset/all_designs/instructor_designs/profileview.css"> </link>
       <script type="text/javascript" src="../../asset/js/instructor_js/editProfile.js"></script>
        
        <title>Profile</title>
    </head>
    <body>
        <header>
             <nav>
             <select class="comboBox">
                 <option value="Course" selected disabled hidden>Cources</option>
                 <optgroup label="Science">
                <?php
                    $courseN = getByCategory('Science');
                    for ($i=0; $i<count($courseN); $i++)
                    { ?>
                        <option value="<?php echo $courseN[$i];?>"><?php echo $courseN[$i]['course_name'];?>
                        </option>
                    <?php }?>
                    </optgroup>
                <optgroup label="Computer Science">
                <?php
                    $courseN = getByCategory('Computer Science');
                    for ($i=0; $i<count($courseN); $i++)
                    { ?>
                        <option value="<?php echo $courseN[$i];?>"><?php echo$courseN[$i]['course_name'];?>
                        </option>
                    <?php }?>

                </optgroup>
                <optgroup label="Programming Language">
                <?php
                    $courseN = getByCategory('Programming Language');
                    for ($i=0; $i<count($courseN); $i++)
                    { ?>
                        <option value="<?php echo $courseN[$i];?>"><?php echo$courseN[$i]['course_name'];?>
                        </option>
                    <?php }?>

                </optgroup>
             </select>
             <ul class="navigation">
                 <li class="searchBox"><input type="text" name="search" placeholder="Search.."></li>
                 <li class="logo"><a href="dashboard.php">MNP Academy</a></li>
             </ul>
         </nav>
    </header>

    <div class="verticleLine"></div>

    <main>
    <div class="image-profile">
           <?php
            $profilePic=getAllFromInst($id);
           ?>
        <img src="../../asset/instructor_profilepic/<?=$profilePic['picture']?> " class="profile_picture">
     </div>
        <h4 class="section-heading"><a href="dashboard.php"><?=$instrInfo['u_name']?></a></h4>
            <div class="accountStuff">
                <ul class="stuff">
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="mycourse.php">Courses</a></li>
                    <li><a href="blog.php">Blogs</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="../php/logout.php">Logout</a></li>
                </ul>
            </div>

    <div class ="card-container" id="cardContainer">

        <div class ="bg-modal" id="bg-modal">

        <div class="modal-content" >
            <div class="close" onclick="edit_popup_close()">+</div>
        
            <form action="" method="post">
                <input type="text" id="instructorId" value="<?=$id?>" style="display:none;">
                        <table cellpadding="9"  style="color:white; width:100%;" cellspacing="0">
                        
                        <?php

                            $instructorInfo = getByID($id);
                            ?> 
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                            
                                <td><input type="text" id="lname" name="name" value="<?=$instructorInfo['u_name']?>"  onkeyup="nRemover()" onblur="neMpty()"></td>
                                <td><i  id="nameMsg" style="color:white; font-size: 10px;"></i></td>
                            </tr>		
                            <tr><td colspan="4"><hr/></td></tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>
                                    <input type="text" id="email"  name="email" value="<?=$instructorInfo['email']?>"  onkeyup="eRemover()" onblur="eEMpty()">
                                    <abbr title="hint: sample@example.com"><b>i</b></abbr>
                                </td>
                                <td ><i id="emailMsg" style="color:white;font-size: 10px; white-space: pre;"  ></i></td>
                            </tr>		
                            <tr><td colspan="4"><hr/></td></tr>
                            <tr>
                                <td>User Name</td>
                                <td>:</td>
                                <td><input type="text"  id="username" name="userName" value="<?=$instructorInfo['username']?>"  onkeyup="uRemover()" onblur="ueMpty()"></td>
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
             $profilePic=getAllFromInst($id);
             ?>
           <img src="../../asset/instructor_profilepic/<?= $profilePic['picture']?>"/>

        </div>
    </div>
   
    <div class="lower-container" id="lower-container">
      
    <?php

      $instructorInfo = getByID($id);
    ?>  
        <div class="profileInfo">
        <h4 style="font-weight:bold;"><?=$instructorInfo['u_name']?></h4> 
        <h5 style="color:#666; font-weight:bold;">Username: <?= $instructorInfo['username']?></h5>
        <h5 style="color:#666; font-weight:bold;" >Email: <?= $instructorInfo['email']?></h5>
        <h5 style="color:#666; font-weight:bold;">Gender: <?= $instructorInfo['gender']?></h5>
        <h5 style="color:#666; font-weight:bold;">Date Of Birth: <?= $instructorInfo['date_of_birth']?></h5>
        </div>


    </div>
    <div class="lower-container" id="loweButton">
        <input type="button" class="btn " value="Edit Profile" onclick=" popupOpen()">
        
        <a href ="dashboard.php" class="btn"> Go Back </a>


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
    
