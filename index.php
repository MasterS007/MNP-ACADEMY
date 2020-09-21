<?php
session_start();
require_once('databaseConn/dbCon.php');
function getByID($id){
    $conn = dbConnection();

    if(!$conn){
        echo "DB connection error";
    }

    $sql = "select * from users where id={$id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $row;
}
if(isset($_COOKIE['checkRemember']))
{
      $id = $_COOKIE['userid'];
      $info =getByID($id);

    if($info['user_type']=="Instructor")
    {
        header("location:view/instructor_view/dashboard.php");
    }

    else if($info['user_type']=="Learner")
    {
        header("location:view/ilearner_view/dashboard.php");
    }

    else if($info['user_type']=="Admin")
    {
        header("location:view/Admin_view/AdminHome.php");
    }

 }

 else
 {
     ?>

<!DOCTYPE html>
<html>

<head>
    <title>First Page</title>

    <link rel="stylesheet" type="text/css" href="asset/all_designs/indexStyle.css">


</head>


<body>
    <header>
        <div class="left_area">
            <h3> MNP <span>ACADEMY</span> </h3>
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="index.html">Home</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <li><a href="#">Forum</a></li>

            </ul>
        </nav>
        <nav>
            <ul class="nav-links">

                <div class="right_area">
                    <a href="view/login.php" class="logout_btn">Sign In</a>
                    <a href="view/registration.html" class="logout_btn">Sign Up</a>
                </div>
            </ul>
        </nav>
    </header>
<div class="card-container ">

        <div class="upper-container">

            <h1> WELCOME TO MNP ACADEMY</h1>
            <h4>Your Course to Success</h4>
        </div>

        <div class="lower-container">
            <div>
                 <h2>Achieve your goals with Coursera</h2>
            </div>

            <div>
                <p>We are a nonprofit with the mission to provide a free, world-class education for anyone, anywhere. </p>

            </div>

        </div>

        <div class="lower-container">

       
                <a href=" <?php
                             if(!isset($_COOKIE['checkRemember']))
                            {?> 
                                     view/login.php
                                <?php
                                }
                                else
                                {
                                    ?>
                                    view/instructor_view/dashboard.php
                                   <?php
                            }?>"
                     class="btn"> Instructor </a>


                <a href="<?php

                            if(!isset($_COOKIE['checkRemember']))
                            {?> 
                                view/login.php
                            <?php
                            }
                            else
                            {
                                ?>
                                view/learner_view/dashboard.php
                            <?php
                            }?>" class="btn">Learner</a>                          

        </div>
</div>


</body>

</html><?php
 }?>