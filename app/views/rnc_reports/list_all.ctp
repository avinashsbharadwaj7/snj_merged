<?php
echo $html->css(array('rnc/style', 'rnc/jquery-ui', 'rnc/view', 'rnc/css_menu'));
echo $html->css('rnc/bcp');
?>
<div class="rncReports index">
	<h2><?php __('RNC Reporting');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('report_number');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
                        <th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('customer');?></th>
                        <th><?php echo $this->Paginator->sort('region');?></th>
			<th><?php echo $this->Paginator->sort('hardware_type');?></th>
			<th><?php echo $this->Paginator->sort('engineer_signum');?></th>
			<th><?php echo $this->Paginator->sort('qa_status');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($rncReports as $rncReport):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $rncReport['RncReport']['report_number']; ?>&nbsp;</td>
		<td><?php echo $rncReport['RncReport']['date']; ?>&nbsp;</td>
		<td><?php echo $rncReport['RncReport']['status']; ?>&nbsp;</td>
		<td><?php echo $rncReport['RncReport']['customer']; ?>&nbsp;</td>
		<td><?php echo $rncReport['RncReport']['region']; ?>&nbsp;</td>
		<td><?php echo $rncReport['RncReport']['hardware_type']; ?>&nbsp;</td>
		<td><?php echo $rncReport['RncReport']['engineer_signum']; ?>&nbsp;</td>
		<td><?php echo $rncReport['RncReport']['qa_status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $rncReport['RncReport']['report_number'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $rncReport['RncReport']['report_number'])); ?>
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
		<li><?php echo $this->Html->link(__('Create New RNC Report', true), array('action' => 'add')); ?></li>
                <li><?php echo $this->Html->link(__('RNC Dashboard', true), array('action' => 'index')); ?></li>
	</ul>
</div>