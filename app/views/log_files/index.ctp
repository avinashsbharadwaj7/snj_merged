<div class="logFiles index">
	<h2><?php __('Log Files');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('report_id');?></th>
			<th><?php echo $this->Paginator->sort('file_name');?></th>
			<th><?php echo $this->Paginator->sort('mime_type');?></th>
			<th><?php echo $this->Paginator->sort('file_size');?></th>
			<th><?php echo $this->Paginator->sort('upload_time');?></th>
			<th><?php echo $this->Paginator->sort('file_category');?></th>
			<th><?php echo $this->Paginator->sort('file_path');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($logFiles as $logFile):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $logFile['LogFile']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($logFile['Report']['id'], array('controller' => 'reports', 'action' => 'view', $logFile['Report']['id'])); ?>
		</td>
		<td><?php echo $logFile['LogFile']['file_name']; ?>&nbsp;</td>
		<td><?php echo $logFile['LogFile']['mime_type']; ?>&nbsp;</td>
		<td><?php echo $logFile['LogFile']['file_size']; ?>&nbsp;</td>
		<td><?php echo $logFile['LogFile']['upload_time']; ?>&nbsp;</td>
		<td><?php echo $logFile['LogFile']['file_category']; ?>&nbsp;</td>
		<td><?php echo $logFile['LogFile']['file_path']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $logFile['LogFile']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $logFile['LogFile']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $logFile['LogFile']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $logFile['LogFile']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Log File', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>