var j = jQuery.noConflict();
var searchResultsTable = null;

j(document).ready(function() {
  searchResultsTable = j("#searchResultsTable2").dataTable({
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
    "aoColumns": [ 
      /* Job ID                  */ { "sWidth": "10%" },
      /* Organization            */ { "sWidth": "10%" },
      /* SoW                     */ { "sWidth": "20%" },
      /* Start Date/Time         */ { "sWidth": "10%" },
      /* Conflict Status         */ { "sWidth": "10%" }, 
      /* Resources Assigned      */ { "sWidth": "10%" },
      /* Child Tickets           */ { "sWidth": "10%" },
      /* Action                  */ { "sWidth": "10%" }
    ],
    "fnRowCallback": function(nRow, aData, iDisplayIndex, iRowIndex) {
              var txt = j("td:eq(4)", nRow).html();
              if (txt == "Yes")
              {
                 j("td:eq(4)", nRow).addClass("red-text"); // Conflict
              }
              txt = j("td:eq(5)", nRow).html();
              if (txt == "No")
              {
                 j("td:eq(5)", nRow).addClass("red-text"); // Resources assigned
              }
	      return nRow;
    }
  });
  

  j("#searchResultsTable tbody tr").each(function(){
    j(this).mouseover(function(){
      j(this).addClass("ui-state-hover");
      }).mouseout(function(){
        j(this).removeClass("ui-state-hover");
      });
  });
  
  function postAndRefresh() {
    var url = document.URL.replace(/\/\w+$/, '/getsearchresults');
    var formData = j('#JobSearchForm').serialize();
      
    j.ajax({
     type: 'POST',
     url: url,
     data: formData,
     success: function(jsonData) {
       searchResultsTable.fnClearTable();
       for ( var ii=0 ; ii < jsonData.aaData.length ; ii++ )
       {
         searchResultsTable.fnAddData( jsonData.aaData[ii] );
       }
     },
     dataType : "json"
   });
  }

  j('#JobSearchForm button').click( function () {
      postAndRefresh();
  });

  postAndRefresh();
  
});
