<?php
class RncIssue extends AppModel {
	var $name = 'RncIssue';
	var $useDbConfig = 'rncdb';
	var $displayField = 'rnc_report_id';
	var $validate = array(
		'rnc_report_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
                                'message' => 'The issue tracker couldn\'t retrieve the report Id',
			),
		),
		'rnc_step_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
                                'message' => 'The issue tracker couldn\'t retrieve the step Id',
			),
		),
		'rnc_step' => array(
			'notempty' => array(
				'rule' => array('notempty'),
                                'message' => 'The issue tracker couldn\'t retrieve the step name',
			),
		),
		'issue_owner' => array(
			'notempty' => array(
                                'rule' => array('notempty'),
				'message' => 'Please enter Issue Owner',
			),
		),
		'impact' => array(
			'notempty' => array(
                                'rule' => array('notempty'),
				'message' => 'Please enter Impact of the issue',
			),
		),
		'impact_in_time' => array(
			'notempty' => array(
                                'rule' => array('notempty'),
				'message' => 'Please enter the impact in time (in minutes). Should be numeric.',
			),
                        'numeric' => array(
                                'rule' => array('numeric'),
                                'message' => 'It should be numeric value.',
                        )
		),
		'issue_reason' => array(
			'notempty' => array(
                                'rule' => array('notempty'),
				'message' => 'Please select the reason of the issue',
			),
		),
		'issue_details' => array(
			'notempty' => array(
                                'rule' => array('notempty'),
				'message' => 'Please describe the issue in detail.',
			),
		),
	);
        
	var $belongsTo = array(
		'RncReport' => array(
			'className' => 'RncReport',
			'foreignKey' => 'rnc_report_id',
		)
	);
}
?>