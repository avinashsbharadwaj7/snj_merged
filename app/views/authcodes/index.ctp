<li id="backButton"><?php echo $this->Html->link(__('Back', true), array('controller' => 'jobs', 'action' => 'view/'.$job_id)); ?></li> 
<?php
    echo $html->css("lte-lit");
    echo $this->Html->script(array('lte_add_modify.js'));
    $signum = Authsome::get('username');
?>

<fieldset>
<legend><?php __('Authorization'); ?></legend>
    
<?php
	echo $this->Form->create('Authcode', array('type' => 'file'));
	
	echo $this->Form->input("Signum", array( 'READONLY' => true, 'value' => $signum, 'label'=>'Signum', 'type'=>'text') );
	echo $this->Form->input('job_id', array('READONLY' => true, "label"=>"Job ID", "type"=>"text", 'value' => $job_id));
	echo $this->Form->input('task_id', array('READONLY' => true, "label"=>"Task ID", "type"=>"text", 'value' => $task_id));
	echo $this->Form->input('node_name', array('READONLY' => true, "label"=>"Node Name", "type"=>"text", 'value' => $node_name));
	
	if ($groupId == $lmgroupid && $key != null)
	{
		echo $this->Form->input("Authorization Code", array( 'READONLY' => true, 'value' => $key, 'label'=>'AUTH CODE', 'type'=>'text') ); 
	}
	
	if($groupId == $lmgroupid){
		echo $this->Form->end($options = array('label' => 'Generate'));
	}else{
		echo $this->Form->end($options = array('label' => 'Request'));
	}
 ?>
 
 </legend>
 
 <?php  echo $this->Html->link('My Tickets', array('controller' => 'Jobs', 'action' => 'mytickets')); ?>
