<div class="firstQas form">
<?php echo $form->create('FirstQa', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Items checked by verifying RAN Integration Post Check Log'); ?></legend>
	<?php
                echo $html->div('imp_note',"Please use the following Document link below only as a guide and attach logfile in QA Log Category.<br/>".$html->link('EUS-11:008313Ue_RAN Quality Assurance Notification Report',
                        "http://anon.ericsson.se/eridoc/erl/objectId/09004cff84e084fb?docno=EUS-11:008313Uen&action=current&format=msw8",
                        array('target' => '_blank')));
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
                echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
                ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Check s/w level'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_sw_level'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['check_sw_level_notes'] !== "" && !empty($firstGroup['FirstGroup']['check_sw_level_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_sw_level_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Check if health checks done'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_health_checks_done'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['check_health_checks_done_notes'] !== "" && !empty($firstGroup['FirstGroup']['check_health_checks_done_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_health_checks_done_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Check Alarms'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_alarms'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['check_alarms_notes'] !== "" && !empty($firstGroup['FirstGroup']['check_alarms_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_alarms_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Check IUCS & IU-PS config over ATM/IP '); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_iucs_iups_config_atm_ip'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['check_iucs_iups_config_atm_ip_notes'] !== "" && !empty($firstGroup['FirstGroup']['check_iucs_iups_config_atm_ip_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_iucs_iups_config_atm_ip_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Check IUR over ATM/IP'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_iur_atm_ip'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['check_iur_atm_ip_notes'] !== "" && !empty($firstGroup['FirstGroup']['check_iur_atm_ip_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_iur_atm_ip_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Check for C2 capacity increase done'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_c2_capacity_incease'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['check_c2_capacity_incease_notes'] !== "" && !empty($firstGroup['FirstGroup']['check_c2_capacity_incease_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_c2_capacity_incease_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Check external port status'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_external_port_status'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['check_external_port_status_notes'] !== "" && !empty($firstGroup['FirstGroup']['check_external_port_status_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_external_port_status_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Check OC3 connections'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_oc3_conn'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['check_oc3_conn_notes'] !== "" && !empty($firstGroup['FirstGroup']['check_oc3_conn_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_oc3_conn_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Check Synchronization'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_synchronization'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['check_synchronization_notes'] !== "" && !empty($firstGroup['FirstGroup']['check_synchronization_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_synchronization_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Check hardware configuration'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_hw_config'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['check_hw_config_notes'] !== "" && !empty($firstGroup['FirstGroup']['check_hw_config_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_hw_config_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Check RNC Fro Id inconsistency'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_rnc_froid_inconsistency'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['check_rnc_froid_inconsistency_notes'] !== "" && !empty($firstGroup['FirstGroup']['check_rnc_froid_inconsistency_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_rnc_froid_inconsistency_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Check CC, DC device states'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_cc_dc_device_states'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['check_cc_dc_device_states_notes'] !== "" && !empty($firstGroup['FirstGroup']['check_cc_dc_device_states_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_cc_dc_device_states_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Check Site/Cell availability'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_site_availablility'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['check_site_availablility_notes'] !== "" && !empty($firstGroup['FirstGroup']['check_site_availablility_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_site_availablility_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify RNC OAM settings'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_rnc_oam_settings'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_rnc_oam_settings_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_rnc_oam_settings_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_rnc_oam_settings_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Check AGPS connectivity'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_agps_connectivity'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['check_agps_connectivity_notes'] !== "" && !empty($firstGroup['FirstGroup']['check_agps_connectivity_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_agps_connectivity_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Check NTP server connectivity'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_ntp_server_connectivity'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['check_ntp_server_connectivity_notes'] !== "" && !empty($firstGroup['FirstGroup']['check_ntp_server_connectivity_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_ntp_server_connectivity_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		echo $form->input('verify_pru_defined', array("label"=>"Verify PRU are Defined", "type"=>"select", "options"=>$_nyn, "after"=>$rncDatabaseFields->addNoteLink('verify_pru_defined')."<br/><font size='smallest' color='red'>For R1.1 RNC3820 Integration only</font>"));
		<?php if($firstGroup['FirstGroup']['verify_pru_defined_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_pru_defined_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_pru_defined_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Check IUCS RANAP ALCAP signaling & AAL2 bearer status'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_iucs_ranap_alcap_aal2'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['check_iucs_ranap_alcap_aal2_notes'] !== "" && !empty($firstGroup['FirstGroup']['check_iucs_ranap_alcap_aal2_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_iucs_ranap_alcap_aal2_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Check IUPS signaling & PDR status'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_iups_pdr_status'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['check_iups_pdr_status_notes'] !== "" && !empty($firstGroup['FirstGroup']['check_iups_pdr_status_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_iups_pdr_status_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify IUR Links defined, status'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_iur_links'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_iur_links_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_iur_links_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_iur_links_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Check if updated license key is installed / loaded'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_updated_license_installed'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['check_updated_license_installed_notes'] !== "" && !empty($firstGroup['FirstGroup']['check_updated_license_installed_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_updated_license_installed_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Check performance counters defined correctly & unused counters are suspended'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_performance_counters'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['check_performance_counters_notes'] !== "" && !empty($firstGroup['FirstGroup']['check_performance_counters_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_performance_counters_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Check Time set correctly'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_time_set'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['check_time_set_notes'] !== "" && !empty($firstGroup['FirstGroup']['check_time_set_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_time_set_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Check Time set correctly'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_ftp_server_conn'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['check_ftp_server_conn_notes'] !== "" && !empty($firstGroup['FirstGroup']['check_ftp_server_conn_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['check_ftp_server_conn_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('IUCS_ATM RANAP VCC tests to MSC server verification'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iucs_ranap_vcc_tests_to_msc'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['iucs_ranap_vcc_tests_to_msc_notes'] !== "" && !empty($firstGroup['FirstGroup']['iucs_ranap_vcc_tests_to_msc_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iucs_ranap_vcc_tests_to_msc_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('IUCS_ATM ALCAP VCC tests to MGw verification'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iucs_ranap_vcc_tests_to_mgw'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['iucs_ranap_vcc_tests_to_mgw_notes'] !== "" && !empty($firstGroup['FirstGroup']['iucs_ranap_vcc_tests_to_mgw_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iucs_ranap_vcc_tests_to_mgw_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('IUCS_ATM AAL2 bearer VCC tests to MGw verification'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iucs_aal2_vcc_mgw'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['iucs_aal2_vcc_mgw_notes'] !== "" && !empty($firstGroup['FirstGroup']['iucs_aal2_vcc_mgw_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iucs_aal2_vcc_mgw_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('IUCS_IP verification'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iucs_over_ip'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['iucs_over_ip_notes'] !== "" && !empty($firstGroup['FirstGroup']['iucs_over_ip_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iucs_over_ip_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('IUR_ATM AAL5 VCC tests to LIVE Drift RNC verification'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iur_aal5_vcc_tests_to_rnc'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['iur_aal5_vcc_tests_to_rnc_notes'] !== "" && !empty($firstGroup['FirstGroup']['iur_aal5_vcc_tests_to_rnc_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iur_aal5_vcc_tests_to_rnc_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('IUR_ATM AAL2 bearer VCC tests to LIVE Drift RNC verification'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iur_aal2_vcc_tests_to_rnc'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['iur_aal2_vcc_tests_to_rnc_notes'] !== "" && !empty($firstGroup['FirstGroup']['iur_aal2_vcc_tests_to_rnc_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iur_aal2_vcc_tests_to_rnc_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('IUR_IP verification'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iur_over_ip'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['iur_over_ip_notes'] !== "" && !empty($firstGroup['FirstGroup']['iur_over_ip_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iur_over_ip_notes'];?>
&nbsp;
</dd>
<?php endif;?>

	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>