<?php echo $html->css(array('rnc/style', 'rnc/view', 'rnc/css_menu', 'rnc/bcp')); ?>
<div class="RfModules form">
    <?php
    echo $this->Form->create('RfV2Module', array('action' => 'edit'));
    echo $form->input('editId', array("label" => "Enter the ID:"));
    echo $this->Form->end(__('Submit', true));
    ?>
</div>