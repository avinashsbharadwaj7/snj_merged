<div class="modules form">
<?php echo $this->Form->create('Module');?>
	<fieldset>
		<legend><?php __('Add Module'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('owner');
		echo $this->Form->input('create_date');
		echo $this->Form->input('status');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
