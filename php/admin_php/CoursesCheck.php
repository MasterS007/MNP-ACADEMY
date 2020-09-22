<?php

    session_start();
     require_once('../../services/courseService.php');
     require_once('../../services/instructor_service/learner_instructorService.php');
     require_once('../../services/instructor_service/course_instructorService.php');
     require_once('../../services/instructor_service/classmaterialService.php');
     require_once('../../services/instructor_service/assignmentService.php');

     //Delete Courses
if(isset($_GET['courseName']))
{
$coursename=$_GET['courseName'];
$course_id =  getByCourseName($coursename);
//

$validCourseMateril = deleteMaterialByCourseId($course_id['course_id']);
$validAssignment = deleteAssignmentByCourseid($course_id['course_id']);
$validLearner= deleteLearnerByCourseId($course_id['course_id']);
$validInstrutor=deleteInstructorByCourseId($course_id['course_id']); //course_instructorService.php
$validDelete =deleteByCoursename($coursename); 

if($validDelete==true)
{
    //echo "Delete Successful";
    header("location:../../view/Admin_view/coursesView.php?Message:DeleteSuccessFul");
}
else
{
     //echo "Delete Failed!";
    header("location:../../view/Admin_view/coursesView.php?Message:DeleteFailed");
}

}

//Insert Courses
if(isset($_POST['checkCourse']))
{
$coursename=$_POST['checkCourse'];
    $existCourse = getByCourseName($coursename);

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
       // echo $course_name;
        $_SESSION['course_name']= $course_name;

        
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
            
            else
            {
                $course=[
                    'course_name'=>$course_name,
                     'course_category'=> $course_category
                   ];
                 // echo $course_name."     ".$course_category;
            
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
        
        

            
     }




     
    ?>