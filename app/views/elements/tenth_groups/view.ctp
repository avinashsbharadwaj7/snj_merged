<div class="tenthGroups form">
<?php echo $form->create('TenthGroup', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Tenth Group'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
		echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
                ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Send kget for Audit'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['kget_audit_sent'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['kget_audit_sent_notes'] !== "" && !empty($firstGroup['FirstGroup']['kget_audit_sent_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['kget_audit_sent_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Run audit script'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['audit_script_ran'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['audit_script_ran_notes'] !== "" && !empty($firstGroup['FirstGroup']['audit_script_ran_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['audit_script_ran_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify command log status'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['command_log_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['command_log_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['command_log_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['command_log_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('OSS-RC Connectivity'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['oss_rc_connectivity'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['oss_rc_connectivity_notes'] !== "" && !empty($firstGroup['FirstGroup']['oss_rc_connectivity_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['oss_rc_connectivity_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Clear outstanding alarms'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['outstanding_alarms_cleared'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['outstanding_alarms_cleared_notes'] !== "" && !empty($firstGroup['FirstGroup']['outstanding_alarms_cleared_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['outstanding_alarms_cleared_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Perform alarm testing with the MNRC'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['alarm_testing_mnrc_performed'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['alarm_testing_mnrc_performed_notes'] !== "" && !empty($firstGroup['FirstGroup']['alarm_testing_mnrc_performed_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['alarm_testing_mnrc_performed_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reset all logging to default'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['reset_all_logging_default'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['reset_all_logging_default_notes'] !== "" && !empty($firstGroup['FirstGroup']['reset_all_logging_default_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['reset_all_logging_default_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Complete all documentation'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['documentation_completed'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['documentation_completed_notes'] !== "" && !empty($firstGroup['FirstGroup']['documentation_completed_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['documentation_completed_notes'];?>
&nbsp;
</dd>
<?php endif;?>

	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>