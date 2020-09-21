<?php
    
      session_start();
      
      require_once('../../services/instructor_service/classmaterialService.php');
      require_once('../../services/courseService.php');

      $id= $_SESSION['userid'];
      if(!isset($_COOKIE['username']) ){
  
          header('location: ../login.php?error=invalid_request');
      }
      
      $courseid=$_GET['courseid'];
      $instructorId=$_GET['instructorId'];

?>


<!DOCTYPE html>
<html>
<head>
    <title>My Course Material</title>
    
    <link rel="stylesheet" type="text/css" href="../../asset/all_designs/learner_designs/aboutUsStyle.css">
    
   
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
                <a href="#" class="logout_btn">Logout</a>
            </div>
           </ul>
    </nav>
    </header>
<div class ="card-container ">
    
    <div class="upper-container">
            
        <h2>Welcome MNP ACADEMY</h2>
            <h1> Courses material for </h1> 
            <h4> <?=$instructorId?></h4>
    
          
       
    </div>
   
    <div class="lower-container">
        <?php
       
       $getMaterial=getCourseMaterial($instructorId, $courseid);
       for($i=0; $i<count($getMaterial); $i++)
       {
       ?>

        <div>
        <h2><?=$getMaterial[$i]['items_name']?></h2>
        
        
       

        </div>
       <?php 
       }
       ?>

        

      


    </div>
    <div class="lower-container">
       
        <a href ="dashboard.php" class="btn"> Go Back </a>


    </div>

    


    

</div>  
  
    
</body>
</html>