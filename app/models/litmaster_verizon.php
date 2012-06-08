<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class LitmasterVerizon extends AppModel {

    var $name = 'LitmasterVerizon';
    var $hasOne = 'LitfileVerizon';


    /* var $hasMany = array(
      'LitfileVerizon' => array(
      'className' => 'LitfileVerizon',
      'foreignKey' => 'litmaster_verizon_id',
      'dependent' => true,
      'conditions' => '',
      'fields' => '',
      'order' => '',
      'limit' => '',
      'offset' => '',
      'exclusive' => '',
      'finderQuery' => '',
      'counterQuery' => ''
      )
      ); */
    var $validate = array(
        'number_of_sites' => array(
            'rule_1' => array(
                'rule' => 'notEmpty',
                'message' => 'Please select an option.',
            ),
        ),
        'enb_name' => array(
            'notempty' => array(
                'rule' => array('nonEmptyIfXIsY', "number_of_sites", "Single"),
                'message' => 'Please enter the ENodeB Name.',
                'on' => array('create', 'update'),
            ),
        ),
        'site_list' => array(
            'rule_1' => array(
                'rule' => array('nonEmptyIfXIsY',"number_of_sites", "Multiple"),
                'message' => 'Please enter list of sites.',
                'on' => array('create', 'update'),
            )
        ),
        'engineer_work_location' => array(
            'rule_1' => array(
                'rule' => 'notEmpty',
                'message' => 'Please Enter the Engineer work location.',
            ),
        ),
        'region' => array(
            'rule_1' => array(
                'rule' => 'notEmpty',
                'message' => 'Please Enter the Region.',
                'allowEmpty' => true,
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
//        'customer_site_name' => array(
//            'rule_1' => array(
//                'rule' => 'notEmpty',
//                'message' => 'Please Enter the Site Name.',
//            ),
//        ),
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
//                'rule' => 'ip',
//                'message' => 'Must be an IP address.',
//                'allowEmpty' => true
//            ),
//        ),
        'site_market' => array(
            'rule_1' => array(
                'rule' => 'notEmpty',
                'message' => 'Please Enter the Site Market.',
            ),
        ),
        'activity' => array(
            'rule_1' => array(
                'rule' => 'notEmpty',
                'message' => 'Please select an Activity Type.',
            ),
        ),
        'activity_status' => array(
            'rule_1' => array(
                'rule' => 'notEmpty',
                'message' => 'Please select the Activity Status',
            ),
        ),
        'asp_engineer_name' => array(
            'rule_1' => array(
                'rule' => 'notEmpty',
                'message' => 'Please Enter the ASP Engineer Name.',
            ),
        ),
        'no_cells' => array(
            'rule_2' => array(
                'rule' => 'numeric',
                'message' => 'Must be a numeric value.',
                'allowEmpty' => true
            ),
        ),
        'mme1_ip_address' => array(
            'rule' => 'ip',
            'message' => 'Must be an IP address.',
            'allowEmpty' => true
        ),
        'mme2_ip_address' => array(
            'rule_2' => array(
                'rule' => 'ip',
                'message' => 'Must be an IP address.',
                'allowEmpty' => true
            ),
        ),
        'ip_connectivity' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please select the IP Connectivity.',
            ),
        ),
        'baseline_loaded' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please select the Baseline Loaded.',
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

    function nonEmptyIfXIsY($check, $x, $y) {
        $field = key($check);
        $value = $check[$field];
        if($this->data['Litmaster'][$x] === $y) {
            if($value === "" || empty($value))
                    return false;
        }
        return true;
    }
    
    public function beforeValidate() {
        // remove tabs from input fields
        $field_list = array(
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
