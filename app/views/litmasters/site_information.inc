<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * //LTE FILE
 */
$yes_no = array("", "Yes" => "Yes", "No" => "No");
?>

<fieldset>
    <legend><?php __('Site Information'); ?></legend>
    <?php
    // change back test to add
    if ($this->params['action'] == 'add') {
        echo $this->Form->input('Litmaster.number_of_sites', array('label' => "Number of Sites", 'options' => $databaseFields->getOptions('number_of_sites', 4, false)));
    }
    echo $this->Form->input('Litmaster.site_name', array("label" => "Site Name(ENodeB Name)"));
    if ($this->params['action'] == 'add') {
        echo $this->Form->input('Litmaster.site_list', array('label' => "Site List", 'type' => 'textarea', 'placeholder'=>'Please use Multiple only for sites that have the same Area, OSS and OSS Version.'));
    }
    echo $this->Form->input('Litmaster.area', array('label' => "Area"));
    echo $this->Form->input('Litmaster.oss', array("label" => "OSS", 'id' => 'oss'));
    echo $this->Form->input('Litmaster.oss_version', array("label" => "OSS Version", 'id' => 'oss_version'));
    echo $this->Form->input('Litmaster.no_cells', array("label" => "No of Cells/Sectors", 'id' => 'LitmasterNoCells'));
    echo $this->Form->input('Litmaster.mme1_name', array("label" => "MME 1 Name", 'id' => 'mme1_name'));
    echo $this->Form->input('Litmaster.mme1_ip_address', array("label" => "MME 1 IP Address", 'id' => 'mme1_ip_address'));
    echo $this->Form->input('Litmaster.mme2_name', array("label" => "MME 2 Name", 'id' => 'mme2_name'));
    echo $this->Form->input('Litmaster.mme2_ip_address', array("label" => "MME 2 IP Address", 'id' => 'mme2_ip_address'));
    echo $this->Form->input('Litmaster.tac_information', array("label" => "TAC Information", 'id' => 'tac_information'));
    echo $this->Form->input('Litmaster.node_part_pool', array('label' => 'Is ENodeB A Part Of MME Pool', 'options' => $databaseFields->getOptions('yes_no_only', 4, false), 'onChange' => "triggerUpdater(LitmasterNodePartPool, 'NodePartPoolPlaceholder', 'litmasters')"));

    /* Only if the answer is Yes show the Please Explain box */
    echo $this->Html->div('', null, array('id' => 'NodePartPoolPlaceholder'));
    echo (isset($this->data['Litmaster']['node_part_pool']) && $showFields->display('node_part_pool', $this->data['Litmaster']['node_part_pool'])) ? $this->Form->input('Litmaster.node_part_pool_explain', array('label' => '-Please Explain')) : "";
    echo "</div>";

    echo $ajax->observeField('LitmasterSiteName', array(
        'url' => array(
            'action' => 'populate'
        ),
        'complete' => 'populateFields(request, json)',
            )
    )
    ?>
</fieldset>
