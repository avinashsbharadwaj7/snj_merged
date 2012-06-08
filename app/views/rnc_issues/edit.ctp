<div class="rncIssues form">
<?php echo $this->Form->create('RncIssue');?>
	<fieldset>
		<legend><?php __('Edit Rnc Issue'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('rnc_report_id');
		echo $this->Form->input('rnc_step_id');
		echo $this->Form->input('rnc_step');
		echo $this->Form->input('issue_owner', array("label" =>"Issue Owner", "options" =>array(""=>"","Ericsson" => "Ericsson", "Customer" => "Customer")));
		echo $this->Form->input('issue_reason', array("options" => $rncDatabaseFields->getOptions("issue_reason", 111)));
                echo $this->Form->input('impact', array("options" => $rncDatabaseFields->getOptions("impact", 111), "style" => "width: auto;"));
		echo $this->Form->input('impact_in_time', array("placeholder" => "In Minutes"));
		echo $this->Form->input('issue_details', array("style"=>"width: 600px;"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('RncIssue.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('RncIssue.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Rnc Issues', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Rnc Reports', true), array('controller' => 'rnc_reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rnc Report', true), array('controller' => 'rnc_reports', 'action' => 'add')); ?> </li>
	</ul>
</div>