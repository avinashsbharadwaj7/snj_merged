<fieldset>
    <h4>Project Information</h4>

	<?php
	$yes_no = array('Yes'=>'Yes','No'=>'No','NA'=>'NA');
    echo $this->Form->input('organization', array('type'=>'select', 'options'=>array(""=>"", "LDO NIC"=>"LDO NIC", "RAN E&O Integration"=>"RAN E&O Integration", "RAN E&O NDS"=>"RAN E&O NDS")));        
    echo $this->Form->input("customer", array( 'options' => $this->ntpdropdownLogics->getDropdown('customer',$dropdown_fields), 'label'=>'Customer', 'type'=>'select', 'id' => 'customer') );
    echo $this->Form->input("network_number", array( 'label'=>'Network Number', 'maxlength' => '8','type'=>'text' ) );   
    echo $this->Form->input("region", array( 'options' => $this->ntpdropdownLogics->getDropdown('region',$dropdown_fields),'empty' => '', 'label'=>'Region', 'id'=>'region' ,'type'=>'select' ) );
    echo $this->Form->input("market", array( 'label'=>'Market' ,'type'=>'text' ) );
    
	echo $datePicker->picker('date_integration_scheduled',array('label'=>'Date Integration Scheduled', 'READONLY' => true, 'style'=>'background-color:#F6F6CC;  width:auto;'));
	echo $this->Form->input("rnc", array( 'label'=>'RNC' ,'type'=>'text' ) );
    echo $this->Form->input("site_main_cabinet", array( 'label'=>'Site Name - Main Cabinet' ,'type'=>'text' ) );
    echo $this->Form->input("site_secondary_cabinet", array( 'label'=>'Site Name - Secondary Cabinet' ,'type'=>'text' ) );
    
	echo $this->Form->input("csb_number", array( 'label'=>'CSB Number', 'type'=>'text' ) );   
    echo $this->Form->input("csb_check", array( 'options'=>$yes_no,'label'=>'CSB Okay', 'type'=>'select','empty' =>'','id'=>'csb_check') );   
	echo "<span id='CSB_container'>";
		echo $this->Form->input("csb_issue", array( 'label'=>'CSB Issue', 'type'=>'textarea' ) );   
	echo "</span>";
   
	
    ?>
</fieldset>