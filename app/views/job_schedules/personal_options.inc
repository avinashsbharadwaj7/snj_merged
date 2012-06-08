<fieldset>
    <legend><?php __('Personal Options'); ?></legend>
    <?php
    echo $this->Form->input('follow_up_priority', array('label'=>'Follow-up Priority', 'options'=>array(""=>"",'Medium'=>'Medium', 'High'=>'High', 'Low'=>'Low')));
    echo $this->Form->input('filed', array('label'=>'Filed', 'options'=>array(""=>"", 'Yes'=>'Yes', 'No'=>'No')));
    echo $this->Form->input('notifications', array('label'=>'Notifications'));
    ?>
</fieldset>