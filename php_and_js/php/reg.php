<?php
 include_once 'dbconnection.php';
?>

<?php

    if(isset($_REQUEST['submit']))
    {
     
      $name = $_POST['name'];
      $uname = $_POST['userName'];
	    $email = $_POST['email'];
      $password = $_POST['password'];
      $conpassword = $_POST['confirmPassword'];
      $date =$_POST['date'];
      $month = $_POST['month'];
      $year = $_POST['year'];
      $user = $_POST['user'];
      $len = strlen($name);
      $gender=$_POST['gender'];
      
       
        $pos =strpos($email, '@');
        $pos1 = strpos($email, ".com");
       


        $valid = FALSE; //For user data
        $svalid =FALSE; //for insert data
        
        if(empty($name)||empty($uname)||empty($email)||empty($password)||empty($_POST['user']))
        {
            echo "null submission";
            $valid = FALSE;
        }
        else if(empty($conpassword)||!isset($_POST['gender'])||empty($date)||empty($month)||empty($year))
        {
          echo "null submission";
          $valid = FALSE;

        }
        else if($password != $conpassword)
        {
          echo "Warrning: Password and Confirm Password are not matched!";
          echo "Please, do registration again!";
          $valid = FALSE;
        }
        //Name Validation
        else if($name[0]>='A' && $name[0]<='Z' || $name[0]>='a'&& $name[0]<='z')
        {
             for($i = 1; $i<$len; $i++)
            {
                  if($name>='A'&& $name<='Z' || $name>='a'&& $name<='z' || $name=='.' || $name=='-'||$name=='' )
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

        else if(($date>=1 && $date<=31) && ($month >=1 && $month<=12) && ($year >=1900 && $year <=2016))
        {
            echo "Successful Submit!";
            $valid = TRUE;
        }


        else 
        {

            if($_POST['gender']=='Male')
            {
              $gender = 'Male';
                 
            }
            elseif($_POST['gender']=='Female')
            {
              $gender = 'Female';
            }
  
            elseif($_POST['gender']=='Other'){
              $gender = 'Other';
            } 
          
        
            $valid =TRUE; 
      
            
          }

          if($valid==TRUE)
          {
            $Dateob = date_create($year.'-'.$month.'-'.$date);
            $Date =date_format($Dateob,"Y-m-d");
            $sql = "INSERT INTO users (u_name, username, u_password, email, gender, user_type, date_of_birth) VALUES ('$name','$uname','$password','$email','$gender','$user','$Date')";

            if(mysqli_query($conn, $sql))
            {
               
                header('location:login.php');
                echo "Insert successfull";
               
            }
               
            else
            {
             
             // $svalid =FALSE;
             echo "Insert unsuccessfull";
             echo '<br>'.mysqli_errno($conn).'<br>';
             print_r(mysqli_error_list($conn));
              
            }
            mysqli_close($conn);
            
           
         }

          else
          {
           
            header('location:registration.html');
          }
        
      
    }
      

        else{
            header('location:registration.html');
        }    
    
?>