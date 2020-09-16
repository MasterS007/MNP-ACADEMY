<?php


session_start();
require_once('../../services/instructor_service/course_instructorService.php');
require_once('../../services/instructor_service/classmaterialService.php');
require_once('../../services/instructor_service/learner_instructorService.php');
require_once('../../services/courseService.php');
//$filName= $_FILES['allfiles']['name'];
//echo $filename;
if(isset($_POST['checkInfo']))
{   
   $data = json_decode($_POST['checkInfo']);
   $_SESSION['instructorId']= $data->instructor_id;
   $courseName =$data->courseName;
   $_SESSION['courseName']=$courseName;
   
   $courseId=  getByCourseName($courseName); //from courseService.php
   //echo $courseId['course_id'];
   $learnersId= showLearners($_SESSION['instructorId'], $courseName); //from learner_instructorService.php
   $classMaterials = getCourseMaterial($_SESSION['instructorId'], $courseId); //from classmaterialService

   for($i=0; $i<count($learnersId);$i++)
   {
      // echo $learnersId[$i]['learner_id'];
   }

   for($i=0; $i<count($classMaterials);$i++)
   {
       echo  $classMaterials[$i]['info_id'];
   }
   
}

?>