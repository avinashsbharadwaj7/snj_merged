<div class="thirdQas index">
	<h2><?php __('Third Qas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('report_id');?></th>
			<th><?php echo $this->Paginator->sort('timestamp');?></th>
			<th><?php echo $this->Paginator->sort('verify_cmxb_board');?></th>
			<th><?php echo $this->Paginator->sort('verify_aal_bearer');?></th>
			<th><?php echo $this->Paginator->sort('verify_agps');?></th>
			<th><?php echo $this->Paginator->sort('verify_app_redundancy');?></th>
			<th><?php echo $this->Paginator->sort('verify_atm_port');?></th>
			<th><?php echo $this->Paginator->sort('verify_basic_cs_voice');?></th>
			<th><?php echo $this->Paginator->sort('verify_core_mp');?></th>
			<th><?php echo $this->Paginator->sort('verify_etipg');?></th>
			<th><?php echo $this->Paginator->sort('verify_etmf');?></th>
			<th><?php echo $this->Paginator->sort('verify_gpbc_one');?></th>
			<th><?php echo $this->Paginator->sort('verify_gbpc_two');?></th>
			<th><?php echo $this->Paginator->sort('verify_iub_ip_implementation');?></th>
			<th><?php echo $this->Paginator->sort('verify_iucs_link');?></th>
			<th><?php echo $this->Paginator->sort('verify_iups_link');?></th>
			<th><?php echo $this->Paginator->sort('verify_mspg_atm');?></th>
			<th><?php echo $this->Paginator->sort('verify_pdr_bearer');?></th>
			<th><?php echo $this->Paginator->sort('verify_ping_tests');?></th>
			<th><?php echo $this->Paginator->sort('verify_post_audit_gs_baseline');?></th>
			<th><?php echo $this->Paginator->sort('verify_ps_data_calls');?></th>
			<th><?php echo $this->Paginator->sort('verify_remod_atm');?></th>
			<th><?php echo $this->Paginator->sort('verify_rnc_connectivity_oss');?></th>
			<th><?php echo $this->Paginator->sort('verify_scbdf');?></th>
			<th><?php echo $this->Paginator->sort('verify_tub_board');?></th>
			<th><?php echo $this->Paginator->sort('verify_cmxb_board_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_aal_bearer_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_agps_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_app_redundancy_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_atm_port_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_basic_cs_voice_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_core_mp_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_etipg_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_etmf_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_gpbc_one_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_gbpc_two_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_iub_ip_implementation_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_iucs_link_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_iups_link_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_mspg_atm_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_pdr_bearer_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_ping_tests_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_post_audit_gs_baseline_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_ps_data_calls_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_remod_atm_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_rnc_connectivity_oss_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_scbdf_notes');?></th>
			<th><?php echo $this->Paginator->sort('verify_tub_board_notes');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($thirdQas as $thirdQa):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $thirdQa['ThirdQa']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($thirdQa['Report']['id'], array('controller' => 'reports', 'action' => 'view', $thirdQa['Report']['id'])); ?>
		</td>
		<td><?php echo $thirdQa['ThirdQa']['timestamp']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_cmxb_board']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_aal_bearer']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_agps']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_app_redundancy']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_atm_port']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_basic_cs_voice']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_core_mp']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_etipg']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_etmf']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_gpbc_one']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_gbpc_two']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_iub_ip_implementation']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_iucs_link']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_iups_link']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_mspg_atm']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_pdr_bearer']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_ping_tests']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_post_audit_gs_baseline']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_ps_data_calls']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_remod_atm']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_rnc_connectivity_oss']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_scbdf']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_tub_board']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_cmxb_board_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_aal_bearer_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_agps_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_app_redundancy_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_atm_port_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_basic_cs_voice_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_core_mp_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_etipg_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_etmf_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_gpbc_one_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_gbpc_two_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_iub_ip_implementation_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_iucs_link_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_iups_link_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_mspg_atm_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_pdr_bearer_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_ping_tests_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_post_audit_gs_baseline_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_ps_data_calls_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_remod_atm_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_rnc_connectivity_oss_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_scbdf_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdQa['ThirdQa']['verify_tub_board_notes']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $thirdQa['ThirdQa']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $thirdQa['ThirdQa']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $thirdQa['ThirdQa']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $thirdQa['ThirdQa']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Third Qa', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>