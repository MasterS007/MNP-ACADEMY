// function load() {
//     {
//         var xhttp = new XMLHttpRequest();
//         xhttp.open("POST", "../../../php/admin_php/about_us.php", true);
//         xhttp.send("check=" + 'ON');
//         xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

//         xhttp.onreadystatechange = function() {
//             if (this.readyState == 4 && this.status == 200) {
//                 document.getElementById('Table').innerHTML = this.responseText;
//             }

//         };


//     }

// }


function about_popup_open() {
    var open = document.getElementById('bg-modal');
    open.style.display = 'block';
}

function about_popup_close() {
    var close = document.getElementById('bg-modal');
    close.style.display = 'none';
}

function edit_popup_open() {
    var edit = document.getElementById('bg-modal_edit');
    edit.style.display = 'block';
}

function edit_popup_close() {
    var edit_close = document.getElementById('bg-modal_edit');
    edit_close.style.display = 'none';
}
"use strict"
window.T_Valid = false;
window.ST_Valid = false;
window.D_Valid = false;


//Title
function Title_empty() {
    var title = document.getElementById("title").value;
    if (title == "") {
        document.getElementById("titleMsg").innerHTML = "Title Can't be empty";
        window.T_Valid = false;
    } else {
        window.T_Valid = true;
    }
}

function Title_Remover() {
    document.getElementById('titleMsg').innerHTML = "";

}
//Sub Title
function ST_empty() {
    var sub_title = document.getElementById("sub_title").value;
    var sub_titleData = '' + 'check_subTitle' + window.encodeURIComponent('ON') +
        '$sub_Title_Id' + window.encodeURIComponent(sub_title);
    let xhttp = new XMLHttpRequest();
    if (sub_title == "") {
        document.getElementById("").innerHTML = "Sub Title can't be empty";
    } else if (sub_title != "") {
        xhttp.open('POST', '../../php/admin_php/about_us.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(sub_titleData);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("sub_title").innerHTML = this.responseText;
            }
        }
        window.ST_Valid = false;
    } else {
        window.ST_Valid = true;
    }
}

function ST_Remover() {
    document.getElementById('sub_title').innerHTML = "";

}


function des_eMpty() {
    var description = document.getElementById("descriptions").value;
    if (description == "") {
        document.getElementById("descriptionMsg").innerHTML = "Description Can't be empty";
        window.D_Valid = false;
    } else {
        window.D_Valid = true;
    }
}

function des_Remover() {
    document.getElementById('descriptionMsg').innerHTML = "";

}

function validation() {
    if (window.T_Valid == true && window.ST_Valid == true && window.D_Valid == true) {
        return true;
    } else {
        return false;
    }
}