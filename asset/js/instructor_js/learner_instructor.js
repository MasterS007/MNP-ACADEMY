function showAllStudent(instructor_id) {
    var xhhtp = new XMLHttpRequest();
    xhhtp.open('POST', '../../php/instructor_php/learner_instructorCheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(instructor_id);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {


            //alert(this.responseText);

        }
    }
}