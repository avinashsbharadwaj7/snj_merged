<?php
class TiTrackerTitle extends AppModel {
	var $name = 'TiTrackerTitle';
	var $displayField = 'title';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'TiTracker' => array(
			'className' => 'TiTracker',
			'foreignKey' => 'ti_tracker_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>