<div class="firstGroups form">
<?php echo $form->create('FirstGroup', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('First Group'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
		echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
                echo $form->input('gpb_board_replacement', array("label"=>"GPB75 Board Replacement (R1.1 RNC3820 IP or ATM Heavy)","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('gpb_board_replacement')));
		echo $form->input('gpb_board_replacement_notes', array("div"=>array("style"=>"display:none")));
                echo $form->input('install_app_supervision_cables', array("label"=>"Install the APP supervision cables","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('install_app_supervision_cables')));
		echo $form->input('install_app_supervision_cables_notes', array("div"=>array("style"=>"display:none")));
                echo $form->input('format_rnc_use_gpb', array("label"=>"Format the RNC to use GPB75 if applicable.  ","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('format_rnc_use_gpb')));
		echo $form->input('format_rnc_use_gpb_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('serial_ethernet_setup', array("label"=>"Setup serial and Ethernet connections to the RNC","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('serial_ethernet_setup')));
		echo $form->input('serial_ethernet_setup_notes', array("div"=>array("style"=>"display:none")));
                echo $form->input('contents_mop_doc_reviewed', array("label"=>"Contents of MOP and referenced documents reviewed and available","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('contents_mop_doc_reviewed')));
		echo $form->input('contents_mop_doc_reviewed_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('local_connectivity_verification', array("label"=>"Verify local connectivity to all involved nodes.","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('local_connectivity_verification')));
		echo $form->input('local_connectivity_verification_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('oss_rc_lan_connection_verification', array("label"=>"Verify that connection to OSS-RC is available as well as connection to customers LAN.","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('oss_rc_lan_connection_verification')));
		echo $form->input('oss_rc_lan_connection_verification_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('prerequisites_verification', array("label"=>"Verify that all prerequisites have been met","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('prerequisites_verification')));
		echo $form->input('prerequisites_verification_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('mop_iucs_over_ip_rnc', array("label"=>"If applicable, MOP for IuCS over IP RNC integration is available","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('mop_iucs_over_ip_rnc')));
		echo $form->input('mop_iucs_over_ip_rnc_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('oc3_verification', array("label"=>"Verify that all external interfaces are in place (OC3/Ethernet)","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('oc3_verification')));
		echo $form->input('oc3_verification_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_external_optical_cables_correct', array("label"=>"Verify that all the external optical cables involved are of the correct type; Single Mode (SM)","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_external_optical_cables_correct')));
		echo $form->input('verify_external_optical_cables_correct_notes', array("div"=>array("style"=>"display:none")));
                echo $form->input('min_config_rnc_verification', array("label"=>"Verify the minimum configuration of subracks in the RNC ","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('min_config_rnc_verification')));
		echo $form->input('min_config_rnc_verification_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('remainder_rnc_config_verification', array("label"=>"Verify that the remainder of the boards in the RNC are configured according to the desired product package. ","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('remainder_rnc_config_verification')));
		echo $form->input('remainder_rnc_config_verification_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('rnc_matches_configuration', array("label"=>"Verify that the RNC matches the R1.1 configuration, using GPB75. ",
                        "type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('rnc_matches_configuration')."<br/><font size='smallest' color='red'>This is different from the RNC 3820 R1.0 GPB65 configuration. The configuration should be either ATM or IP heavy. Confirm with the implementation manager if you are unsure which configuration should be used.</font>"));
		echo $form->input('rnc_matches_configuration_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('eti_pg_compatible_verification', array("label"=>"Verify that ET-IPG boards are in compatible slots","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('eti_pg_compatible_verification')));
		echo $form->input('eti_pg_compatible_verification_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('rnc_wiring_verification', array("label"=>"Verify the wiring within the RNC","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('rnc_wiring_verification')));
		echo $form->input('rnc_wiring_verification_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('cables_cmxb_app_verification', array("label"=>"Verify that 2 additional cables (TSR 491 602/1000) are in place between CMXB in the main subrack and both APP. ","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('cables_cmxb_app_verification')));
		echo $form->input('cables_cmxb_app_verification_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('subracks_power_verification', array("label"=>"Verify power is available to each of the subracks","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('subracks_power_verification')));
		echo $form->input('subracks_power_verification_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('fans_power_verification', array("label"=>"Verify power is available to all of the fans","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('fans_power_verification')));
		echo $form->input('fans_power_verification_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('rnc_led_behaviour_verification', array("label"=>"Verify normal LED behavior for a new RNC","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('rnc_led_behaviour_verification')));
		echo $form->input('rnc_led_behaviour_verification_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('rnc_backup_completion', array("label"=>"Perform a complete backup of the RNC","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('rnc_backup_completion')));
		echo $form->input('rnc_backup_completion_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('startable_cv_rnc_saved', array("label"=>"Save a startable CV in the RNC","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('startable_cv_rnc_saved')));
		echo $form->input('startable_cv_rnc_saved_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('node_initial_health_check_performed', array("label"=>"Perform an initial health check on the node","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('node_initial_health_check_performed')));
		echo $form->input('node_initial_health_check_performed_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('initial_kget_saved', array("label"=>"Save an initial kget on the node","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('initial_kget_saved')));
		echo $form->input('initial_kget_saved_notes', array("div"=>array("style"=>"display:none")));
	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>