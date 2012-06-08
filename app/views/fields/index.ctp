<?php
/* SVN FILE: $Id$ */
/**
 * Add field view.
 *
 *
 * PHP version 5
 * @id  emoibhu
 * @author Moiz Bhukhiya
 */
?>
<div class="fields index">
	<h2><?php __('Fields');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('label');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('length');?></th>
			<th><?php echo $this->Paginator->sort('input_type');?></th>
			<th><?php echo $this->Paginator->sort('required');?></th>
			<th><?php echo $this->Paginator->sort('classes');?></th>
			<th><?php echo $this->Paginator->sort('hidden');?></th>
			<th><?php echo $this->Paginator->sort('dependent');?></th>
			<th><?php echo $this->Paginator->sort('explanation');?></th>
			<th><?php echo $this->Paginator->sort('category');?></th>
			<th><?php echo $this->Paginator->sort('weight');?></th>
			<th><?php echo $this->Paginator->sort('module_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($fields as $field):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $field['Field']['id']; ?>&nbsp;</td>
		<td><?php echo $field['Field']['name']; ?>&nbsp;</td>
		<td><?php echo $field['Field']['label']; ?>&nbsp;</td>
		<td><?php echo $field['Field']['type']; ?>&nbsp;</td>
		<td><?php echo $field['Field']['length']; ?>&nbsp;</td>
		<td><?php echo $field['Field']['input_type']; ?>&nbsp;</td>
		<td><?php echo $field['Field']['required']; ?>&nbsp;</td>
		<td><?php echo $field['Field']['classes']; ?>&nbsp;</td>
		<td><?php echo $field['Field']['hidden']; ?>&nbsp;</td>
		<td><?php echo $field['Field']['dependent']; ?>&nbsp;</td>
		<td><?php echo $field['Field']['explanation']; ?>&nbsp;</td>
		<td><?php echo $field['Field']['category']; ?>&nbsp;</td>
		<td><?php echo $field['Field']['weight']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($field['Module']['name'], array('controller' => 'modules', 'action' => 'view', $field['Module']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $field['Field']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $field['Field']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $field['Field']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $field['Field']['id'])); ?>
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