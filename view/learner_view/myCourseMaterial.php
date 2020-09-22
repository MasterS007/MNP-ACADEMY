<?php
    
      session_start();
      
      require_once('../../services/instructor_service/classmaterialService.php');
      require_once("../../services/learner_service/learnerAssignmentService.php");
      require_once('../../services/courseService.php');

      $id= $_SESSION['userid'];
      if(!isset($_COOKIE['username']) ){
  
          header('location: ../login.php?error=invalid_request');
      }
      
      $courseid=$_GET['courseid'];
      $instructorId=$_GET['instructorId'];

?>


<!DOCTYPE html>
<html>
<head>
    <title>My Course Material</title>
    
    <!-- <link rel="stylesheet" type="text/css" href="../../asset/all_designs/learner_designs/aboutUsStyle.css"> -->
    
   
</head>


<body>
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
                <a href="#" class="logout_btn">Logout</a>
            </div>
           </ul>
    </nav>
    </header>
    <div class="files">
        <form action="../../php/instructor_php/assignmentCheck.php" method="POST" enctype="multipart/form-data">
           <fieldset class="upload_files" style="width:250px;">  
               <legend class="title_file">Assignment Section</legend> 
                    <table class="materialsTable" width="100%">
                        <tr>
                            <th colspan="2">Files Name</th>
                            
                        </tr>
                        <tr><td colspan="2"><hr></td></tr>
                        <?php
                        $courseId= $courseId=getByCourseName($_SESSION['courseName']);
                        // echo $_SESSION['courseName'];
                        // echo $courseId['course_id'];
                       // $id =$_SESSION['userid'];

                            $courseMaterials= getAssignment($instructorId, $courseId['course_id']);
                            //$file_dir=scandir("../../asset/Class_Materials");
                            for($i=0; $i<count($courseMaterials); $i++)
                            {
                                ?>
                                <tr>
                                    <td><input type="button" value="random"></td>
                                        
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
            <!-- <input type="file" name="allassignments" class="uploadbox" id="uploadbox" >
            <input type="text" id="spnFilePath" value="<?//= $_SESSION['courseName']?>" style="display:none" >
             <input type="submit" name="submit" value="Upload" class="btn_upload" id="btn_upload" onclick="UploadAssignment(<?//=$_SESSION['userid']?>)"> -->
        </form>
    </div>
</main>

<footer>

</footer>
</body>
</html>