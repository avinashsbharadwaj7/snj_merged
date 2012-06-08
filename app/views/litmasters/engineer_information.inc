<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<fieldset>
    <legend><?php __('Engineer Information'); ?></legend>
    <?php
    echo $this->Form->input('engineer_signum', array(
                                                    'readonly'=> 'readonly',
                                                    'value'=> $signum
                                                )
                                            );
    echo $this->Form->input('engineer_name', array(
                                                    'readonly'=> 'readonly',
                                                    'value'=> $name_concat
                                                )
                                            );
    echo $this->Form->input('engineer_work_location', array("options"=>$databaseFields->getOptions("work_loc",1), 'onChange'=>"triggerUpdater(" . $modelNameField . "EngineerWorkLocation, 'EngineerWorkLocationPlaceholder', " . $controllerNameField . ")"));
    echo $this->Html->div('', null, array('id'=>'EngineerWorkLocationPlaceholder'));
    /* preloading previously entered values */
    echo (isset($this->data[$modelNameField]['engineer_work_location']) && $showFields->display('engineer_work_location', $this->data[$modelNameField]['engineer_work_location'])) ? $this->Form->input('work_location_remote', array('label'=>'-Please Specify')): "";
    echo "</div>";
    echo $this->Form->input('team_name', array('value'=>$teamNameField, 'readonly'=>'readonly'));
    ?>
</fieldset>