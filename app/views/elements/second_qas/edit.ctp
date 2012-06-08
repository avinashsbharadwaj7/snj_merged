<div class="secondQas form">
<?php echo $this->Form->create('SecondQa');?>
	<fieldset>
		<legend><?php __('Edit Second Qa'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('report_id');
		echo $this->Form->input('verify_post_audit_gs_baseline');
		echo $this->Form->input('verify_post_audit_gs_baseline_notes');
		echo $this->Form->input('verify_atm_port_msp_failover');
		echo $this->Form->input('verify_atm_port_msp_failover_notes');
		echo $this->Form->input('verify_remod_tests_atm_port_toycell');
		echo $this->Form->input('verify_remod_tests_atm_port_toycell_notes');
		echo $this->Form->input('verify_aal_redudancy_to_mgw');
		echo $this->Form->input('verify_aal_redudancy_to_mgw_notes');
		echo $this->Form->input('verify_vasic_cs_voice_calss_3m_m2m_mob');
		echo $this->Form->input('verify_vasic_cs_voice_calss_3m_m2m_mob_notes');
		echo $this->Form->input('verify_ping_user_plane_sgsn');
		echo $this->Form->input('verify_ping_user_plane_sgsn_notes');
		echo $this->Form->input('verify_pdr_to_sgsn');
		echo $this->Form->input('verify_pdr_to_sgsn_notes');
		echo $this->Form->input('verify_basic_ps_data_calls');
		echo $this->Form->input('verify_basic_ps_data_calls_notes');
		echo $this->Form->input('verify_gpbc1_redudancy_tests');
		echo $this->Form->input('verify_gpbc1_redudancy_tests_notes');
		echo $this->Form->input('verify_gpbc2_redudancy_tests');
		echo $this->Form->input('verify_gpbc2_redudancy_tests_notes');
		echo $this->Form->input('verify_scbdf_redudancy_tests');
		echo $this->Form->input('verify_scbdf_redudancy_tests_notes');
		echo $this->Form->input('verify_tub_board_redudancy_tests');
		echo $this->Form->input('verify_tub_board_redudancy_tests_notes');
		echo $this->Form->input('verify_agps_redudancy_tests');
		echo $this->Form->input('verify_agps_redudancy_tests_notes');
		echo $this->Form->input('verify_cmxb_board_redudancy_tests');
		echo $this->Form->input('verify_cmxb_board_redudancy_tests_notes');
		echo $this->Form->input('verify_etipg_board_redudancy_tests');
		echo $this->Form->input('verify_etipg_board_redudancy_tests_notes');
		echo $this->Form->input('verify_etimf4_board_redudancy_tests');
		echo $this->Form->input('verify_etimf4_board_redudancy_tests_notes');
		echo $this->Form->input('verify_app_redudancy_tests');
		echo $this->Form->input('verify_app_redudancy_tests_notes');
		echo $this->Form->input('verify_iucs_link_redudancy_tests');
		echo $this->Form->input('verify_iucs_link_redudancy_tests_notes');
		echo $this->Form->input('verify_iups_link_redudancy_tests');
		echo $this->Form->input('verify_iups_link_redudancy_tests_notes');
		echo $this->Form->input('verify_iubip_link_redudancy_tests');
		echo $this->Form->input('verify_iubip_link_redudancy_tests_notes');
		echo $this->Form->input('verify_core_mp_redudancy_tests');
		echo $this->Form->input('verify_core_mp_redudancy_tests_notes');
		echo $this->Form->input('verify_all_mspg');
		echo $this->Form->input('verify_all_mspg_notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('SecondQa.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('SecondQa.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Second Qas', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>