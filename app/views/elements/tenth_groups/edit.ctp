<div class="tenthGroups form">
<?php echo $this->Form->create('TenthGroup');?>
	<fieldset>
		<legend><?php __('Edit Tenth Group'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('report_id');
		echo $this->Form->input('date');
		echo $this->Form->input('kget_audit_sent');
		echo $this->Form->input('kget_audit_sent_notes');
		echo $this->Form->input('audit_script_ran');
		echo $this->Form->input('audit_script_ran_notes');
		echo $this->Form->input('command_log_status_verified');
		echo $this->Form->input('command_log_status_verified_notes');
		echo $this->Form->input('oss_rc_connectivity');
		echo $this->Form->input('oss_rc_connectivity_notes');
		echo $this->Form->input('outstanding_alarms_cleared');
		echo $this->Form->input('outstanding_alarms_cleared_notes');
		echo $this->Form->input('alarm_testing_mnrc_performed');
		echo $this->Form->input('alarm_testing_mnrc_performed_notes');
		echo $this->Form->input('reset_all_logging_default');
		echo $this->Form->input('reset_all_logging_default_notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('TenthGroup.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('TenthGroup.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tenth Groups', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>