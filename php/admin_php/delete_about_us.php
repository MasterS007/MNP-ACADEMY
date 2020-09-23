<?php
session_start();
     require_once('../../services/Admin_Service/about_us.php');
     if(isset($_GET['Id']))
     {
        $u_name=$_GET['Id'];
        echo "Delete Successful";
        $validDelete =deleteByabout_us($Id);

        if($validDelete==true)
        {
            echo "Delete Successful";
            header("location:../../view/Admin_view/about_us.php?Message:DeleteSuccessFul");
        }
        else
        {
            echo "Delete Failed!";
           header("location:../../view/Admin_view/about_us.php?Message:DeleteFailed");
        }

     }

 ?>