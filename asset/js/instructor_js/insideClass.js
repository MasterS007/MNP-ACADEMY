function fetchClassName() {

    var className = document.getElementById('courseName');

    let xttp = new XMLHttpRequest();
    xttp.open('POST', '../../view/instructor_view/insideClass.php', true);

    xttp.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
    xttp.send('Namecourse=' + className);
    xttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('class_heading').innerHTML = this.responseText;
        }
    }


}