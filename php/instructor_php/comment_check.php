<?php
require_once("../../services/instructor_service/commentService.php");
require_once("../../services/courseService.php");

if(isset($_POST['check_comment']))
{
    $allInfo = json_decode($_POST['check_comment']);
    $commentText = $allInfo->commentBox;
    $commenterId=$allInfo->commenterId;
    $statusId=$allInfo->statusId;
    $date = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
    $dateNtime =$date->format('Y-m-d H:i:s ');
    //echo   $dateNtime;
    
    if(!empty($commentText) && !empty($commenterId) && !empty($statusId))
    {
        $commentInfo = [
            'comments'=> $commentText,
            'users_id'=>$commenterId,
            'dateNtime'=>$dateNtime,
            'status_id'=> $statusId

        ];

        $validInsert =insertComment($commentInfo);
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


?>