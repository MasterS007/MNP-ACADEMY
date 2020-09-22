<?php
       session_start();
       require_once('../../services/learner_service/learner_courseService.php');
       require_once('../../services/learner_service/learnerService.php');
         

       $id= $_SESSION['userid'];
       if(!isset($_SESSION['username'])){
   
           header('location: ../login.php?error=invalid_request');
       }


 ?> 
<!DOCTYPE html>
<html>
<head>
  <title>Courses</title>
  <link rel="stylesheet" type="text/css" href="../../asset/all_designs/learner_designs/myCoursesStyle.css">

</head>
<body>
  <header>
    <div class="left_area" >
        <h3> MNP <span>ACADEMY</span> </h3>  
      </div>
    <nav>
        <ul class="nav-links">
        <li><a href="dashboard.php">Home</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <li><a href="tips.php">Tips</a></li>
                <li><a href="#">Forum</a></li>
        
        </ul>
    </nav>
    <nav>
        <ul class="nav-links">
       
        <div class="right_area"> 
            <a href="../../php/logout.php" class="logout_btn">Logout</a>
        </div>
       </ul>
</nav>
</header>

<h2>List Of Cousrses you have taken</h2>

<p>Enjoy to learn your course!!!!</p>

<div id="btnContainer">
  
</div>
<br>

 <?php 

$allMyCourseIns = getInstructorCourse($id);


// echo $allMyCourse;
for($i=0; $i<count($allMyCourseIns); $i++)
 {
   $Id=$allMyCourseIns[$i]['u_name'];
   $course=$allMyCourseIns[$i]['course_name'];

   $userId=$allMyCourseIns[$i]['id'];
   $courseId=$allMyCourseIns[$i]['course_id'];
   
  ?> 
 
  <div class="column" style="background-color:#aaa;">
    
  
    <h2><a href="assignment.php?course_name=<?=$course?> && instructor_name=<?=$Id?> && instructorId=<?=$userId?> && courseId=<?=$courseId?>"><?=$course?> </a><h2>
    <h2><a href="">Instructor Name: <?=$Id ?></a></h2>
    
    
    
  </div>
<?php
//}
}
?>

</div>


<script type="text/javascript" src="script.js"></script>


</body>
</html>
