<fieldset>
    <h4>Engineer Details</h4>
    <?php
    
    echo $this->Form->input("nic_signum", array( 'READONLY' => true,'value' => $modify_fields['nic_signum'],'label'=>'NIC Engineer Signum', 'type'=>'text' ) );
    echo $this->Form->input("nic_name", array( 'READONLY' => true, 'value' => $modify_fields['nic_name'],'label'=>'NIC Engineer Name', 'type'=>'text' ) );

    //Work Location
    if($check != true)
        echo $this->Form->input("work_location", array( 'options' => getDropdown('work_location',$dropdown_fields), 'value' => $modify_fields['work_location'],'empty' => '', 'label'=>'Work Location', 'id'=>'work_location', 'type'=>'select' ) );
    else
        echo $this->Form->input("work_location", array( 'READONLY' => $check, 'value' => $modify_fields['work_location'], 'type'=>'text','label'=>'Work Location', 'id'=>'work_location' ) );

    echo "<span id='Div_WorkLocation_Other'>";
    echo $this->Form->input("work_location_other", array( 'READONLY' => $check,'label'=>'Please Specify', 'value' => $modify_fields['work_location_other'], 'type'=>'text' ) );
    echo "</span>";
    //
    ?>
</fieldset>