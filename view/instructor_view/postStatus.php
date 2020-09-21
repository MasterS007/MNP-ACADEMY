<?php
 session_start();
 require_once('../../services/courseService.php');
 require_once('../../services/instructor_service/course_instructorService.php');
 require_once('../../services/instructor_service/learner_instructorService.php');
 require_once('../../services/instructor_service/instructorService.php');
 require_once('../../services/instructor_service/postService.php');
 require_once('../../services/instructor_service/commentService.php');

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
                <li><a href="postStatus.php?courseName=<?= $_SESSION['courseName']?>">Post</a></li>
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
                <input type="text" value="<?=$_SESSION['courseName']?>" id="courseName" style="display:none;">
    
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
               <div id="display_Status" class="display_Status"> 
                   <div class="posterInfo">
                        <h5>Posted By_<?=$getUsername['u_name']?></h5>
                        <h6><?=$statusAll[$i]['dateNtime'];?></h6>
                        <a href="../../php/instructor_php/postsCheck.php?statusId=<?=$statusAll[$i]['status_id']?>&& courseName=<?= $_SESSION['courseName']?>" class="deleteBtna">
                        <input type="button" value="Delete Post" class="deleteBtn" onclick="return confirm('Are you sure you want to delete the post?')">
                        </a>
                    </div>
                     <div class="textStatus"> 
                    <p> <?php echo nl2br($statusAll[$i]['status_topic']);?></p>
                    </div>
                    <div class="reply">
                        
                      <?php
                    //    for($j=0; $j<count())
                      ?>
                         <a href="postStatus.php?statusId=<?=$statusAll[$i]['status_id']?>&& courseName=<?=$_SESSION['courseName']?>"><input type="button" value="Reply" class="replyBtn" id="replyBtn"></a>
                        
                    </div>
                    <?php
                        $getAllComment=getAllComments($statusAll[$i]['status_id']); //from commentService.php;
                        if($getAllComment!=false)
                        {
                            for($j=0; $j<count($getAllComment);$j++)
                        {
                            ?>
                            <div class="commenterInfo">
                            <h5>Posted By_<?=$getUsername['u_name']?></h5>
                            <h6><?=$getAllComment[$j]['dateNtime'];?></h6>
                            </div>
                            <div class="allComments">
                            <p> <?php echo nl2br($getAllComment[$j]['comments']);?></p>
                            </div>
                            <?php
                        }
                    }
                        
                    ?>
                    
               </div>
                <br><br>
                <?php
           }
           ?>
           <form>
           <?php

                if(isset($_GET['statusId']))
                {   
                    $statusId=$_GET['statusId'];
                    ?>
                   <input type="text" value="<?=$statusId?>" id="statusId" style="display:none;" >
                   <input type="text" value="<?=$indtId?>" id="comenterId" style="display:none;">
                        <input type="hidden" value="<?=$i?>" id="commentNum">
                        <textarea name="commentBox" placeholder="write from here..." class="commentBox" id="commentBox" onkeyup="removeErr()" ></textarea>
                        <br>
                         <i id="erMsg" class="erMsg" style=" font-size:12px; color:red;"></i>
                         
                         <input type="button" value="Comment" class="postCommentBtn" id="postComment" onclick="commentReply()">  
                      
                <?php
                }?>
                   
          </form>
           
           
        </div>
    </main>

    <footer>
    
    </footer>
</body>
</html>
