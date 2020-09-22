<?php

    session_start();
    require_once('../../services/courseService.php');
    require_once('../../services/instructor_service/course_instructorService.php');
    require_once('../../services/instructor_service/learner_instructorService.php');
    require_once('../../services/instructor_service/classmaterialService.php');
    if(!isset($_SESSION['username'])){

        header('location: ../login.php?error=invalid_request');
    }

    //$_SESSION['courseName']=$_GET['courseName'];
    

?>
<!DOCTYPE html>
 <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../asset/all_designs/instructor_designs/fileuploaddesign.css">
    <script type="text/javascript" src="../../asset/js/instructor_js/classMaterials.js"></script> 
    <title>Class Files</title>
</head>
<body>
    <header id="myHeader" >
        <nav>
        
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
                <li><a href="files.php?courseName=<?= $_SESSION['courseName']?>">Class Materials</a></li>
    
        </ul>
    </div>

    <div class="files">
        <form action="../../php/instructor_php/metarialCheck.php" method="POST" enctype="multipart/form-data">
           <fieldset class="upload_files">  
               <legend class="title_file">Class Materials</legend> 
                    <table class="materialsTable">
                        <tr>
                            <th colspan="2">Files Name</th>
                            
                        </tr>
                        <tr><td colspan="2"><hr></td></tr>
                        <?php
                        $courseId=  $courseId=getByCourseName($_SESSION['courseName']);
                        // echo $_SESSION['courseName'];
                        // echo $courseId['course_id'];
                        $id =$_SESSION['userid'];

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
           
        </form>
    </div>
</main>


<!-- <script type="text/javascript" src="../../asset/js/instructor_js/classMaterials.js"></script>  -->
</body>
</html>