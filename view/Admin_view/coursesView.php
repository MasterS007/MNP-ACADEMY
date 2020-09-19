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
    <meta charset = "UTF-8"/>
    <link rel="stylesheet" type="text/css" href="../../asset/all_designs/Admin_designs/coursesStyle.css">
    <script type="text/javascript" src="../../asset/js/Admin_js/add_coursesScript.js"></script>
    <title>All Courses</title>
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
                	<li><h2><input type ="button" value="Add new course" style="cursor:pointer;" onclick="open_popup()"> </h2></li>
                    </div>
                     

                    <div class="TableContainer">
                        <form>
                    <table>
                    
                        <tr >
                            <td><h3>Course Name</h3></td>
                            <td><h3>Course Category</h3></td>
                            <td></td>
                        </tr>
                        <?php 
                    $course=getAllCourse();
                       for($i=0;$i<count($course);$i++)
                       {
                        ?>
                        <tr>
                            <td><h4><?=$course[$i]['course_name'];?></h4></td>
                            <td><h4><?=$course[$i]['course_category'];?></h4></td>
                            <td></td>
                        </tr>
                       <?php } ?>
                       
                        
                    </table>
                   </form>
                    <!-- add course form -->
                    <div class="bg-modal" id="bg-modal">
                        <div class="modal-content">
                     <div class="close" onclick="popup_close()">+<div>
                     </div>
                     </div>
                </div>

             </div>



            </main>
    </body>
    
</html>