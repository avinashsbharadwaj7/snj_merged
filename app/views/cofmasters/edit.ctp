<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<li><?php echo $this->Html->link(__('Back', true), array('action' => 'index')); ?> </li>
<?php 
 $filedata = $dataValues['CofFile'];
$dataValues = $dataValues['Cofmaster']; ?>
<h2><?php echo __('Welcome'); ?> <?php echo Authsome::get('username'); ?>!</h2>
<h3>Edit- COF Report Id :: <?php echo $dataValues['id']; ?></h3>
 <?php echo $this->Form->create('Cofmaster', array("class" => "form",'type'=>'file')); ?>

<fieldset>
<legend>COF Report Form</legend>
<?php echo $this->Form->input('date_init', array("label" => "Date Created", "type" => "text", "readonly" => "readonly", "value" => $dataValues['date_init'])); ?>
<fieldset>
    <legend>Project Information </legend>
    <?php //echo $this->Form->hidden("id", array('value'=> $dataValues['id']));?>
    <?php echo $this->Form->input("signum", array('READONLY'=>true, 'value'=> $dataValues['signum'],'label'=>'Engineer Signum', 'type'=>'text' ) );?>
    <?php echo $this->Form->input("first_name", array('READONLY'=>true,'value'=> $dataValues['first_name'],'label'=>'First Name', 'type'=>'text' ) );?>
    <?php echo $this->Form->input("last_name", array('READONLY'=>true, 'value'=> $dataValues['last_name'],'label'=>'Last Name', 'type'=>'text' ) );?>
    <?php echo $this->Form->input("proj_name", array('label'=>'Project Name','value'=> $dataValues['proj_name'], 'type'=>'text' ) );?>
    <?php echo $this->Form->input("proj_manager", array('label'=>'Project Manager','value'=> $dataValues['proj_manager'], 'type'=>'text' ) );?>
    <?php echo $this->Form->input("group", array('label'=>'Group', 'type'=>'select','value'=> $dataValues['group'],'options' => array(""=>"", $tmobileSpecific->populatedropdown('group','9'))));?>
    <?php echo $this->Form->input("change_initiatedby", array('label'=>'Change Initiated By','value'=> $dataValues['change_initiatedby'], 'type'=>'select','options' => array(""=>"",$tmobileSpecific->populatedropdown('change_initiated_by','9'))));?>
    <?php echo $this->Form->input("change_reason", array('label'=>'Reason for Change','value'=> $dataValues['change_reason'], 'type'=>'select','options' => array(""=>"",$tmobileSpecific->populatedropdown('reason_for_change','9'))));?>
    <?php echo $this->Form->input("network_num", array('label'=>'Network Number','value'=> $dataValues['network_num'], 'type'=>'text' ) );?>
    <?php echo $this->Form->input("time_estimate", array('label'=>'Estimated Time(Hour)','value'=> $dataValues['time_estimate'], 'type'=>'text' ) );?>
</fieldset>
<fieldset>
    <legend>Activity Information </legend>
    <?php echo $this->Form->input('activity_type', array('value'=> $dataValues['activity_type'], 'readonly'=>'readonly')); ?>
</fieldset>
<fieldset>
    <legend>Network Information </legend>
    <?php echo $this->Form->input("operator_name", array('label'=>'Operator','value'=> $dataValues['operator_name'], 'type'=>'select','options' => array(""=>"", $tmobileSpecific->populatedropdown('operator','9'))));?>
    <?php echo $this->Form->input("market", array('label'=>'Market','value'=> $dataValues['market'], 'type'=>'text' ) );?>
    <?php echo $this->Form->input("mobile_core_network", array('label'=>'Mobile Core Network','value'=> $dataValues['mobile_core_network'], 'type'=>'select','options' => array(""=>"", $tmobileSpecific->populatedropdown('mobile_core_network','9'))));?>
    <?php echo $this->Form->input("oss_network", array('label'=>'OSS Network','value'=> $dataValues['oss_network'], 'type'=>'text' ) );?>
    <?php echo $this->Form->input("transport_network", array('label'=>'Transport Network','value'=> $dataValues['transport_network'], 'type'=>'text' ) );?>
    <?php echo $this->Form->input("ipnetwork", array('label'=>'IP Networking','value'=> $dataValues['ipnetwork'], 'type'=>'text' ) );?>
    <?php echo $this->Form->input("ran", array('label'=>'Radio Access Network','value'=> $dataValues['ran'], 'type'=>'select','options' => array(""=>"", $tmobileSpecific->populatedropdown('ran','9'))));?>
    <?php echo $this->Form->input("multimdeia_service", array('label'=>'Multimedia Service','value'=> $dataValues['multimdeia_service'], 'type'=>'text' ) );?>
    
</fieldset>  
<fieldset>
    <legend>Additional Information </legend>   
    <?php echo $this->Form->input("description", array( 'label'=>'Additional Notes','value'=> $dataValues['description'], 'type'=>'textarea' ) ); ?>
    <?php echo $this->Form->input("email", array( 'label'=>'Email Addresses', 'type'=>'textarea' ) ); ?>
    <font color='red' size='1'>The email ids have to be separated with a semi-colon(;)</font>
</fieldset>
<fieldset>
     <legend>File Upload</legend>
     <?php
                echo $this->Form->input('CofFile.file',array('type'=>'file'));
		
     ?>
   <font color='red' size='1'>Your previous upload will be deleted.</font>  
</fieldset>
<fieldset>
    <legend>Files Attached</legend>
    <?php   
    if(isset($filedata['file_name'])){
    if (($filedata['file_name']) != "") { ?>
        <font color='blue'><b><?php echo $filedata['file_name']." - "; ?></b></font>
        <?php echo $this->Html->link(__('Download File', true), array('action' => 'download', $dataValues['id'])); ?>
        <br/>
    <?php }}
    ?>
    <div style="clear: both;"></div>
</fieldset>

<fieldset>
    <div class="submit">
        <input name="Email" type="submit" value="Submit without Email" />
    </div>
    <?php echo $this->Form->end($options = array('name' => 'Email', 'label' => 'Submit with Email')); ?>
</fieldset>
</fieldset>