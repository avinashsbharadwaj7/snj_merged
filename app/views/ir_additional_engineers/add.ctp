<div class="irAdditionalEngineers form">
<?php echo $this->Form->create('IrAdditionalEngineer');?>
	<fieldset>
		<legend><?php __('Add Ir Additional Engineer'); ?></legend>
	<?php
		echo $this->Form->input('ir_module_id');
		echo $this->Form->input('engineer_signum');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ir Additional Engineers', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Ir Modules', true), array('controller' => 'ir_modules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ir Module', true), array('controller' => 'ir_modules', 'action' => 'add')); ?> </li>
	</ul>
</div>