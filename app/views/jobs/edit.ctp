<li id="backButton"><?php echo $this->Html->link(__('Back', true), array('controller' => 'jobs', 'action' => 'mytickets')); ?></li> 

<?php
  echo $html->css(array(  'snj/960'
                        , 'snj/snj'
                        , 'snj/redmond/jquery-ui-1.8.16.custom'
                       ));
  //echo $javascript->link(array(  'snj/jquery-1.6.2.min'
  //                             , 'snj/jquery-ui-1.8.16.custom.min'
  //                             , 'snj/jquery.uiforms'
  //                            ));
?>
<?php

//debug ($this->data);

$signum = Authsome::get('username');
$name = Authsome::get('first_name') . ' ' . Authsome::get('last_name');
?>
<?php
	$id = Authsome::get('user_group_id');
	//debug($id);

	if ($id == $pmgroupid) 
	{
		$pmflag = true;
		$pmddflag = 'enabled';
		$lmFlag = false;
		$lmddFlag = 'enabled';
		$engddFlag = 'enabled';
		$engFlag = false;
	}
	
	else if ($id == $lmgroupid)
	{
		$pmflag = true;
		$pmddflag = 'enabled';
		$lmFlag = true;
		$lmddFlag = 'disabled';
		$engddFlag = 'enabled';
		$engFlag = false;
	}
	
	else 
	{
		$pmflag = false;
		$pmddflag = 'disabled';
		$lmFlag = true;
		$engFlag = true;
		$lmddFlag = 'disabled';
		$engddFlag = 'disabled';
	}
?>
    <?php echo $this->Form->create('Job'); ?>
    <fieldset>
        <legend>a
            <?php __('Ticket Information'); ?>

        </legend>
		<?php echo $this->Form->input("date_created", array('READONLY' => true, 'value' => $this->data['Job']['date_created'], 'label' => 'Date Created', 'type' => 'text')); ?>
		<?php echo $this->Form->input("job_id", array('READONLY' => true, 'value' => $this->data['Job']['job_id'], 'label' => 'Job ID', 'type' => 'text')); ?>
		<?php echo $this->Form->input("rev_no", array('READONLY' => true, 'value' => $this->data['Job']['rev_no'], 'label' => 'Revision Number', 'type' => 'text')); ?>
    </fieldset>


    <fieldset>
        <legend>
            <?php __('Ticket Creator Information'); ?>
        </legend>
        <?php //echo $this->Form->input('date_created', array('type' => 'date'));  ?>
		<?php echo $this->Form->input("Signum", array('READONLY' => true, 'value' => $this->data['Job']['Signum'], 'label' => 'Signum', 'type' => 'text')); ?>
		<?php echo $this->Form->input("Name", array ('READONLY' => true, 'value' => $this->data['Job']['Name'], 'label' => 'Signum', 'type' => 'text')); ?>
        <?php echo $this->Form->input("modifier_signum", array('READONLY' => true, 'value' => $signum, 'label' => 'Modifier Signum', 'type' => 'text')); ?>
        <?php echo $this->Form->input("modifier_name", array('READONLY' => true, 'value' => $name, 'label' => 'Modifier Name', 'type' => 'text')); ?>
		
        <?php //echo $this->Javascript->link('snj.js') ?>
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
            }
        </script>
    <?php
		echo $this->Form->input('Organization', array ('type' => 'hidden', 'value' => $this->data['Job']['Organization']));
		echo $this->Form->input('Organization', array('disabled' => $lmddFlag,'type' => 'select', 'options' => $orgs, 'selected' => $Organization,'onChange' => 'javascript:HideUnHideReq()'));
		echo $this->Ajax->observeField('JobOrganization', array('url' => array('controller' => 'ajax', 'action' => 'getScopeOfWorks'), 'update' => 'scope_of_work'));
    ?>

    <?php
		echo $this->Form->input('Work_Location', array ('type' => 'hidden', 'value' => $this->data['Job']['Work_Location']));
		echo $this->Form->input('Work_Location', array('disabled' => $lmddFlag,'type' => 'select', 'options' => $workLocations)); 
	?>
    </fieldset>

    <fieldset>
        <legend>
    <?php __('Job Basic Information'); ?>
        </legend>
        <?php
			echo $this->Form->input('customer', array ('type' => 'hidden', 'value' => $this->data['Job']['customer']));
			echo $this->Form->input('customer', array('disabled' => $lmddFlag, 'type' => 'select', 'options' => $customers, 'id' => 'customerno')); 
		?>
		
        <?php echo $this->Form->input('Network_Number', array('READONLY' => $lmFlag, 'type' => 'text', 'maxlength' => 8)); ?>
        <?php echo $this->Form->input('More_id', array('READONLY' => $lmFlag,'type' => 'text', 'label' => 'More ID')); ?>
        <?php echo $this->Form->input('request_id', array ('READONLY' => $lmFlag,'type' => 'text', 'label' => 'Request ID')); ?>
        <?php echo $this->Form->input('CCB_tckt_no', array('READONLY' => $lmFlag,'type' => 'text', 'label' => 'CCB Ticket Number')); ?>
		
        <?php 
			echo $this->Form->input('Technology', array ('type' => 'hidden', 'value' => $this->data['Job']['Technology']));
			echo $this->Form->input('Technology', array('disabled' => $lmddFlag,'type' => 'select', 'options' => $technologies));        
        ?>

        <?php 
		echo $this->Form->input('Region', array ('type' => 'hidden', 'value' => $this->data['Job']['Region']));
		echo $this->Form->input('Region',  array('disabled' => $lmddFlag,'type' => 'select',
            'options' => $regions)); ?>


        <?php
		echo $this->Form->input('Market', array ('type' => 'hidden', 'value' => $this->data['Job']['Market']));
        echo $this->Form->input('Market', array('disabled' => $lmddFlag,'type' => 'select','options' => $markets));
        ?>
        <script language="javascript">
            function HideUnHide()
            {
                
                var nodetypeindex =document.getElementById("workdaytime").selectedIndex;
                var stextValue = document.getElementById("workdaytime").options[nodetypeindex].text;
                var ele = document.getElementById("divMAINT");
                
                if(stextValue.indexOf("Maintenance") == -1)
                {
                    ele.style.display = "none";
                }
                else
                {
                    ele.style.display = "block";
                }
            }
        </script>

    <?php 
		echo $this->Form->input('Work_day_time', array ('type' => 'hidden', 'value' => $this->data['Job']['Work_day_time']));
		echo $this->Form->input('Work_day_time', array('disabled' => $lmddFlag,'type' => 'select', 'options' => $workDayTimes,'id'=>'workdaytime', 'onchange' => 'javascript:HideUnHide();')); 
	?>
      
      
       
    <?php echo $this->Form->input('no_of_eng_needed', array('READONLY' => $engFlag, 'type' => 'text')); ?>

        <div id="divREQ" style="display:none" >
        <?php echo $this->Form->input('Request_type', array('disabled' => $lmddFlag,'type' => 'select',
            'options' => $requestTypes)); ?>
        </div>

        <?php
        /*echo $this->Form->input('priority', array('type' => 'select',
            'options' => array(
                '' => '--Select--', 'High' => 'High',
                'Medium' => 'Medium',
                'Low' => 'Low')));*/
        ?>

		
        <?php
			//debug ($sows);
			//echo $this->Form->input('Scope_of_work', array('type' => 'select', 'disabled' => 'disabled', 
			//	'id' => 'scope_of_work', 'options' => $sows, 'selected' => $this->data['Job']['Scope_of_work'])); 
			echo $this->Form->input('Scope_of_work', array ('type' => 'hidden', 'value' => $this->data['Job']['Scope_of_work']));
			echo $this->Form->input("Scope_of_work_content", array('READONLY' => true, 'value' => $sows[$this->data['Job']['Scope_of_work']], 'label' => 'Scope of Work', 'type' => 'text'))
		?>

        <?php
			echo $this->Form->input('Task.parallel_activity', array ('type' => 'hidden', 'value' => $this->data['Task']['parallel_activity']));
			echo $this->Form->input('Task.parallel_activity', array('disabled' => $pmddflag,'type' => 'checkbox', 'id' => 'Parallely_Running_Activity')); 
		?>

        <?php 
			echo $this->Form->input('mop_link', array ('type' => 'hidden', 'value' => $this->data['Job']['mop_link']));
			echo $this->Form->input('mop_link', array('disabled' => $lmddFlag,'type' => 'select', 'options' => $mopNames, 'id' => 'mop_link'));
		?>



        <?php
			echo $this->Form->input('mop_risk_level', array ('type' => 'hidden', 'value' => $this->data['Job']['mop_risk_level']));
			echo $this->Form->input('mop_risk_level', array('disabled' => $lmddFlag,'type' => 'select',
            'options' => array('0' => '--Select--',
                'High' => 'High',
                'Medium' => 'Medium',
                'Low' => 'Low'), 'id' => 'mop_risk_level'));
        ?>

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
         

                if (textValue == '')
                {
                    ele.style.display = "none";
                    eleNodes.style.display = "none";
                }
        
                if (textValue == 'Text Area')
                {
                    ele.style.display = "none";
                    eleNodes.style.display = "block";
                }
        
       
                if (textValue == 'Excel File Upload')
                {
                    ele.style.display = "block";
                    eleNodes.style.display = "none";
                }
            
            }
        </script>
    <?php
   // echo $this->Form->input('NodeEntryType', array('type' => 'select', 'empty' => '--Select--',
    //    'options' => array('Text Area' => 'Text Area',
    //        'Excel File Upload' => 'Excel File Upload'), 'onChange' => 'javascript:HideUnHideTextArea()'));
    ?>

        <?php //echo $this->Form->input('node_type', array('label' => 'Node Granularity', 'type' => 'select', 'onClick' => 'javascript:HideUnhideNodes()',
         //   'options' => array('empty' => '--Select--'))); ?>

        <script type="text/javascript">
            function HideUnhideNodes()
            {
                var nodepareting =document.getElementById("node_reparenting");
                var nodetypeindex =document.getElementById("JobNodeType").selectedIndex;
                var selected_text = document.getElementById("JobNodeType").options[nodetypeindex].text;
                var addnodes = document.getElementById("divADDNodes");
                //alert(selected_text);
                if (nodepareting.checked)
                {
                    document.getElementById('divNodes').style.display = 'block';
          
                    document.getElementById("target_node").value = "Enter Target Node info here";
               
                    document.getElementById("adjacent_nodes").value = "Enter Adjacent Nodes Node info here";
                    if((selected_text == 'NodeB') || (selected_text == 'eNodeB'))
                    {
                        document.getElementById("target_node").value = "Enter RNC Target Node info here";
                
                        document.getElementById("adjacent_nodes").value = "Enter RNC Adjacent Nodes Node info here";
                        addnodes.style.display = 'block';
                
                        document.getElementById("target_node1").value = "Enter OSS Target Node info here";
                        document.getElementById("adjacent_nodes1").value = "Enter OSS Adjacent Nodes Node info here";
           
                    }
                    else
                    {
                        addnodes.style.display = 'none';
                    }
                }
                else
                {
                    document.getElementById('divNodes').style.display = 'none';
                }
                HideUnHideTextArea();
            }
        </script>


    <?php //echo $this->Form->input('node_Reparenting', array('type' => 'checkbox', 'id' => 'node_reparenting', 'onClick' => 'javascript:HideUnhideNodes()')); ?>
    <?php
		if (!empty ($this->data['Node']['source_node']))
		{
			echo $this->Form->input('Node.source_node', array('READONLY' => true, 'type' => 'text', 'READONLY' => true, 'value' => '-Source node will be displayed here upon saving-', 'style' => 'width:335px')); 
		}
	?>

	<?php 
		if (!empty ($this->data['Node']['target_node']))
		{
			echo $this->Form->input('Node.target_node', array('READONLY' => true, 'type' => 'text', 'onfocus' => 'javascript:selectTextBox(target_node)', 'id' => 'target_node', 'style' => 'width:250px')); 
		}
	?>
	<?php
		if (!empty ($this->data['Node']['adjacent_nodes']))
		{
			echo $this->Form->input('Node.adjacent_nodes', array('READONLY' => true, 'type' => 'textarea', 'id' => 'adjacent_nodes')); 
		}
	?>
	
	<?php echo $this->Form->input('Node.concerned_node', array('READONLY' => true, 'value' => $concernedNodes, 'type' => 'textarea', 'label' => 'Concerned Nodes')); ?>






        <span id="fileupload"></span>


        <script language="javascript">
            function CalculateDate()
            {
                //Taskstartdate is in format: 2012-01-01
                var selectedDate = document.getElementById("TaskStartDate").value;
                var selectedHour = document.getElementById("TaskStartTimeHour").value;
                var selectedMinute = document.getElementById("TaskStartTimeMin").value;
                var selectedMeridian = document.getElementById("TaskStartTimeMeridian").value;

                var EndDate = document.getElementById("TaskEndDate");
                var EndHour = document.getElementById("TaskEndTimeHour");
                var EndMinute = document.getElementById("TaskEndTimeMin");
                var EndMeridian = document.getElementById("TaskEndTimeMeridian");
                
                      
            }

        </script>

        <span id="spandates" style="font-size: 16px; color:darkred; cursor:pointer;"></span>
        <span id="moredates"></span>
        <span id="dates">
    <?php echo $datePicker->picker('Task.start_date', array('READONLY' => $engFlag, 'id' => 'Start Date', 'label' => 'Project Start Date', 'onChange' => 'javascript:CalculateDate()')); ?>
    <?php echo $datePicker->picker('Task.end_date', array('READONLY' => $engFlag, 'id' => 'End Date', 'label' => 'Project End Date')); ?>
    <?php echo $this->Form->input('Task.start_time.', array('disabled' => $engddFlag, 'label' => 'Start Time', 'type' => 'time', 'value' => $this->data['Task']['start_time'])); ?>
            <?php echo $this->Form->input('Task.end_time.', array('disabled' => $engddFlag, 'label' => 'End Time', 'type' => 'time', 'value' => $this->data['Task']['end_time'])); ?>

            <div id="divMAINT" style="display:none">
            <?php echo $datePicker->picker('Task.maintenance_window_start_date', array('READONLY' => $engFlag, 'label' => 'Maintenance Window Start Date','value'=>$mstart_date)); ?>
            <?php echo $datePicker->picker('Task.maintenance_window_end_date', array('READONLY' => $engFlag, 'label' => 'Maintenance Window End Date','value'=>$mend_date)); ?>
            <?php echo $this->Form->input('Task.maintenance_window_start_time', array('READONLY' => $engddFlag, 'label' => 'Maintenance Window Start Time', 'type' => 'time','selected'=>$mstart_time)); ?>
            <?php echo $this->Form->input('Task.maintenance_window_end_time', array('READONLY' => $engddFlag, 'label' => 'Maintenance Window End Time', 'type' => 'time', 'selected'=>$mend_time)); ?>
            </div>


                <?php //echo $this->Ajax->observeField('JobReparenting', array('url' => array('READONLY' => $engFlag, 'controller' => 'ajax', 'action' => 'getReparentingUpdate'), 'update' => 'reparenting_section')); ?>
 <script language="javascript">
            HideUnHide();
        </script>

            <div id="divEXCEL" style="display:none">
            <?php echo $this->Form->input('excel_template'); ?>
            <?php echo $this->Form->input('excel_file', array('type' => 'file')); ?>
            </div>

            <hr />
        </span>


   <?php echo $this->Form->input('email_addresses', array('type' => 'textarea')); ?>
    <?php echo $this->Form->input('additional_notes', array('type' => 'textarea')); ?>
    </fieldset>


      <?php echo $this->Form->end(array('label' => 'Save')); ?>
	
	<center>
	
		<FORM METHOD="LINK" ACTION="../cancel/<?php echo $this->data['Job']['job_id']; ?> ">
		<INPUT TYPE="submit" VALUE="CANCEL">
		</FORM>
		
	</center>

<script type="text/javascript">   
HideUnHide();   
</script>