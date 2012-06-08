<div class="ninthGroups index">
	<h2><?php __('Ninth Groups');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('report_id');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('gpbc_one_redundancy_verified');?></th>
			<th><?php echo $this->Paginator->sort('gpbc_one_redundancy_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('gpbc_two_redundancy_verified');?></th>
			<th><?php echo $this->Paginator->sort('gpbc_two_redundancy_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('scbdf_redundancy_verified');?></th>
			<th><?php echo $this->Paginator->sort('scbdf_redundancy_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('tub_board_redundancy_verified');?></th>
			<th><?php echo $this->Paginator->sort('tub_board_redundancy_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('cmxb_board_redundancy_verified');?></th>
			<th><?php echo $this->Paginator->sort('cmxb_board_redundancy_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('etipg_board_redundancy_verified');?></th>
			<th><?php echo $this->Paginator->sort('etipg_board_redundancy_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('main_subrack_verified');?></th>
			<th><?php echo $this->Paginator->sort('main_subrack_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('ext_subrack_verified');?></th>
			<th><?php echo $this->Paginator->sort('ext_subrack_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('active_patch_panel_redundancy_verified');?></th>
			<th><?php echo $this->Paginator->sort('active_patch_panel_redundancy_verified_notes');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($ninthGroups as $ninthGroup):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $ninthGroup['NinthGroup']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ninthGroup['Report']['id'], array('controller' => 'reports', 'action' => 'view', $ninthGroup['Report']['id'])); ?>
		</td>
		<td><?php echo $ninthGroup['NinthGroup']['date']; ?>&nbsp;</td>
		<td><?php echo $ninthGroup['NinthGroup']['gpbc_one_redundancy_verified']; ?>&nbsp;</td>
		<td><?php echo $ninthGroup['NinthGroup']['gpbc_one_redundancy_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $ninthGroup['NinthGroup']['gpbc_two_redundancy_verified']; ?>&nbsp;</td>
		<td><?php echo $ninthGroup['NinthGroup']['gpbc_two_redundancy_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $ninthGroup['NinthGroup']['scbdf_redundancy_verified']; ?>&nbsp;</td>
		<td><?php echo $ninthGroup['NinthGroup']['scbdf_redundancy_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $ninthGroup['NinthGroup']['tub_board_redundancy_verified']; ?>&nbsp;</td>
		<td><?php echo $ninthGroup['NinthGroup']['tub_board_redundancy_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $ninthGroup['NinthGroup']['cmxb_board_redundancy_verified']; ?>&nbsp;</td>
		<td><?php echo $ninthGroup['NinthGroup']['cmxb_board_redundancy_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $ninthGroup['NinthGroup']['etipg_board_redundancy_verified']; ?>&nbsp;</td>
		<td><?php echo $ninthGroup['NinthGroup']['etipg_board_redundancy_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $ninthGroup['NinthGroup']['main_subrack_verified']; ?>&nbsp;</td>
		<td><?php echo $ninthGroup['NinthGroup']['main_subrack_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $ninthGroup['NinthGroup']['ext_subrack_verified']; ?>&nbsp;</td>
		<td><?php echo $ninthGroup['NinthGroup']['ext_subrack_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $ninthGroup['NinthGroup']['active_patch_panel_redundancy_verified']; ?>&nbsp;</td>
		<td><?php echo $ninthGroup['NinthGroup']['active_patch_panel_redundancy_verified_notes']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $ninthGroup['NinthGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $ninthGroup['NinthGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $ninthGroup['NinthGroup']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ninthGroup['NinthGroup']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Ninth Group', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>