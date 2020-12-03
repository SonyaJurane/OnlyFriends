$(document.ready).ready(function() {
});

function validateForm() {
    var pass1 = document.forms["form"]["password"].value;
    var pass2 = document.forms["form"]["password2"].value;
    var div = document.getElementById('pw');
    if (pass1!==pass2){
            div.innerHTML = "Password: Password does not match"
            div.style.color = "red"
            return false;
    }
    else{
            div.innerHTML = "Password:"
            return true;
        }
    }