function validate() {
    form = document.getElementsByClassName("validate")[0];  

    if( form.serialNumber.value == "" ) {
       alert( "Please provide the serial number!" );
       form.serialNumber.focus();
       return false;
    }
    if( form.cmpName.value == "" ) {
       alert( "Please provide the computer name!" );
       form.cmpName.focus();
       return false;
    }
    if( form.Lname.value == "" ) {
        alert( "Please provide the owner's last name!" );
        form.Lname.focus();
        return false;
    }
    if( form.RmNum.value == "" ) {
        alert( "Please provide the room number!" );
        form.RmNum.focus();
        return false;
    }
    if( form.Asset.value == "" ) {
        alert( "Please provide the asset type!" );
        form.Asset.focus();
        return false;
    }
    if( form.Allocation.value == "" ) {
        alert( "Please provide the allocation!" );
        form.Allocation.focus();
        return false;
    }
    if( form.Make.value == "" ) {
        alert( "Please provide the make!" );
        form.Make.focus();
        return false;
    }
    if( form.Model.value == "" ) {
        alert( "Please provide the model!" );
        form.Model.focus();
        return false;
    }
    if( form.PurchaseDate.value == "" || form.PurchaseDate.value.length != 10 || !/^\d{2}\/\d{2}\/\d{4}$/.test(form.PurchaseDate.value)) {
        alert( "Please provide the purchase date in format (MM/DD/YYYY)" );
        form.PurchaseDate.focus();
        return false;
    }
    if( form.Repl.value == "") {
        alert( "Please provide the Replacement (Yes/No)" );
        form.Repl.focus();
        return false;
    }else if(form.Repl.value != "Yes" && form.Repl.value != "No"){
        alert( "Please provide the Replacement (Yes/No)" );
        form.Repl.focus();
        return false;
    }
    if( form.Repl.value == "Yes" && (form.ReplYr.value == "" || form.ReplYr.value.length != 2 || parseInt(form.ReplYr.value).toString() == "NaN") ) {
        alert( "Please provide the replacement year in format (YY)!" );
        form.Model.focus();
        return false;
    }
    if( form.Amount.value == "") {
        alert( "Please provide the cost!" );
        form.Amount.focus();
        return false;
    }else if(parseFloat(form.Amount.value).toString() == "NaN"){
        alert( "Please provide the cost!" );
        form.Amount.focus();
        return false;
    }
    return( true );
}