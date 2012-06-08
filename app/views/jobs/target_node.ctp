<?php

	$this->Form->create('Node');
	
	$this->Form->input('job_id', array ('READONLY' => true, 'type' => 'text', 'value' => $job_id, 'label' => 'Job Id'));
	$this->Form->input('task_id', array ('READONLY' => true, 'type' => 'text','value' => $task_id, 'label' => 'Task Id'));	
	
	$this->Form->input('node_name', array ('READONLY' => true, 'type' => 'text', 'value' => $node_name, 'label' => 'Node Name'));
	$this->Form->input('node_type', array ('READONLY' => true, 'type' => 'text', 'value' => $node_type, 'label' => 'Node Type'));
	$this->Form->input('customer', array ('READONLY' => true, 'type' => 'text', 'value' => $customer, 'label' => 'Customer'));
	
	$this->Form->input('ip_addr', array ('type' => 'text', 'label' => 'IP - Address'));
	$this->Form->input('password', array ('type' => 'password', 'label' => 'Password'));
	$this->Form->input('re_password', array ('type' => 'password', 'label' => 'Re-Enter Password'));
	
	$this->Form->end();
	
?>