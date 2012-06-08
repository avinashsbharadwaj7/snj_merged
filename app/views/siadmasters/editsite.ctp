<?php
    /* SIAD only */
    echo $html->css("lte-lit");
    echo $html->css("lte-siad");
    echo $this->Html->script(array('jquery.js', 'lte_add_modify.js'));
    $modelNameField = 'Siadmaster';
    $controllerNameField = "'siadmasters'";
    $teamNameField = 'NI';
?>

    <li><?php echo $this->Html->link(__('LTE Home', true), array('controller' => 'litmasters', 'action' => 'index')); ?> </li>
    <h2>Edit - NDS Record ID: <?PHP echo $this->data['Siadmaster']['id']; ?></h2>
    <h2><?php  __('--Site Record ID: ');
    echo $this->data['Siadsite']['id'];?></h2>
    <?php
        $signum = Authsome::get('username');
        $name_concat = Authsome::get('first_name') . ' ' . Authsome::get('last_name');
    ?>
    <fieldset>
        <legend><?php __('RNAM - RAN Integration Reporting : NI-SIAD'); ?></legend>
        <?PHP
            echo $this->Form->create('Siadsite', array('url' => array('controller' => 'siadmasters', 'action' => 'editsite')));
            echo $form->input('Siadsite.id');
            echo $form->input('Siadmaster.id');
            echo $this->Form->input('Siadmaster.date_created', array("label"=>"Date", "type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
            /* Engineer Information pane */
            include_once('site_engineer_information.inc');
            /* Project Information pane */
            include_once('site_project_information.inc');
            include_once('site_edit_fields.inc');
            include_once('comments.inc');
            include_once('email.inc');
                echo $this->Form->end($options = array('name' => 'Email', 'id' => 'submitEmail', 'label' => 'Submit'));
                ?>
                <div id="workingPlaceholder" style="width:0px;"></div>
    </fieldset>
    <?PHP
        echo $this->Html->script(array('lte_bindings.js'));
    ?>