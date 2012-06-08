<?php
class Cakefeedback extends AppModel {
	var $name = 'Cakefeedback';
	
	 var $hasMany = array(
            'Cakefeedbackcomment'=> array(
			'className' => 'Cakefeedbackcomment',
			'foreignKey' => 'cakefeedback_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
                    ));
	
}
?>