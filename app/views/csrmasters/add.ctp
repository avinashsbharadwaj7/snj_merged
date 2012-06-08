<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//echo $html->css("csr");
echo $html->css("lte-lit");
echo $this->Html->script(array('jquery.js', 'lte_add_modify.js'));
?>

<?php
$signum = Authsome::get('username');
$name_concat = Authsome::get('first_name') . ' ' . Authsome::get('last_name');
$modelNameField = 'Csrmaster';
$controllerNameField = "'csrmasters'";
$teamNameField = 'NI';
?>

<li><?php echo $this->Html->link(__('Back', true), array('action' => 'index')); ?> </li>
<h0>Add - New CSR</h0>

<fieldset>
        <legend><?php __('Customer Service Request Form'); ?></legend>
            <?php
            echo $this->Form->create('Csrmaster', array('type'=>'file'));
            /* Basic Information pane */
            include_once('basic_information.inc');
            /* Project Information pane */
            include_once('engineer_information.inc');
            /* Node Information pane */
            include_once('project_information.inc');
            /* Problem Description pane */ 
            include_once('problem_description.inc');
            /* Email address pane */
            include_once('email_address.inc');
            //echo $this->Form->end(__('Submit', true));
            //echo $this->Form->end('Submit Form');         
            include_once('file_upload.inc');
            echo "<div>";
            echo $this->Form->end($options = array('name' => 'Email','label' => 'Submit without Email'));
            echo $this->Form->end($options = array('name' => 'Email','label' => 'Submit with Email'));
            echo "</div>";
            ?>
</fieldset>
