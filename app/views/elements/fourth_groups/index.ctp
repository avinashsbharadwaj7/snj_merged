<div class="fourthGroups index">
	<h2><?php __('Fourth Groups');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('report_id');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('toycell_config_files_loaded');?></th>
			<th><?php echo $this->Paginator->sort('toycell_config_files_loaded_notes');?></th>
			<th><?php echo $this->Paginator->sort('toycell_rnc_prepared');?></th>
			<th><?php echo $this->Paginator->sort('toycell_rnc_prepared_notes');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($fourthGroups as $fourthGroup):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $fourthGroup['FourthGroup']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($fourthGroup['Report']['id'], array('controller' => 'reports', 'action' => 'view', $fourthGroup['Report']['id'])); ?>
		</td>
		<td><?php echo $fourthGroup['FourthGroup']['date']; ?>&nbsp;</td>
		<td><?php echo $fourthGroup['FourthGroup']['toycell_config_files_loaded']; ?>&nbsp;</td>
		<td><?php echo $fourthGroup['FourthGroup']['toycell_config_files_loaded_notes']; ?>&nbsp;</td>
		<td><?php echo $fourthGroup['FourthGroup']['toycell_rnc_prepared']; ?>&nbsp;</td>
		<td><?php echo $fourthGroup['FourthGroup']['toycell_rnc_prepared_notes']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $fourthGroup['FourthGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $fourthGroup['FourthGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $fourthGroup['FourthGroup']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $fourthGroup['FourthGroup']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Fourth Group', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>