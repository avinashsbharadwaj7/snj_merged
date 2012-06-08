var j = jQuery.noConflict();

	
	var NodeTextArea = '<textarea id="NodeConcernedNode" rows="6" cols="30" name="data[Node][concerned_node]"></textarea>';
	var NodeText = '<input type="text" id="NodeConcernedNode" name="data[Node][concerned_node]" />';
	var dummy = '<div id="dummy"></div>';
	var ExcelUpload = '<div class="input file" id="uploadExcel">';
	ExcelUpload += '<label for="Excel">Upload Excel</label>';
	ExcelUpload += '<input type="file" name="data[Node][Excel]" id="NodeExcel">';
	ExcelUpload + '</div>';

	$('#JobNodeEntryType').change(function(){
		var EntryType = $('#JobNodeEntryType').val();
		if(EntryType == 'Text Area'){
			if($('#NodeConcernedNode').before(dummy)){
				console.log('Dummy element created');
				$('#NodeConcernedNode').remove();
				$('#dummy').before(NodeTextArea);
			}
		}else{
			$('#dummy').remove();
			if($('#NodeConcernedNode').before(dummy)){
				console.log('Dummy element created');
				$('#NodeConcernedNode').remove();
				$('#dummy').before(NodeText);
			}
		}
		if(EntryType == 'Excel File Upload'){
			$('#fileupload').before(ExcelUpload);
		}else{
			$('#uploadExcel').remove();	
		}
		if(EntryType == 'Drop Down'){
			$('#spandates').html('<b>+ click to add</b>');
		}else{
			$('#moredates').empty();
		}
		
	});

	$('#spandates').click(function(){
		$('#dates').clone().appendTo('#moredates');
		//alert('Another Dates Slot Added');
	});
	
    $(document).uiforms();

                                