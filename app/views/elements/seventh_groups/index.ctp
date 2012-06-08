<div class="seventhGroups index">
	<h2><?php __('Seventh Groups');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('report_id');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('vlans_config_iups_up_verified');?></th>
			<th><?php echo $this->Paginator->sort('vlans_config_iups_up_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('exchange_terminal_ip_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('exchange_terminal_ip_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('gigabit_ethernet_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('gigabit_ethernet_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('ip_interface_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('ip_interface_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('ip_access_host_spb_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('ip_access_host_spb_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('ip_eth_packet_data_routers_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('ip_eth_packet_data_routers_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('iups_default_router_conn_verified');?></th>
			<th><?php echo $this->Paginator->sort('iups_default_router_conn_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('pdr_redundancy_verified');?></th>
			<th><?php echo $this->Paginator->sort('pdr_redundancy_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('packet_switch_calls_performed');?></th>
			<th><?php echo $this->Paginator->sort('packet_switch_calls_performed_notes');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($seventhGroups as $seventhGroup):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $seventhGroup['SeventhGroup']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($seventhGroup['Report']['id'], array('controller' => 'reports', 'action' => 'view', $seventhGroup['Report']['id'])); ?>
		</td>
		<td><?php echo $seventhGroup['SeventhGroup']['date']; ?>&nbsp;</td>
		<td><?php echo $seventhGroup['SeventhGroup']['vlans_config_iups_up_verified']; ?>&nbsp;</td>
		<td><?php echo $seventhGroup['SeventhGroup']['vlans_config_iups_up_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $seventhGroup['SeventhGroup']['exchange_terminal_ip_status_verified']; ?>&nbsp;</td>
		<td><?php echo $seventhGroup['SeventhGroup']['exchange_terminal_ip_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $seventhGroup['SeventhGroup']['gigabit_ethernet_status_verified']; ?>&nbsp;</td>
		<td><?php echo $seventhGroup['SeventhGroup']['gigabit_ethernet_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $seventhGroup['SeventhGroup']['ip_interface_status_verified']; ?>&nbsp;</td>
		<td><?php echo $seventhGroup['SeventhGroup']['ip_interface_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $seventhGroup['SeventhGroup']['ip_access_host_spb_status_verified']; ?>&nbsp;</td>
		<td><?php echo $seventhGroup['SeventhGroup']['ip_access_host_spb_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $seventhGroup['SeventhGroup']['ip_eth_packet_data_routers_status_verified']; ?>&nbsp;</td>
		<td><?php echo $seventhGroup['SeventhGroup']['ip_eth_packet_data_routers_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $seventhGroup['SeventhGroup']['iups_default_router_conn_verified']; ?>&nbsp;</td>
		<td><?php echo $seventhGroup['SeventhGroup']['iups_default_router_conn_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $seventhGroup['SeventhGroup']['pdr_redundancy_verified']; ?>&nbsp;</td>
		<td><?php echo $seventhGroup['SeventhGroup']['pdr_redundancy_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $seventhGroup['SeventhGroup']['packet_switch_calls_performed']; ?>&nbsp;</td>
		<td><?php echo $seventhGroup['SeventhGroup']['packet_switch_calls_performed_notes']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $seventhGroup['SeventhGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $seventhGroup['SeventhGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $seventhGroup['SeventhGroup']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $seventhGroup['SeventhGroup']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Seventh Group', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>