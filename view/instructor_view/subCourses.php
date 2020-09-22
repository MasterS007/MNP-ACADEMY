<?php
       session_start();
       require_once('../../services/courseService.php');
       require_once('../../services/instructor_service/course_instructorService.php');
       require_once('../../services/instructor_service/instructorService.php');
       if(!isset($_COOKIE['username']) ){
   
           header('location: ../login.php?error=invalid_request');
       }
       $indtId= $_COOKIE['userid'];
       $instinfo =getByInstructorsID($indtId);
       $instName =  $instinfo['u_name'];
       $categoryName =$_GET['courseCategory'];
 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../asset/all_designs/instructor_designs/cources_design.css"> <link rel>
    <title>Video Lectures</title>
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
    <div class="image-container">
           <?php
            $proPic= getAllFromInst($indtId);
            if($proPic['picture']!=NULL)
            {
                ?>
                <img src="../../asset/instructor_profilepic/<?= $proPic['picture']?> " class="profile_picture">
                <?php
            }
            else
            {?>
                <img src="../../asset/instructor_profilepic/profile.ico" class="profile_picture">
                    <?php
            }?>
        </div>
        <h4 class="section-heading"><a href="dashboard.php"><?=$instName?></a></h4>
            <div class="accountStuff">
                <ul class="stuff">
                <li><a href="profile.php">Profile</a></li>
                    <li><a href="mycourse.php">Courses</a></li>
                    <li><a href="blog.php">Blogs</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="../../php/logout.php">Logout</a></li>
                </ul>
            </div>
            
            <section>
            <h3 class="heading"><?= $categoryName?></h3>
            <h4 class="someWords">These are the courses available right now for <?= $categoryName?> category on MNP Academy</h4>
            </section>

<div class="myCources">
         <ul class="courses">

    <?php

      $courseInfo= getByCategory($categoryName); //from

    

      for($i=0; $i<count($courseInfo);$i++)
      {
        
        ?>
       
       <li style="color:darkcyan;"><?=$courseInfo[$i]['course_name']?>
       
       </li> 
        <br>   
        <?php
        
      }
    ?> 
</div>  
    
   

</body>
</html>

            