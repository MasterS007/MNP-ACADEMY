<?php
    session_start();
    require_once('../services/userService.php');

    if(isset($_POST['submit']))
    {
       // $checkRemember = $_POST['checkRemember'];
        $uname 		= $_POST['userName'];
        $password 	= $_POST['password'];

        if(empty($uname) || empty($password)){
            header('location: ../view/login.php?nullSubmission');
        }
        else if(!empty($uname) && !empty($password))
        {
            
        $user = [
            'username'=>$uname,
            'password'=>$password,
        ];
        
        $data = validate($user);

        if($data!="No user found"){

            if(isset($_POST['checkRemember']))
            {   

                setcookie("checkRemember",$_POST['checkRemember'],time()+(86400*30),"/");
            }

            $_SESSION['username'] = $uname;
            $_SESSION['name']=$data['u_name'];
            $_SESSION['userid']=$data['id'];
            setcookie("username",$uname,time()+(86400*30),"/");
            setcookie("userid",$data['id'],time()+(86400*30),"/");
            //echo $data['user_type'];

            if($data['user_type']=='Instructor')
            {
                header("location:../view/instructor_view/dashboard.php");
               //echo "user is instructor";
                
            }
            else if($data['user_type']=='Admin')
            {
                header("location:../view/Admin_view/AdminHome.php");
            }

            else if($data['user_type']=='Learner')
            {   
                //echo "User is Learner";
               header("location:../view/learner_view/dashboard.php");
            }

            else
            {
                echo "User page is not available";
                
            }
            
        }
        else
        {
            header('location: ../view/login.php?error=invalid_user');
        }
            
        }
        
}



else{
    header("location: ../view/login.php");
}

?>