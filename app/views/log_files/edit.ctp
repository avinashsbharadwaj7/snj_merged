<div class="logFiles form">
<?php echo $this->Form->create('LogFile');?>
	<fieldset>
		<legend><?php __('Edit Log File'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('report_id');
		echo $this->Form->input('file_name');
		echo $this->Form->input('mime_type');
		echo $this->Form->input('file_size');
		echo $this->Form->input('upload_time');
		echo $this->Form->input('file_category');
		echo $this->Form->input('file_path');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('LogFile.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('LogFile.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Log Files', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>