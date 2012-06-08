<fieldset>
    <legend><?php __('Project Information'); ?></legend>
    <?php
    echo $this->Form->input('Siadsite.lte_customer', array('label'=>'LTE Customer', "options"=>$databaseFields->getOptions("customer_lte",4)));
    echo $this->Form->input('Siadsite.lte_region', array('label'=>'Region', "options"=>$databaseFields->getOptions('lte_region',4)));
    ?>
</fieldset>