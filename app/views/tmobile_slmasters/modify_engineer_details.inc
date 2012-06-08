<fieldset>
    <h4>Engineer Details</h4>
    <div>
    <?php
    
    echo $this->Form->input("nic_signum", array( 'READONLY' => true, 'value'=> $modify_fields['nic_signum'],'label'=>'NIC Engineer Signum', 'type'=>'text' ) );
    echo $this->Form->input("nic_name", array( 'READONLY' => true, 'value'=> $modify_fields['nic_name'] ,'label'=>'NIC Engineer Name', 'type'=>'text' ) );?>
 
    <?php if($signum == $modify_fields['nic_signum'])
    {
        $check = false;
    }
    else
    {
        $check = true;
    }
    
    ?>
    <?php if($check == false) {
    echo $this->Form->input("work_location", array('options' => $tmobileSpecific->populatedropdown('work_location','2'),'value' => $modify_fields['work_location'],'empty' => '', 'label'=>'Work Location','onchange'=>'worklocationChanged()', 'id'=>'work_location_tmobile', 'type'=>'select' ) );
    }
    else
    {
       echo $this->Form->input("work_location", array('READONLY' =>  true,'value' => $modify_fields['work_location'],'empty' => '', 'label'=>'Work Location', 'id'=>'work_location_tmobile' ) ); 
    }
    ?>
        <div id='Div_TmobileWorkLocation_Other'>
    <?php echo $this->Form->input("work_location_other", array('READONLY' =>  $check, 'label'=>'Please Specify', 'type'=>'text' ) );?>
    </div>
    </div>
</fieldset>