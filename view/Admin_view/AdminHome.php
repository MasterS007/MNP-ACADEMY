<?php
       session_start();
       require_once('../../services/Admin_Service/admin_service.php');
       if(!isset($_COOKIE['username']) ){
   
           header('location: ../login.php?error=invalid_request');
       }

 ?> 
<!DOCTYPE html>
<html>
    <head>
    <meta charset = "UTF-8"/>
    <link rel="stylesheet" type="text/css" href="../../asset/all_designs/Admin_designs/adminHome.css">
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
                    <li><img src="1.jpg" class="imgbtn" alt="" width="100px" height="100px"></li>
                    <li><?php echo $_SESSION['name'];?></li>
                		<li><a href="#">Dashboard</a></li>
                		<li><a href="Add_Admin.php">Admin Profile</a></li>
                		<li>Manage Users</li>
                		<li><a href="coursesView.php">Courses</a></li>
                		<li>Learners</li>
                		<li><a href="about_us.php">About Us</a></li>
                		<li><a href="Manage_Blog.php">Manage Blog</a></li>
                	</ul>
                </div>
                <!-- RIght side -->
                <div >
                    <div class="result">
                <div class="resultdiv" > 
                    <?php
                    $Learner=getAllLearner();
                    $L_count=0;
                    for($i=0;$i<count($Learner);$i++)
                    {
                        $L_count+=1;
                    }
                    ?>
                    Total Student :<?=$L_count?>

                </div>
                <div class="resultdiv">
                <?php
                    $Instructor=getAllInstructor();
                    $I_count=0;
                    for($i=0;$i<count($Instructor);$i++)
                    {
                        $I_count+=1;
                    }
                    ?> 
                    Total Teacher :<?=$I_count?></div>
                <div class="resultdiv" > Total Courses</div>
                </div>
    </div>
            </main>
    </body>
    
</html>