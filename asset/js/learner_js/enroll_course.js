function enrollClick() {
    var instructorlist = document.getElementById('listInstructor');

    var learnerId = document.getElementById('learnerId').value;

    var instructorName = instructorlist.options[instructorlist.selectedIndex].text;

    var courseId = document.getElementById('courseId').value;


    var myObj = {
        learnerId: learnerId,
        instructorName: instructorName,
        courseId: courseId

    };

    var learnerCourse = JSON.stringify(myObj);
    var xttp = new XMLHttpRequest();
    xttp.open("POST", "../../php/learner_php/enrolCourseCheck.php", true);
    xttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xttp.send("check_all=" + learnerCourse);
    xttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            alert(this.responseText);

        }
    }

    // alert("instructor:" + instructorName + " CourseName: " + courseId + "lid:" + learnerId);


}