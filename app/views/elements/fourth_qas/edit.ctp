<div class="fourthQas form">
<?php echo $this->Form->create('FourthQa');?>
	<fieldset>
		<legend><?php __('Edit Fourth Qa'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('report_id');
		echo $this->Form->input('timestamp');
		echo $this->Form->input('emergency_call_redirect');
		echo $this->Form->input('emergency_call_redirect_notes');
		echo $this->Form->input('service_based_handover');
		echo $this->Form->input('service_based_handover_notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('FourthQa.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('FourthQa.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Fourth Qas', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>