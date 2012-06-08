<div class="irAdditionalEngineers view">
<h2><?php  __('Ir Additional Engineer');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $irAdditionalEngineer['IrAdditionalEngineer']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ir Module'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($irAdditionalEngineer['IrModule']['id'], array('controller' => 'ir_modules', 'action' => 'view', $irAdditionalEngineer['IrModule']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Engineer Signum'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $irAdditionalEngineer['IrAdditionalEngineer']['engineer_signum']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ir Additional Engineer', true), array('action' => 'edit', $irAdditionalEngineer['IrAdditionalEngineer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Ir Additional Engineer', true), array('action' => 'delete', $irAdditionalEngineer['IrAdditionalEngineer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $irAdditionalEngineer['IrAdditionalEngineer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ir Additional Engineers', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ir Additional Engineer', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ir Modules', true), array('controller' => 'ir_modules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ir Module', true), array('controller' => 'ir_modules', 'action' => 'add')); ?> </li>
	</ul>
</div>
