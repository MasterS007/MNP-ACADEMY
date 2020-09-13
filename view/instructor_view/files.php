
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="all_designs/fileupload_design.css">
<title>Class Files</title>
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
            <li class="logo"><a href="../view/dashboard.php">MNP Academy</a></li>
        </ul>
    </nav>
</header>

   <div class="verticleLine"></div>
<main>
    <div>
        <h4 class="class_headeing">Class:Programming Language</h4>
    </div>

    <div class="class_materials">
        <ul>
                <li><a href="../view/insideClass.php">Students</a></li>
                <li><a href="../view/postComment.php">Post</a></li>
                <li><a href="../view/files.php">Files</a></li>
                <li><a href="#">Assignments</a></li>
                <li><a href="../view/grade.php">Grades</a></li>
    
        </ul>
    </div>

    <div class="files">
        <form action="../ph_and_js/php/fileupload_check.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="allfiles" class="uploadbox">
        <input type="submit" name="submit" value="Upload" class="btn_upload">
            
            
           <fieldset class="upload_files">  
               <legend class="title_file">File</legend> 

               <?php

                    $file_dir=scandir("Class_Materials");
                    for($i=2; $i<count($file_dir); $i++)
                    {
                        ?>
                        <p>
                        <a href="../view/Class_Materials/<?php echo $file_dir[$i]?>"><?php echo $file_dir[$i]?><hr></a>
                    </p>
                        <?php
                    }
               ?>
            </fieldset>
            
        </form>
    </div>
</main>

<footer>

</footer>
</body>
</html>
