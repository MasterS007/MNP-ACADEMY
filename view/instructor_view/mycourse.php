<?php
       session_start();
       require_once('../../services/courseService.php');
       require_once('../../services/instructor_service/course_instructorService.php');
       if(!isset($_COOKIE['username']) ){
   
           header('location: ../login.php?error=invalid_request');
       }

 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../asset/all_designs/instructor_designs/cources_design.css"> <link rel>
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
                 <li class="logo"><a href="dashboard.php">MNP Academy</a></li>
             </ul>
         </nav>
    </header>

    <div class="verticleLine"></div>

    <main>
        <h4 class="section-heading"><a href="dashboard.php"><?=$_SESSION['name'] ?></a></h4>
            <div class="accountStuff">
                <ul class="stuff">
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="mycourse.php">Courses</a></li>
                    <li><a href="blog.php">Blogs</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>

        
            <section>
                <h3 class="heading">List of Courses</h3>
                <h4 class="someWords">These are the course category available right now on MNP Academy</h4>
            </section>

            <div class="myCources">
                   <ul class="courses">
                      <?php
                    // $Cid=$_SESSION['userid'];
                    // $courseId=getInsCourse($Cid); //from course_instructorService.php
                    // for($i=0; $i<count($courseId); $i++)
                    // {
                    //     $courseName =getByCourseId($courseId[$i]['course_id']);
                    //     $courseCategory=$courseName['course_category'];
                   $courseInfo =getAllCategory();

                for($i=0; $i<count($courseInfo); $i++)
                {       //$_SESSION['courseName']=$courseName['course_name'];
                        ?>
                        <li><a href="addCourses.php?courseCategory=<?=$courseInfo[$i]['category_name']?>"><?=$courseInfo[$i]['category_name']?></a>
                        <p>Some text..</p>  
                        </li>
                       

                <?php
                }
                ?>
                        
                </ul>
            </div>
        </main> 

        <footer>
        </footer>
    </body>
</html>
