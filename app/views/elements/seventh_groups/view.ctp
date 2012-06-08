<div class="seventhGroups form">
<?php echo $form->create('SeventhGroup', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Seventh Group'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
		echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
                ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the VLANs are correctly configured for IuPS UP'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['vlans_config_iups_up_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['vlans_config_iups_up_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['vlans_config_iups_up_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['vlans_config_iups_up_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify that the intranode VLANs are correctly configured'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['intranode_vlans_config_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['intranode_vlans_config_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['intranode_vlans_config_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['intranode_vlans_config_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the ExchangeTerminalIp status'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['exchange_terminal_ip_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['exchange_terminal_ip_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['exchange_terminal_ip_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['exchange_terminal_ip_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the GigaBitEthernet status'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['gigabit_ethernet_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['gigabit_ethernet_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['gigabit_ethernet_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['gigabit_ethernet_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the IpInterface status'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['ip_interface_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['ip_interface_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['ip_interface_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['ip_interface_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the IpAccessHostSpb status'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['ip_access_host_spb_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['ip_access_host_spb_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['ip_access_host_spb_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['ip_access_host_spb_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the status of the IpEthPacketDataRouters'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['ip_eth_packet_data_routers_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['ip_eth_packet_data_routers_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['ip_eth_packet_data_routers_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['ip_eth_packet_data_routers_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify connectivity to the IuPS default router'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iups_default_router_conn_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['iups_default_router_conn_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['iups_default_router_conn_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iups_default_router_conn_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify PDR redundancy'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['pdr_redundancy_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['pdr_redundancy_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['pdr_redundancy_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['pdr_redundancy_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Perform basic packet switch calls'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['packet_switch_calls_performed'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['packet_switch_calls_performed_notes'] !== "" && !empty($firstGroup['FirstGroup']['packet_switch_calls_performed_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['packet_switch_calls_performed_notes'];?>
&nbsp;
</dd>
<?php endif;?>

	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>