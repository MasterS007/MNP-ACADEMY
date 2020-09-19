<?php

    session_start();
     require_once('../../services/courseService.php');
     require_once('../../services/Admin_service/courseService.php');
     if(isset($_POST['checkCourseInfo']))
    {   

        $data = json_decode($_POST['checkCourseInfo']);
        $course_name =$data->course_name;
        $_SESSION['course_name']= $course_name;
        $course_category =$data->course_category;
        $_SESSION['course_category']=$course_category;
        
        echo $course_category;

    }

    if(isset($_POST['submit']))
    {
         $course_name=$_SESSION['course_name'];
         $course_category=$_SESSION['course_category'];    
        if(empty($course_name)||empty($course_category))
        {
            echo "Null Submission";
        }
        else{
           
            $course=[
                'course_name'=>$course_name,
                'course_category'=>$course_category
            ];
                $valid_course =insertCourses($course);
                        if( $valid_course)
                        {
                            header("location:../../view/Admin_view/coursesView.php?course_name={$_SESSION['course_name']}");
                        }

                        else
                        {
                            
                            echo "error";
                           // header("location:../../view/instructor_view/files.php?courseName={$_SESSION['courseName']}&&Error=UnsecseefulInsert");
                        }
            // }
            // else
            // {
            //         header("location:../../view/instructor_view/files.php?courseName={$_SESSION['courseName']}&&Error=FileAlreadyExist");
            // }
        }
        else
        {
            
            header("location:../../view/instructor_view/files.php?courseName={$_SESSION['courseName']}&&Error=UploadFaield");
        }
    }




    ?>