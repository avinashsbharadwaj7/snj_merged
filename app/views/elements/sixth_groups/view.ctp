<div class="sixthGroups form">
<?php echo $form->create('SixthGroup', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Sixth Group'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
		echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
                ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the VLANs are correctly configured for IuPS CP'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['vlans_config_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['vlans_config_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['vlans_config_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['vlans_config_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the status of the GigaBitEthernet'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['giga_bit_ethernet_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['giga_bit_ethernet_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['giga_bit_ethernet_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['giga_bit_ethernet_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the status of the IpInterface'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['ip_interface_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['ip_interface_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['ip_interface_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['ip_interface_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the status of the IpAccessHostGpb'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['ip_access_host_gpb_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['ip_access_host_gpb_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['ip_access_host_gpb_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['ip_access_host_gpb_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the status of the Sctp'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['sctp_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['sctp_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['sctp_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['sctp_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the status of the Mtb3p Signaling Point'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['mtbp_signaling_pt_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['mtbp_signaling_pt_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['mtbp_signaling_pt_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['mtbp_signaling_pt_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the status of the M3uAssociation'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['mu_association_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['mu_association_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['mu_association_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['mu_association_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the status of the Mtp3b Signaling Routes and Signaling Route Set'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['mtpb_signaling_and_signaling_route_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['mtpb_signaling_and_signaling_route_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['mtpb_signaling_and_signaling_route_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['mtpb_signaling_and_signaling_route_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the status of the Mtp3b Access Point'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['mtpb_access_pt_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['mtpb_access_pt_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['mtpb_access_pt_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['mtpb_access_pt_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the status of the Sccp Signaling Point'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['sccp_signaling_pt_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['sccp_signaling_pt_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['sccp_signaling_pt_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['sccp_signaling_pt_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the status of the Sccp Local Access Point'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['sccp_local_access_pt_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['sccp_local_access_pt_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['sccp_local_access_pt_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['sccp_local_access_pt_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the status of the Sccp Remote Access Point'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['scp_remote_access_pt_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['scp_remote_access_pt_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['scp_remote_access_pt_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['scp_remote_access_pt_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Signaling Connectivity and Redundancy Testing'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['signaling_conn_redundancy_tested'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['signaling_conn_redundancy_tested_notes'] !== "" && !empty($firstGroup['FirstGroup']['signaling_conn_redundancy_tested_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['signaling_conn_redundancy_tested_notes'];?>
&nbsp;
</dd>
<?php endif;?>

	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>