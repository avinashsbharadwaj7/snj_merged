<?php
class BulkLteRecord extends AppModel {
	var $name = 'BulkLteRecord';
        var $hasMany = array('BulkLteFile');
        
        var $validate = array(
            'date_created' => array(
                 'rule_2' => array(
                    'rule' => array('date','ymd'),
                    'message' => "Date must be in this format: YYYY-MM-DD",
                    'allowEmpty' => true
                ),
            ),
            'created_by' => array(
                'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please Enter Engineer Signum.',
                ),
            ),
        );

}
?>