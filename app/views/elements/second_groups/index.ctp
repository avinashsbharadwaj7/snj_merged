<div class="secondGroups index">
	<h2><?php __('Second Groups');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('report_id');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('rnc_date_time_set');?></th>
			<th><?php echo $this->Paginator->sort('rnc_date_time_set_notes');?></th>
			<th><?php echo $this->Paginator->sort('software_package_verification');?></th>
			<th><?php echo $this->Paginator->sort('software_package_verification_notes');?></th>
			<th><?php echo $this->Paginator->sort('reqd_software_installed');?></th>
			<th><?php echo $this->Paginator->sort('reqd_software_installed_notes');?></th>
			<th><?php echo $this->Paginator->sort('software_upgraded');?></th>
			<th><?php echo $this->Paginator->sort('software_upgraded_notes');?></th>
			<th><?php echo $this->Paginator->sort('spb_types_changed_verified');?></th>
			<th><?php echo $this->Paginator->sort('spb_types_changed_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('rnc_licenses_requested');?></th>
			<th><?php echo $this->Paginator->sort('rnc_licenses_requested_notes');?></th>
			<th><?php echo $this->Paginator->sort('license_key_file_imported');?></th>
			<th><?php echo $this->Paginator->sort('license_key_file_imported_notes');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($secondGroups as $secondGroup):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $secondGroup['SecondGroup']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($secondGroup['Report']['id'], array('controller' => 'reports', 'action' => 'view', $secondGroup['Report']['id'])); ?>
		</td>
		<td><?php echo $secondGroup['SecondGroup']['date']; ?>&nbsp;</td>
		<td><?php echo $secondGroup['SecondGroup']['rnc_date_time_set']; ?>&nbsp;</td>
		<td><?php echo $secondGroup['SecondGroup']['rnc_date_time_set_notes']; ?>&nbsp;</td>
		<td><?php echo $secondGroup['SecondGroup']['software_package_verification']; ?>&nbsp;</td>
		<td><?php echo $secondGroup['SecondGroup']['software_package_verification_notes']; ?>&nbsp;</td>
		<td><?php echo $secondGroup['SecondGroup']['reqd_software_installed']; ?>&nbsp;</td>
		<td><?php echo $secondGroup['SecondGroup']['reqd_software_installed_notes']; ?>&nbsp;</td>
		<td><?php echo $secondGroup['SecondGroup']['software_upgraded']; ?>&nbsp;</td>
		<td><?php echo $secondGroup['SecondGroup']['software_upgraded_notes']; ?>&nbsp;</td>
		<td><?php echo $secondGroup['SecondGroup']['spb_types_changed_verified']; ?>&nbsp;</td>
		<td><?php echo $secondGroup['SecondGroup']['spb_types_changed_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $secondGroup['SecondGroup']['rnc_licenses_requested']; ?>&nbsp;</td>
		<td><?php echo $secondGroup['SecondGroup']['rnc_licenses_requested_notes']; ?>&nbsp;</td>
		<td><?php echo $secondGroup['SecondGroup']['license_key_file_imported']; ?>&nbsp;</td>
		<td><?php echo $secondGroup['SecondGroup']['license_key_file_imported_notes']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $secondGroup['SecondGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $secondGroup['SecondGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $secondGroup['SecondGroup']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $secondGroup['SecondGroup']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Second Group', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>