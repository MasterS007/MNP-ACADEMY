function UploadFile(instructorId) {

    // window.onload = function() {

    clickButton(instructorId);

}


function clickButton(instructor_id) {

    var fileupload = document.getElementById("uploadbox");
    var courseName = document.getElementById("spnFilePath");
    // var button = document.getElementById("btn_upload");
    fileupload.click();
    fileupload.onchange = function() {
        var fileName = fileupload.value.split('\\')[fileupload.value.split('\\').length - 1];
        // filePath.innerHTML = "<b>Selected File: </b>" + fileName;
        var allInfo = {
            'instructor_id': instructor_id,
            'courseName': courseName,
            'fileName': fileName
        };
        let xttp = new XMLHttpRequest();
        xttp.open('POST', '../../php/instructor_php/metarialCheck.php', true);
        xttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xttp.send('checkInfo=' + allInfo);
        xttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
            }
        }
    };

}