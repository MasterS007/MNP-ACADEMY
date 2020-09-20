<?php

    session_start();
     require_once('../../services/courseService.php');
     if(isset($_POST['checkDelete']))
     {
        $course_name=$_POST['checkDelete'];
        $validDelete =deleteByCoursename($course_name);

        if($validDelete==true)
        {
            echo "Delete Successful";
        }
        else
        {
            echo "Delete Failed!";
        }

     }
     if(isset($_POST['checkCourse']))
     {
        $course_name=$_POST['checkCourse'];
         $existCourse = getByCourseName($course_name);

            if(!empty($existCourse))
            {
                echo "Course Alreday Exist!";

            }
            else
            {
                echo "";
            }

     }
     if(isset($_POST['checkCourseInfo']))
    {   
        $validCourse=false;
        $data = json_decode($_POST['checkCourseInfo']);
        $course_name =$data->course_name;
        $course_category =$data->course_category;
        //$_SESSION['course_name']= $course_name;
        if(empty($course_name)||empty($course_category))
        {
            echo "Null Submission";
        }

        else if(!empty($course_name))
        {
            $existCourse = getByCourseName($course_name);

            if(isset($existCourse))
            {
                // echo "Course Alreday Exist!";
                $validCourse=true;
            }
        }
        else{
           
           $course=[
             'course_name'=>$course_name,
              'course_category'=>$course_category
            ];
            $valid_course =insertCourses($course);
            if( $valid_course)
            {
              echo "inserted";
              //header("location:../../view/Admin_view/coursesView.php?");
            }
        
            else
            {
                echo "error";
           
            }
        
        

            }
     }




     
    ?>