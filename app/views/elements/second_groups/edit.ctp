<div class="secondGroups form">
<?php echo $this->Form->create('SecondGroup');?>
	<fieldset>
		<legend><?php __('Edit Second Group'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('report_id');
		echo $this->Form->input('date');
		echo $this->Form->input('rnc_date_time_set');
		echo $this->Form->input('rnc_date_time_set_notes');
		echo $this->Form->input('software_package_verification');
		echo $this->Form->input('software_package_verification_notes');
		echo $this->Form->input('reqd_software_installed');
		echo $this->Form->input('reqd_software_installed_notes');
		echo $this->Form->input('software_upgraded');
		echo $this->Form->input('software_upgraded_notes');
		echo $this->Form->input('spb_types_changed_verified');
		echo $this->Form->input('spb_types_changed_verified_notes');
		echo $this->Form->input('rnc_licenses_requested');
		echo $this->Form->input('rnc_licenses_requested_notes');
		echo $this->Form->input('license_key_file_imported');
		echo $this->Form->input('license_key_file_imported_notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('SecondGroup.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('SecondGroup.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Second Groups', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>