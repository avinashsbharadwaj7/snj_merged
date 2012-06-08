var uploadDialog;
var downloadDialog;
var dirtyBit = false;
$(document).ready(function() {
    $("#tabs").tabs({
        select: function(event, ui){
            if(ui.index > 0 && ui.index < 12 && dirtyBit){
                if(confirm("you have made changes to this tab. Please save them before changing the tab. Click Cancel to not Save the changes.")){
                    return false;
                }
                dirtyBit = false;
            }
            if(ui.index == 0){
                updateGroupData();
                return true;
            }

        }
    });
    $("input, select, textbox").change(function(){
        dirtyBit = true;
    });
    $("form").addClass("appnitro");
    $(".input").addClass("element");
    $(".add_note").toggle(function(){
            var txtArea = $(this).parent().next();
            $(txtArea).show("slide",{direction: "up"},500);
            $(this).val('-');
        }, function(){
            var txtArea = $(this).parent().next();
            $(txtArea).hide("slide",{direction: "up"},500);
            if($(txtArea.find("textarea")).val() == "")
                $(this).val('+');
            else
                $(this).val('+');
   });
   $(".closeme").siblings().slideToggle();
   $('.closeme').click(function(){
      $(this).siblings().slideToggle("slow");
      $(this).parent().find("img").toggle();
   });
   uploadDialog = $("#upload_files_generic_placeholder").dialog({autoOpen: false, height: 300, width: 600,title: "Upload Files"});
   downloadDialog = $("#download_files_generic_placeholder").dialog({autoOpen: false,height: 300,width: 600,title: "Downloadable Files"});
   $(".upload_file_img").click(function(){
        var fieldName = $(this).attr("alt");
        $("#belongs_to_generic").val(fieldName);
        uploadDialog.dialog('open');
   });
   $(".download_file_img").click(function(){
        block_ui("Retrieving Information...Please Wait..")
        var fieldName = $(this).attr("alt");
        $("#belongs_to_for_download").val(fieldName);
        var url = $("#LogFileDownloadFormGeneric").attr("action");
        $.ajax({
            type: "POST",
            url: url,
            data: $("#LogFileDownloadFormGeneric").serialize(),
            success: function(returnValue) {
                $("#download_files_content_placeholder").html(returnValue);
                $.unblockUI();
                downloadDialog.dialog("open");
            }
        })
   });

   $(".delete_file").live('click',function(){
       var url = $(this).attr("href");
       var dThis = this;
       if(!confirm("Are you sure you want to delete?"))
           return false;
       $.ajax({
           url: url,
           dataType: "json",
           success: function(data){
                $("#flashMessage").show();
                $("#flashMessage").html(data.message);
                $.jGrowl(data.message, {life: 10000});
                $(window).scrollTop(0);
                if(data.error == 0){
                    $(dThis).parent().remove();
                }
           }
       });
       return false;
   });
   $(".report_problem").click(function(e){
       e.preventDefault();
       reportProblem(this);
   });
   $("#email-text-field").hide();
   $("#request-email-container").click(function(e){
       e.preventDefault();
       if($("#OverviewReportId").val() === "NYA"){
            alert("Please create the report first.");
            return;
        }
       $("#email-text-field").dialog({title: "Send Email"});
   });
});

function update_message(data){
    $("#flashMessage").show();
    $("#flashMessage").html(data.message);
    $.jGrowl(data.message, {life: 10000});
    $(window).scrollTop(0);
    if(data.error == 0){
        $(".report_identifier").val(data.report_number);
        $('.groups_report_id').val(data.id);
        $("#RncReportId").val(data.id);
    }
    if($("#email-text-field").dialog("isOpen"))
        $("#email-text-field").dialog("close");
}

function reportProblem(element){
    if($("#OverviewReportId").val() === "NYA"){
        alert("Please create the report first.");
        return;
    }
    var url = issueUrl + "/" + $("#OverviewReportId").val() + "/" + $(element).attr("alt") + "/" + $.base64.encode($(element).parent().find("label").text());
    $.colorbox({iframe:true, width:"80%", height:"94%", fastIframe: false, href: url});
}

function create_revision_check(){
    if($("#RncReportId").val() == null || $("#RncReportId").val() == ""){
        alert("No report to create another revision");
        return false;
    }
    return false;
}