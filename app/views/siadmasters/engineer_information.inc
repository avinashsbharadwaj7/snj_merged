<fieldset>
    <legend><?php __('Engineer Information'); ?></legend>
    <?php
    echo $this->Form->input('Siadmaster.engineer_signum', array(
                                                    'readonly'=> 'readonly',
                                                    'value'=> $signum
                                                )
                                            );
    echo $this->Form->input('Siadmaster.engineer_name', array(
                                                    'readonly'=> 'readonly',
                                                    'value'=> $name_concat
                                                )
                                            );
    echo $this->Form->input('Siadmaster.team_name', array('value'=>$teamNameField, 'readonly'=>'readonly'));
    ?>
</fieldset>