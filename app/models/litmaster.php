<?php

class Litmaster extends AppModel {

    var $invalidSitenames = null;
    var $invalidSitenamesArray = array();
    var $name = 'Litmaster';
    var $hasMany = array('Litfile', 'LitfileSupplementary');
    var $validate = array(
        'no_cells' => array(
            'rule_1' => array(
                'rule' => array('nonEmptyIfXIsY', "number_of_sites", "Single"),
                'message' => 'Please enter a number.',
            ),
            'rule_2' => array(
                'rule' => 'numeric',
                'message' => 'Must be a numeric value.',
                'allowEmpty' => true
            ),
        ),
        'mme1_ip_address' => array(
            'rule_2' => array(
                'rule' => array('ip'),
                'message' => 'Must be an IP address.',
                'allowEmpty' => true
            ),
        ),
        'mme2_ip_address' => array(
            'rule_2' => array(
                'rule' => array('ip'),
                'message' => 'Must be an IP address.',
                'allowEmpty' => true
            ),
        ),
        'number_of_alarms' => array(
            'rule_2' => array(
                'rule' => 'numeric',
                'message' => 'Must be a numeric value.',
                'allowEmpty' => true
            ),
        ),
        'alarms_matched_alv' => array(
            'rule_2' => array(
                'rule' => 'numeric',
                'message' => 'Must be a numeric value.',
                'allowEmpty' => true
            ),
        ),
        'alarms_matched_osr' => array(
            'rule_2' => array(
                'rule' => 'numeric',
                'message' => 'Must be a numeric value.',
                'allowEmpty' => true
            ),
        ),
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
        'region' => array(
            'rule' => 'notEmpty',
            'message' => 'Please Specify a Region.'
        ),
        'work_location_remote' => array(
            'rule_1' => array(
                'rule' => 'notEmpty',
                'message' => 'Please Specify the Remote Work Location.',
            ),
        ),
        'area' => array(
            'rule_1' => array(
                'rule' => 'notEmpty',
                'message' => 'Please Enter the Area.',
            ),
        ),
        'oss' => array(
            'rule_1' => array(
                'rule' => 'notEmpty',
                'message' => 'Please Enter the OSS.',
            ),
        ),
        'oss_version' => array(
            'rule_1' => array(
                'rule' => 'notEmpty',
                'message' => 'Please Enter the OSS Version.',
            ),
        ),
        'number_of_sites' => array(
            'rule_1' => array(
                'rule' => 'notEmpty',
                'message' => 'Please select an option.',
            ),
        ),
        'site_name' => array(
            'rule_1' => array(
                'rule' => array('nonEmptyIfXIsY', "number_of_sites", "Single"),
                'message' => 'Please Enter the Site Name.',
            ),
            'rule_2'=>array(
                'rule'=>array('minlength', 8),
                'message' => 'Invalid site name.'
            )
        ),
        'site_list' => array(
            'rule_1' => array(
                'rule' => array('validateSitelist', "number_of_sites", "Multiple"),
                'message' => 'Please enter valid sitenames in sitelist.',
            ),
//            'rule_1' => array(
//                'rule' => array('nonEmptyIfXIsY',"number_of_sites", "Multiple"),
//                'message' => 'Please enter list of sites.',
//            ),
        ),
//        'erbs_id' => array(
//            'rule_1' => array(
//                'rule' => 'notEmpty',
//                'message' => 'Please Enter the ERBS ID.',
//            ),
//        ),
//        'ip_address' => array(
//            'rule_1' => array(
//                'rule' => 'notEmpty',
//                'message' => 'Enter the IP Address.',
//            ),
//            'rule_2' => array(
//                'rule' => array('ip'),
//                'message' => 'Must be an IP address.',
//                'allowEmpty' => true
//            ),
//        ),
//        'customer_site_name' => array(
//            'rule_1' => array(
//                'rule' => 'notEmpty',
//                'message' => 'Please Enter the Customer Site Name.',
//            ),
//        ),
        'onsite_engineer_name' => array(
            'rule_1' => array(
                'rule' => 'notEmpty',
                'message' => 'Please Enter the Onsite Engineer Name.',
            ),
        ),
        'onsite_engineer_phone' => array(
            'rule_1' => array(
                'rule' => 'notEmpty',
                'message' => 'Please Enter the Onsite Engineer Phone Number.',
            ),
        ),
        'stepin_mop' => array(
            'rule_1' => array(
                'rule' => 'alphaNumeric',
                'message' => 'Only alphaNumeric value accepted.',
                'allowEmpty' => true
            ),
        ),
        /* 'lte_nic_mop_name' => array(
          'rule_1' => array(
          'rule' => 'notEmpty',
          'message' => 'Please Select the LTE NIC MOP Name.',
          ),
          ),
          'onsite_mop_name'=> array(
          'rule_1' => array(
          'rule' => 'notEmpty',
          'message' => 'Please Select the Onsite NIC MOP Name.',
          ),
          ), */
        'antenna_alarms_count' => array(
            'rule_1' => array(
                'rule' => 'notEmpty',
                'message' => 'Must give a count.',
            ),
            'rule_2' => array(
                'rule' => 'numeric',
                'message' => 'Must be a number.',
                'allowEmpty' => true
            ),
        ),
        'antenna_alarms_count_info' => array(
            'rule_1' => array(
                'rule' => 'notEmpty',
                'message' => 'Please give alarm information.',
            ),
        ),
        'ct_dummyload_reason' => array(
            'rule_1' => array(
                'rule' => 'notEmpty',
                'message' => 'Must give a reason.',
            ),
        ),
        'rssi_sector_a_branch_a' => array(
            'rule_1' => array(
                'rule' => 'numeric',
                'message' => 'Must be a number.',
                'allowEmpty' => true
            ),
        ),
        'rssi_sector_a_branch_b' => array(
            'rule_1' => array(
                'rule' => 'numeric',
                'message' => 'Must be a number.',
                'allowEmpty' => true
            ),
        ),
        'rssi_sector_b_branch_a' => array(
            'rule_1' => array(
                'rule' => 'numeric',
                'message' => 'Must be a number.',
                'allowEmpty' => true
            ),
        ),
        'rssi_sector_b_branch_b' => array(
            'rule_1' => array(
                'rule' => 'numeric',
                'message' => 'Must be a number.',
                'allowEmpty' => true
            ),
        ),
        'rssi_sector_c_branch_a' => array(
            'rule_1' => array(
                'rule' => 'numeric',
                'message' => 'Must be a number.',
                'allowEmpty' => true
            ),
        ),
        'rssi_sector_c_branch_b' => array(
            'rule_1' => array(
                'rule' => 'numeric',
                'message' => 'Must be a number.',
                'allowEmpty' => true
            ),
        ),
        'ct_cell_sector_locked_explain' => array(
            'rule_1' => array(
                'rule' => 'notEmpty',
                'message' => 'Must give a reason.',
            ),
        ),
        'from_date' => array(
            'rule_1' => array(
                'rule' => array('date', 'ymd'),
                'message' => "Date must be in this format: YYYY-MM-DD",
                'allowEmpty' => true
            ),
            'rule_2' => array(
                'rule' => array('checkDateRange'),
                'message' => "Invalid date range",
                'allowEmpty' => true
            ),
        ),
        'to_date' => array(
            'rule_1' => array(
                'rule' => array('date', 'ymd'),
                'message' => "Date must be in this format: YYYY-MM-DD",
                'allowEmpty' => true
            ),
//            'rule_2' => array(
//                'rule' => array('checkDateRange'),
//                'message' => "Date must be in this format: YYYY-MM-DD",
//                'allowEmpty' => true
//            ),
        ),
        'activity_type' => array(
            'rule_1' => array(
                'rule' => 'notEmpty',
                'message' => 'Please select the activity type',
            ),
        ),
        'activity_status' => array(
            'rule_1' => array(
                'rule' => 'notEmpty',
                'message' => 'Please select the activity status',
            ),
        ),
        'enteredId' => array(
            'rule_1' => array(
                'rule' => array('checkIdEntered'),
                'message' => 'Please enter an Id number',
                'allowEmpty' => false
            ),
//            'rule_2' =>array(
//                'rule' => 'numeric',
//                'message' => 'Must be a number'
//            ),
        ),
        'lte_customer' => array(
            'rule_1' => array(
                'rule' => array('checkIdEntered'),
                'message' => "Please select a customer",
                'allowEmpty' => false
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
    );
    
    /* This function is used to validate a field which is dependent on another field's value.
     * The parent field is passed as $x. The value on which it should be validated is passed as $y.
     * The depenedent field and its value is passes as a key value pair in $checked. */
    function nonEmptyIfXIsY($check, $x, $y) {
        $field = key($check);
        $value = $check[$field];
        if ($this->data['Litmaster'][$x] === $y) {
            if ($value === "" || (empty($value) && $value != 0)){
                debug($value);
                return false;
            }
        }
        return true;
    }

    /* This function creates an array from the site list.
     * Each element of the array (which is a site name) is validated
     * for its length.
     * Another array stores all the site names that fail validation.
     * Finally the invalid sitenames array is transformed nto a string which is used in the controller 
     * to indicate precisely which site names failed validation. */
    function validateSitelist($check, $x, $y) {
        $field = key($check);
        $value = $check[$field];
        if ($this->data['Litmaster'][$x] === $y) {
            if ($value === "" || empty($value)) {
                return false;
            } else {
                $string = $this->data['Litmaster']['site_list'];
                $delimiters = array(";", "\n", "        ", " ", ",");
                $mainDelim = $delimiters[count($delimiters) - 1];
                array_pop($delimiters);
                foreach ($delimiters as $delimiter) {
                    $string = str_replace($delimiter, $mainDelim, $string);
                }
                $result = explode($mainDelim, $string);
                $i = 0;
                $this->invalidSitenamesArray = null;
                foreach ($result as $key => $index) {
                    if (!(trim($index) === "" || trim($index) == null)) {
                        if (strlen($index) < 8) 
                            $this->invalidSitenamesArray[$i++] = $index;
                    }
                }
                if ($i == 0) {
                    return true;
                } else {
                    $this->invalidSitenames = null;
                    foreach($this->invalidSitenamesArray as $site)
                            $this->invalidSitenames .= $site . "<br>";
                    return false;
                }
            }
        }
        return true;
    }

    function checkIdEntered($check) {
        if (!(empty($check))) {
            return true;
        } else {
            return false;
        }
    }

    function checkDateRange($check) {
        $from_date = $this->data['Litmaster']['from_date'];
        $to_date = $this->data['Litmaster']['to_date'];
        if (!empty($from_date) && !empty($to_date)) {
            if ($from_date <= $to_date)
                return true;
            else
                return false;
        }
        return true;
    }

    public function beforeValidate() {
        // remove tabs from input fields
        $field_list = array(
            'activity_type_comments',
            'alarm_issues',
            'conn_jump',
            'additional_comments',
            'ct_dummyload_reason',
            'antenna_alarms_count_info',
            'term_mme_reason',
            'oss_pingable_reason',
            'ntp_pingable_reason',
            'default_pingable_reason',
            'ip_connectivity_explain',
            'node_part_pool_explain',
            'ct_cell_sector_locked_explain'
        );
        for ($i = 0; $i < count($field_list); $i++) {
            if (isset($this->data['Litmaster'][$field_list[$i]])) {
                $this->data['Litmaster'][$field_list[$i]] = str_replace("\t", ' ', $this->data['Litmaster'][$field_list[$i]]);
            }
        }
        return true;
    }
}

?>