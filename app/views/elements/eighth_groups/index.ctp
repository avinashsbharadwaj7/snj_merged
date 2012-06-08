<div class="eighthGroups index">
	<h2><?php __('Eighth Groups');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('report_id');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('aal_termination_pt_iur_verified');?></th>
			<th><?php echo $this->Paginator->sort('aal_termination_pt_iur_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('nni_saal_layer_status_iur_verified');?></th>
			<th><?php echo $this->Paginator->sort('nni_saal_layer_status_iur_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('mptb_signaling_status_iur_verified');?></th>
			<th><?php echo $this->Paginator->sort('mptb_signaling_status_iur_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('sccp_signaling_pt_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('sccp_signaling_pt_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('aal_path_status_iur_verified');?></th>
			<th><?php echo $this->Paginator->sort('aal_path_status_iur_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('rns_ap_status_iur_verified');?></th>
			<th><?php echo $this->Paginator->sort('rns_ap_status_iur_verified_notes');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($eighthGroups as $eighthGroup):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $eighthGroup['EighthGroup']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($eighthGroup['Report']['id'], array('controller' => 'reports', 'action' => 'view', $eighthGroup['Report']['id'])); ?>
		</td>
		<td><?php echo $eighthGroup['EighthGroup']['date']; ?>&nbsp;</td>
		<td><?php echo $eighthGroup['EighthGroup']['aal_termination_pt_iur_verified']; ?>&nbsp;</td>
		<td><?php echo $eighthGroup['EighthGroup']['aal_termination_pt_iur_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $eighthGroup['EighthGroup']['nni_saal_layer_status_iur_verified']; ?>&nbsp;</td>
		<td><?php echo $eighthGroup['EighthGroup']['nni_saal_layer_status_iur_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $eighthGroup['EighthGroup']['mptb_signaling_status_iur_verified']; ?>&nbsp;</td>
		<td><?php echo $eighthGroup['EighthGroup']['mptb_signaling_status_iur_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $eighthGroup['EighthGroup']['sccp_signaling_pt_status_verified']; ?>&nbsp;</td>
		<td><?php echo $eighthGroup['EighthGroup']['sccp_signaling_pt_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $eighthGroup['EighthGroup']['aal_path_status_iur_verified']; ?>&nbsp;</td>
		<td><?php echo $eighthGroup['EighthGroup']['aal_path_status_iur_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $eighthGroup['EighthGroup']['rns_ap_status_iur_verified']; ?>&nbsp;</td>
		<td><?php echo $eighthGroup['EighthGroup']['rns_ap_status_iur_verified_notes']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $eighthGroup['EighthGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $eighthGroup['EighthGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $eighthGroup['EighthGroup']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $eighthGroup['EighthGroup']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Eighth Group', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>