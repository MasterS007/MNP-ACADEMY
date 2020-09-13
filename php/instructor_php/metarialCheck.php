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

    if(isset($_POST['submit']))
    {
        $file_dir='../../asset/Class_Materials/'.$_FILES['allfiles']['name'];
        //print_r($_FILES);
        
        if(move_uploaded_file($_FILES['allfiles']['tmp_name'], $file_dir))
        {
            header("location:../../view/instructor_view/files.php?courseName={$_SESSION['courseName']}");
        }
        else
        {
            echo "Upload Failed";
        }
    }
//   echo $_SESSION['instructorId'];
//  $fileName  =$_FILES['allfiles']['name'];
//  echo $fileName;
  

?>