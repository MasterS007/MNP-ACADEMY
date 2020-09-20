<?php
session_start();
require_once('../../services/instructor_service/course_instructorService.php');
require_once('../../services/instructor_service/classmaterialService.php');
require_once('../../services/instructor_service/learner_instructorService.php');
require_once('../../services/instructor_service/assignmentService.php');
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
   $_SESSION['course_id']=$courseId['course_id'];
   $learnersId= showLearners($_SESSION['instructorId'], $courseName); //from learner_instructorService.php
   $classMaterials = getCourseMaterial($_SESSION['instructorId'], $courseId['course_id']); //from classmaterialService.php
   $assingments = getAssignment($_SESSION['instructorId'], $courseId['course_id']); //from assignmentService.php
  // echo $_SESSION['instructorId'];
   $valid=false;
  
   
  if($learnersId!=false)
  {
      for($i=0; $i<count($learnersId);$i++)
   {
      $deleteValid =deleteLearnerInstructor($_SESSION['instructorId'], $learnersId[$i]['learner_id'], $courseId['course_id']);
      if($deleteValid)
      {
         $valid=true;
      }
      // echo $learnersId[$i]['learner_id'];
   }

   }
   
    if($classMaterials!=false)
   {
      for($i=0; $i<count($classMaterials);$i++)
      {
         $validdelMat= deleteMaterials($_SESSION['instructorId'], $courseId['course_id']);
        //echo  $classMaterials[$i]['info_id'];
        if($validdelMat)
        {
           $valid=true;
        }
      }
  }

  if($assingments!=false)
   {
      for($i=0; $i<count($classMaterials);$i++)
      {
         $validassignm= deleteAssignment($_SESSION['instructorId'], $courseId['course_id']);
        //echo  $classMaterials[$i]['info_id'];
        if($validassignm)
        {
           $valid=true;
        }
      }
  }

   $valDeleteClass=  deleteInstrCourse($_SESSION['instructorId'], $courseId['course_id']); 
   if($valDeleteClass)
   {
      echo "Delete SuccessFul!";
     // header("location:../../view/instructor_view/dashboard.php?Message:DeleteSuccessFul");
   }
 
   else 
   {
      echo "Delete Unsuccessfull";
     // header("location:../../view/instructor_view/dashboard.php?Message:DeleteUnuccessFul");
    // header("location:../../php/instructor_php/classSettingCheck.php");
  }

}

// if(isset($_REQUEST['courseName'])&& isset($_REQUEST['instructor_id']))
// {
//    //  $data = json_decode($_POST['checkDel']);
//    //  $instructor_id=$data->instructor_id;
//    //  $course_id=$data->courseId;
//    $courseId=  getByCourseName($_REQUEST['courseName']);
//    $instructor_id =$_REQUEST['instructor_id'];
//    $course_id = $courseId['course_id'];

//    echo $instructor_id;
//    echo  $course_id;
//    

// }




?>