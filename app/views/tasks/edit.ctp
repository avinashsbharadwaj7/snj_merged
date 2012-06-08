<h1>Add Task</h1>
<?php
echo $this->Form->create('Task');

echo $this->Form->input('activity_type');

echo $datePicker->picker('start_date', array('label' => 'Start Date'));
echo $datePicker->picker('end_date', array('label' => 'End Date'));

echo $this->Form->input('start_time', array ( 'type' => 'time', 'label' => 'Start Time', 'selected' => array('hour' => '12', 'minute' => '0', 'meridian' => 'am' )));
echo $this->Form->input('end_time', array ( 'type' => 'time', 'label' => 'End Time', 'selected' => array('hour' => '5', 'minute' => '0', 'meridian' => 'am' )));

echo $this->Form->input('extend_end_time', array ('type' => 'checkbox', 'label' => 'Extend End Time Checkbox'));
echo $this->Form->input('outage', array('type' => 'checkbox', 'label' => 'Outage'));

echo $this->Html->link('Add resources', array('controller' => 'resources', 'action' => 'add'));

echo "<br/> <br/>";

echo $this->Html->link('Generate Authorization Code', array ('controller' => 'authcodes', 'action' => 'index'));



echo $this->Form->end('Save Job');
?>