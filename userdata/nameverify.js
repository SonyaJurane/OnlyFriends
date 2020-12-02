//Validating name via regex to include non numbers
$(document.ready).ready(function() {
});
function nameValidator(elem, helperMsg)
{
    var regex=/^([^0-9]*)$/;
    if(elem.value.match(regex)){
        return true;
    }
    else {
        alert(helperMsg);
        elem.focus();
        return false;
    }
}
//Display error message
function validateForm(e){
    var nameEntered=nameValidator(document.getElementById('name'), "Names cannot include numbers!");
    return nameEntered;
}