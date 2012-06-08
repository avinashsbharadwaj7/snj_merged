<?php

class TacReport extends AppModel {
    var $name = 'TacReport';    


    var $values_arr = array(
                    'work_location' => array('Onsite(Customer)','Remote','Other'),
                    'TacReport' => array('No')                                   
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
                'organization' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',                    
                'message' => 'This field cannot be empty',
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
		'site_name' => array(
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
		'nic_or_tac' => array(
                          'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select if you are a NIC Engineer or a TAC NIC Engineer.',
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
				'message' => 'Please select the Activity Type.',
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
           
		'issue' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please describe the issue faced.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),   
		'cause_of_the_problem' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select the cause of the problem',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),  
		'solution' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please describe the solution.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),  
		'issue_resolved' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please specify if the issue was resolved.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),  
        'issue_not_resolved_reason' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','issue_resolved'),
				'message' => 'Please mention the reason why the issue was not resolved.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		'escalated_to' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','issue_resolved'),
				'message' => 'Please specify who the issue was escalated to.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		)

        );
		
	
    
    function validateDependency($check,$compare) {
      $compare_field = $this->data['TacReport'][$compare]; // get the value in the $compare field

      $val = $this->values_arr[$compare];   //get the dependent values form the array above for the $compare field
      if(in_array($compare_field,$val) && ($check[key($check)] == "")) //check if the value is $compare is in the dependent values - if yes and the field that is checked for is empty (mandatory field empty) return false
            return false;      
      else
          return true;
  }

 

  function beforeSave()
  {
  
	  $date_created = date("Y-m-d H:i:s");
	  
		if($this->data['TacReport']['comments'] != "")
		  {
				$sig_model = Authsome::get('username');
				$this->data['TacReport']['comments'] = $sig_model." - ".$date_created."\n".$this->data['TacReport']['comments']."\n";
		  }
      return true;
  }
}

?>