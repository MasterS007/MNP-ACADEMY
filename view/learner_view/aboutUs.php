<?php
       session_start();
       require_once('../../services/Admin_Service/about_us.php');
?>


<!DOCTYPE html>
<html>
<head>
    <title>About Us</title>
    
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
                <a href="../../php/logout.php" class="logout_btn">Logout</a>
            </div>
           </ul>
    </nav>
    </header>
<div class ="card-container ">
    
    <div class="upper-container">
            
        <h2>Welcome MNP ACADEMY</h2>
            <h1> About Us</h1> 
            <h4>We envision a world where anyone, anywhere can transform their life by accessing the world’s best learning experience</h4>
    
          
       
    </div>
   
    <div class="lower-container">
        <?php
       $about=getAboutUs();
       for($i=0;$i<count($about);$i++)
       {
       ?>

        <div>
        <h2><?=$about[$i]['Title']?></h2>
        <h2><?=$about[$i]['SubTitle']?></h2>
        <p><?=$about[$i]['Descriptions']?></p>

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