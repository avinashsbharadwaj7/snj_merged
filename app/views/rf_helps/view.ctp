<div class="rfHelps view">
<h2><?php  __('Rf Help');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfHelp['RfHelp']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Field'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfHelp['RfHelp']['field']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Text'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfHelp['RfHelp']['text']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rf Help', true), array('action' => 'edit', $rfHelp['RfHelp']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Rf Help', true), array('action' => 'delete', $rfHelp['RfHelp']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $rfHelp['RfHelp']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rf Helps', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rf Help', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
