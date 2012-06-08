<?php
class JobSchedule extends AppModel {
   var $name = 'JobSchedule'; 
   var $uses = array("JobSchedule");
   var $hasMany = 'AddRequirement';
   
   var $validate = array(
                'sender_info_signum' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'This field cannot be empty.',
                ),
            ),
                'sender_info_name' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'This field cannot be empty.',
                ),
            ),
                'project_name' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'This field cannot be empty.',
                ),
            ),
                'project_date_start' => array(
                    'rule_1' => array(
                    'rule' => 'date',
                    'message' => 'This field cannot be empty.',
                ),
            ),
                'project_date_end' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'This field cannot be empty.',
                ),
            ),
                'project_location' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'This field cannot be empty.',
                ),
            ),
                'project_pool' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'This field cannot be empty.',
                ),
            ),
                'project_product_area' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'This field cannot be empty.',
                ),
            ),
                'nic_signum' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'This field cannot be empty.',
                ),
            ),
                'project_client' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'This field cannot be empty.',
                ),
            ),
                'project_position_date_start' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'This field cannot be empty.',
                ),
            ),
                'project_position_date_end' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'This field cannot be empty.',
                ),
            ),
                'expiration_date' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'This field cannot be empty.',
                ),
            ),
                'follow_up_priority' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'This field cannot be empty.',
                ),
            ),
                'expiration_date' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'This field cannot be empty.',
                ),
            ),
                'overall_status' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'This field cannot be empty.',
                ),
            ),
                'status' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'This field cannot be empty.',
                ),
            ),
                'priority' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'This field cannot be empty.',
                ),
            ),
                'date_requested_end' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'This field cannot be empty.',
                ),
            ),
                'date_requested_start' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'This field cannot be empty.',
                ),
            ),
                'activity_type' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'This field cannot be empty.',
                ),
            ),
                'technology' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'This field cannot be empty.',
                ),
            )                     
  );   
   
//  function beforeSave(){
//      $requirementNumberBs = count($this->data[AddRequirement]);        //total no. of requirements before save.
//      for($i=0; $i < $requirementNumberBs; $i++){
//         $this->data['AddRequirement'][$i]['jobId'] = $this->data['JobSchedule']['job_id'];                
//      }
//      
//  return true;    
//  } 
}

?>