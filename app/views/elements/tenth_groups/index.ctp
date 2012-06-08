<div class="tenthGroups index">
	<h2><?php __('Tenth Groups');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('report_id');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('kget_audit_sent');?></th>
			<th><?php echo $this->Paginator->sort('kget_audit_sent_notes');?></th>
			<th><?php echo $this->Paginator->sort('audit_script_ran');?></th>
			<th><?php echo $this->Paginator->sort('audit_script_ran_notes');?></th>
			<th><?php echo $this->Paginator->sort('command_log_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('command_log_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('oss_rc_connectivity');?></th>
			<th><?php echo $this->Paginator->sort('oss_rc_connectivity_notes');?></th>
			<th><?php echo $this->Paginator->sort('outstanding_alarms_cleared');?></th>
			<th><?php echo $this->Paginator->sort('outstanding_alarms_cleared_notes');?></th>
			<th><?php echo $this->Paginator->sort('alarm_testing_mnrc_performed');?></th>
			<th><?php echo $this->Paginator->sort('alarm_testing_mnrc_performed_notes');?></th>
			<th><?php echo $this->Paginator->sort('reset_all_logging_default');?></th>
			<th><?php echo $this->Paginator->sort('reset_all_logging_default_notes');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($tenthGroups as $tenthGroup):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $tenthGroup['TenthGroup']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tenthGroup['Report']['id'], array('controller' => 'reports', 'action' => 'view', $tenthGroup['Report']['id'])); ?>
		</td>
		<td><?php echo $tenthGroup['TenthGroup']['date']; ?>&nbsp;</td>
		<td><?php echo $tenthGroup['TenthGroup']['kget_audit_sent']; ?>&nbsp;</td>
		<td><?php echo $tenthGroup['TenthGroup']['kget_audit_sent_notes']; ?>&nbsp;</td>
		<td><?php echo $tenthGroup['TenthGroup']['audit_script_ran']; ?>&nbsp;</td>
		<td><?php echo $tenthGroup['TenthGroup']['audit_script_ran_notes']; ?>&nbsp;</td>
		<td><?php echo $tenthGroup['TenthGroup']['command_log_status_verified']; ?>&nbsp;</td>
		<td><?php echo $tenthGroup['TenthGroup']['command_log_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $tenthGroup['TenthGroup']['oss_rc_connectivity']; ?>&nbsp;</td>
		<td><?php echo $tenthGroup['TenthGroup']['oss_rc_connectivity_notes']; ?>&nbsp;</td>
		<td><?php echo $tenthGroup['TenthGroup']['outstanding_alarms_cleared']; ?>&nbsp;</td>
		<td><?php echo $tenthGroup['TenthGroup']['outstanding_alarms_cleared_notes']; ?>&nbsp;</td>
		<td><?php echo $tenthGroup['TenthGroup']['alarm_testing_mnrc_performed']; ?>&nbsp;</td>
		<td><?php echo $tenthGroup['TenthGroup']['alarm_testing_mnrc_performed_notes']; ?>&nbsp;</td>
		<td><?php echo $tenthGroup['TenthGroup']['reset_all_logging_default']; ?>&nbsp;</td>
		<td><?php echo $tenthGroup['TenthGroup']['reset_all_logging_default_notes']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $tenthGroup['TenthGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $tenthGroup['TenthGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $tenthGroup['TenthGroup']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tenthGroup['TenthGroup']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tenth Group', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>