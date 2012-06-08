<?php
class Siadsite extends AppModel {
	var $name = 'Siadsite';
        var $belongsTo = 'Siadmaster';
        
        var $validate = array(
            'engineer_signum' => array(
                'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Engineer Signum lookup failure.  Please contact the System Administrator'
                ),
            ),
            'engineer_name' => array(
                'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Engineer Name lookup failure.  Please contact the System Administrator'
                ),
            ),
            'engineer_work_location' => array(
                'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please specify the work location.'
                ),
            ),
            'site_name' => array(
                'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please type the site name.'
                ),
            ),
            'siad_activity_type' => array(
                'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please specify the activity.'
                ),
            ),
            'siad_activity_status' => array(
                'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please specify the final result of this activity.'
                ),
            ),
        );
        
        public function beforeValidate() {
            // remove tabs from input fields
            $field_list = array(
                            'engineer_signum',
                            'engineer_work_location',
                            'team_name',
                            'lte_customer',
                            'lte_region',
                            'site_name',
                            'siad_clli',
                            'oam_loopback_ip_address',
                            'oam_default_ip_address',
                            'bearer_default_ip_address',
                            'siad_activity_type',
                            'siad_activity_status',
                            'additional_comments'
                          );
            for($i = 0; $i < count($field_list); $i++) {
                if(isset($this->data['Siadsite'][$field_list[$i]])) {
                    $this->data['Siadsite'][$field_list[$i]] = str_replace("\t", ' ', $this->data['Siadsite'][$field_list[$i]]);
                }
            }
            return true;
        }
}
?>