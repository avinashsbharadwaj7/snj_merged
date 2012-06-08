<fieldset>
    <h4>Activity Information</h4>

	<?php
	$yes_no = array('Yes'=>'Yes','No'=>'No');
    echo $this->Form->input("activity_type", array( 'options' => $this->ntpdropdownLogics->getDropdown('activity_type',$dropdown_fields), 'label'=>'Activity Type', 'type'=>'select','empty'=>'', 'id' => 'activity_type') );
    echo $datePicker->picker('date_integration_scheduled',array('label'=>'Date Integration Scheduled', 'READONLY' => true, 'style'=>'background-color:#F6F6CC;  width:auto;'));
	echo $this->Form->input("rnc", array( 'label'=>'RNC' ,'type'=>'text' ) );    
	echo $this->Form->input("site_name_main_cabinet", array( 'label'=>'Site Name - Main Cabinet' ,'type'=>'text' ) );    
	echo $this->Form->input("site_name_secondary_cabinet", array( 'label'=>'Site Name - Secondary Cabinet' ,'type'=>'text' ) );    
	
	echo $this->Form->input("ntp_validated", array( 'options'=>$yes_no,'label'=>'NTP Validated', 'type'=>'select','empty' =>'','id'=>'ntp_validated') );
	echo "<span id='ntp_not_validated_container'>";		
		echo $this->Form->input("ntp_issues_encountered", array( 'options'=>$yes_no,'label'=>'NTP Issues Encountered', 'type'=>'select','empty' =>'','id'=>'ntp_issues_encountered') );
		echo "<span id='ntp_issues_encountered_container'>";	
			echo $this->Form->input("ntp_issues", array( 'label'=>'NTP Issues' ,'type'=>'textarea' ) );    
		echo "</span>";
	echo "</span>";
	
	echo $this->Form->input("csb_number", array( 'label'=>'CSB Number', 'type'=>'text','id'=>'csb_number') );
	echo $this->Form->input("csb_issues_encountered", array( 'options'=>$yes_no,'label'=>'CSB Issues Encountered', 'type'=>'select','empty' =>'','id'=>'csb_issues_encountered') );
	echo "<span id='csb_issues_container'>";		
		echo $this->Form->input("csb_issues", array( 'label'=>'CSB Issues' ,'type'=>'textarea' ) );    
	echo "</span>";
	
	
	echo $this->Form->input("asp_mop", array( 'options'=>$yes_no,'label'=>'Does ASP have the MOP', 'type'=>'select','empty' =>'','id'=>'asp_mop') );
	echo "<span id='asp_mop_container'>";		
		echo $this->Form->input("asp_mop_revision", array( 'label'=>'MOP Revision' ,'type'=>'text' ) );    
	echo "</span>";
	
	echo $this->Form->input("building_access", array( 'options'=>$yes_no,'label'=>'Access to the building', 'type'=>'select','empty' =>'','id'=>'building_access') );
	echo "<span id='building_access_container'>";		
		echo $this->Form->input("building_access_issues", array( 'label'=>'Building Access Issues' ,'type'=>'textarea' ) );    
	echo "</span>";
	
	echo $this->Form->input("site_location_known", array( 'options'=>$yes_no,'label'=>'ASP knows the Site Location', 'type'=>'select','empty' =>'','id'=>'site_location_known') );
	echo "<span id='site_location_known_container'>";		
		echo $this->Form->input("site_location_or_direction_issues", array( 'label'=>'Site Location/Direction Issues' ,'type'=>'textarea' ) );    
	echo "</span>";
	
	echo $this->Form->input("hdwr_delivered", array( 'options'=>$yes_no,'label'=>'Hardware has been delivered', 'type'=>'select','empty' =>'','id'=>'hdwr_delivered') );
	echo "<span id='hdwr_delivered_container'>";		
		echo $this->Form->input("hdwr_delivery_issues", array( 'label'=>'Hardware Delivery Issues' ,'type'=>'textarea' ) );    
	echo "</span>";
	
	echo $this->Form->input("asp_has_tools_spares", array( 'options'=>$yes_no,'label'=>'ASP has the necessary tools and spares', 'type'=>'select','empty' =>'','id'=>'asp_has_tools_spares') );
	echo "<span id='asp_has_tools_spares_container'>";		
		echo $this->Form->input("asp_tools_spares_issues", array( 'label'=>'Tools and Spares Issues' ,'type'=>'textarea' ) );    
	echo "</span>";
	
	echo $this->Form->input("asp_has_nodeb_tma_scripts", array( 'options'=>$yes_no,'label'=>'ASP has the required nodeB/TMA scripts', 'type'=>'select','empty' =>'','id'=>'asp_has_nodeb_tma_scripts') );
	echo "<span id='asp_has_nodeb_tma_scripts_container'>";		
		echo $this->Form->input("asp_nodeb_tma_scripts_issues", array( 'label'=>'NodeB/TMA Script Issues' ,'type'=>'textarea' ) );    
	echo "</span>";
	
	echo $this->Form->input("nodeb_swinfo_loc_access_confirmed", array( 'options'=>$yes_no,'label'=>'NodeB Software Information, Location and Access Confirmed', 'type'=>'select','empty' =>'','id'=>'nodeb_swinfo_loc_access_confirmed') );
	echo $this->Form->input("sw_upgrade_issues", array( 'label'=>'Software Upgrade Issues' ,'type'=>'textarea' ) );       
	echo $this->Form->input("asp_has_contact_details", array( 'options'=>$yes_no,'label'=>'ASP has the Contact details of NIC, PM/IM, MSN, ATT helpdesk', 'type'=>'select','empty' =>'') );
	
	echo $this->Form->input("final_results", array( 'options' => $this->ntpdropdownLogics->getDropdown('final_results',$dropdown_fields),'empty' => '', 'label'=>'Final Result', 'type'=>'select','id'=>'final_results' ) );
        echo $this->Form->input("time_taken_for_activity", array( 'label'=>'Time Taken for activity', 'type'=>'text' ));
    echo "<span id='results_container'>";
		echo $this->Form->input("emphasis_needed_on", array( 'label'=>'Emphasis Needed On', 'type'=>'textarea' ) );
    echo "</span>";
	
	echo $this->Form->input("contact_details_for_issues", array( 'label'=>'Contact Details during issues' ,'type'=>'textarea' ) ); 	
	echo $this->Form->input("comments", array( 'label'=>'Comments', 'type'=>'textarea' ) );   
	
    ?>
</fieldset>