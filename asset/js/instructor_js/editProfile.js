"use strict"
// window.nvalid = false;
// window.evalid = false;
// window.uvalid = false;
// window.pvalid = false;
// window.pconvalid = false;

function popupOpen() {
    var editBox = document.getElementById('bg-modal');
    var lowerPart = document.getElementById("lower-container");
    var loweButton = document.getElementById("loweButton");
    var imageContainer = document.getElementById("imageContainer");
    var cardContainer = document.getElementById("cardContainer");
    editBox.style.display = 'block';
    lowerPart.style.display = 'none';
    loweButton.style.display = 'none';
    imageContainer.style.top = '70px';
    cardContainer.style.height = '100%';
}

function edit_popup_close() {

    var close = document.getElementById('bg-modal');
    var lowerPart = document.getElementById("lower-container");
    var loweButton = document.getElementById("loweButton");
    var imageContainer = document.getElementById("imageContainer");
    var cardContainer = document.getElementById("cardContainer");
    close.style.display = 'none';
    lowerPart.style.display = 'block';
    loweButton.style.display = 'block';
    imageContainer.style.top = '120px';
    cardContainer.style.height = '85%';
}

//name validation
function neMpty() {
    var name = document.getElementById("lname").value;
    var lent = name.length;

    if (name == "") {
        document.getElementById("nameMsg").innerHTML = "*field can't be empty!";

        window.nvalid = false;
    } else if ((name >= 'A' && name <= 'Z' || name >= 'a' && name <= 'z') && lent < 2) {
        document.getElementById("nameMsg").innerHTML = "*length can't be less then 2!";
        window.nvalid = false;

    } else if (name >= '0' && name <= '9' || name == '+' || name == '-' || name == '*' || name == '/' || name == '=' || name == '@' || name == '$' || name == '%' || name == '!' || name == '|' || name == '?') {

        document.getElementById("nameMsg").innerHTML = "*name must be characters (a-z,A-Z,dot(.) or dash(-)) ";

        window.nvalid = false;
    } else if (name >= 'A' && name <= 'Z' || name >= 'a' && name <= 'z' || name == '-' || name == '.') {

        window.nvalid = true;
    }


}


function nRemover() {
    document.getElementById('nameMsg').innerHTML = "";

}

//email validation
function eEMpty() {
    var email = document.getElementById("email").value;

    var email_datas = '' +
        'check_email=' + window.encodeURIComponent('ON') +
        '&emailId=' + window.encodeURIComponent(email);
    let xhttp = new XMLHttpRequest();
    var pos = email.search("@");
    var pos1 = email.search(".com");
    if (email == "") {
        document.getElementById("emailMsg").innerHTML = "  *field can't be empty!";
        window.evalid = false;
    }
    //else if (email != "") {
    //     xhttp.open('POST', '../../php/instructor_php/profileEditCheck.php', true);
    //     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //     xhttp.send(email_datas);
    //     xhttp.onreadystatechange = function() {
    //         if (this.readyState == 4 && this.status == 200) {

    //             document.getElementById("emailMsg").innerHTML = this.responseText;


    //         }
    //     }

    //     window.evalid = false;
    //} 
    else if (pos == -1 || pos1 == -1 || pos1 < pos) {
        document.getElementById("emailMsg").innerHTML = "  *invalid email! must be like (sample@example.com)";
        window.evalid = false;
    } else {
        window.evalid = true;
    }
}

function eRemover() {
    document.getElementById('emailMsg').innerHTML = "";

}

// username validation

function ueMpty() {
    var uname = document.getElementById("username").value;
    var username_datas = '' +
        'check_user=' + window.encodeURIComponent('ON') +
        '&userName=' + window.encodeURIComponent(uname);
    let xhttp = new XMLHttpRequest();

    if (uname == "") {
        document.getElementById("unameMsg").innerHTML = "  *field can't be empty!";

        window.uvalid = false;
    } //else if (uname != "") {
    //     xhttp.open('POST', '../../php/instructor_php/profileEditCheck.php', true);
    //     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //     xhttp.send(username_datas);
    //     xhttp.onreadystatechange = function() {
    //         if (this.readyState == 4 && this.status == 200) {

    //             document.getElementById("unameMsg").innerHTML = this.responseText;


    //         }
    //     }
    // } 
    else {
        window.uvalid = true;
    }



}

function uRemover() {
    document.getElementById('unameMsg').innerHTML = "";

}




//password validation
function PeMpty() {
    var password = document.getElementById("password").value;
    if (password == "") {
        document.getElementById("passMsg").innerHTML = "*password field can't be empty!";
        window.pvalid = false;

    } else {
        window.pvalid = true;

    }
}

function pRemover() {
    document.getElementById("passMsg").innerHTML = "";
}


function PconeMpty() {
    var password = document.getElementById("password").value;
    var conpassword = document.getElementById("conpassword").value;

    if (conpassword == "") {
        document.getElementById("conpassMsg").innerHTML = "*password field can't be empty!";
        window.pconvalid = false;

    }

    if (conpassword != password) {
        document.getElementById("conpassMsg").innerHTML = "*password and confirmpassword is not maching!";
        window.pconvalid = false;

    } else {
        window.pconvalid = true;

    }
}

function pconRemover() {
    document.getElementById("conpassMsg").innerHTML = "";
}

function profileEdit() {

    var instructorId = document.getElementById("instructorId").value;
    var username = document.getElementById("username").value;
    //alert(username);
    var lname = document.getElementById("lname").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var conpassword = document.getElementById("conpassword").value;

    var validCon = editValidation();
    if (validCon == true) {
        var myObj = {
            instructorId: instructorId,
            username: username,
            lname: lname,
            email: email,
            password: password,
            conpassword: conpassword
        };

        var lernerInfo = JSON.stringify(myObj);
        var xttp = new XMLHttpRequest();
        xttp.open("POST", "../../php/instructor_php/profileEditCheck.php", true);
        xttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xttp.send('check_info=' + lernerInfo);
        xttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                alert(this.responseText);
                edit_popup_close();
                window.location.reload();

            }
        }
    } else if (validCon == false) {
        alert("Something Went Wrong!");
    }
    // var lernerInfo = '' +
    //     'check_info=' + window.encodeURIComponent('ON') +
    //     '&learnerId=' + window.encodeURIComponent(learnerId) +
    //     '&username=' + window.encodeURIComponent(username) +
    //     '&lname=' + window.encodeURIComponent(lname) +
    //     '&email=' + window.encodeURIComponent(email) +
    //     '&password=' + window.encodeURIComponent(password) +
    //     '&conpassword=' + window.encodeURIComponent(conpassword);


}

function editValidation() {
    if (window.nvalid == true && window.evalid == true && window.pconvalid == true && window.uvalid == true && window.pvalid == true) {

        return true;

    } else {
        return false;
    }
}