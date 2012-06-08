<?php
$yes_no = $databaseFields->getOptions('yes_no_only', '4', true);
$yes_no_only = $databaseFields->getOptions('yes_no_only', '4', false);
?>

<fieldset>
    <legend><?php __('Activity Information'); ?></legend>
    <?php
    if ($this->params['action'] != "add") {
        echo $this->Form->input('LitmasterVerizon.activity', array('readonly' => true));
        echo $this->Form->input('LitmasterVerizon.activity_status', array('readonly' => true));
    } else {
        echo $this->Form->input('LitmasterVerizon.activity', array("options" => $databaseFields->getOptions('activity_type', 6)));
        echo $this->Form->input('LitmasterVerizon.activity_status', array("options" => $databaseFields->getOptions('activity_status', 6)));
    }
    echo $this->Form->input('LitmasterVerizon.time_taken_for_activity', array('label'=>'Time Taken For Activity', 'placeholder'=>'HH:MM'));
    echo $this->Form->input('LitmasterVerizon.asp_engineer_name', array('label' => 'ASP Engineer Name'));
    echo $this->Form->input('LitmasterVerizon.sonar_updated', array('label' => 'Sonar Updated', 'options' => $yes_no));
    ?>

    <fieldset style="min-width: 500px;">
        <legend><?php __('MOP Information'); ?></legend>
        <?php
        echo $this->Form->input('LitmasterVerizon.problem_in_mop', array('label'=>'Problem in MOP', 'options'=> $databaseFields->getOptions('yes_no_only', 4, false)));
        echo $this->Form->input('LitmasterVerizon.reason_for_problem_in_mop', array('label'=>'Reason for Problem', 'type'=>'textarea'));
        echo $this->Form->input('LitmasterVerizon.ip_connectivity', array("label" => "IP Connectivity", "options" => array('Yes', 'No')));
        echo $this->Form->input('LitmasterVerizon.baseline_loaded', array("options" => array('Yes', 'No')));
        echo $this->Form->input('LitmasterVerizon.ntp_pingable', array("label" => "NTP Pingable", "options" => $yes_no));
        ?>
    </fieldset>
</fieldset>
