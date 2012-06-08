<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * LTE file
 */
?>

<fieldset>
    <legend><?php __('Basic Information'); ?></legend>
<?php
echo $this->Form->input('date_initiated', array("label"=>"Date", "type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
?>