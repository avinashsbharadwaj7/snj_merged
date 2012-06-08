<?php
$rncFields = array(
    0 => array(
        'report_id' => 'Id',
        'date' => 'Date',
        'gpb_board_replacement' => "GPB75 Board Replacement (R1.1 RNC3820 IP or ATM Heavy)",
        'install_app_supervision_cables' => "Install the APP supervision cables",
        'format_rnc_use_gpb' => "Format the RNC to use GPB75 if applicable.  ",
        'serial_ethernet_setup' => "Setup serial and Ethernet connections to the RNC",
        'contents_mop_doc_reviewed' => "Contents of MOP and referenced documents reviewed and available",
        'local_connectivity_verification' => "Verify local connectivity to all involved nodes.",
        'oss_rc_lan_connection_verification' => "Verify that connection to OSS-RC is available as well as connection to customers LAN.",
        'prerequisites_verification' => "Verify that all prerequisites have been met",
        'mop_iucs_over_ip_rnc' => "If applicable, MOP for IuCS over IP RNC integration is available",
        'oc3_verification' => "Verify that all external interfaces are in place (OC3/Ethernet)",
        'verify_external_optical_cables_correct' => "Verify that all the external optical cables involved are of the correct type; Single Mode (SM)",
        'min_config_rnc_verification' => "Verify the minimum configuration of subracks in the RNC ",
        'remainder_rnc_config_verification' => "Verify that the remainder of the boards in the RNC are configured according to the desired product package. ",
        'rnc_matches_configuration' => "Verify that the RNC matches the R1.1 configuration, using GPB75. ",
        'eti_pg_compatible_verification' => "Verify that ET-IPG boards are in compatible slots",
        'rnc_wiring_verification' => "Verify the wiring within the RNC",
        'cables_cmxb_app_verification' => "Verify that 2 additional cables (TSR 491 602/1000) are in place between CMXB in the main subrack and both APP. ",
        'subracks_power_verification' => "Verify power is available to each of the subracks",
        'fans_power_verification' => "Verify power is available to all of the fans",
        'rnc_led_behaviour_verification' => "Verify normal LED behavior for a new RNC",
        'rnc_backup_completion' => "Perform a complete backup of the RNC",
        'startable_cv_rnc_saved' => "Save a startable CV in the RNC",
        'node_initial_health_check_performed' => "Perform an initial health check on the node",
        'initial_kget_saved' => "Save an initial kget on the node"
    ),
    11 => array(
        'report_id' => 'Id',
        'date' => 'Date',
        'check_sw_level' => "Check s/w level",
        'check_health_checks_done' => "Check if health checks done",
        'check_alarms' => "Check Alarms",
        'check_iucs_iups_config_atm_ip' => "Check IUCS & IU-PS config over ATM/IP ",
        'check_iur_atm_ip' => "Check IUR over ATM/IP",
        'check_c2_capacity_incease' => "Check for C2 capacity increase done",
        'check_external_port_status' => "Check external port status",
        'check_oc3_conn' => "Check OC3 connections",
        'check_synchronization' => "Check Synchronization",
        'check_hw_config' => "Check hardware configuration",
        'check_rnc_froid_inconsistency' => "Check RNC Fro Id inconsistency",
        'check_cc_dc_device_states' => "Check CC, DC device states",
        'check_site_availablility' => "Check Site/Cell availability",
        'verify_rnc_oam_settings' => "Verify RNC OAM settings",
        'check_agps_connectivity' => "Check AGPS connectivity",
        'check_ntp_server_connectivity' => "Check NTP server connectivity",
        'verify_pru_defined' => 'Verify PRU are Defined',
        'check_iucs_ranap_alcap_aal2' => "Check IUCS RANAP ALCAP signaling & AAL2 bearer status",
        'check_iups_pdr_status' => "Check IUPS signaling & PDR status",
        'verify_iur_links' => "Verify IUR Links defined, status",
        'check_updated_license_installed' => "Check if updated license key is installed / loaded",
        'check_performance_counters' => "Check performance counters defined correctly & unused counters are suspended",
        'check_time_set' => "Check Time set correctly",
        'check_ftp_server_conn' => "Check FTP Server Connectivity",
        'iucs_ranap_vcc_tests_to_msc' => "IUCS_ATM RANAP VCC tests to MSC server verification",
        'iucs_ranap_vcc_tests_to_mgw' => "IUCS_ATM ALCAP VCC tests to MGw verification",
        'iucs_aal2_vcc_mgw' => "IUCS_ATM AAL2 bearer VCC tests to MGw verification",
        'iucs_over_ip' => "IUCS_IP verification",
        'iur_aal5_vcc_tests_to_rnc' => "IUR_ATM AAL5 VCC tests to LIVE Drift RNC verification",
        'iur_aal2_vcc_tests_to_rnc' => "IUR_ATM AAL2 bearer VCC tests to LIVE Drift RNC verification",
        'iur_over_ip' => "IUR_IP verification"
    ),
    1 => array(
        'report_id' => 'Id',
        'date' => 'Date',
        'ensure_precheck_postcheck_done' => "Ensure the pre-checks from section 3.3 have been performed",
        'rnc_date_time_set' => "Set the correct date and time in the RNC",
        'verify_local_time_zone' => "Verify local time zone on the RNC is correctly set ",
        'setup_health_check' => "Set up the scheduled Health Check",
        'verify_current_software_package' => "Verify the current software package on the node",
        'reqd_software_installed' => "Install the required software packages",
        'software_upgraded' => "Upgrade to the desired software version according to the upgrade path",
        'rnc_board_layout_spb_types_changed_verified' => "Verify and change the RNC board layout and configuration if necessary",
        'verify_sw_allocation_for_spare_gpb' => "Verify that SW allocation for spare GPBs for powered storage are undefined",
        'verify_rnc_matches_configuration' => "Verify that the RNC matches the R1.1 configuration, using GPB75.",
        'verify_cc_devices' => "Verify the CC Devices",
        'verify_dc_devices' => "Verify the DC Devices",
        'rnc_licenses_requested' => "Request Licenses for the RNC",
        'license_key_file_imported' => "Import the license key file",
        'verify_rnsap_relocation' => "Verify RNSAP Relocation Parameters"
    ),
    12 => array(
        'report_id' => 'Id',
        'date' => 'Date',
        'verify_post_audit_gs_baseline' => "Verify Post Audit GS Baseline script loaded",
        'verify_atm_port_msp_failover' => "Verify ATM port & MSP 1+1 failover testing",
        'verify_remod_tests_atm_port_toycell' => "Verify Re-mod tests for all ATM port using Toycell",
        'verify_aal_redudancy_to_mgw' => "Verify AAL2 bearer redundancy test for all AAL2 bearers(IuCS_ATM) or IpAccessHostEt=.*IUCS-UP (IuCS_IP) to MGW.",
        'verify_vasic_cs_voice_calss_3m_m2m_mob' => "Verify basic CS voice calls 3G M2M, Mob Orig, Mob Term",
        'verify_ping_user_plane_sgsn' => "Verify ping tests were successful for both Control Plane & User Plane to SGSN.",
        'verify_pdr_to_sgsn' => "Verify PDR bearer redundancy test for all PDR to SGSN",
        'verify_basic_ps_data_calls' => "Verify basic PS data calls completed R99 HSPA + EUL (dependent on UEs provided & toy-cell HW",
        'verify_gpbc1_redudancy_tests' => "Verify GPB C1 redundancy tests done",
        'verify_gpbc2_redudancy_tests' => "Verify that GPB C2 redundancy tests done",
        'verify_scbdf_redudancy_tests' => "Verify that SCB-DF redundancy tests done",
        'verify_tub_board_redudancy_tests' => "Verify TUB board redundancy tests done",
        'verify_agps_redudancy_tests' => "Verify AGPS redundancy tests executed",
        'verify_cmxb_board_redudancy_tests' => "Verify CMXB board redundancy tests done",
        'verify_etipg_board_redudancy_tests' => "Verify ET-IPG board redundancy tests done",
        'verify_etimf4_board_redudancy_tests' => "Verify ET-MF4 board redundancy tests done",
        'verify_app_redudancy_tests' => "Verify APP redundancy tests were executed",
        'verify_iucs_link_redudancy_tests' => "Verify IUCS link redundancy tests done",
        'verify_iups_link_redudancy_tests' => "Verify IUPS link redundancy tests done",
        'verify_iubip_link_redudancy_tests' => "If IUB-IP is implemented for Toy-cell then verify IUB-IP link redundancy tests were executed **",
        'verify_core_mp_redudancy_tests' => "Verify Core MP redundancy",
        'verify_all_mspg' => "Verify all MSPG Working ATM ports including Management Adaptaion Object standardMode",
    ),
    2 => array(
        'report_id' => 'Id',
        'date' => 'Date',
        'rnc_config_scripts_ran' => "Run the RNC configuration scripts",
        'sctp_verification' => "Verify SCTP before C2 Capacity Increase",
        'c_two_capacity_increased' => "Increase C2 Capacity",
        'process_rebalance_proc_verified' => "Verify the Process Rebalance Procedure",
        'sctp_after_c_two_increase_verified' => "Verify the status of SCTP after the C2 Capacity Increase Procedure",
        'app_reconfigured' => "Reconfigure the Active Patch Panel (APP)",
        'all_oc_three_connections_verified' => "Verify all OC3 connections are up",
        'fiber_cabling_to_odf_verified' => "Verify fiber cabling to the ODF is correct",
        'ff_mapping_msn_verified' => "Verify fiber failover and 1 to 1 mapping with the MSN",
        'sync_ref_status_verified' => "Verify the Synchronization Reference Status",
        'tu_sync_status_verified' => "Verify the TU Synchronization Status",
        'verify_sync_priority' => "Verify the Synchronization Priority of the RNC",
        'tim_device_status_verified' => "Verify the TimDevice Status",
        'sync_in_locked_mode_verified' => "Verify that synchronization is in LOCKED_MODE",
        'sync_redundancy_test_performed' => "Perform a synchronization redundancy test",
        'agps_activation' => "Using AMOS to define the GPS Receiver",
        'agps_connectivity_verified' => "Verify A-GPS Connectivity",
        'ip_connectivity_oss_rc_verified' => "Verify IP connectivity to/from OSS-RC",
        'verify_oam_settings' => "Verify that the OAM settings in the RNC and OAM router are the same",
        'ntp_servers_connectivity_verified' => "Verify connectivity to the NTP servers",
    ),
    13 => array(
        'report_id' => 'Id',
        'date' => 'Date',
        'emergency_redirect_on_service_based_handover' => "Emergency Redirect ON/ Service Based Handover (SBHO) - OFF",
        'emergency_redirect_off_service_based_handover' => "Emergency Redirect OFF/ Service Based Handover (SBHO) � ON",
        'verfiy_rnc_connectivity_oss_rnc_oam_router' => "Verify RNC connectivity to OSS including RNC,OAM router settings",
        'lte_readiness_configuration' => "LTE readiness configuration",
    ),
    3 => array(
        'report_id' => 'Id',
        'date' => 'Date',
        'perform_toycell_backup' => "Perform a complete backup if the Toycell",
        'toycell_config_files_loaded' => "Load the Toycell configuration files in the RNC",
        'toycell_rnc_prepared' => "Prepare the Toycell for use with the new RNC",
        'perform_toycell_backup_again' => "Perform a complete backup if the Toycell",
    ),
    14 => array(
        'report_id' => 'Id',
        'date' => 'Date',
        'agps_hw_redudancy' => "AGPS Hardware Redundancy",
        'iub_over_ip' => "IUB over IP",
        'systemlog_crash' => "Systemlog Crash",
        'oss_connectivity_verification' => "OSS Connectivity Verification",
    ),
    4 => array(
        'report_id' => 'Id',
        'date' => 'Date',
        'iucs_ip' => "IUCS_IP",
        'aal_termination_status_verified' => "Verify the AAL5 Termination Point Status for CS",
        'nni_saal_status_verified' => "Verify the NNI-SAAL Layer Status for CS",
        'mtpb_signaling_status_msc_verified' => "Verify the MTP3b Signaling Status toward the MSC (Signaling Links, SLS, AP)",
        'mtpb_signaling_status_mgw_verified' => "Verify the MPT3b Signaling Status towards the MGw (Signaling Links, SLS, AP, Q.2630.2)",
        'sccp_signaling_pt_verified' => "Verify the SCCP signaling point status for CS",
        'aal_path_status_mgw_verified' => "Verify the AAL2 Path Status towards the MGw (CS Userplane)",
        'ran_ap_status_verified' => "Verify the RANAP status for CS",
        'rnc_froid_inconsistency_check' => "RNC Froid inconsistency check",
        'aal_redundancy_verified' => "Verify AAL2 redundancy",
        'basic_circuit_switched_call_testing_verified' => "Perform basic circuit switched call testing",
    ),
    5 => array(
        'report_id' => 'Id',
        'date' => 'Date',
        'vlans_config_verified' => "Verify the VLANs are correctly configured for IuPS CP",
        'giga_bit_ethernet_status_verified' => "Verify the status of the GigaBitEthernet",
        'ip_interface_status_verified' => "Verify the status of the IpInterface",
        'ip_access_host_gpb_status_verified' => "Verify the status of the IpAccessHostGpb",
        'sctp_status_verified' => "Verify the status of the Sctp",
        'mtbp_signaling_pt_status_verified' => "Verify the status of the Mtb3p Signaling Point",
        'mu_association_status_verified' => "Verify the status of the M3uAssociation",
        'mtpb_signaling_and_signaling_route_status_verified' => "Verify the status of the Mtp3b Signaling Routes and Signaling Route Set",
        'mtpb_access_pt_status_verified' => "Verify the status of the Mtp3b Access Point",
        'sccp_signaling_pt_status_verified' => "Verify the status of the Sccp Signaling Point",
        'sccp_local_access_pt_status_verified' => "Verify the status of the Sccp Local Access Point",
        'scp_remote_access_pt_status_verified' => "Verify the status of the Sccp Remote Access Point",
        'signaling_conn_redundancy_tested' => "Signaling Connectivity and Redundancy Testing",
    ),
    6 => array(
        'report_id' => 'Id',
        'date' => 'Date',
        'vlans_config_iups_up_verified' => "Verify the VLANs are correctly configured for IuPS UP",
        'intranode_vlans_config_verified' => "Verify that the intranode VLANs are correctly configured",
        'exchange_terminal_ip_status_verified' => "Verify the ExchangeTerminalIp status",
        'gigabit_ethernet_status_verified' => "Verify the GigaBitEthernet status",
        'ip_interface_status_verified' => "Verify the IpInterface status",
        'ip_access_host_spb_status_verified' => "Verify the IpAccessHostSpb status",
        'ip_eth_packet_data_routers_status_verified' => "Verify the status of the IpEthPacketDataRouters",
        'iups_default_router_conn_verified' => "Verify connectivity to the IuPS default router",
        'pdr_redundancy_verified' => "Verify PDR redundancy",
        'packet_switch_calls_performed' => "Perform basic packet switch calls",
    ),
    7 => array(
        'report_id' => 'Id',
        'date' => 'Date',
        'aal_termination_pt_iur_verified' => "Verify the AAL5 Termination Point Status for Iur",
        'nni_saal_layer_status_iur_verified' => "Verify the NNI-SAAL Layer Status for Iur",
        'mptb_signaling_status_iur_verified' => "Verify the MPT3b Signaling Status for Iur (Signaling Links, SLS, AP, Q.2630.2)",
        'sccp_signaling_pt_status_verified' => "Verify the SCCP signaling point status for CS",
        'aal_path_status_iur_verified' => "Verify the AAL2 Path Status for Iur",
        'rns_ap_status_iur_verified' => "Verify the RNSAP status for Iur",
    ),
    8 => array(
        'report_id' => 'Id',
        'date' => 'Date',
        'gpbc_one_redundancy_verified' => "Verify GPB C1 Redundancy (Core & O&M)",
        'gpbc_two_redundancy_verified' => "Verify GPB C2 Redundancy (RANAP, RNSAP, SCCP)",
        'scbdf_redundancy_verified' => "Verify SCB-DF Redundancy",
        'tub_board_redundancy_verified' => "Verify TUB Board Redundancy",
        'cmxb_board_redundancy_verified' => "Verify CMXB Board Redundancy",
        'etipg_board_redundancy_verified' => "ET-IPG Board Redundancy Verification",
        'main_subrack_verified' => "Verify ET-MF4 Redundancy � Main Subrack",
        'ext_subrack_verified' => "Verify ET-MF4 Redundancy � Extension Subrack",
        'use_amos_to_remodule_toycell' => "Use AMOS to Re-module the Toy Cell to each ES",
        'active_patch_panel_redundancy_verified' => "Verify Active Patch Panel Redundancy",
        'verify_iucs_link_redundancy' => "Verify IuCS link redundancy",
        'verify_iups_link_redundancy' => "Verify IuPS link redundancy",
        'verify_iub_over_ip_link' => "Verify Iub over IP link redundancy (if applicable)",
        'verify_iub_over_atm_link' => "Verify Iub over ATM link redundancy (if applicable)",
    ),
    9 => array(
        'report_id' => 'Id',
        'date' => 'Date',
        'kget_audit_sent' => "Send kget for Audit",
        'audit_script_ran' => "Run audit script",
        'command_log_status_verified' => "Verify command log status",
        'oss_rc_connectivity' => "OSS-RC Connectivity",
        'outstanding_alarms_cleared' => "Clear outstanding alarms",
        'alarm_testing_mnrc_performed' => "Perform alarm testing with the MNRC",
        'reset_all_logging_default' => "Reset all logging to default",
        'documentation_completed' => "Complete all documentation",
    ),
    10 => array(
        'report_id' => 'Id',
        'date' => 'Date',
        'rnc_backed_up' => "Perform a complete backup of the RNC",
        'current_software_on_node_verified' => "Verify the current software package on the node",
        'post_health_check_node_performed' => "Perform a post health check on the node",
        'active_alarms_on_rnc_printed' => "Print the active alarms on the RNC",
        'iucs_iur_settings_over_atm_verified' => "Verify that IuCS and/or Iur settings  over ATM are correct",
        'c2_capacity_increase_verified' => "Verify that C2 capacity increase is done",
        'processes_running_gpb_c2' => "Verify the following processes are running on GPB_C2",
        'external_port_status_verified' => "Verify external port status",
        'oc3_conn_status_verified' => "Verify OC3 connection status",
        'sync_priority_rnc_verified' => "Verify the Synchronization Priority of the RNC",
        'board_config_verified' => "Verify that the board configuration and the SW allocation matches the printout in the attached file",
        'rnc_froid_inconsistency_checked' => "RNC Froid inconsistency check",
        'cc_dc_devices_verified' => "Verify the CC and DC Devices",
        'sbho_readiness_verified' => "Verify with the Customer on the SBHO readiness",
        'oam_settings_same_in_rnc_router' => "Verify that the OAM settings in the RNC and OAM router are the same ",
        'agps_connectivity_verified' => "Verify AGPS connectivity",
        'ntp_server_conn_verified' => "Verify NTP server connectivity",
        'rpu_defined_verified' => "Verify RPU are defined",
        'iucs_ranap_alcap_aal2_status_verified' => "Verify IUCS RANAP ALCAP signaling & AAL2 bearer status",
        'iups_signaliing_pdr_status_verified' => "Verify IUPS signaling & PDR status",
        'iur_links_verified' => "Verify if IUR Links are defined, then verify Iur link status",
        'licenses_uploaded_verified' => "Verify that the licenses have been successfully uploaded",
        'performance_counters_correct_checked' => "Check performance counters defined correctly & unused counters are suspended",
        'startable_cv_rnc_saved' => "Save a startable CV in the RNC",
        'post_kget_node_saved' => "Save a post kget on the node",
        'dcgm_from_rnc_collected' => "Collect the dcgm from the RNC",
    ),
);
?>				