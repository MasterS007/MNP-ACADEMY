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
                		<li><a href="#">Dashboard</a></li>
                		<li><a href="Add_Admin.php">Admin Profile</a></li>
                		<li>Manage Users</li>
                		<li>Courses</li>
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
                            <td width="10px">stsd</td>
                            <td>tgjg</td>
                            <td>rutgujgj</td>
                        </tr>
                    </table>
    </form>
                    </div>
                </div>
            </main>
    </body>
    
</html>