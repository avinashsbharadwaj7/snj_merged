<?php
echo $html->css("lte-lit");
echo $this->Html->script(array('jquery.js', 'lte_add_modify.js'));
echo $this->Html->script(array('my_js_html.js'));
?>

<li><?php
if (!empty($isNI)) {
    echo $this->Html->link(__('Back', true), array('action' => 'add'));
} else {
    echo $this->Html->link(__('Back', true), array('action' => 'index'));
}
?> </li>
<h2>Add - New Report</h2>

<?php
$signum = Authsome::get('username');
$name_concat = Authsome::get('first_name') . ' ' . Authsome::get('last_name');
$modelNameField = 'Litmaster';
$controllerNameField = "'litmasters'";
$teamNameField = 'NI';
?>

<?PHP
if (empty($isNI)) {
    ?>
    <fieldset>
        <legend><?php __('RNAM - RAN Integration Reporting : LTE Integration Tracker (LIT)'); ?></legend>
        <fieldset>
            <legend><?php __('Team Name Entry'); ?></legend>
            <?php
            echo $this->Form->create('Litmaster');
            echo $form->input('teamNameField', array("label" => "Team Name: ", 'options' => $databaseFields->getOptions('team_name', 4, false)));
            echo $this->Form->input('lte_customer', array("options" => $databaseFields->getOptions("customer_lte", 4, false)));
            echo $this->Form->end(__('Submit', true));
            ?>
        </fieldset>
    </fieldset>
    <?PHP
} else if ($isNI) {
    /* NI */
    ?>
    <fieldset>
        <legend><?php __('RNAM - RAN Integration Reporting : LTE Integration Tracker (LIT)'); ?></legend>
        <?php
        echo $this->Form->create('Litmaster', array('type' => 'file'));
        echo $this->Form->input('date_initiated', array("label" => "Date", "type" => "text", "readonly" => "readonly", "value" => date("Y-m-d")));
        include_once('dependency_map.inc');
        /* Engineer Information pane */
        include_once('engineer_information.inc');
        /* Project Information pane */
        include_once('project_information.inc');
        /* Site Information pane */
        include_once('site_information.inc');
        /* Activity Information pane */
        include_once('activity_information.inc');
        /* Alarm Reporting pane */
        include_once('alarm_reporting.inc');
        /* Antenna Information pane */
        include_once('antenna.inc');
        /* Call Testing pane */
        include_once('call_testing.inc');
        /* Data Test Result pane */
        include_once('data_test_result.inc');
        /* Site Integration Status pane */
        include_once('site_integration_status.inc');
        include_once('email.inc');
        /* Additional Comments pane */
        include_once('comments.inc');
        include_once('file_uploads.inc');
        $myJsHtml->init('Litmaster', $dependencyMap);
        echo $myJsHtml->observeFields();
        ?>

        <fieldset>
            <div class="submit">
                <input name="Email" type="submit" value="Submit without Email" />
            </div>
    <?php echo $this->Form->end($options = array('name' => 'Email', 'label' => 'Submit with Email')); ?>
        </fieldset>
        <div id="workingPlaceholder" style="width:0px;"></div>
    </fieldset>
    <?PHP
    echo $this->Html->script(array('lte_bindings.js'));
    ?>
<?PHP
}
?>