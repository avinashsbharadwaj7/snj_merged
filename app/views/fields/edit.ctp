<div class="fields form">
<?php echo $this->Form->create('Field');?>
	<fieldset>
		<legend><?php __('Edit Field'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('label');
		echo $this->Form->input('type');
		echo $this->Form->input('length');
		echo $this->Form->input('input_type');
		echo $this->Form->input('required');
		echo $this->Form->input('classes');
		echo $this->Form->input('hidden');
		echo $this->Form->input('dependent');
		echo $this->Form->input('explanation');
		echo $this->Form->input('category');
		echo $this->Form->input('weight');
		echo $this->Form->input('module_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>