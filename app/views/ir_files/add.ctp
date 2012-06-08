<div class="irFiles form">
<?php echo $this->Form->create('IrFile');?>
	<fieldset>
		<legend><?php __('Add Ir File'); ?></legend>
	<?php
		echo $this->Form->input('ir_module_id');
		echo $this->Form->input('name');
		echo $this->Form->input('path');
		echo $this->Form->input('type');
		echo $this->Form->input('size');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ir Files', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Ir Modules', true), array('controller' => 'ir_modules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ir Module', true), array('controller' => 'ir_modules', 'action' => 'add')); ?> </li>
	</ul>
</div>