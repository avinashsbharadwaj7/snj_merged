 <fieldset>
    <h4>Project Information</h4>
    <div>
    <?php
    echo $this->Form->input("customer", array( 'value' => 'T-Mobile','READONLY' => true, 'label'=>'Customer', 'id' => 'customer','type'=>'text') );
    echo $this->Form->input("network_number", array( 'label'=>'Network Number', 'maxlength' => '8','type'=>'text' ) );
    echo $this->Form->input("project_manager", array( 'label'=>'Project Manager', 'type'=>'text' ) );
    echo $this->Form->input("sdm", array( 'label'=>'SDM', 'type'=>'text' ) ); ?>
    
  
   <?php echo $this->Form->input("region", array( 'options' => ($tmobileSpecific->populatedropdown('region', '2')),'empty' => '', 'label'=>'Region', 'id'=>'region' ,'type'=>'select' ,'onchange'=>'regionChanged()') );?>
    

  <?php echo $this->Form->input("technology", array( 'options' => ($tmobileSpecific->populatedropdown('technology', '2')),'empty' => '', 'label'=>'Technology', 'type'=>'select' ) );?>
      
  <?php echo $this->Form->hidden("tcm_name_signum", array('id' => 'tcm_name_signum' ) ); ?>
    
    
    <div id='tcm_central'>
    <?php
    echo $this->Form->input("tcm_name_signum_C", array( 'options' => $tcm_temp_C,'empty' => '', 'label'=>'ATND/TCM Engineer Name (Signum)', 'type'=>'select', 'id' => 'tcm_name_signum_C' ) );
    ?>
    </div>
    <div id='tcm_east'>
    <?php
    echo $this->Form->input("tcm_name_signum_E", array( 'options' => $tcm_temp_E,'empty' => '', 'label'=>'ATND/TCM Engineer Name (Signum)', 'type'=>'select', 'id' => 'tcm_name_signum_E' ) );
    ?>
    </div>
    <div id='tcm_west'>
    <?php
    echo $this->Form->input("tcm_name_signum_W", array( 'options' => $tcm_temp_W,'empty' => '', 'label'=>'ATND/TCM Engineer Name (Signum)', 'type'=>'select', 'id' => 'tcm_name_signum_W' ) );
    ?>
    </div>   
             
        
        
        
     <?php echo $datePicker->picker('date_activity_performed',array('label'=>'Date Activity Performed', 'READONLY' => true, 'style'=>'background-color:#F6F6CC;  width:auto;'));?>
   
    <?php echo $this->Form->input("access_method", array( 'options' => $tmobileSpecific->populatedropdown('access_method','2'),'empty' => '', 'label'=>'Access Method Used', 'type'=>'select','onchange'=>'accessmethodChanged()', 'id'=>'access_method' ) );?>
    <div id='Div_AccessMethod_Sonar'>
     <?php echo $this->Form->input("access_method_sonar", array( 'label'=>'Reason Why Sonar Was Used', 'type'=>'textarea' ) );?>
    </div>
    
    <?php echo $this->Form->input("mop_used", array( 'options' => $tmobileSpecific->populatedropdown('mop_used','2'), 'label'=>'Was a MOP used', 'empty' => '','type'=>'select','onchange'=>'mopused()', 'id'=>'mop_used' ) );?>
    <div id='Div_MOPUsed_Version'>
    <?php echo $this->Form->input("mop_version", array( 'label'=>'MOP Version', 'type'=>'text' ) );   ?>

    <?php echo $this->Form->input("mop_problem", array( 'options' => $tmobileSpecific->populatedropdown('mop_problem','2'), 'label'=>'MOP Problems Encountered', 'empty' => '','type'=>'select','id'=>'mop_problem', "onchange"=>"javascript:mop_problem_check();" ) );?>
    </div>
    <div id='Div_MOPProblem_Desc'>
    <?php echo $this->Form->input("mop_problem_description", array( 'label'=>'Please Describe The Problems', 'type'=>'textarea' ) );?>
    </div>
    </div>
 </fieldset>