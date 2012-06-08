<li id="backButton"><?php echo $this->Html->link(__('Back', true), array('controller' => 'jobs', 'action' => 'view/'.$func_id)); ?></li> 
<?php
  echo $html->css(array(  'snj/960'
                        , 'snj/snj'
                        , 'snj/redmond/jquery-ui-1.8.16.custom'
                       ));
?>
<div>
	<?php
		// $con = mysql_connect('localhost', 'snj' , 'snj_!23');
		// mysql_select_db("snj", $con);
		$signum = Authsome::get('username');

	?>
	

    
	<?php if ($flag == 1) : ?>
		<?php echo "THE RESOURCE CAN NOT BE ADDED AS TICKET IS UNDER CONFLICT"; ?>
		
		
	<?php else : ?>
	
	
		
    <?php echo $this->Form->create('Resource');?>
	<?php echo $this->Form->label('Date Created: ' .date("D M Y")); ?><br/>
	
	<?php echo $this->Form->label('Job ID: '.$func_id); ?>
	
	
	<?php echo $this->Form->input('id_task', array ('type' => 'hidden', 'value' => $func_id)) ?>
	
	<fieldset>
            
		<legend><?php __('Resources'); ?></legend>
	
		<div id="addResourceStructure">
		<fieldset>
		<legend><?php __('Add Resource'); ?></legend>
		<?php echo $this->Form->input('is_support', array('type' => 'checkbox', 'checked'=>'false'));?>
		<?php echo $this->Form->input('TasksSelected', array ( 'label' => 'Task Id', 'type' => 'select', 'multiple' => 'true', 'options' => $taskIdArray)); ?>
	    <?php echo $this->Form->input("User.first_name");?>
            <?php echo $this->Form->input("User.last_name");?>
            <?php echo $this->Form->input('user_signum',array('label'=>'Signum','type'=>'select','options'=>array( ''=>'--Select--')) );?>
            <?php echo $this->Ajax->observeField('UserFirstName', array('url' => array('controller' => 'ajax', 'action' => 'getSignumLname'), 'update' => 'ResourceUserSignum')); ?>
           <?php echo $this->Ajax->observeField('UserLastName', array('url' => array('controller' => 'ajax', 'action' => 'getSignumLname'), 'update' => 'ResourceUserSignum')); ?>                          
          
            <?php echo $this->Ajax->observeField('ResourceUserSignum', array('url' => array('controller' => 'ajax', 'action' => 'getResourceName'), 'update' => 'ResourceResourceName')); ?>
            <?php echo $this->Ajax->observeField('ResourceUserSignum', array('url' => array('controller' => 'ajax', 'action' => 'getDesignation'), 'update' => 'ResourceDesignation')); ?>   
                
            <label>Resource Designation: </label><div class="text input"  id="ResourceDesignation"></div>
            <label> Resource Name:</label><div class="text input" id="ResourceResourceName"></div>
        
                          
    
    <?php echo $datePicker->picker('start_date', array('label' => 'Start Date','value'=>$start_date));?>
    <?php echo $datePicker->picker('end_date', array('label' => 'End Date','value'=>$end_date));?>
    
	
<?php echo $this->Form->input('start_time',array('label'=>'Start Time', 'type'=>'time', 'selected' => $start_time));?>
<?php echo $this->Form->input('end_time',array('label'=>'End Time', 'type'=>'time', 'selected' => $end_time));?>

	
	<?php echo $this->Form->input('flexible', array('type' => 'checkbox', 'checked'=>'false', 'id' =>'flexibleCheckbox'));?>
	
	<div id="isFlexibleOptions">
	<?php //echo $this->Form->input('co_located', array('type' => 'checkbox', 'id' =>'co_located', 'checked'=>'true'));?>
	<?php echo $this->Form->input('availability',array('type'=>'select', 
                'options'=>array(
                                 '10%'  => '10%',
                                 '20%'  => '20%',
                                 '30%'  => '30%',
                                 '40%'  => '40%',
                                 '50%'  => '50%',
                                 '60%'  => '60%',
                                 '70%'  => '70%',
                                 '80%'  => '80%',
                                 '90%'  => '90%')) );?>
        <?php echo $this->Form->input('location',array('type'=>'select', 'id'=>'location', 
	               'options'=>array('Onsite' => 'Onsite',
	                                 'Remote' => 'Remote')) );?></div>
    </fieldset>
    </div>
	
	<?php //debug ($Resources); ?>
    <?php echo $this->Form->end('Add To List'); ?>

	<table>
    <tr>
        <th>Job Id</th>
        <th>Task Id</th>
		<th>Role</th>
        <th>User Signum</th>
        <th>designation</th>
        <th>start date</th>
        <th>start time</th>
        <th>end date</th>
        <th>end time</th>
        <th>location</th>
		<th>availability</th>
        
        
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($Resources as $resource): ?>
    <tr>
        <td><?php echo $resource['Resource']['job_id']; ?></td>
		<td><?php echo $resource['Resource']['task_id']; ?></td>
		<td><?php echo ($resource['Resource']['availability']==0)? "Support":"Resource";?></td>
		<td><?php echo $resource['Resource']['user_signum']; ?></td>		
        <td><?php echo $resource['Resource']['designation']; ?></td>
        <td><?php echo $resource['Resource']['start_date']; ?></td>
        <td><?php echo $resource['Resource']['start_time']; ?></td>
        <td><?php echo $resource['Resource']['end_date']; ?></td>
        <td><?php echo $resource['Resource']['end_time']; ?></td>
        <td><?php echo $resource['Resource']['location']; ?></td>
        <td><?php echo $resource['Resource']['availability']; ?></td>
        
      </tr>
    <?php endforeach; ?>
	
	

</table>

<br/>
<br/>

<center>
<FORM METHOD="LINK" ACTION="../submit/<?php echo $func_id ?>/<?php echo $task_id ?>">
<INPUT TYPE="submit" VALUE="SUBMIT">
</FORM>
</center>

<?php endif; ?>



<script type="text/javascript">
	var NodeTextArea = '<textarea id="NodeConcernedNode" rows="6" cols="30" name="data[Node][concerned_node]"></textarea>';
	var NodeText = '<input type="text" id="NodeConcernedNode" name="data[Node][concerned_node]" />';
	var dummy = '<div id="dummy"></div>';
	var ExcelUpload = '<div class="input file" id="uploadExcel">';
	ExcelUpload += '<label for="Excel">Upload Excel</label>';
	ExcelUpload += '<input type="file" name="data[Node][Excel]" id="NodeExcel">';
	ExcelUpload + '</div>';
	var countResourceCopies = 0;
	
	j('#flexibleCheckbox').click(function()
	{
		j("#isFlexibleOptions").toggle(this.checked);
	});




	j("#isFlexibleOptions").toggle(this.checked);
</script>
