<div class="thirdQas form">
<?php echo $form->create('ThirdQa', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('PARAMETER CHECKS'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
                echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
                ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Emergency Redirect ON/ Service Based Handover (SBHO) - OFF'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['emergency_redirect_on_service_based_handover'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['emergency_redirect_on_service_based_handover_notes'] !== "" && !empty($firstGroup['FirstGroup']['emergency_redirect_on_service_based_handover_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['emergency_redirect_on_service_based_handover_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Emergency Redirect OFF/ Service Based Handover (SBHO) – ON'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['emergency_redirect_off_service_based_handover'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['emergency_redirect_off_service_based_handover_notes'] !== "" && !empty($firstGroup['FirstGroup']['emergency_redirect_off_service_based_handover_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['emergency_redirect_off_service_based_handover_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verify RNC connectivity to OSS including RNC,OAM router settings'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verfiy_rnc_connectivity_oss_rnc_oam_router'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['verfiy_rnc_connectivity_oss_rnc_oam_router_notes'] !== "" && !empty($firstGroup['FirstGroup']['verfiy_rnc_connectivity_oss_rnc_oam_router_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['verfiy_rnc_connectivity_oss_rnc_oam_router_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('LTE readiness configuration'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['lte_readiness_configuration'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['lte_readiness_configuration_notes'] !== "" && !empty($firstGroup['FirstGroup']['lte_readiness_configuration_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['lte_readiness_configuration_notes'];?>
&nbsp;
</dd>
<?php endif;?>

	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>