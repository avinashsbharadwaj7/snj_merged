<h1>Add Task</h1>
<?php
echo $this->Form->create('Task');

echo $this->Form->input('activity_type');

echo $this->Form->input('start_date', array( 'label' => 'Start Date', 'dateFormat' => 'DMY'));
echo $this->Form->input('end_date', array( 'label' => 'End  Date', 'dateFormat' => 'DMY'));



echo $this->Form->input('maintainance_window_start_date', array( 'label' => 'Maintainance Window Start  Date', 'dateFormat' => 'DMY'));
echo $this->Form->input('maintainance_window_end_date', array( 'type' => 'date', 'label' => 'Maintainance Window End Date', 'dateFormat' => 'DMY'));

echo $this->Form->input('start_time', array ( 'type' => 'time', 'label' => 'Maintainance Start Time', 'selected' => array('hour' => '12', 'minute' => '0', 'meridian' => 'am' )));
echo $this->Form->input('end_time', array ( 'type' => 'time', 'label' => 'Maintainance Start Time', 'selected' => array('hour' => '5', 'minute' => '0', 'meridian' => 'am' )));

echo $this->Form->input('maintainance_window_start_time', array ( 'type' => 'time', 'label' => 'Maintainance Window Start Time', 'selected' => array('hour' => '12', 'minute' => '0', 'meridian' => 'am' )));
echo $this->Form->input('maintainace_windwo_end_time', array ( 'type' => 'time', 'label' => 'Maintainance Window End Time', 'selected' => array('hour' => '5', 'minute' => '0', 'meridian' => 'am' )));

$options = array ('D' => 'Drop Down', 'T' => 'Text Area', 'E' => 'Excel Upload');
echo $this->Form->input('Node Entry Type', array('type'=>'select', 'options'=>$options));
//echo $this->Form->input ('Node Entry Type', $options);

echo $this->Form->input('nodes.concerned_node');


echo $this->Form->end('Save Job');
?>