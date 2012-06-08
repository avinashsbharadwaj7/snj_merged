 <fieldset>
    <h4>Project Information</h4>
    <div>
    <?php
    echo $this->Form->input("customer", array( 'value' => $modify_fields['customer'],'READONLY' => true, 'label'=>'Customer', 'id' => 'customer','type'=>'text') );
    
    echo $this->Form->input("network_number", array( 'value' => $modify_fields['network_number'] ,'READONLY' => $check,'label'=>'Network Number', 'maxlength' => '8','type'=>'text' ) );
    echo $this->Form->input("project_manager", array( 'value' => $modify_fields['project_manager'] ,'READONLY' => $check,'label'=>'Project Manager', 'type'=>'text' ) );
    echo $this->Form->input("sdm", array( 'value' => $modify_fields['sdm'] ,'READONLY' => $check,'label'=>'SDM', 'type'=>'text' ) );
    ?>
    
  
   <?php 
   if($check == false)
   echo $this->Form->input("region", array( 'value' => $modify_fields['region'],'options' => ($tmobileSpecific->populatedropdown('region', '2')),'empty' => '', 'label'=>'Region', 'id'=>'region' ,'type'=>'select' ) );
   else
     echo $this->Form->input("region", array( 'READONLY' => true, 'value' => $modify_fields['region'], 'label'=>'Region', 'id'=>'region' ) );  
   ?>
    

   <?php 
   if($check==false)
   echo $this->Form->input("technology", array('value' => $modify_fields['technology'], 'options' => ($tmobileSpecific->populatedropdown('technology', '2')),'empty' => '', 'label'=>'Technology', 'type'=>'select' ) );
   else
   echo $this->Form->input("technology", array( 'READONLY' => true,'value' => $modify_fields['technology'], 'label'=>'Technology' ) );
   ?>
   <?php
    echo $this->Form->input("tcm_name_signum", array('READONLY' => true, 'value' => $modify_fields['tcm_name_signum'] , 'label'=>'ATND/TCM Engineer Name (Signum)', 'type'=>'text' ) );
    echo $this->Form->hidden("tcm_signum", array('value' => $modify_fields['tcm_signum'] , 'type'=>'text' ) );   
   ?>
   
     <?php 
     if($check == false)
     echo $datePicker->picker('date_activity_performed',array('value' => $modify_fields['date_activity_performed'],'label'=>'Date Activity Performed', 'READONLY' => true, 'style'=>'background-color:#F6F6CC;  width:auto;'));
     else
      echo $this->Form->input('date_activity_performed',array('READONLY' => true,'value' => $modify_fields['date_activity_performed'],'label'=>'Date Activity Performed', 'READONLY' => true, 'type'=>'text'));
     ?>
   
    <?php 
    if($check==false)
    echo $this->Form->input("access_method", array( 'value' => $modify_fields['access_method'],'options' => $tmobileSpecific->populatedropdown('access_method','2'),'empty' => '', 'label'=>'Access Method Used', 'type'=>'select', 'onchange'=>'accessmethodChanged()', 'id'=>'access_method' ) );
    else
        echo $this->Form->input("access_method", array('READONLY' => true,'value' => $modify_fields['access_method'],'label'=>'Access Method Used','id'=>'access_method','type'=>'text' ) )
     ?>
        
    <div id='Div_AccessMethod_Sonar'>
     <?php echo $this->Form->input("access_method_sonar", array( 'READONLY' => $check,'label'=>'Reason Why Sonar Was Used', 'type'=>'textarea' ) );?>
    </div>
    
    <?php
    if($check==false)
    echo $this->Form->input("mop_used", array( 'value' => $modify_fields['mop_used'],'options' => $tmobileSpecific->populatedropdown('mop_used','2'), 'label'=>'Was a MOP used', 'empty' => '','onchange'=>'mopused()','type'=>'select', 'id'=>'mop_used' ) );
    else
     echo $this->Form->input("mop_used", array( 'READONLY' => true,'value' => $modify_fields['mop_used'], 'label'=>'Was a MOP used', 'type'=>'text', 'id'=>'mop_used' ) );  
    ?>
        
    <div id='Div_MOPUsed_Version'>
    <?php echo $this->Form->input("mop_version", array( 'READONLY' => $check,'label'=>'MOP Version', 'type'=>'text' ) );   ?>

    <?php 
    if($check==false)
    echo $this->Form->input("mop_problem", array( 'value' => $modify_fields['mop_problem'],'options' => $tmobileSpecific->populatedropdown('mop_problem','2'), 'label'=>'MOP Problems Encountered', 'empty' => '','type'=>'select','id'=>'mop_problem', "onchange"=>"javascript:mop_problem_check();" ) );
    else
    echo $this->Form->input("mop_problem", array( 'READONLY' => true,'value' => $modify_fields['mop_problem'], 'label'=>'MOP Problems Encountered','id'=>'mop_problem' ) );
    ?>
    </div>
    <div id='Div_MOPProblem_Desc'>
    <?php echo $this->Form->input("mop_problem_description", array( 'READONLY' => $check,'label'=>'Please Describe The Problems', 'type'=>'textarea' ) );?>
    </div>
    </div>
 </fieldset>