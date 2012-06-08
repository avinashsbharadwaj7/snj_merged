<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<fieldset>
    <legend>Project Information </legend>
    <?php echo $this->Form->input("signum", array('READONLY'=>true, 'value'=> $signum,'label'=>'Engineer Signum', 'type'=>'text' ) );?>
    <?php echo $this->Form->input("first_name", array('READONLY'=>true,'value'=> $firstname,'label'=>'First Name', 'type'=>'text' ) );?>
    <?php echo $this->Form->input("last_name", array('READONLY'=>true, 'value'=> $lastname,'label'=>'Last Name', 'type'=>'text' ) );?>
    <?php echo $this->Form->input("proj_name", array('label'=>'Project Name', 'type'=>'text' ) );?>
    <?php echo $this->Form->input("proj_manager", array('label'=>'Project Manager', 'type'=>'text' ) );?>
    <?php echo $this->Form->input("group", array('label'=>'Group', 'type'=>'select','options' => array(""=>"", $tmobileSpecific->populatedropdown('group','9'))));?>
    <?php echo $this->Form->input("change_initiatedby", array('label'=>'Change Initiated By', 'type'=>'select','options' => array(""=>"",$tmobileSpecific->populatedropdown('change_initiated_by','9'))));?>
    <?php echo $this->Form->input("change_reason", array('label'=>'Reason for Change', 'type'=>'select','options' => array(""=>"",$tmobileSpecific->populatedropdown('reason_for_change','9'))));?>
    <?php echo $this->Form->input("network_num", array('label'=>'Network Number', 'type'=>'text' ) );?>
    <?php echo $this->Form->input("time_estimate", array('label'=>'Estimated Time(HH:MM)', 'type'=>'text' ) );?>
    <?php echo $this->Form->input("rnc_report_number", array('label'=>'RNC Report Number', 'type'=>'text', "after" => "<font size='1px' color='red'> (This is applicable for RNC Integration only)</font>" ) );?>
</fieldset>