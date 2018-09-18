function validateForm() {
    var x = document.forms["loginform"]["logInUid"].value;
    var y = document.forms["loginform"]["logInPwd"].value;
    if (x == "" || y == "") {
        alert("Fill out the fields!");
        return false;
    }
} 