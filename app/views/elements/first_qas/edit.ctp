<div class="firstQas form">
<?php echo $this->Form->create('FirstQa');?>
	<fieldset>
		<legend><?php __('Edit First Qa'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('report_id');
		echo $this->Form->input('check_sw_level');
		echo $this->Form->input('check_sw_level_notes');
		echo $this->Form->input('check_health_checks_done');
		echo $this->Form->input('check_health_checks_done_notes');
		echo $this->Form->input('check_alarms');
		echo $this->Form->input('check_alarms_notes');
		echo $this->Form->input('check_iucs_iups_config_atm_ip');
		echo $this->Form->input('check_iucs_iups_config_atm_ip_notes');
		echo $this->Form->input('check_iur_atm_ip');
		echo $this->Form->input('check_iur_atm_ip_notes');
		echo $this->Form->input('check_c2_capacity_incease');
		echo $this->Form->input('check_c2_capacity_incease_notes');
		echo $this->Form->input('check_external_port_status');
		echo $this->Form->input('check_external_port_status_notes');
		echo $this->Form->input('check_oc3_conn');
		echo $this->Form->input('check_oc3_conn_notes');
		echo $this->Form->input('check_synchronization');
		echo $this->Form->input('check_synchronization_notes');
		echo $this->Form->input('check_hw_config');
		echo $this->Form->input('check_hw_config_notes');
		echo $this->Form->input('check_rnc_froid_inconsistency');
		echo $this->Form->input('check_rnc_froid_inconsistency_notes');
		echo $this->Form->input('check_cc_dc_device_states');
		echo $this->Form->input('check_cc_dc_device_states_notes');
		echo $this->Form->input('check_site_availablility');
		echo $this->Form->input('check_site_availablility_notes');
		echo $this->Form->input('verify_rnc_oam_settings');
		echo $this->Form->input('verify_rnc_oam_settings_notes');
		echo $this->Form->input('check_agps_connectivity');
		echo $this->Form->input('check_agps_connectivity_notes');
		echo $this->Form->input('check_ntp_server_connectivity');
		echo $this->Form->input('check_ntp_server_connectivity_notes');
		echo $this->Form->input('check_iucs_ranap_alcap_aal2');
		echo $this->Form->input('check_iucs_ranap_alcap_aal2_notes');
		echo $this->Form->input('check_iups_pdr_status');
		echo $this->Form->input('check_iups_pdr_status_notes');
		echo $this->Form->input('verify_iur_links');
		echo $this->Form->input('verify_iur_links_notes');
		echo $this->Form->input('check_updated_license_installed');
		echo $this->Form->input('check_updated_license_installed_notes');
		echo $this->Form->input('check_performance_counters');
		echo $this->Form->input('check_performance_counters_notes');
		echo $this->Form->input('check_time_set');
		echo $this->Form->input('check_time_set_notes');
		echo $this->Form->input('check_ftp_server_conn');
		echo $this->Form->input('check_ftp_server_conn_notes');
		echo $this->Form->input('iucs_ranap_vcc_tests_to_msc');
		echo $this->Form->input('iucs_ranap_vcc_tests_to_msc_notes');
		echo $this->Form->input('iucs_ranap_vcc_tests_to_mgw');
		echo $this->Form->input('iucs_ranap_vcc_tests_to_mgw_notes');
		echo $this->Form->input('iucs_aal2_vcc_mgw');
		echo $this->Form->input('iucs_aal2_vcc_mgw_notes');
		echo $this->Form->input('iucs_over_ip');
		echo $this->Form->input('iucs_over_ip_notes');
		echo $this->Form->input('iur_aal5_vcc_tests_to_rnc');
		echo $this->Form->input('iur_aal5_vcc_tests_to_rnc_notes');
		echo $this->Form->input('iur_aal2_vcc_tests_to_rnc');
		echo $this->Form->input('iur_aal2_vcc_tests_to_rnc_notes');
		echo $this->Form->input('iur_over_ip');
		echo $this->Form->input('iur_over_ip_notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('FirstQa.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('FirstQa.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List First Qas', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>