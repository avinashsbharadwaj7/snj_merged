<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<fieldset>
    <legend><?php __('Data Test Result (Get this information from the on site engineer)'); ?></legend>
<?php
    echo $this->Form->input('Litmaster.sector_a_uplink');
    echo $this->Form->input('Litmaster.sector_a_downlink');
                                
    echo $this->Form->input('Litmaster.sector_b_uplink');
    echo $this->Form->input('Litmaster.sector_b_downlink');
    echo $this->Form->input('Litmaster.sector_c_uplink');
    echo $this->Form->input('Litmaster.sector_c_downlink');

    echo $this->Form->input('Litmaster.screen_shot',
                                array(
                                    'options' => ($databaseFields->getOptions('yes_no_only', '4')),
                                    'label'=>'Were Screenshots Taken And Sent To PM',
                                    'type'=>'select',
                                    )
                                );
?>
</fieldset>
