<?php echo $this->Html->script(array('my_js_html.js')); ?>

<li><?php
echo $this->Html->link(__('Back', true), array('controller' => 'litmasters', 'action' => 'index'));
?> </li>
<h2>Add - New Report</h2>

<?php
$signum = Authsome::get('username');
$name_concat = Authsome::get('first_name') . ' ' . Authsome::get('last_name');
$modelNameField = 'Cdmamaster';
$controllerNameField = "'cdmamasters'";
$teamNameField = 'NI';
?>

<fieldset>
    <legend><?php __('RNAM - RAN Integration Reporting : LTE Integration Tracker (LIT)'); ?></legend>
    <?php
    echo $this->Form->create('LitmasterVerizon', array('type' => 'file'));
    echo $this->Form->input('date_initiated', array("label" => "Date", "type" => "text", "readonly" => "readonly", "value" => date("Y-m-d")));
    include_once('dependency_map.inc');
    $customer = "Verizon";
    echo $this->Form->input('lte_customer', array('type' => 'hidden', 'value' => $customer));
    echo $this->Form->input('object_creation_date', array('type' => 'hidden', 'value' => date("Y-m-d")));
    include_once('engineer_information_verizon.inc');
    include_once('project_information_verizon.inc');
    include_once('site_information_verizon.inc');
    include_once('activity_information_verizon.inc');
    include_once('alarm_reporting_verizon.inc');
//    include_once('antenna_information_verizon.inc');
    include_once('site_integration_status_verizon.inc');
    include_once('email.inc');
    include_once('comments.inc');
    include_once('file_uploads.inc');
    $myJsHtml->init('LitmasterVerizon', $dependencyMap);
    echo $myJsHtml->observeFields();
    ?>
    <div class="submit">
        <input name="Email" type="submit" value="Save without Email" />
    </div>
    <?PHP
    echo $this->Form->end($options = array('name' => 'Email', 'label' => 'Save with Email'));
    ?>


