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
            
            let xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../../view/instructor_view/files.php', true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send('checkInfo=' + courseName);
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    
                    document.getElementById('uploadMsg').innerHTML = "Upload Successfull";

                }
            }
        }
    }
}