<?php
    /* NDS only */
    echo $html->css("lte-lit");
    echo $this->Html->script(array('jquery.js', 'lte_add_modify.js'));
    $modelNameField = 'Ndsmaster';
    $controllerNameField = "'ndsmasters'";
    $teamNameField = 'NDS';
?>

<?php if(empty($ndsId)): ?> 
    <li><?php echo $this->Html->link(__('Back', true), array('controller' => 'litmasters', 'action' => 'index')); ?> </li>
    <h2>Edit</h2>
    <div class="lte_container">
        <fieldset>
            <legend><?php __('Record ID Entry'); ?></legend>
            <?php
                echo $this->Form->create('Ndsmaster');
                echo $this->Form->input('idMode', array("options"=>$databaseFields->getOptions("nds_edit_criteria",4, false), 'label'=>'Record ID Type'));
                echo $form->input('enteredId', array("label" => "Enter the ID:"));
                echo $this->Form->end(__('Submit', true));
            ?>
        </fieldset>
    </div>
<?php else: ?>
    <li><?php echo $this->Html->link(__('LTE Home', true), array('controller' => 'litmasters', 'action' => 'index')); ?> </li>
    <h2>Edit - NDS Record ID: <?PHP echo $ndsId; ?></h2>   
    <?php
        $signum = Authsome::get('username');
        $name_concat = Authsome::get('first_name') . ' ' . Authsome::get('last_name');
    ?>
    <fieldset>
        <legend><?php __('RNAM - RAN Integration Reporting : NDS'); ?></legend>
        <?PHP
            echo $this->Form->create('Ndsmaster', array('type' => 'file'));
            echo $form->input('id'); //otherwise a new id will be assigned
            echo $this->Form->input('date_initiated', array("label"=>"Date", "type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
            /* Engineer Information pane */
            include_once('engineer_information.inc');
            /* Project Information pane */
            include_once('project_information.inc');
            /* Precheck / Postcheck files */
            include_once('nds.inc');
            include_once('email.inc');
            echo $this->Form->end($options = array('name' => 'Email', 'id' => 'submitEmail', 'label' => 'Submit'));
            ?>
        <div id="workingPlaceholder" style="width:0px;"></div>
    </fieldset>
    <?PHP
        echo $this->Html->script(array('lte_bindings.js'));
    ?>
<?php endif; ?>