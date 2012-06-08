
<?php echo $html->link("Back", array('action' => 'index','controller'=>'slmasters')); ?>
<h3><u><b>Script Load Reporting - Modify</b></u></h3>

<?php echo $html->script('tmobile'); ?>
<?php echo $this->Form->create('TmobileSlmaster', array('action' => 'modify', 'enctype' => 'multipart/form-data')); ?>
<?php echo $this->Form->hidden("doc_type", array('id' => 'doc_type', 'value' => 'modifysl')); ?>
<?php
$signum = Authsome::get('username');
$modify_fields = $modify_fields_full['TmobileSlmaster'];
include_once('modify_check_rights.inc');
 include_once('add_tcm_logic.inc');

$Today = date("Y-m-d");
?>
<span class='freetext'><?php echo "Date : " . $Today; ?></span>
<?php include_once('modify_report_details.inc'); ?>
<?php include_once('modify_engineer_details.inc'); ?>
<?php include_once('modify_project_information.inc'); ?>
<?php include_once('modify_activity_information.inc'); ?>
<?php include_once('modify_file_upload.inc');?>




<fieldset>
    <div class="submit">
        <input name="Email" type="submit" value="Update without Email" />
    </div>
    <?php //echo $this->Form->end($options = array('name' => 'Email','label' => 'Update without Email'));    ?>
    <?php echo $this->Form->end($options = array('name' => 'Email', 'label' => 'Update with Email')); ?>
</fieldset>
