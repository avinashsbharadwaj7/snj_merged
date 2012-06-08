<?php
echo $html->css("lte-lit");
echo $this->Html->script(array('jquery.js', 'lte_add_modify.js'));
?>

<li><?php echo $this->Html->link(__('Back', true), array('controller'=>'litmasters', 'action' => 'add')); ?> </li>
<h2>Add - New Report</h2>

<?php
$signum = Authsome::get('username');
$name_concat = Authsome::get('first_name') . ' ' . Authsome::get('last_name');
$modelNameField = 'Siadmaster';
$controllerNameField = "'Siadmasters'";
$teamNameField = 'NI';
?>

<fieldset>
        <legend><?php __('RNAM - RAN Integration Reporting : NI - SIAD'); ?></legend>
            <?php
            echo $this->Form->create('Siadmaster', array('type' => 'file'));
            echo $this->Form->input('date_created', array("label"=>"Date", "type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
            /* Engineer Information pane */
            include_once('engineer_information.inc');
            /* Project Information pane */
            //include_once('project_information.inc');
            include_once('siad.inc');
            include_once('record_comments.inc');
            include_once('email.inc');
            echo $this->Form->end($options = array('name' => 'Email', 'id' => 'submitEmail', 'label' => 'Submit'));
            ?>
        <div id="workingPlaceholder" style="width:0px;"></div>
</fieldset>
<?PHP
    echo $this->Html->script(array('lte_bindings.js'));
?>