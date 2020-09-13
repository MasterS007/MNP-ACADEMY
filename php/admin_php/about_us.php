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



    if (isset($_POST['submit']))
    {
        $title = $_POST['title'];
        $sub_title = $_POST['sub_title'];
        $descriptions = $_POST['descriptions'];
        $valid = false;

        if(empty($title) || empty($sub_title)|| empty($descriptions))
        {
            $valid = false;
            echo "Null submission";
        }
        else{
            $valid = true;
        }

        if($valid == true)
        {
            $about = [
                'title'=>$title,
                'sub_title'=>$sub_title,
                'descriptions'=>$descriptions
           ];
           $add_about = InsertAbout($about);
           if($add_about == TRUE)
           {
               header('location:../../view/Admin_view/about_us.php?message=Inserted');
               alert("Successfully inserted");
           }
           else
           {
            header('location:../../view/Admin_view/about_us.php?message=Not_Inserted');
            alert("Something went wong");

           }

        }
    }
       
?>