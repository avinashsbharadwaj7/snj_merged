<div class="sixthGroups index">
	<h2><?php __('Sixth Groups');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('report_id');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('vlans_config_verified');?></th>
			<th><?php echo $this->Paginator->sort('vlans_config_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('giga_bit_ethernet_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('giga_bit_ethernet_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('ip_interface_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('ip_interface_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('ip_access_host_gpb_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('ip_access_host_gpb_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('sctp_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('sctp_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('mtbp_signaling_pt_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('mtbp_signaling_pt_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('mu_association_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('mu_association_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('mtpb_signaling_and_signaling_route_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('mtpb_signaling_and_signaling_route_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('mtpb_access_pt_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('mtpb_access_pt_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('sccp_signaling_pt_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('sccp_signaling_pt_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('sccp_local_access_pt_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('sccp_local_access_pt_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('scp_remote_access_pt_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('scp_remote_access_pt_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('signaling_conn_redundancy_tested');?></th>
			<th><?php echo $this->Paginator->sort('signaling_conn_redundancy_tested_notes');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($sixthGroups as $sixthGroup):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $sixthGroup['SixthGroup']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($sixthGroup['Report']['id'], array('controller' => 'reports', 'action' => 'view', $sixthGroup['Report']['id'])); ?>
		</td>
		<td><?php echo $sixthGroup['SixthGroup']['date']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['vlans_config_verified']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['vlans_config_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['giga_bit_ethernet_status_verified']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['giga_bit_ethernet_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['ip_interface_status_verified']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['ip_interface_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['ip_access_host_gpb_status_verified']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['ip_access_host_gpb_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['sctp_status_verified']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['sctp_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['mtbp_signaling_pt_status_verified']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['mtbp_signaling_pt_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['mu_association_status_verified']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['mu_association_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['mtpb_signaling_and_signaling_route_status_verified']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['mtpb_signaling_and_signaling_route_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['mtpb_access_pt_status_verified']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['mtpb_access_pt_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['sccp_signaling_pt_status_verified']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['sccp_signaling_pt_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['sccp_local_access_pt_status_verified']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['sccp_local_access_pt_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['scp_remote_access_pt_status_verified']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['scp_remote_access_pt_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['signaling_conn_redundancy_tested']; ?>&nbsp;</td>
		<td><?php echo $sixthGroup['SixthGroup']['signaling_conn_redundancy_tested_notes']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $sixthGroup['SixthGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $sixthGroup['SixthGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $sixthGroup['SixthGroup']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $sixthGroup['SixthGroup']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Sixth Group', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>