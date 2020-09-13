<?php

    session_start();

     require_once('../../services/instructor_service/course_instructorService.php');
     require_once('../../services/courseService.php');
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
            $courseName=$_SESSION['courseName'];
            $courseId=getByCourseName($courseName);
            $course_id= $courseId['course_id'];
            echo $file_dir;
            $materials=[
                'filesdir'=> $file_dir,
                'instructorId'=> $_SESSION['instructorId'],
                'courseId'=> $course_id
            ];
           $validInsert =insertCourseMaterial($materials);
           if( $validInsert)
           {
            header("location:../../view/instructor_view/files.php?courseName={$_SESSION['courseName']}");
           }

           else
           {
           
           // header("location:../../view/instructor_view/files.php?courseName={$_SESSION['courseName']}&&Error=UnsecseefulInsert");
            echo "jjja";
           }
           
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