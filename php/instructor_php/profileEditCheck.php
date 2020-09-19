<?php
 session_start();
 require_once('../../services/instructor_service/instructorService.php');
 if(isset($_POST['check_email']))
    {
        $email= $_POST['emailId'];
        $instructorId = $_POST['instructorId'];
        if(isset($email) && isset($instructorId))
        {
            $getemail = getEmail($email,$instructorId);
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
        $instructorId = $_POST['instructorId'];
        if(isset($uname)&& isset($instructorId))
        {
            $getuname = getUsername($uname, $instructorId);
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
        $instructorInfo = json_decode($_POST['check_info']);
        $instructorId= $instructorInfo->instructorId;
        $instructorName = $instructorInfo->lname;
        $instructorUsername =$instructorInfo->username;
        $instructorEmail = $instructorInfo->email;
        $newPassword =$instructorInfo->password;
        $conPassword=$instructorInfo->conpassword;
        $len = strlen( $instructorName);
        $pos =strpos($instructorEmail, '@');
        $pos1 = strpos($instructorEmail, ".com");
       
        $valid = FALSE; //For user data
        if(empty($instructorName)||empty($instructorUsername)||empty( $instructorEmail)||empty($newPassword)||empty($conPassword))
        {
            echo "null submission";
            $valid = FALSE;
        }
        else if( $newPassword != $conPassword)
        {
          echo "Warrning: Password and Confirm Password are not matched!";
          echo "Please, do registration again!";
          $valid = FALSE;
        }
        //Name Validation
        else if( $instructorName[0]>='A' &&  $instructorName[0]<='Z' ||  $instructorName[0]>='a'&&  $instructorName[0]<='z')
        {
             for($i = 1; $i<$len; $i++)
            {
                  if( $instructorName>='A'&&  $instructorName<='Z' ||  $instructorName>='a'&& $instructorName<='z' ||  $instructorName=='.' ||  $instructorName=='-'|| $instructorName=='' )
                  {
                       $valid = TRUE;
                  }
     
                  else {
                      $valid = FALSE;
                  }
            }
     
        }

        //email validation
        else if ($pos!=False && $pos1!=False && $pos1 > $pos)
         {  echo "Submit Successful!";
            $valid = TRUE;
         }

         else if(isset($instructorEmail))
         {
            $getemail = getEmail($instructorEmail,$instructorId);
             if(!empty($getemail))
             {
              $valid = FALSE;
             }
             else
             {
               $valid=TRUE;
             }
         }

         else if(isset($instructorUsername))
         {
            $getuname = getUsername($instructorUsername, $instructorId);
             if(!empty($getuname))
             {
                $valid = FALSE;
             }
 
             else
             {
                $valid=TRUE;
             }
         }

         if($valid==TRUE)
         {
            $instructor=[
                'nameU'=> $instructorName,
                'uname'=> $instructorUsername,
                'password'=>$newPassword,
                'email'=> $instructorEmail,
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

        //  else
        //   {
        //      echo "Something went wrong!";
        //     //header('location:../view/registration.html?nullSubmission');
        //   }    
        //echo $instructorName;


   
     


      }
?>