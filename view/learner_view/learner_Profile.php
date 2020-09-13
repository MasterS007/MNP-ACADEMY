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
    <title>Profile Page</title>
    
    <link rel="stylesheet" type="text/css" href="../../asset/all_designs/learner_designs/learner_Profile.css">

    <script type="text/javascript" src="../../asset/js/learner_js/learnerProfile.js"></script>
    <!-- <script type="test/javascript" src="../../asset/js//learner_js/learnerProfile.js">   </script> -->
    
   
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

<div class ="bg-model" id="bg-model">

       <div class="model-content" >
           <div class="close" onclick="edit_popup_close()">+
           </div>
       </div>
    
    
    </div>


    
    <div class="upper-container">
        <div class ="image-container ">

           <img src="1.jpg" />

        </div>
    </div>
   
    <div class="lower-container">
      

        <div>
        <h3> Nila</h3> 
        <h4>CSE Student</h4>

        <h5>Username :nila1313</h5>
        <h5>Email Adress :chaity13x@gmail.com</h5>

        
        </div>

        <div>
        <p>Please insert your bio</p>

        </div>

        <div>
            <a href ="#" class="btn1"> Course Taken</a>
    
        </div>
       

      


    </div>
    <div class="lower-container">
        <input type="button" class="btn " name="" style="cursor:pointer;"   value="Edit Profile" onclick="edit_popup_open()">
        <input type="button" value="Add" onclick="edit_popup_open()">
        

        <a href ="dashboard.php" class="btn"> Go Back </a>


    </div>
    

    


    

</div>  
  
    
</body>
</html>