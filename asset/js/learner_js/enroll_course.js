function enrollClick() {
    var instructorlist = document.getElementById('listInstructor');

    var learnerId = document.getElementById('learnerId').value;

    var instructorName = instructorlist.options[instructorlist.selectedIndex].text;

    var courseCheck = document.getElementById('courseName').checked;
    var courseName = courseCheck.value;





    alert("instructor:" + instructorName + " CourseName: " + courseName + "lid:" + learnerId);


}