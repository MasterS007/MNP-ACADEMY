<?php

    session_start();

    // require_once('../../services/instructor_service/')
    //$filName= $_FILES['allfiles']['name'];
    //echo $filename;
    if(isset($_POST['checkInfo']))
    {   

        $data = json_decode($_POST['checkInfo']);
        $instructor_id= $data->instructor_id;
        $courseName =$data->courseName;

        $_SESSION['instructorId']=$instructor_id;
        $_SESSION['courseName']=$courseName;
        
        

    }
  echo $_SESSION['instructorId'];
 $fileName  =$_FILES['allfiles']['name'];
 echo $fileName;
  

?>