<div class="rncEngineers view">
<h2><?php  __('Rnc Engineer');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rncEngineer['RncEngineer']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Report'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($rncEngineer['Report']['id'], array('controller' => 'reports', 'action' => 'view', $rncEngineer['Report']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Engineer Signum'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rncEngineer['RncEngineer']['engineer_signum']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Timestamp'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rncEngineer['RncEngineer']['timestamp']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Removed'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rncEngineer['RncEngineer']['removed']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rnc Engineer', true), array('action' => 'edit', $rncEngineer['RncEngineer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Rnc Engineer', true), array('action' => 'delete', $rncEngineer['RncEngineer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $rncEngineer['RncEngineer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rnc Engineers', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rnc Engineer', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>
