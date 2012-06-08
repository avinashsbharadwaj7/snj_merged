<div class="sixthGroups form">
<?php echo $this->Form->create('SixthGroup');?>
	<fieldset>
		<legend><?php __('Edit Sixth Group'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('report_id');
		echo $this->Form->input('date');
		echo $this->Form->input('vlans_config_verified');
		echo $this->Form->input('vlans_config_verified_notes');
		echo $this->Form->input('giga_bit_ethernet_status_verified');
		echo $this->Form->input('giga_bit_ethernet_status_verified_notes');
		echo $this->Form->input('ip_interface_status_verified');
		echo $this->Form->input('ip_interface_status_verified_notes');
		echo $this->Form->input('ip_access_host_gpb_status_verified');
		echo $this->Form->input('ip_access_host_gpb_status_verified_notes');
		echo $this->Form->input('sctp_status_verified');
		echo $this->Form->input('sctp_status_verified_notes');
		echo $this->Form->input('mtbp_signaling_pt_status_verified');
		echo $this->Form->input('mtbp_signaling_pt_status_verified_notes');
		echo $this->Form->input('mu_association_status_verified');
		echo $this->Form->input('mu_association_status_verified_notes');
		echo $this->Form->input('mtpb_signaling_and_signaling_route_status_verified');
		echo $this->Form->input('mtpb_signaling_and_signaling_route_status_verified_notes');
		echo $this->Form->input('mtpb_access_pt_status_verified');
		echo $this->Form->input('mtpb_access_pt_status_verified_notes');
		echo $this->Form->input('sccp_signaling_pt_status_verified');
		echo $this->Form->input('sccp_signaling_pt_status_verified_notes');
		echo $this->Form->input('sccp_local_access_pt_status_verified');
		echo $this->Form->input('sccp_local_access_pt_status_verified_notes');
		echo $this->Form->input('scp_remote_access_pt_status_verified');
		echo $this->Form->input('scp_remote_access_pt_status_verified_notes');
		echo $this->Form->input('signaling_conn_redundancy_tested');
		echo $this->Form->input('signaling_conn_redundancy_tested_notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('SixthGroup.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('SixthGroup.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sixth Groups', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>