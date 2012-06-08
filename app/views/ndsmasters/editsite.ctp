<?php
    /* NDS only */
    echo $html->css("lte-lit");
    echo $html->css("lte-nds");
    echo $this->Html->script(array('jquery.js', 'lte_add_modify.js'));
    $modelNameField = 'Ndsmaster';
    $controllerNameField = "'ndsmasters'";
    $teamNameField = 'NDS';
?>

    <li><?php echo $this->Html->link(__('LTE Home', true), array('controller' => 'litmasters', 'action' => 'index')); ?> </li>
    <h2>Edit - NDS Record ID: <?PHP echo $this->data['Ndsmaster']['id']; ?></h2>
    <h2><?php  __('--Site Record ID: ');
    echo $this->data['Ndssite']['id'];?></h2>
    <?php
        $signum = Authsome::get('username');
        $name_concat = Authsome::get('first_name') . ' ' . Authsome::get('last_name');
    ?>
    <fieldset>
        <legend><?php __('RNAM - RAN Integration Reporting : NDS'); ?></legend>
        <?PHP
            echo $this->Form->create('Ndssite', array('url' => array('controller' => 'ndsmasters', 'action' => 'editsite')));
            echo $form->input('Ndssite.id');
            echo $form->input('Ndsmaster.id');
            echo $this->Form->input('Ndsmaster.date_initiated', array("label"=>"Date", "type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
            ?>
            <fieldset>
                <legend><?php __('Master NDS Record Fields (ID = ' . $this->data['Ndsmaster']['id'] . ')'); ?></legend>
                <div style="padding-bottom: 6px; font-style: italic;">*Any changes made to the Master NDS Record will affect all sites under that record.</div>
            <?php
                /* Engineer Information pane */
                include_once('engineer_information.inc');
                /* Project Information pane */
                include_once('project_information_edit.inc');
            ?>
            </fieldset>
            <?php
                include_once('site_fields.inc');
                include_once('comments.inc');
                include_once('email.inc');
                echo $this->Form->end($options = array('name' => 'Email', 'id' => 'submitEmail', 'label' => 'Submit'));
                ?>
                <div id="workingPlaceholder" style="width:0px;"></div>
    </fieldset>
    <?PHP
        echo $this->Html->script(array('lte_bindings.js'));
    ?>