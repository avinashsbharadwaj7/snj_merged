<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

    <?php
       // echo $this->Form->input('id', array("label"=>"Report Number", "readonly"=>"readonly"));
        echo $this->Form->input('date_initiated', array("label"=>"Date", "type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
    ?>

