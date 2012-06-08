var j = jQuery.noConflict();
var jobInfoTable = null;
var taskInfoTable = null;
var nodeInfoTable = null;

j(document).ready(function() {
 jobInfoTable = j("#jobInfoTable").dataTable({
     "sPaginationType": "full_numbers",
     "bFilter": false,
     "bJQueryUI": true,
     "bSort": false,
     "bProcessing": true,
     "bPaginate": true,
     "iDisplayLength": 2,
     "aoColumns": [null, null]
   });

   taskInfoTable = j("#taskInfoTable").dataTable({
     "sPaginationType": "full_numbers",
     "bFilter": false,
     "bJQueryUI": true,
     "bSort": false,
     "bProcessing": true,
     "bPaginate": true,
     "bAutoWidth": false
   });
   
   nodeInfoTable = j("#nodeInfoTable").dataTable({
     "sPaginationType": "full_numbers",
     "bFilter": false,
     "bJQueryUI": true,
     "bSort": false,
     "bProcessing": true,
     "bPaginate": true
   });
   
   j(".dataTables_wrapper").css('min-height', '20px');
     
  j(document).uiforms();
});