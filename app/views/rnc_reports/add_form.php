<?php
/*
 * id: emoibhu
 * Name: Moiz Bhukhiya
 */
for($i=0;$i<11;$i++) $qaException[$i] = $i;
$username = Authsome::get("username");
$name = Authsome::get("first_name") ." ". Authsome::get("last_name");
$usernameArray = (empty($this->data['RncReport']['engineer_signum'])) ? array("value" => $username, "readonly"=>"readonly") : array("readonly"=>"readonly");
$nameArray = (empty($this->data['RncReport']['engineer_name'])) ? array("value" => $name, "readonly"=>"readonly") : array("readonly"=>"readonly");
$qaUsernameArray = (empty($this->data['RncReport']['qa_engineer_signum'])) ? array("value" => $username, "readonly"=>"readonly") : array("readonly"=>"readonly");
$qaNameArray = (empty($this->data['RncReport']['qa_engineer_name'])) ? array("value" => $name, "readonly"=>"readonly") : array("readonly"=>"readonly");
?>

<fieldset>
    <legend><?php __('Add Report'); ?></legend>
    <?php
    echo $form->create('RncReport', array("action"=>"add"));
    echo $form->hidden('id');
    echo $form->input('report_number', array("value"=>$report_number,"readonly"=>"readonly", "class"=>"report_identifier"));
    echo $form->input('status', array("type"=>"select", "options"=>$rncDatabaseFields->getOptions('status', 111)));
    echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
    echo $form->input('rnc_name', array("label"=>"RNC Name"));
    echo $form->input('ip_address', array("label"=>"RNC IP Address"));
    echo $form->input('engineer_signum', $usernameArray);
    echo $form->input('engineer_name', $nameArray);
    echo $form->input('customer', array("type"=>"select", "options"=>$rncDatabaseFields->getOptions('customer', 111)));
    echo $form->input('project_manager');
    echo $form->input('network_number');
    echo $form->input('sdm', array("label" => "SDM"));
    echo $form->input('engineer_work_location', array("type"=>"select","options"=>$rncDatabaseFields->getOptions('region',111)));
    echo $form->input('dateActivityPerformed');
    echo $form->input('region', array("type"=>"select","options"=>$rncDatabaseFields->getOptions('region',111)));
    echo $form->input('tcm_engineer', array("label" => "TCM Engineer"));
    echo $form->input('csr_reference',array("label" => "CSR Reference"));
    echo $form->input('ccb_ticket', array("label" => "CCB Ticket"));
    echo $form->input('mop_used', array("type"=>"select","options"=>$ny, "label" => "Was MOP Used?"));
    echo $form->input('problem_with_mop', array("label"=>"Problem with MOP?"));
    echo $form->input('hardware_type', array("type"=>"select","options"=>$rncDatabaseFields->getOptions('hardware_type',111)));
    echo $form->input('software_version', array("type"=>"select","options"=>$rncDatabaseFields->getOptions('software_version',111)));
    echo $form->input('delivery_package', array("type"=>"select","options"=>$rncDatabaseFields->getOptions('delivery_package',111)));
    echo $form->input('upgrade_package', array("type"=>"select","options"=>$rncDatabaseFields->getOptions('upgrade_package',111)));
    echo $form->input('upgrade_path', array("type"=>"select","options"=>$rncDatabaseFields->getOptions('upgrade_path',111)));
    echo $form->input('factory_software', array("type"=>"select","options"=>$rncDatabaseFields->getOptions('factory_software',111)));
    echo $form->input('current_software');
    echo $form->input('customer_level', array("type"=>"select","options"=>$rncDatabaseFields->getOptions('customer_level',111)));
    echo $form->input('csr_status_check', array("label"=>"CSR Status Check"));
    echo $form->input('mop_version', array("label"=>"MOP Version"));
    //Need not display
    //echo $form->input('report_status');
    echo $form->input('report_comments');
    /*Include this in QA final status
    echo $form->input('qa_status');
    echo $form->input('qa_comments');
     *
     */
    ?>
    <fieldset>
        <legend><?php __('Toycell Info'); ?></legend>
        <?php
        echo $form->input('toycell_hardware_type', array("type"=>"select","options"=>$rncDatabaseFields->getOptions('toycell_hardware_type',111)));
        echo $form->input('toycell_software_level', array("type"=>"select","options"=>$rncDatabaseFields->getOptions('toycell_software_level',111)));
        echo $form->input('toycell_iub_atm_ip', array("label"=>"Toycell IUB over?", "options"=>array("ATM"=>"ATM", "IP"=>"IP")));
        echo $form->input('toycell_name');
        echo $form->input('toycell_ip_address', array("label"=>"Toycell IP Address"));
        ?>
    </fieldset>
    <?php if($readyForQa):?>
    <fieldset>
        <legend><?php __('QA Completion'); ?></legend>
        <?php
        echo $form->input('qa_engineer_signum');
        echo $form->input('qa_engineer_name');
        echo $form->input('qa_status', array("type"=>"select","options"=>$rncDatabaseFields->getOptions('qa_status',111)));
        echo $form->input('qa_exceptions', array("type"=>"select","options"=>$qaException));
        echo $form->input('qa_comments');
        ?>
    </fieldset>
    <?php endif;?>
        <?php
        echo $form->end(__('Save Report', true));
        echo $html->link("Create Another Revision", array('action'=>'create_revision'), array("onclick"=>"return create_revision_check();"));
        ?>
</fieldset>