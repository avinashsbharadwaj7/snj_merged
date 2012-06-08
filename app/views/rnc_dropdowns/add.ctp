<?php
/*
    Document   : add
    Created on : Jul 21, 2011, 2:46:32 PM
    Author     : emoibhu
    Description: Add View for RNC controller
*/
?><div class="rncDropdowns form">
<?php echo $form->create('RncDropdown');?>
	<fieldset>
		<legend><?php __('Add Rnc Dropdown'); ?></legend>
	<?php
		echo $form->input('field');
		echo $form->input('label');
		echo $form->input('value');
		echo $form->input('module_id');
		echo $form->input('weight');
	?>
	</fieldset>
<?php echo $form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $html->link(__('List Rnc Dropdowns', true), array('action' => 'index'));?></li>
	</ul>
</div>