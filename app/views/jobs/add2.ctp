
<div>

	<?php
		$signum = Authsome::get('username');
		$name = Authsome::get('first_name') . ' ' . Authsome::get('last_name');
	?>

    <?php echo $this->Form->create('Job');?>
  
  <div style="background-color:Purple;
    height:20px;
    padding: 0px;">
    <?php echo $this->Form->label('Date Created: ' .date("D M Y")); ?>
  </div>
    
    <?php //echo $this->Form->input('date_created', array('type' => 'date')); ?>

  <div style="background-color:Yellow;
    height:130px;
    padding: 10px;">

    <?php echo $this->Form->input("signum", array( 'READONLY' => true, 'value' => $signum, 'label'=>'Signum', 'type'=>'text') );?>
    <?php echo $this->Form->input("name", array( 'READONLY' => true, 'value' => $name, 'label'=>'Name', 'type'=>'text')); ?>


    <?php //echo $this->Javascript->link('snj.js') ?>

    <?php
		//$con = mysql_connect('65.19.149.190', 'snj' , 'snj_!23');
		//mysql_select_db("snj", $con);

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
  </div>

  <div style="background-color:Green;
    height:580px;
    padding: 0px;">
    <?php
        $query = "SELECT idsnj_dd, dd_description FROM viewcustomer";
        $res = mysql_query($query, $con);
        $arri = array();
        $count = 0;
        $arri[0] = "";
        while (($row = mysql_fetch_assoc($res)) != null)
        {
                      
            $arri[$row['idsnj_dd']] = $row['dd_description'];
           
        }
    ?>

    <?php echo $this->Form->input('customer',array('type'=>'select', 
                 'options'=> $arri, 'id'=> 'customerno') );?>
    <?php echo $this->Form->input('Network_Number', array('type' => 'text', 'maxlength' => 8)); ?>
    <?php echo $this->Form->input('More_id', array('type' => 'text')); ?>
    <?php echo $this->Form->input('Request ID'); ?>
    <?php echo $this->Form->input('CCB_tckt_no', array('type' => 'text')); ?>
    <?php
        $query = "SELECT * FROM viewtechnology";
        $res = mysql_query($query, $con);
		$arri1 = array();
		$count = 0;
		
        while (($row = mysql_fetch_row($res)) != null)
        {
		
			$arri1[$row[1]] = $row[1];
			$count++;
        }
        
        echo $this->Form->input('Technology',array('type'=>'select','options'=> $arri1));
        
    ?>
   


    <?php
        $query = "SELECT * FROM viewregion";
        $res = mysql_query($query, $con);
		$arri1 = array();
		$count = 0;
		
        while (($row = mysql_fetch_row($res)) != null)
        {
					
			$arri1[$row[1]] = $row[1];
			$count++;
        }
    ?>
    <?php echo $this->Form->input('Region', array('type'=>'select', 
                'options'=> $arri1));?>


    <?php echo $this->Form->input('market',array('type'=>'select', 
                'options'=>array('Market 1' => 'Market 1',
                                 'Market 2' => 'Market 2',
                                 'Market 3' => 'Market 3'), 'empty'=>'') );?>

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


    <script language="javascript">
      function HideUnHide()
      {
      var textValue = document.getElementById("JobWorkDayTime").value;
      var ele = document.getElementById("divMAINT");

      if ((textValue == 'Week Maintenance Window Time') || (textValue == 'Weekend Maintenance Window Time'))
         {
      ele.style.display = "block";
      }
      else
      {
      ele.style.display = "none";
      }
      }
    </script>

    <?php echo $this->Form->input('Work_day_time',array('type'=>'select', 'options'=>$arri1, 'onChange'=>'javascript:HideUnHide()') );?>


    <?php echo $this->Form->input('no_of_eng_needed',array('type'=>'text') );?>

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

    <?php echo $this->Form->input('priority',array('type'=>'select', 
                'options'=>array(''=>'','High'=>'High',
                                 'Medium' => 'Medium',
                                 'Low' => 'Low')) );?>
    <?php
        $query = "SELECT * FROM snj_scope_of_works";
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

    <?php echo $this->Form->input('Scope_of_work',array('type'=>'select', 'id' => 'scope_of_work',
                'options'=>$arri1) );?>


    <?php echo $this->Form->input('node_Reparenting', array('type' => 'checkbox', 'id' =>'node_reparenting'));?>

    <?php echo $this->Form->input('Parallely_Running_Activity', array('type' => 'checkbox', 'id' =>'Parallely_Running_Activity'));?>


    <?php echo $this->Form->input('MOP Link',array('type'=>'select','empty'=>'--Select--', 
                'options'=>array('MOP Link 1' => 'MOP Link 1',
                                 'MOP Link 2' => 'MOP Link 2',
                                 'MOP Link 3' => 'MOP Link 3')) );?>
  
	
    <?php echo $this->Form->input('mop_risk_level',array('type'=>'select', 
                'options'=>array('High'=>'High',
                                 'Medium' => 'Medium',
                                 'Low' => 'Low')) );?>
   
  </div>

  <div style="background-color:yellow;
    height:460px;
    padding: 0px;">

    <?php echo $this->Form->input('Node Entry Type',array('type'=>'select','empty'=>'--Select--', 
                'options'=>array('Drop Down'=>'Drop Down',
                                 'Text Area' => 'Text Area',
                                 'Excel File Upload' => 'Excel File Upload')) );?>

    <?php
        $query = "SELECT * FROM snj_scope_of_works";
        $res = mysql_query($query, $con);
    $arri1 = array();
    $count = 0;
        $arri1[0] = "";
        while (($row = mysql_fetch_row($res)) != null)
        {
            //debug ($row);
            //$arri[$row['idsnj_dd'] - 1] = $row['dd_description'];
            
//$arri1[$row['idsnj_dd']] = $row['dd_description'];
            $arri1[$row[0]] = $row[1];
            $count++;
        }
        // print_r($arri1);
    ?>
    <?php echo $this->Form->input('node_granularity',array('type'=>'select', 'id' => 'node_granularity',
                'options'=>$arri1) );?>

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
	<!-- CUSTOMER -- NOT SUPPOSE TO BE HERE YET...
	<?php echo $this->Form->input('customer', array ('type' => 'select', 'options' => $arri1)); ?>-->
	<!-- CUSTOMER -- NOT SUPPOSE TO BE HERE YET...																				
	<?php echo $this->Form->input('request_id', array ('type' => 'text')) ?>-->


	<span id="spandates" style="font-size: 16px; color:darkred; cursor:pointer;"></span>
	<span id="moredates"></span>
	<span id="dates">
    <?php echo $datePicker->picker('Task.start_date', array('label' => 'Project Start Date'));?>
    <?php echo $datePicker->picker('Task.end_date', array('label' => 'Project End Date'));?>
    <?php echo $this->Form->input('Task.start_time.',array('label'=>'Start Time', 'type'=>'time', 'selected' => array('hour' => '12', 'minute' => '0', 'meridian' => 'am')));?>
    <?php echo $this->Form->input('Task.end_time.',array('label'=>'End Time', 'type'=>'time', 'selected' => array('hour' => '5', 'minute' => '0', 'meridian' => 'am')));?>

    <div id="divMAINT" style="display:none">
      <?php echo $datePicker->picker('Task.maintenance_window_start_date', array('label' => 'Maintenance Window Start Date'));?>
      <?php echo $datePicker->picker('Task.maintenance_window_end_date', array('label' => 'Maintenance Window End Date'));?>
      <?php echo $this->Form->input('Task.maintenance_window_start_time.',array('label'=>'Maintenance Window Start Time', 'type'=>'time', 'selected' => array('hour' => '12', 'minute' => '0', 'meridian' => 'am' )));?>
      <?php echo $this->Form->input('Task.maintenance_window_end_time.',array('label'=>'Maintenance Window End Time', 'type'=>'time', 'selected' => array('hour' => '5', 'minute' => '0', 'meridian' => 'am')));?>
    </div>
    
    <?php echo $this->Form->input('Node.source_node',array('type'=>'text') );?>
    <?php echo $this->Form->input('Node.target_node',array('type'=>'text') );?>
    <?php echo $this->Form->input('Node.adjacent_nodes',array('type'=>'text') );?>
    <?php echo $this->Form->input('Node.concerned_node',array('type'=>'text') );?>
    
   
  
    <?php echo $this->Ajax->observeField('JobReparenting', array('url' => array('controller' => 'ajax','action' => 'getReparentingUpdate'), 'update' => 'reparenting_section'));?>
    
    <?php echo $this->Form->input('Node_Name', array('type' => 'text', 'maxlength' => 8)); ?>  
    <?php echo $this->Form->input('excel_template');?>
	<?php echo $this->Form->input('excel_file', array('type' => 'file')); ?>

    <hr />
  </span>

  </div>
  <div style="background-color:lightgreen;
    height:110px;
    padding: 0px;" >
    <?php echo $this->Form->input('additional_notes', array('type' => 'textarea')); ?>

    <?php echo $this->Form->input('Job_Status', array('type' => 'checkbox', 'id' =>'Job_Status'));?>

    <?php echo $this->Form->input('node_type',array('type'=>'select', 'id' => 'node_type',
                'options'=>array('LTE'=>'LTE',
                                 'eNodeB' => 'eNodeB',
                                 'MME' => 'MME',
                                 'OSS' => 'OSS')) );?>


  </div>
  

	<?php echo $this->Form->end('Save'); ?>
	
</div>

<script type="text/javascript">
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
	
</script>