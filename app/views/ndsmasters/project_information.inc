<fieldset>
    <legend><?php __('Project Information'); ?></legend>
    <?php
    $customer = $this->Session->read('lte_customer');
//    echo $this->Form->input('Ndsmaster.lte_customer', array('label'=>'LTE Customer', "options"=>$databaseFields->getOptions("customer_lte",4)));
    echo $this->Form->input('Ndsmaster.lte_customer', array('label'=>'LTE Customer', 'value'=>$customer, 'readonly'=>'readonly'));
    echo "<div class='paginator_col_inner_alt'><i>**NOTE: If Troubleshooting, use the template with the 'Region' column, and leave this Region dropdown blank.</i></div>";
    echo $this->Form->input('Ndsmaster.lte_region', array('label'=>'Region**', "options"=>$databaseFields->getOptions('region',4)));
    echo $this->Form->input('Ndsmaster.network_number', array('label'=>'Network Number'));
    echo $this->Form->input('Ndsmaster.activity_nds', array("options"=>$databaseFields->getOptions('activity_nds',4), 'label'=>'Activity Type'));
    echo $this->Form->input('Ndsmaster.time_taken_for_activity', array('label'=>'Time Taken For Activity', 'placeholder'=>'HH:MM'));
    ?>
</fieldset>