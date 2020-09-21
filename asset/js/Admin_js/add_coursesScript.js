function popup_open() {
    var open = document.getElementById('bg-modal');
    open.style.display = 'block';
}

function popup_close() {
    var close = document.getElementById('bg-modal');
    close.style.display = 'none';
}


// function deleteCourse() {
//     var course_name = document.getElementById("course_name").value;
//     let xttp = new XMLHttpRequest(); //USING AJAX

//     if (confirm("Are you sure you want to delete " + course_name + " ?")) {
//         xttp.open('POST', '../../php/admin_php/CoursesCheck.php', true);
//         xttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//         xttp.send('checkDelete=' + course_name);
//         xttp.onreadystatechange = function() {
//             if (this.readyState == 4 && this.status == 200) {

//                 alert(this.responseText);

//             }

//         }
//     }



// }

function courseValidation() {
    var course_name = document.getElementById("course_name").value;

    if (course_name == "") {
        document.getElementById('course_nameMsg').innerHTML = "Please, write course name";
    } else if (course_name != "") {
        let xttp = new XMLHttpRequest(); //USING AJAX
        xttp.open('POST', '../../php/admin_php/CoursesCheck.php', true);
        xttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xttp.send('checkCourse=' + course_name);
        xttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                document.getElementById('course_nameMsg').innerHTML = this.responseText;

            }

        }
    }
}

function C_Remover() {
    document.getElementById('course_nameMsg').innerHTML = "";
}

function add_course() {
    var course_name = document.getElementById("course_name").value;
    var course_category = document.getElementById("course_category").value;
    var allobj = {
        course_name: course_name,
        course_category: course_category
    };
    // alert(course_category);
    var allInfo = JSON.stringify(allobj); //using JSON
    let xttp = new XMLHttpRequest(); //USING AJAX
    xttp.open('POST', '../../php/admin_php/CoursesCheck.php', true);
    xttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xttp.send('checkCourseInfo=' + allInfo);
    xttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
            popup_close();
            window.location.reload();

        }
    }
}