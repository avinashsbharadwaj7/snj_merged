<li id="backButton"><?php echo $this->Html->link(__('Back', true), array('controller' => 'snjs', 'action' => 'snjcall')); ?></li> 
<script type="text/javascript">
$(document).ready(function() {
	//tableToGrid("#searchResultsTable",{
	$("#searchResultsTable").jqGrid({
		datatype: 'clientSide',
		pager: '#searchResultsPager',
		altrows: true,
	    rowNum:25,
	    rowList:[25,50,75],
	    sortname: 'job_id',
	    sortorder: 'desc',
	    viewrecords: true,
	    caption: 'Search Results - Double Click on Record to View',
	    height: 450,
	    autowidth: true,
	    recordtext: "Viewing {0} - {1} of {2}",
	    emptyrecords: "No records to view",
		loadtext: "Loading...",
		pgtext : "Page {0} of {1}",
		colModel:[<?php echo $colModel;?>],
		colNames:[<?php echo $colNames;?>],
		ondblClickRow: function(rowid,iRow,iCol,e){
			//alert(rowid+" "+iCol);
			window.location.href = "view/"+rowid;
		}
	});
	<?php foreach($search_results as $key=>$row){?>
		<?php
			$rowData = array();
			foreach($row as $rowKey=>$column){
				$rowData[$field_mapping[$rowKey]['th_id']] = $column;
			}
		?>
		$("#searchResultsTable").addRowData( <?php echo $rowData['job_id']; ?>, <?php echo json_encode($rowData);?> )
	<?php } ?>
	$("#searchResultsTable").navGrid('#searchResultsPager',{
		edit:false,
		add:false,
		del:false,
		search:false,
		refresh:false
	});
});
</script>

<div id="searchResultsContainer" class="container_12 ui-widget">
<div id="searchResults" class="grid_12 alpha omega highlight_row">
  <table id="searchResultsTable" class="ui-widget-content display"></table>
  <div id="searchResultsPager"></div>
</div> <!-- end searchResults -->
</div> <!-- end searchResultsContainer -->