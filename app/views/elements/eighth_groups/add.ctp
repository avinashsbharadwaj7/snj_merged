<div class="eighthGroups form">
<?php echo $form->create('EighthGroup', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Eighth Group'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
		echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
		echo $form->input('aal_termination_pt_iur_verified', array("label"=>"Verify the AAL5 Termination Point Status for Iur","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('aal_termination_pt_iur_verified')));
		echo $form->input('aal_termination_pt_iur_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('nni_saal_layer_status_iur_verified', array("label"=>"Verify the NNI-SAAL Layer Status for Iur","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('nni_saal_layer_status_iur_verified')));
		echo $form->input('nni_saal_layer_status_iur_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('mptb_signaling_status_iur_verified', array("label"=>"Verify the MPT3b Signaling Status for Iur (Signaling Links, SLS, AP, Q.2630.2)","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('mptb_signaling_status_iur_verified')));
		echo $form->input('mptb_signaling_status_iur_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('sccp_signaling_pt_status_verified', array("label"=>"Verify the SCCP signaling point status for CS","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('sccp_signaling_pt_status_verified')));
		echo $form->input('sccp_signaling_pt_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('aal_path_status_iur_verified', array("label"=>"Verify the AAL2 Path Status for Iur","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('aal_path_status_iur_verified')));
		echo $form->input('aal_path_status_iur_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('rns_ap_status_iur_verified', array("label"=>"Verify the RNSAP status for Iur","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('rns_ap_status_iur_verified')));
		echo $form->input('rns_ap_status_iur_verified_notes', array("div"=>array("style"=>"display:none")));
	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>