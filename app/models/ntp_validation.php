<?php

class NtpValidation extends AppModel {
    var $name = 'NtpValidation';    


    var $values_arr = array(
                    'work_location' => array('Onsite(Customer)','Remote','Other'),
                    'csb_check' => array('No'),
                    'rnc_oss_script_load_complete' => array('No'),
                    'rnc_oss_scripts_released' => array('Yes'),
                    'rnc_frequency_check' => array('No'),
                    'vswr_check' => array('No'),
                    'rssi_check' => array('No'),
                    'alarm_check' => array('Yes'),
                    'kpi_check' => array('No'),
                    'ntp_pingable' => array('No'),
                    'ftp_pingable' => array('No'),
                    'final_results' => array('Passed With Issues','Did Not Pass')                    
                    );



    var $validate = array(
		'customer' => array(
                          'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select the Customer.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'time_taken_for_activity'=> array(
			'notempty' => array(
				'rule' => array('time'),                                
				'message' => 'Please enter the time spent on this activity in the right format (HH:MM).',
			),
		),        
        
                'region' => array(
                          'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select the Region.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'organization' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',                    
                'message' => 'This field cannot be empty',
                ),
            ),        
                'rnc' => array(
                          'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the RNC Name.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'work_location' => array(
                          'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select the Work Location.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'work_location_other' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','work_location'),
				'message' => 'Please Specify the Work Location.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
           'date_integration_scheduled' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select the Integration Scheduled Date.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),            
		'site_main_cabinet' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please enter the Site name for the main cabinet',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),      
                'csb_issue' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','csb_check'),
				'message' => 'Please mention the CCB issues.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
        'rnc_oss_script_load_complete' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select if the script load was complete.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		'rnc_oss_scripts_released' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','rnc_oss_script_load_complete'),
				'message' => 'Please select if the scripts were released.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		'rnc_oss_scripts_release_date' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','rnc_oss_scripts_released'),
				'message' => 'Please mention the script release date.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		 'rnc_frequency_check' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select if the frequency of the RNC was okay.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
         'rnc_frequency_issue' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','rnc_frequency_check'),
				'message' => 'Please Specify the RNC Frequency Issue.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		'vswr_check' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select if the VSWR was okay.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
         'vswr_issue' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','vswr_check'),
				'message' => 'Please Specify the VSWR Issue.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
        'rssi_check' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select if the RSSI was okay.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
         'rssi_issue' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','rssi_check'),
				'message' => 'Please Specify the RSSI Issue.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
          'alarm_check' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select if there were alarms.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
         'alarm_description' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','alarm_check'),
				'message' => 'Please Specify the alarms.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
         'kpi_check' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select if the KPIs were okay.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
         'bad_kpi_description' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','kpi_check'),
				'message' => 'Please specify the KPIs.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		 'steered_hs_allocation' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select the steered hs allocation.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		), 
		'auto_configuration' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select the auto configuration.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		 'cabinet_view_check' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select if the Cabinet View was checked.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		'cabinet_issue' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please specify the Cabinet issues.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		'ntp_pingable' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select if the NTP Server was pingable.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
         'ntp_issues' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','ntp_pingable'),
				'message' => 'Please specify the NTP issues.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		'ftp_pingable' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select if the FTP Server was pingable.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
         'ftp_issues' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','ftp_pingable'),
				'message' => 'Please specify the FTP Issues.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
         'activity_type' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please Select the Activity.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
          'final_results' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please Select the Final Result.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),                
		),
                'emphasis_needed_on' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','final_results'),
				'message' => 'Please specify.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
                 )

        );
		
	
    
    function validateDependency($check,$compare) {
      $compare_field = $this->data['NtpValidation'][$compare]; // get the value in the $compare field

      $val = $this->values_arr[$compare];   //get the dependent values form the array above for the $compare field
      if(in_array($compare_field,$val) && ($check[key($check)] == "")) //check if the value is $compare is in the dependent values - if yes and the field that is checked for is empty (mandatory field empty) return false
            return false;      
      else
          return true;
  }

 

  function beforeSave()
  {
  
	  $date_created = date("Y-m-d H:i:s");
	  
		if($this->data['NtpValidation']['comments'] != "")
		  {
				$sig_model = Authsome::get('username');
				$this->data['NtpValidation']['comments'] = $sig_model." - ".$date_created."\n".$this->data['NtpValidation']['comments']."\n";
		  }
      return true;
  }
}

?>