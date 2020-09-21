<?php
 session_start();
 require_once('../../services/Admin_service/admin_service.php');
 if(isset($_POST['check_email']))
    {
        $email= $_POST['emailId'];
        $adminId = $_POST['adminId'];
        if(isset($email) && isset($adminId))
        {
            $getemail = getEmail($email,$adminId);
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
        $adminId = $_POST['adminId'];
        if(isset($uname)&& isset($adminId))
        {
            $getuname = getUsername($uname, $adminId);
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
        $adminInfo = json_decode($_POST['check_info']);
        $adminId= $adminInfo->adminId;
        $adminName = $adminInfo->lname;
        $adminUsername =$adminInfo->username;
        $adminEmail = $adminInfo->email;
        $newPassword =$adminInfo->password;
        $conPassword=$adminInfo->conpassword;
        $len = strlen( $adminName);
        $pos =strpos($adminEmail, '@');
        $pos1 = strpos($adminEmail, ".com");
       
        $valid = FALSE; //For user data
        if(empty($adminName)||empty($adminUsername)||empty( $adminEmail)||empty($newPassword)||empty($conPassword))
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
        else if( $adminName[0]>='A' &&  $adminName[0]<='Z' ||  $adminName[0]>='a'&&  $adminName[0]<='z')
        {
             for($i = 1; $i<$len; $i++)
            {
                  if( $adminName>='A'&&  $adminName<='Z' ||  $adminName>='a'&& $adminName<='z' ||  $adminName=='.' ||  $adminName=='-'|| $adminName=='' )
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

         else if(isset($adminEmail))
         {
            $getemail = getEmail($adminEmail,$adminId);
             if(!empty($getemail))
             {
              $valid = FALSE;
             }
             else
             {
               $valid=TRUE;
             }
         }

         else if(isset($adminUsername))
         {
            $getuname = getUsername($adminUsername, $adminId);
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
            $admin=[
                'nameU'=> $adminName,
                'uname'=> $adminUsername,
                'password'=>$newPassword,
                'email'=> $adminEmail,
                'adminId'=>$adminId
                
            ];

            
            $validEdit =admin_update( $admin);
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