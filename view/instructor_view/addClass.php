<?php
    session_start();
    require_once('../../services/courseService.php');
       if(!isset($_SESSION['username'])){
   
           header('location: ../login.php?error=invalid_request');
       }
    
 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../asset/all_designs/instructor_designs/addClassDes.css"> 
    <script type="text/javascript" src="../../asset/js/instructor_js/popupClassadd.js"></script>
    <title>Class</title>
</head>
<body>
         <div class="addingClass">  
                  <form  action="" method="POST">
                    <fieldset>
                        <legend>Add new class</legend>
                        <table class="new_class">
                            <tr>
                                <td>Class Name</td>
                            </tr>
                            <tr>
                                <td><input class="class_name" id="class_name" type="text" name="class_name" placeholder="e.g,Class:Computer Fundamental" 
                                onkeyup= emptyMsg()></td>
                            </tr>
                            <tr>
                                <td>Choose Course</td>
                            </tr>
                            <tr>
                                <td>
                                    <select class="chooseCourse" id="chooseCourse" name="choose_course" onclick= emptyMsg()>
                                        <option value="Course" selected disabled hidden>Courses</option>
                                        <optgroup label="Science">
                                        <?php
                                            $courseN = getByCategory('Science');
                                            for ($i=0; $i<count($courseN); $i++)
                                            { ?>
                                                <option value="<?php echo $courseN[$i];?>"><?php echo $courseN[$i]['course_name'];?>
                                                </option>
                                           <?php }?>
                                           </optgroup>
                                        <optgroup label="Computer Science">
                                        <?php
                                            $courseN = getByCategory('Computer Science');
                                            for ($i=0; $i<count($courseN); $i++)
                                            { ?>
                                                <option value="<?php echo $courseN[$i];?>"><?php echo$courseN[$i]['course_name'];?>
                                                </option>
                                           <?php }?>
                       
                                        </optgroup>
                                        <optgroup label="Programming Language">
                                        <?php
                                            $courseN = getByCategory('Programming Language');
                                            for ($i=0; $i<count($courseN); $i++)
                                            { ?>
                                                <option value="<?php echo $courseN[$i];?>"><?php echo$courseN[$i]['course_name'];?>
                                                </option>
                                           <?php }?>
                       
                                        </optgroup>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td id="emptMsg" style="color:red; font-size:10px;"></td>
                            </tr>
                        </table>
                     </fieldset>
                     <div class="confirmBtn" >
                        <input type="button" name= "submit" value="Confirm Class" onclick="closePopup(); ">
			           <input type="reset" >
                     </div>
                        
                  </form>
           </div>
    <script>
            function closePopup() {
                var class_name = document.getElementById("class_name").value;
                var chooseCourse = document.getElementById("chooseCourse");
                var course = chooseCourse.options[chooseCourse.selectedIndex].text;

                if (class_name == "" || chooseCourse == "") {
                    document.getElementById("emptMsg").innerHTML = "*Please fill all the field first!"

                } else {
                
                    
                    createClass(class_name, course);
                    // var addClass_data =''
                    // +'check_class=' + window.encodeURIComponent('ON')
                    // + '&className=' + window.encodeURIComponent(class_name);
                    // let xhttp = new XMLHttpRequest();

                    // xhttp.open('POST','../../php/instructor_php/addclass_check.php', true);
                    // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    // xhttp.send(addClass_data);
                    // xhttp.onreadystatechange = function (){
                    // if(this.readyState == 4 && this.status == 200){

                    //     document.getElementById("myClass").innerHTML=this.responseText;
                    //     }
                    // }
                    
                    //window.close();
                }


            }
    </script> 
    </body>

</html>


