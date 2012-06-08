<div class="firstQas form">
<?php echo $form->create('FirstQa', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Items checked by verifying RAN Integration Post Check Log'); ?></legend>
	<?php
                echo $html->div('imp_note',"Please use the following Document link below only as a guide and attach logfile in QA Log Category.<br/>".
                        $html->link('EUS-11:008313Ue_RAN Quality Assurance Notification Report',
                            "http://anon.ericsson.se/eridoc/erl/objectId/09004cff84e084fb?docno=EUS-11:008313Uen&action=current&format=msw8",
                            array('target' => '_blank'))."<br/><br/>".
                        "For IP or ATM Heavy.Please download using link below,fill-up the document and embed/attached it in RAN Integration Completion Notification (4 Checklist No.2)<br/><br/>".
                        "<font color='black'>IP-Heavy Acceptance Test Plan (ATP)</font><br/>".
                        $html->link('EMC-11:004617Uen_IP- Heavy Acceptance Test Plan (ATP)',
                                "http://anon.ericsson.se/eridoc/component/eriurl?docno=EMC-11:004617Uen&objectId=09004cff850ab225&action=current&format=msw8",
                                array('target' => '_blank'))."<br/><br/>".
                        "<font color='black'>ATM-Heavy Acceptance Test Plan (ATP)</font><br/>".
                        $html->link('EMC-11:004618Uen_ATM- Heavy Acceptance Test Plan (ATP)',
                                "http://anon.ericsson.se/eridoc/component/eriurl?docno=EMC-11:004617Uen&objectId=09004cff850ab225&action=current&format=msw8",
                                array('target' => '_blank'))."<br/><br/>"
                        );
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
                echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
		echo $form->input('check_sw_level', array("label"=>"Check s/w level","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('check_sw_level')));
		echo $form->input('check_sw_level_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('check_health_checks_done', array("label"=>"Check if health checks done","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('check_health_checks_done')));
		echo $form->input('check_health_checks_done_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('check_alarms', array("label"=>"Check Alarms","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('check_alarms')));
		echo $form->input('check_alarms_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('check_iucs_iups_config_atm_ip', array("label"=>"Check IUCS & IU-PS config over ATM/IP ","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('check_iucs_iups_config_atm_ip')));
		echo $form->input('check_iucs_iups_config_atm_ip_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('check_iur_atm_ip', array("label"=>"Check IUR over ATM/IP","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('check_iur_atm_ip')));
		echo $form->input('check_iur_atm_ip_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('check_c2_capacity_incease', array("label"=>"Check for C2 capacity increase done","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('check_c2_capacity_incease')));
		echo $form->input('check_c2_capacity_incease_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('check_external_port_status', array("label"=>"Check external port status","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('check_external_port_status')));
		echo $form->input('check_external_port_status_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('check_oc3_conn', array("label"=>"Check OC3 connections","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('check_oc3_conn')));
		echo $form->input('check_oc3_conn_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('check_synchronization', array("label"=>"Check Synchronization","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('check_synchronization')));
		echo $form->input('check_synchronization_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('check_hw_config', array("label"=>"Check hardware configuration","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('check_hw_config')));
		echo $form->input('check_hw_config_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('check_rnc_froid_inconsistency', array("label"=>"Check RNC Fro Id inconsistency","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('check_rnc_froid_inconsistency')));
		echo $form->input('check_rnc_froid_inconsistency_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('check_cc_dc_device_states', array("label"=>"Check CC, DC device states","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('check_cc_dc_device_states')));
		echo $form->input('check_cc_dc_device_states_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('check_site_availablility', array("label"=>"Check Site/Cell availability","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('check_site_availablility')));
		echo $form->input('check_site_availablility_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_rnc_oam_settings', array("label"=>"Verify RNC OAM settings","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_rnc_oam_settings')));
		echo $form->input('verify_rnc_oam_settings_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('check_agps_connectivity', array("label"=>"Check AGPS connectivity","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('check_agps_connectivity')));
		echo $form->input('check_agps_connectivity_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('check_ntp_server_connectivity', array("label"=>"Check NTP server connectivity","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('check_ntp_server_connectivity')));
		echo $form->input('check_ntp_server_connectivity_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_pru_defined', array("label"=>"Verify PRU are Defined", "type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_pru_defined')."<br/><font size='smallest' color='red'>For R1.1 RNC3820 Integration only</font>"));
		echo $form->input('verify_pru_defined_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('check_iucs_ranap_alcap_aal2', array("label"=>"Check IUCS RANAP ALCAP signaling & AAL2 bearer status","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('check_iucs_ranap_alcap_aal2')));
		echo $form->input('check_iucs_ranap_alcap_aal2_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('check_iups_pdr_status', array("label"=>"Check IUPS signaling & PDR status","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('check_iups_pdr_status')));
		echo $form->input('check_iups_pdr_status_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('verify_iur_links', array("label"=>"Verify IUR Links defined, status","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_iur_links')));
		echo $form->input('verify_iur_links_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('check_updated_license_installed', array("label"=>"Check if updated license key is installed / loaded","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('check_updated_license_installed')));
		echo $form->input('check_updated_license_installed_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('check_performance_counters', array("label"=>"Check performance counters defined correctly & unused counters are suspended","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('check_performance_counters')));
		echo $form->input('check_performance_counters_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('check_time_set', array("label"=>"Check Time set correctly","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('check_time_set')));
		echo $form->input('check_time_set_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('check_ftp_server_conn', array("label"=>"Check FTP Server Connectivity","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('check_ftp_server_conn')));
		echo $form->input('check_ftp_server_conn_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('iucs_ranap_vcc_tests_to_msc', array("label"=>"IUCS_ATM RANAP VCC tests to MSC server verification","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('iucs_ranap_vcc_tests_to_msc')));
		echo $form->input('iucs_ranap_vcc_tests_to_msc_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('iucs_ranap_vcc_tests_to_mgw', array("label"=>"IUCS_ATM ALCAP VCC tests to MGw verification","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('iucs_ranap_vcc_tests_to_mgw')));
		echo $form->input('iucs_ranap_vcc_tests_to_mgw_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('iucs_aal2_vcc_mgw', array("label"=>"IUCS_ATM AAL2 bearer VCC tests to MGw verification","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('iucs_aal2_vcc_mgw')));
		echo $form->input('iucs_aal2_vcc_mgw_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('iucs_over_ip', array("label"=>"IUCS_IP verification","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('iucs_over_ip')));
		echo $form->input('iucs_over_ip_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('iur_aal5_vcc_tests_to_rnc', array("label"=>"IUR_ATM AAL5 VCC tests to LIVE Drift RNC verification","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('iur_aal5_vcc_tests_to_rnc')));
		echo $form->input('iur_aal5_vcc_tests_to_rnc_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('iur_aal2_vcc_tests_to_rnc', array("label"=>"IUR_ATM AAL2 bearer VCC tests to LIVE Drift RNC verification","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('iur_aal2_vcc_tests_to_rnc')));
		echo $form->input('iur_aal2_vcc_tests_to_rnc_notes', array("div"=>array("style"=>"display:none")));
		echo $form->input('iur_over_ip', array("label"=>"IUR_IP verification","type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('iur_over_ip')));
		echo $form->input('iur_over_ip_notes', array("div"=>array("style"=>"display:none")));
	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>