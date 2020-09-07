
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="all_designs/insideclassdesign.css">
    <title>Class Materials</title>
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
                <li class="logo"><a href="dashboard.php">MNP Academy</a></li>
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

        <div class="students">
            <form>
                <fieldset>
                   <legend class="title">Enrolled Students List</legend>
                   <table class="student_table">
                    <tr>
                        <td>Student Name</td>
                        <td>Email</td>
                        <td>Enrolled Date</td>

                    <tr>
                    <tr>
                        <td colspan="3"><hr></td>
                    </tr>
                    <tr>
                        <td>Kakashi Hatake</td>
                        <td>hatake12@gmail.com</td>
                        <td>12/09/2019</td>
                    </tr>
                    <tr>
                        <td colspan="3"><hr></td>
                    </tr>
                   </table>        
                </fieldset>
            </form>
        </div>
    </main>

    <footer>
    
    </footer>
</body>
</html>
