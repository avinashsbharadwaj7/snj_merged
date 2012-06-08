<li id="backButton"><?php echo $this->Html->link(__('Back', true), array('controller' => 'snjs', 'action' => 'snjcall')); ?></li> 

<?php
    echo $html->css(array(  'snj/960'
                          , 'snj/snj'
                          , 'snj/demo_table_jui'
                          , 'snj/redmond/jquery-ui-1.8.16.custom'
                         ));
                       
    echo $javascript->link(array( 
    					  'gen_validatorv4.js'
    					, 'snj/jquery.uiforms'
    					, 'date.js'
    					//, 'snj/jquery-1.6.2.min' 
    					));
    $signum = Authsome::get('username');
    $name = Authsome::get('first_name') . ' ' . Authsome::get('last_name');
?>

<div id="addJobContainer" class="container_12 ui-widget">
<div id="addJobForm" class="grid_12 alpha omega">
<?php echo $this->Form->create('Job');?>
<fieldset>
  <legend>
    <?php __('Ticket Information'); ?>
    
  </legend>
  <?php echo $this->Form->label('Date Created: ' .date("D M Y")); ?>
</fieldset>

 
 
<fieldset>
  <legend>
    <?php __('Ticket Creator Information'); ?>
  </legend>
    
  <script language="javascript">
  	$(document).ready(function(){
  			$('#saveButton').click(function(){
  				$('#JobAddForm').get(0).setAttribute('action', 'add/save'); 
  				$('#JobAddForm').submit();
  			});
  		}
  	);
  </script>  
   
     
  <?php //echo $this->Form->input('date_created', array('type' => 'date')); ?>
  <?php echo $this->Form->input("Signum", array( 'READONLY' => true, 'value' => $signum, 'label'=>'Signum', 'type'=>'text') );?>
  <?php echo $this->Form->input("Name", array( 'READONLY' => true, 'value' => $name, 'label'=>'Name', 'type'=>'text')); ?>
  
  <?php 
	if (isset($jobid))
	{
		echo $this->Form->input("job_id", array('READONLY' => true, 'value' => $jobid, 'label' => 'Job ID', 'type' => 'text')); 
	}
   ?>

  
  <script language="javascript">
    function HideUnHideReq()
    {
    var textValue = document.getElementById("JobOrganization").value;
    var ele = document.getElementById("divREQ");
    if (textValue == '3')
    {
        ele.style.display = "block";
    }
    else
    {
        ele.style.display = "none";
    }
    
    //2, 4, 5
    //remove all
    var elSel = document.getElementById('JobNodeEntryType');
      var i;
      for (i = elSel.length - 1; i>=0; i--) {
                  elSel.remove(i);
            }
            
            var elOptNewb = document.createElement('option');
            elOptNewb.text = '--Select--';
              elOptNewb.value = '--Select--';
              
              try {
                elSel.add(elOptNewb, null); // standards compliant; doesn't work in IE
              }
              catch(ex) {
                elSel.add(elOptNewb); // IE only
              }
            
            var elOptNew = document.createElement('option');
            elOptNew.text = 'Excel File Upload';
              elOptNew.value = 'Excel File Upload';
              
              try {
                elSel.add(elOptNew, null); // standards compliant; doesn't work in IE
              }
              catch(ex) {
                elSel.add(elOptNew); // IE only
              }
           
        //(textValue == '2') removed RAN E&O per Mark
        if( (textValue != '4') && (textValue != '5'))
        {
           
            var elOptNew = document.createElement('option');
            elOptNew.text = 'Text Area';
              elOptNew.value = 'Text Area';
              
              try {
                elSel.add(elOptNew, null); // standards compliant; doesn't work in IE
              }
              catch(ex) {
                elSel.add(elOptNew); // IE only
              }
            
        }
        
            
        CalculateDate();    
        
    }
  </script>
  
   <script type="text/javascript">
        function onSaveButtonClick() {
            var startDateStr = document.getElementById("startdate").value;
            if(startDateStr == null || startDateStr == "") {
                //alert("Please select Project Start Date");
                return false;
            }
            var endDateStr = document.getElementById("enddate").value;
            if(endDateStr == null || endDateStr == "") {
                //alert("Please select Project End Date");
                return false;
            }
            
            var startHour = document.getElementById("TaskStartTimeHour").value;
            var startMin = document.getElementById("TaskStartTimeMin").value;
            var startMerdian = document.getElementById("TaskStartTimeMeridian").value;
        
            if(startHour == null || startHour == "") {
                alert("Please select Project Start Hour");
                return false;
            }
        
            if(startMin == null || startMin == "") {
                alert("Please select Project Start Minutes");
                return false;
            }
        
            if(startMerdian == null || startMerdian == "") {
                alert("Please select Project Start AM/PM value");
                return false;
            }
            else {
                if(startMerdian.toLowerCase() == "pm" ) {
                    startHour = startHour + 12;
                }
            }
        
            var endHour = document.getElementById("TaskEndTimeHour").value;
            var endMin = document.getElementById("TaskEndTimeMin").value;
            var endMerdian = document.getElementById("TaskEndTimeMeridian").value;
        
            if(endHour == null || endHour == "") {
                alert("Please select Project End Hour");
                return false;
            }
        
            if(endMin == null || endMin == "") {
                alert("Please select Project End Minutes");
                return false;
            }
        
            if(endMerdian == null || endMerdian == "") {
                alert("Please select Project End AM/PM value");
                return false;
            }
            else {
                if(endMerdian.toLowerCase() == "pm" ) {
                    endHour = endHour + 12;
                }
            }
        
           
            var startDate = new Date(startDateStr);
            startDate.setHours(startHour, startMin);
            
            endDate.setDate(startDate.getDate()+1);
            alert(endDate);
            alert(endDate.getHours());
            alert(endDate.getMinutes());
           // document.getElementById("TaskEndDate").selectedText = endDate.
           // var EndHour = document.getElementById("TaskEndTimeHour").selectedText = endDate.getHours();
           // var EndMinute = document.getElementById("TaskEndTimeMin")..selectedText = endDate.getMinutes();;
            //var EndMeridian = document.getElementById("TaskEndTimeMeridian");
                
            if(startDate < new Date()) {
                alert("Please select date in future for Project Start Date ");
                return false;
            }
            else {
                var endDate = new Date(endDateStr);
                endDate.setHours(endHour, endMin);
                if(endDate < startDate) {
                    alert("Project End Date must be greater than Project Start Date");
                    return false;
                }
            }
            //alert("success");
            return true;
            
        }

    </script>
 <?php
	echo $this->Form->input('Organization',array('type'=>'select','options'=> $orgs, 'onChange'=>'javascript:HideUnHideReq()'));
	echo $this->Ajax->observeField('JobOrganization', array('url' => array('controller' => 'ajax','action' => 'getScopeOfWorks'), 'frequency' => 0.1, 'update' => 'scope_of_work'));
 ?>
  
  <?php echo $this->Form->input('Work_Location',array('type'=>'select', 
            'options'=> $workLocations));?>
</fieldset>

<fieldset>
  <legend>
    <?php __('Job Basic Information'); ?>
  </legend>

  <?php 
  //debug ($customers);
  echo $this->Form->input('customer', array ('type' => 'hidden', 'value' => $this->data['Job']['customer']));
  echo $this->Form->input('customer',array('type'=>'select', 
                 'options'=> $customers, 'id'=> 'customerno') );?>
  <?php echo $this->Form->input('Network_Number', array('type' => 'text', 'maxlength' => 8)); ?>
  <?php echo $this->Form->input('More_id', array('type' => 'text','label'=>'More ID')); ?>
  <?php echo $this->Form->input('request_id', array ('type' => 'text', 'label' => 'Request ID')); ?>
  <?php echo $this->Form->input('CCB_tckt_no', array('type' => 'text','label'=>'CCB Ticket Number')); ?>
  
  <?php 
        echo $this->Form->input('Technology',array('type'=>'select','options'=> $technologies));
        //echo $this->Ajax->observeField('JobTechnology', array('url' => array('controller' => 'ajax','action' => 'getNodeTypes'), 'update' => 'JobNodeType'));
    ?>

	<?php //debug ($regions); 
	echo $this->Form->input('Region', array ('type' => 'hidden', 'value' => $this->data['Job']['Region']));
   echo $this->Form->input('Region', array('type'=>'select',
                'options'=> $regions, 'id' => 'region'));?>


  <?php echo $this->Form->input('Market',array('type'=>'select', 
                'options'=> $markets));?>

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

  <?php echo $this->Form->input('Work_day_time',array('type'=>'select', 'options'=>$workDayTimes, 'onChange'=>'javascript:HideUnHide()') );?>


  <?php echo $this->Form->input('no_of_eng_needed',array('type'=>'text') );?>

  <div id="divREQ" style="display:none" >
  <?php echo $this->Form->input('Request_type',array('type'=>'select', 
                'options'=>$requestTypes));?>
  </div>

  <?php //echo $this->Form->input('priority',array('type'=>'select', 
        //        'options'=>array(
        //            '0'=>'--Select--','High'=>'High',
        //                         'Medium' => 'Medium',
        //                         'Low' => 'Low')) );?>
								 
	<?php //debug ($sows); ?>
  <?php echo $this->Form->input('Scope_of_work',array('type'=>'select', 'id' => 'scope_of_work','style'=>"width:300px",
                'options'=>$sows, 'onChange'=>'javascript:HideUnHideMops()') );?>
	<?php
	//if ($this->data['Job']['mop_link'] == "")
	//{
	//	echo $this->Form->input('mop_link', array('type'=>'select', 
    //            'options'=>$mopNames,'id'=>'mop_link', 'style'=>"width:300px;"));
	//}?>
   <?php echo $this->Ajax->observeField('scope_of_work', array('url' => array('controller' => 'ajax','action' => 'getMops'), 'frequency' => 0.1, 'update' => 'mop_link')); ?>
   <?php echo $this->Form->input('Parallely_Running_Activity', array('type' => 'checkbox', 'id' =>'Parallely_Running_Activity'));?>
  
   
  <script language="javascript">
        function HideUnHideMops()
        {
            var sowid =document.getElementById("scope_of_work").selectedIndex;
            var selected_text = document.getElementById("scope_of_work").options[sowid].text;
            var mopLinks = document.getElementById("mopLinks");
            var mopText = document.getElementById("mopCreation");
            
            if (selected_text == 'MOP Creation')
            {
                
                mopText.style.display = "block";
                mopLinks.style.display = "none";
            }
            else
            {
                mopText.style.display = "none";
                mopLinks.style.display = "block";
            }
            
            CalculateDate();
        }
  </script>
  
  <div id="mopLinks" style="display:none">
  <?php echo $this->Form->input('mop_link', array('type'=>'select', 
                'options'=>$mopNames,'id'=>'mop_link', 'style'=>"width:300px;"));?>
  </div>
  <div id="mopCreation" style="display:none">
       <?php echo $this->Form->input('mop_creation_text',array('type'=>'text','style'=>'width:150px', 'label' => 'New MOP Link') );?>
</div>



  <?php echo $this->Form->input('mop_risk_level',array('type'=>'select', 
                'options'=>array('--Select--'=>'--Select--',
                'High'=>'High',
                                 'Medium' => 'Medium',
                                 'Low' => 'Low'),'id'=>'mop_risk_level') );?>

</fieldset>

<fieldset>
  <legend>
    <?php __('Node Information'); ?>
  </legend>
    
     <script language="javascript">
         
    function selectTextBox(selCntrol)
    {
         document.getElementById(selCntrol).select();
    }
    
    function HideUnHideTextArea()
    {
    var textValue = document.getElementById("JobNodeEntryType").value;
    var ele = document.getElementById("divEXCEL");
     var eleNodes = document.getElementById("divNodesP");
     //node_reparenting
     var chkReparent = document.getElementById("divCheck");
     var Reparent = document.getElementById("divReParent");
     

         if (textValue == '0')
        {
            ele.style.display = "none";
            eleNodes.style.display = "none";
            chkReparent.style.display = "none";
            Reparent.style.display = "none";
        }
    
        if (textValue == 'Text Area')
        {
            ele.style.display = "none";
            eleNodes.style.display = "block";
            chkReparent.style.display = "block";
        }
    
   
       if (textValue == 'Excel File Upload')
        {
            ele.style.display = "block";
            eleNodes.style.display = "none";
            chkReparent.style.display = "none";
        }
        
    }
  </script>
 <!--<?php echo $this->Form->input('NodeEntryType',array('type'=>'select', 'id' => 'JobNodeEntryType', '0'=>'Text Area', 
                'options'=>array('0'=>'--Select--', 'Excel File Upload' => 'Excel File Upload','Text Area' => 'Text Area'
                                 ), 'onChange'=>'javascript:HideUnHideTextArea()') );?> -->

 
  
   <script type="text/javascript">
    function HideUnhideNodes()
    {
    var nodepareting =document.getElementById("node_reparenting");
    var nodetypeindex =document.getElementById("JobNodeType").selectedIndex;
    var selected_text = document.getElementById("JobNodeType").options[nodetypeindex].text;
    var addnodes = document.getElementById("divADDNodes");
    var extranodes = document.getElementById("divNodes");
    var ReParent = document.getElementById("divReParent");
    var nodeb = document.getElementById("divNodesB");
    var enodeb = document.getElementById("diveNodesB");
     
    if (nodepareting.checked)
    {
       
            document.getElementById('NodeTargetNode').value = "";
            document.getElementById('NodeAdjacentNodes').value = "";
            document.getElementById('NodeTargetNode1').value = "";
            document.getElementById('NodeAdjacentNodes1').value = "";
       
        
        ReParent.style.display = 'block';
        if((selected_text == 'NodeB') || (selected_text == 'eNodeB') || (selected_text == 'RNC'))
        {
            
            if(selected_text == 'NodeB')
            {
                nodeb.style.display =  'block';
                enodeb.style.display =  'none';
            }
            
            if(selected_text == 'eNodeB')
            {
               nodeb.style.display =  'none';
                enodeb.style.display =  'block';
            }
            
            
            extranodes.style.display = 'block';
            
              if((selected_text == 'NodeB') || (selected_text == 'eNodeB') )
             {
                addnodes.style.display =  'block';
              
             }
                             
             else
             {
                 if(selected_text == 'RNC')
                 {
                     addnodes.style.display  = 'block';
                     nodeb.style.display =  'none';
                     enodeb.style.display =  'none';
                     document.getElementById('NodeTargetNode').value = "---";
                     document.getElementById('NodeAdjacentNodes').value = "---";
                 }
                 else
                 {
                    addnodes.style.display  = 'none';
                    
                 }
             }
          }
        else
        {
             addnodes.style.display = 'none';
             extranodes.style.display = 'none';
             
        document.getElementById('NodeTargetNode').value = "---";
        document.getElementById('NodeAdjacentNodes').value = "---";
        document.getElementById('NodeTargetNode1').value = "---";
        document.getElementById('NodeAdjacentNodes1').value = "---";
        }
    }
    else
    {
        
        nodeb.style.display =  'none';
        enodeb.style.display =  'none';
        addnodes.style.display = 'none';   
        ReParent.style.display = 'none';   
        document.getElementById('NodeTargetNode').value = "---";
        document.getElementById('NodeAdjacentNodes').value = "---";
        document.getElementById('NodeTargetNode1').value = "---";
        document.getElementById('NodeAdjacentNodes1').value = "---";
    }
    
       //HideUnHideTextArea();
    }
  </script>


 <div id="divCheck">
  <?php echo $this->Form->input('node_Reparenting', array('type' => 'checkbox',  'id' =>'node_reparenting',  'onClick'=>'javascript:HideUnhideNodes()'));?>    
  </div> 

  
 <div id="divReParent" >
   <?php echo $this->Form->input('node_type',array('label'=>'Node Granularity','type'=>'select','onClick'=>'javascript:HideUnhideNodes()',
                'options'=>array( '--Select--'=>'--Select--', 'NodeB' => 'NodeB', 'RNC' => 'RNC', 'eNodeB' => 'eNodeB'
                                )) );?> </div>
  <div id="divNodesP">
 
  <div id="divNodes" style="display:none">
      
  <div id="divNodesB" style="display:none">
  <?php //echo $this->Form->input('Node.source_node',array('type'=>'text','READONLY' => true,'value'=>'-Source node will be displayed here upon saving-','style'=>'width:335px') );?>
    <?php echo $this->Form->input('Node.target_node',array('value' => 'test', 'label'=>'RNC Target Nodes','type'=>'text', 'style'=>'width:250px', 'Label'=>'Tnode') );?>
    <?php echo $this->Form->input('Node.adjacent_nodes',array('label'=>'RNC Adjacent Nodes','type'=>'textarea') );?>
  </div>
  <div id="diveNodesB" style="display:none">
  <?php //echo $this->Form->input('Node.source_node',array('type'=>'text','READONLY' => true,'value'=>'-Source node will be displayed here upon saving-','style'=>'width:335px') );?>
    <?php echo $this->Form->input('Node.target_node_mmc',array('label'=>'MMC  Target Nodes','type'=>'text', 'style'=>'width:250px', 'Label'=>'Tnode') );?>
    <?php echo $this->Form->input('Node.adjacent_nodes_mmc',array('label'=>'MMC Adjacent Nodes','type'=>'textarea') );?>
  </div>
  </div>
  <div id="divADDNodes" style="display:none">
    <?php echo $this->Form->input('Node.target_node1',array('label'=>'OSS Target Nodes','type'=>'text', 'style'=>'width:250px') );?>
    <?php echo $this->Form->input('Node.adjacent_nodes1',array('label'=>'OSS Adjacent Nodes','type'=>'textarea', 'style'=>'width:250px') );?>
  
  </div>
   <?php echo $this->Form->input('Node.concerned_node',array('type'=>'textarea','label'=>'Concerned Nodes') );?>
  </div>
   
    

  <span id="fileupload"></span>


  <script language="javascript">
    function CalculateDate()
    {
      //check the value of the SOW
      var sowid = document.getElementById("scope_of_work").selectedIndex;
      var selected_text = document.getElementById("scope_of_work").options[sowid].text;
      if (selected_text != 'MOP Creation' && selected_text != 'RNC Integration' && selected_text != 'RNC Expansion' && selected_text != 'Data Freeze' && selected_text != '--Select--')
      {
          //do not allow to edit enddate
            var EndDate = document.getElementById("enddate");
            var EndDateimg = document.getElementById("Task.end_date-trigger");
            EndDate.readOnly=true;
           EndDateimg.width="1"; EndDateimg.height="1";
            
            //Taskstartdate is in format: 2012-01-01
            var selectedHour = document.getElementById("TaskStartTimeHour").value;
            var selectedMinute = document.getElementById("TaskStartTimeMin").value;
            var selectedMeridian = document.getElementById("TaskStartTimeMeridian").value;
            
            //get hours for the date
            selectedHour = parseInt(selectedHour);
            selectedMinute = parseInt(selectedMinute);
            if(selectedMeridian == 'pm' && selectedHour < 12) selectedHour = selectedHour + 12;
                       
            
            var startDateStr = document.getElementById("startdate").value;
            var StartDate = Date.parse(startDateStr);
            
            StartDate.addHours(selectedHour);
            StartDate.addMinutes(selectedMinute );
            
            EndDate.value =  StartDate.toString('yyyy-MM-dd');
                       
            var EndHour = document.getElementById("TaskEndTimeHour").value;
            var EndMinute = document.getElementById("TaskEndTimeMin").value;  
            
            EndHour = parseInt(EndHour);
            EndMinute = parseInt(EndMinute);
            
            
            var EndMeridian = document.getElementById("TaskEndTimeMeridian").value;
            if(EndMeridian == 'pm' && EndHour < 12) EndHour = EndHour + 12;
           
            
            if(selectedMeridian == 'pm' && EndMeridian == 'am') StartDate.addDays(1);
            if(selectedMeridian == EndMeridian ) 
            {
                 if(EndHour == selectedHour && EndMinute < selectedMinute ) 
                     StartDate.addDays(1);
                 
                 if(EndHour <= selectedHour ) StartDate.addDays(1);
            }
            
            
            
             //var textValue = document.getElementById("JobWorkDayTime").value;
            //if ((textValue == 'Week Maintenance Window Time') || (textValue == 'Weekend Maintenance Window Time'))
            //{
             //   var EndHour = document.getElementById("TaskEndTimeHour").value;
                //var EndMinute = document.getElementById("TaskEndTimeMin").value;
               // var EndMeridian = document.getElementById("TaskEndTimeMeridian").value;
               // EndHour = parseInt(EndHour);
                
                //if(EndMeridian == 'am' && selectedMeridian == 'pm') StartDate.addDay(1);
               
             //}
             EndDate.value =  StartDate.toString('yyyy-MM-dd');

            
          
           }
           else
           {
               var EndDate = document.getElementById("enddate");
               EndDate.readOnly=false;
               var EndDateimg = document.getElementById("Task.end_date-trigger");
               EndDateimg.width="20"; EndDateimg.height="20";
           }
    }

  </script>
  
  <span id="spandates" style="font-size: 16px; color:darkred; cursor:pointer;"></span>
  <span id="moredates"></span>
  <span id="dates">
    <?php echo $datePicker->picker('Task.start_date', array('id'=> 'startdate','label' => 'Project Start Date',  'onblur'=>'CalculateDate()'));?>
        
    <?php echo $this->Form->input('Task.start_time',array('label'=>'Start Time', 'type'=>'time', 'empty' => '--',  'onchange'=>'CalculateDate()'));?>
    <?php echo $this->Form->input('Task.end_time',array( 'label'=>'End Time', 'type'=>'time', 'empty' => '--',  'onchange'=>'CalculateDate()'));?>

	<?php echo $datePicker->picker('Task.end_date', array('id'=> 'enddate', 'label' => 'Project End Date'));?>
	
    <div id="divMAINT" style="display:none">
      <?php echo $datePicker->picker('Task.maintenance_window_start_date', array('label' => 'Maintenance Window Start Date'));?>
      <?php echo $datePicker->picker('Task.maintenance_window_end_date', array('label' => 'Maintenance Window End Date'));?>
      <?php echo $this->Form->input('Task.maintenance_window_start_time.',array('label'=>'Maintenance Window Start Time', 'type'=>'time','empty' => '--','selected'=>'00:00:00'));?>
      <?php echo $this->Form->input('Task.maintenance_window_end_time.',array('label'=>'Maintenance Window End Time', 'type'=>'time','empty' => '--','selected'=>'5:00:00'));?>
    </div>


    <?php //echo $this->Ajax->observeField('JobReparenting', array('url' => array('controller' => 'ajax','action' => 'getReparentingUpdate'), 'update' => 'reparenting_section'));?>

    <div id="divEXCEL" style="display:none">
    <?php echo $this->Form->input('excel_template');?>
    <?php echo $this->Form->input('excel_file', array('type' => 'file')); ?>
    </div>
    
    <hr />
  </span>

  <?php echo $this->Form->input('email_addresses', array('type' => 'textarea')); ?>
  
  <?php echo $this->Form->input('additional_notes', array('type' => 'textarea')); ?>
  <?php echo $this->Form->input('dlname', array('type' => 'hidden','id'=>'dlname')); ?>
</fieldset>


<center>

<?php echo $this->Form->submit('Submit Job', array('name'=>'add'));?>
<?php echo $this->Form->submit('Save Draft', array('name'=>'add/save'));?>
<?php echo $this->Form->end();?>   
<?php //echo $this->Form->end(array('label' => 'Submit Job')); ?>

</center>

<script type="text/javascript">
    
   //HideUnHideTextArea();
   HideUnhideNodes();
   HideUnHideMops();
   HideUnHide();
</script>

</div> <!-- addJobForm -->
</div> <!-- addJobContainer -->
