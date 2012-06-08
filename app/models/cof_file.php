<?php
class CofFile extends AppModel {
 var $name = 'CofFile';
 var $belongsTo = array(
		'Cofmaster' => array(
			'className' => 'Cofmaster',
			'foreignKey' => 'cofmaster_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
 
}

?>

