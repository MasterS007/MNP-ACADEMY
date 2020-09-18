<?php
       session_start();
       require_once('../../services/learner_service/courseService.php');

       $id= $_SESSION['userid'];
       if(!isset($_SESSION['username'])){
   
           header('location: ../login.php?error=invalid_request');
       }

 ?> 

<!DOCTYPE html>
<html>
<head>
  <title>Courses</title>
<link rel="stylesheet" type="text/css" href="../../asset/all_designs/learner_designs/allCoursesStyle.css">

<script type="text/javascript" src="../../asset/js/learner_js/allCoursesScript.js"></script>

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

<h2>List Of Cousrses</h2>

<p>These are the courses available right now on MNP Academy</p>

<div id="btnContainer">
  <button class="btn" onclick="listView()"><i class="fa fa-bars"></i> List</button> 
  <button class="btn active" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
</div>
<br>

<div class="row">
  <div class="column" style="background-color:#aaa;">
    <h2><a href="addCourses.php">Science</a></h2>
    <p>Some text..</p>
  </div>
  <div class="column" style="background-color:#bbb;">
    <h2>Computer Science</h2>
    <p>Some text..</p>
  </div>
</div>

<div class="row">
  <div class="column" style="background-color:#ccc;">
    <h2>Programming Language</h2>
    <p>Some text..</p>
  </div>
  
</div>





</body>
</html>
