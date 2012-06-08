<div class="eleventhGroups form">
<?php echo $this->Form->create('EleventhGroup');?>
	<fieldset>
		<legend><?php __('Edit Eleventh Group'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('report_id');
		echo $this->Form->input('date');
		echo $this->Form->input('rnc_backed_up');
		echo $this->Form->input('rnc_backed_up_notes');
		echo $this->Form->input('post_health_check_node_performed');
		echo $this->Form->input('post_health_check_node_performed_notes');
		echo $this->Form->input('post_kget_node_saved');
		echo $this->Form->input('post_kget_node_saved_notes');
		echo $this->Form->input('startable_cv_rnc_saved');
		echo $this->Form->input('startable_cv_rnc_saved_notes');
		echo $this->Form->input('all_documentation_completed');
		echo $this->Form->input('all_documentation_completed_notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('EleventhGroup.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('EleventhGroup.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Eleventh Groups', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>