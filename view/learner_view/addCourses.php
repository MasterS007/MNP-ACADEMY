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

<h2>Science</h2>

<p>These are the courses available right now on MNP Academy</p>

<div id="btnContainer">
  <button class="btn" onclick="listView()"><i class="fa fa-bars"></i> List</button> 
  <button class="btn active" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
</div>
<br>

<div class="row">
    <div class="column" style="background-color:#aaa;">
      <h2>Physics </h2>
      <p>Some text..</p>
      <form action="">
        <label for="cars">Choose a Instructor:</label>
        <select name="List of instructor " id="cars">
          <option value="volvo">Siam</option>
          <option value="saab">Saab</option>
          <option value="opel">Parthib</option>
          <option value="audi">Tuhin</option>
        </select>
        <br><br>
        <input type="submit" value="Enroll now">
      </form>
     
      
    </div>
    <div class="column" style="background-color:#bbb;">
      <h2>Chemistry</h2>
      <p>Some text..</p>
      <form action="">
        <label for="cars">Choose a Instructor:</label>
        <select name="List of instructor " id="cars">
          <option value="volvo">Siam</option>
          <option value="saab">Saab</option>
          <option value="opel">Parthib</option>
          <option value="audi">Tuhin</option>
        </select>
        <br><br>
        <input type="submit" value="Enroll now">
      </form>
    </div>
  </div>
  
  <div class="row">
    <div class="column" style="background-color:#ccc;">
      <h2>Biology</h2>
      <form action="">
        <label for="cars">Choose a Instructor:</label>
        <select name="List of instructor " id="cars">
          <option value="volvo">Siam</option>
          <option value="saab">Saab</option>
          <option value="opel">Parthib</option>
          <option value="audi">Tuhin</option>
        </select>
        <br><br>
        <input type="submit" value="Enroll now">
      </form>
    </div>
  </div>
  <div class="column" style="background-color:#bbb;">
    <h2>Math</h2>
    <p>Some text..</p>
    <form action="">
      <label for="cars">Choose a Instructor:</label>
      <select name="List of instructor " id="cars">
        <option value="volvo">Siam</option>
        <option value="saab">Saab</option>
        <option value="opel">Parthib</option>
        <option value="audi">Tuhin</option>
      </select>
      <br><br>
      <input type="submit" value="Enroll now">
    </form>
  </div>
</div>
  





</body>
</html>
