<div class="firstGroups form">
<?php echo $this->Form->create('FirstGroup');?>
	<fieldset>
		<legend><?php __('Edit First Group'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('report_id');
		echo $this->Form->input('date');
		echo $this->Form->input('serial_ethernet_setup');
		echo $this->Form->input('serial_ethernet_setup_notes');
		echo $this->Form->input('local_connectivity_verification');
		echo $this->Form->input('local_connectivity_verification_notes');
		echo $this->Form->input('oss_rc__lan_connection_verification');
		echo $this->Form->input('oss_rc_lan_connection_verification_notes');
		echo $this->Form->input('prerequisites_verification');
		echo $this->Form->input('prerequisites_verification_notes');
		echo $this->Form->input('oc3_verification');
		echo $this->Form->input('oc3_verification_notes');
		echo $this->Form->input('min_config_rnc_verification');
		echo $this->Form->input('min_config_rnc_verification_notes');
		echo $this->Form->input('remainder_rnc_config_verification');
		echo $this->Form->input('remainder_rnc_config_verification_notes');
		echo $this->Form->input('eti_pg_compatible_verification');
		echo $this->Form->input('eti_pg_compatible_verification_notes');
		echo $this->Form->input('rnc_wiring_verification');
		echo $this->Form->input('rnc_wiring_verification_notes');
		echo $this->Form->input('cables_cmxb_app_verification');
		echo $this->Form->input('cables_cmxb_app_verification_notes');
		echo $this->Form->input('subracks_power_verification');
		echo $this->Form->input('subracks_power_verification_notes');
		echo $this->Form->input('fans_power_verification');
		echo $this->Form->input('fans_power_verification_notes');
		echo $this->Form->input('rnc_led_behaviour_verification');
		echo $this->Form->input('rnc_led_behaviour_verification_notes');
		echo $this->Form->input('rnc_backup_completion');
		echo $this->Form->input('rnc_backup_completion_notes');
		echo $this->Form->input('node_initial_health_check_performed');
		echo $this->Form->input('node_initial_health_check_performed_notes');
		echo $this->Form->input('initial_kget_saved');
		echo $this->Form->input('initial_kget_saved_notes');
		echo $this->Form->input('startable_cv_rnc_saved');
		echo $this->Form->input('startable_cv_rnc_saved_notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('FirstGroup.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('FirstGroup.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List First Groups', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>