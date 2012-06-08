<?php
    echo $html->css("lte-lit");
    echo $this->Html->script(array('jquery.js', 'lte_add_modify.js'));
    $signum = Authsome::get('username');
?>

<fieldset>
<legend><?php __('OUTAGE'); ?></legend>
    
<?php
	echo $this->Form->create('Resource', array('type' => 'file'));
	
	echo $this->Form->input("Signum", array( 'READONLY' => true, 'value' => $signum, 'label'=>'Signum', 'type'=>'text') );
	echo $this->Form->input('job_id', array('READONLY' => true, "label"=>"Job ID", "type"=>"text", 'value' => $job_id));
	
	echo $this->Form->input('TasksSelected', array ( 'label' => 'Task Id', 'type' => 'select', 'multiple' => 'true', 'options' => $taskIdArray));
	echo $this->Form->input('outage', array ('label'=>'Outage', 'type'=>'checkbox'));
	
	echo $this->Form->end('SUBMIT');
?>

</fieldset>