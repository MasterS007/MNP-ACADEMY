<?php
       session_start();
       require_once('../../services/courseService.php');
       require_once('../../services/instructor_service/course_instructorService.php');
       if(!isset($_SESSION['username'])){
   
           header('location: ../login.php?error=invalid_request');
       }

 ?> 
<!DOCTYPE html>
<html>
    <head>
        <title>
            MY Page
        </title>
        <link rel="stylesheet" type="text/css" href="../../asset/all_designs/Admin_designs/Add_Admin.css">
        <meta charset = "UTF-8"/>
      
        <body>
            <header>
                <p class="logo">MNP Academy</p>
                <nav>
                    <ul class="nav-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Service</a></li>
                    </ul>
                </nav>
                <nav>
                    <ul class="nav-links">
                    <a  href="#"><buttonp> </buttonp></a>
                    <a  href="#"><button>Signup</button></a>
                   </ul>
            </nav>
            </header>
            <main>
                <div>
                	<ul>
                		<li><a href="#">Dashboard</a></li>
                		<li><a href="Add_Admin">Admin Profile</a></li>
                		<li>Manage Users</li>
                		<li>Courses</li>
                		<li>Learners</li>
                		<li>Students</li>
                		<li><a href="Manage_Blog.php">Manage Blog</a></li>
                	</ul>

                </div>
                <div >
                    
                    <div id="div1">
                            <a href="#" id="add_admin" class="button">Add New Admin</a>
                            <input type="button" name="Admin_Profile" value="Admin Profile">
                            <input type="button" name="Add_New_Admin" value="Add New Admin">
                            <input type="button" name="View_Admin_List" value="View Admin List">

                    </div>
                    <div class= "bg-modal">
                        <div class = "modal-content">
                            <div class="close">+</div>
                        <form action="">
                              Name: <input type="text" placeholder="Name"></br>
                              Email:<input type="text" placeholder="Email"></br>
                              <a href="" class="button">Submit</a>
                         </form>                           
                         </div>                       
                    </div>               
                </div>              
            </main>
        
        </body>
    </head>
</html>