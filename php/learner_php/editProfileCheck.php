

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
    //     $learnerInfo = json_decode($_POST['checkId']);
    //     $learnerId= $learnerInfo->learnerId;
    //    //$learnerName = $learnerInfo->lname;
       
    //     $learnerEmail = $learnerInfo->email;
    //     $newPassword =$learnerInfo->password;
    //     $conPassword=$learnerInfo->conpassword;

    $learnerId=$_POST['learnerId'];
    $learnerName= $_POST['lname'];
    $learnerUsername=$_POST['username'];
    $learnerEmail=$_POST['emailId'];
    $newPassword =$_POST['password'];
    $conPassword=$_POST['conpassword'];


        echo   $learnerName ;




    }

// if(isset($_POST['edit']))
// {
     
//       $name = $_POST['name'];
//       $uname = $_POST['userName'];
// 	  $email = $_POST['email'];
//       $password = $_POST['password'];
//       $conpassword = $_POST['confirmPassword'];
//       $len = strlen($name);
      
//         $pos =strpos($email, '@');
//         $pos1 = strpos($email, ".com");

//         $valid = FALSE; //For user data
//         $svalid =FALSE; //for insert data
        
//         if(empty($name)||empty($uname)||empty($email)||empty($password))
//         {
//             echo "null submission";
//             $valid = FALSE;
//         }
//         else if(empty($conpassword)||!isset($_POST['gender'])||empty($date)||empty($month)||empty($year))
//         {
//           echo "null submission";
//           $valid = FALSE;

//         }
//         else if($password != $conpassword)
//         {
//           echo "Warrning: Password and Confirm Password are not matched!";
//           echo "Please, do registration again!";
//           $valid = FALSE;
//         }
//         //Name Validation
//         else if($name[0]>='A' && $name[0]<='Z' || $name[0]>='a'&& $name[0]<='z')
//         {
//              for($i = 1; $i<$len; $i++)
//             {
//                   if($name>='A'&& $name<='Z' || $name>='a'&& $name<='z' || $name=='.' || $name=='-'||$name=='' )
//                   {
//                        $valid = TRUE;
//                   }
     
//                   else {
//                       $valid = FALSE;
//                   }
//             }
     
//         }

//         //email validation
//         else if ($pos!=False && $pos1!=False && $pos1 > $pos)
//          {  echo "Submit Successful!";
//             $valid = TRUE;
//          }

//          else if(isset($email))
//          {
//              $getemail = getEmail($email);
//              if($getemail)
//              {
//               $valid = FALSE;;
//              }
//              else
//              {
//                $valid=TRUE;
//              }
//          }

//         else if(($date>=1 && $date<=31) && ($month >=1 && $month<=12) && ($year >=1900 && $year <=2016))
//         {
//             echo "Successful Submit!";
//             $valid = TRUE;
//         }

        
//         else 
//         {

//             if($_POST['gender']=='Male')
//             {
//               $gender = 'Male';
                 
//             }
//             elseif($_POST['gender']=='Female')
//             {
//               $gender = 'Female';
//             }
  
//             elseif($_POST['gender']=='Other'){
//               $gender = 'Other';
//             } 
          
        
//             $valid =TRUE; 
      
//         }
        

//         if($valid==TRUE)
//         {
//             $Dateob = date_create($year.'-'.$month.'-'.$date);
//             $Date =date_format($Dateob,"Y-m-d");
//               $users=[
//                   'nameU'=>$name,
//                   'uname'=>$uname,
//                   'password'=>$password,
//                   'email'=>$email,
//                   'gender'=>$gender,
//                   'DoB'=>$Date
//               ];

//              $validReg=Learner_update($user);
//             if($validReg==TRUE)
//             {
//                               // echo "inserted";
//                 header('location:../../view/learner_view/learner_Profile.php?message=Inserted');
//                 //echo $user['DoB'];               
//             }
               
//             else
//             {
             
//              // $svalid =FALSE;
//              echo "Insert unsuccessfull";
//              header('location:../../view/learner_view/learner_Profile.php?message=Failed to Insert');
             
              
//             }
//         }
          
            
           
//         else
//         {
           
//             header('location:../view/learner_view/learner_Profile.php?nullSubmission');
//         }       
// }

         
    
?>