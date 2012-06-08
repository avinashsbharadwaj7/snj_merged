<div class="rfHelps form">
<?php echo $this->Form->create('RfHelp');?>
	<fieldset>
		<legend><?php __('Edit Rf Help'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('field');
		echo $this->Form->input('text');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('RfHelp.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('RfHelp.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Rf Helps', true), array('action' => 'index'));?></li>
	</ul>
</div>