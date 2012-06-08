<div class="rncEngineers form">
<?php echo $this->Form->create('RncEngineer');?>
	<fieldset>
		<legend><?php __('Edit Rnc Engineer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('report_id');
		echo $this->Form->input('engineer_signum');
		echo $this->Form->input('timestamp');
		echo $this->Form->input('removed');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('RncEngineer.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('RncEngineer.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Rnc Engineers', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>