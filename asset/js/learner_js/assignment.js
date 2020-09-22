function UploadAssignment(learnerId) {

    //alert(instructorId);
    clickButton(learnerId);

}


function clickButton(learner_id) {

    var courseName = document.getElementById("spnFilePath").value;
    var button = document.getElementById("btn_upload");
    var allObj = {
        'instructor_id': instructor_id,
        'courseName': courseName
    };

    var allInfo = JSON.stringify(allObj); //using JSON
    let xttp = new XMLHttpRequest(); //USING AJAX
    xttp.open('POST', '../../php/learner_php/assignmentCheck.php', true);
    xttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xttp.send('checkInfo=' + allInfo);
    xttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            //alert(this.responseText);

        }
    }
}

function confirmDelete() {
    if (confirm("Are you sure you want to delete?")) {
        return true;
    } else {
        return false;
    }
}