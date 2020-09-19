<?php
       session_start();
       if(!isset($_SESSION['username'])){
   
           header('location: ../login.php?error=invalid_request');
       }

 ?> 
<!DOCTYPE html>
<html>
    <head>
    <meta charset = "UTF-8"/>
    <link rel="stylesheet" type="text/css" href="../../asset/all_designs/Admin_designs/coursesStyle.css">
    <title>MY Page</title>
    </head>
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
                    <a  href="#"><button> </button></a>
                    <a  href="#"><button>logout</button></a>
                   </ul>
               </nav>
            </header>
            <main>
                <div>
                	<ul>
                    <li class="imgbtn">jsbujruer</li>
                    <li><?php echo $_SESSION['name'];?></li>
                		<li><a href="AdminHome.php">Dashboard</a></li>
                		<li><a href="Add_Admin.php">Admin Profile</a></li>
                		<li>Manage Users</li>
                		<li><a href="coursesView.php">Courses</a></li>
                		<li>Learners</li>
                		<li><a href="about_us.php">About Us</a></li>
                		<li><a href="Manage_Blog.php">Manage Blog</a></li>
                	</ul>
                </div>
<!-- course design -->
                <div>
                    <div class="UpperContainer">
                    <li><h2>Courses</h2></li>
                	<li><h2><input type ="button" value="Add new course"> </h2></li>
                    </div>

                    <div class="TableContainer">
                        <form>
                    <table>
                        <tr>
                            <td><h3>Course Name</h3></td>
                            <td><h3>Course Category</h3></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><h4>Data Structure</h4></td>
                            <td><h4>Computer Science</h4></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><h4>Programming Language 1</h4></td>
                            <td><h4>Computer Science</h4></td>
                            <td></td>
                        </tr>
                        
                    </table>
    </form>
                    </div>
                </div>
            </main>
    </body>
    
</html>