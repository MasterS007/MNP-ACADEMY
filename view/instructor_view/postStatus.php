<?php
 session_start();
 require_once('../../services/courseService.php');
 require_once('../../services/instructor_service/course_instructorService.php');
 require_once('../../services/instructor_service/learner_instructorService.php');
 require_once('../../services/instructor_service/instructorService.php');
 require_once('../../services/instructor_service/postService.php');

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
    <script type="text/javascript" src="../../asset/js/instructor_js/statusSection.js"></script>

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
            <form>
            <div class="status">
                <input type="text" value="<?=$indtId?>" id="instructorId" style="display:none;">
    
               <textarea name="statusBox" placeholder="write from here..." class="statusBox" id="statusBox" onkeyup="removeError()"></textarea>
               <br>
                <i id="errorMsg" style=" font-size:12px; color:red;"></i>
                <input type="button"  value="Post" class="post" id="post" onclick="postStatus()">
            </div>
           <form> 
           <span id="comment_msg"></span>
           <br>
           <?php
           $statusAll=showPost($indtId);
           $getUsername =getByInstructorsID($indtId);

           for($i=0;$i<count($statusAll);$i++)
           {
               ?>
               <div id="display_Status"> 
                   <div class="posterInfo">
                        <h5>Posted By_<?=$getUsername['u_name']?></h5>
                        <h6><?=$statusAll[$i]['dateNtime'];?></h6>
                        <a href="../../php/instructor_php/postCheck.php?statusId=<?=$statusAll[$i]['status_id']?>"><input type="button" value="Delete Post" ></a>
                    </div>
               
                <div class="textStatus"> 
               <p> <?php echo nl2br($statusAll[$i]['status_topic']);?></p>
                </div>
                <div class="reply">
                    <input type="button" value="Reply" class="replyBtn">
                </div><br><br>
                <?php
           }
           ?>

           
        </div>
    </main>

    <footer>
    
    </footer>
</body>
</html>
