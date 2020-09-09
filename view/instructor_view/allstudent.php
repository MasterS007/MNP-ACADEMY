<?php
     session_start();
     require_once('../../services/courseService.php');
     if(!isset($_SESSION['username'])){
 
         header('location: ../login.php?error=invalid_request');
     }
    $instructor_id= $_SESSION['userid'];

?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../asset/all_designs/instructor_designs/allstudents.css"> 
    <title>Students</title>
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
       
        <h4 class="section-heading"><a href="../view/dashboard.php"><?php echo $_SESSION['name'];?></a></h4>
            <div class="accountStuff">
                <ul class="stuff">
                    <li><a href="../view/profile.php">Profile</a></li>
                    <li><a href="../view/mycourse.php">Courses</a></li>
                    <li><a href="../view/blog.php">Blogs</a></li>
                    <li><a href="./php_and_js/php/logout.php">Logout</a></li>
                </ul>
            </div>
            <div class="wel">  
                  
                <ul class="wlist">
                    <li><a href="dashboard.php">Classes</a></li>
                    <li><a href="allstudent.php">Students</a></li>
                    <li><a href="#">Tips</a></li>
                </ul> 
                <hr>
           </div>

           <div class="students-list">
            <form onload=showAllStudent(<?php echo $instructor_id;?>)>
                <fieldset>
                    <legend class="title">Students List</legend>
                   <table class="student_table">
                    <tr >
                        <th calss="sHeading">Student Name</th>
                        <th calss="sHeading">Email</th>
                        <th calss="sHeading">Class</th>
                    </tr>
                    <tr>
                        <td colspan="3"><hr></td>
                    </tr>
                    <tr>
                        <td>Kakashi Hatake</td>
                        <td>hatake12@gmail.com</td>
                        <td>Science</td>
                    </tr>
                    <tr>
                        <td colspan="3"><hr></td>
                    </tr>
                   </table>
             </form>
            
    </main> 
    <footer>
    </footer>

    </body>
</html>



