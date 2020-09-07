<?php
       session_start();
       require_once('../../services/courseService.php');
       require_once('../../services/instructor_service/course_instructorService.php');
       if(!isset($_SESSION['username'])){
   
           header('location: ../login.php?error=invalid_request');
       }

 ?> 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../asset/all_designs/instructor_designs/dashboardDes.css"> 
    <script type="text/javascript" src="../../asset/js/instructor_js/popupClassadd.js"></script>
    <title>Class</title>
</head>
<body>
    <header>
         <nav>
             <select class="comboBox">
                 <option value="Course" selected disabled hidden>Cources</option>
                 <optgroup label="Science">
                <?php
                    $courseN = getByCategory('Science');
                    for ($i=0; $i<count($courseN); $i++)
                    { ?>
                        <option value="<?php echo $courseN[$i];?>"><?php echo $courseN[$i]['course_name'];?>
                        </option>
                    <?php }?>
                    </optgroup>
                <optgroup label="Computer Science">
                <?php
                    $courseN = getByCategory('Computer Science');
                    for ($i=0; $i<count($courseN); $i++)
                    { ?>
                        <option value="<?php echo $courseN[$i];?>"><?php echo$courseN[$i]['course_name'];?>
                        </option>
                    <?php }?>

                </optgroup>
                <optgroup label="Programming Language">
                <?php
                    $courseN = getByCategory('Programming Language');
                    for ($i=0; $i<count($courseN); $i++)
                    { ?>
                        <option value="<?php echo $courseN[$i];?>"><?php echo$courseN[$i]['course_name'];?>
                        </option>
                    <?php }?>

                </optgroup>
             </select>
             <ul class="navigation">
                 <li class="searchBox"><input type="text" name="search" placeholder="Search.."></li>
                 <li class="logo"><a href="dashboard.php">MNP Academy</a></li>
             </ul>
         </nav>
    </header>

        <div class="verticleLine"></div>
    <main>
       
        <h4 class="section-heading"><a href="dashboard.php"><?php echo $_SESSION['name'];?></a></h4>
            <div class="accountStuff">
                <ul class="stuff">
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="mycourse.php">Courses</a></li>
                    <li><a href="blog.php">Blogs</a></li>
                    <li><a href="../../php/logout.php">Logout</a></li>
                </ul>
            </div>
            <section>
                <h2 class="welcomeheading">Welcome <?php echo $_SESSION['name'];?></h2>
                
            </section>

            <div class="wel">  
                  
                <ul class="wlist">
                    <li><a href="dashboard.php">Classes</a></li>
                    <li><a href="allstudent.php">Students</a></li>
                    <li><a href="#">Tips</a></li>
                </ul> 
                <hr>
           </div>

           <div class="titleb">
               <h4 class="titleC">My Class</h4>
               <button type="button" class="addClass" onclick= openpopup() >Add Class</button>
            </div>
            
            <!-- <form method="POST"> -->
           <div id="divClasses" class="divclasses">
           <ul class="myClass">
                <?php
                    $Cid=$_SESSION['userid'];
                    $courseId=getInsCourse($Cid);
                    for($i=0; $i<count($courseId); $i++)
                    {
                        $courseName =getByCourseId($courseId[$i]['course_id']);
                        ?>
                     <li><a href="../view/insideClass.php">Class: <?php echo $courseName['course_name']; ?></a></li><br>

                    <?php    
                    }
                    ?>
               </ul>
                  
           </div>
           <!-- </form> -->
    </main> 
    <footer>
    </footer>
    <!--  -->

    </body>
    
</html>

