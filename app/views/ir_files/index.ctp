<div class="irFiles index">
	<h2><?php __('Ir Files');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('ir_module_id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('path');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('size');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($irFiles as $irFile):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $irFile['IrFile']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($irFile['IrModule']['id'], array('controller' => 'ir_modules', 'action' => 'view', $irFile['IrModule']['id'])); ?>
		</td>
		<td><?php echo $irFile['IrFile']['name']; ?>&nbsp;</td>
		<td><?php echo $irFile['IrFile']['path']; ?>&nbsp;</td>
		<td><?php echo $irFile['IrFile']['type']; ?>&nbsp;</td>
		<td><?php echo $irFile['IrFile']['size']; ?>&nbsp;</td>
		<td><?php echo $irFile['IrFile']['created']; ?>&nbsp;</td>
		<td><?php echo $irFile['IrFile']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $irFile['IrFile']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $irFile['IrFile']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $irFile['IrFile']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $irFile['IrFile']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Ir File', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Ir Modules', true), array('controller' => 'ir_modules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ir Module', true), array('controller' => 'ir_modules', 'action' => 'add')); ?> </li>
	</ul>
</div>