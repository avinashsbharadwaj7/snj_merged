<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * //LTE FILE
 */

?>
<fieldset>
    <legend><?php __('Alarm Reporting'); ?></legend>
    <?php
//    echo $this->Form->input('Litmaster_verizon.number_of_alarms');
//    echo $this->Form->input('Litmaster_verizon.actual_text_alarms');
    echo $this->Form->input('LitmasterVerizon.enodeb_alarm', array("label"=>"ENodeB Alarm", 'type'=>'select', 'options'=>$databaseFields->getOptions('yes_no_only',4,true)));
//    echo $this->Form->input('Litmaster_verizon.alarms_matched_alv', array("label"=>"Number of Alarms Matched between eNodeB & ALV"));
//    echo $this->Form->input('Litmaster_verizon.heartbeat_alarm_osr', array("label"=>"Heartbeat Alarm (OSR)"));
//    echo $this->Form->input('Litmaster_verizon.alarms_matched_osr', array("label"=>"Number of Alarms Matched between OSR & ALV"));
//    echo $this->Form->input('Litmaster_verizon.alarm_issues', array("label"=>"Reasons For ALV Related Issues (Please Be As Descriptive As Possible)"));
    ?>
</fieldset>
