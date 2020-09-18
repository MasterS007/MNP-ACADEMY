<?php
       session_start();
       require_once('../../services/courseService.php');

       $id= $_SESSION['userid'];
       if(!isset($_SESSION['username'])){
   
           header('location: ../login.php?error=invalid_request');
       }

 ?> 



<!DOCTYPE html>
<html>
<head>
    <title>Learner's dashboard</title>
    
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" type="text/css" href="../../asset/all_designs/learner_designs/dashboardDes.css"> 
    
    <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
 
</head>
<body>
    <input type="checkbox" id="check" style="display:none;">
 
    
        <header> 
            <label for="check">

                <i class="fa fa-bars" id="sidebar_btn" ></i>
            </label>
        
            <div class="left_area" >
            <h3> <a href="dashborad.php" style="text-decoration-line: none; color:white;"> MNP <span>ACADEMY</span> </a></h3> 
            </div>
            <div class="right_area"> 
                <h2 style="margin-left:78%; margin-top:-25px;">Welcome <?php echo $_SESSION['name'];?></h2>
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
             </ul>
                <a href="../../php/logout.php" class="logout_btn" style="margin-top:-90px;">Logout</a>
            </div>
            
            
        
        </header> 
      
        <div class="sidebar">
            <center> 
                <img src="1.jpg" class="profile_image"alt="" width="100px" height="100px">
                <h4><?php echo $_SESSION['name'];?></h4>
            </center>
         

         <a href="dashboard.php"><i class="fa fa-desktop"></i><span>Dashboard</span></a>
         <a href="learner_Profile.php"><i class="fa fa-desktop"></i><span>profile</span></a>
         <a href="allCourses.php"><i class="fa fa-cogs"></i><span>Courses</span></a>
         <a href="#"><i class="fa fa-th"></i><span>My Course</span></a>

        

         <a href="#"><i class="fa fa-table"></i><span>Tips</span></a>
         <a href="#"><i class="fa fa-th"></i><span>Forum</span></a>
         <a href="aboutUs.php"><i class="fa fa-info-circle"></i><span>About us</span></a>
         
        </div>
     
    <div class="content"></div>
    
</body>
</html>