<div class="fifthGroups form">
<?php echo $form->create('FifthGroup', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Fifth Group'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
		echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
		echo $form->input('iucs_ip', array("label"=>"IUCS_IP","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('iucs_ip')));
		echo $form->input('iucs_ip_notes', array("div"=>array("style"=>"display:none")));
                echo $html->div('imp_note', "Note : For IuCS over IP integration, please follow the attached MOP for verification.");
                echo $html->div('imp_note',$html->link('EMC-11:003347 Uen, IuCS over IP RNC integartion',
                        "http://anon.ericsson.se/eridoc/erl.html?objectId=09004cff84e1782e&docno=EMC-11:003347Uen&action=approved&format=msw8",
                        array('target' => '_blank')));
                echo $form->input('aal_termination_status_verified', array("label"=>"Verify the AAL5 Termination Point Status for CS","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('aal_termination_status_verified')));
		echo $form->input('aal_termination_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('nni_saal_status_verified', array("label"=>"Verify the NNI-SAAL Layer Status for CS","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('nni_saal_status_verified')));
		echo $form->input('nni_saal_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('mtpb_signaling_status_msc_verified', array("label"=>"Verify the MTP3b Signaling Status toward the MSC (Signaling Links, SLS, AP)","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('mtpb_signaling_status_msc_verified')));
		echo $form->input('mtpb_signaling_status_msc_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('mtpb_signaling_status_mgw_verified', array("label"=>"Verify the MPT3b Signaling Status towards the MGw (Signaling Links, SLS, AP, Q.2630.2)","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('mtpb_signaling_status_mgw_verified')));
		echo $form->input('mtpb_signaling_status_mgw_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('sccp_signaling_pt_verified', array("label"=>"Verify the SCCP signaling point status for CS","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('sccp_signaling_pt_verified')));
		echo $form->input('sccp_signaling_pt_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('aal_path_status_mgw_verified', array("label"=>"Verify the AAL2 Path Status towards the MGw (CS Userplane)","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('aal_path_status_mgw_verified')));
		echo $form->input('aal_path_status_mgw_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('ran_ap_status_verified', array("label"=>"Verify the RANAP status for CS","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('ran_ap_status_verified')));
		echo $form->input('ran_ap_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('rnc_froid_inconsistency_check', array("label"=>"RNC Froid inconsistency check","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('rnc_froid_inconsistency_check')));
		echo $form->input('rnc_froid_inconsistency_check_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('aal_redundancy_verified', array("label"=>"Verify AAL2 redundancy","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('aal_redundancy_verified')));
		echo $form->input('aal_redundancy_verified_notes', array("div"=>array("style"=>"display:none")));
                echo $form->input('basic_circuit_switched_call_testing_verified', array("label"=>"Perform basic circuit switched call testing","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('basic_circuit_switched_call_testing_verified')));
		echo $form->input('basic_circuit_switched_call_testing_verified_notes', array("div"=>array("style"=>"display:none")));
                echo $html->div('imp_note', "Note:  Notify the Ericsson PM that the RNC is ready for Tektronix engineers Call Test");
	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>
