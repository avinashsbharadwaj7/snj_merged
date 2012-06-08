<?php
class RfHelp extends AppModel {
	var $name = 'RfHelp';
	var $validate = array(
		'field' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

        public function getHelpText($field) {
            return $this->find('all', array('conditions'=>array('field'=>$field)));
        }
}
?>