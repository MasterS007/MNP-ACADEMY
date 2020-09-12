 //"use strict"


 function openpopup() {
     //window.myWindow = window.open('../../view/instructor_view/addClass.php', '_blank', 'height=400, width=500, resizable=no');
     var divclasses = document.getElementById('divClasses');
     var divAddingClasses = document.getElementById('divAddingClasses');
     var confirmBtn = document.getElementById('confirmBtn');


     divclasses.style.display = 'none';
     divAddingClasses.style.display = 'block';
     confirmBtn.style.display = 'block';

 }
 //var class_name;

 function createClass(class_name, chooseCourse) {

     var MyObj = {
         'className': class_name,
         'courseName': chooseCourse
     };

     var addClass_datas = JSON.stringify(MyObj); //using JSON
     let xhttp = new XMLHttpRequest();
     if (class_name != "") {
         xhttp.open("POST", "../../php/instructor_php/check_addClass.php", true);
         xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xhttp.send("check_class=" + addClass_datas);
         xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {

                 // window.opener.location.reload();
                 //window.close();
                 return true;
                 // alert(this.responseText);

             }
         }



     }
 }

 function emptyMsg() {

     document.getElementById("emptMsg").innerHTML = ""
 }