<div class="userGroups view">
<h2><?php  __('User Group');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userGroup['UserGroup']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userGroup['UserGroup']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rank'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userGroup['UserGroup']['rank']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User Group', true), array('action' => 'edit', $userGroup['UserGroup']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete User Group', true), array('action' => 'delete', $userGroup['UserGroup']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $userGroup['UserGroup']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List User Groups', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Group', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Group Permissions', true), array('controller' => 'user_group_permissions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Group Permission', true), array('controller' => 'user_group_permissions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related User Group Permissions');?></h3>
	<?php if (!empty($userGroup['UserGroupPermission'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('User Group Id'); ?></th>
		<th><?php __('Plugin'); ?></th>
		<th><?php __('Controller'); ?></th>
		<th><?php __('Action'); ?></th>
		<th><?php __('Allowed'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($userGroup['UserGroupPermission'] as $userGroupPermission):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $userGroupPermission['id'];?></td>
			<td><?php echo $userGroupPermission['user_group_id'];?></td>
			<td><?php echo $userGroupPermission['plugin'];?></td>
			<td><?php echo $userGroupPermission['controller'];?></td>
			<td><?php echo $userGroupPermission['action'];?></td>
			<td><?php echo $userGroupPermission['allowed'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'user_group_permissions', 'action' => 'view', $userGroupPermission['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'user_group_permissions', 'action' => 'edit', $userGroupPermission['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'user_group_permissions', 'action' => 'delete', $userGroupPermission['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $userGroupPermission['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User Group Permission', true), array('controller' => 'user_group_permissions', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Users');?></h3>
	<?php if (!empty($userGroup['User'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('User Group Id'); ?></th>
		<th><?php __('Username'); ?></th>
		<th><?php __('Password'); ?></th>
		<th><?php __('Email'); ?></th>
		<th><?php __('Phone'); ?></th>
		<th><?php __('Active'); ?></th>
		<th><?php __('First Name'); ?></th>
		<th><?php __('Last Name'); ?></th>
		<th><?php __('Country'); ?></th>
		<th><?php __('City'); ?></th>
		<th><?php __('State'); ?></th>
		<th><?php __('Zip Code'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Company'); ?></th>
		<th><?php __('Department'); ?></th>
		<th><?php __('Office'); ?></th>
		<th><?php __('Relationship'); ?></th>
		<th><?php __('Manager'); ?></th>
		<th><?php __('Dob'); ?></th>
		<th><?php __('Belongs To'); ?></th>
		<th><?php __('Tcm Region'); ?></th>
		<th><?php __('Tcm Rights'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($userGroup['User'] as $user):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $user['id'];?></td>
			<td><?php echo $user['user_group_id'];?></td>
			<td><?php echo $user['username'];?></td>
			<td><?php echo $user['password'];?></td>
			<td><?php echo $user['email'];?></td>
			<td><?php echo $user['phone'];?></td>
			<td><?php echo $user['active'];?></td>
			<td><?php echo $user['first_name'];?></td>
			<td><?php echo $user['last_name'];?></td>
			<td><?php echo $user['country'];?></td>
			<td><?php echo $user['city'];?></td>
			<td><?php echo $user['state'];?></td>
			<td><?php echo $user['zip_code'];?></td>
			<td><?php echo $user['created'];?></td>
			<td><?php echo $user['modified'];?></td>
			<td><?php echo $user['title'];?></td>
			<td><?php echo $user['company'];?></td>
			<td><?php echo $user['department'];?></td>
			<td><?php echo $user['office'];?></td>
			<td><?php echo $user['relationship'];?></td>
			<td><?php echo $user['manager'];?></td>
			<td><?php echo $user['dob'];?></td>
			<td><?php echo $user['belongs_to'];?></td>
			<td><?php echo $user['tcm_region'];?></td>
			<td><?php echo $user['tcm_rights'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'users', 'action' => 'delete', $user['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
