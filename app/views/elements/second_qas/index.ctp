<div class="secondQas index">
	<h2><?php __('Second Qas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('report_id');?></th>
			<th><?php echo $this->Paginator->sort('verify_post_audit_gs_baseline');?></th>
			<th><?php echo $this->Paginator->sort('verify_post_audit_gs_baseline_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_atm_port_msp_failover');?></th>
			<th><?php echo $this->Paginator->sort('verify_atm_port_msp_failover_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_remod_tests_atm_port_toycell');?></th>
			<th><?php echo $this->Paginator->sort('verify_remod_tests_atm_port_toycell_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_aal_redudancy_to_mgw');?></th>
			<th><?php echo $this->Paginator->sort('verify_aal_redudancy_to_mgw_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_vasic_cs_voice_calss_3m_m2m_mob');?></th>
			<th><?php echo $this->Paginator->sort('verify_vasic_cs_voice_calss_3m_m2m_mob_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_ping_user_plane_sgsn');?></th>
			<th><?php echo $this->Paginator->sort('verify_ping_user_plane_sgsn_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_pdr_to_sgsn');?></th>
			<th><?php echo $this->Paginator->sort('verify_pdr_to_sgsn_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_basic_ps_data_calls');?></th>
			<th><?php echo $this->Paginator->sort('verify_basic_ps_data_calls_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_gpbc1_redudancy_tests');?></th>
			<th><?php echo $this->Paginator->sort('verify_gpbc1_redudancy_tests_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_gpbc2_redudancy_tests');?></th>
			<th><?php echo $this->Paginator->sort('verify_gpbc2_redudancy_tests_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_scbdf_redudancy_tests');?></th>
			<th><?php echo $this->Paginator->sort('verify_scbdf_redudancy_tests_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_tub_board_redudancy_tests');?></th>
			<th><?php echo $this->Paginator->sort('verify_tub_board_redudancy_tests_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_agps_redudancy_tests');?></th>
			<th><?php echo $this->Paginator->sort('verify_agps_redudancy_tests_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_cmxb_board_redudancy_tests');?></th>
			<th><?php echo $this->Paginator->sort('verify_cmxb_board_redudancy_tests_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_etipg_board_redudancy_tests');?></th>
			<th><?php echo $this->Paginator->sort('verify_etipg_board_redudancy_tests_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_etimf4_board_redudancy_tests');?></th>
			<th><?php echo $this->Paginator->sort('verify_etimf4_board_redudancy_tests_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_app_redudancy_tests');?></th>
			<th><?php echo $this->Paginator->sort('verify_app_redudancy_tests_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_iucs_link_redudancy_tests');?></th>
			<th><?php echo $this->Paginator->sort('verify_iucs_link_redudancy_tests_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_iups_link_redudancy_tests');?></th>
			<th><?php echo $this->Paginator->sort('verify_iups_link_redudancy_tests_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_iubip_link_redudancy_tests');?></th>
			<th><?php echo $this->Paginator->sort('verify_iubip_link_redudancy_tests_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_core_mp_redudancy_tests');?></th>
			<th><?php echo $this->Paginator->sort('verify_core_mp_redudancy_tests_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_all_mspg');?></th>
			<th><?php echo $this->Paginator->sort('verify_all_mspg_notes');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($secondQas as $secondQa):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $secondQa['SecondQa']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($secondQa['Report']['id'], array('controller' => 'reports', 'action' => 'view', $secondQa['Report']['id'])); ?>
		</td>
		<td><?php echo $secondQa['SecondQa']['verify_post_audit_gs_baseline']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_post_audit_gs_baseline_notes']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_atm_port_msp_failover']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_atm_port_msp_failover_notes']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_remod_tests_atm_port_toycell']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_remod_tests_atm_port_toycell_notes']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_aal_redudancy_to_mgw']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_aal_redudancy_to_mgw_notes']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_vasic_cs_voice_calss_3m_m2m_mob']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_vasic_cs_voice_calss_3m_m2m_mob_notes']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_ping_user_plane_sgsn']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_ping_user_plane_sgsn_notes']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_pdr_to_sgsn']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_pdr_to_sgsn_notes']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_basic_ps_data_calls']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_basic_ps_data_calls_notes']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_gpbc1_redudancy_tests']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_gpbc1_redudancy_tests_notes']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_gpbc2_redudancy_tests']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_gpbc2_redudancy_tests_notes']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_scbdf_redudancy_tests']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_scbdf_redudancy_tests_notes']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_tub_board_redudancy_tests']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_tub_board_redudancy_tests_notes']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_agps_redudancy_tests']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_agps_redudancy_tests_notes']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_cmxb_board_redudancy_tests']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_cmxb_board_redudancy_tests_notes']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_etipg_board_redudancy_tests']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_etipg_board_redudancy_tests_notes']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_etimf4_board_redudancy_tests']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_etimf4_board_redudancy_tests_notes']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_app_redudancy_tests']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_app_redudancy_tests_notes']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_iucs_link_redudancy_tests']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_iucs_link_redudancy_tests_notes']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_iups_link_redudancy_tests']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_iups_link_redudancy_tests_notes']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_iubip_link_redudancy_tests']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_iubip_link_redudancy_tests_notes']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_core_mp_redudancy_tests']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_core_mp_redudancy_tests_notes']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_all_mspg']; ?>&nbsp;</td>
		<td><?php echo $secondQa['SecondQa']['verify_all_mspg_notes']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $secondQa['SecondQa']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $secondQa['SecondQa']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $secondQa['SecondQa']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $secondQa['SecondQa']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Second Qa', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>