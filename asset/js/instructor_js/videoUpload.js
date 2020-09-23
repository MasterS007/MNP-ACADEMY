function lectureUpload(instructor_id) {
    var leacturelink = document.getElementById('linkVideo').value;

    var courseName = document.getElementById("courseName").value;

    if (leacturelink == "") {
        document.getElementById('errorMsg').innerHTML = "field can't be empty!";
    }
    //alert(leacturelink + " " + instructor_id + " " + courseName);
    else {
        var allObj = {
            instructor_id: instructor_id,
            courseName: courseName,
            leacturelink: leacturelink
        };

        var allInfo = JSON.stringify(allObj); //using JSON
        let xttp = new XMLHttpRequest(); //USING AJAX
        xttp.open('POST', '../../php/instructor_php/videoLectureCheck.php', true);
        xttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xttp.send('checkInfo=' + allInfo);
        xttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                alert(this.responseText);
                window.location.reload();

            }
        }
    }


}

function remover() {

    document.getElementById('errorMsg').innerHTML = "";
}