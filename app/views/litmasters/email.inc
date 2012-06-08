<fieldset>
    <legend><?php __('Email Addresses of Recipients'); ?></legend>
<?php
//    echo $this->Form->input('sendEmail', array('label'=>'Send Email Notification', 'type'=>'checkbox'));
//    echo "<div style='padding:3px;'></div>";
    echo "<div class='paginator_col_inner_alt'><i>Please separate multiple addresses by semi-colons</i>.</div>";
    echo $this->Form->input("email", array( 'label'=>'Email Addresses'));
?>
</fieldset>
