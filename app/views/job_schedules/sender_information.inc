<fieldset>
    <legend><?php __('Sender Information'); ?></legend>
    <?php
    echo $this->Form->input('sender_info_signum', array('label'=>'Signum', 'value'=>$signum, 'readonly'=>true));
    echo $this->Form->input('sender_info_name', array('label'=>'Name', 'value'=>$name_concat, 'readonly'=>true));
    echo $this->Form->input('sender_info_comments', array('label'=>'Comments', 'readonly'=>$readonly));
    ?>
</fieldset>