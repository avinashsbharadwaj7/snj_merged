<div class="thirdGroups index">
	<h2><?php __('Third Groups');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('report_id');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('rnc_config_scripts_ran');?></th>
			<th><?php echo $this->Paginator->sort('rnc_config_scripts_ran_notes');?></th>
			<th><?php echo $this->Paginator->sort('sctp_verification');?></th>
			<th><?php echo $this->Paginator->sort('sctp_verification_notes');?></th>
			<th><?php echo $this->Paginator->sort('c_two_capacity_increased');?></th>
			<th><?php echo $this->Paginator->sort('c_two_capacity_increased_notes');?></th>
			<th><?php echo $this->Paginator->sort('process_rebalance_proc_verified');?></th>
			<th><?php echo $this->Paginator->sort('process_rebalance_proc_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('sctp_after_c_two_increase_verified');?></th>
			<th><?php echo $this->Paginator->sort('sctp_after_c_two_increase_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('app_reconfigured');?></th>
			<th><?php echo $this->Paginator->sort('app_reconfigured_notes');?></th>
			<th><?php echo $this->Paginator->sort('all_oc_three_connections_verified');?></th>
			<th><?php echo $this->Paginator->sort('all_oc_three_connections_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('fiber_cabling_to_odf_verified');?></th>
			<th><?php echo $this->Paginator->sort('fiber_cabling_to_odf_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('ff_mapping_msn_verified');?></th>
			<th><?php echo $this->Paginator->sort('ff_mapping_msn_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('sync_ref_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('sync_ref_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('tu_sync_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('tu_sync_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('tim_device_status_verified');?></th>
			<th><?php echo $this->Paginator->sort('tim_device_status_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('sync_in_locked_mode_verified');?></th>
			<th><?php echo $this->Paginator->sort('sync_in_locked_mode_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('sync_redundancy_test_performed');?></th>
			<th><?php echo $this->Paginator->sort('sync_redundancy_test_performed_notes');?></th>
			<th><?php echo $this->Paginator->sort('agps_connectivity_verified');?></th>
			<th><?php echo $this->Paginator->sort('agps_connectivity_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('cc_device_verified');?></th>
			<th><?php echo $this->Paginator->sort('cc_device_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('dc_device_verified');?></th>
			<th><?php echo $this->Paginator->sort('dc_device_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('ip_connectivity_oss_rc_verified');?></th>
			<th><?php echo $this->Paginator->sort('ip_connectivity_oss_rc_verified_notes');?></th>
			<th><?php echo $this->Paginator->sort('ntp_servers_connectivity_verified');?></th>
			<th><?php echo $this->Paginator->sort('ntp_servers_connectivity_verified_notes');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($thirdGroups as $thirdGroup):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $thirdGroup['ThirdGroup']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($thirdGroup['Report']['id'], array('controller' => 'reports', 'action' => 'view', $thirdGroup['Report']['id'])); ?>
		</td>
		<td><?php echo $thirdGroup['ThirdGroup']['date']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['rnc_config_scripts_ran']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['rnc_config_scripts_ran_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['sctp_verification']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['sctp_verification_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['c_two_capacity_increased']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['c_two_capacity_increased_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['process_rebalance_proc_verified']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['process_rebalance_proc_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['sctp_after_c_two_increase_verified']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['sctp_after_c_two_increase_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['app_reconfigured']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['app_reconfigured_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['all_oc_three_connections_verified']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['all_oc_three_connections_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['fiber_cabling_to_odf_verified']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['fiber_cabling_to_odf_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['ff_mapping_msn_verified']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['ff_mapping_msn_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['sync_ref_status_verified']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['sync_ref_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['tu_sync_status_verified']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['tu_sync_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['tim_device_status_verified']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['tim_device_status_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['sync_in_locked_mode_verified']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['sync_in_locked_mode_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['sync_redundancy_test_performed']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['sync_redundancy_test_performed_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['agps_connectivity_verified']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['agps_connectivity_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['cc_device_verified']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['cc_device_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['dc_device_verified']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['dc_device_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['ip_connectivity_oss_rc_verified']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['ip_connectivity_oss_rc_verified_notes']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['ntp_servers_connectivity_verified']; ?>&nbsp;</td>
		<td><?php echo $thirdGroup['ThirdGroup']['ntp_servers_connectivity_verified_notes']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $thirdGroup['ThirdGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $thirdGroup['ThirdGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $thirdGroup['ThirdGroup']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $thirdGroup['ThirdGroup']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Third Group', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>