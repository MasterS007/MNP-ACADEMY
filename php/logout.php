<?php
 
 session_start();
 if(isset($_SESSION['username']))
 {
    unset($_SESSION['username']);
    header("location:../view/login.php");
 }

if(isset($_COOKIE['username']) )
{
   setcookie("username","end",time()-(86400*31),"/");
   header("location:../view/login.php");
}

 if(isset($_COOKIE['checkRemember']))
 {
    setcookie("checkRemember","end",time()-(86400*31),"/");
    header("location:../view/login.php");
 }
 
 else
 {
    header("location:../view/login.php");
 }

?>