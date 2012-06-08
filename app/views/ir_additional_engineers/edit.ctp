<div class="irAdditionalEngineers form">
<?php echo $this->Form->create('IrAdditionalEngineer');?>
	<fieldset>
		<legend><?php __('Edit Ir Additional Engineer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('ir_module_id');
		echo $this->Form->input('engineer_signum');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('IrAdditionalEngineer.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('IrAdditionalEngineer.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ir Additional Engineers', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Ir Modules', true), array('controller' => 'ir_modules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ir Module', true), array('controller' => 'ir_modules', 'action' => 'add')); ?> </li>
	</ul>
</div>