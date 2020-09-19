<?php
       session_start();
       require_once('../../services/courseService.php');
       require_once('../../services/instructor_service/course_instructorService.php');
       require_once('../../services/instructor_service/instructorService.php');
       

       $id= $_SESSION['userid'];
       if(!isset($_SESSION['username'])){
   
           header('location: ../login.php?error=invalid_request');
       }

       $CourseName =$_GET['course_name'];

 ?> 

<!DOCTYPE html>
<html>
<head>
    <title>Enroll Course</title>
    
    <link rel="stylesheet" type="text/css" href="../../asset/all_designs/learner_designs/aboutUsStyle.css"> 
    
    <link rel="stylesheet" type="text/css" href="Algo.css">
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
    
    <div class="upper-container">
        
            <h1><?= $CourseName?></h1> 
            <h4>Intro</h4>
    
          
       
    </div>
   
    <div class="lower-container">
      

        <div>
       

        <h2>Welcome MNP ACADEMY</h2>
        
        
        </div>

        <div>
        <h3>list of Instructor</h3>
        <label>Choose a Instructor:</label>
        <select name="List of instructor " id="listInstructor">
        <?php

      $courseInfo= getByCategory($categoryName); //from

    

      for($i=0; $i<count($courseInfo);$i++)
      {
        
        ?>
        <div class="row">
        <div class="column" style="background-color:#aaa;">
         <h2><?=$courseInfo[$i]['course_name']?> </h2>
         <p>Some text..</p>
         <label>Choose a Instructor:</label>
        <select name="List of instructor ">
        <?php

        $getInstructor= courseidget($courseInfo[$i]['course_id']);//from course_instructorService.php
          for($j=0; $j<count( $getInstructor); $j++)
          {

             $instructorId=$getInstructor[$j]['instructor_id']; 
             $instructorInfo= getByID( $instructorId); //from userService.php
            ?>

                <option value="<?= $instructorInfo['u_name']?>"><?= $instructorInfo['u_name']?></option>

            <?php
          }
          ?>
          
      
        </select>
        <br><br>
        <input type="submit" value="Enroll now">
        </div>
        <?php
        
      }
    ?>  

        </div>
       
        <div>
        <h3><input type="button" value="Enroll now"   onclick="enrollClick() "></h3>

        </div>
      
    </div>

    
    
        
   


    

    <div class="lower-container">
        
        <a href ="#" class="btn"> Go Back </a>


    </div>

    


    

</div>  
  
    
</body>
</html>