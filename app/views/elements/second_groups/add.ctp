<div class="secondGroups form">
<?php echo $form->create('SecondGroup', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Second Group'); ?></legend>
	<?php
		echo $form->input('report_id',array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
		echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
                echo $form->input('ensure_precheck_postcheck_done', array("label"=>"Ensure the pre-checks from section 3.3 have been performed","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('ensure_precheck_postcheck_done')));
		echo $form->input('ensure_precheck_postcheck_done_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('rnc_date_time_set', array("label"=>"Set the correct date and time in the RNC","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('rnc_date_time_set')));
		echo $form->input('rnc_date_time_set_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_local_time_zone', array("label"=>"Verify local time zone on the RNC is correctly set ","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_local_time_zone')));
		echo $form->input('verify_local_time_zone_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('setup_health_check', array("label"=>"Set up the scheduled Health Check","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('setup_health_check')));
		echo $form->input('setup_health_check_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_current_software_package', array("label"=>"Verify the current software package on the node","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_current_software_package')));
		echo $form->input('verify_current_software_package_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('reqd_software_installed', array("label"=>"Install the required software packages","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('reqd_software_installed')));
		echo $form->input('reqd_software_installed_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('software_upgraded', array("label"=>"Upgrade to the desired software version according to the upgrade path","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('software_upgraded')));
		echo $form->input('software_upgraded_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('rnc_board_layout_spb_types_changed_verified', array("label"=>"Verify and change the RNC board layout and configuration if necessary","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('rnc_board_layout_spb_types_changed_verified')));
		echo $form->input('rnc_board_layout_spb_types_changed_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_sw_allocation_for_spare_gpb', array("label"=>"Verify that SW allocation for spare GPBs for powered storage are undefined","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_sw_allocation_for_spare_gpb')));
		echo $form->input('verify_sw_allocation_for_spare_gpb_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_rnc_matches_configuration', array("label"=>"Verify that the RNC matches the R1.1 configuration, using GPB75.","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_rnc_matches_configuration')."<br/><font size='smallest' color='red'>Note, this is different from the RNC 3820 R1.0 GPB65 configuration. There are ATM and IP heavy configurations., if you are unsure which configuration to use, confirm with the implementation manager.</font>"));
		echo $form->input('verify_rnc_matches_configuration_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_cc_devices', array("label"=>"Verify the CC Devices","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_cc_devices')));
		echo $form->input('verify_cc_devices_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_dc_devices', array("label"=>"Verify the DC Devices","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_dc_devices')));
		echo $form->input('verify_dc_devices_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('rnc_licenses_requested', array("label"=>"Request Licenses for the RNC","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('rnc_licenses_requested')));
		echo $form->input('rnc_licenses_requested_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('license_key_file_imported', array("label"=>"Import the license key file","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('license_key_file_imported')));
		echo $form->input('license_key_file_imported_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_rnsap_relocation', array("label"=>"Verify RNSAP Relocation Parameters","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_rnsap_relocation')));
		echo $form->input('verify_rnsap_relocation_notes', array("div"=>array("style"=>"display:none")));
	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>