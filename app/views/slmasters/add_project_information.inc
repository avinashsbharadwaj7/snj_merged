 <fieldset>
    <h4>Project Information</h4>
    <?php
    echo $this->Form->input('organization', array('type'=>'select', 'options'=>array(""=>"", "LDO NIC"=>"LDO NIC", "RAN E&O Integration"=>"RAN E&O Integration", "RAN E&O NDS"=>"RAN E&O NDS")));    
    echo $this->Form->input("customer", array( 'value' => 'AT&T','READONLY' => true, 'label'=>'Customer', 'id' => 'customer','type'=>'text') );
    echo $this->Form->input("network_number", array( 'label'=>'Network Number', 'maxlength' => '8','type'=>'text' ) );
    echo $this->Form->input("project_manager", array( 'label'=>'Project Manager', 'type'=>'text' ) );
    echo $this->Form->input("sdm", array( 'label'=>'SDM', 'type'=>'text' ) );
    
    echo "<span id='Div_Region'>";
    echo $this->Form->input("region", array( 'options' => getDropdown('region',$dropdown_fields),'empty' => '', 'label'=>'Region', 'id'=>'region' ,'type'=>'select' ) );
    echo "</span>";

    echo $this->Form->input("technology", array( 'options' => getDropdown('technology',$dropdown_fields),'empty' => '', 'label'=>'Technology', 'type'=>'select' ) );
   echo $this->Form->hidden("tcm_name_signum", array('id' => 'tcm_name_signum' ) );
    
    ?>

    <span id='tcm_central'>
    <?php
    echo $this->Form->input("tcm_name_signum_C", array( 'options' => $tcm_temp_C,'empty' => '', 'label'=>'ATND/TCM Engineer Name (Signum)', 'type'=>'select', 'id' => 'tcm_name_signum_C' ) );
    ?>
    </span>
    <span id='tcm_east'>
    <?php
    echo $this->Form->input("tcm_name_signum_E", array( 'options' => $tcm_temp_E,'empty' => '', 'label'=>'ATND/TCM Engineer Name (Signum)', 'type'=>'select', 'id' => 'tcm_name_signum_E' ) );
    ?>
    </span>
    <span id='tcm_west'>
    <?php
    echo $this->Form->input("tcm_name_signum_W", array( 'options' => $tcm_temp_W,'empty' => '', 'label'=>'ATND/TCM Engineer Name (Signum)', 'type'=>'select', 'id' => 'tcm_name_signum_W' ) );
    ?>
    </span>   
        
    
    <?php
	
    echo $datePicker->picker('date_activity_performed',array('label'=>'Date Activity Performed', 'READONLY' => true, 'style'=>'background-color:#F6F6CC;  width:auto;'));


    //Access Method
    echo $this->Form->input("access_method", array( 'options' => getDropdown('access_method',$dropdown_fields),'empty' => '', 'label'=>'Access Method Used', 'type'=>'select', 'id'=>'access_method' ) );
    echo "<span id='Div_AccessMethod_Sonar'>";
    echo $this->Form->input("access_method_sonar", array( 'label'=>'Reason Why Sonar Was Used', 'type'=>'textarea' ) );
    echo "</span>";
    //

    //MOP Used
    echo $this->Form->input("mop_used", array( 'options' => getDropdown('mop_used',$dropdown_fields), 'label'=>'Was a MOP used', 'empty' => '','type'=>'select', 'id'=>'mop_used' ) );
    echo "<span id='Div_MOPUsed_Version'>";
    echo $this->Form->input("mop_version", array( 'label'=>'MOP Version', 'type'=>'text' ) );   
    //
    //MOP Problems
    echo $this->Form->input("mop_problem", array( 'options' => getDropdown('mop_problem',$dropdown_fields), 'label'=>'MOP Problems Encountered', 'empty' => '','type'=>'select','id'=>'mop_problem' ) );
    echo "<span id='Div_MOPProblem_Desc'>";
    echo $this->Form->input("mop_problem_description", array( 'label'=>'Please Describe The Problems', 'type'=>'textarea' ) );
    echo "</span>";
    echo "</span>";
    //
    ?>
 </fieldset>