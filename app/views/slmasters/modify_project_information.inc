<fieldset>
    <h4>Project Information</h4>
    <?php
    echo $this->Form->input('organization', array('type'=>'select', 'options'=>array(""=>"", "LDO NIC"=>"LDO NIC", "RAN E&O Integration"=>"RAN E&O Integration", "RAN E&O NDS"=>"RAN E&O NDS")));    
    if($check != true)       
        echo $this->Form->input("customer", array( 'options' => getDropdown('customer',$dropdown_fields),'value' => $modify_fields['customer'], 'label'=>'Customer', 'type'=>'select' ) );
    else
        echo $this->Form->input("customer", array( 'READONLY' => $check, 'value' => $modify_fields['customer'], 'type'=>'text','label'=>'Customer', 'id'=>'customer' ) );

    echo $this->Form->input("network_number", array( 'READONLY' => $check,'value' => $modify_fields['network_number'],'label'=>'Network Number', 'maxlength' => '8','type'=>'text' ) );
    echo $this->Form->input("project_manager", array( 'READONLY' => $check,'value' => $modify_fields['project_manager'],'label'=>'Project Manager', 'type'=>'text' ) );
    echo $this->Form->input("sdm", array( 'READONLY' => $check,'value' => $modify_fields['sdm'],'label'=>'SDM', 'type'=>'text' ) );

    echo "<span id='Div_Region'>";
    if($check != true)
        echo $this->Form->input("region", array('options' => getDropdown('region',$dropdown_fields),'empty' => '', 'value' => $modify_fields['region'], 'label'=>'Region', 'id'=>'region' ,'type'=>'select' ) );
    else
        echo $this->Form->input("region", array( 'READONLY' => $check, 'value' => $modify_fields['region'], 'type'=>'text','label'=>'Region', 'id'=>'region' ) );
    echo "</span>";

    if($check != true)
        echo $this->Form->input("technology", array('options' => getDropdown('technology',$dropdown_fields),'empty' => '','value' => $modify_fields['technology'], 'label'=>'Technology', 'type'=>'select' ) );
    else
        echo $this->Form->input("technology", array( 'READONLY' => $check, 'value' => $modify_fields['technology'], 'type'=>'text','label'=>'Technology', 'id'=>'technology' ) );

    echo $this->Form->input("tcm_name_signum", array('READONLY' => true, 'value' => $modify_fields['tcm_name_signum'] , 'label'=>'ATND/TCM Engineer Name (Signum)', 'type'=>'text' ) );
    echo $this->Form->hidden("tcm_signum", array('value' => $modify_fields['tcm_signum'] , 'type'=>'text' ) );
     
    if($check != true)
        echo $datePicker->picker('date_activity_performed',array('value' => $modify_fields['date_activity_performed'],'label'=>'Date Activity Performed', 'READONLY' => true, 'style'=>'background-color:#F6F6CC;  width:auto;'));
    else
        echo $this->Form->input('date_activity_performed',array('value' => $modify_fields['date_activity_performed'],'label'=>'Date Activity Performed', 'type'=>'text','READONLY' => true));

    //Access Method
    if($check != true)
       echo $this->Form->input("access_method", array('options' => getDropdown('access_method',$dropdown_fields),'empty' => '', 'value' => $modify_fields['access_method'],'label'=>'Access Method Used', 'type'=>'select', 'id'=>'access_method' ) );
    else
        echo $this->Form->input("access_method", array( 'READONLY' => $check, 'value' => $modify_fields['access_method'], 'type'=>'text','label'=>'Access Method', 'id'=>'access_method' ) );

    echo "<span id='Div_AccessMethod_Sonar'>";
    echo $this->Form->input("access_method_sonar", array('READONLY' => $check, 'value' => $modify_fields['access_method_sonar'],'label'=>'Reason Why Sonar Was Used', 'type'=>'textarea' ) );
    echo "</span>";
    //

    //MOP Used
    if($check != true)
       echo $this->Form->input("mop_used", array('options' => getDropdown('mop_used',$dropdown_fields),'value' => $modify_fields['mop_used'], 'label'=>'Was a MOP used', 'empty' => '','type'=>'select', 'id'=>'mop_used' ) );
    else
        echo $this->Form->input("mop_used", array( 'READONLY' => $check, 'value' => $modify_fields['mop_used'], 'type'=>'text','label'=>'Was a MOP used', 'id'=>'mop_used' ) );

    echo "<span id='Div_MOPUsed_Version'>";
    echo $this->Form->input("mop_version", array( 'READONLY' => $check,'value' => $modify_fields['mop_version'],'label'=>'MOP Version', 'type'=>'text' ) );
    //
    //MOP Problems
    if($check != true)
      echo $this->Form->input("mop_problem", array('options' => getDropdown('mop_problem',$dropdown_fields),'value' => $modify_fields['mop_problem'], 'label'=>'MOP Problems Encountered', 'empty' => '','type'=>'select','id'=>'mop_problem' ) );
    else
        echo $this->Form->input("mop_problem", array( 'READONLY' => $check, 'value' => $modify_fields['mop_problem'], 'type'=>'text','label'=>'MOP Problems Encountered', 'id'=>'mop_problem' ) );

    echo "<span id='Div_MOPProblem_Desc'>";
    echo $this->Form->input("mop_problem_description", array('READONLY' => $check, 'value' => $modify_fields['mop_problem_description'],'label'=>'Please Describe The Problems', 'type'=>'textarea' ) );
    echo "</span>";
    echo "</span>";
    //
    ?>
 </fieldset>