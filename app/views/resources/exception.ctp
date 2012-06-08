<?php
    echo $html->css("lte-lit");
    echo $this->Html->script(array('jquery.js', 'lte_add_modify.js'));
    $signum = Authsome::get('username');
?>

<fieldset>
<legend><?php __('Exception'); ?></legend>
    
<?php
	echo $this->Form->create('Resource', array('type' => 'file'));
	
	echo $this->Form->input("Signum", array( 'READONLY' => true, 'value' => $signum, 'label'=>'Signum', 'type'=>'text') );
	echo $this->Form->input('job_id', array('READONLY' => true, "label"=>"Job ID", "type"=>"text", 'value' => $job_id));
	echo $this->Form->input('task_id', array('READONLY' => true, "label"=>"Task ID", "type"=>"text", 'value' => $task_id));
	echo $this->Form->input('user_signum', array('READONLY' => true, "label"=>"Resource Signum", "type"=>"text", 'value' => $resource));
	
	echo $this->Form->input('end_time',array('label'=>'End Time', 'type'=>'time', 'value' => $end_time));
	//echo $this->Form->input('outage', array ('label'=>'Outage', 'type'=>'checkbox'));
	
	echo $this->Form->end($options = array('label' => 'Submit'));
 
?>