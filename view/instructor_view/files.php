<?php

    session_start();
    require_once('../../services/courseService.php');
    require_once('../../services/instructor_service/course_instructorService.php');
    require_once('../../services/instructor_service/learner_instructorService.php');
    if(!isset($_SESSION['username'])){

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
    <script type="text/javascript" src="../../asset/js/instructor_js/classMaterials.js"></script> 
    <title>Class Files</title>
</head>
<body >
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
                <li><a href="postComment.php?courseName=<?= $_SESSION['courseName']?>">Post</a></li>
                <li><a href="files.php?courseName=<?= $_SESSION['courseName']?>">Class Materials</a></li>
                <li><a href="#">Assignments</a></li>
                <li><a href="grade.php?courseName=<?= $_SESSION['courseName']?>">Grades</a></li>
                <li><a href="#">Settings</a></li>
    
        </ul>
    </div>

    <div class="files">
        <form action="../../php/instructor_php/metarialCheck.php" method="POST" enctype="multipart/form-data">
           <fieldset class="upload_files">  
               <legend class="title_file">File</legend> 

               <?php
                $courseId=  $courseId=getByCourseName($_SESSION['courseName']);
                // echo $_SESSION['courseName'];
                // echo $courseId['course_id'];
                $id =$_SESSION['userid'];

                    $courseMaterials= getCourseMaterial($id, $courseId['course_id']);
                    $file_dir=scandir("../../asset/Class_Materials");
                    for($i=0; $i<count($courseMaterials); $i++)
                    {
                           for($j=2; $j<count($file_dir); $j++)
                           { 
                            if($file_dir[$j]==$courseMaterials[$i]['items_name'])
                             {
                            ?>
                            <p>
                            <a href="../../asset/Class_Materials/<?php echo $file_dir[$j]?>"><?php echo $file_dir[$j]?><hr></a>
                        </p><?php
                        }
                            
                         }
                    }
               ?>
                <i id="uploadMsg"></i>
            </fieldset>
            <input type="file" name="allfiles" class="uploadbox" id="uploadbox" >
            <input type="text" id="spnFilePath" value="<?= $_SESSION['courseName']?>" style="display:none" >
             <input type="submit" name="submit" value="Upload" class="btn_upload" id="btn_upload" onclick="UploadFile(<?=$_SESSION['userid']?>)">
        </form>
    </div>
</main>

<footer>

</footer>
</body>
</html>