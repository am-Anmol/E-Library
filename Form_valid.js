function seterror(id, err){
    element = document.getElementById(id);
    element.getElementsByClassName('formerror')[0].innerHTML = err;

}
function validateForm(){
    var returnval = true;
    var Bname = document.forms['addBook']["BookName"].value;
    if (Bname.length == 0){
        seterror("bname", "*Book Name cannot be null!");
        returnval = false;
    }     
    var Aname = document.forms['addBook']["BookAuthor"].value;
    if (Aname.length == 0){
        seterror("Aname", "*Book Author cannot be null!");
        returnval = false;
    }    return returnval;
}
