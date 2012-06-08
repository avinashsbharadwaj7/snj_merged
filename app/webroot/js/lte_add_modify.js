/* Javascript code related to LTE Module functions
 * uses the jQuery library
 * @author Brian Ricks, Aliasgar Lanewala
 */

var jNC = jQuery.noConflict();

//jNC(document).ready(function(){
//    jNC('#erbs_id').hide();
//    jNC('#no_cells').hide();
//}
//);

jNC(document).ready(function(){
    jNC("#change_uplaoded_file").click(function(e){
        e.preventDefault();
        jNC("#file_input_html").show();
    });
});

function populateFields(myRequest, myJson) {
       myJson = myRequest.responseText.evalJSON();
       if(myJson != null){
           myJson = myJson[0].LteAttSite;
           jNC("#erbs_id").val(myJson.erbs_id);
           jNC("#no_cells").val(myJson.no_cells);
           jNC("#region").val(myJson.region);
           jNC("#oss").val(myJson.oss);
           jNC("#oss_version").val(myJson.oss_version);
           jNC("#area").val(myJson.area);
           jNC("#ip_address").val(myJson.ip_address);
           jNC("#customer_site_name").val(myJson.customer_site_name);
           jNC("#mme1_name").val(myJson.mme1_name);
           jNC("#mme1_ip_address").val(myJson.mme1_ip_address);
           jNC("#mme2_name").val(myJson.mme2_name);
           jNC("#mme2_ip_address").val(myJson.mme2_ip_address);
           jNC("#tac_information").val(myJson.tac_information);
           
       }
}


/* disable submit buttons */
function disableButtons(destIDEmail, destIDNoEmail, textInsert) {
    jNC('#' + destIDEmail).attr('disabled', true);
    //jNC('#' + destIDNoEmail).attr('disabled', true);
    jNC("<div style='text-align: center; font-weight: bold; padding: 2px;'>Working...</div>").insertAfter('#' + textInsert);
}

/* add/load specific functions */
function triggerUpdater(triggerID, destID, controller) {
    // calls the updater view to update the current view using XHR
    
    jNC.ajax({
        async:true, 
        data:jNC(triggerID).serialize(), 
        dataType:'html', 
        success:function (data) {
            jNC('#' + destID).html(data);
        }, 
        type:'post', url:"index.php/" + controller + "/updater"});
    
    return false;
}

function triggerUpdaterAppend(destID, controller) {
    // calls the updater view to update the current view using XHR
    
    jNC.ajax({
        async:true, 
        dataType:'html', 
        success:function (data) {
            jNC('#' + destID).append(data);
        }, 
        type:'post', url:"index.php/" + controller + "/updater"});
    
    return false;
}

function showUploader(triggerID, destID, associationIndex, model) {
    jNC('#' + destID).replaceWith("<input type='file' name='data[" + model + "][" + associationIndex + "][file]' id='" + destID +"' />");
    jNC('#' + triggerID).remove();
}

function showUploaderWithUndo(triggerID, destID, associationIndex, model, value) {
    jNC('#' + destID).replaceWith("<input type='file' name='data[" + model + "][" + associationIndex + "][file]' id='" + destID +"' /><a href=\"javascript:void(0)\" id=\"undo_" + destID + "\" onclick=\"showOriginalFile('" + destID + "', '" + triggerID + "', " + associationIndex + ", '" + model + "', '" + value + "'); return false\">undo</a>");
    jNC('#' + triggerID).remove();
}

function showOriginalFile(triggerID, destID, associationIndex, model, value) {
    jNC('#' + triggerID).replaceWith("<input type='text' readonly='readonly' value='" + value + "' name='data[" + model + "][" + associationIndex + "][file]' id='" + triggerID +"' /><a href=\"javascript:void(0)\" id=\"" + destID + "\" onclick=\"showUploaderWithUndo('" + destID + "', '" + triggerID + "', " + associationIndex + ", '" + model + "', '" + value + "'); return false\">change</a>");
    jNC('#undo_' + triggerID).remove();
}

function showHint(str) {
   
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","irt/index.php/ir_modules/getUser?q="+str,true);
xmlhttp.send();
}

function showHint2(str) {
   
if (str=="")
  {
  document.getElementById("txtHint2").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint2").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","irt/index.php/ir_modules/getUser2?q="+str,true);
xmlhttp.send();
}