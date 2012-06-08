var j = jQuery.noConflict();
j(document).ready(function() {
    j(":input").trigger('change');
});
function greaterThan(fieldValue, obj){
    for(var i=0; i < obj.length; i++){
        if(fieldValue > obj[i]){
            return true;
        }
    }
    return false;
}
function compareDates(date1, date2){
    date1 = date2[0];
    date2 = date2[1];
    if(j("#"+date1).val() !== "" && j("#"+date2).val() !== ""){
        date1 = new Date(j("#"+date1).val()).getTime();
        date2 = new Date(j("#"+date2).val()).getTime();
        if(date2 > date1){
            return true;
        }
    }
    return false;
}