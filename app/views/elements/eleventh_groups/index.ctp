<div class="eleventhGroups index">
	<h2><?php __('Eleventh Groups');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('report_id');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('rnc_backed_up');?></th>
			<th><?php echo $this->Paginator->sort('rnc_backed_up_notes');?></th>
			<th><?php echo $this->Paginator->sort('post_health_check_node_performed');?></th>
			<th><?php echo $this->Paginator->sort('post_health_check_node_performed_notes');?></th>
			<th><?php echo $this->Paginator->sort('post_kget_node_saved');?></th>
			<th><?php echo $this->Paginator->sort('post_kget_node_saved_notes');?></th>
			<th><?php echo $this->Paginator->sort('startable_cv_rnc_saved');?></th>
			<th><?php echo $this->Paginator->sort('startable_cv_rnc_saved_notes');?></th>
			<th><?php echo $this->Paginator->sort('all_documentation_completed');?></th>
			<th><?php echo $this->Paginator->sort('all_documentation_completed_notes');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($eleventhGroups as $eleventhGroup):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $eleventhGroup['EleventhGroup']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($eleventhGroup['Report']['id'], array('controller' => 'reports', 'action' => 'view', $eleventhGroup['Report']['id'])); ?>
		</td>
		<td><?php echo $eleventhGroup['EleventhGroup']['date']; ?>&nbsp;</td>
		<td><?php echo $eleventhGroup['EleventhGroup']['rnc_backed_up']; ?>&nbsp;</td>
		<td><?php echo $eleventhGroup['EleventhGroup']['rnc_backed_up_notes']; ?>&nbsp;</td>
		<td><?php echo $eleventhGroup['EleventhGroup']['post_health_check_node_performed']; ?>&nbsp;</td>
		<td><?php echo $eleventhGroup['EleventhGroup']['post_health_check_node_performed_notes']; ?>&nbsp;</td>
		<td><?php echo $eleventhGroup['EleventhGroup']['post_kget_node_saved']; ?>&nbsp;</td>
		<td><?php echo $eleventhGroup['EleventhGroup']['post_kget_node_saved_notes']; ?>&nbsp;</td>
		<td><?php echo $eleventhGroup['EleventhGroup']['startable_cv_rnc_saved']; ?>&nbsp;</td>
		<td><?php echo $eleventhGroup['EleventhGroup']['startable_cv_rnc_saved_notes']; ?>&nbsp;</td>
		<td><?php echo $eleventhGroup['EleventhGroup']['all_documentation_completed']; ?>&nbsp;</td>
		<td><?php echo $eleventhGroup['EleventhGroup']['all_documentation_completed_notes']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $eleventhGroup['EleventhGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $eleventhGroup['EleventhGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $eleventhGroup['EleventhGroup']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $eleventhGroup['EleventhGroup']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Eleventh Group', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>