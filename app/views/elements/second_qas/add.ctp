<div class="secondQas form">
<?php echo $form->create('SecondQa', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Verify RAN Integration Activity/Feature Logs'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
                echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
		echo $form->input('verify_post_audit_gs_baseline', array("label"=>"Verify Post Audit GS Baseline script loaded","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_post_audit_gs_baseline')));
		echo $form->input('verify_post_audit_gs_baseline_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_atm_port_msp_failover', array("label"=>"Verify ATM port & MSP 1+1 failover testing","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_atm_port_msp_failover')));
		echo $form->input('verify_atm_port_msp_failover_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_remod_tests_atm_port_toycell', array("label"=>"Verify Re-mod tests for all ATM port using Toycell","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_remod_tests_atm_port_toycell')));
		echo $form->input('verify_remod_tests_atm_port_toycell_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_aal_redudancy_to_mgw', array("label"=>"Verify AAL2 bearer redundancy test for all AAL2 bearers(IuCS_ATM) or IpAccessHostEt=.*IUCS-UP (IuCS_IP) to MGW.","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_aal_redudancy_to_mgw')));
		echo $form->input('verify_aal_redudancy_to_mgw_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_vasic_cs_voice_calss_3m_m2m_mob', array("label"=>"Verify basic CS voice calls 3G M2M, Mob Orig, Mob Term","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_vasic_cs_voice_calss_3m_m2m_mob')));
		echo $form->input('verify_vasic_cs_voice_calss_3m_m2m_mob_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_ping_user_plane_sgsn', array("label"=>"Verify ping tests were successful for both Control Plane & User Plane to SGSN.","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_ping_user_plane_sgsn')));
		echo $form->input('verify_ping_user_plane_sgsn_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_pdr_to_sgsn', array("label"=>"Verify PDR bearer redundancy test for all PDR to SGSN","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_pdr_to_sgsn')));
		echo $form->input('verify_pdr_to_sgsn_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_basic_ps_data_calls', array("label"=>"Verify basic PS data calls completed R99 HSPA + EUL (dependent on UEs provided & toy-cell HW","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_basic_ps_data_calls')));
		echo $form->input('verify_basic_ps_data_calls_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_gpbc1_redudancy_tests', array("label"=>"Verify GPB C1 redundancy tests done","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_gpbc1_redudancy_tests')));
		echo $form->input('verify_gpbc1_redudancy_tests_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_gpbc2_redudancy_tests', array("label"=>"Verify that GPB C2 redundancy tests done","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_gpbc2_redudancy_tests')));
		echo $form->input('verify_gpbc2_redudancy_tests_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_scbdf_redudancy_tests', array("label"=>"Verify that SCB-DF redundancy tests done","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_scbdf_redudancy_tests')));
		echo $form->input('verify_scbdf_redudancy_tests_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_tub_board_redudancy_tests', array("label"=>"Verify TUB board redundancy tests done","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_tub_board_redudancy_tests')));
		echo $form->input('verify_tub_board_redudancy_tests_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_agps_redudancy_tests', array("label"=>"Verify AGPS redundancy tests executed","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_agps_redudancy_tests')));
		echo $form->input('verify_agps_redudancy_tests_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_cmxb_board_redudancy_tests', array("label"=>"Verify CMXB board redundancy tests done","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_cmxb_board_redudancy_tests')));
		echo $form->input('verify_cmxb_board_redudancy_tests_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_etipg_board_redudancy_tests', array("label"=>"Verify ET-IPG board redundancy tests done","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_etipg_board_redudancy_tests')));
		echo $form->input('verify_etipg_board_redudancy_tests_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_etimf4_board_redudancy_tests', array("label"=>"Verify ET-MF4 board redundancy tests done","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_etimf4_board_redudancy_tests')));
		echo $form->input('verify_etimf4_board_redudancy_tests_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_app_redudancy_tests', array("label"=>"Verify APP redundancy tests were executed","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_app_redudancy_tests')));
		echo $form->input('verify_app_redudancy_tests_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_iucs_link_redudancy_tests', array("label"=>"Verify IUCS link redundancy tests done","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_iucs_link_redudancy_tests')));
		echo $form->input('verify_iucs_link_redudancy_tests_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_iups_link_redudancy_tests', array("label"=>"Verify IUPS link redundancy tests done","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_iups_link_redudancy_tests')));
		echo $form->input('verify_iups_link_redudancy_tests_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_iubip_link_redudancy_tests', array("label"=>"If IUB-IP is implemented for Toy-cell then verify IUB-IP link redundancy tests were executed **","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_iubip_link_redudancy_tests')));
		echo $form->input('verify_iubip_link_redudancy_tests_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_core_mp_redudancy_tests', array("label"=>"Verify Core MP redundancy","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_core_mp_redudancy_tests')));
		echo $form->input('verify_core_mp_redudancy_tests_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_all_mspg', array("label"=>"Verify all MSPG Working ATM ports including Management Adaptaion Object standardMode","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_all_mspg')));
		echo $form->input('verify_all_mspg_notes', array("div"=>array("style"=>"display:none")));
                echo $html->div('comment', "** If IUB-ATM is implemented for Toy-cell then verify IUB-ATM link redundancy tests were executed.");
	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>