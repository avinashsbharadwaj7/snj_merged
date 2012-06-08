<div class="eleventhGroups form">
<?php echo $form->create('EleventhGroup', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Eleventh Group'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
		echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
		echo $form->input('rnc_backed_up', array("label"=>"Perform a complete backup of the RNC","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('rnc_backed_up')));
		echo $form->input('rnc_backed_up_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('current_software_on_node_verified', array("label"=>"Verify the current software package on the node","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('current_software_on_node_verified')));
		echo $form->input('current_software_on_node_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('post_health_check_node_performed', array("label"=>"Perform a post health check on the node","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('post_health_check_node_performed')));
		echo $form->input('post_health_check_node_performed_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('active_alarms_on_rnc_printed', array("label"=>"Print the active alarms on the RNC","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('active_alarms_on_rnc_printed')));
		echo $form->input('active_alarms_on_rnc_printed_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('iucs_iur_settings_over_atm_verified', array("label"=>"Verify that IuCS and/or Iur settings  over ATM are correct","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('iucs_iur_settings_over_atm_verified')));
		echo $form->input('iucs_iur_settings_over_atm_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('c2_capacity_increase_verified', array("label"=>"Verify that C2 capacity increase is done","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('c2_capacity_increase_verified')));
		echo $form->input('c2_capacity_increase_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('processes_running_gpb_c2', array("label"=>"Verify the following processes are running on GPB_C2","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('processes_running_gpb_c2')));
		echo $form->input('processes_running_gpb_c2_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('external_port_status_verified', array("label"=>"Verify external port status","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('external_port_status_verified')));
		echo $form->input('external_port_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('oc3_conn_status_verified', array("label"=>"Verify OC3 connection status","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('oc3_conn_status_verified')));
		echo $form->input('oc3_conn_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('sync_priority_rnc_verified', array("label"=>"Verify the Synchronization Priority of the RNC","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('sync_priority_rnc_verified')));
		echo $form->input('sync_priority_rnc_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('board_config_verified', array("label"=>"Verify that the board configuration and the SW allocation matches the printout in the attached file","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('board_config_verified')));
		echo $form->input('board_config_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('rnc_froid_inconsistency_checked', array("label"=>"RNC Froid inconsistency check","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('rnc_froid_inconsistency_checked')));
		echo $form->input('rnc_froid_inconsistency_checked_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('cc_dc_devices_verified', array("label"=>"Verify the CC and DC Devices","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('cc_dc_devices_verified')));
		echo $form->input('cc_dc_devices_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('sbho_readiness_verified', array("label"=>"Verify with the Customer on the SBHO readiness","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('sbho_readiness_verified')));
		echo $form->input('sbho_readiness_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('oam_settings_same_in_rnc_router', array("label"=>"Verify that the OAM settings in the RNC and OAM router are the same ","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('oam_settings_same_in_rnc_router')));
		echo $form->input('oam_settings_same_in_rnc_router_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('agps_connectivity_verified', array("label"=>"Verify AGPS connectivity","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('agps_connectivity_verified')));
		echo $form->input('agps_connectivity_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('ntp_server_conn_verified', array("label"=>"Verify NTP server connectivity","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('ntp_server_conn_verified')));
		echo $form->input('ntp_server_conn_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('rpu_defined_verified', array("label"=>"Verify RPU are defined","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('rpu_defined_verified')));
		echo $form->input('rpu_defined_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('iucs_ranap_alcap_aal2_status_verified', array("label"=>"Verify IUCS RANAP ALCAP signaling & AAL2 bearer status","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('iucs_ranap_alcap_aal2_status_verified')));
		echo $form->input('iucs_ranap_alcap_aal2_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('iups_signaliing_pdr_status_verified', array("label"=>"Verify IUPS signaling & PDR status","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('iups_signaliing_pdr_status_verified')));
		echo $form->input('iups_signaliing_pdr_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('iur_links_verified', array("label"=>"Verify if IUR Links are defined, then verify Iur link status","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('iur_links_verified')));
		echo $form->input('iur_links_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('licenses_uploaded_verified', array("label"=>"Verify that the licenses have been successfully uploaded","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('licenses_uploaded_verified')));
		echo $form->input('licenses_uploaded_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('performance_counters_correct_checked', array("label"=>"Check performance counters defined correctly & unused counters are suspended","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('performance_counters_correct_checked')));
		echo $form->input('performance_counters_correct_checked_notes', array("div"=>array("style"=>"display:none")));
                echo $form->input('startable_cv_rnc_saved', array("label"=>"Save a startable CV in the RNC","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('startable_cv_rnc_saved')));
		echo $form->input('startable_cv_rnc_saved_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('post_kget_node_saved', array("label"=>"Save a post kget on the node","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('post_kget_node_saved')));
		echo $form->input('post_kget_node_saved_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('dcgm_from_rnc_collected', array("label"=>"Collect the dcgm from the RNC","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('dcgm_from_rnc_collected')));
		echo $form->input('dcgm_from_rnc_collected_notes', array("div"=>array("style"=>"display:none")));
	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>
