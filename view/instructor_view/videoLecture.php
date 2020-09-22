<?php
       session_start();
       require_once('../../services/courseService.php');
       require_once('../../services/instructor_service/course_instructorService.php');
       require_once('../../services/instructor_service/instructorService.php');
       if(!isset($_COOKIE['username']) ){
   
           header('location: ../login.php?error=invalid_request');
       }
       $indtId= $_COOKIE['userid'];
       $instinfo =getByInstructorsID($indtId);
       $instName =  $instinfo['u_name'];
 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../asset/all_designs/instructor_designs/cources_design.css"> <link rel>
    <title>Video Lectures</title>
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
    <div class="image-container">
           <?php
            $proPic= getAllFromInst($indtId);
            if($proPic['picture']!=NULL)
            {
                ?>
                <img src="../../asset/instructor_profilepic/<?= $proPic['picture']?> " class="profile_picture">
                <?php
            }
            else
            {?>
                <img src="../../asset/instructor_profilepic/profile.ico" class="profile_picture">
                    <?php
            }?>
        </div>
        <h4 class="section-heading"><a href="dashboard.php"><?=$instName?></a></h4>
            <div class="accountStuff">
                <ul class="stuff">
                <li><a href="profile.php">Profile</a></li>
                    <li><a href="mycourse.php">Courses</a></li>
                    <li><a href="blog.php">Blogs</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="../../php/logout.php">Logout</a></li>
                </ul>
            </div>

            
            <div class="uploadVideo ">
                <form action="../../php/instructor_php/videoUploadCheck.php" method="POST" enctype="multipart/form-data">

                <fieldset class="upload_files">  
               <legend class="title_file">All Video Lectures</legend> 
                    <table class="materialsTable">
                        <tr>
                            <th colspan="2">Files Name</th>
                            
                        </tr>
                        <tr><td colspan="2"><hr></td></tr>
                        <?php
                        $courseId=  $courseId=getByCourseName($_SESSION['courseName']);
                        // echo $_SESSION['courseName'];
                        // echo $courseId['course_id'];
                        $id =$_COOKIE['userid'];

                            $courseMaterials= getCourseMaterial($id, $courseId['course_id']);
                            //$file_dir=scandir("../../asset/Class_Materials");
                            for($i=0; $i<count($courseMaterials); $i++)
                            {
                                ?>
                                <tr>
                                    <td><a href="../../asset/Class_Materials/<?php echo $courseMaterials[$i]['items_name']?>" class="fileName" ><?php echo $courseMaterials[$i]['items_name']?></a></td>
                                    <td><?php echo $courseMaterials[$i]['dateNtime']?></td>
                                    <td>
                                        <a href="../../php/instructor_php/metarialCheck.php?FileName=<?=$courseMaterials[$i]['items_name']?>&&courseName=<?= $_SESSION['courseName']?>">
                                          <input type="button"  value="Delete" class="deleteFile" onclick="return confirm('Are you want to delete <?=$courseMaterials[$i]['items_name']?>?')" >
                                          </a>
                
                                        
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
            <input type="file" name="allvideofiles" class="uploadbox" id="uploadbox" >
            <input type="text" id="spnFilePath" value="<?= $_SESSION['courseName']?>" style="display:none" >
             <input type="submit" name="submit" value="Upload" class="btn_upload" id="btn_upload" onclick="UploadFile(<?=$_COOKIE['userid']?>)">
        </form>
            </div>

            <section>
                <h3 class="heading">All Video Lectures</h3>
            </section>

            <div class="myCources">
                   <ul class="courses">

                   <iframe width="420" height="315"
                        src="https://www.youtube.com/embed/tgbNymZ7vqY">
                    </iframe>
                      <?php
                    // $Cid=$_SESSION['userid'];
                    // $courseId=getInsCourse($Cid); //from course_instructorService.php
                    // for($i=0; $i<count($courseId); $i++)
                    // {
                    //     $courseName =getByCourseId($courseId[$i]['course_id']);
                //     //     $courseCategory=$courseName['course_category'];
                //    $courseInfo =getAllCategory();

                // for($i=0; $i<count($courseInfo); $i++)
                // {       //$_SESSION['courseName']=$courseName['course_name'];
                //         ?>
                     <!-- <li><a href="addCourses.php?courseCategory=<?=$courseInfo[$i]['category_name']?>"><?=$courseInfo[$i]['category_name']?></a>
                       <p>Some text..</p>  
                       </li> -->
                       

                 <?php
                // }
                // ?>
                        
                </ul>
            </div>
        </main> 

        <footer>
        </footer>
    </body>
</html>
