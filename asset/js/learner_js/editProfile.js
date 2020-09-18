"use strict"
// window.nvalid = false;
// window.evalid = false;
// window.uvalid = false;
// window.pvalid = false;
// window.pconvalid = false;

function edit_popup_open() {
    var edit = document.getElementById('bg-modal');
    edit.style.display = 'block';

}

function edit_popup_close() {

    var close = document.getElementById('bg-modal');
    close.style.display = 'none';
}

function profileEdit() {
    var learnerId = document.getElementById("learnerid").value;
    var username = document.getElementById("username").value;
    //alert(username);
    var lname = document.getElementById("lname").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var conpassword = document.getElementById("conpassword").value;

    var lernerInfo = '' +
        'check_info=' + window.encodeURIComponent('ON') +
        '&learnerId=' + window.encodeURIComponent(learnerId) +
        '&username=' + window.encodeURIComponent(username) +
        '&lname=' + window.encodeURIComponent(lname) +
        '&email=' + window.encodeURIComponent(email) +
        '&password=' + window.encodeURIComponent(password) +
        '&conpassword=' + window.encodeURIComponent(conpassword);
    // var myObj = {
    //     'learnerId': learnerId,
    //     'username ': username,
    //     'lname ': lname,
    //     'email': email,
    //     'password': password,
    //     'conpassword': conpassword
    // };

    // var lernerInfo = JSON.stringify(myObj);
    var xttp = new XMLHttpRequest();
    xttp.open("POST", "../../php/learner_php/editProfileCheck.php", true);
    xttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xttp.send(lernerInfo);
    xttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            alert(this.responseText);
            edit_popup_close();
            window.location.reload();

        }
    }

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
    } else if (email != "") {
        xhttp.open('POST', '../../php/editProfileCheck.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(email_datas);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                document.getElementById("emailMsg").innerHTML = this.responseText;


            }
        }

        window.evalid = false;
    } else if (pos == -1 || pos1 == -1 || pos1 < pos) {
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
    } else if (uname != "") {
        xhttp.open('POST', '../../php/learner_php/editProfileCheck.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(username_datas);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                document.getElementById("unameMsg").innerHTML = this.responseText;


            }
        }
    } else {
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

function validation() {
    if (window.nvalid == true && window.evalid == true && window.pconvalid == true && window.uvalid == true && window.pvalid == true) {


        ;
    } else {
        alert("Validate hoy nai");
    }
}