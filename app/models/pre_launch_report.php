<?php
class PreLaunchReport extends AppModel {
	var $name = 'PreLaunchReport';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'RfModule' => array(
			'className' => 'RfModule',
			'foreignKey' => 'rf_module_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>