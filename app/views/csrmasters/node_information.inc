<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
 <fieldset>
    <h4>Project Information</h4>
    <?php
    echo $this->Form->input('csr_type', array( 'label'=>'CSR Type' ) );
    echo $this->Form->input('customer', array( 'label'=>'Customer' ) );
    echo $this->Form->input('network_type', array( 'label'=>'Network Type' ) );
    echo $this->Form->input('node_type', array( 'label'=>'Node Type' ) );
    echo $this->Form->input('sub_product', array( 'label'=>'Sub Product' ) );
    echo $this->Form->input('site_name', array( 'label'=>'Site Name' ) ); 
    echo $this->Form->input('node_details', array( 'label'=>'Node Details' ) ); 
    echo $this->Form->input('software_level', array( 'label'=>'Software Level' ) ); 
    ?>
 </fieldset>