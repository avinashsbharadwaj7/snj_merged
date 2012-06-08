<div class="rfHelps form">
<?php echo $this->Form->create('RfHelp');?>
	<fieldset>
		<legend><?php __('Add Rf Help'); ?></legend>
	<?php
		echo $this->Form->input('field');
		echo $this->Form->input('text');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Rf Helps', true), array('action' => 'index'));?></li>
	</ul>
</div>