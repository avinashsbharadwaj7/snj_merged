<fieldset>
    <legend><?php __('Project Information'); ?></legend>
    <?php
    // Autopopulate
    //echo $this->Form->input('lte_customer', array("options"=>$databaseFields->getOptions("customer_lte",4)));
    echo $this->Form->input('LitmasterVerizon.region', array("options"=>$databaseFields->getOptions("region",5)));
    ?>
</fieldset>