<div class="rncDropdowns index">
	<h2><?php __('Rnc Dropdowns');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $paginator->sort('id');?></th>
			<th><?php echo $paginator->sort('field');?></th>
			<th><?php echo $paginator->sort('label');?></th>
			<th><?php echo $paginator->sort('value');?></th>
			<th><?php echo $paginator->sort('module_id');?></th>
			<th><?php echo $paginator->sort('weight');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($rncDropdowns as $rncDropdown):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $rncDropdown['RncDropdown']['id']; ?>&nbsp;</td>
		<td><?php echo $rncDropdown['RncDropdown']['field']; ?>&nbsp;</td>
		<td><?php echo $rncDropdown['RncDropdown']['label']; ?>&nbsp;</td>
		<td><?php echo $rncDropdown['RncDropdown']['value']; ?>&nbsp;</td>
		<td><?php echo $rncDropdown['RncDropdown']['module_id']; ?>&nbsp;</td>
		<td><?php echo $rncDropdown['RncDropdown']['weight']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $rncDropdown['RncDropdown']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $rncDropdown['RncDropdown']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $rncDropdown['RncDropdown']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $rncDropdown['RncDropdown']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $paginator->numbers();?>
 |
		<?php echo $paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $html->link(__('New Rnc Dropdown', true), array('action' => 'add')); ?></li>
	</ul>
</div>