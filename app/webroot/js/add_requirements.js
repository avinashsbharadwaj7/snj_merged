var j = jQuery.noConflict();

function addreqmts() {
    //alert("hello");
    var new_add_requirement_html = complete_html.replace(/RequirementCount/g, addRequirement_count);
    new_add_requirement_html = new_add_requirement_html.replace(/requirement_count/g, addRequirement_count);
    new_add_requirement_html = new_add_requirement_html.replace(/requirement_label_count/g, (parseInt(addRequirement_count)+1));
    j("#resource_options").append(new_add_requirement_html);
    addRequirement_count++;
}