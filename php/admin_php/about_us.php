<?php
    session_start();
	 require_once('../../services/Admin_Service/about_us.php');

     if(isset($_POST['check_subTitle']))
     {
        $sub_Title_Id=$_POST['$sub_Title_Id'];
        if(isset($sub_Title_Id))
        {
            $getSubId=getSubTitle($sub_Title_Id);
            if(!empty($getSubId))
            {
                echo "sub title already exist";
            }
            else 
            {
                echo "";
            }
        }
    }
       
?>