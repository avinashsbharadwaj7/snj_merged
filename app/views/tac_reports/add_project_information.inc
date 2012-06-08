<fieldset>
    <h4>Project Information</h4>

	<?php
    echo $this->Form->input("customer", array( 'options' => $this->ntpdropdownLogics->getDropdown('customer',$dropdown_fields), 'label'=>'Customer', 'type'=>'select', 'id' => 'customer') );
    echo $this->Form->input("region", array( 'options' => $this->ntpdropdownLogics->getDropdown('region',$dropdown_fields),'empty' => '', 'label'=>'Region', 'id'=>'region' ,'type'=>'select' ) );
    echo $this->Form->input('organization', array('type'=>'select', 'options'=>array(""=>"", "LDO NIC"=>"LDO NIC", "RAN E&O Integration"=>"RAN E&O Integration", "RAN E&O NDS"=>"RAN E&O NDS")));   
	echo $this->Form->input("ir_report_id", array( 'label'=>'IR Report ID' ,'type'=>'text' ) );
	echo $this->Form->input("rnc", array( 'label'=>'RNC' ,'type'=>'text' ) );
    echo $this->Form->input("site_name", array( 'label'=>'Site Name' ,'type'=>'text' ) );	
    echo $this->Form->input("nic_or_tac", array( 'options'=>array('NIC'=>'NIC','TAC'=>'TAC'),'label'=>'NIC or TAC Engineer filling this report', 'type'=>'select','empty' =>'','id'=>'nic_or_tac') );   
	?>
	<br><br>
	<fieldset>
		<legend>Signums</legend>
				<span id='nic_engineer_signum_container'>			
					<?php echo $this->Form->input("nic_engineer_signum", array( 'label'=>'NIC Engineer' ,'type'=>'text' ) ); ?>
				</span>
				<span id='tac_nic_engineer_signum_container'>
					<?php echo $this->Form->input("tac_nic_engineer_signum", array( 'label'=>'TAC NIC Engineer' ,'type'=>'text' ) ); ?>
				</span>
				<?php
					echo $this->Form->input("tac_tcm_engineer_signum", array( 'label'=>'TAC TCM Engineer' ,'type'=>'text' ) );
					echo $this->Form->input("tac_msn_engineer_signum", array( 'label'=>'TAC MSN Engineer' ,'type'=>'text' ) );
					echo $this->Form->input("tac_rf_engineer_signum", array( 'label'=>'TAC RF Engineer' ,'type'=>'text' ) );
					echo $this->Form->input("market_pm", array( 'label'=>'Market PM' ,'type'=>'text' ) );
				?>
	</fieldset>	
</fieldset>