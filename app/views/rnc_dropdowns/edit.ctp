<div class="rncDropdowns form">
<?php echo $form->create('RncDropdown');?>
	<fieldset>
		<legend><?php __('Edit Rnc Dropdown'); ?></legend>
	<?php
		echo $form->input('id');
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

		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('RncDropdown.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('RncDropdown.id'))); ?></li>
		<li><?php echo $html->link(__('List Rnc Dropdowns', true), array('action' => 'index'));?></li>
	</ul>
</div>