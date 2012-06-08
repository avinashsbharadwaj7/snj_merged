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
      /* Ticket ID               */ { "sWidth": "10%" },
      /* LM                      */ { "sWidth": "10%" },
      /* Start Date/Time         */ { "sWidth": "10%" },
      /* End   Date/Time         */ { "sWidth": "10%" },
      /* SoW                     */ { "sWidth": "10%" }, 
      /* MOP Link                */ { "sWidth": "10%" },
      /* Status                  */ { "sWidth": "10%" }
    ]
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
