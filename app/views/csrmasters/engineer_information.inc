<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
$signum = Authsome::get('username');
$name_concat = Authsome::get('first_name') . ' ' . Authsome::get('last_name');
?>

 <fieldset>
    <h4>Engineer Information</h4>
    <?php
    echo $this->Form->input('nic_name', array( "label"=>"Engineer Name",
                                               "readonly"=> "readonly",
                                               "value"=> $name_concat ) );
    echo $this->Form->input('nic_signum', array( "label"=>"Engineer Signum", 
                                                 "readonly"=> "readonly",
                                                 "value"=> $signum ) );
    echo $this->Form->input('project_name', array( "label"=>"Project Name" ) );
    echo $this->Form->input('csr_number', array( "label"=>"CSR Number" ) );
    echo $this->Form->input('network_number', array( "label"=>"Network Number", "minlength" =>"8") );
    echo $this->Form->input('project_manager', array( "label"=>"Project Manager" ) ); 
    ?>
 </fieldset>