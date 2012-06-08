<div class="tenthGroups form">
<?php echo $form->create('TenthGroup', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Tenth Group'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
		echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
		echo $form->input('kget_audit_sent', array("label"=>"Send kget for Audit","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('kget_audit_sent')));
		echo $form->input('kget_audit_sent_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('audit_script_ran', array("label"=>"Run audit script","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('audit_script_ran')));
		echo $form->input('audit_script_ran_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('command_log_status_verified', array("label"=>"Verify command log status","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('command_log_status_verified')));
		echo $form->input('command_log_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('oss_rc_connectivity', array("label"=>"OSS-RC Connectivity","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('oss_rc_connectivity')));
		echo $form->input('oss_rc_connectivity_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('outstanding_alarms_cleared', array("label"=>"Clear outstanding alarms","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('outstanding_alarms_cleared')));
		echo $form->input('outstanding_alarms_cleared_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('alarm_testing_mnrc_performed', array("label"=>"Perform alarm testing with the MNRC","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('alarm_testing_mnrc_performed')));
		echo $form->input('alarm_testing_mnrc_performed_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('reset_all_logging_default', array("label"=>"Reset all logging to default","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('reset_all_logging_default')));
		echo $form->input('reset_all_logging_default_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('documentation_completed', array("label"=>"Complete all documentation","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('documentation_completed')));
		echo $form->input('documentation_completed_notes', array("div"=>array("style"=>"display:none")));
	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>