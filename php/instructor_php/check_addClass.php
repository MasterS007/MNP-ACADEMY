<?php
session_start();
require_once('../../services/courseService.php');
require_once('../../services/instructor_service/course_instructorService.php');

$insertValid=false;
    if(isset($_POST['check_class']))
    {
        $Nameclass = $_POST['className'];
        $isntructor_id = $_SESSION['userid'];
        $courseName= $_POST['courseName'];

        if(isset($Nameclass) && isset($isntructor_id) && isset($courseName))
        {
            $courseId= getByCourseName($courseName); //courseService
           
            $course_instr =
            [
                'instructor_id'=>$isntructor_id,
                'course_id'=>$courseId['course_id']

            ];

            $isInserted=insertIC($course_instr);  //method of course_instructorService.php 

            if( $isInserted)
            {
               echo "inserted";
                $insertValid=true;
                
            }

            else
            {
               echo "not inserted";
                $insertValid=false;
            }
        }
       
    }

 
?>