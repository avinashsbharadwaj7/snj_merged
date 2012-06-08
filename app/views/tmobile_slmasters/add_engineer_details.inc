<fieldset>
    <h4>Engineer Details</h4>
    <div>
    <?php
    echo $this->Form->input("nic_signum", array( 'READONLY' => true, 'value'=> $tmobileSpecific->getsignum(),'label'=>'NIC Engineer Signum', 'type'=>'text' ) );
    echo $this->Form->input("nic_name", array( 'READONLY' => true, 'value'=> $tmobileSpecific->getname(), 'label'=>'NIC Engineer Name', 'type'=>'text' ) );?>

    
    <?php echo $this->Form->input("work_location", array( 'options' => $tmobileSpecific->populatedropdown('work_location','2'),'empty' => '', 'label'=>'Work Location', 'id'=>'work_location_tmobile','onchange'=>'worklocationChanged()', 'type'=>'select' ) );?>
    <div id='Div_TmobileWorkLocation_Other'>
    <?php echo $this->Form->input("work_location_other", array( 'label'=>'Please Specify', 'type'=>'text' ) );?>
    </div>
    </div>
</fieldset>