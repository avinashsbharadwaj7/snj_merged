<fieldset>
    <legend><?php __('General Information'); ?></legend>
    <?php
    if ($this->params['action'] === 'modify') {
        echo $this->Form->input('overall_status', array('options' => array(''=>'','Completed (Accepted)'=>'Completed (Accepted)','Completed (Denied)'=>'Completed (Denied)', 'Cancelled'=>'Cancelled'), 'onChange'=>"showAddResourceLink()"));
        echo $this->Form->input('status', array('options' => array(''=>'','Accepted'=>'Accepted', 'Denied'=>'Denied', 'Cancelled'=>'Cancelled')));
    }
    echo $this->Form->input('priority', array('options' => array(''=>'','Medium'=>'Medium', 'High'=>'High', 'Low'=>'Low'), 'readonly' => $readonly));
    if ($this->params['action'] === 'modify') {
        echo $datePicker->picker('expiration_date', array('label' => 'Expire on', 'readonly' => $readonly));
        echo $datePicker->picker('date_requested_start', array('label' => 'Requested Start Date', 'readonly' => $readonly));
        echo $datePicker->picker('date_requested_end', array('label' => 'Requested End Date', 'readonly' => $readonly));
    } else {
        echo $datePicker->picker('expiration_date', array('label' => 'Expire on'));
        echo $datePicker->picker('date_requested_start', array('label' => 'Requested Start Date'));
        echo $datePicker->picker('date_requested_end', array('label' => 'Requested End Date'));
    }
    ?>
</fieldset>
