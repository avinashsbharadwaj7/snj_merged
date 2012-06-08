<div class="ninthGroups form">
<?php echo $this->Form->create('NinthGroup');?>
	<fieldset>
		<legend><?php __('Edit Ninth Group'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('report_id');
		echo $this->Form->input('date');
		echo $this->Form->input('gpbc_one_redundancy_verified');
		echo $this->Form->input('gpbc_one_redundancy_verified_notes');
		echo $this->Form->input('gpbc_two_redundancy_verified');
		echo $this->Form->input('gpbc_two_redundancy_verified_notes');
		echo $this->Form->input('scbdf_redundancy_verified');
		echo $this->Form->input('scbdf_redundancy_verified_notes');
		echo $this->Form->input('tub_board_redundancy_verified');
		echo $this->Form->input('tub_board_redundancy_verified_notes');
		echo $this->Form->input('cmxb_board_redundancy_verified');
		echo $this->Form->input('cmxb_board_redundancy_verified_notes');
		echo $this->Form->input('etipg_board_redundancy_verified');
		echo $this->Form->input('etipg_board_redundancy_verified_notes');
		echo $this->Form->input('main_subrack_verified');
		echo $this->Form->input('main_subrack_verified_notes');
		echo $this->Form->input('ext_subrack_verified');
		echo $this->Form->input('ext_subrack_verified_notes');
		echo $this->Form->input('active_patch_panel_redundancy_verified');
		echo $this->Form->input('active_patch_panel_redundancy_verified_notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('NinthGroup.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('NinthGroup.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ninth Groups', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>