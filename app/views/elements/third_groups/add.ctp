<div class="thirdGroups form">
<?php echo $form->create('ThirdGroup', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Third Group'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
		echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
		echo $form->input('rnc_config_scripts_ran', array("label"=>"Run the RNC configuration scripts","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('rnc_config_scripts_ran')));
		echo $form->input('rnc_config_scripts_ran_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('sctp_verification', array("label"=>"Verify SCTP before C2 Capacity Increase","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('sctp_verification')));
		echo $form->input('sctp_verification_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('c_two_capacity_increased', array("label"=>"Increase C2 Capacity","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('c_two_capacity_increased')));
		echo $form->input('c_two_capacity_increased_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('process_rebalance_proc_verified', array("label"=>"Verify the Process Rebalance Procedure","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('process_rebalance_proc_verified')));
		echo $form->input('process_rebalance_proc_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('sctp_after_c_two_increase_verified', array("label"=>"Verify the status of SCTP after the C2 Capacity Increase Procedure","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('sctp_after_c_two_increase_verified')));
		echo $form->input('sctp_after_c_two_increase_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('app_reconfigured', array("label"=>"Reconfigure the Active Patch Panel (APP)","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('app_reconfigured')));
		echo $form->input('app_reconfigured_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('all_oc_three_connections_verified', array("label"=>"Verify all OC3 connections are up","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('all_oc_three_connections_verified')));
		echo $form->input('all_oc_three_connections_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('fiber_cabling_to_odf_verified', array("label"=>"Verify fiber cabling to the ODF is correct","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('fiber_cabling_to_odf_verified')));
		echo $form->input('fiber_cabling_to_odf_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('ff_mapping_msn_verified', array("label"=>"Verify fiber failover and 1 to 1 mapping with the MSN","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('ff_mapping_msn_verified')));
		echo $form->input('ff_mapping_msn_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('sync_ref_status_verified', array("label"=>"Verify the Synchronization Reference Status","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('sync_ref_status_verified')));
		echo $form->input('sync_ref_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('tu_sync_status_verified', array("label"=>"Verify the TU Synchronization Status","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('tu_sync_status_verified')));
		echo $form->input('tu_sync_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_sync_priority', array("label"=>"Verify the Synchronization Priority of the RNC","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_sync_priority')));
		echo $form->input('verify_sync_priority_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('tim_device_status_verified', array("label"=>"Verify the TimDevice Status","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('tim_device_status_verified')));
		echo $form->input('tim_device_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('sync_in_locked_mode_verified', array("label"=>"Verify that synchronization is in LOCKED_MODE","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('sync_in_locked_mode_verified')));
		echo $form->input('sync_in_locked_mode_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('sync_redundancy_test_performed', array("label"=>"Perform a synchronization redundancy test","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('sync_redundancy_test_performed')));
		echo $form->input('sync_redundancy_test_performed_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('agps_activation', array("label"=>"Using AMOS to define the GPS Receiver","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('agps_activation')));
		echo $form->input('agps_activation_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('agps_connectivity_verified', array("label"=>"Verify A-GPS Connectivity","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('agps_connectivity_verified')));
		echo $form->input('agps_connectivity_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('ip_connectivity_oss_rc_verified', array("label"=>"Verify IP connectivity to/from OSS-RC","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('ip_connectivity_oss_rc_verified')));
		echo $form->input('ip_connectivity_oss_rc_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_oam_settings', array("label"=>"Verify that the OAM settings in the RNC and OAM router are the same","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_oam_settings')));
		echo $form->input('verify_oam_settings_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('ntp_servers_connectivity_verified', array("label"=>"Verify connectivity to the NTP servers","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('ntp_servers_connectivity_verified')));
		echo $form->input('ntp_servers_connectivity_verified_notes', array("div"=>array("style"=>"display:none")));
	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>