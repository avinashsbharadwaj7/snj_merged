<?php 

  $groupId = Authsome::get('user_group_id');
  
  echo $html->css(array(  'snj/960'
                        , 'snj/snj'
                        , 'snj/demo_page'
                        , 'snj/demo_table_jui'
                        , 'snj/TableTools_JUI'
                        , 'snj/redmond/jquery-ui-1.8.16.custom'
                       ));
                       
  /*if ($groupId == $pmgroupid) // PM
  {
    echo $javascript->link(array('snj/jquery-1.6.2.min'
                                 , 'snj/jquery-ui-1.8.16.custom.min'
                                 , 'snj/jquery.dataTables.min'
                                 , 'snj/TableTools.min'
                                 , 'snj/jquery.uiforms'
								 , 'snj/searchpm'
                                ));
  }
  else if ($groupId == $enggroupid) // Engineer
  {
    echo $javascript->link(array('snj/jquery-1.6.2.min'
                                 , 'snj/jquery-ui-1.8.16.custom.min'
                                 , 'snj/jquery.dataTables.min'
                                 , 'snj/TableTools.min'
                                 , 'snj/jquery.uiforms'
								 , 'snj/searchengineer'
                                ));
  }
  else // LM
  {
    echo $javascript->link(array('snj/jquery-1.6.2.min'
                                 , 'snj/jquery-ui-1.8.16.custom.min'
                                 , 'snj/jquery.dataTables.min'
                                 , 'snj/TableTools.min'
                                 , 'snj/jquery.uiforms'
								 , 'snj/searchlm'
                                ));
  }*/
                              
?>
  
<li id="backButton"><?php echo $this->Html->link(__('Back', true), array('controller' => 'snjs', 'action' => 'snjcall')); ?></li> 
<fieldset>
    <legend><?php __('Ticket Search'); ?></legend>
<?php
    $helpers = array('Html', 'Javascript');
    echo($javascript->link("toggle.js"));  
	
	echo $this->Form->create('Job');
	echo $this->Form->input('job_id', array('type' => 'text'));
	echo $this->Form->input('Signum', array('type' => 'text'));
	echo $this->Form->input('Name', array ('type' => 'text'));

	
   	echo $this->Form->input('Organization',array('type'=>'select','options'=> $orgs));
	echo $this->Ajax->observeField('JobOrganization', array('url' => array('controller' => 'ajax','action' => 'getScopeOfWorks'), 'update' => 'scope_of_work'));

	echo $this->Form->input('customer', array ('type' => 'select', 'options' => $customers));
	
	echo $this->Form->input('Region', array ('type' => 'select', 'options' => $regions));
	
	echo $this->Form->input('Work_Location', array ('type' => 'select', 'options' => $workLocations));
	
	echo $this->Form->input('Network_Number', array('type' => 'text', 'maxlength' => 8));
	
	echo $this->Form->input('Technology', array('type' => 'select', 'options' => $technologies));
	
	echo $this->Form->input('Market',array('type'=>'select', 'options'=>$markets));
	
	echo $this->Form->input('scope_of_work',array('type'=>'select', 'id' => 'scope_of_work', 'options'=>$sows) );
	
	echo $this->Form->input('Work_day_time', array ('type' => 'select', 'options' => $workDayTimes));
	
?>
<div class="input select">
<label for="JobSearchType">Search Type</label>
<select onchange="toggle_search(this.value)" name="data[Job][Search Type]" id="JobSearchType">
<option value="select">--Select--</option>
<option value="daterange">Date Range</option>
<option value="quarter">Current Year Quarter</option>
<option value="year">Year</option>
<option value="time">Time</option>
</select>
</div>
<div id="daterange" style="display:none;">
<?php
    echo $datePicker->picker('date_start', array('label' => 'From Date'));
    echo $datePicker->picker('date_end', array('label' => 'End Date',));	
	echo $this->Form->input('Creation Date/Time', array ('type' => 'checkbox')); 
	echo $this->Form->input('Job Start Date/Time', array ('type' => 'checkbox'));
?>
</div>
<div id="quarter" style="display:none;">
<?php								 
    echo $this->Form->input('Quarter',array('type'=>'select', 
                'options'=>array('' => '--Select--',
				                 '1' => '1',
                                 '2' => '2',
								 '3' => '3',
                                 '4' => '4')) );
								 
	echo $this->Form->input('creation_time', array ('type' => 'checkbox')); 
	echo $this->Form->input('job_start_time', array ('type' => 'checkbox'));
?>
</div>
<div id="year" style="display:none;">
<?php								 
	echo $this->Form->input('Year',array('type'=>'select', 
                'options'=>array('' => '--Select--',
				                 '1' => '2009',
                                 '2' => '2010',
								 '3' => '2011',
                                 '4' => '2012')) );
								 
	echo $this->Form->input('creation_time', array ('type' => 'checkbox')); 
	echo $this->Form->input('job_start_time', array ('type' => 'checkbox'));
?>
</div>
<div id="time" style="display:none;">
<?php								 
	echo $this->Form->input('Time',array('type'=>'select', 
                'options'=>array('' => '--Select--',
				                 '12 hours' => '12 hours',
				                 '24 hours' => '24 hours',
                                 '36 hours' => '36 hours',
								 '48 hours' => '48 hours',
								 '60 hours' => '60 hours',
								 '72 hours' => '72 hours',
								 '1 week' => '1 week',
								 '2 weeks' => '2 weeks',
								 '3 weeks' => '3 weeks',
                                 '4 weeks' => '4 weeks')) );

?>
</div>
<?php

	echo $this->Form->submit();
	echo $this->Form->end();
?>
</fieldset>

<?php
 /* $groupId = Authsome::get('user_group_id');

  echo '
    <div id="searchResultsContainer" class="container_12 ui-widget">
    <div id="searchResults" class="grid_12 alpha omega highlight_row">
      <table cellpadding="0" cellspacing="0" border="0" class="ui-widget-content display" id="searchResultsTable2">
        <thead>
          <tr>
      ';
  if ($groupId == $pmgroupid)
  {
    echo '
        <th>Job ID</th>
        <th>Org</th>
        <th>SoW</th>
        <th>Date Created</th>
        <th>Conflict</th>
        <th>Resources Assigned</th>
        <th>Child Tickets</th>
    ';
  } else  if ($groupId == $lmgroupid)
  {
    echo '
        <th>Job ID</th>
		<th>Created By</th>
        <th>Org</th>
        <th>SoW</th>
        <th>Date Created</th>
        <th>Conflict</th>
        <th>Resources Assigned</th>
        <th>Child Tickets</th>
    ';
  }
  else
  {
    /*echo '
        <th>Job ID</th>
        <th>Created By</th>
        <th>Region</th>
        <th>SoW</th>
        <th>Date Created</th>
        <th>Conflict</th>
        <th>Resources Assigned</th>
        <th>Child Tickets</th>
        <th>Action</th>
    ';
    echo '
        <th>Job ID</th>
        <th>Created By</th>
        <th>Region</th>
        <th>SoW</th>
        <th>Date Created</th>
        <th>Conflict</th>
        <th>Resources Assigned</th>
        <th>Child Tickets</th>
    ';
  }
  echo '
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div> <!-- end searchResults -->
    </div> <!-- end searchResultsContainer -->
  ';*/
?>