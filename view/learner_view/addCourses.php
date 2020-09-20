<?php
       session_start();
       require_once('../../services/courseService.php');
       require_once('../../services/instructor_service/course_instructorService.php');
       require_once('../../services/instructor_service/instructorService.php');
       

       $id= $_SESSION['userid'];
       if(!isset($_SESSION['username'])){
   
           header('location: ../login.php?error=invalid_request');
       }

       $categoryName =$_GET['courseCategory'];

 ?> 
<!DOCTYPE html>
<html>
<head>
  <title>Science</title>
<link rel="stylesheet" href="../../asset/all_designs/learner_designs/addCoursesStyle.css">
<script type="text/javascript" src="../../asset/js/learner_js/addCoursesScript.js"></script>


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

<h2><?= $categoryName?></h2>


<p>These are the courses available right now on MNP Academy</p>



<div id="btnContainer">
  <button class="btn" onclick="listView()"><i class="fa fa-bars"></i> List</button> 
  <button class="btn active" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
</div>
<div>
    <!-- <input type="submit" value="Enroll now" style="margin-left:4%; margin-top=30px" onclick=" "> -->
</div>
<br>


       <input type="text" id="learnerId" value="<?=$id?>" style="display:none;">

    <?php

      $courseInfo= getByCategory($categoryName); //from

    

      for($i=0; $i<count($courseInfo);$i++)
      {
        
        ?>
        <div class="row">
        <div class="column" style="background-color:#aaa;">
        <h2><a href="enroll_course.php?course_name=<?=$courseInfo[$i]['course_name']?>"><?=$courseInfo[$i]['course_name']?></a></h2>
       
         
         <p>Some text..</p>
         
          
      
        </select>
        <br><br>
        <!-- <input type="submit" value="Enroll now" onclick="enrollClick() "> -->
        </div>
        <?php
        
   

      }
    ?>   
    
   

</body>
</html>
