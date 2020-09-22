<?php

    require_once("../../services/instructor_service/instructorService.php");
    require_once("../../services/learner_service/learner_courseService.php");


    if(isset($_POST['check_all']))
    {
        $learnerCourse = json_decode($_POST['check_all']);

        $learner_id=    $learnerCourse->learnerId;
        $instructor_name = $learnerCourse->instructorName;
        $course_id= $learnerCourse->courseId;

        // echo $course_id;
        // echo  $instructor_name;

        $instructor_id = getByInstructorName($instructor_name);
        // echo $instructor_id['id'];
        $learneCourseInfo =[
            "learner_id"=>$learner_id,
            "course_id"=> $course_id,
            "instructor_id"=>  $instructor_id['id']
        ];

        $validInsetrt= insertCourse( $learneCourseInfo); //from learner_courseService.php
        if($validInsetrt)
        {
            echo "Insert Successful";
        }
        else
        {
            echo "Insert Not Successful";
        }

    }

?>