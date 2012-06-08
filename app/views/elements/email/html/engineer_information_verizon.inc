<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<fieldset>
    <legend><?php __('Engineer Information'); ?></legend>
    <?php
    echo $this->Form->input('LitmasterVerizon.engineer_signum', array(
                                                    'readonly'=> 'readonly',
                                                    'value'=> $signum
                                                )
                                            );
    echo $this->Form->input('LitmasterVerizon.engineer_name', array(
                                                    'readonly'=> 'readonly',
                                                    'value'=> $name_concat
                                                )
                                            );
    echo $this->Form->input('LitmasterVerizon.engineer_work_location', array("options"=>$databaseFields->getOptions("work_loc",5)));
    echo $this->Html->div('', null, array('id'=>'EngineerWorkLocationPlaceholder'));
//    /* preloading previously entered values */
//    echo (isset($this->data[$modelNameField]['engineer_work_location']) && $showFields->display('engineer_work_location', $this->data[$modelNameField]['engineer_work_location'])) ? $this->Form->input('work_location_remote', array('label'=>'-Please Specify')): "";
    echo "</div>";
//    echo $this->Form->input('LitmasterVerizon.team_name', array('value'=>$teamNameField, 'readonly'=>'readonly'));
    ?>
</fieldset>