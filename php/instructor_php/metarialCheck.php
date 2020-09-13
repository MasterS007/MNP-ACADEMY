<?php

    if(isset($_POST['checkInfo']))
    {
        $data = json_decode($_POST['checkInfo']);

        $filename = $data->fileName;
        $instructor_id= $data->instructor_id;
        $courseName =$data->courseName;

        echo $filename.''.$instructor_id.''.$courseName;
    }
?>