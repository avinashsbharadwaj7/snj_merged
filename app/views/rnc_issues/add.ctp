<?php echo $this->Session->flash();?>
<div class="rncIssues form">
<?php echo $html->css('rnc/issues');?>
<?php echo $this->Form->create('RncIssue', array('url' => array("controller" => "rnc_issues", "action" => "add", $reportId, $stepId, $stepDetail)));?>
	<fieldset>
		<legend><?php __('Report Problem'); ?></legend>
	<?php
		echo $this->Form->hidden('rnc_report_id', array("value" => $reportId));
		echo $this->Form->hidden('rnc_step_id', array("value" => $stepId));
		echo $this->Form->input('rnc_step', array("type" => "text", "value" => base64_decode($stepDetail), "style" => "width: 600px;"));
		echo $this->Form->input('issue_owner', array("label" =>"Issue Owner", "options" =>array(""=>"","Ericsson" => "Ericsson", "Customer" => "Customer")));
		echo $this->Form->input('issue_reason', array("options" => $rncDatabaseFields->getOptions("issue_reason", 111)));
                echo $this->Form->input('impact', array("options" => $rncDatabaseFields->getOptions("impact", 111), "style" => "width: auto;"));
		echo $this->Form->input('impact_in_time', array("placeholder" => "In Minutes", "label" => "Shift Interrupt Impact in terms of Time"));
		echo $this->Form->input('issue_details', array("style"=>"width: 600px;"));
                echo $this->Form->hidden('created_by', array("value" => Authsome::get("username")));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>