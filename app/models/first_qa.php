<?php
class FirstQa extends AppModel {
	var $name = 'FirstQa';
        var $useDbConfig = "rncdb";
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Report' => array(
			'className' => 'Report',
			'foreignKey' => 'report_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>