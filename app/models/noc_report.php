<?php

class NocReport extends AppModel {
    var $name = 'NocReport';    


    var $values_arr = array(
                    'work_location' => array('Onsite(Customer)','Remote','Other'),
                    'ntp_validated' => array('Yes') ,                                  
                    'ntp_issues_encountered' => array('Yes') ,                                  
                    'csb_issues_encountered' => array('Yes') ,                                  
                    'asp_mop' => array('Yes') ,                                  
                    'building_access' => array('No') ,                                  
                    'site_location_known' => array('No') ,                                  
                    'hdwr_delivered' => array('No') ,                                  
                    'asp_has_tools_spares' => array('No') ,                                  
                    'asp_has_nodeb_tma_scripts' => array('No') ,                                  
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
		'day_or_night' => array(
                          'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select if the activity was carried out during the day or night.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		'asp_name' => array(
                          'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please mention the ASP Full Name.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		'asp_contact' => array(
                          'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please mention the ASP Contact Number.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		'asp_company' => array(
                          'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please mention the ASP Company.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		'im_or_pm' => array(
                          'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please mention the IM/PM Name.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		'activity_type' => array(
                          'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select the activity type.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		'date_integration_scheduled' => array(
                          'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select the date integration is scheduled.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
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
		'site_name_main_cabinet' => array(
                          'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the Site Name.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		'ntp_validated' => array(
                          'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select if the site was ntp validated.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		  'ntp_issues_encountered' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','ntp_validated'),
				'message' => 'Please Specify if issues were encountered during NTP validation.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		  'ntp_issues' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','ntp_issues_encountered'),
				'message' => 'Please describe the NTP issues.',
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
           
		'csb_number' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please enter the CSB Number.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),   
		'csb_issues_encountered' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select if CSB Issues were encountered',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),  
		
        'csb_issues' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','csb_issues_encountered'),
				'message' => 'Please describe the CSB Issues.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		'asp_mop' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select if ASP has the MOP.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),   
		 'asp_mop_revision' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','asp_mop'),
				'message' => 'Please enter the MOP revision.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		'building_access' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select if there is building access.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),   
		 'building_access_issues' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','building_access'),
				'message' => 'Please describe the building access issues.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		'site_location_known' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select if the ASP knows the site location.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),   
		 'site_location_or_direction_issues' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','site_location_known'),
				'message' => 'Please describe the site location/direction issues faced.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		'hdwr_delivered' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select if the hardware was delivered.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),   
		 'hdwr_delivery_issues' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','hdwr_delivered'),
				'message' => 'Please describe the hardware delivery issues.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		'asp_has_tools_spares' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select if the ASP had all the necessary tools/spares.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),   
		 'asp_tools_spares_issues' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','asp_has_tools_spares'),
				'message' => 'Please describe the tools/spares issues.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		'asp_has_tools_spares' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select if the ASP had all the necessary tools/spares.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),   
		 'asp_tools_spares_issues' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','asp_has_tools_spares'),
				'message' => 'Please describe the tools/spares issues.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		
		'asp_has_nodeb_tma_scripts' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select if the ASP has all the scripts.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),   
		 'asp_nodeb_tma_scripts_issues' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','asp_has_nodeb_tma_scripts'),
				'message' => 'Please describe the script issues.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		
		'nodeb_swinfo_loc_access_confirmed' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select if the NodeB Software Information, Location and Access are Confirmed.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		), 
		
		'asp_has_contact_details' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select if the ASP has the necessary contact details.',
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
				'message' => 'Please select the final result.',
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
				'message' => 'Please describe the emphasis needed.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),

        );
		
	
    
    function validateDependency($check,$compare) {
      $compare_field = $this->data['NocReport'][$compare]; // get the value in the $compare field

      $val = $this->values_arr[$compare];   //get the dependent values form the array above for the $compare field
      if(in_array($compare_field,$val) && ($check[key($check)] == "")) //check if the value is $compare is in the dependent values - if yes and the field that is checked for is empty (mandatory field empty) return false
            return false;      
      else
          return true;
  }

 

  function beforeSave()
  {
  
	  $date_created = date("Y-m-d H:i:s");
	  
		if($this->data['NocReport']['comments'] != "")
		  {
				$sig_model = Authsome::get('username');
				$this->data['NocReport']['comments'] = $sig_model." - ".$date_created."\n".$this->data['NocReport']['comments']."\n";
		  }
      return true;
  }
}

?>