<?php
   	session_start();

       if(!isset($_SESSION['username'])){
   
           header('location: ../login.php?error=invalid_request');
       }

 ?> 



<!DOCTYPE html>
<html>
<head>
    <title>My page</title>
    
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" type="text/css" href="../../asset/all_designs/learner_designs/dashboardDes.css"> 
    
    <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
 


</head>
<body>
    <input type="checkbox" id="check">
 
    
        <header> 
            <label for="check">

                <i class="fa fa-bars" id="sidebar_btn" ></i>
            </label>
        
            <div class="left_area" >
              <h3> MNP <span>ACADEMY</span> </h3>  
            </div>
            <div class="right_area"> 
                <a href="#" class="logout_btn">Logout</a>
            </div>
        </header> 
      
        <div class="sidebar">
            <center> 
                <img src="1.jpg" class="profile_image"alt="" width="100px" height="100px">
                <h4>Nila</h4>
            </center>
         
         <a href="#"><i class="fa fa-desktop"></i><span>Dashboard</span></a>
         <a href="#"><i class="fa fa-cogs"></i><span>Componets</span></a>
         <a href="#"><i class="fa fa-table"></i><span>Tables</span></a>
         <a href="#"><i class="fa fa-th"></i><span>Forms</span></a>
         <a href="#"><i class="fa fa-info-circle"></i><span>About us</span></a>
         
        </div>
     
    <div class="content"></div>
    
</body>
</html>