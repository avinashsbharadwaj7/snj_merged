<?php echo $html->css("lte-lit"); ?>
<?php
$signum = Authsome::get('username');
$firstname = Authsome::get('first_name');
$lastname = Authsome::get('last_name');
$date_created = date("Y-m-d");
?>
<li><?php echo $this->Html->link(__('Back', true), array('action' => 'index')); ?> </li>
<h2><?php echo __('Welcome'); ?> <?php echo $signum; ?>!</h2>
<h0>Add - New COF Report</h0>
    <?php echo $this->Form->create('Cofmaster', array('type'=>'file','enctype' => 'multipart/form-data')); ?>
<fieldset>
    <legend>COF Report Form</legend>
    <?php echo $this->Form->input('date_init', array("label" => "Date", "type" => "text", "readonly" => "readonly", "value" => date("Y-m-d"))); ?>
    <?php
    include_once('project_information.inc');
    include_once('activity_information.inc');
    include_once('network_information.inc');
    include_once('additional_information.inc');
    include_once('file_upload.inc');
    ?>
    <fieldset>
        <div class="submit">
            <input name="Email" type="submit" value="Submit without Email" />
        </div>
        <?php echo $this->Form->end($options = array('name' => 'Email', 'label' => 'Submit with Email')); ?>

    </fieldset>
</fieldset>

