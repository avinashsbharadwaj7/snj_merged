<div class="irAdditionalEngineers index">
	<h2><?php __('Ir Additional Engineers');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('ir_module_id');?></th>
			<th><?php echo $this->Paginator->sort('engineer_signum');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($irAdditionalEngineers as $irAdditionalEngineer):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $irAdditionalEngineer['IrAdditionalEngineer']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($irAdditionalEngineer['IrModule']['id'], array('controller' => 'ir_modules', 'action' => 'view', $irAdditionalEngineer['IrModule']['id'])); ?>
		</td>
		<td><?php echo $irAdditionalEngineer['IrAdditionalEngineer']['engineer_signum']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $irAdditionalEngineer['IrAdditionalEngineer']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $irAdditionalEngineer['IrAdditionalEngineer']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $irAdditionalEngineer['IrAdditionalEngineer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $irAdditionalEngineer['IrAdditionalEngineer']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Ir Additional Engineer', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Ir Modules', true), array('controller' => 'ir_modules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ir Module', true), array('controller' => 'ir_modules', 'action' => 'add')); ?> </li>
	</ul>
</div>