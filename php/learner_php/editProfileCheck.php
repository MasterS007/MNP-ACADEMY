

<?php
 
 session_start();
 require_once('../../services/learner_service/learnerService.php');
 if(isset($_POST['check_email']))
    {
        $email= $_POST['emailId'];
        if(isset($email))
        {
            $getemail = getEmail($email);
            if(!empty($getemail))
            {
                echo "*email already exists!";
            }

            else
            {
                echo "";
            }
        }
    }

    if(isset($_POST['check_user']))
  {
        $uname= $_POST['userName'];
        if(isset($uname))
        {
            $getuname = getUsername($uname);
            if(!empty($getuname))
            {
                echo " *username already exists!";
            }

            else
            {
                echo "";
            }
        }
    }


    if(isset($_POST['check_info']))
    {
   

    $learnerId=$_POST['learnerId'];
    $learnerName= $_POST['lname'];
    $learnerUsername=$_POST['username'];
    $learnerEmail=$_POST['email'];
    $newPassword =$_POST['password'];
    $conPassword=$_POST['conpassword'];

    $learner=[
        'nameU'=>$learnerName,
        'uname'=>$learnerUsername,
        'password'=>$newPassword,
        'email'=>$learnerEmail,
        'learnerId'=>$learnerId
        
    ];
    $validEdit = Learner_update($learner);
    if( $validEdit)
    {
        echo "Update Successfully!";
    }
    else
    {
        echo "Something went wrong!";
    }
      //  echo   $learnerName ;


    }


         
    
?>