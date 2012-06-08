<div class="eighthGroups form">
<?php echo $form->create('EighthGroup', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Eighth Group'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
		echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
                ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the AAL5 Termination Point Status for Iur'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['aal_termination_pt_iur_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['aal__termination_pt_iur_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['aal__termination_pt_iur_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['aal__termination_pt_iur_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the NNI-SAAL Layer Status for Iur'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['nni_saal_layer_status_iur_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['nni_saal_layer_status_iur_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['nni_saal_layer_status_iur_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['nni_saal_layer_status_iur_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the MPT3b Signaling Status for Iur (Signaling Links, SLS, AP, Q.2630.2)'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['mptb_signaling_status_iur_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['mptb_signaling_status_iur_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['mptb_signaling_status_iur_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['mptb_signaling_status_iur_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the SCCP signaling point status for CS'); ?></dt>
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

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the AAL2 Path Status for Iur'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['aal_path_status_iur_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['aal_path_status_iur_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['aal_path_status_iur_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['aal_path_status_iur_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the RNSAP status for Iur'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['rns_ap_status_iur_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['rns_ap_status_iur_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['rns_ap_status_iur_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['rns_ap_status_iur_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>