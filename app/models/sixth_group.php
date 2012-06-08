<?php
class SixthGroup extends AppModel {
	var $name = 'SixthGroup';
        var $useDbConfig = "rncdb";
	var $validate = array(
		'report_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'No report ID defined yet. Please create the report first',
			),
                        'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'No report ID defined yet. Please create the report first',
			),
		),
                'date' => array(
			'date' => array(
				'rule' => array('date'),
                                'message' => 'Invalid Date.',
			),
		),
	);
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