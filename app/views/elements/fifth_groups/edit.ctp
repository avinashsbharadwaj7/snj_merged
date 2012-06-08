<div class="fifthGroups form">
<?php echo $this->Form->create('FifthGroup');?>
	<fieldset>
		<legend><?php __('Edit Fifth Group'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('report_id');
		echo $this->Form->input('date');
		echo $this->Form->input('aal_termination_status_verified');
		echo $this->Form->input('aal_termination_status_verified_notes');
		echo $this->Form->input('nni_saal_status_verified');
		echo $this->Form->input('nni_saal_status_verified_notes');
		echo $this->Form->input('mtpb_signaling_status_msc_verified');
		echo $this->Form->input('mtpb_signaling_status_msc_verified_notes');
		echo $this->Form->input('mtpb_signaling_status_mgw_verified');
		echo $this->Form->input('mtpb_signaling_status_mgw_verified_notes');
		echo $this->Form->input('sccp_signaling_pt_verified');
		echo $this->Form->input('sccp_signaling_pt_verified_notes');
		echo $this->Form->input('aal_path_status_mgw_verified');
		echo $this->Form->input('aal_path_status_mgw_verified_notes');
		echo $this->Form->input('ran_ap_status_verified');
		echo $this->Form->input('ran_ap_status_verified_notes');
		echo $this->Form->input('aal_redundancy_verified');
		echo $this->Form->input('aal_redundancy_verified_notes');
		echo $this->Form->input('basic_circuit_switched_call_testing_verified');
		echo $this->Form->input('basic_circuit_switched_call_testing_verified_notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('FifthGroup.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('FifthGroup.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Fifth Groups', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>