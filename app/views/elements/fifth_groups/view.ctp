<div class="fifthGroups form">
<?php echo $form->create('FifthGroup', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Fifth Group'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
		echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
                ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('IUCS_IP'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iucs_ip'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['iucs_ip_notes'] !== "" && !empty($firstGroup['FirstGroup']['iucs_ip_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iucs_ip_notes'];?>
&nbsp;
</dd>
<?php endif;?>

                echo $html->div('imp_note', "Note : For IuCS over IP integration, please follow the attached MOP for verification.");
                echo $html->div('imp_note',$html->link('EMC-11:003347 Uen, IuCS over IP RNC integartion',
                        "http://anon.ericsson.se/eridoc/erl.html?objectId=09004cff84e1782e&docno=EMC-11:003347Uen&action=approved&format=msw8",
                        array('target' => '_blank')));
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the AAL5 Termination Point Status for CS'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['aal_termination_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['aal_termination_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['aal_termination_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['aal_termination_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the NNI-SAAL Layer Status for CS'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['nni_saal_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['nni_saal_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['nni_saal_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['nni_saal_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the MTP3b Signaling Status toward the MSC (Signaling Links, SLS, AP)'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['mtpb_signaling_status_msc_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['mtpb_signaling_status_msc_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['mtpb_signaling_status_msc_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['mtpb_signaling_status_msc_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the MPT3b Signaling Status towards the MGw (Signaling Links, SLS, AP, Q.2630.2)'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['mtpb_signaling_status_mgw_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['mtpb_signaling_status_mgw_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['mtpb_signaling_status_mgw_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['mtpb_signaling_status_mgw_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the SCCP signaling point status for CS'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['sccp_signaling_pt_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['sccp_signaling_pt_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['sccp_signaling_pt_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['sccp_signaling_pt_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the AAL2 Path Status towards the MGw (CS Userplane)'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['aal_path_status_mgw_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['aal_path_status_mgw_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['aal_path_status_mgw_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['aal_path_status_mgw_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify the RANAP status for CS'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['ran_ap_status_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['ran_ap_status_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['ran_ap_status_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['ran_ap_status_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('RNC Froid inconsistency check'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['rnc_froid_inconsistency_check'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['rnc_froid_inconsistency_check_notes'] !== "" && !empty($firstGroup['FirstGroup']['rnc_froid_inconsistency_check_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['rnc_froid_inconsistency_check_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify AAL2 redundancy'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['aal_redundancy_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['aal_redundancy_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['aal_redundancy_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['aal_redundancy_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Perform basic circuit switched call testing'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['basic_circuit_switched_call_testing_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['basic_circuit_switched_call_testing_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['basic_circuit_switched_call_testing_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['basic_circuit_switched_call_testing_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

                echo $html->div('imp_note', "Note:  Notify the Ericsson PM that the RNC is ready for Tektronix engineers Call Test");
	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>
