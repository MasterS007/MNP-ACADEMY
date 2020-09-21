<?php
 session_start();
 require_once('../../services/courseService.php');
 require_once('../../services/instructor_service/course_instructorService.php');
 require_once('../../services/instructor_service/learner_instructorService.php');

if(!isset($_COOKIE['username']) )
{
    header('location: ../login.php?error=invalid_request');
}
  $indtId= $_COOKIE['userid'];

$_SESSION['courseName']=$_GET['courseName'];
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../asset/all_designs/instructor_designs/postStatusdesign.css">

    <title>Class Materials</title>
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
                        <option value="<?php echo $courseN[$i]['course_name'];?>"><?php echo $courseN[$i]['course_name'];?>
                        </option>
                    <?php }?>
                    </optgroup>
                <optgroup label="Computer Science">
                <?php
                    $courseN = getByCategory('Computer Science');
                    for ($i=0; $i<count($courseN); $i++)
                    { ?>
                        <option value="<?php echo $courseN[$i]['course_name'];?>"><?php echo$courseN[$i]['course_name'];?>
                        </option>
                    <?php }?>

                </optgroup>
                <optgroup label="Programming Language">
                <?php
                    $courseN = getByCategory('Programming Language');
                    for ($i=0; $i<count($courseN); $i++)
                    { ?>
                        <option value="<?php echo $courseN[$i]['course_name'];?>"><?php echo$courseN[$i]['course_name'];?>
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
        <div>
            <h4 class="class_headeing" id="class_heading">Class: <?= $_SESSION['courseName']?></h4>
        </div>

        <div class="class_materials">
            <ul>
                <li><a href="insideClass.php?courseName=<?= $_SESSION['courseName']?>">Learnerss</a></li>
                <li><a href="postComment.php?courseName=<?= $_SESSION['courseName']?>">Post</a></li>
                <li><a href="files.php?courseName=<?= $_SESSION['courseName']?>">Class Materials</a></li>
                <li><a href="assignment.php?courseName=<?= $_SESSION['courseName']?>">Assignments</a></li>
                <li><a href="grade.php?courseName=<?= $_SESSION['courseName']?>">Grades</a></li>
                <li><a href="classSettings.php?courseName=<?= $_SESSION['courseName']?>">Settings</a></li>
             
            </ul>
        </div>

        <div class="mainDiv">
            <h4 class="titleConver">Start new conversation</h4>
            <div class="status">
                <textarea class="statusBox">
                    </textarea>
            </div>
        </div>
    </main>

    <footer>
    
    </footer>
</body>
</html>
