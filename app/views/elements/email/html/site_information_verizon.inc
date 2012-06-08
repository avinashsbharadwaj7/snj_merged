<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * //LTE FILE
 */
$yes_no = array("","Yes"=>"Yes","No"=>"No");
?>

<fieldset>
    <legend><?php __('Site Information'); ?></legend>
    <?php
    echo $this->Form->input('LitmasterVerizon.area');
    echo $this->Form->input('LitmasterVerizon.oss', array("label"=>"OSS"));
    echo $this->Form->input('LitmasterVerizon.oss_version', array("label"=>"OSS Version"));
    echo $this->Form->input('LitmasterVerizon.enb_name', array("label"=>"ENodeB Name"));
    echo $this->Form->input('LitmasterVerizon.enode_software_level', array("label"=>"ENode Software Level"));
    echo $this->Form->input('LitmasterVerizon.erbs_id', array("label"=>"ERBS ID", 'type'=>'text'));
    echo $this->Form->input('LitmasterVerizon.no_cells', array("label"=>"No of Cells/Sectors"));
    echo $this->Form->input('LitmasterVerizon.ip_address', array("label"=>"IP Address"));
    echo $this->Form->input('LitmasterVerizon.customer_site_name', array("label"=>"Customer Site Name"));
    echo $this->Form->input('LitmasterVerizon.site_id', array("label"=>"Site Id", 'type'=>'text'));
    echo $this->Form->input('LitmasterVerizon.site_market', array("label"=>"Site Market", 'type'=>'text'));
    echo $this->Form->input('LitmasterVerizon.mme1_name', array("label"=>"MME 1 Name"));
    echo $this->Form->input('LitmasterVerizon.mme1_ip_address', array("label"=>"MME 1 IP Address"));
    echo $this->Form->input('LitmasterVerizon.mme2_name', array("label"=>"MME 2 Name"));
    echo $this->Form->input('LitmasterVerizon.mme2_ip_address', array("label"=>"MME 2 IP Address"));
    echo $this->Form->input('LitmasterVerizon.tac_information', array("label"=>"TAC Information"));
    echo $this->Form->input('LitmasterVerizon.node_part_pool',array('label'=>'Is ENodeB A Part Of MME Pool','options'=>$databaseFields->getOptions('yes_no_only',4), 'onChange'=>"triggerUpdater(LitmasterNodePartPool, 'NodePartPoolPlaceholder', 'litmasters')"));
    
    /* Only if the answer is Yes show the Please Explain box*/
//    echo $this->Html->div('', null, array('id'=>'NodePartPoolPlaceholder'));
//    echo (isset($this->data['Litmaster']['node_part_pool']) && $showFields->display('node_part_pool', $this->data['Litmaster']['node_part_pool'])) ? $this->Form->input('node_part_pool_explain', array('label'=>'-Please Explain')): "";
//    echo "</div>";
    ?>
</fieldset>
