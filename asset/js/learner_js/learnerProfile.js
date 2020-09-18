"use strict"

window.nvalid = false;
window.evalid = false;
window.gvalid = false;
window.pconvalid = false;
window.uvalid = false;
window.dvalid = false;
window.pvalid = false;

var i;

//name validation
function neMpty() {
    var name = document.getElementById("name").value;
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
        xhttp.open('POST', '../../php/add_admin.php', true);
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
    var uname = document.getElementById("uname").value;
    var username_datas = '' +
        'check_user=' + window.encodeURIComponent('ON') +
        '&userName=' + window.encodeURIComponent(uname);
    let xhttp = new XMLHttpRequest();

    if (uname == "") {
        document.getElementById("unameMsg").innerHTML = "  *field can't be empty!";

        window.uvalid = false;
    } else if (uname != "") {
        xhttp.open('POST', '../../php/learner_php/edit_learner_profile.php', true);
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

// gender validation

function geMpty() {
    if (document.getElementById("Male").checked) {
        window.gvalid = true;
    } else if (document.getElementById("Female").checked) {
        window.gvalid = true;
    } else if (document.getElementById("Other").checked) {
        window.gvalid = true;
    } else {
        document.getElementById("genderMsg").innerHTML = "  *please choose a gender!";
        window.gvalid = false;

    }
}

function gRemover() {
    document.getElementById("genderMsg").innerHTML = "";
}

//date of birth validation

function deMpty() {
    var date = document.getElementById("date").value;
    var month = document.getElementById("month").value;
    var year = document.getElementById("year").value;

    if (date == null || month == null || year == null) {
        document.getElementById("dobMsg").innerHTML = "  *field can't be empty!";

        window.dvalid = false;
    } else if ((date >= 1 && date <= 31) && (month >= 1 && month <= 12) && (year >= 1900 && year <= 2016)) {

        window.dvalid = true;

    } else {
        document.getElementById("dobMsg").innerHTML = "*must be a valid number (dd: 0-31, mm: 1-12, yyyy: 1900-2016)!";
        window.dvalid = false;
    }


}


function dRemover() {
    document.getElementById("dobMsg").innerHTML = "";

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

function validation(){
    if (window.nvalid == true && window.evalid == true && window.gvalid == true && window.pconvalid == true && window.uvalid == true &&
        window.dvalid == true && window.pvalid == true) 
    {
        return true;
    } 
    else 
    {
        return false;
    }
}









function edit_popup_open(){
   var edit=document.getElementById('bg-modal'); 
   edit.style.display='block';
    
}

function edit_popup_close(){

   var close = document.getElementById('bg-modal');
   close.style.display = 'none';
}

