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
function validateForm(e){
    var nameEntered=nameValidator(document.getElementById('name'), "Names cannot include numbers!");
    return nameEntered;
}