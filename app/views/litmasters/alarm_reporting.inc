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
    echo $this->Form->input('Litmaster.number_of_alarms');
    echo $this->Form->input('Litmaster.actual_text_alarms');
    echo $this->Form->input('Litmaster.heartbeat_alarm', array("label"=>"Heartbeat Alarm (eNodeB)"));
    echo $this->Form->input('Litmaster.alarms_matched_alv', array("label"=>"Number of Alarms Matched between eNodeB & ALV"));
    echo $this->Form->input('Litmaster.heartbeat_alarm_osr', array("label"=>"Heartbeat Alarm (OSR)"));
    echo $this->Form->input('Litmaster.alarms_matched_osr', array("label"=>"Number of Alarms Matched between OSR & ALV"));
    echo $this->Form->input('Litmaster.alarm_issues', array("label"=>"Reasons For ALV Related Issues (Please Be As Descriptive As Possible)"));
    ?>
</fieldset>
