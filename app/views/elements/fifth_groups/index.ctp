<div class="fifthGroups index">
	<h2><?php __('Fifth Groups');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('report_id');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('aal_termination_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('aal_termination_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('nni_saal_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('nni_saal_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('mtpb_signaling_status_msc_verified');?></th>
			<th><?php echo $this->Paginator->sort('mtpb_signaling_status_msc_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('mtpb_signaling_status_mgw_verified');?></th>
			<th><?php echo $this->Paginator->sort('mtpb_signaling_status_mgw_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('sccp_signaling_pt_verified');?></th>
			<th><?php echo $this->Paginator->sort('sccp_signaling_pt_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('aal_path_status_mgw_verified');?></th>
			<th><?php echo $this->Paginator->sort('aal_path_status_mgw_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('ran_ap_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('ran_ap_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('aal_redundancy_verified');?></th>
			<th><?php echo $this->Paginator->sort('aal_redundancy_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('basic_circuit_switched_call_testing_verified');?></th>
			<th><?php echo $this->Paginator->sort('basic_circuit_switched_call_testing_verified_notes');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($fifthGroups as $fifthGroup):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $fifthGroup['FifthGroup']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($fifthGroup['Report']['id'], array('controller' => 'reports', 'action' => 'view', $fifthGroup['Report']['id'])); ?>
		</td>
		<td><?php echo $fifthGroup['FifthGroup']['date']; ?>&nbsp;</td>
		<td><?php echo $fifthGroup['FifthGroup']['aal_termination_status_verified']; ?>&nbsp;</td>
		<td><?php echo $fifthGroup['FifthGroup']['aal_termination_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $fifthGroup['FifthGroup']['nni_saal_status_verified']; ?>&nbsp;</td>
		<td><?php echo $fifthGroup['FifthGroup']['nni_saal_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $fifthGroup['FifthGroup']['mtpb_signaling_status_msc_verified']; ?>&nbsp;</td>
		<td><?php echo $fifthGroup['FifthGroup']['mtpb_signaling_status_msc_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $fifthGroup['FifthGroup']['mtpb_signaling_status_mgw_verified']; ?>&nbsp;</td>
		<td><?php echo $fifthGroup['FifthGroup']['mtpb_signaling_status_mgw_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $fifthGroup['FifthGroup']['sccp_signaling_pt_verified']; ?>&nbsp;</td>
		<td><?php echo $fifthGroup['FifthGroup']['sccp_signaling_pt_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $fifthGroup['FifthGroup']['aal_path_status_mgw_verified']; ?>&nbsp;</td>
		<td><?php echo $fifthGroup['FifthGroup']['aal_path_status_mgw_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $fifthGroup['FifthGroup']['ran_ap_status_verified']; ?>&nbsp;</td>
		<td><?php echo $fifthGroup['FifthGroup']['ran_ap_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $fifthGroup['FifthGroup']['aal_redundancy_verified']; ?>&nbsp;</td>
		<td><?php echo $fifthGroup['FifthGroup']['aal_redundancy_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $fifthGroup['FifthGroup']['basic_circuit_switched_call_testing_verified']; ?>&nbsp;</td>
		<td><?php echo $fifthGroup['FifthGroup']['basic_circuit_switched_call_testing_verified_notes']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $fifthGroup['FifthGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $fifthGroup['FifthGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $fifthGroup['FifthGroup']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $fifthGroup['FifthGroup']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Fifth Group', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>