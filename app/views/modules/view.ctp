<div class="modules view">
<h2><?php  __('Module');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $module['Module']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $module['Module']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Owner'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $module['Module']['owner']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Create Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $module['Module']['create_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $module['Module']['status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $module['Module']['description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Module', true), array('action' => 'edit', $module['Module']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Module', true), array('action' => 'delete', $module['Module']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $module['Module']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Modules', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Module', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fields', true), array('controller' => 'fields', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Field', true), array('controller' => 'fields', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Fields');?></h3>
	<?php if (!empty($module['Field'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Label'); ?></th>
		<th><?php __('Type'); ?></th>
		<th><?php __('Length'); ?></th>
		<th><?php __('Input Type'); ?></th>
		<th><?php __('Required'); ?></th>
		<th><?php __('Classes'); ?></th>
		<th><?php __('Hidden'); ?></th>
		<th><?php __('Dependent'); ?></th>
		<th><?php __('Explanation'); ?></th>
		<th><?php __('Category'); ?></th>
		<th><?php __('Weight'); ?></th>
		<th><?php __('Module Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($module['Field'] as $field):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $field['id'];?></td>
			<td><?php echo $field['name'];?></td>
			<td><?php echo $field['label'];?></td>
			<td><?php echo $field['type'];?></td>
			<td><?php echo $field['length'];?></td>
			<td><?php echo $field['input_type'];?></td>
			<td><?php echo $field['required'];?></td>
			<td><?php echo $field['classes'];?></td>
			<td><?php echo $field['hidden'];?></td>
			<td><?php echo $field['dependent'];?></td>
			<td><?php echo $field['explanation'];?></td>
			<td><?php echo $field['category'];?></td>
			<td><?php echo $field['weight'];?></td>
			<td><?php echo $field['module_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'fields', 'action' => 'view', $field['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'fields', 'action' => 'edit', $field['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'fields', 'action' => 'delete', $field['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $field['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
