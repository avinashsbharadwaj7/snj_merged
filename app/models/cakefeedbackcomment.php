<?php
class Cakefeedbackcomment extends AppModel {
	var $name = 'Cakefeedbackcomment';
	
	var $belongsTo = array(
		'Cakefeedback' => array(
			'className' => 'Cakefeedback',
			'foreignKey' => 'cakefeedback_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>