<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<fieldset>
    <legend>Network Information </legend>
    <?php echo $this->Form->input("operator_name", array('label'=>'Operator', 'type'=>'select','options' => array(""=>"", $tmobileSpecific->populatedropdown('operator','9'))));?>
    <?php echo $this->Form->input("market", array('label'=>'Market', 'type'=>'text' ) );?>
    <?php echo $this->Form->input("mobile_core_network", array('label'=>'Mobile Core Network', 'type'=>'select','options' => array(""=>"", $tmobileSpecific->populatedropdown('mobile_core_network','9'))));?>
    <?php echo $this->Form->input("oss_network", array('label'=>'OSS Network', 'type'=>'text' ) );?>
    <?php echo $this->Form->input("transport_network", array('label'=>'Transport Network', 'type'=>'text' ) );?>
    <?php echo $this->Form->input("ipnetwork", array('label'=>'IP Networking', 'type'=>'text' ) );?>
    <?php echo $this->Form->input("ran", array('label'=>'Radio Access Network', 'type'=>'select','options' => array(""=>"", $tmobileSpecific->populatedropdown('ran','9'))));?>
    <?php echo $this->Form->input("multimdeia_service", array('label'=>'Multimedia Service', 'type'=>'text' ) );?>
    
</fieldset>