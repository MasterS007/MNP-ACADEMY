<?php

    session_start();

     require_once('../../services/instructor_service/course_instructorService.php');
     require_once('../../services/courseService.php');
    //$filName= $_FILES['allfiles']['name'];
    //echo $filename;
    if(isset($_POST['checkInfo']))
    {   

        $data = json_decode($_POST['checkInfo']);
        $instructor_id= $data->instructor_id;
        $courseName =$data->courseName;

        $_SESSION['instructorId']=$instructor_id;
        $_SESSION['courseName']=$courseName;
        
        //echo $courseName;

    }
    
    if(isset($_POST['submit']))
    {
        $file_dir='../../asset/Class_Materials/'.$_FILES['allfiles']['name'];
        $fileName=$_FILES['allfiles']['name'];
        $fValid =false;
        //print_r($_FILES);
        
        if(move_uploaded_file($_FILES['allfiles']['tmp_name'], $file_dir))
        {
            $courseName=$_SESSION['courseName'];
            $courseId=getByCourseName($courseName);
            $course_id= $courseId['course_id'];
            $instructor_id=$_SESSION['instructorId'];
           
           // echo $file_dir;
            $materials=[
                'filesName'=>  $fileName,
                'instructorId'=> $_SESSION['instructorId'],
                'courseId'=> $course_id
            ];

            $showAllFiles=getCourseMaterial( $instructor_id, $course_id);
            for($i=0; $i<count($showAllFiles);$i++)
            {
                if($fileName!=$showAllFiles[$i]['items_name'])
                {
                    $fValid =true;
                }
                
                else
                {
                    $fValid =false;
                    
                }
           
            }
            
            if($fValid==true)
            {
                $validInsert =insertCourseMaterial($materials);
                        if( $validInsert)
                        {
                            header("location:../../view/instructor_view/files.php?courseName={$_SESSION['courseName']}");
                        }

                        else
                        {
                            header("location:../../view/instructor_view/files.php?courseName={$_SESSION['courseName']}&&Error=UnsecseefulInsert");
                        }
            
            }
            else
            {
                    header("location:../../view/instructor_view/files.php?courseName={$_SESSION['courseName']}&&Error=FileAlreadyExist");
            }
        }
        else
        {
            
            header("location:../../view/instructor_view/files.php?courseName={$_SESSION['courseName']}&&Error=UploadFaield");
        }
    }

    if(isset($_POST['checkFile']))
    {
        //echo $_POST['checkFile'];
        $fileName = $_POST['checkFile'];
        echo $fileName;

        
        
    }


?>