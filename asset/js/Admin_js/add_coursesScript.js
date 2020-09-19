function popup_open() {
    var open = document.getElementById('bg-modal');
    open.style.display = 'block';
}

function popup_close() {
    var close = document.getElementById('bg-modal');
    close.style.display = 'none';
}


function add_course() {
    var course_name = document.getElementById("course_name").value;
    var course_category = document.getElementById("course_category").value;
    var allobj = {
        'course_name': course_name,
        'course_category': course_category
    };
    var allInfo = JSON.stringify(allObj); //using JSON
    let xttp = new XMLHttpRequest(); //USING AJAX
    xttp.open('POST', '../../php/admin_php/CoursesCheck.php', true);
    xttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xttp.send('checkCourseInfo=' + allInfo);
    xttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        }
    }
}