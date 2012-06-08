<div class="firstQas index">
	<h2><?php __('First Qas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('report_id');?></th>
			<th><?php echo $this->Paginator->sort('check_sw_level');?></th>
			<th><?php echo $this->Paginator->sort('check_sw_level_notes');?></th>
			<th><?php echo $this->Paginator->sort('check_health_checks_done');?></th>
			<th><?php echo $this->Paginator->sort('check_health_checks_done_notes');?></th>
			<th><?php echo $this->Paginator->sort('check_alarms');?></th>
			<th><?php echo $this->Paginator->sort('check_alarms_notes');?></th>
			<th><?php echo $this->Paginator->sort('check_iucs_iups_config_atm_ip');?></th>
			<th><?php echo $this->Paginator->sort('check_iucs_iups_config_atm_ip_notes');?></th>
			<th><?php echo $this->Paginator->sort('check_iur_atm_ip');?></th>
			<th><?php echo $this->Paginator->sort('check_iur_atm_ip_notes');?></th>
			<th><?php echo $this->Paginator->sort('check_c2_capacity_incease');?></th>
			<th><?php echo $this->Paginator->sort('check_c2_capacity_incease_notes');?></th>
			<th><?php echo $this->Paginator->sort('check_external_port_status');?></th>
			<th><?php echo $this->Paginator->sort('check_external_port_status_notes');?></th>
			<th><?php echo $this->Paginator->sort('check_oc3_conn');?></th>
			<th><?php echo $this->Paginator->sort('check_oc3_conn_notes');?></th>
			<th><?php echo $this->Paginator->sort('check_synchronization');?></th>
			<th><?php echo $this->Paginator->sort('check_synchronization_notes');?></th>
			<th><?php echo $this->Paginator->sort('check_hw_config');?></th>
			<th><?php echo $this->Paginator->sort('check_hw_config_notes');?></th>
			<th><?php echo $this->Paginator->sort('check_rnc_froid_inconsistency');?></th>
			<th><?php echo $this->Paginator->sort('check_rnc_froid_inconsistency_notes');?></th>
			<th><?php echo $this->Paginator->sort('check_cc_dc_device_states');?></th>
			<th><?php echo $this->Paginator->sort('check_cc_dc_device_states_notes');?></th>
			<th><?php echo $this->Paginator->sort('check_site_availablility');?></th>
			<th><?php echo $this->Paginator->sort('check_site_availablility_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_rnc_oam_settings');?></th>
			<th><?php echo $this->Paginator->sort('verify_rnc_oam_settings_notes');?></th>
			<th><?php echo $this->Paginator->sort('check_agps_connectivity');?></th>
			<th><?php echo $this->Paginator->sort('check_agps_connectivity_notes');?></th>
			<th><?php echo $this->Paginator->sort('check_ntp_server_connectivity');?></th>
			<th><?php echo $this->Paginator->sort('check_ntp_server_connectivity_notes');?></th>
			<th><?php echo $this->Paginator->sort('check_iucs_ranap_alcap_aal2');?></th>
			<th><?php echo $this->Paginator->sort('check_iucs_ranap_alcap_aal2_notes');?></th>
			<th><?php echo $this->Paginator->sort('check_iups_pdr_status');?></th>
			<th><?php echo $this->Paginator->sort('check_iups_pdr_status_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_iur_links');?></th>
			<th><?php echo $this->Paginator->sort('verify_iur_links_notes');?></th>
			<th><?php echo $this->Paginator->sort('check_updated_license_installed');?></th>
			<th><?php echo $this->Paginator->sort('check_updated_license_installed_notes');?></th>
			<th><?php echo $this->Paginator->sort('check_performance_counters');?></th>
			<th><?php echo $this->Paginator->sort('check_performance_counters_notes');?></th>
			<th><?php echo $this->Paginator->sort('check_time_set');?></th>
			<th><?php echo $this->Paginator->sort('check_time_set_notes');?></th>
			<th><?php echo $this->Paginator->sort('check_ftp_server_conn');?></th>
			<th><?php echo $this->Paginator->sort('check_ftp_server_conn_notes');?></th>
			<th><?php echo $this->Paginator->sort('iucs_ranap_vcc_tests_to_msc');?></th>
			<th><?php echo $this->Paginator->sort('iucs_ranap_vcc_tests_to_msc_notes');?></th>
			<th><?php echo $this->Paginator->sort('iucs_ranap_vcc_tests_to_mgw');?></th>
			<th><?php echo $this->Paginator->sort('iucs_ranap_vcc_tests_to_mgw_notes');?></th>
			<th><?php echo $this->Paginator->sort('iucs_aal2_vcc_mgw');?></th>
			<th><?php echo $this->Paginator->sort('iucs_aal2_vcc_mgw_notes');?></th>
			<th><?php echo $this->Paginator->sort('iucs_over_ip');?></th>
			<th><?php echo $this->Paginator->sort('iucs_over_ip_notes');?></th>
			<th><?php echo $this->Paginator->sort('iur_aal5_vcc_tests_to_rnc');?></th>
			<th><?php echo $this->Paginator->sort('iur_aal5_vcc_tests_to_rnc_notes');?></th>
			<th><?php echo $this->Paginator->sort('iur_aal2_vcc_tests_to_rnc');?></th>
			<th><?php echo $this->Paginator->sort('iur_aal2_vcc_tests_to_rnc_notes');?></th>
			<th><?php echo $this->Paginator->sort('iur_over_ip');?></th>
			<th><?php echo $this->Paginator->sort('iur_over_ip_notes');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($firstQas as $firstQa):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $firstQa['FirstQa']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($firstQa['Report']['id'], array('controller' => 'reports', 'action' => 'view', $firstQa['Report']['id'])); ?>
		</td>
		<td><?php echo $firstQa['FirstQa']['check_sw_level']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_sw_level_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_health_checks_done']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_health_checks_done_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_alarms']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_alarms_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_iucs_iups_config_atm_ip']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_iucs_iups_config_atm_ip_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_iur_atm_ip']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_iur_atm_ip_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_c2_capacity_incease']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_c2_capacity_incease_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_external_port_status']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_external_port_status_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_oc3_conn']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_oc3_conn_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_synchronization']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_synchronization_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_hw_config']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_hw_config_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_rnc_froid_inconsistency']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_rnc_froid_inconsistency_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_cc_dc_device_states']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_cc_dc_device_states_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_site_availablility']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_site_availablility_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['verify_rnc_oam_settings']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['verify_rnc_oam_settings_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_agps_connectivity']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_agps_connectivity_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_ntp_server_connectivity']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_ntp_server_connectivity_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_iucs_ranap_alcap_aal2']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_iucs_ranap_alcap_aal2_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_iups_pdr_status']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_iups_pdr_status_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['verify_iur_links']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['verify_iur_links_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_updated_license_installed']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_updated_license_installed_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_performance_counters']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_performance_counters_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_time_set']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_time_set_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_ftp_server_conn']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['check_ftp_server_conn_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['iucs_ranap_vcc_tests_to_msc']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['iucs_ranap_vcc_tests_to_msc_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['iucs_ranap_vcc_tests_to_mgw']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['iucs_ranap_vcc_tests_to_mgw_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['iucs_aal2_vcc_mgw']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['iucs_aal2_vcc_mgw_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['iucs_over_ip']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['iucs_over_ip_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['iur_aal5_vcc_tests_to_rnc']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['iur_aal5_vcc_tests_to_rnc_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['iur_aal2_vcc_tests_to_rnc']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['iur_aal2_vcc_tests_to_rnc_notes']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['iur_over_ip']; ?>&nbsp;</td>
		<td><?php echo $firstQa['FirstQa']['iur_over_ip_notes']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $firstQa['FirstQa']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $firstQa['FirstQa']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $firstQa['FirstQa']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $firstQa['FirstQa']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New First Qa', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>