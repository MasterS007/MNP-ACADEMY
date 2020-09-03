<?php
   	session_start();

       if(!isset($_SESSION['username'])){
   
           header('location: ../../login.php?error=invalid_request');
       }
    
 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../asset/all_designs/instructor_design/addingclass.css"> 
    <title>Class</title>
</head>
<body>
    <header>
         <nav>
             <select class="comboBox">
                 <option value="Course" selected disabled hidden>Courses</option>
                 <optgroup label="Science">
                        <option value="Physics">Physics</option>
                        <option value="Chemistry">Chemistry</option>
                        <option value="Biology">Biology</option>
                        <option value="Mathematics">Mathematics</option>
                    
                 </optgroup>
                 <optgroup label="Computer Science">
                     <option value="Algorithm">Algorithm</option>
                     <option value="Data Structure">Data Structure</option>
                     <option value="Computer Fundamentals">Computer Fundamentals</option>
                     <option value="Introdouction to Programing Language">Introdouction to Programing Language</option>
                     <option value="Introduction to Database">Introduction to Database</option>

                 </optgroup>
                 <optgroup label="Programming Language">
                     <option value="C/C++">C/C++</option>
                     <option value="JAVA">JAVA</option>
                     <option value="PHYTHON">PHYTHON</option>
                     <option value="C#">C#</option>
                     <option value="PHP">PHP</option>

                 </optgroup>
             </select>
             <ul class="navigation">
                 <li class="searchBox"><input type="text" name="search" placeholder="Search.."></li>
                 <li class="logo"><a href="dashboard.php">MNP Academy</a></li>
             </ul>
         </nav>
    </header>

        <div class="verticleLine"></div>

    <main>
       
        <h4 class="section-heading"><a href="dashboard.php"><?php echo $_COOKIE['name'];?></a></h4>
            <div class="accountStuff">
                <ul class="stuff">
                    <li><a href="../view/profile.php">Profile</a></li>
                    <li><a href="../view/mycourse.php">Courses</a></li>
                    <li><a href="../view/progress.html">Progress</a></li>
                    <li><a href="../view/blog.php">Blogs</a></li>
                    <li><a href="../php_and_js/php/logout.php">Logout</a></li>
                </ul>
            </div>
            <section>
                <h2 class="welcomeheading">Welcome <?php echo $_SESSION['name'];?></h2>
            </section>

            <div class="addingClass">  
                  <form action="../php_and_js/php/addclass_check.php" method="POST">
                    <fieldset>
                        <legend>Add new class</legend>

                        <table class="new_class">
                            <tr>
                                <td>Class Name</td>
                            </tr>
                            <tr>
                                <td><input class="class_name" type="text" name="class_name" placeholder="e.g,Class:Computer Fundamental"></td>
                            </tr>
                            <tr>
                                <td>Choose Course</td>
                            </tr>
                            <tr>
                                <td>
                                    <select class="chooseCourse" name="choose_course">
                                        <option value="Course" selected disabled hidden>Courses</option>
                                        <optgroup label="Science">
                                               <option value="Physics">Physics</option>
                                               <option value="Chemistry">Chemistry</option>
                                               <option value="Biology">Biology</option>
                                               <option value="Mathematics">Mathematics</option>
                                           
                                        </optgroup>
                                        <optgroup label="Computer Science">
                                            <option value="Algorithm">Algorithm</option>
                                            <option value="Data Structure">Data Structure</option>
                                            <option value="Computer Fundamentals">Computer Fundamentals</option>
                                            <option value="Introdouction to Programing Language">Introdouction to Programing Language</option>
                                            <option value="Introduction to Database">Introduction to Database</option>
                       
                                        </optgroup>
                                        <optgroup label="Programming Language">
                                            <option value="C/C++">C/C++</option>
                                            <option value="JAVA">JAVA</option>
                                            <option value="PHYTHON">PHYTHON</option>
                                            <option value="C#">C#</option>
                                            <option value="PHP">PHP</option>
                       
                                        </optgroup>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        
                     </fieldset>
                     <fieldset class="buttonfield">
                        <input type="submit" name= "submit" value="Confirm Class">
			           <input type="reset">
                     </fieldset>
                  </form>
                
           </div>
            
    </main> 
    <footer>
    </footer>
    </body>
</html>


