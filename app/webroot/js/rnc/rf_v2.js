j(document).ready(function() {
    j("#RfV2ModuleMarketLead").autocomplete({
        source: auto_complete_url,
        minLength: 2
    })
    j(".date").datepicker({ dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true });
    j("#RfV2ModuleInitialPlannedDeliveryDateOnSow").change(function(){
        if(j("#RfV2ModuleActualDeliveryDate").val() === ""){
            j("#RfV2ModuleActualDeliveryDate").val(j("#RfV2ModuleInitialPlannedDeliveryDateOnSow").val());
        }
    });
    j(":input").trigger('change');
});

function addEngineer(){
    var new_additional_engineer_html = additional_engineer_html.replace(/EngineerCount/g, additional_engineer_count);
    new_additional_engineer_html = new_additional_engineer_html.replace(/engineer_count/g, additional_engineer_count);
    new_additional_engineer_html = new_additional_engineer_html.replace("engineer_label_count", (parseInt(additional_engineer_count)+1));
    j("#div_additional_engineers").append(new_additional_engineer_html);
    additional_engineer_count++;
}

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