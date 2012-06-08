<fieldset>
    <legend><?php __('Project Information'); ?></legend>
    <?php
    // Autopopulate
    echo $this->Form->input('lte_customer', array('readonly'=>'readonly', 'value'=>$this->data['Litmaster']['lte_customer']));
    echo $this->Form->input('region', array("options"=>$databaseFields->getOptions("region",1)));
    ?>
</fieldset>