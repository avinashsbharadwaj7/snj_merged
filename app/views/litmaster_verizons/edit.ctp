<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
//if(isset($id)):
?>

<li><?php echo $this->Html->link(__('LTE Home', true), array('controller' => 'litmasters', 'action' => 'index')); ?> </li>
<h2>Edit - LIT ID: <?PHP echo $this->data['LitmasterVerizon']['id']; ?></h2>

<?php
//debug($this->data);
$signum = Authsome::get('username');
$name_concat = Authsome::get('first_name') . ' ' . Authsome::get('last_name');
?>

<fieldset>
    <legend><?php __('RNAM - RAN Integration Reporting : LTE Integration Tracker (LIT)'); ?></legend>
    <?PHP
    echo $this->Form->create('LitmasterVerizon', array('action' => 'edit', 'type'=>'file'));
    echo $form->input('id'); //otherwise a new id will be assigned
    echo $this->Form->input('date_initiated', array("label" => "Date", "type" => "text", "readonly" => "readonly"));
//    echo $this->Form->input('lte_customer', array('type'=>'hidden', 'value'=>$customer));
//    echo $this->Form->input('object_creation_date', array('type'=>'hidden', 'value'=>date("Y-m-d")));
    include_once('engineer_information_verizon.inc');
    include_once('project_information_verizon.inc');
//    include_once('site_information_verizon.inc');
    include_once('activity_information_verizon.inc');
    include_once('alarm_reporting_verizon.inc');
//    include_once('antenna_information_verizon.inc');
    include_once('site_integration_status_verizon.inc');
    include_once('email.inc');
    include_once('comments.inc');
//    if (array_key_exists('LitfileVerizon', $this->data) && array_key_exists('file', $this->data['LitfileVerizon'])) {
    if (empty($this->data['LitfileVerizon']['file_name'])) {
        include_once('file_uploads.inc');
    } else {
        ?>
        <fieldset>
        <legend>File Upload</legend>
        <div class="lte_view"><?PHP $i = 0; ?>
            <div <?php if ($i++ % 2 == 0)
//                    echo $class; ?>>
                <div id="file_input_html" style="display:none">
                <?php
                    echo $this->Form->input('LitfileVerizon.file',array('type'=>'file'));
                    echo $this->Form->hidden('LitfileVerizon.file.id');
                    echo $this->Form->hidden('LitfileVerizon.file.path');
                ?>
                </div>
                <div class="view_col_left"><?php __('File Name'); ?></div>
                <div class="view_col_right" id="files_container">
                <?php
                if (isset($this->data['LitfileVerizon']['file_name'])) {
                    echo $this->data['LitfileVerizon']['file_name'];
//                    if (Authsome::check('/litmaster_verizons/export')) {
                        ?>
                        <div><?php echo $this->Html->link(__('Download File', true), array('action' => 'download', $this->data['LitmasterVerizon']['id'], true));
                        echo "&nbsp | &nbsp";
                        echo $this->Html->link(__('Change File', true),array(null), array("id"=>"change_uplaoded_file"));
                        ?>
                        </div>
                        <?php
//                    }
                    } else {
                        echo "No files uploaded.";
                    }
                    ?>
                </div>
                <div style="clear: both;"></div>
            </div> 
        </div>
    </fieldset>  
        <?php
    }
    echo $this->Form->input('object_update_date', array('type' => 'hidden', 'value' => date("Y-m-d")));
    ?>
    <div class="submit">
        <input name="Email" type="submit" value="Save without Email" />
    </div>
    <?PHP
    echo $this->Form->end($options = array('name' => 'Email', 'label' => 'Save with Email'));
    ?>
</fieldset>

<?php
//else :
//    $this->redirect(array('controller' => 'Litmaster', 'action' => 'edit'));
//endif;
?>