<fieldset>
    <h4>Activity Information</h4>

	<?php
	$yes_no = array('Yes'=>'Yes','No'=>'No','NA'=>'NA');
    echo $this->Form->input("activity_type", array( 'options' => $this->ntpdropdownLogics->getDropdown('activity_type',$dropdown_fields), 'label'=>'Activity Type', 'type'=>'select','empty'=>'', 'id' => 'activity_type') );
    
	echo $this->Form->input("rnc_oss_script_load_complete", array( 'options'=>$yes_no,'label'=>'RNC/OSS Script Load Complete', 'type'=>'select','empty' =>'','id'=>'rnc_oss_script_load_complete') );
	echo "<span id='script_container'>";
		echo $this->Form->input("rnc_oss_scripts_released", array( 'options'=>$yes_no,'label'=>'RNC/OSS Scripts Released', 'type'=>'select','empty' =>'','id'=>'rnc_oss_scripts_released') );
	echo "</span>";
	echo "<span id='script_release_container'>";
		echo $datePicker->picker('rnc_oss_scripts_release_date',array('label'=>'RNC/OSS Scripts Release Date', 'READONLY' => true, 'style'=>'background-color:#F6F6CC;  width:auto;'));
	echo "</span>";
	echo $this->Form->input("rnc_oss_script_load_scheduled_before_integration", array( 'options'=>$yes_no,'label'=>'RNC/OSS Scripts Released before Integration', 'type'=>'select','empty' =>'') );
	echo $this->Form->input("rnc_oss_scripts_issue", array( 'label'=>'RNC/OSS Scripts Issue', 'type'=>'textarea' ) );   
	
	echo $this->Form->input("rnc_frequency_check", array( 'options'=>$yes_no,'label'=>'RNC Frequency OKAY', 'type'=>'select','empty' =>'','id'=>'rnc_frequency_check') );   
	echo "<span id='rnc_freq_container'>";
		echo $this->Form->input("rnc_frequency_issue", array( 'label'=>'RNC Frequency Issue', 'type'=>'textarea' ) );
	echo "</span>";
	
	echo $this->Form->input("vswr_check", array( 'options'=>$yes_no,'label'=>'VSWR Check OKAY', 'type'=>'select','empty' =>'','id'=>'vswr_check') ); 
	echo "<span id='vswr_container'>";
		echo $this->Form->input("vswr_issue", array( 'label'=>'VSWR Issue', 'type'=>'textarea' ) );
	echo "</span>";
	
	echo $this->Form->input("rssi_check", array( 'options'=>$yes_no,'label'=>'RSSI Check OKAY', 'type'=>'select','empty' =>'','id'=>'rssi_check') );   
	echo "<span id='rssi_container'>";
		echo $this->Form->input("rssi_issue", array( 'label'=>'RSSI Issue', 'type'=>'textarea' ) );
	echo "</span>";
	
	echo $this->Form->input("alarm_check", array( 'options'=>$yes_no,'label'=>'Alarms', 'type'=>'select','empty' =>'','id'=>'alarm_check') );   
	echo "<span id='alarms_container'>";
		echo $this->Form->input("alarm_description", array( 'label'=>'Alarms Description', 'type'=>'textarea' ) );
	echo "</span>";
	
	echo $this->Form->input("kpi_check", array( 'options'=>$yes_no,'label'=>'KPIs Check OKAY', 'type'=>'select','empty' =>'','id'=>'kpi_check') );   
	echo "<span id='kpis_container'>";
		echo $this->Form->input("bad_kpi_description", array( 'label'=>'Bad KPIs Description', 'type'=>'textarea' ) );
	echo "</span>";
	
    echo $this->Form->input("steered_hs_allocation", array( 'options'=>array('True'=>'True','False'=>'False'),'label'=>'Steered HS Allocation', 'type'=>'select','empty' =>'') );   
	echo $this->Form->input("auto_configuration", array( 'options'=>$yes_no,'label'=>'Auto Configuration', 'type'=>'select','empty' =>'') );   
	echo $this->Form->input("cabinet_view_check", array( 'options'=>$yes_no,'label'=>'Cabinet View Checked', 'type'=>'select','empty' =>'') );   
	echo $this->Form->input("cabinet_issue", array( 'label'=>'Cabinet View Issue', 'type'=>'textarea' ) );
	
	echo $this->Form->input("ntp_pingable", array( 'options'=>$yes_no,'label'=>'NTP Pingable', 'type'=>'select','empty' =>'','id'=>'ntp_pingable') ); 
	echo "<span id='ntp_container'>";
		echo $this->Form->input("ntp_issues", array( 'label'=>'NTP Issue', 'type'=>'textarea' ) );
	echo "</span>";
	
	echo $this->Form->input("ftp_pingable", array( 'options'=>$yes_no,'label'=>'FTP Pingable', 'type'=>'select','empty' =>'','id'=>'ftp_pingable') ); 
	echo "<span id='ftp_container'>";
		echo $this->Form->input("ftp_issues", array( 'label'=>'FTP Issue', 'type'=>'textarea' ) );
	echo "</span>";
	
	echo $this->Form->input("traffic_descriptors_check", array( 'label'=>'Traffic Descriptors Check', 'type'=>'textarea' ) );
	
	echo $this->Form->input("final_results", array( 'options' => $this->ntpdropdownLogics->getDropdown('final_results',$dropdown_fields),'empty' => '', 'label'=>'Final Result', 'type'=>'select','id'=>'final_results' ) );
        echo $this->Form->input("time_taken_for_activity", array( 'label'=>'Time Taken for activity', 'type'=>'text' ));        
    echo "<span id='results_container'>";
		echo $this->Form->input("emphasis_needed_on", array( 'label'=>'Emphasis Needed On', 'type'=>'textarea' ) );
    echo "</span>";
	
	echo $this->Form->input("comments", array( 'label'=>'Comments', 'type'=>'textarea' ) );
    ?>
</fieldset>