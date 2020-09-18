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
   $classMaterials = getCourseMaterial($_SESSION['instructorId'], $courseId['course_id']); //from classmaterialService
   //echo $_SESSION['instructorId'];
   $valid=false;
   
  // if($learnersId!=false)
  // {
//       for($i=0; $i<count($learnersId);$i++)
//    {
//       $deleteValid =deleteLearnerInstructor($_SESSION['instructorId'], $learnersId[$i]['learner_id'], $courseId['course_id']);
//       if($deleteValid)
//       {
//          $valid=true;
//       }
//       // echo $learnersId[$i]['learner_id'];
//    }

//   // }
   
//    // if($classMaterials!=false)
//   // {
//       for($i=0; $i<count($classMaterials);$i++)
//       {
//          $validdelMat= deleteMaterials($_SESSION['instructorId'], $courseId['course_id']);
//         //echo  $classMaterials[$i]['info_id'];
//         if($validdelMat)
//         {
//            $valid=true;
//         }
//       }
  // }
  //;
   // $_SESSION['deleteclass']=="deletekorsi";
   // header("location:../../view/instructor_view/classSettings.php?deleteclass=OK && course_id={$courseId['course_id']}&& courseName=$courseName");
   
  $valDeleteClass= courseDeleteInstructor($_SESSION['instructorId'], $courseId['course_id']); //from course_instructorService.php

   // if($valid==true)
   // {
     // echo "class material r learner delete successful";
   // }


   if($valDeleteClass==true)
   {
      echo "course from instructor delete hyse";
      header("location:../../view/instructor_view/dashboard.php");

   }

   else 
   {
      echo "course from instructor delete hytese NA";
     
    // header("location:../../php/instructor_php/classSettingCheck.php");

  }
   // else
   // {
   //    echo "delete UNsuccessful";
   // }

}

?>