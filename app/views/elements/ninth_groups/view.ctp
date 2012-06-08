<div class="ninthGroups form">
<?php echo $form->create('NinthGroup', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Ninth Group'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
		echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
                ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify GPB C1 Redundancy (Core & O&M)'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['gpbc_one_redundancy_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['gpbc_one_redundancy_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['gpbc_one_redundancy_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['gpbc_one_redundancy_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify GPB C2 Redundancy (RANAP, RNSAP, SCCP)'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['gpbc_two_redundancy_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['gpbc_two_redundancy_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['gpbc_two_redundancy_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['gpbc_two_redundancy_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify SCB-DF Redundancy'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['scbdf_redundancy_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['scbdf_redundancy_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['scbdf_redundancy_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['scbdf_redundancy_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify TUB Board Redundancy'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['tub_board_redundancy_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['tub_board_redundancy_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['tub_board_redundancy_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['tub_board_redundancy_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify CMXB Board Redundancy'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['cmxb_board_redundancy_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['cmxb_board_redundancy_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['cmxb_board_redundancy_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['cmxb_board_redundancy_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ET-IPG Board Redundancy Verification'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['etipg_board_redundancy_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['etipg_board_redundancy_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['etipg_board_redundancy_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['etipg_board_redundancy_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify ET-MF4 Redundancy – Main Subrack'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['main_subrack_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['main_subrack_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['main_subrack_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['main_subrack_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify ET-MF4 Redundancy – Extension Subrack'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['ext_subrack_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['ext_subrack_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['ext_subrack_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['ext_subrack_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Use AMOS to Re-module the Toy Cell to each ES'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['use_amos_to_remodule_toycell'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['use_amos_to_remodule_toycell_notes'] !== "" && !empty($firstGroup['FirstGroup']['use_amos_to_remodule_toycell_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['use_amos_to_remodule_toycell_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify Active Patch Panel Redundancy'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['active_patch_panel_redundancy_verified'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['active_patch_panel_redundancy_verified_notes'] !== "" && !empty($firstGroup['FirstGroup']['active_patch_panel_redundancy_verified_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['active_patch_panel_redundancy_verified_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify IuCS link redundancy'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_iucs_link_redundancy'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_iucs_link_redundancy_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_iucs_link_redundancy_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_iucs_link_redundancy_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify IuPS link redundancy'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_iups_link_redundancy'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_iups_link_redundancy_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_iups_link_redundancy_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_iups_link_redundancy_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify Iub over IP link redundancy (if applicable)'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_iub_over_ip_link'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_iub_over_ip_link_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_iub_over_ip_link_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_iub_over_ip_link_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify Iub over ATM link redundancy (if applicable)'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_iub_over_atm_link'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verify_iub_over_atm_link_notes'] !== "" && !empty($firstGroup['FirstGroup']['verify_iub_over_atm_link_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verify_iub_over_atm_link_notes'];?>
&nbsp;
</dd>
<?php endif;?>

	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>