var j = jQuery.noConflict();
var searchResultsTable = null;

j(document).ready(function() {
  searchResultsTable = $("#searchResultsTable").dataTable({
    "asStripClasses": [ 'even', 'odd' ],
    "sPaginationType": "full_numbers",
    "bFilter": true,
    "bJQueryUI": true,
    "bSort": true,
    "bAutoWidth": false,
    "bProcessing": true,
    "bPaginate": true,
    "sDom": '<"clear"><"right"T><"clear"><"H"lfr>t<"F"ip><"clear spacer">',
    "oTableTools": {
	   "sSwfPath": "/js/snj/swf/copy_cvs_xls_pdf.swf",
       "aButtons": [
         "copy", "csv", "xls", "pdf"
       ]
    },
    "sAjaxSource": "getmytickets",
    "fnRowCallback": function(nRow, aData, iDisplayIndex, iRowIndex) {
        var txt = $("td:eq(5)", nRow).html();
        if (txt == "Yes")
        {
            $("td:eq(5)", nRow).addClass("red-text"); // Conflict
        }
        txt = $("td:eq(6)", nRow).html();
        if (txt == "No")
        {
            $("td:eq(6)", nRow).addClass("red-text"); // Resources assigned 
        }
        return nRow;
    }
    
  });
  

  $("#searchResultsTable tbody tr").each(function(){
    $(this).mouseover(function(){
      $(this).addClass("ui-state-hover");
      }).mouseout(function(){
        $(this).removeClass("ui-state-hover");
      });
  });
  
  $(document).uiforms();
});
