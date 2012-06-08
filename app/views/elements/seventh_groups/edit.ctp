<div class="seventhGroups form">
<?php echo $this->Form->create('SeventhGroup');?>
	<fieldset>
		<legend><?php __('Edit Seventh Group'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('report_id');
		echo $this->Form->input('date');
		echo $this->Form->input('vlans_config_iups_up_verified');
		echo $this->Form->input('vlans_config_iups_up_verified_notes');
		echo $this->Form->input('exchange_terminal_ip_status_verified');
		echo $this->Form->input('exchange_terminal_ip_status_verified_notes');
		echo $this->Form->input('gigabit_ethernet_status_verified');
		echo $this->Form->input('gigabit_ethernet_status_verified_notes');
		echo $this->Form->input('ip_interface_status_verified');
		echo $this->Form->input('ip_interface_status_verified_notes');
		echo $this->Form->input('ip_access_host_spb_status_verified');
		echo $this->Form->input('ip_access_host_spb_status_verified_notes');
		echo $this->Form->input('ip_eth_packet_data_routers_status_verified');
		echo $this->Form->input('ip_eth_packet_data_routers_status_verified_notes');
		echo $this->Form->input('iups_default_router_conn_verified');
		echo $this->Form->input('iups_default_router_conn_verified_notes');
		echo $this->Form->input('pdr_redundancy_verified');
		echo $this->Form->input('pdr_redundancy_verified_notes');
		echo $this->Form->input('packet_switch_calls_performed');
		echo $this->Form->input('packet_switch_calls_performed_notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('SeventhGroup.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('SeventhGroup.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Seventh Groups', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>