"use strict"


function classDelete(instructorId) {
    // alert(instructorId);
    var courseName = document.getElementById('className').value;
    var allObj = {
        'instructor_id': instructorId,
        'courseName': courseName
    };

    var allInfo = JSON.stringify(allObj);
    let xttps = new XMLHttpRequest();
    xttps.open('POST', '../../php/instructor_php/classSettingCheck.php', true);
    xttps.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xttps.send('checkInfo=' + allInfo);
    xttps.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            alert(this.responseText);

        }
    }

}