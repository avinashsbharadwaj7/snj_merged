<?php echo $this->Form->create('Job');?>
<h1>Job Status For Engineer</h1>
<dl>		
	<?php //debug ($job); 
		 echo $this->Form->create('Job')
	?> 
	
    <dt class="altrow">Job:<?php echo $job[0]['Job']['job_id']?></dt>
    <dt>Task:<?php echo $task[0]['Task']['task_id']?></dt>
<dt class="altrow">Start Date:<?php echo $task[0]['Task']['start_date']?></dt>
<dt>End Date:<?php echo $task[0]['Task']['end_date']?></dt>

<?php $name = Authsome::get('first_name') . ' ' . Authsome::get('last_name');
		$signum = Authsome::get('username');
		$org = Authsome::get('organization')?></dt>

<?php echo $this->Form->input('resource_name', array('READONLY' => true, 'value' => $name));
	  echo $this->Form->input('user_signum', array ('READONLY' => true, 'value' => $signum));
	  
	  echo $this->Form->hidden('Organization', array ('READONLY' => true, 'value' => $job[0]['Job']['Organization']));
	  
	  echo $this->Form->hidden('job_id', array('value' => $jobid));
	  echo $this->Form->hidden('task_id', array('value' => $taskid));
	  //debug ($organization);
?>

<dt>Node Name:<?php echo $task[0]['Task']['node_name']?></dt>
<dt class="altrow">

<?php echo $this->Form->input('ticket_status', array('type'=>'select', 'label'=>'Select Ticket Status',
                'options'=> $options,
				'selected' => $task[0]['Task']['ticket_status']) );?></dt>

                                 <dt>
								 
<?php 
	if ($org == "LDO NIC" && ($task[0]['Task']['ticket_status'] == "" || $task[0]['Task']['ticket_status'] == "2") && $organization == 3)
	{
		//echo $this->Form->input('support_signums', array ('type'=>'textarea', 'label' => 'Support Signums'));
	}
?>
<?php echo $this->Form->end('Save'); ?></dt>
</dl>		


