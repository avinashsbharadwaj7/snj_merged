
<?php
class Cdmamaster extends AppModel {
	var $name = 'Cdmamaster';
        var $hasMany = 'Cdmafile';
        
        var $validate = array(
                    'network_id' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'rule' => array('between', 8, 8), 
                    'message' => 'The Network Number should be 8 characters in length.',
                ),
            ),
                'organization' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',                    
                'message' => 'This field cannot be empty',
                ),
            ),            
                    'customer' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter the customer name.',
                ),
            ),
            
                    'work_location' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter the engineer worl location.',
                ),
            ),
            
                    'work_location_other' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter the engineer worl location.',
                ),
            ),
            
                    'site_zipcode' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter the zip code.',
                ),
            ),
            
                    'tcm_engineer' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter the engineer name.',
                ),
            ),
            
                    'region' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter the region.',
                ),
            ),
            
                    'region_other' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter the region.',
                ),
            ),
            
                    'problems_concerning_mop_yes' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter your comments.',
                ),
            ),
            
                    'script_issues' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter your comments.',
                ),
            ), 
            
                    'access_method' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter the access method.',
                ),
            ),
            
                    'access_method_other' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter the access method.',
                ),
            ),
            
                    'activity_type' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter the activity type.',
                ),
            ),
            
                    'activity_type_other' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter the activity method.',
                ),
            ),
            
                    'issues_during_prechecks_yes' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter your comments.',
                ),
            ),
            
                    'rbs' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'List the RBSs.',
                ),
            ),
            
                    'number_of_rncs_scheduled' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'rule' => 'numeric',
                    'message' => 'Please enter the number of RNCs scheduled. Numbers only!',
                ),
            ),
            
                    'number_of_rncs_attempted' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'rule' => 'numeric',
                    'message' => 'Please enter the number of RNCs attempted.',
                ),
            ),
            
                    'rncs_excluded' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter the RNCs excluded.',
                ),
            ),
            
                    'rncs_excluded_yes' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'rule' => 'numeric',
                    'message' => 'Please enter the total number of RNCs excluded. Numbers only!.',
                ),
            ),
            
                    'rncs_excluded_reason' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter your comments.',
                ),
            ),
            
                    'number_of_rncs_unsuccessful' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'rule' => 'numeric',
                    'message' => 'Please enter the access method.',
                ),
            ),
            
                    'number_of_rncs_successful' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter the access method.',
                ),
            ),
            
                    'activity_status' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter the activity status.',
                ),
            ),
            
   );
}
?>