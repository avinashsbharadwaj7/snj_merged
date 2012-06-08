<?php
class TiTracker extends AppModel {
	var $name = 'TiTracker';
	var $displayField = 'name';
	var $validate = array(
		'project' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
                'organization' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',                    
                'message' => 'This field cannot be empty',
                ),
            )            
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'TiTrackerTitle' => array(
			'className' => 'TiTrackerTitle',
			'foreignKey' => 'ti_tracker_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>