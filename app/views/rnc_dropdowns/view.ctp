<div class="rncDropdowns view">
<h2><?php  __('Rnc Dropdown');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rncDropdown['RncDropdown']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Field'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rncDropdown['RncDropdown']['field']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Label'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rncDropdown['RncDropdown']['label']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Value'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rncDropdown['RncDropdown']['value']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Module Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rncDropdown['RncDropdown']['module_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Weight'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rncDropdown['RncDropdown']['weight']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $html->link(__('Edit Rnc Dropdown', true), array('action' => 'edit', $rncDropdown['RncDropdown']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Rnc Dropdown', true), array('action' => 'delete', $rncDropdown['RncDropdown']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $rncDropdown['RncDropdown']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Rnc Dropdowns', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Rnc Dropdown', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
