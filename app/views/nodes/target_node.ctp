<?php

	echo $this->Form->create('Node');
	
	echo $this->Form->input('job_id', array ('READONLY' => true, 'type' => 'text', 'value' => $job_id, 'label' => 'Job Id'));
	echo $this->Form->input('task_id', array ('READONLY' => true, 'type' => 'text','value' => $task_id, 'label' => 'Task Id'));	
	
	echo $this->Form->input('node_name', array ('READONLY' => true, 'type' => 'text', 'value' => $node_name, 'label' => 'Node Name'));
	echo $this->Form->input('node_type', array ('READONLY' => true, 'type' => 'text', 'value' => $node_type, 'label' => 'Node Type'));
	//echo $this->Form->input('customer', array ('type' => 'text', 'label' => 'Customer'));
	
	echo $this->Form->input('ip_addr', array ('type' => 'text', 'label' => 'IP - Address'));
	//echo $this->Form->input('password', array ('type' => 'password', 'label' => 'Password'));
	//echo $this->Form->input('re_password', array ('type' => 'password', 'label' => 'Re-Enter Password'));
	
	echo $this->Form->end('SUBMIT');
	
?>