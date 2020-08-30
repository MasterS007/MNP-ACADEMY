<?php
    session_start();
    require_once('../../services/userService.php');

    if(isset($_POST['submit']))
    {

        $uname 		= $_POST['userName'];
        $password 	= $_POST['password'];

        if(empty($uname) || empty($password)){
            echo "null submission";

        }
        else if(!empty($uname) && !empty($password))
        {
            
        $user = [
            'username'=>$uname,
            'password'=>$password,
        ];
        
        $data = validate($user);

        if($data!="No user found"){
            $_SESSION['username'] = $uname;
            
            echo $data['user_type'];

            if($data['user_type']=='Instructor')
            {
                header("location:../../view/dashboard.php");
               //echo "user is instructor";
                
            }
            else if($data['user_type']=='Admin')
            {
                echo "User is Admin";
            }

            else if($data['user_type']=='Learner')
            {   
                echo "User is Learner";
               
            }

            else
            {
                echo "User page is not available";
                
            }
            
        }
        else
        {
            header('location: ../../view/login.php?error=invalid_user');
        }
            
        }
        
}



else{
    header("location: ../../view/login.php");
}

?>