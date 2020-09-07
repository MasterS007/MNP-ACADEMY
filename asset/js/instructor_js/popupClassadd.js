 //"use strict"


 function openpopup() {
     window.myWindow = window.open('../../view/instructor_view/addClass.php', '_blank', 'height=400, width=500, resizable=no');

 }
 //var class_name;

 function createClass(class_name, chooseCourse) {
     var addClass_datas = '' +
         'check_class=' + window.encodeURIComponent('ON') +
         '&className=' + window.encodeURIComponent(class_name) +
         '&courseName=' + window.encodeURIComponent(chooseCourse);
     let xhttp = new XMLHttpRequest();

     if (class_name != "") {
         xhttp.open("POST", "../../php/instructor_php/check_addClass.php", true);
         xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xhttp.send(addClass_datas);
         xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {

                 window.opener.location.reload();
                 window.close();
                 return true;
                 //alert(this.responseText);

             }
         }



         // document.getElementById("myClass").innerHTML = "<li>" + class_name + "</li>";
         /*' <ul class="myClass" id="myClass">' +
                      ' <li><a href="insideClass.php">' + class_name + '</br> course:' + chooseCourse + '</a></li><br> ' +
                      ' <li><a href="insideClass.php">Class:C/C++</a></li><br> ' +
                      '<li><a href="insideClass.php">Class:Algorithm</a></li> ' +
                      '</ul>'*/

     }
 }

 function emptyMsg() {

     document.getElementById("emptMsg").innerHTML = ""
 }