<?php
echo $html->css(array('rnc/style', 'rnc/view', 'rnc/css_menu', 'rnc/bcp', 'rnc/rf'));
?>
<div class="rfV2Modules index">
	<h2><?php __('RF Reports');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('project_name');?></th>
			<th><?php echo $this->Paginator->sort('customer_unit');?></th>
			<th><?php echo $this->Paginator->sort('region');?></th>
			<th><?php echo $this->Paginator->sort('technology');?></th>
			<th><?php echo $this->Paginator->sort('project_type');?></th>
			<th><?php echo $this->Paginator->sort('market');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($rfV2Modules as $rfV2Module):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $rfV2Module['RfV2Module']['id']; ?>&nbsp;</td>
		<td><?php echo $rfV2Module['RfV2Module']['project_name']; ?>&nbsp;</td>
		<td><?php echo $rfV2Module['RfV2Module']['customer_unit']; ?>&nbsp;</td>
		<td><?php echo $rfV2Module['RfV2Module']['region']; ?>&nbsp;</td>
		<td><?php echo $rfV2Module['RfV2Module']['technology']; ?>&nbsp;</td>
		<td><?php echo $rfV2Module['RfV2Module']['project_type']; ?>&nbsp;</td>
		<td><?php echo $rfV2Module['RfV2Module']['market']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $rfV2Module['RfV2Module']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $rfV2Module['RfV2Module']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Create New Report  ', true), array('action' => 'add')); ?></li>
	</ul>
</div>