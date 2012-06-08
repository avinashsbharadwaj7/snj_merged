<div class="seventhGroups form">
<?php echo $form->create('SeventhGroup', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Seventh Group'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
		echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
		echo $form->input('vlans_config_iups_up_verified', array("label"=>"Verify the VLANs are correctly configured for IuPS UP","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('vlans_config_iups_up_verified')));
		echo $form->input('vlans_config_iups_up_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('intranode_vlans_config_verified', array("label"=>"Verify that the intranode VLANs are correctly configured","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('intranode_vlans_config_verified')));
		echo $form->input('intranode_vlans_config_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('exchange_terminal_ip_status_verified', array("label"=>"Verify the ExchangeTerminalIp status","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('exchange_terminal_ip_status_verified')));
		echo $form->input('exchange_terminal_ip_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('gigabit_ethernet_status_verified', array("label"=>"Verify the GigaBitEthernet status","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('gigabit_ethernet_status_verified')));
		echo $form->input('gigabit_ethernet_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('ip_interface_status_verified', array("label"=>"Verify the IpInterface status","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('ip_interface_status_verified')));
		echo $form->input('ip_interface_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('ip_access_host_spb_status_verified', array("label"=>"Verify the IpAccessHostSpb status","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('ip_access_host_spb_status_verified')));
		echo $form->input('ip_access_host_spb_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('ip_eth_packet_data_routers_status_verified', array("label"=>"Verify the status of the IpEthPacketDataRouters","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('ip_eth_packet_data_routers_status_verified')));
		echo $form->input('ip_eth_packet_data_routers_status_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('iups_default_router_conn_verified', array("label"=>"Verify connectivity to the IuPS default router","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('iups_default_router_conn_verified')));
		echo $form->input('iups_default_router_conn_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('pdr_redundancy_verified', array("label"=>"Verify PDR redundancy","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('pdr_redundancy_verified')));
		echo $form->input('pdr_redundancy_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('packet_switch_calls_performed', array("label"=>"Perform basic packet switch calls","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('packet_switch_calls_performed')));
		echo $form->input('packet_switch_calls_performed_notes', array("div"=>array("style"=>"display:none")));
	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>