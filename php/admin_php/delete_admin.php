<?php
session_start();
     require_once('../../services/Admin_Service/admin_service.php');
     if(isset($_GET['u_name']))
     {
        $u_name=$_GET['u_name'];
        $validDelete =deleteByusername($u_name);

        if($validDelete==true)
        {
            echo "Delete Successful";
            header("location:../../view/Admin_view/Add_Admin.php?Message:DeleteSuccessFul");
        }
        else
        {
            echo "Delete Failed!";
           header("location:../../view/Admin_view/Add_Admin.php?Message:DeleteFailed");
        }

     }

 ?>