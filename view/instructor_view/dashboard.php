<?php
   	session_start();

       if(!isset($_SESSION['username'])){
   
           header('location: ../login.php?error=invalid_request');
       }
    
 ?> 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../asset/all_designs/instructor_designs/dashboardDes.css"> 
    <script type="text/javascript" src="../../php_and_js/js/instructor_js/dashboardview.js"></script>
    <title>Class</title>
</head>
<body>
<script>
        var classes = document.getElementById("classes");
        var classList=[];
        classList=["Class:Physics","Class:C/C++","Class:Algorithm" ];

        function createClassList()
        {
            var listLength= classList.length;

            if(listLength>0)
            {
                var myClass= document.createElement("ul");
                myClass.className="myClass";

                for(var i=0; i<listLength; i++)
                {
                    var listItem = document.createElement("li");
                    var linkItem = document.createElement("a");
                    var classItem = document.createTextNode(classList[i]);
                    linkItem.appendChild(classItem);
                    listItem.appendChild(linkItem);
                    myClass.appendChild(listItem);

                }
                classes.appendChild(myClass);
                //document.getElementById("classes")="hi";
            }
            else
            {
                var message = document.createTextNode("No class is added");
                // classes.appendChild(message);
                document.getElementById("classes").innerHTML="hi";
            }
            //window.onload = createClassList;
        }
    </script>
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
                 <li class="logo"><a href="dashboard.php">MNP Academy</a></li>
             </ul>
         </nav>
    </header>

        <div class="verticleLine"></div>

    <main>
       
        <h4 class="section-heading"><a href="dashboard.php"><?php echo $_SESSION['name'];?></a></h4>
            <div class="accountStuff">
                <ul class="stuff">
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="mycourse.php">Courses</a></li>
                    <li><a href="blog.php">Blogs</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <section>
                <h2 class="welcomeheading">Welcome <?php echo $_SESSION['name'];?></h2>
                
            </section>

            <div class="wel">  
                  
                <ul class="wlist">
                    <li><a href="dashboard.php">Classes</a></li>
                    <li><a href="allstudent.php">Students</a></li>
                    <li><a href="#">Tips</a></li>
                </ul> 
                <hr>
           </div>

           <div class="titleb">
               <h4 class="titleC">My Class</h4>
               <button type="button" class="addClass" ><a href="addClass.php" style="color: #589;">Add class</a></button>   

               <!--  -->
            </div>

           <div class="classes" id="classes" >
                   <!-- <ul class="myClass" id="myClass">
                   <li><a href="insideClass.php">Class:Physics</a></li><br>
                   <li><a href="insideClass.php">Class:C/C++</a></li><br>
                   <li><a href="insideClass.php">Class:Algorithm</a></li>
               </ul> -->
           </div>
          


            
    </main> 
    <footer>
    </footer>
    </body>
</html>


