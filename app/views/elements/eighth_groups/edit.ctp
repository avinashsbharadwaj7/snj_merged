<div class="eighthGroups form">
<?php echo $this->Form->create('EighthGroup');?>
	<fieldset>
		<legend><?php __('Edit Eighth Group'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('report_id');
		echo $this->Form->input('date');
		echo $this->Form->input('aal_termination_pt_iur_verified');
		echo $this->Form->input('aal_termination_pt_iur_verified_notes');
		echo $this->Form->input('nni_saal_layer_status_iur_verified');
		echo $this->Form->input('nni_saal_layer_status_iur_verified_notes');
		echo $this->Form->input('mptb_signaling_status_iur_verified');
		echo $this->Form->input('mptb_aal__termination_pt_iur_verifiedsignaling_status_iur_verified_notes');
		echo $this->Form->input('sccp_signaling_pt_status_verified');
		echo $this->Form->input('sccp_signaling_pt_status_verified_notes');
		echo $this->Form->input('aal_path_status_iur_verified');
		echo $this->Form->input('aal_path_status_iur_verified_notes');
		echo $this->Form->input('rns_ap_status_iur_verified');
		echo $this->Form->input('rns_ap_status_iur_verified_notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('EighthGroup.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('EighthGroup.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Eighth Groups', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>