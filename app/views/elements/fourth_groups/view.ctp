<div class="fourthGroups form">
<?php echo $form->create('FourthGroup', array("action"=>"add"));?>
	<fieldset>
		<legend><?php __('Fourth Group'); ?></legend>
	<?php
		echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
		echo $form->input('date', array("type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
                ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Perform a complete backup if the Toycell'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['perform_toycell_backup'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['perform_toycell_backup_notes'] !== "" && !empty($firstGroup['FirstGroup']['perform_toycell_backup_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['perform_toycell_backup_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Load the Toycell configuration files in the RNC'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['toycell_config_files_loaded'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['toycell_config_files_loaded_notes'] !== "" && !empty($firstGroup['FirstGroup']['toycell_config_files_loaded_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['toycell_config_files_loaded_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Prepare the Toycell for use with the new RNC'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['toycell_rnc_prepared'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['toycell_rnc_prepared_notes'] !== "" && !empty($firstGroup['FirstGroup']['toycell_rnc_prepared_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['toycell_rnc_prepared_notes'];?>
&nbsp;
</dd>
<?php endif;?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Perform a complete backup if the Toycell'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['perform_toycell_backup_again'];?>
&nbsp;
</dd>

		<?php if($firstGroup['FirstGroup']['perform_toycell_backup_again_notes'] !== "" && !empty($firstGroup['FirstGroup']['perform_toycell_backup_again_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['perform_toycell_backup_again_notes'];?>
&nbsp;
</dd>
<?php endif;?>

	?>
	</fieldset>
<?php echo $form->end(__('Save', true));?>
</div>
