<div class="fourthQas index">
	<h2><?php __('Fourth Qas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('report_id');?></th>
			<th><?php echo $this->Paginator->sort('timestamp');?></th>
			<th><?php echo $this->Paginator->sort('emergency_call_redirect');?></th>
			<th><?php echo $this->Paginator->sort('emergency_call_redirect_notes');?></th>
			<th><?php echo $this->Paginator->sort('service_based_handover');?></th>
			<th><?php echo $this->Paginator->sort('service_based_handover_notes');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($fourthQas as $fourthQa):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $fourthQa['FourthQa']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($fourthQa['Report']['id'], array('controller' => 'reports', 'action' => 'view', $fourthQa['Report']['id'])); ?>
		</td>
		<td><?php echo $fourthQa['FourthQa']['timestamp']; ?>&nbsp;</td>
		<td><?php echo $fourthQa['FourthQa']['emergency_call_redirect']; ?>&nbsp;</td>
		<td><?php echo $fourthQa['FourthQa']['emergency_call_redirect_notes']; ?>&nbsp;</td>
		<td><?php echo $fourthQa['FourthQa']['service_based_handover']; ?>&nbsp;</td>
		<td><?php echo $fourthQa['FourthQa']['service_based_handover_notes']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $fourthQa['FourthQa']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $fourthQa['FourthQa']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $fourthQa['FourthQa']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $fourthQa['FourthQa']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Fourth Qa', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>