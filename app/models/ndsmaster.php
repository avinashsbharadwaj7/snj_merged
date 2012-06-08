<?php
class Ndsmaster extends AppModel {
	var $name = 'Ndsmaster';
        
        var $hasMany = array('Ndsfile', 'Ndssite');
        
        var $validate = array(
            'engineer_signum' => array(
                'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please Enter Engineer Signum.',
                ),
            ),
            'engineer_name' => array(
                'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please Enter Engineer Name.',
                ),
            ),
            'engineer_work_location' => array(
                'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please Enter the Engineer work location.',
                ),
            ),
            'work_location_remote' => array(
                'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please Specify the Remote Work Location.',
                ),
            ),
            'date_created' => array(
                 'rule_2' => array(
                    'rule' => array('date','ymd'),
                    'message' => "Date must be in this format: YYYY-MM-DD",
                    'allowEmpty' => true

                ),
            ),
            'activity_nds' => array(
                 'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => "Please Specify the Activity Type"
                ),
            ),
            'time_taken_for_activity' => array(
                 'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => "Please Enter Time Taken to Perform Activity"
                ),
                'rule_2' => array(
                  'rule' => 'time',
                  'message' => 'Enter Time in HH:MM Format'
                ),
            ),
            'network_number' => array(
                 'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => "Please Specify the Network Number"
                ),
            ),
        );
}
?>