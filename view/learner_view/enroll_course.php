<?php
       session_start();
       require_once('../../services/courseService.php');
       require_once('../../services/instructor_service/course_instructorService.php');
       require_once('../../services/instructor_service/instructorService.php');
       

       
       if(!isset($_COOKIE['username']) ){
   
           header('location: ../login.php?error=invalid_request');
       }

       $courseName =$_GET['course_name'];
       $id= $_SESSION['userid'];
      

 ?> 

<!DOCTYPE html>
<html>
<head>
     <link rel="stylesheet" type="text/css" href="../../asset/all_designs/learner_designs/aboutUsStyle.css"> 
    <script type="text/javascript" src="../../asset/js/learner_js/enroll_course.js"></script>
    <title>Enroll Course</title>
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
<div class ="card-container ">
    
    <div class="upper-container">
        
            <h1><?=$courseName?></h1> 
            <h4>Intro</h4>
    
          
       
    </div>
   
    <div class="lower-container">
      

        <div>
        <h2>Welcome MNP ACADEMY</h2>
        </div>

        <div>
        <h3>list of Instructor</h3>
        <input id="learnerId" value=<?=$id?> style="display:none">
        <label>Choose a Instructor: </label>
        <select name="List of instructor " id="listInstructor">

            <?php
                $course_id=getByCourseName($courseName);
                $_SESSION['courseId'] = $course_id['course_id'];

                
              
                $insctructorId = courseidget( $course_id['course_id']);
                for($i=0; $i<count( $insctructorId); $i++)
                {
                    $instructorName=getByInstructorsID($insctructorId[$i]['instructor_id']);
                    ?>

                    <option value="<?=$instructorName['u_name']?>"> <?=$instructorName['u_name']?></option>
                    <?php
                }
            
            ?>
       
        <!-- <option value="volvo">Volvo </option>
        <option value="volvo">Volvo </option> -->
        </select>
       
        

       <input id="courseId" value="<?=$_SESSION['courseId']?>" style="display:none;" >

        
        <input type="button" value="Enroll now" onclick="enrollClick() ">
        <br>
        <a href=""> My course </a>

        </div>
      
    </div>


    <div class="lower-container">
        
        <a href ="#" class="btn"> Go Back </a>


    </div>

    


    

</div>  
  
    
</body>
</html>