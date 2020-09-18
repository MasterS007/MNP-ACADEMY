<?php
session_start();
require_once('../../services/courseService.php');
require_once('../../services/instructor_service/course_instructorService.php');

$insertValid=false;
    if(isset($_POST['check_class']))
    {
        $alldata=json_decode($_POST['check_class']);
        $Nameclass = $alldata->className;
        $isntructor_id = $_SESSION['userid'];
        $courseName= $alldata->courseName;
        $_SESSION['courseName']=$courseName;
      // echo $courseName;

         if(!empty($Nameclass) && !empty($isntructor_id) && !empty($courseName))
        {
            $courseId= getByCourseName($courseName); //courseService
           
            $course_instr =
            [
                'instructor_id'=>$isntructor_id,
                'course_id'=>$courseId['course_id']

            ];

          
            $isInserted=insertIC($course_instr);  //method of course_instructorService.php 

            if($isInserted)
            {
               // echo "inserted";
                $insertValid=true;
                
            }

            else
            {
              // echo "not inserted";
                $insertValid=false;
            }
        }
       
    }

 
?>