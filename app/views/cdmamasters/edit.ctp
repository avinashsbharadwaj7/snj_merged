<?php
    echo $html->css("lte-lit");
    echo $this->Html->script(array('jquery.js', 'lte_add_modify.js'));      
?>


<?php if(empty($cdmaId)) { ?> 
    <li><?php echo $this->Html->link(__('Back', true), array('action' => 'index')); ?> </li>
    <h2>Edit</h2>
    <div class="lte_container">
        <fieldset>
            <legend><?php __('CDMA ID Entry'); ?></legend>
            <?php
                echo $this->Form->create('Cdmamaster');
                echo $form->input('enteredId', array("label" => "Enter the CDMA id:"));
                echo $this->Form->end(__('Submit', true));
            ?>
        </fieldset>
    </div>
    <?php } 
 else {
?>
    
    <li><?php echo $this->Html->link(__('Back', true), array('action' => 'edit')); ?> </li>
        <h2>Edit - CDMA ID: <?PHP echo $cdmaId; ?></h2>
        
        <?php
            $signum = Authsome::get('username');
            $name_concat = Authsome::get('first_name') . ' ' . Authsome::get('last_name');
            $modelNameField = 'Cdmamaster';
            $controllerNameField = "'cdmamasters'";
            echo $this->Form->create('Cdmamaster', array('type' => 'file'));
        ?>
        <fieldset>
            <legend><?php __('CDMA Integration Report Form'); ?></legend>
            <?PHP
                echo $form->input('id'); //otherwise a new id will be assigned
                //echo $this->Form->input('date_initiated', array("label"=>"Date", "type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
                /* Basic Information pane */
                include_once('basic_information.inc');
                /* Project Information pane */
                include_once('project_information.inc');
                /* Engineer Information pane */
                include_once('engineer_information.inc');
                /* Activity Information pane */
                include_once('activity_information.inc');
                /* Additional Information pane */ 
                include_once('additional_information.inc');    /*Addtional notes and e-mail*/
                /* File upload pane */
                include_once('file_upload.inc');
           ?>
        </fieldset>

  <?php 
            echo "<div>";
            echo $this->Form->end($options = array('name' => 'Email','label' => 'Submit without Email'));
            echo $this->Form->end($options = array('name' => 'Email','label' => 'Submit with Email'));
            echo "</div>";
 } 
  ?>
