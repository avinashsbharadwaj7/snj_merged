<fieldset>
    <h4>Project Information</h4>

	<?php
	$yes_no = array('Yes'=>'Yes','No'=>'No');
echo $this->Form->input('organization', array('type'=>'select', 'options'=>array(""=>"", "LDO NIC"=>"LDO NIC", "RAN E&O Integration"=>"RAN E&O Integration", "RAN E&O NDS"=>"RAN E&O NDS")));        
	echo $this->Form->input("week", array( 'READONLY'=>true,'label'=>'Week Number' ,'value'=>date('W'),'type'=>'text' ) );
    echo $this->Form->input("customer", array( 'options' => $this->ntpdropdownLogics->getDropdown('customer',$dropdown_fields), 'label'=>'Customer', 'type'=>'select', 'id' => 'customer') );
	echo $this->Form->input("network_number", array( 'label'=>'Network Number' ,'maxlength'=>8,'type'=>'text' ) );
    echo $this->Form->input("region", array( 'options' => $this->ntpdropdownLogics->getDropdown('region',$dropdown_fields),'empty' => '', 'label'=>'Region', 'id'=>'region' ,'type'=>'select' ) );    
    echo $this->Form->input("market", array( 'label'=>'Market' ,'type'=>'text' ) );
	echo $this->Form->input("day_or_night", array( 'options'=>array('Day'=>'Day','Night'=>'Night'),'label'=>'Day or Night Activity', 'type'=>'select','empty' =>'') );
	echo $this->Form->input("asp_name", array( 'label'=>'ASP Full Name' ,'type'=>'text' ) );
	echo $this->Form->input("asp_contact", array( 'label'=>'ASP Contact Number' ,'type'=>'text' ) );
	echo $this->Form->input("asp_company", array( 'label'=>'ASP Company' ,'type'=>'text' ) );
	echo $this->Form->input("im_or_pm", array( 'label'=>'IM/PM' ,'type'=>'text' ) );
	echo $this->Form->input("im_or_pm_contact", array( 'label'=>'IM/PM Contact Number' ,'type'=>'text' ) );	?>	
</fieldset>