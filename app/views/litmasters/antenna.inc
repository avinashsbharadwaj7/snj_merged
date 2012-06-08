<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>



<fieldset>
    <legend><?php __('Antenna Information'); ?></legend>
    <?php
    echo $this->Form->input('Litmaster.antenna_alarms',
                                array(
                                    'options' => $databaseFields->getOptions('yes_no_only', '4'),
                                    'label' => 'Any Alarms/Issues Related To Antenna',
                                    'type'=>'select',
                                    'onChange'=>"triggerUpdater(LitmasterAntennaAlarms, 'AntennaAlarmsPlaceholder', 'litmasters')"
                                    )
                                );
echo $this->Html->div('', null, array('id'=>'AntennaAlarmsPlaceholder'));
/* preloading previously entered values */
if(isset($this->data['Litmaster']['antenna_alarms']) && $showFields->display('antenna_alarms', $this->data['Litmaster']['antenna_alarms'])) {
     echo $this->Form->input('Litmaster.antenna_alarms_count', array('label'=>'-Number Of Issues/Alarms'));
     echo $this->Form->input('Litmaster.antenna_alarms_count_info', array('label'=>'-Issues/Alarm Information'));
}
echo "</div>";
echo $this->Form->input('Litmaster.antenna_complete',
                                array(
                                    'options' => $databaseFields->getOptions('yes_no_only', '4'),
                                    'label' => 'Antenna Work Seem Complete',
                                    'type'=>'select'
                                    )
                                );
echo $this->Form->input('Litmaster.rru_loc',
                                array(
                                    'label' => 'Location of RRU',
                                    )
                                );
echo $this->Form->input('Litmaster.conn_jump',
                                array(
                                    'label' => 'Connectors/Jumpers',
                                    )
                                );
echo $this->Form->input('Litmaster.cable_type',
                                array(
                                    'label' => 'Type of Cable (Fiber, Coax etc):',
                                    )
                                );
?>
</fieldset>
