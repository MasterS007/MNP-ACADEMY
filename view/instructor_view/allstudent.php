<?php
     session_start();
     require_once('../../services/instructor_service/learner_instructorService.php');
     require_once('../../services/courseService.php');
     require_once('../../services/instructor_service/instructorService.php');
     
     $instructor_id= $_SESSION['userid'];
    
if(!isset($_COOKIE['username']) ){
 
         header('location: ../login.php?error=invalid_request');
     }

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
                 <li class="logo"><a href="dashboard.php">MNP Academy</a></li>
             </ul>
         </nav>
    </header>

        <div class="verticleLine"></div>

    <main>
    <div class="image-profile">
           <?php
            $proPic= getAllFromInst($instructor_id);
           ?>
        <img src="../../asset/instructor_profilepic/<?= $proPic['picture']?> " class="profile_picture">
    </div>
        <h4 class="section-heading"><a href="dashboard.php"><?php echo $_SESSION['name'];?></a></h4>
            <div class="accountStuff">
                <ul class="stuff">
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="mycourse.php">Courses</a></li>
                    <li><a href="blog.php">Blogs</a></li>
                    <li><a href="../../php/logout.php">Logout</a></li>
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
            <form >
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
                 
                     <?php
                         $learners = getLearnerId($instructor_id);
                         for($i=0; $i< count($learners);$i++)
                    {        $learners_info=getByLearnerID($learners[$i]['learner_id']); //from users table of learner_instructorService.php
                             $courseName=getByCourseId($learners[$i]['course_id']);// from courseService.php?>
                        <tr>
                            <td><?= $learners_info['u_name'] ?></td>
                            <td><?= $learners_info['email'] ?></td>
                            <td><?=$courseName['course_name']?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><hr></td>
                        </tr>

                  <?php  }

                      
                    ?> 
                   </table>
             </form>
            
    </main> 
    <footer>
    </footer>

    </body>
</html>



