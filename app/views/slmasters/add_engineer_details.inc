<fieldset>
    <h4>Engineer Details</h4>
    <?php
    
    echo $this->Form->input("nic_signum", array( 'READONLY' => true, 'value'=>$signum,'label'=>'NIC Engineer Signum', 'type'=>'text' ) );
    echo $this->Form->input("nic_name", array( 'READONLY' => true, 'value'=>$name, 'label'=>'NIC Engineer Name', 'type'=>'text' ) );

    //Work Location
    echo $this->Form->input("work_location", array( 'options' => getDropdown('work_location',$dropdown_fields),'empty' => '', 'label'=>'Work Location', 'id'=>'work_location', 'type'=>'select' ) );
    echo "<span id='Div_WorkLocation_Other'>";
    echo $this->Form->input("work_location_other", array( 'label'=>'Please Specify', 'type'=>'text' ) );
    echo "</span>";
    //
    ?>
</fieldset>