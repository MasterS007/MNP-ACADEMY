function UploadFile(instructorId) {

    // window.onload = function() {

    clickButton(instructorId);

}


function clickButton(instructor_id) {

    //var fileupload = document.getElementById("uploadbox");
    var courseName = document.getElementById("spnFilePath").value;
    var button = document.getElementById("btn_upload");
    // fileupload.click();
    // fileupload.onchange = function() {


    //  var fileName = fileupload.value.split('\\')[fileupload.value.split('\\').length - 1];

    // var property = fileupload.files[0];

    //  var form_data = new FormData();
    // form_data.append('file', property);
    var allObj = {
        'instructor_id': instructor_id,
        'courseName': courseName
    };

    var allInfo = JSON.stringify(allObj);
    let xttp = new XMLHttpRequest();
    xttp.open('POST', '../../php/instructor_php/metarialCheck.php', true);
    xttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xttp.send('checkInfo=' + allInfo);
    xttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            // alert(this.responseText); 

        }
    }
}

function deleteFile() {
    var selectedFile = document.getElementById('fileName').value;
    var xttps = new XMLHttpRequest();

    if (selectedFile != "") {
        xttps.open('POST', '../../php/instructor_php/metarialCheck.php', true);
        xttps.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xttps.send('checkFile=' + selectedFile);
        xttps.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                alert(this.responseText);

            }
        }
    }
}