<div class="thirdGroups form">
<?php echo $form->create('ThirdGroup', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Third Group'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
		echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
                ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Run the RNC configuration scripts'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['rnc_config_scripts_ran'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['rnc_config_scripts_ran_notes'] !== "" && !empty($firstGroup['FirstGroup']['rnc_config_scripts_ran_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['rnc_config_scripts_ran_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify SCTP before C2 Capacity Increase'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['sctp_verification'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['sctp_verification_notes'] !== "" && !empty($firstGroup['FirstGroup']['sctp_verification_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['sctp_verification_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Increase C2 Capacity'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['c_two_capacity_increased'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['c_two_capacity_increased_notes'] !== "" && !empty($firstGroup['FirstGroup']['c_two_capacity_increased_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['c_two_capacity_increased_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the Process Rebalance Procedure'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['process_rebalance_proc_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['process_rebalance_proc_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['process_rebalance_proc_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['process_rebalance_proc_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the status of SCTP after the C2 Capacity Increase Procedure'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['sctp_after_c_two_increase_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['sctp_after_c_two_increase_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['sctp_after_c_two_increase_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['sctp_after_c_two_increase_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reconfigure the Active Patch Panel (APP)'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['app_reconfigured'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['app_reconfigured_notes'] !== "" && !empty($firstGroup['FirstGroup']['app_reconfigured_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['app_reconfigured_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify all OC3 connections are up'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['all_oc_three_connections_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['all_oc_three_connections_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['all_oc_three_connections_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['all_oc_three_connections_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify fiber cabling to the ODF is correct'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['fiber_cabling_to_odf_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['fiber_cabling_to_odf_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['fiber_cabling_to_odf_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['fiber_cabling_to_odf_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify fiber failover and 1 to 1 mapping with the MSN'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['ff_mapping_msn_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['ff_mapping_msn_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['ff_mapping_msn_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['ff_mapping_msn_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the Synchronization Reference Status'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['sync_ref_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['sync_ref_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['sync_ref_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['sync_ref_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the TU Synchronization Status'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['tu_sync_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['tu_sync_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['tu_sync_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['tu_sync_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the Synchronization Priority of the RNC'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_sync_priority'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_sync_priority_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_sync_priority_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_sync_priority_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the TimDevice Status'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['tim_device_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['tim_device_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['tim_device_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['tim_device_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify that synchronization is in LOCKED_MODE'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['sync_in_locked_mode_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['sync_in_locked_mode_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['sync_in_locked_mode_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['sync_in_locked_mode_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Perform a synchronization redundancy test'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['sync_redundancy_test_performed'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['sync_redundancy_test_performed_notes'] !== "" && !empty($firstGroup['FirstGroup']['sync_redundancy_test_performed_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['sync_redundancy_test_performed_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Using AMOS to define the GPS Receiver'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['agps_activation'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['agps_activation_notes'] !== "" && !empty($firstGroup['FirstGroup']['agps_activation_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['agps_activation_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify A-GPS Connectivity'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['agps_connectivity_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['agps_connectivity_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['agps_connectivity_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['agps_connectivity_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify IP connectivity to/from OSS-RC'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['ip_connectivity_oss_rc_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['ip_connectivity_oss_rc_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['ip_connectivity_oss_rc_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['ip_connectivity_oss_rc_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify that the OAM settings in the RNC and OAM router are the same'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_oam_settings'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_oam_settings_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_oam_settings_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_oam_settings_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify connectivity to the NTP servers'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['ntp_servers_connectivity_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['ntp_servers_connectivity_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['ntp_servers_connectivity_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['ntp_servers_connectivity_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>