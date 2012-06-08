<div class="thirdQas form">
<?php echo $form->create('ThirdQa', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('PARAMETER CHECKS'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
                echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
		echo $form->input('emergency_redirect_on_service_based_handover', array("label"=>"Emergency Redirect ON/ Service Based Handover (SBHO) - OFF","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('emergency_redirect_on_service_based_handover')));
		echo $form->input('emergency_redirect_on_service_based_handover_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('emergency_redirect_off_service_based_handover', array("label"=>"Emergency Redirect OFF/ Service Based Handover (SBHO) – ON","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('emergency_redirect_off_service_based_handover')));
		echo $form->input('emergency_redirect_off_service_based_handover_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verfiy_rnc_connectivity_oss_rnc_oam_router', array("label"=>"Verify RNC connectivity to OSS including RNC,OAM router settings","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verfiy_rnc_connectivity_oss_rnc_oam_router')));
		echo $form->input('verfiy_rnc_connectivity_oss_rnc_oam_router_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('lte_readiness_configuration', array("label"=>"LTE readiness configuration","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('lte_readiness_configuration')));
		echo $form->input('lte_readiness_configuration_notes', array("div"=>array("style"=>"display:none")));
	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>