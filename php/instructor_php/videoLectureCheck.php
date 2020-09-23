<?php
     require_once('../../services/courseService.php');
     require_once('../../services/instructor_service/videoLectureService.php');
if(isset($_POST['checkInfo']))
{   

    $data = json_decode($_POST['checkInfo']);
    $instructor_id= $data->instructor_id;
    $courseName =$data->courseName;
    $linkName = $data->leacturelink;
    $courseId=getByCourseName($courseName);
    //echo $courseName." ". $instructor_id." ". $linkName;
   // echo $courseId['course_id'];
   $date = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
            $dte =$date->format('Y-m-d H:i:s a');
    if(empty($courseName) || empty($instructor_id) || empty($linkName) )
    {
        echo "empty";
        //header("location:../../view/instructor_view/videoLecture.php?courseName={$_SESSION['courseName']}&&ERROR:NULLSUBMISSION");
    }


        $lectures=[

            'instructor_id'=>$instructor_id,
            'course_id'=>$courseId['course_id'],
            'linkName'=> $linkName,
            'dateNtime'=>$dte
        ];

       // echo $lectures['course_id'];

        $valid=insertLecture($lectures);
        if($valid)
        {
            echo "insert Successful";
        }
        else
        {
            echo "failde to insert!";
        }


    
    
    
}
?>