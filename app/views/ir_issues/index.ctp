<div class="irIssues index">
	<h2><?php __('Ir Issues');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('ir_module_id');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('script_issue');?></th>
			<th><?php echo $this->Paginator->sort('script_issue_contact');?></th>
			<th><?php echo $this->Paginator->sort('owner');?></th>
			<th><?php echo $this->Paginator->sort('owner_ericsson_contact');?></th>
			<th><?php echo $this->Paginator->sort('escalation_engineer_contacted');?></th>
			<th><?php echo $this->Paginator->sort('escalation_engineer_contact_name');?></th>
			<th><?php echo $this->Paginator->sort('escalation_engineer_contact_signum');?></th>
			<th><?php echo $this->Paginator->sort('issue_summary');?></th>
			<th><?php echo $this->Paginator->sort('impact');?></th>
			<th><?php echo $this->Paginator->sort('name_affected_rnc');?></th>
			<th><?php echo $this->Paginator->sort('number_affected_nodeb');?></th>
			<th><?php echo $this->Paginator->sort('name_affected_nodeb');?></th>
			<th><?php echo $this->Paginator->sort('deleted');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($irIssues as $irIssue):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $irIssue['IrIssue']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($irIssue['IrModule']['id'], array('controller' => 'ir_modules', 'action' => 'view', $irIssue['IrModule']['id'])); ?>
		</td>
		<td><?php echo $irIssue['IrIssue']['type']; ?>&nbsp;</td>
		<td><?php echo $irIssue['IrIssue']['script_issue']; ?>&nbsp;</td>
		<td><?php echo $irIssue['IrIssue']['script_issue_contact']; ?>&nbsp;</td>
		<td><?php echo $irIssue['IrIssue']['owner']; ?>&nbsp;</td>
		<td><?php echo $irIssue['IrIssue']['owner_ericsson_contact']; ?>&nbsp;</td>
		<td><?php echo $irIssue['IrIssue']['escalation_engineer_contacted']; ?>&nbsp;</td>
		<td><?php echo $irIssue['IrIssue']['escalation_engineer_contact_name']; ?>&nbsp;</td>
		<td><?php echo $irIssue['IrIssue']['escalation_engineer_contact_signum']; ?>&nbsp;</td>
		<td><?php echo $irIssue['IrIssue']['issue_summary']; ?>&nbsp;</td>
		<td><?php echo $irIssue['IrIssue']['impact']; ?>&nbsp;</td>
		<td><?php echo $irIssue['IrIssue']['name_affected_rnc']; ?>&nbsp;</td>
		<td><?php echo $irIssue['IrIssue']['number_affected_nodeb']; ?>&nbsp;</td>
		<td><?php echo $irIssue['IrIssue']['name_affected_nodeb']; ?>&nbsp;</td>
		<td><?php echo $irIssue['IrIssue']['deleted']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $irIssue['IrIssue']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $irIssue['IrIssue']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $irIssue['IrIssue']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $irIssue['IrIssue']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Ir Issue', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Ir Modules', true), array('controller' => 'ir_modules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ir Module', true), array('controller' => 'ir_modules', 'action' => 'add')); ?> </li>
	</ul>
</div>