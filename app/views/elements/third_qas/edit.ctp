<div class="thirdQas form">
<?php echo $this->Form->create('ThirdQa');?>
	<fieldset>
		<legend><?php __('Edit Third Qa'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('report_id');
		echo $this->Form->input('timestamp');
		echo $this->Form->input('verify_cmxb_board');
		echo $this->Form->input('verify_aal_bearer');
		echo $this->Form->input('verify_agps');
		echo $this->Form->input('verify_app_redundancy');
		echo $this->Form->input('verify_atm_port');
		echo $this->Form->input('verify_basic_cs_voice');
		echo $this->Form->input('verify_core_mp');
		echo $this->Form->input('verify_etipg');
		echo $this->Form->input('verify_etmf');
		echo $this->Form->input('verify_gpbc_one');
		echo $this->Form->input('verify_gbpc_two');
		echo $this->Form->input('verify_iub_ip_implementation');
		echo $this->Form->input('verify_iucs_link');
		echo $this->Form->input('verify_iups_link');
		echo $this->Form->input('verify_mspg_atm');
		echo $this->Form->input('verify_pdr_bearer');
		echo $this->Form->input('verify_ping_tests');
		echo $this->Form->input('verify_post_audit_gs_baseline');
		echo $this->Form->input('verify_ps_data_calls');
		echo $this->Form->input('verify_remod_atm');
		echo $this->Form->input('verify_rnc_connectivity_oss');
		echo $this->Form->input('verify_scbdf');
		echo $this->Form->input('verify_tub_board');
		echo $this->Form->input('verify_cmxb_board_notes');
		echo $this->Form->input('verify_aal_bearer_notes');
		echo $this->Form->input('verify_agps_notes');
		echo $this->Form->input('verify_app_redundancy_notes');
		echo $this->Form->input('verify_atm_port_notes');
		echo $this->Form->input('verify_basic_cs_voice_notes');
		echo $this->Form->input('verify_core_mp_notes');
		echo $this->Form->input('verify_etipg_notes');
		echo $this->Form->input('verify_etmf_notes');
		echo $this->Form->input('verify_gpbc_one_notes');
		echo $this->Form->input('verify_gbpc_two_notes');
		echo $this->Form->input('verify_iub_ip_implementation_notes');
		echo $this->Form->input('verify_iucs_link_notes');
		echo $this->Form->input('verify_iups_link_notes');
		echo $this->Form->input('verify_mspg_atm_notes');
		echo $this->Form->input('verify_pdr_bearer_notes');
		echo $this->Form->input('verify_ping_tests_notes');
		echo $this->Form->input('verify_post_audit_gs_baseline_notes');
		echo $this->Form->input('verify_ps_data_calls_notes');
		echo $this->Form->input('verify_remod_atm_notes');
		echo $this->Form->input('verify_rnc_connectivity_oss_notes');
		echo $this->Form->input('verify_scbdf_notes');
		echo $this->Form->input('verify_tub_board_notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ThirdQa.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ThirdQa.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Third Qas', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>