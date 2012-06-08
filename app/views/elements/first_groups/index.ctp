<div class="firstGroups index">
	<h2><?php __('First Groups');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('report_id');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('serial_ethernet_setup');?></th>
			<th><?php echo $this->Paginator->sort('serial_ethernet_setup_notes');?></th>
			<th><?php echo $this->Paginator->sort('local_connectivity_verification');?></th>
			<th><?php echo $this->Paginator->sort('local_connectivity_verification_notes');?></th>
			<th><?php echo $this->Paginator->sort('oss_rc__lan_connection_verification');?></th>
			<th><?php echo $this->Paginator->sort('oss_rc_lan_connection_verification_notes');?></th>
			<th><?php echo $this->Paginator->sort('prerequisites_verification');?></th>
			<th><?php echo $this->Paginator->sort('prerequisites_verification_notes');?></th>
			<th><?php echo $this->Paginator->sort('oc3_verification');?></th>
			<th><?php echo $this->Paginator->sort('oc3_verification_notes');?></th>
			<th><?php echo $this->Paginator->sort('min_config_rnc_verification');?></th>
			<th><?php echo $this->Paginator->sort('min_config_rnc_verification_notes');?></th>
			<th><?php echo $this->Paginator->sort('remainder_rnc_config_verification');?></th>
			<th><?php echo $this->Paginator->sort('remainder_rnc_config_verification_notes');?></th>
			<th><?php echo $this->Paginator->sort('eti_pg_compatible_verification');?></th>
			<th><?php echo $this->Paginator->sort('eti_pg_compatible_verification_notes');?></th>
			<th><?php echo $this->Paginator->sort('rnc_wiring_verification');?></th>
			<th><?php echo $this->Paginator->sort('rnc_wiring_verification_notes');?></th>
			<th><?php echo $this->Paginator->sort('cables_cmxb_app_verification');?></th>
			<th><?php echo $this->Paginator->sort('cables_cmxb_app_verification_notes');?></th>
			<th><?php echo $this->Paginator->sort('subracks_power_verification');?></th>
			<th><?php echo $this->Paginator->sort('subracks_power_verification_notes');?></th>
			<th><?php echo $this->Paginator->sort('fans_power_verification');?></th>
			<th><?php echo $this->Paginator->sort('fans_power_verification_notes');?></th>
			<th><?php echo $this->Paginator->sort('rnc_led_behaviour_verification');?></th>
			<th><?php echo $this->Paginator->sort('rnc_led_behaviour_verification_notes');?></th>
			<th><?php echo $this->Paginator->sort('rnc_backup_completion');?></th>
			<th><?php echo $this->Paginator->sort('rnc_backup_completion_notes');?></th>
			<th><?php echo $this->Paginator->sort('node_initial_health_check_performed');?></th>
			<th><?php echo $this->Paginator->sort('node_initial_health_check_performed_notes');?></th>
			<th><?php echo $this->Paginator->sort('initial_kget_saved');?></th>
			<th><?php echo $this->Paginator->sort('initial_kget_saved_notes');?></th>
			<th><?php echo $this->Paginator->sort('startable_cv_rnc_saved');?></th>
			<th><?php echo $this->Paginator->sort('startable_cv_rnc_saved_notes');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($firstGroups as $firstGroup):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $firstGroup['FirstGroup']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($firstGroup['Report']['id'], array('controller' => 'reports', 'action' => 'view', $firstGroup['Report']['id'])); ?>
		</td>
		<td><?php echo $firstGroup['FirstGroup']['date']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['serial_ethernet_setup']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['serial_ethernet_setup_notes']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['local_connectivity_verification']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['local_connectivity_verification_notes']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['oss_rc__lan_connection_verification']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['oss_rc_lan_connection_verification_notes']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['prerequisites_verification']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['prerequisites_verification_notes']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['oc3_verification']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['oc3_verification_notes']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['min_config_rnc_verification']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['min_config_rnc_verification_notes']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['remainder_rnc_config_verification']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['remainder_rnc_config_verification_notes']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['eti_pg_compatible_verification']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['eti_pg_compatible_verification_notes']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['rnc_wiring_verification']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['rnc_wiring_verification_notes']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['cables_cmxb_app_verification']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['cables_cmxb_app_verification_notes']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['subracks_power_verification']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['subracks_power_verification_notes']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['fans_power_verification']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['fans_power_verification_notes']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['rnc_led_behaviour_verification']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['rnc_led_behaviour_verification_notes']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['rnc_backup_completion']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['rnc_backup_completion_notes']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['node_initial_health_check_performed']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['node_initial_health_check_performed_notes']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['initial_kget_saved']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['initial_kget_saved_notes']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['startable_cv_rnc_saved']; ?>&nbsp;</td>
		<td><?php echo $firstGroup['FirstGroup']['startable_cv_rnc_saved_notes']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $firstGroup['FirstGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $firstGroup['FirstGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $firstGroup['FirstGroup']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $firstGroup['FirstGroup']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New First Group', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Reports', true), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report', true), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>