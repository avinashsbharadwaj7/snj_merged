<?php 
      $nicActivities = $databaseFields->getOptions("new_activities",1);
      $ndsActivities = $databaseFields->getOptions("activity",10);
?>

<fieldset>
    <legend><?php __('Project Information'); ?></legend>
    <?php
    echo $this->Form->input('activity_type', array('type'=>'select', 'options'=>array('NIC'=>$nicActivities, 'NDS'=>$ndsActivities), 'readonly'=>$readonly));
    if ($this->params['action'] === 'modify') {
        echo $this->Form->input('project_name', array('label' => 'Project Name', 'type'=>'label', 'readonly' => $readonly));
    } else {
        echo $this->Form->input('project_name', array('label' => 'Project Name', 'readonly' => $readonly));
    }
    echo $datePicker->picker('project_date_start', array('label' => 'Project Start Date', 'readonly' => $readonly));
    echo $datePicker->picker('project_date_end', array('label' => 'Project End Date', 'readonly' => $readonly));
    echo $this->Form->input('technology', array('type'=>'select', 'options' => $databaseFields->getOptions("technology", 2)));
    echo $this->Form->input('project_location', array('label' => 'Project Location', 'readonly' => $readonly));
    echo $this->Form->input('project_pool', array('label' => 'Pool', 'readonly' => $readonly));
    echo $this->Form->input('project_product_area', array('label' => 'Product Area', 'readonly' => $readonly));
    echo $this->Form->input('project_client', array('label' => 'Client', 'readonly' => $readonly));
    echo $this->Form->input('project_position_name', array('label' => 'Position Name', 'readonly' => $readonly));
    echo $this->Form->input('project_team', array('label' => 'Team', 'readonly' => $readonly));
    if ($this->params['action'] === 'modify') {
        echo $datePicker->picker('project_position_date_start', array('label' => 'Position Start Date', 'readonly' => $readonly));
        echo $datePicker->picker('project_position_date_end', array('label' => 'Position End Date', 'readonly' => $readonly));
    } else {
        echo $datePicker->picker('project_position_date_start', array('label' => 'Position Start Date'));
        echo $datePicker->picker('project_position_date_end', array('label' => 'Position End Date'));
    }
    echo $this->Form->input('project_job_title', array('label' => 'Job Title', 'readonly' => $readonly));
    ?>
</fieldset>