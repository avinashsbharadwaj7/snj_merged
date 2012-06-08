<div class="logFiles form">
<?php echo $this->Form->create('LogFile');?>
	<fieldset>
		<legend><?php __('Add Log File'); ?></legend>
	<?php
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
