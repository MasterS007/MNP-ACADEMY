<?php
require_once("../../services/instructor_service/postService.php");
require_once("../../services/instructor_service/commentService.php");
require_once("../../services/courseService.php");
if(isset($_POST['check_post']))
{
    $allInfo = json_decode($_POST['check_post']);
    $statusText = $allInfo->statusText;
    $instructor_id=$allInfo->userId;
    $courseName=$allInfo->courseName;
    $date = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
    $dateNtime =$date->format('Y-m-d H:i:s ');
    //echo   $dateNtime;
    $courseId=getByCourseName($courseName);
    //echo  $courseId['course_id'];
    if(!empty($statusText) && !empty($instructor_id))
    {
        $statusInfo = [
            'status_topic'=> $statusText,
            'users_id'=> $instructor_id,
            'dateNtime'=>$dateNtime,
            'course_id'=>$courseId['course_id']

        ];

        $validInsert =insertPost($statusInfo);
        if($validInsert)
        {
            echo "status successfully post!";
        }

        else
        {
            echo "Failed to post!";
        }
    }
}

if(isset($_GET['statusId']))
{   
    $status_id=$_GET['statusId'];
    $courseName =$_GET['courseName'];
    $validDeleteComment = deleteComment($status_id);
    $validDelete =deleteStatus($status_id);

    if($validDelete && $validDeleteComment)
    {
        header("location:../../view/instructor_view/postStatus.php?courseName={$courseName}&&Message:DeleteSuccessfull!");
    }

    else
    {
        
        header("location:../../view/instructor_view/postStatus.php?courseName={$courseName}&& Message:DeleteUnsuccessfull!");
    }
}
?>