<?php
    
    require_once('../../php_and_js/php/session_header.php');
   

 ?> 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../all_designs/instructor_designs/dashboard1.css"> 
    <title>Class</title>
</head>
<body>
    <header>
         <nav>
             <select class="comboBox">
                 <option value="Course" selected disabled hidden>Cources</option>
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
                 <li class="logo"><a href="../view/instructor_view/dashboard.php">MNP Academy</a></li>
             </ul>
         </nav>
    </header>

        <div class="verticleLine"></div>

    <main>
       
        <h4 class="section-heading"><a href="../instructor_view/dashboard.php"><?php echo $_SESSION['name'];?></a></h4>
            <div class="accountStuff">
                <ul class="stuff">
                    <li><a href="../view/instructor_view/profile.php">Profile</a></li>
                    <li><a href="../view/instructor_view/mycourse.php">Courses</a></li>
                    <li><a href="../view/instructor_view/blog.php">Blogs</a></li>
                    <li><a href="../php_and_js/php/logout.php">Logout</a></li>
                </ul>
            </div>
            <section>
                <h2 class="welcomeheading">Welcome <?php echo $_SESSION['name'];?></h2>
                
            </section>

            <div class="wel">  
                  
                <ul class="wlist">
                    <li><a href="../view/instructor_view/dashboard.php">Classes</a></li>
                    <li><a href="../view/instructor_view/allstudent.php">Students</a></li>
                    <li><a href="#">Tips</a></li>
                </ul> 
                <hr>
           </div>

           <div class="titleb">
               <h4 class="titleC">My Class</h4>
               <button type="button" class="addClass"><a href="addClass.php">Add class</a></button>
            </div>
           <div class="classes">
                   <ul class="myClass">
                   <li><a href="../view/instructor_view/insideClass.php">Class:Physics</a></li><br>
                   <li><a href="../view/instructor_view/insideClass.php">Class:C/C++</a></li><br>
                   <li><a href="../view/instructor_view/insideClass.php">Class:Algorithm</a></li>
               </ul>
           </div>
            
    </main> 
    <footer>
    </footer>
    </body>
</html>


