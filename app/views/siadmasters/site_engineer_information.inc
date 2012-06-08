<fieldset>
    <legend><?php __('Engineer Information'); ?></legend>
    <?php
    echo $this->Form->input('Siadsite.engineer_signum', array(
                                                    'readonly'=> 'readonly',
                                                    'value'=> $signum
                                                )
                                            );
    echo $this->Form->input('Siadsite.engineer_name', array(
                                                    'readonly'=> 'readonly',
                                                    'value'=> $name_concat
                                                )
                                            );
    echo $this->Form->input('Siadsite.team_name', array('value'=>$teamNameField, 'readonly'=>'readonly'));
    ?>
</fieldset>