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
    <!-- <link rel="stylesheet" href="all_designs/cources_design.css"> <link rel> -->
    <title>My Course</title>
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
                 <li class="logo"><a href="../view/dashboard.php">MNP Academy</a></li>
             </ul>
         </nav>
    </header>

    <div class="verticleLine"></div>

    <main>
        <h4 class="section-heading"><a href="../view/dashboard.php"><?=$_SESSION['name'] ?></a></h4>
            <div class="accountStuff">
                <ul class="stuff">
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="mycourse.php">Courses</a></li>
                    
                    <li><a href="blog.php">Blogs</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>

           

            <div class="editcourse">
                <button type="button" name="courcse">Edit Course</button>
            </div>
            <section>
                <h3 class="heading">My Cources</h3>
            </section>
            <div class="myCources">
                <ul class="science">
                    <h5>Science</h5>
                    <li>Physics</li>
                    <li>Mathematics</li>
                    <li>Chemistry</li>
                </ul>
                <ul class="programming language">
                    <h5>Programming Language</h5>
                    <li>C/C++</li>
                    <li>Python</li>
                </ul>
                <ul class="computer science">
                    <h5>Computer Science</h5>
                    <li>Introduction to Database</li>
                    <li>Introdouction to Programming Language</li>
                </ul>
            </div>
        </main> 

        <footer>
        </footer>
    </body>
</html>
