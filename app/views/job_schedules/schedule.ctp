<?php
echo $html->css("lte-lit");
echo $this->Html->script(array('jquery.js'));
echo $javascript->link('add_requirements.js');
?>

<?php
$signum = Authsome::get('username');
$name_concat = Authsome::get('first_name') . ' ' . Authsome::get('last_name');
$readonly = false;
debug($this->data);
?>

<fieldset>
    <legend><?php __('Scheduler'); ?></legend>
    <?php
    echo $this->Form->create('JobSchedule');
    include_once('sender_information.inc');
    include_once('project_information.inc');
    include_once('general_information.inc');
    //include_once('personal_options.inc');
    include_once('add_requirements.inc');
    //include_once('classifications.inc');
    ?>

    <fieldset>
        <div class="submit">
            <input name="Email" type="submit" value="Submit without Email" />
        </div>
        <?php //echo $this->Form->end($options = array('name' => 'Email','label' => 'Submit without Email'));   ?>
        <?php echo $this->Form->end($options = array('name' => 'Email', 'label' => 'Submit with Email')); ?>
    </fieldset>
    <div id="workingPlaceholder" style="width:0px;"></div>
</fieldset>
<?PHP
echo $this->Html->script(array('lte_bindings.js'));
?>