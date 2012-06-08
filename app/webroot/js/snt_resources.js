var j = jQuery.noConflict();
var selectedValue;

j(document).ready(function(){
    datePickerRemover();
});

function addEngineer() {
    var new_additional_engineer_html = additional_engineer_html.replace(/EngineerCount/g, additional_engineer_count);
    new_additional_engineer_html = new_additional_engineer_html.replace(/engineer_count/g, additional_engineer_count);
    new_additional_engineer_html = new_additional_engineer_html.replace(/engineer_label_count/g, (parseInt(additional_engineer_count)+1));
    j("#resource_options").append(new_additional_engineer_html);
    additional_engineer_count++;
}

function showAddResourceLink() {   
    if(j("#JobScheduleOverallStatus").val() == "Completed (Accepted)")
        j("#add_resource_link").html(manageResourceLink);
    else
        j("#add_resource_link").html("");
}

function datePickerRemover() {
    j("#project_date_start-trigger").remove();
    j("#project_date_end-trigger").remove();
    j("#project_position_date_start-trigger").remove();
    j("#project_position_date_end-trigger").remove();
    j("#expiration_date-trigger").remove();
    j("#date_requested_start-trigger").remove();
    j("#date_requested_end-trigger").remove();
}