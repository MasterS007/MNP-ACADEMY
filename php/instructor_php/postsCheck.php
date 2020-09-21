<?php
require_once("../../services/instructor_service/postService.php");
if(isset($_POST['check_post']))
{
    $allInfo = json_decode($_POST['check_post']);
    $statusText = $allInfo->statusText;
    $instructor_id=$allInfo->userId;
    $date = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
    $dateNtime =$date->format('Y-m-d H:i:s ');
    //echo   $dateNtime;

    if(!empty($statusText) && !empty($instructor_id))
    {
        $statusInfo = [
            'status_topic'=> $statusText,
            'users_id'=> $instructor_id,
            'dateNtime'=>$dateNtime

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
    $validDelete =deleteStatus($status_id);

    if($validDelete)
    {
        header("location:../../view/instructor_view/postStatus.php?courseName=.$courseName.&&Message:DeleteSuccessfull!");
    }

    else
    {
        header("location:../../view/instructor_view/postStatus.phpourseName=.$courseName.?Message:DeleteUnsuccessfull!");
    }
}
?>