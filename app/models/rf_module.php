<?php

class RfModule extends AppModel {

    var $name = 'RfModule';
    var $hasMany = array(
        'RfAdditionalEngineer' => array(
            'className' => 'RfAdditionalEngineer',
            'foreignKey' => 'rf_module_id',
            'dependent' => 'false',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'PreLaunchReport' => array(
            'className' => 'PreLaunchReport',
            'foreignKey' => 'rf_module_id',
            'dependent' => 'false',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'RfPostLaunchReport' => array(
            'className' => 'RfPostLaunchReport',
            'foreignKey' => 'rf_module_id',
            'dependent' => 'false',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),

    );

    var $validate = array(
        'project_name' => array(
            'required' => array(
                'rule' => array('notempty'),
                'message' => 'Project Name required')
        ),
        'customer_unit' => array(
            'required' => array(
                'rule' => array('notempty'),
                'message' => 'Customer Unit required')
        ),
        'region' => array(
            'required' => array(
                'rule' => array('notempty'),
                'message' => 'Region required')
        ),
        'state' => array(
            'required' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter the state')
        ),
        'province' => array(
            'required' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter the province')
        ),
        'technology' => array(
            'required' => array(
                'rule' => array('notempty'),
                'message' => 'Technology required')
        ),
        'project_type' => array(
            'required' => array(
                'rule' => array('notempty'),
                'message' => 'Project Type required')
        ),
        'market' => array(
            'required' => array(
                'rule' => array('notempty'),
                'message' => 'Market required')
        ),
        'work_location' => array(
            'required' => array(
                'rule' => array('notempty'),
                'message' => 'Work Location required')
        ),
        'person_completing' => array(
            'required' => array(
                'rule' => array('notempty'),
                'message' => 'Name required required')
        ),
        'sub_project_name' => array(
            'required' => array(
                'rule' => array('notempty'),
                'message' => 'Sub-Project Name required')
        ),
        'number_of_sites' => array(
            'required' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter number of sites')
        ),
//        'sub_project_status' => array(
//            'required' => array(
//                'rule' => array('notempty'),
//                'message' => 'Sub-Project Status required')
//        ),
//        'checklist_accurate' => array(
//            'required' => array(
//                'rule' => array('notempty'),
//                'message' => 'Required')
//        ),
//        'sow_available' => array(
//            'required' => array(
//                'rule' => array('notempty'),
//                'message' => 'Required')
//        ),
//        'nw_available' => array(
//            'required' => array(
//                'rule' => array('notempty'),
//                'message' => 'Required')
//        ),
//        'project_budget_access' => array(
//            'required' => array(
//                'rule' => array('notempty'),
//                'message' => 'Required')
//        ),
//        'engineers_qualified' => array(
//            'required' => array(
//                'rule' => array('notempty'),
//                'message' => 'Required')
//        ),
//        'project_start_date' => array(
//            'required' => array(
//                'rule' => 'nonempty',
//                'message' => 'Required')
//        ),
//        'delivery_date' => array(
//            'required' => array(
//                'rule' => 'nonempty',
//                'message' => 'Required')
//        ),
//        'delivery_date_adjustment' => array(
//            'validateoffice' => array(
//                'rule' => array('deliveryDateValidator', 'delivery_date_adjustment'),
//                'message' => 'Total Number of delivery adjustments cannot be greater than total number of SOW adjustments'),
//        )
    );

    function deliveryDateValidator($check) {
        $valid = false;

        
            
                if ($check > $this->data['RfModule']['num_sow_adjustments']) {
                    $valid = false;
                    }
                 else {
                    $valid = true;
                }

        return $valid;
    }

    function  beforeSave($options = array()) {
        parent::beforeSave($options);
        $this->data['RfModule']['modified_date'] = date("Y-m-d G:i:s");
        return true;
    }

}

?>