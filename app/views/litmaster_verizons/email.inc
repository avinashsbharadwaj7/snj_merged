<fieldset>
    <legend><?php __('Email Addresses of Recipients'); ?></legend>
<?php
    echo "<div class='paginator_col_inner_alt'>Please separate multiple addresses by semi-colons.</div>";
    echo $this->Form->input('LitmasterVerizon.email', array( 'label'=>'Email Addresses'));
?>
</fieldset>
