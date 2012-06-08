<fieldset>
    <legend><?php __('Project Information'); ?></legend>
    <?php
    echo $this->Form->input('LitmasterVerizon.region', array("options"=>$databaseFields->getOptions("region",6)));
    ?>
</fieldset>