<?php

    session_start();
    require_once('../../services/courseService.php');
    require_once('../../services/instructor_service/course_instructorService.php');
    require_once('../../services/instructor_service/learner_instructorService.php');
    require_once('../../services/instructor_service/assignmentService.php');
    require_once('../../services/learner_service/learnerService.php');
    require_once('../../services/learner_service/learnerAssignmentService.php');
   
if(!isset($_COOKIE['username']) ){

        header('location: ../login.php?error=invalid_request');
    }

    $_SESSION['courseName']=$_GET['courseName'];
    

?>
<!DOCTYPE html>
 <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../asset/all_designs/instructor_designs/fileuploaddesign.css">
    <script type="text/javascript" src="../../asset/js/instructor_js/assignment.js"></script> 
    <title>Class Assignments</title>
</head>
<body>
    <header id="myHeader" >
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
        <h4 class="class_headeing">Class:<?=$_SESSION['courseName']?></h4>
    </div>

    <div class="class_materials">
        <ul>
                <li><a href="insideClass.php?courseName=<?= $_SESSION['courseName']?>">Learnerss</a></li>
                <li><a href="postStatus.php?courseName=<?= $_SESSION['courseName']?>">Post</a></li>
                <li><a href="files.php?courseName=<?= $_SESSION['courseName']?>">Class Materials</a></li>
                <li><a href="assignment.php?courseName=<?= $_SESSION['courseName']?>">Assignments</a></li>
                <!-- <li><a href="grade.php?courseName=<?= $_SESSION['courseName']?>">Grades</a></li> -->
                <li><a href="classSettings.php?courseName=<?= $_SESSION['courseName']?>">Settings</a></li>
    
        </ul>
    </div>

    <div class="files">
        <form>
           <fieldset class="upload_files">  
               <legend class="title_file">Learner Assignment Section</legend> 
                    <table class="materialsTable">
                        <td>Student Name</td>
                        <td>Question Id</td>
                        <td>Assignment File</td>
                        <td>Submited On</td>
                        <?php
                          $id =$_COOKIE['userid'];
                        $courseId= getByCourseName($_SESSION['courseName']);
                        $learnerId=showLearners($id, $_SESSION['courseName']);
                        // echo $_SESSION['courseName'];
                        // echo $courseId['course_id'];
                           
                            for($i=0; $i<count($learnerId); $i++)
                            {
                                $learnersName=getByID($learnerId[$i]['learner_id']);
                               // $questionId=$postedAssignment[$i]['question_id'];
                                $learnerAns = showLearnerAssignment($courseId['course_id'],$learnerId[$i]['learner_id']); //learnerAssignmentService
                                for($j=0; $j<count($learnerAns);$j++)
                                {
                                    //learnerService
                                    ?>
                                <tr>
                                    <td><?=$learnersName['u_name']?></td>
                                    <td><?= $learnerAns[$j]['question_id']?></td>
                                    <td><a href="../../asset/Class_Assignment/learnerAssignment/<?php echo   $learnerAns[$j]['assignment_name']?>" class="fileName" ><?php echo $learnerAns[$j]['assignment_name']?></a></td>
                                    <td><?php echo $learnerAns[$j]['dateNtime']?></td>
                                
                                </tr>
                                <tr><td colspan="4"><hr></td>
                                 </tr>
                                 <?php
                                }
                                
                            
                              
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