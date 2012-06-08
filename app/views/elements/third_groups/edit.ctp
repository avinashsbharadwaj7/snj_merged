<div class="thirdGroups form">
<?php echo $this->Form->create('ThirdGroup');?>
	<fieldset>
		<legend><?php __('Edit Third Group'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('report_id');
		echo $this->Form->input('date');
		echo $this->Form->input('rnc_config_scripts_ran');
		echo $this->Form->input('rnc_config_scripts_ran_notes');
		echo $this->Form->input('sctp_verification');
		echo $this->Form->input('sctp_verification_notes');
		echo $this->Form->input('c_two_capacity_increased');
		echo $this->Form->input('c_two_capacity_increased_notes');
		echo $this->Form->input('process_rebalance_proc_verified');
		echo $this->Form->input('process_rebalance_proc_verified_notes');
		echo $this->Form->input('sctp_after_c_two_increase_verified');
		echo $this->Form->input('sctp_after_c_two_increase_verified_notes');
		echo $this->Form->input('app_reconfigured');
		echo $this->Form->input('app_reconfigured_notes');
		echo $this->Form->input('all_oc_three_connections_verified');
		echo $this->Form->input('all_oc_three_connections_verified_notes');
		echo $this->Form->input('fiber_cabling_to_odf_verified');
		echo $this->Form->input('fiber_cabling_to_odf_verified_notes');
		echo $this->Form->input('ff_mapping_msn_verified');
		echo $this->Form->input('ff_mapping_msn_verified_notes');
		echo $this->Form->input('sync_ref_status_verified');
		echo $this->Form->input('sync_ref_status_verified_notes');
		echo $this->Form->input('tu_sync_status_verified');
		echo $this->Form->input('tu_sync_status_verified_notes');
		echo $this->Form->input('tim_device_status_verified');
		echo $this->Form->input('tim_device_status_verified_notes');
		echo $this->Form->input('sync_in_locked_mode_verified');
		echo $this->Form->input('sync_in_locked_mode_verified_notes');
		echo $this->Form->input('sync_redundancy_test_performed');
		echo $this->Form->input('sync_redundancy_test_performed_notes');
		echo $this->Form->input('agps_connectivity_verified');
		echo $this->Form->input('agps_connectivity_verified_notes');
		echo $this->Form->input('cc_device_verified');
		echo $this->Form->input('cc_device_verified_notes');
		echo $this->Form->input('dc_device_verified');
		echo $this->Form->input('dc_device_verified_notes');
		echo $this->Form->input('ip_connectivity_oss_rc_verified');
		echo $this->Form->input('ip_connectivity_oss_rc_verified_notes');
		echo $this->Form->input('ntp_servers_connectivity_verified');
		echo $this->Form->input('ntp_servers_connectivity_verified_notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ThirdGroup.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ThirdGroup.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Third Groups', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>