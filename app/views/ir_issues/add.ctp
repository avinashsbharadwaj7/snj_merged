<div class="irIssues form">
<?php echo $this->Form->create('IrIssue');?>
	<fieldset>
		<legend><?php __('Add Ir Issue'); ?></legend>
	<?php
		echo $this->Form->input('ir_module_id');
		echo $this->Form->input('type');
		echo $this->Form->input('script_issue');
		echo $this->Form->input('script_issue_contact');
		echo $this->Form->input('owner');
		echo $this->Form->input('owner_ericsson_contact');
		echo $this->Form->input('escalation_engineer_contacted');
		echo $this->Form->input('escalation_engineer_contact_name');
		echo $this->Form->input('escalation_engineer_contact_signum');
		echo $this->Form->input('issue_summary');
		echo $this->Form->input('impact');
		echo $this->Form->input('name_affected_rnc');
		echo $this->Form->input('number_affected_nodeb');
		echo $this->Form->input('name_affected_nodeb');
		echo $this->Form->input('deleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ir Issues', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Ir Modules', true), array('controller' => 'ir_modules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ir Module', true), array('controller' => 'ir_modules', 'action' => 'add')); ?> </li>
	</ul>
</div>