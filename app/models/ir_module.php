
<?php
class IrModule extends AppModel {
	var $name = 'IrModule';
        
        var $ShActivities = array("New Integration (Iub over ATM)",
                                  "New Integration (Iub over IP)",
                                  "2nd Carrier Add (Regular)",
                                  "2nd Carrier Add Split Power Config",
                                  "3rd Carrier Add Stand Alone (Iub over ATM)",         
                                  "3rd Carrier Add Stand Alone (Iub over IP)",                     
                                  "3rd Carrier Add using OBIF & RRUW",                      
                                  "3rd Carrier Add Cabinet Reconfiguration",
                                  "3rd Carrier Add Split Power Config",                        
                                  "4th Carrier Add using OBIF & RRUW",
                                  "4th Carrier Add New Cabinet (Iub over ATM)",
                                  "4th Carrier Add New Cabinet (Iub over IP)",                   
                                  "4th Carrier Add OBIF Split-power Config",                   
                                  "5th Carrier Add Cable Crossover (Iub over ATM)",
                                  "5th Carrier Add Cable Crossover (Iub over IP)",
                                  "5th Carrier Add using OBIF & RRUW",
                                  "RU/RRU swaps",
                                  "Software Upgrade",                          
                                  "Add Sector",
                                  "Delete Sector",
                                  "Cabinet Swap",
                                  "LKF",
                                  "T1 Add",
                                  "TX60-Board Add/Swap",
                                  "ET-MFX Board Add ( Node-B )",
                                  "TX/RAX Board Add"        
    );        
      
        var $values_arr = array(
                    'engineer_work_location' => array('RNAM NIC Remote','RNAM NDS Remote','Other'),
                    'access_method' => array('Sonar'),
                    'mop_used' => array('Yes')

                    );

	var $validate = array(	
                'carriers' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.'
			)
		),            
                'tcm_engineer' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.'
			)
		),
		'date_time_activity' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
                'market' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
                'organization' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),            
		'sh_integrationcomplete' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_launchstatus' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_launchedby' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_readyforservice' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_readyfortuning' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),            
		'sh_site' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.'
                            ),
		),
		'sh_site1' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.'
			),
		),
		'sh_site2' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.'
			),
		),
		'sh_rnc' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_nodesoftlevel' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_ipaddr' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_subactivity' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),

		'sh_aspenggname' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_sitename' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_sitemarket' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_submarket' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_region' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
            
		'sh_methodoftesting' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_calltestvoice' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_calltestcsdata' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_calltestpsdata' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_calltest911' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_calltest611' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_calltest411' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_ipconnectivity' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_baselineloaded' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_baselineversion' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_lkfloaded' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_ntpserverping' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_nodealarm' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_performanceimpact' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'sh_ftpserverping' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'asp_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'asp_contact' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'asp_emailaddr' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'asp_logsattached' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
		'number_of_issues' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty.',
			),
		),
            
		'customer' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select the Customer.'
			),
		),
            'concerned_nodes' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the node names.',
			),
		),
		'project_manager' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please specify the Project Manager.'
			),
		),
		'network_number' => array(
                          'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Network Number cannot be empty.'
                          )
                    ),
                'engineer_team' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select the Engineer Team.'
			),
		),
            
                'activity_type' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select the activity type.'
			),
		),
            
                'activity_result' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select the activity result.'
			),
		),
            
		'engineer_work_location' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select the Engineer Work Location.'
			),
		),
		'why_sl_not_used' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select the reason for not using Smart Laptop.'
			),
		),                        
                'WorkLocation_Other' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please Specify the Work Location.'
			),
		),
		'date_activity_performed' => array(
			'notempty' => array(
				'rule' => array('date'),
				'message' => 'Please select the Date Activity Performed.'
			),
		),
		'region' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select the Region.'
			),
		),
		
                'ccb_work_ticket' => array(
			'notempty' => array(
				'rule' => array('validateDependencyCustomer'),
				'message' => 'Please enter the CCB. This field should not be empty if the Customer is AT&T.' 
			),
		),
            
                'time_spent'=> array(
			'notempty' => array(
				'rule' => array('time'),                                
				'message' => 'Please enter the time spent on this issue in the right format.',
			),
		),
            
		'access_method' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select the Access Method.'
			),
		),
                'why_sonar_used' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please explain.'
			),
		),
		'mop_used' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please specify if a MOP was used.'
			),
		),
                'mop_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please specify the name.'
			),
		),
                'mop_version' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please specify the revision.'
			),
		),
		'mop_problem_encountered' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please specify if the MOP had problems.'
			),
		),
                'mop_problems' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please describe the problems.'
			),
		),
		'script_used' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty'
			),
		),
		'script_problem_encountered' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty'
			),
		),
		'ftp_server_pingable' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty'
			),
		),
		'ntp_server_pingable' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty'
			),
		),
		'precheck_issue_encountered' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty'
			),
		),
		'total_nodes_scheduled' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'This field cannot be empty'
			),
		),
		'total_nodes_attempted' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'This field cannot be empty'
			),
		),
		'nodes_excluded' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be empty'
			),
		),
		'total_nodes_excluded' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'This field cannot be empty'
			),
		),
		'total_nodes_successful' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'This field cannot be empty'
			),
		),
		'total_nodes_unsuccessful' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'This field cannot be empty'
			),
		),
		
	);

        	var $hasMany = array(
		'IrAdditionalEngineer' => array(
			'className' => 'IrAdditionalEngineer',
			'foreignKey' => 'irmodule_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'IrFile' => array(
			'className' => 'IrFile',
			'foreignKey' => 'irmodule_id',
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
		'IrIssue' => array(
			'className' => 'IrIssue',
			'foreignKey' => 'irmodule_id',
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
                'IrRssireading'=> array(
			'className' => 'IrRssireading',
			'foreignKey' => 'irmodule_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
                    )                    
            
               
	);
                
//        function validateDependencysh($check)
//        {
//            $compare_field = $this->data['IrModule']['activity_type'];
//            if (in_array($compare_field, $this->shactivities) && ($check[key($check)] == ""))
//                return false;
//            else 
//                return true;               
//        } 
        
        function validateDependencyCustomer($check) {
        // var_dump($check);
         $compare_field = $this->data['IrModule']['customer']; // get the value in the $compare field
         //var_dump($compare_field);
            if($compare_field == 'AT&T' && $check['ccb_work_ticket'] == "")
                return false;
            else
                return true;	
        }

          function validateDependency($check,$compare) {
          $compare_field = $this->data['IrModule'][$compare]; // get the value in the $compare field
          $val = $this->values_arr[$compare];   //get the dependent values form the array above for the $compare field
          
          if(in_array($compare_field,$val) && ($check[key($check)] == "")) //check if the value is $compare is in the dependent values - if yes and the field that is checked for is empty (mandatory field empty) return false
                return false;
          elseif(in_array($compare_field,$val) && ($check[key($check)] != "")) //if its not empty, check if this field belongs to the double check array which contains all field names that have to number only. if yes, call check numeric function on it, if not, return true
          {
              if(in_array(key($check), $this->double_check))
                return $this->checkNumeric($check);
              else
                return true;
          }
          else
          {
              return true;
          }
      }

      function validateTCMfields($check,$compare)
      {
          $sig_model = Authsome::get('username');
          $val = $this->data['IrModule'][$compare];
          if($sig_model != $this->data['IrModule']['nic_signum'] && $val != "")
          {
               if($check[key($check)] == "")
                   return false;
               else
                   return true;
          }
          else
              return true;
      }

      function checkNumeric($check)
      {
          if(is_numeric($check[key($check)]))
              return true;
          else
              return false;
      }

      function beforeSave()
      {
          if($this->data['IrModule']['additional_notes'] != "")
          {
                $sig_model = Authsome::get('username');
                $datetime = date('m/d/y H:i');
                $this->data['IrModule']['additional_notes'] = $sig_model." - ".$datetime."\n".$this->data['IrModule']['additional_notes']."\n";
                if($this->data['IrModule']['prev_notes'] != '')
                    $this->data['IrModule']['additional_notes'] = $this->data['IrModule']['prev_notes']."\n".$this->data['IrModule']['additional_notes'];
          }
          return true;
      }


}
?>