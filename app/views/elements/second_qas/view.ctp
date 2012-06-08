<div class="secondQas form">
<?php echo $form->create('SecondQa', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Verify RAN Integration Activity/Feature Logs'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
                echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
                ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify Post Audit GS Baseline script loaded'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_post_audit_gs_baseline'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_post_audit_gs_baseline_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_post_audit_gs_baseline_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_post_audit_gs_baseline_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify ATM port & MSP 1+1 failover testing'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_atm_port_msp_failover'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_atm_port_msp_failover_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_atm_port_msp_failover_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_atm_port_msp_failover_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify Re-mod tests for all ATM port using Toycell'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_remod_tests_atm_port_toycell'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_remod_tests_atm_port_toycell_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_remod_tests_atm_port_toycell_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_remod_tests_atm_port_toycell_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify AAL bearer redundancy test for all AAL2 bearers to MGW'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_aal_redudancy_to_mgw'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_aal_redudancy_to_mgw_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_aal_redudancy_to_mgw_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_aal_redudancy_to_mgw_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify basic CS voice calls 3G M2M, Mob Orig, Mob Term'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_vasic_cs_voice_calss_3m_m2m_mob'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_vasic_cs_voice_calss_3m_m2m_mob_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_vasic_cs_voice_calss_3m_m2m_mob_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_vasic_cs_voice_calss_3m_m2m_mob_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify ping tests were successful for both Control Plane & User Plane to SGSN.'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_ping_user_plane_sgsn'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_ping_user_plane_sgsn_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_ping_user_plane_sgsn_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_ping_user_plane_sgsn_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify PDR bearer redundancy test for all PDR to SGSN'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_pdr_to_sgsn'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_pdr_to_sgsn_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_pdr_to_sgsn_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_pdr_to_sgsn_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify basic PS data calls completed R99 HSPA + EUL (dependent on UEs provided & toy-cell HW'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_basic_ps_data_calls'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_basic_ps_data_calls_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_basic_ps_data_calls_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_basic_ps_data_calls_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify GPB C1 redundancy tests done'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_gpbc1_redudancy_tests'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_gpbc1_redudancy_tests_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_gpbc1_redudancy_tests_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_gpbc1_redudancy_tests_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify that GPB C2 redundancy tests done'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_gpbc2_redudancy_tests'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_gpbc2_redudancy_tests_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_gpbc2_redudancy_tests_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_gpbc2_redudancy_tests_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify that SCB-DF redundancy tests done'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_scbdf_redudancy_tests'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_scbdf_redudancy_tests_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_scbdf_redudancy_tests_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_scbdf_redudancy_tests_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify TUB board redundancy tests done'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_tub_board_redudancy_tests'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_tub_board_redudancy_tests_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_tub_board_redudancy_tests_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_tub_board_redudancy_tests_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify AGPS redundancy tests executed'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_agps_redudancy_tests'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_agps_redudancy_tests_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_agps_redudancy_tests_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_agps_redudancy_tests_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify CMXB board redundancy tests done'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_cmxb_board_redudancy_tests'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_cmxb_board_redudancy_tests_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_cmxb_board_redudancy_tests_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_cmxb_board_redudancy_tests_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify ET-IPG board redundancy tests done'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_etipg_board_redudancy_tests'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_etipg_board_redudancy_tests_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_etipg_board_redudancy_tests_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_etipg_board_redudancy_tests_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify ET-MF4 board redundancy tests done'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_etimf4_board_redudancy_tests'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_etimf4_board_redudancy_tests_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_etimf4_board_redudancy_tests_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_etimf4_board_redudancy_tests_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify APP redundancy tests were executed'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_app_redudancy_tests'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_app_redudancy_tests_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_app_redudancy_tests_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_app_redudancy_tests_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify IUCS link redundancy tests done'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_iucs_link_redudancy_tests'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_iucs_link_redudancy_tests_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_iucs_link_redudancy_tests_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_iucs_link_redudancy_tests_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify IUPS link redundancy tests done'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_iups_link_redudancy_tests'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_iups_link_redudancy_tests_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_iups_link_redudancy_tests_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_iups_link_redudancy_tests_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('If IUB-IP is implemented for Toy-cell then verify IUB-IP link redundancy tests were executed **'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_iubip_link_redudancy_tests'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_iubip_link_redudancy_tests_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_iubip_link_redudancy_tests_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_iubip_link_redudancy_tests_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify Core MP redundancy'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_core_mp_redudancy_tests'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_core_mp_redudancy_tests_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_core_mp_redudancy_tests_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_core_mp_redudancy_tests_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify all MSPG Working ATM ports including Management Adaptaion Object standardMode'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_all_mspg'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_all_mspg_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_all_mspg_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_all_mspg_notes'];?>
&nbsp;
</dd>
<?php endif;?>

                echo $html->div('comment', "** If IUB-ATM is implemented for Toy-cell then verify IUB-ATM link redundancy tests were executed.");
	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>