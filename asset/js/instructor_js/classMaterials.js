function UploadFile(instructorId) {

    // window.onload = function() {
    //alert(instructorId);
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

    var allInfo = JSON.stringify(allObj); //using JSON
    let xttp = new XMLHttpRequest(); //USING AJAX
    xttp.open('POST', '../../php/instructor_php/metarialCheck.php', true);
    xttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xttp.send('checkInfo=' + allInfo);
    xttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            // alert(this.responseText); 

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

// function deleteFile() {
//     var selectedFile = document.getElementById('fileName').value;
//     var xttps = new XMLHttpRequest();

//     if (selectedFile != "") {

//         var courseName = document.getElementById("spnFilePath").value;
//         if (confirm("Are you sure you want to delete?")) {
//             xttps.open('POST', '../../php/instructor_php/metarialCheck.php', true);
//             xttps.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//             xttps.send('checkFile=' + selectedFile);
//             xttps.onreadystatechange = function() {
//                 if (this.readyState == 4 && this.status == 200) {



//                     // window.location.href = "../../view/instructor_view/files.php?courseName={}";
//                     // var xttpp = new XMLHttpRequest();
//                     // xttpp.open('POST', '../../view/instructor_view/files.php', false);
//                     // xttpp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//                     // xttpp.send('checkFile=' + selectedFile);
//                     // xttpp.onreadystatechange = function() {
//                     //     if (this.readyState == 4 && this.status == 200) {

//                     //     }



//                     // }
//                 }
//             }
//         }
//     }

// }