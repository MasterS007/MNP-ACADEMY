

<?php
 
 session_start();
 require_once('../../services/instructor_service/instructorService.php');
//  if(isset($_POST['check_email']))
//     {
//         $email= $_POST['emailId'];
//         if(isset($email))
//         {
//             $getemail = getEmail($email);
//             if(!empty($getemail))
//             {
//                 echo "*email already exists!";
//             }

//             else
//             {
//                 echo "";
//             }
//         }
//     }

//     if(isset($_POST['check_user']))
//   {
//         $uname= $_POST['userName'];
//         if(isset($uname))
//         {
//             $getuname = getUsername($uname);
//             if(!empty($getuname))
//             {
//                 echo " *username already exists!";
//             }

//             else
//             {
//                 echo "";
//             }
//         }
//     }


    if(isset($_POST['check_info']))
    {
        $instructorInfo = json_decode($_POST['check_info']);
        $instructorId= $instructorInfo->instructorId;
        $instructorName = $instructorInfo->lname;
        $instructorUsername =$instructorInfo->username;
        $instructorEmail = $instructorInfo->email;
        $newPassword =$instructorInfo->password;
        $conPassword=$instructorInfo->conpassword;

        //echo $instructorName;


    $instructor=[
        'nameU'=> $instructorName,
        'uname'=> $instructorUsername,
        'password'=>$newPassword,
        'email'=>  $instructorEmail,
        'instructorId'=>$instructorId
        
    ];
    $validEdit =Instructor_update( $instructor);
    if( $validEdit)
    {
        echo "Update Successfully!";
    }
    else
    {
        echo "Something went wrong!";
    }
     


     }
?>