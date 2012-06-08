<div class="fourthQas form">
<?php echo $form->create('FourthQa', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Additional Test/Verification/Print Outs'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
                echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
		echo $form->input('agps_hw_redudancy', array("label"=>"AGPS Hardware Redundancy","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('agps_hw_redudancy')));
		echo $form->input('agps_hw_redudancy_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('iub_over_ip', array("label"=>"IUB over IP","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('iub_over_ip')));
		echo $form->input('iub_over_ip_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('systemlog_crash', array("label"=>"Systemlog Crash","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('systemlog_crash')));
		echo $form->input('systemlog_crash_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('oss_connectivity_verification', array("label"=>"OSS Connectivity Verification","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('oss_connectivity_verification')));
		echo $form->input('oss_connectivity_verification_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('final_cv', array("label"=>"Final CV (Make sure Total Number of CV is < less than","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('final_cv')));
		echo $form->input('final_cv_notes', array("div"=>array("style"=>"display:none")));
	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>
