<div class="fourthGroups form">
<?php echo $this->Form->create('FourthGroup');?>
	<fieldset>
		<legend><?php __('Edit Fourth Group'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('report_id');
		echo $this->Form->input('date');
		echo $this->Form->input('toycell_config_files_loaded');
		echo $this->Form->input('toycell_config_files_loaded_notes');
		echo $this->Form->input('toycell_rnc_prepared');
		echo $this->Form->input('toycell_rnc_prepared_notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('FourthGroup.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('FourthGroup.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Fourth Groups', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>