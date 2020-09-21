function postStatus() {
    var statusText = document.getElementById('statusBox').value;
    var userId = document.getElementById('instructorId').value;
    var courseName = document.getElementById('courseName').value;
    // alert(statusText + '' + userId);

    if (statusText == "") {
        document.getElementById('errorMsg').innerHTML = "Please, write something first!";
    }

    var myObj = {

        statusText: statusText,
        userId: userId,
        courseName: courseName
    };

    var statusInfo = JSON.stringify(myObj);

    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../../php/instructor_php/postsCheck.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("check_post=" + statusInfo);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            //alert(this.responseText);
            window.location.reload();

        }
    }
}

function removeError() {
    document.getElementById('errorMsg').innerHTML = "";
}

function commentReply() {
    var statusId = document.getElementById('statusId').value;
    var commenterId = document.getElementById('comenterId').value;
    var commentBox = document.getElementById('commentBox');
    var commentBtn = document.getElementById('postComment');
    var statusText = document.getElementById('statusBox');
    var post = document.getElementById('post');
    commentBox.style.display = 'none';
    commentBtn.style.display = 'none';
    statusText.style.display = 'block';
    post.style.display = 'block';

    if (commentBox.value == "") {
        document.getElementById('erMsg').innerHTML = "Please, write something first!";
        commentBox.style.display = 'block';
        commentBtn.style.display = 'block';
        statusText.style.display = 'none';
        post.style.display = 'none';
        commentBtn.style.top = "-1050px";
    }

    var myObj = {

        commentBox: commentBox.value,
        commenterId: commenterId,
        statusId: statusId

    };

    var commentInfo = JSON.stringify(myObj);

    let xttp = new XMLHttpRequest();
    xttp.open("POST", "../../php/instructor_php/comment_check.php", true);
    xttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xttp.send("check_comment=" + commentInfo);
    xttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            alert(this.responseText);
            commentBox.style.display = 'none';
            commentBtn.style.display = 'none';
            statusText.style.display = 'block';
            post.style.display = 'block';
            window.location.reload();

        }
    }

}

function removeErr() {
    var commentBtn = document.getElementById('postComment');
    commentBtn.style.top = "-1000px";
    document.getElementById('erMsg').innerHTML = "";
}