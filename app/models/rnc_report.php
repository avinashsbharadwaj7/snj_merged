<?php
class RncReport extends AppModel {
	var $name = 'RncReport';
        var $useDbConfig = "rncdb";
	var $validate = array(
		'report_number' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Invalid Report ID',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'status' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select the Status.',
			),
		),
                'rnc_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the RNC Name.',
			),
		),
                'ip_address' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the IP address.',
			),
                        'ip' => array(
                            'rule' => array('ip', 'IPv4'), 
                            'message' => 'Please supply a valid IP address.'
                        )
		),
                'toycell_ip_address' => array(
			'ip' => array(
                            'rule' => array('ip', 'IPv4'),
                            'message' => 'Please supply a valid IP address.',
                            'allowEmpty' => true
                        )
		),
                'customer' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select Customer Name.',
			),
		),
                'project_manager' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter Project Manager.',
			),
		),
                'network_number' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a Network Number.',
			),
		),
                'sdm' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter SDM',
			),
		),
		'engineer_work_location' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select your location',
			),
		),
		'version' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'region' => array(
			'numeric' => array(
				'rule' => array('notempty'),
                                'message' => "Please select the region",
			),
		),
		'hardware_type' => array(
			'numeric' => array(
				'rule' => array('notempty'),
                                'message' => "Please select the hardware type",
			),
		),
		'software_version' => array(
			'numeric' => array(
				'rule' => array('notempty'),
                                'message' => "Please select the Software version",
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'EighthGroup' => array(
			'className' => 'EighthGroup',
			'foreignKey' => 'report_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EleventhGroup' => array(
			'className' => 'EleventhGroup',
			'foreignKey' => 'report_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'FifthGroup' => array(
			'className' => 'FifthGroup',
			'foreignKey' => 'report_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'FirstGroup' => array(
			'className' => 'FirstGroup',
			'foreignKey' => 'report_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'FourthGroup' => array(
			'className' => 'FourthGroup',
			'foreignKey' => 'report_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'FourthQa' => array(
			'className' => 'FourthQa',
			'foreignKey' => 'report_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'LogFile' => array(
			'className' => 'LogFile',
			'foreignKey' => 'report_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'NinthGroup' => array(
			'className' => 'NinthGroup',
			'foreignKey' => 'report_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'RncEngineer' => array(
			'className' => 'RncEngineer',
			'foreignKey' => 'report_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'SecondGroup' => array(
			'className' => 'SecondGroup',
			'foreignKey' => 'report_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'SecondQa' => array(
			'className' => 'SecondQa',
			'foreignKey' => 'report_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'FirstQa' => array(
			'className' => 'FirstQa',
			'foreignKey' => 'report_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'SeventhGroup' => array(
			'className' => 'SeventhGroup',
			'foreignKey' => 'report_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'SixthGroup' => array(
			'className' => 'SixthGroup',
			'foreignKey' => 'report_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'TenthGroup' => array(
			'className' => 'TenthGroup',
			'foreignKey' => 'report_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ThirdGroup' => array(
			'className' => 'ThirdGroup',
			'foreignKey' => 'report_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ThirdQa' => array(
			'className' => 'ThirdQa',
			'foreignKey' => 'report_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'RncIssue' => array(
			'className' => 'RncIssue',
			'foreignKey' => 'rnc_report_id',
			'dependent' => false,
		)
	);

        function  beforeSave($options = array()) {
            parent::beforeSave($options);
            $this->data['RncReport']['latest_timestamp'] = date('Y-m-d G:i:s');
            return true;
        }

        function getNextReportNumber(){
            $rows = $this->find("all", array('limit'=>1, 'order'=>'RncReport.report_number desc', 'fields'=>array("RncReport.report_number")));
            $report_no = $rows[0]['RncReport']['report_number'];
            if($report_no < 1000001) $report_no = 1000001;
            return $report_no+1;
        }

        function getData(){
            return $this->data;
        }
}
?>