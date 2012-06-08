<fieldset>
    <legend><?php __('Project Information'); ?></legend>
    <?php
    echo $this->Form->input('Ndsmaster.lte_customer', array('label'=>'LTE Customer', "options"=>$databaseFields->getOptions("customer_lte",4)));
    echo ($this->data['Ndsmaster']['template_version'] == 1) ? $this->Form->input('Ndsmaster.lte_region', array('label'=>'Region', "options"=>$databaseFields->getOptions('lte_region',4))) : "";
    echo $this->Form->input('Ndsmaster.activity_nds', array("options"=>$databaseFields->getOptions('activity_nds',4), 'label'=>'Activity Type'));
    ?>
</fieldset>