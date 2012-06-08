<div class="rncEngineers form">
<?php echo $this->Form->create('RncEngineer');?>
	<fieldset>
		<legend><?php __('Add Rnc Engineer'); ?></legend>
	<?php
		echo $this->Form->input('report_id');
		echo $this->Form->input('engineer_signum');
		echo $this->Form->input('timestamp');
		echo $this->Form->input('removed');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>