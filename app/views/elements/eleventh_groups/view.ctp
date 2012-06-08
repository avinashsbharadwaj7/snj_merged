<div class="eleventhGroups form">
<?php echo $form->create('EleventhGroup', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Eleventh Group'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
		echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
                ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Perform a complete backup of the RNC'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['rnc_backed_up'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['rnc_backed_up_notes'] !== "" && !empty($firstGroup['FirstGroup']['rnc_backed_up_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['rnc_backed_up_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the current software package on the node'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['current_software_on_node_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['current_software_on_node_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['current_software_on_node_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['current_software_on_node_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Perform a post health check on the node'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['post_health_check_node_performed'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['post_health_check_node_performed_notes'] !== "" && !empty($firstGroup['FirstGroup']['post_health_check_node_performed_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['post_health_check_node_performed_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Print the active alarms on the RNC'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['active_alarms_on_rnc_printed'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['active_alarms_on_rnc_printed_notes'] !== "" && !empty($firstGroup['FirstGroup']['active_alarms_on_rnc_printed_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['active_alarms_on_rnc_printed_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify that IuCS and/or Iur settings  over ATM are correct'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iucs_iur_settings_over_atm_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['iucs_iur_settings_over_atm_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['iucs_iur_settings_over_atm_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iucs_iur_settings_over_atm_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify that C2 capacity increase is done'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['c2_capacity_increase_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['c2_capacity_increase_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['c2_capacity_increase_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['c2_capacity_increase_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the following processes are running on GPB_C2'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['processes_running_gpb_c2'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['processes_running_gpb_c2_notes'] !== "" && !empty($firstGroup['FirstGroup']['processes_running_gpb_c2_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['processes_running_gpb_c2_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify external port status'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['external_port_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['external_port_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['external_port_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['external_port_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify OC3 connection status'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['oc3_conn_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['oc3_conn_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['oc3_conn_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['oc3_conn_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the Synchronization Priority of the RNC'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['sync_priority_rnc_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['sync_priority_rnc_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['sync_priority_rnc_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['sync_priority_rnc_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify that the board configuration and the SW allocation matches the printout in the attached file'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['board_config_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['board_config_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['board_config_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['board_config_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('RNC Froid inconsistency check'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['rnc_froid_inconsistency_checked'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['rnc_froid_inconsistency_checked_notes'] !== "" && !empty($firstGroup['FirstGroup']['rnc_froid_inconsistency_checked_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['rnc_froid_inconsistency_checked_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the CC and DC Devices'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['cc_dc_devices_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['cc_dc_devices_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['cc_dc_devices_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['cc_dc_devices_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify with the Customer on the SBHO readiness'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['sbho_readiness_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['sbho_readiness_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['sbho_readiness_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['sbho_readiness_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify that the OAM settings in the RNC and OAM router are the same '); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['oam_settings_same_in_rnc_router'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['oam_settings_same_in_rnc_router_notes'] !== "" && !empty($firstGroup['FirstGroup']['oam_settings_same_in_rnc_router_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['oam_settings_same_in_rnc_router_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify AGPS connectivity'); ?></dt>
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

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify NTP server connectivity'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['ntp_server_conn_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['ntp_server_conn_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['ntp_server_conn_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['ntp_server_conn_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify RPU are defined'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['rpu_defined_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['rpu_defined_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['rpu_defined_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['rpu_defined_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify IUCS RANAP ALCAP signaling & AAL2 bearer status'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iucs_ranap_alcap_aal2_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['iucs_ranap_alcap_aal2_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['iucs_ranap_alcap_aal2_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iucs_ranap_alcap_aal2_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify IUPS signaling & PDR status'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iups_signaliing_pdr_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['iups_signaliing_pdr_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['iups_signaliing_pdr_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iups_signaliing_pdr_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify if IUR Links are defined, then verify Iur link status'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iur_links_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['iur_links_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['iur_links_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iur_links_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify that the licenses have been successfully uploaded'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['licenses_uploaded_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['licenses_uploaded_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['licenses_uploaded_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['licenses_uploaded_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Check performance counters defined correctly & unused counters are suspended'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['performance_counters_correct_checked'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['performance_counters_correct_checked_notes'] !== "" && !empty($firstGroup['FirstGroup']['performance_counters_correct_checked_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['performance_counters_correct_checked_notes'];?>
&nbsp;
</dd>
<?php endif;?>

                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Save a startable CV in the RNC'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['startable_cv_rnc_saved'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['startable_cv_rnc_saved_notes'] !== "" && !empty($firstGroup['FirstGroup']['startable_cv_rnc_saved_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['startable_cv_rnc_saved_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Save a post kget on the node'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['post_kget_node_saved'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['post_kget_node_saved_notes'] !== "" && !empty($firstGroup['FirstGroup']['post_kget_node_saved_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['post_kget_node_saved_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Collect the dcgm from the RNC'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['dcgm_from_rnc_collected'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['dcgm_from_rnc_collected_notes'] !== "" && !empty($firstGroup['FirstGroup']['dcgm_from_rnc_collected_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['dcgm_from_rnc_collected_notes'];?>
&nbsp;
</dd>
<?php endif;?>

	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>
