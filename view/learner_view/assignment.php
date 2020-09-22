<?php

    session_start();
    require_once('../../services/courseService.php');
    require_once('../../services/instructor_service/course_instructorService.php');
    require_once('../../services/instructor_service/learner_instructorService.php');
    require_once('../../services/instructor_service/assignmentService.php');
    if(!isset($_SESSION['username'])){

        header('location: ../login.php?error=invalid_request');
    }
    $myid =$_SESSION['userid'];
   
   
    $course_name=$_GET['course_name'];
    $instructor_name=$_GET['instructor_name'];
    $course_id=$_GET['courseId'];
    $instructor_id=$_GET['instructorId'];

    

?>
<!DOCTYPE html>
 <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../asset/all_designs/learner_designs/forumStyle.css">
    <script type="text/javascript" src="../../asset/js/learner_js/assignment.js"></script> 
    <title>Class Assignments</title>
</head>

    <header>
        <div class="left_area" >
            <h3> MNP <span>ACADEMY</span> </h3>  
          </div>
        <nav>
            <ul class="nav-links">
            <li><a href="dashboard.php">Home</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <li><a href="tips.php">Tips</a></li>
                <li><a href="#">Forum</a></li>
            
            </ul>
        </nav>
        <nav>
            <ul class="nav-links">
           
            <div class="right_area"> 
                <a href="../../php/logout.php" class="logout_btn">Logout</a>
            </div>
           </ul>
    </nav>
    </header>


    <body>
    <div class="files">
        <form action="../../php/learner_php/assignmentCheck.php" method="POST" enctype="multipart/form-data">
           <fieldset class="upload_files">  
               <legend class="title_file">Assignment Section</legend> 
                    <table class="materialsTable">
                        <tr>
                            <th colspan="2">Files Name</th>
                            
                        </tr>
                        <tr><td colspan="2"><hr></td></tr>
                        <?php
                       
                        
                        

                            $courseMaterials= getAssignment($instructor_id, $course_id);
                            //$file_dir=scandir("../../asset/Class_Materials");
                            for($i=0; $i<count($courseMaterials); $i++)
                            {
                                $assignmentId=$courseMaterials[$i]['question_id'];
                                ?>
                                   
                                <tr>
                                    <td><a href="../../asset/Class_Assignment/<?php echo $courseMaterials[$i]['assignment_name']?>" class="fileName" name="assignmentName"><?php echo $courseMaterials[$i]['assignment_name']?></a></td>
                                    <td><?php echo $courseMaterials[$i]['dateNtime']?></td>
                                    <td>
                                         
                                        <!-- <a  href="../../php/learner_php/assignmentCheck.php?FileName=<?//=$courseMaterials[$i]['assignment_name']?>&&courseName=<?//= $_SESSION['courseName']?>" name="assignmentName">
                                           select assignment
                                        </a> -->
                                        <input type="submit" name="assignmentUpload" value="Submit">
                                        <input type="file" name="submitAssignment" value="Submit">
                                        
                                     
            
                                        
                                    </td>
                                        
                                </tr>
                                <tr><td colspan="2"><hr></td>
                                 
                                 </tr>
                                    
                                  <?php       
                            }
                            if(isset($_GET['FileName']))
                            {
                             ?>
                             <input type="text" id="fileName" value="<?=$_GET['FileName'] ?> " style="display:none;" >
                             <?php
                            }
                            else
                            {?>
                                <input type="text" id="fileName" style="display: none;" >

                                <?php
                            }
                            
                            ?>
        
                    </table>
              
            </fieldset>
            
           
             
        </form>
    </div>
</main>


</body>
</html>

</body>
</html>