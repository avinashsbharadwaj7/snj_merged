<div class="fourthQas form">
<?php echo $form->create('FourthQa');?>
	<fieldset>
		<legend><?php __('QA Group-3'); ?></legend>
	<?php
		echo $form->input('report_id', array("class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
		echo $form->input('emergency_call_redirect', array("type"=>"select", "options"=>$_nyn, "after"=>$databaseFields->addNoteLink()));
		echo $form->input('emergency_call_redirect_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('service_based_handover', array("type"=>"select", "options"=>$_nyn, "after"=>$databaseFields->addNoteLink()));
		echo $form->input('service_based_handover_notes', array("div"=>array("style"=>"display:none")));
	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>
