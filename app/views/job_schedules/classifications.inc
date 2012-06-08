<fieldset>
    <legend><?php __('Classifications'); ?></legend>
    <?php
    echo $this->Form->input('delivery_source', array('label'=>'Source', 'readonly'=>$readonly));
    echo $this->Form->input('sap_mus_id', array('label'=>'SAP-MUS ID (Project)', 'type'=>'text', 'readonly'=>$readonly));
    ?>
</fieldset>