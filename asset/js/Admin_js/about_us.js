function load() {
    {
        var xhttp = new XMLHttpRequest();
        xhttp.open("Get", "../../../php/admin_php/about_us.php", true);
        xhttp.send();
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('Table').innerHTML = this.responseText;
            }

        };


    }

}