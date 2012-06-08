<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//$yes_no = array("","Yes"=>"Yes","No"=>"No");
?>


<fieldset>
    <legend><?php __('Site Integration Status'); ?></legend>
<?php
    echo $this->Form->input('LitmasterVerizon.integration_complete',
                                array(
                                    'type'=>'checkbox',
                                    )
                                );
//    echo $this->Form->input('Litmaster_verizon.integration_completed_by', array('type'=>'text'));
    echo $this->Form->input('LitmasterVerizon.ready_for_tuning',
                                array(
                                    'type'=>'checkbox',
                                    )
                                );
//    echo $this->Form->input('Litmaster_verizon.ready_for_tuning_by', array('type'=>'text'));
    echo $this->Form->input('LitmasterVerizon.ready_for_service',
                                array(
                                    'type'=>'checkbox',
                                    )
                                );
//    echo $this->Form->input('Litmaster_verizon.ready_for_service_by', array('type'=>'text'));
//    echo $this->Form->input('Litmaster_verizon.object_creation_date', array('type'=>'date'));
//    echo $this->Form->input('Litmaster_verizon.object_update_date', array('type'=>'date'));
//    echo $this->Form->input('Litmaster_verizon.object_creation_user_real_name', array('type'=>'text'));
//    echo $this->Form->input('Litmaster_verizon.object_update_user_real_name', array('type'=>'text'));
    
?>
</fieldset>
