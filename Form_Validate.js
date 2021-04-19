function seterror(id, error){
    element = document.getElementById(id);
    element.getElementsByClassName('formerror')[0].innerHTML = error;

}

function validateForm(){
    var returnval = true;
    var Bname = document.forms['addBook']["BookName"].value;
    if (Bname.length == 0){
        seterror("bname", "*Book Name cannot be Null!");
        returnval = false;
    }     
    var Aname = document.forms['addBook']["BookAuthor"].value;
    if (Aname.length == 0){
        seterror("Aname", "*Book Author cannot be zero!");
        returnval = false;
    } 
    return returnval;
}
