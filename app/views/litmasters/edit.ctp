<?php
/* LIT (NI) only */
echo $html->css("lte-lit");
echo $this->Html->script(array('jquery.js', 'lte_add_modify.js'));
echo $this->Html->script(array('my_js_html.js'));
$modelNameField = 'Litmaster';
$controllerNameField = 'litmasters';
$teamNameField = 'NI';
?>

<?php if (empty($litId)): ?> 
    <li><?php echo $this->Html->link(__('Back', true), array('controller' => 'litmasters', 'action' => 'index')); ?> </li>
    <h2>Edit</h2>
    <div class="lte_container">
        <fieldset>
            <legend><?php __('LIT ID Entry'); ?></legend>
            <?php
            echo $this->Form->create('Litmaster');
            echo $form->input('enteredId', array("label" => "Enter the LIT Id:"));
            echo $form->input('lte_customer', array('options' => $databaseFields->getOptions('customer_lte', 4)));
            echo $this->Form->end(__('Submit', true));
            ?>
        </fieldset>
    </div>
<?php else:
    ?>
    <li><?php echo $this->Html->link(__('LTE Home', true), array('controller' => 'litmasters', 'action' => 'index')); ?> </li>
    <h2>Edit - LIT ID: <?PHP echo $litId; ?></h2>

    <?php
    //var_dump($this->data['Litfile']);
    $signum = Authsome::get('username');
    $name_concat = Authsome::get('first_name') . ' ' . Authsome::get('last_name');
    ?>
    <fieldset>
        <legend><?php __('RNAM - RAN Integration Reporting : LTE Integration Tracker (LIT)'); ?></legend>
        <?PHP
        echo $this->Form->create('Litmaster', array('type' => 'file'));
        echo $form->input('id'); //otherwise a new id will be assigned
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
<?php endif; ?>