<div class="fourthGroups form">
<?php echo $form->create('FourthGroup', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Fourth Group'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
		echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
		echo $form->input('perform_toycell_backup', array("label"=>"Perform a complete backup if the Toycell","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('perform_toycell_backup')));
		echo $form->input('perform_toycell_backup_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('toycell_config_files_loaded', array("label"=>"Load the Toycell configuration files in the RNC","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('toycell_config_files_loaded')));
		echo $form->input('toycell_config_files_loaded_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('toycell_rnc_prepared', array("label"=>"Prepare the Toycell for use with the new RNC","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('toycell_rnc_prepared')));
		echo $form->input('toycell_rnc_prepared_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('perform_toycell_backup_again', array("label"=>"Perform a complete backup if the Toycell","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('perform_toycell_backup_again')));
		echo $form->input('perform_toycell_backup_again_notes', array("div"=>array("style"=>"display:none")));
	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>
