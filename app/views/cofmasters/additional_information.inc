<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<fieldset>
    <legend>Additional Information </legend>   
    <?php echo $this->Form->input("description", array( 'label'=>'Additional Notes', 'type'=>'textarea' ) ); ?>
    <?php echo $this->Form->input("email", array( 'label'=>'Email Addresses', 'type'=>'textarea' ) ); ?>
    <font color='red' size='1'>The email ids have to be separated with a semi-colon(;)</font>

</fieldset>