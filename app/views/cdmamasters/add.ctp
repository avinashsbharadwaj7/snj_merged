<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
echo $html->css("lte-lit");
echo $this->Html->script(array('jquery.js', 'lte_add_modify.js'));
?>

<?php
$signum = Authsome::get('username');
$name_concat = Authsome::get('first_name') . ' ' . Authsome::get('last_name');
$modelNameField = 'Cdmamaster';
$controllerNameField = "'cdmamasters'";
?>

<li><?php echo $this->Html->link(__('Back', true), array('action' => 'index')); ?> </li>
<h0>Add - New CDMA Report</h0>

<fieldset>
        <legend><?php __('CDMA Integration Report Form'); ?></legend>
            <?php
            echo $this->Form->create('Cdmamaster', array('type'=>'file'));
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
            echo "<div>"; ?>
        
        <fieldset>
		<div class="submit">
                <input name="Email" type="submit" value="Submit without Email" />
        </div>
        <?php //echo $this->Form->end($options = array('name' => 'Email','label' => 'Submit without Email'));   ?>
        <?php echo $this->Form->end($options = array('name' => 'Email','label' => 'Submit with Email'));   ?>
        </fieldset>
        <?php    echo "</div>";
            ?>
</fieldset>
