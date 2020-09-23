<?php
     session_start();
     require_once('../../services/courseService.php');
     require_once('../../services/instructor_service/course_instructorService.php');
     require_once('../../services/instructor_service/videoLectureService.php');
    
if(!isset($_COOKIE['username']) ){
 
         header('location: ../login.php?error=invalid_request');
     }

     $_SESSION['courseName']=$_GET['courseName'];
     $Insid=$_COOKIE['userid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../asset/all_designs/instructor_designs/insideclassdesign.css">
    <script type="text/javascript" src="../../asset/js/instructor_js/videoUpload.js"></script>

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
                <li><a href="postStatus.php?courseName=<?= $_SESSION['courseName']?>">Post</a></li>
                <li><a href="files.php?courseName=<?= $_SESSION['courseName']?>">Class Materials</a></li>
                <li><a href="assignment.php?courseName=<?= $_SESSION['courseName']?>">Assignments</a></li>
                <li><a href="videoLecture.php?courseName=<?= $_SESSION['courseName']?>">Video Lectures</a></li> 
                <li><a href="classSettings.php?courseName=<?= $_SESSION['courseName']?>">Settings</a></li>
             
            </ul>
        </div>

        <div class="students">
            <form>
                <fieldset>
                   <legend class="title">Video Lectures</legend>
                   <input type="text" value="<?= $_SESSION['courseName']?>" id="courseName" style="display:none;">
                   <table class="student_table">
                    <tr>
                        <td style="color:#589; font-size:17px; text-decoration: solid;">
                        Link of lecture: <input type="text" name="linkvideo" id="linkVideo" onkeyup="remover()">
                        <br><i id="errorMsg" style=" font-size:10px; color: red;"></i>
                        </td>
    
                        <td style="color:#589; font-size:17px;">
                        <input type="button" value="Upload Link" onclick="lectureUpload(<?=$Insid?>)">
                        </td>

                    <tr>
                    <tr>
                        <td colspan="3"><hr></td>
                    </tr>
                    <?php
                     $Insid=$_COOKIE['userid'];
                     $courseName=$_SESSION['courseName'];
                     $courseId=getByCourseName($courseName);
                    $lectures=showLectures($Insid,  $courseId['course_id']);
                     for($i=0; $i<count($lectures);$i++)
                     {
                        ?>
                        <tr>
                        <td>
                       <iframe width="420" height="280" src="https://www.youtube.com/<?php echo trim($lectures['lecture_name'],"<")?>" type="video">
                       </iframe>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3"><hr></td>
                    </tr>
                    <?php
                     }
                    
                    ?>
                   </table>        
                </fieldset>
            </form>
        </div>
    </main>

    <footer>
    
    </footer>
</body>
</html>
