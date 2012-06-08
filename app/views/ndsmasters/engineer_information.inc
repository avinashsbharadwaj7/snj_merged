<fieldset>
    <legend><?php __('Engineer Information'); ?></legend>
    <?php
    echo $this->Form->input('Ndsmaster.engineer_signum', array(
                                                    'readonly'=> 'readonly',
                                                    'value'=> $signum
                                                )
                                            );
    echo $this->Form->input('Ndsmaster.engineer_name', array(
                                                    'readonly'=> 'readonly',
                                                    'value'=> $name_concat
                                                )
                                            );
    echo $this->Form->input('Ndsmaster.engineer_work_location', array("options"=>$databaseFields->getOptions("work_loc",1), 'onChange'=>"triggerUpdater(" . $modelNameField . "EngineerWorkLocation, 'EngineerWorkLocationPlaceholder', " . $controllerNameField . ")"));
    echo $this->Html->div('', null, array('id'=>'EngineerWorkLocationPlaceholder'));
    /* preloading previously entered values */
    echo (isset($this->data[$modelNameField]['engineer_work_location']) && $showFields->display('engineer_work_location', $this->data[$modelNameField]['engineer_work_location'])) ? $this->Form->input('Ndsmaster.work_location_remote', array('label'=>'-Please Specify')): "";
    echo "</div>";
    echo $this->Form->input('Ndsmaster.team_name', array('value'=>$teamNameField, 'readonly'=>'readonly'));
    ?>
</fieldset>