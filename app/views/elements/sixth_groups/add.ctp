<div class="sixthGroups form">
<?php echo $form->create('SixthGroup', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Sixth Group'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
		echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
		echo $form->input('vlans_config_verified', array("label"=>"Verify the VLANs are correctly configured for IuPS CP","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('vlans_config_verified')));
		echo $form->input('vlans_config_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('giga_bit_ethernet_status_verified', array("label"=>"Verify the status of the GigaBitEthernet","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('giga_bit_ethernet_status_verified')));
		echo $form->input('giga_bit_ethernet_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('ip_interface_status_verified', array("label"=>"Verify the status of the IpInterface","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('ip_interface_status_verified')));
		echo $form->input('ip_interface_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('ip_access_host_gpb_status_verified', array("label"=>"Verify the status of the IpAccessHostGpb","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('ip_access_host_gpb_status_verified')));
		echo $form->input('ip_access_host_gpb_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('sctp_status_verified', array("label"=>"Verify the status of the Sctp","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('sctp_status_verified')));
		echo $form->input('sctp_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('mtbp_signaling_pt_status_verified', array("label"=>"Verify the status of the Mtb3p Signaling Point","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('mtbp_signaling_pt_status_verified')));
		echo $form->input('mtbp_signaling_pt_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('mu_association_status_verified', array("label"=>"Verify the status of the M3uAssociation","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('mu_association_status_verified')));
		echo $form->input('mu_association_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('mtpb_signaling_and_signaling_route_status_verified', array("label"=>"Verify the status of the Mtp3b Signaling Routes and Signaling Route Set","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('mtpb_signaling_and_signaling_route_status_verified')));
		echo $form->input('mtpb_signaling_and_signaling_route_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('mtpb_access_pt_status_verified', array("label"=>"Verify the status of the Mtp3b Access Point","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('mtpb_access_pt_status_verified')));
		echo $form->input('mtpb_access_pt_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('sccp_signaling_pt_status_verified', array("label"=>"Verify the status of the Sccp Signaling Point","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('sccp_signaling_pt_status_verified')));
		echo $form->input('sccp_signaling_pt_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('sccp_local_access_pt_status_verified', array("label"=>"Verify the status of the Sccp Local Access Point","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('sccp_local_access_pt_status_verified')));
		echo $form->input('sccp_local_access_pt_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('scp_remote_access_pt_status_verified', array("label"=>"Verify the status of the Sccp Remote Access Point","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('scp_remote_access_pt_status_verified')));
		echo $form->input('scp_remote_access_pt_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('signaling_conn_redundancy_tested', array("label"=>"Signaling Connectivity and Redundancy Testing","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('signaling_conn_redundancy_tested')));
		echo $form->input('signaling_conn_redundancy_tested_notes', array("div"=>array("style"=>"display:none")));
	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>