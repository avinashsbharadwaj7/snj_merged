<div>
    <?php echo $this->Form->create('Job');?>
	<?php echo $this->Form->label('Date Created: ' .date("D M Y")); ?>
    <?php //echo $this->Form->input('date_created', array('type' => 'date')); ?>
    <?php echo $this->Form->input('Signum'); ?>
    <?php echo $this->Form->input('Name'); ?>
	
	<?php //echo $this->Javascript->link('snj.js') ?>
	
	<?php
		$con = mysql_connect('localhost', 'root' , '');
		mysql_select_db("snj", $con);
	?>
	
	<?php
        $query = "SELECT idsnj_dd, dd_description FROM vieworganization";
        $res = mysql_query($query, $con);
		$arri = array();
		$count = 0;
		
        while (($row = mysql_fetch_assoc($res)) != null)
        {
			//debug ($row);
            //$arri[$row['idsnj_dd'] - 1] = $row['dd_description'];
			
			$arri[$row['idsnj_dd']] = $row['dd_description'];
			//$count++;
        }
    ?>
	
    <?php 
    	echo $this->Form->input('Organization',array('type'=>'select','options'=> $arri));
		echo $this->Ajax->observeField('JobOrganization', array('url' => array('controller' => 'ajax','action' => 'getScopeOfWorks'), 'update' => 'scope_of_work'));
    ?>
	
    <?php
		
        $query = "SELECT * FROM viewworklocation";
        $res = mysql_query($query, $con);
		$arri1 = array();
		$count = 0;
		
        while (($row = mysql_fetch_row($res)) != null)
        {
			$arri1[$row[1]] = $row[1];
			$count++;
        }
    ?>
    <?php echo $this->Form->input('Work_Location',array('type'=>'select', 
            'options'=> $arri1));?>

    <?php echo $this->Form->input('Network_Number', array('type' => 'text', 'maxlength' => 8)); ?>  
    <?php echo $this->Form->input('More_id', array('type' => 'text')); ?>  
    <?php echo $this->Form->input('CCB_tckt_no', array('type' => 'text')); ?> 

			<?php
        $query = "SELECT * FROM viewtechnology";
        $res = mysql_query($query, $con);
		$arri1 = array();
		$count = 0;
		
        while (($row = mysql_fetch_row($res)) != null)
        {
			//debug ($row);
            //$arri[$row['idsnj_dd'] - 1] = $row['dd_description'];
			
			$arri1[$row[1]] = $row[1];
			$count++;
        }
    ?>
	
	
    <?php echo $this->Form->input('Technology', array('type'=>'select', 
                'options'=> $arri1));?>

			<?php
        $query = "SELECT * FROM viewregion";
        $res = mysql_query($query, $con);
		$arri1 = array();
		$count = 0;
		
        while (($row = mysql_fetch_row($res)) != null)
        {
			//debug ($row);
            //$arri[$row['idsnj_dd'] - 1] = $row['dd_description'];
			
			$arri1[$row[1]] = $row[1];
			$count++;
        }
    ?>
	
   <?php echo $this->Form->input('Market',array('type'=>'text'));?>
				
			<?php
        $query = "SELECT * FROM viewworkdaytime";
        $res = mysql_query($query, $con);
		$arri1 = array();
		$count = 0;
		
        while (($row = mysql_fetch_row($res)) != null)
        {
			//debug ($row);
            //$arri[$row['idsnj_dd'] - 1] = $row['dd_description'];
			
			$arri1[$row[1]] = $row[1];
			$count++;
        }
    ?>
	
    <?php echo $this->Form->input('Work_day_time',array('type'=>'select', 
                'options'=>$arri1) );?>
				
	
    <?php echo $this->Form->input('no_of_eng_needed ',array('type'=>'text') );?>

			<?php
        $query = "SELECT * FROM viewrequesttype";
        $res = mysql_query($query, $con);
		$arri1 = array();
		$count = 0;
		
        while (($row = mysql_fetch_row($res)) != null)
        {
			//debug ($row);
            //$arri[$row['idsnj_dd'] - 1] = $row['dd_description'];
			
			$arri1[$row[1]] = $row[1];
			$count++;
        }
    ?>
	
   <?php echo $this->Form->input('Request_type',array('type'=>'select', 
                'options'=>$arri1));?>
	
			<?php
        $query = "SELECT * FROM snj_scope_of_work";
        $res = mysql_query($query, $con);
		$arri1 = array();
		$count = 0;
		
        while (($row = mysql_fetch_row($res)) != null)
        {
			//debug ($row);
            //$arri[$row['idsnj_dd'] - 1] = $row['dd_description'];
			
			$arri1[$row[1]] = $row[1];
			$count++;
        }
    ?>
	
    <?php echo $this->Form->input('scope_of_works',array('type'=>'select', 'id' => 'scope_of_work',
                'options'=>$arri1) );?>
				
    <?php echo $this->Form->input('mop_link');?>
	
    <?php echo $this->Form->input('mop_risk_level',array('type'=>'select', 
                'options'=>array('High'=>'High',
                                 'Medium' => 'Medium',
                                 'Low' => 'Low')) );?>
    <?php echo $this->Form->input('Node Entry Type',array('type'=>'select','empty'=>'--Select--', 
                'options'=>array('Drop Down'=>'Drop Down',
                                 'Text Area' => 'Text Area',
                                 'Excel File Upload' => 'Excel File Upload')) );?>
	<span id="fileupload"></span>
								 
			<?php
        $query = "SELECT * FROM viewcustomer";
        $res = mysql_query($query, $con);
		$arri1 = array();
		$count = 0;
		
        while (($row = mysql_fetch_row($res)) != null)
        {
			//debug ($row);
            //$arri[$row['idsnj_dd'] - 1] = $row['dd_description'];
			
			$arri1[$row[1]] = $row[1];
			$count++;
        }
    ?>
	
	<?php echo $this->Form->input('customer', array ('type' => 'select', 'options' => $arri1)); ?>
																							
	<?php echo $this->Form->input('request_id', array ('type' => 'text')) ?>


	<span id="spandates" style="font-size: 16px; color:darkred; cursor:pointer;"></span>
	<span id="moredates"></span>
	<span id="dates">
    <?php echo $this->Form->input('Task.start_date.',array('type'=>'date','label'=>'Start Date'));?>
    <?php echo $this->Form->input('Task.end_date.',array('type'=>'date','label'=>'End Date'));?>
    <?php echo $this->Form->input('Task.start_time.',array('label'=>'Start Time', 'type'=>'time', 'selected' => array('hour' => '12', 'minute' => '0', 'meridian' => 'am')));?>
    <?php echo $this->Form->input('Task.end_time.',array('label'=>'End Time', 'type'=>'time', 'selected' => array('hour' => '5', 'minute' => '0', 'meridian' => 'am')));?>
    <?php echo $this->Form->input('Task.maintenance_window_start_date.',array('label'=>'Maintenance Window Start Date', 'type'=>'date') );?>
    <?php echo $this->Form->input('Task.maintenance_window_end_date.',array('type'=>'date','label'=>'Maintenance Window End Date') );?>
    <?php echo $this->Form->input('Task.maintenance_window_start_time.',array('label'=>'Maintenance Window Start Time', 'type'=>'time', 'selected' => array('hour' => '12', 'minute' => '0', 'meridian' => 'am' )));?>
    <?php echo $this->Form->input('Task.maintenance_window_end_time.',array('label'=>'Maintenance Window End Time', 'type'=>'time', 'selected' => array('hour' => '5', 'minute' => '0', 'meridian' => 'am')));?>
    <?php echo $this->Form->input('Node.concerned_node',array('type'=>'text') );?>
	
	<hr />
    </span>

	<?php echo $this->Form->end('Save'); ?>
	
	<script type="text/javascript">

	var NodeTextArea = '<textarea id="NodeConcernedNode" rows="6" cols="30" name="data[Node][concerned_node]"></textarea>';
	var NodeText = '<input type="text" id="NodeConcernedNode" name="data[Node][concerned_node]" />';
	var dummy = '<div id="dummy"></div>';
	var ExcelUpload = '<div class="input file" id="uploadExcel">';
	ExcelUpload += '<label for="Excel">Upload Excel</label>';
	ExcelUpload += '<input type="file" name="data[Node][Excel]" id="NodeExcel">';
	ExcelUpload + '</div>';

	if ($("#JobNodeEntryType") == null){
		console.log('JobNodeEntryType is NULL');
	}

	$(document).ready(function(){
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
	
	</script>
	
</div>