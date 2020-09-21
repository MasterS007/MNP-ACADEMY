function postStatus() {
    var statusText = document.getElementById('statusBox').value;
    var userId = document.getElementById('instructorId').value;
    // alert(statusText + '' + userId);

    if (statusText == "") {
        document.getElementById('errorMsg').innerHTML = "Please, write something first!";
    }

    var myObj = {

        statusText: statusText,
        userId: userId
    };

    var statusInfo = JSON.stringify(myObj);

    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../../php/instructor_php/postsCheck.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("check_post=" + statusInfo);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            // alert(this.responseText);
            window.location.reload();

        }
    }
}

function removeError() {
    document.getElementById('errorMsg').innerHTML = "";
}

function commentReply() {
    var commenterId = document.getElementById('comenterId').value;
    var replyBtn = document.getElementById('replyBtn')
    var commentBox = document.getElementById('commentBox');
    var commentBtn = document.getElementById('postComment');
    commentBox.style.display = 'none';
    replyBtn.style.display = 'block';
    commentBtn.style.display = 'none';

    if (commentBox.value == "") {
        document.getElementById('erMsg').innerHTML = "Please, write something first!";
        commentBox.style.display = 'block';
        commentBtn.style.display = 'block';
    }

}

function commentPopup() {

    var commentBox = document.getElementById('commentBox');
    var replyBtn = document.getElementById('replyBtn');
    var commentBtn = document.getElementById('postComment');
    commentBox.style.display = 'block';
    replyBtn.style.display = 'none';
    commentBtn.style.display = 'block';


}