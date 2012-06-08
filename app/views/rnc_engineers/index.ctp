<div class="rncEngineers index">
	<h2><?php __('Rnc Engineers');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('report_id');?></th>
			<th><?php echo $this->Paginator->sort('engineer_signum');?></th>
			<th><?php echo $this->Paginator->sort('timestamp');?></th>
			<th><?php echo $this->Paginator->sort('removed');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($rncEngineers as $rncEngineer):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $rncEngineer['RncEngineer']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($rncEngineer['Report']['id'], array('controller' => 'reports', 'action' => 'view', $rncEngineer['Report']['id'])); ?>
		</td>
		<td><?php echo $rncEngineer['RncEngineer']['engineer_signum']; ?>&nbsp;</td>
		<td><?php echo $rncEngineer['RncEngineer']['timestamp']; ?>&nbsp;</td>
		<td><?php echo $rncEngineer['RncEngineer']['removed']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $rncEngineer['RncEngineer']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $rncEngineer['RncEngineer']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $rncEngineer['RncEngineer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $rncEngineer['RncEngineer']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Rnc Engineer', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>