<div class="rncIssues index">
	<h2><?php __('Rnc Issues');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('RNC Report','rnc_report_id');?></th>
			<th><?php echo $this->Paginator->sort('RNC Step','rnc_step');?></th>
			<th><?php echo $this->Paginator->sort('issue_owner');?></th>
			<th><?php echo $this->Paginator->sort('issue_reason');?></th>
                        <th><?php echo $this->Paginator->sort('impact');?></th>
			<th><?php echo $this->Paginator->sort('impact_in_time');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($rncIssues as $rncIssue):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $rncIssue['RncIssue']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($rncIssue['RncReport']['report_number'], array('controller' => 'rnc_reports', 'action' => 'edit', $rncIssue['RncReport']['report_number'])); ?>
		</td>
		<td><?php echo $rncIssue['RncIssue']['rnc_step']; ?>&nbsp;</td>
		<td><?php echo $rncIssue['RncIssue']['issue_owner']; ?>&nbsp;</td>
                <td><?php echo $rncIssue['RncIssue']['issue_reason']; ?>&nbsp;</td>
		<td><?php echo $rncIssue['RncIssue']['impact']; ?>&nbsp;</td>
		<td><?php echo $rncIssue['RncIssue']['impact_in_time']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $rncIssue['RncIssue']['id'])); ?>
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