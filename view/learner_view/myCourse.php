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

<h2>List Of Cousrses you have taken</h2>

<p>Enjoy to learn your course!!!!</p>

<div id="btnContainer">
  
</div>
<br>

 <?php 

$allMyCourse = getMyCourse();

// echo $allMyCourse;
 for($i=0; $i<count($allMyCourse); $i++)
 {
$Id=$allMyCourse[$i]['instructor_id'];
//   echo $getInstructor;
   //$Instructor=   getByID('$getInstructor');
  //echo $Instructor;
//   for($j=0;$j<count( $Instructor);$j++)
//   {
  ?> 
  
  
  <div class="column" style="background-color:#aaa;">
    
  
    <h2><a href="myCourseMaterial.php?courseid=<?=$allMyCourse[$i]['course_id']?> && instructorId=<?=$allMyCourse[$i]['instructor_id']?>"><?=$allMyCourse[$i]['course_id'] ?> </a><h2>
    <h2><a href="">Instructor Id: <?=$Id ?></a></h2>
    <h2><a href="">Course Id: <?=$allMyCourse[$i]['course_id']  ?></a></h2>
    <h2><a href=""></a></h2>
    
  </div>
<?php
//}
}
?>
<?php
// $Instructor=getByInsID('$Id');
// for($i=0; $i<count($Instructor); $i++)
// {
?>
<!-- <h2><a href="">Course Id: <?//=$Instructor[$i]['u_name']  ?></a></h2> -->

<?php
//}

?>

 
  
</div>


<script type="text/javascript" src="script.js"></script>


</body>
</html>
