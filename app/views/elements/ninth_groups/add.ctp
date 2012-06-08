<div class="ninthGroups form">
<?php echo $form->create('NinthGroup', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Ninth Group'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
		echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
		echo $form->input('gpbc_one_redundancy_verified', array("label"=>"Verify GPB C1 Redundancy (Core & O&M)","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('gpbc_one_redundancy_verified')));
		echo $form->input('gpbc_one_redundancy_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('gpbc_two_redundancy_verified', array("label"=>"Verify GPB C2 Redundancy (RANAP, RNSAP, SCCP)","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('gpbc_two_redundancy_verified')));
		echo $form->input('gpbc_two_redundancy_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('scbdf_redundancy_verified', array("label"=>"Verify SCB-DF Redundancy","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('scbdf_redundancy_verified')));
		echo $form->input('scbdf_redundancy_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('tub_board_redundancy_verified', array("label"=>"Verify TUB Board Redundancy","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('tub_board_redundancy_verified')));
		echo $form->input('tub_board_redundancy_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('cmxb_board_redundancy_verified', array("label"=>"Verify CMXB Board Redundancy","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('cmxb_board_redundancy_verified')));
		echo $form->input('cmxb_board_redundancy_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('etipg_board_redundancy_verified', array("label"=>"ET-IPG Board Redundancy Verification","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('etipg_board_redundancy_verified')));
		echo $form->input('etipg_board_redundancy_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('main_subrack_verified', array("label"=>"Verify ET-MF4 Redundancy – Main Subrack","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('main_subrack_verified')));
		echo $form->input('main_subrack_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('ext_subrack_verified', array("label"=>"Verify ET-MF4 Redundancy – Extension Subrack","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('ext_subrack_verified')));
		echo $form->input('ext_subrack_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('use_amos_to_remodule_toycell', array("label"=>"Use AMOS to Re-module the Toy Cell to each ES","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('use_amos_to_remodule_toycell')));
		echo $form->input('use_amos_to_remodule_toycell_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('active_patch_panel_redundancy_verified', array("label"=>"Verify Active Patch Panel Redundancy","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('active_patch_panel_redundancy_verified')));
		echo $form->input('active_patch_panel_redundancy_verified_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_iucs_link_redundancy', array("label"=>"Verify IuCS link redundancy","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_iucs_link_redundancy')));
		echo $form->input('verify_iucs_link_redundancy_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_iups_link_redundancy', array("label"=>"Verify IuPS link redundancy","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_iups_link_redundancy')));
		echo $form->input('verify_iups_link_redundancy_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_iub_over_ip_link', array("label"=>"Verify Iub over IP link redundancy (if applicable)","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_iub_over_ip_link')));
		echo $form->input('verify_iub_over_ip_link_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_iub_over_atm_link', array("label"=>"Verify Iub over ATM link redundancy (if applicable)","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_iub_over_atm_link')));
		echo $form->input('verify_iub_over_atm_link_notes', array("div"=>array("style"=>"display:none")));
	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>