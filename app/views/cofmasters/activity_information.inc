<?php 
      $nicActivities = $databaseFields->getOptions('activity_type', 9);
      $ndsActivities = $databaseFields->getOptions('activity_type', 11);  
?>

<fieldset>
    <legend><?php __('Activity Information'); ?></legend>
    <?php
    if ($this->params['action'] != "add") {
        echo $this->Form->input('activity_type', array('readonly' => true));
    } else {
        echo $this->Form->input('activity_type', array("options" => array("NIC" => $nicActivities, "NDS" => $ndsActivities)));
    }
    ?>
</fieldset>
