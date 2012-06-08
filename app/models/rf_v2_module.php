<?php

class RfV2Module extends AppModel {

    var $name = 'RfV2Module';
    var $useDbConfig = 'rfdb';
    var $displayField = 'project_name';
    var $validate = array(
        'project_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter the Project Name',
            ),
            'match_project_name' => array(
                'rule' => '/.+_.+_.+_.+_.+_.+/',
                'message' => 'Project Name has to follow the naming convention <State>_<City>_<Project>_<Freq>_<Carrier>_<Cluster/SSV>',
            ),
        ),
        'customer_unit' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter Customer Unit.',
            ),
        ),
        'region' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please select the region.',
            ),
        ),
        'state' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter State/Province',
            ),
        ),
        'technology' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please select Technology',
            ),
        ),
        'project_type' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please select appropriate Project Type',
            ),
        ),
        'market' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please select Market',
            ),
        ),
        'market_lead' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter Market Lead',
            ),
        ),
        'project_manager' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter Project Manager',
            ),
        ),
        'work_location' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter Work Location',
            ),
        ),
        'person_completing' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'This field cannot be empty',
            ),
        ),
        'sub_project_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter Sub Project Name',
            ),
        ),
        'sub_project_status' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please select Sub Project Status',
            ),
        ),
        'number_of_sites' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter Number of Sites',
            ),
        ),
        'checklist_accurate' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please select appropriate option for Checklist Accuracy.',
            ),
        ),
        'checklist_inaccurate_reason' => array(
            'nonempty_if_no' => array(
                'rule' => array('nonEmptyIfNo', 'checklist_accurate'),
                'message' => 'Please select appropriate reason for Unavailable/Incorrect Checklist.',
            ),
        ),
        'checklist_inaccurate_comment' => array(
            'nonempty_if_other' => array(
                'rule' => array('nonEmptyIfOther', 'checklist_inaccurate_reason'),
                'message' => 'Please give the reason. (Reason: You selected Other)',
            ),
        ),
        'sow_available' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Is the SOW available and correct?',
            ),
        ),
        'sow_unavailable_reason' => array(
            'nonempty_if_no' => array(
                'rule' => array('nonEmptyIfNo', 'sow_available'),
                'message' => 'Please select appropriate reason for Unavailable SOW.',
            ),
        ),
        'sow_unavailable_reason_comment' => array(
            'nonempty_if_other' => array(
                'rule' => array('nonEmptyIfOther', 'sow_unavailable_reason'),
                'message' => 'Please give the reason. (Reason: You selected Other)',
            ),
        ),
        'nw_number_available' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Was the NW Number available at project start?',
            ),
        ),
        'nw_number_unavailable_reason' => array(
            'nonempty_if_no' => array(
                'rule' => array('nonEmptyIfNo', 'nw_number_available'),
                'message' => 'Please select appropriate reason for Unavailability of NW Number.',
            ),
        ),
        'nw_number_unavailable_comment' => array(
            'nonempty_if_other' => array(
                'rule' => array('nonEmptyIfOther', 'nw_number_unavailable_reason'),
                'message' => 'Please give the reason. (Reason: You selected Other)',
            ),
        ),
        'project_budget_access' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Do you have access to the Project Budget?',
            ),
        ),
        'project_budget_no_access_reason' => array(
            'nonempty_if_no' => array(
                'rule' => array('nonEmptyIfNo', 'project_budget_access'),
                'message' => 'Please select appropriate reason for not having access to Project Budget.',
            ),
        ),
        'project_budget_no_access_comment' => array(
            'nonempty_if_other' => array(
                'rule' => array('nonEmptyIfOther', 'project_budget_no_access_reason'),
                'message' => 'Please give the reason. (Reason: You selected Other)',
            ),
        ),
        'engineers_qualified' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Is >90% of the engineers qualified for the job?',
            ),
        ),
        'engineers_qualified_quantity' => array(
            'engineer_qualified' => array(
                'rule' => array('nonEmptyIfNo', 'engineers_qualified'),
                'message' => 'Please enter the number of Engineers qualified',
            ),
        ),
        'project_start_date' => array(
            'date' => array(
                'rule' => array('date'),
                'message' => 'Date has to be in following format. (YYYY-MM-DD)',
            ),
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter Project Start Date',
            ),
        ),
        'initial_planned_delivery_date_on_sow' => array(
            'date' => array(
                'rule' => array('date'),
                'message' => 'Date has to be in following format. (YYYY-MM-DD)',
            ),
        ),
        'change_recommendations_number' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Please enter a numeric value',
            ),
        ),
        'rejected_recommendations_number' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Please enter a numeric value',
            ),
        ),
        'majority_rejection_responsible' => array(
            'toomany_rejections' => array(
                'rule' => array('checkGreater', 'rejected_recommendations_number', 0),
                'message' => 'Please select who is responsible for Majority Rejections.',
            ),
        ),
        'major_rejection_reason' => array(
            'toomany_rejections' => array(
                'rule' => array('checkGreater', 'rejected_recommendations_number', 0),
                'message' => 'Please select the reason for Majority Rejections',
            ),
        ),
        'major_rejection_reason_comment' => array(
            'nonempty_if_other' => array(
                'rule' => array('nonEmptyIfOther', 'major_rejection_reason'),
                'message' => 'Please give the reason. (Reason: You selected Other)',
            ),
        ),
        'changes_not_implemented_number' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Please enter Total of number of accepted changes not implemented',
            ),
        ),
        'major_not_implemented_reason' => array(
            'toomany_not_implemented' => array(
                'rule' => array('checkGreater', 'changes_not_implemented_number', 0),
                'message' => 'Please select the reason for Majority Changes not implemented',
            ),
        ),
        'major_not_implemented_comment' => array(
            'nonempty_if_other' => array(
                'rule' => array('nonEmptyIfOther', 'major_not_implemented_reason'),
                'message' => 'Please give the reason. (Reason: You selected Other)',
            ),
        ),
        'sow_adjustments_number' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Please enter a numeric value',
            ),
        ),
        'sow_adjustments_reason_1' => array(
            'toomany_adjustment' => array(
                'rule' => array('checkGreater', 'sow_adjustments_number', 0),
                'message' => 'Please enter the reason for 1st Adjustment',
            ),
        ),
        'sow_adjustments_reason_1_comment' => array(
            'nonempty_if_other' => array(
                'rule' => array('nonEmptyIfOther', 'sow_adjustments_reason_1'),
                'message' => 'Please give the reason. (Reason: You selected Other)',
            ),
        ),
        'sow_adjustments_reason_2' => array(
            'toomany_adjustment' => array(
                'rule' => array('checkGreater', 'sow_adjustments_number', 1),
                'message' => 'Please enter the reason for 2nd Adjustment',
            ),
        ),
        'sow_adjustments_reason_2_comment' => array(
            'nonempty_if_other' => array(
                'rule' => array('nonEmptyIfOther', 'sow_adjustments_reason_2'),
                'message' => 'Please give the reason. (Reason: You selected Other)',
            ),
        ),
        'sow_adjustments_reason_3' => array(
            'toomany_adjustment' => array(
                'rule' => array('checkGreater', 'sow_adjustments_number', 2),
                'message' => 'Please enter the reason for 3rd Adjustment',
            ),
        ),
        'sow_adjustments_reason_3_comment' => array(
            'nonempty_if_other' => array(
                'rule' => array('nonEmptyIfOther', 'sow_adjustments_reason_3'),
                'message' => 'Please give the reason. (Reason: You selected Other)',
            ),
        ),
        'delivery_date_adjustments_number' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Please enter a numeric value',
            ),
        ),
        'delivery_date_adjustment_reason_1' => array(
            'toomany_adjustment' => array(
                'rule' => array('checkGreater', 'delivery_date_adjustments_number', 0),
                'message' => 'Please enter the reason for 1st Adjustment',
            ),
        ),
        'delivery_date_adjustment_reason_1_comment' => array(
            'nonempty_if_other' => array(
                'rule' => array('nonEmptyIfOther', 'delivery_date_adjustment_reason_1'),
                'message' => 'Please give the reason. (Reason: You selected Other)',
            ),
        ),
        'delivery_date_adjustment_reason_2' => array(
            'toomany_adjustment' => array(
                'rule' => array('checkGreater', 'delivery_date_adjustments_number', 1),
                'message' => 'Please enter the reason for 2nd Adjustment',
            ),
        ),
        'delivery_date_adjustment_reason_2_comment' => array(
            'nonempty_if_other' => array(
                'rule' => array('nonEmptyIfOther', 'delivery_date_adjustment_reason_2'),
                'message' => 'Please give the reason. (Reason: You selected Other)',
            ),
        ),
        'delivery_date_adjustment_reason_3' => array(
            'toomany_adjustment' => array(
                'rule' => array('checkGreater', 'delivery_date_adjustments_number', 2),
                'message' => 'Please enter the reason for 3rd Adjustment',
            ),
        ),
        'delivery_date_adjustment_reason_3_comment' => array(
            'nonempty_if_other' => array(
                'rule' => array('nonEmptyIfOther', 'delivery_date_adjustment_reason_3'),
                'message' => 'Please give the reason. (Reason: You selected Other)',
            ),
        ),
        'actual_delivery_date' => array(
            'date' => array(
                'rule' => array('date'),
                'message' => 'Please enter appropriate date in the following format (YYYY-MM-DD)',
                'allowEmpty' => true,
            ),
            'nonempty_if_x_has_value_y' => array(
                'rule' => array('nonEmptyifXHasValueY', 'sub_project_status', 'Closed'),
                'message' => 'Please enter the actual delivery date. (Reason: Project Status is closed)',
            ),
        ),
        'late_delivery_reason' => array(
            'check_date' => array(
                'rule' => array('requiredIflaterDate', 'initial_planned_delivery_date_on_sow', 'actual_delivery_date'),
                'message' => 'Please select appropriate reason for Late Delivery',
            ),
        ),
        'late_delivery_comment' => array(
            'nonempty_if_other' => array(
                'rule' => array('nonEmptyIfOther', 'late_delivery_reason'),
                'message' => 'Please give the reason. (Reason: You selected Other)',
            ),
        ),
        'project_expectations_met' => array(
            'nonempty_if_x_has_value_y' => array(
                'rule' => array('nonEmptyifXHasValueY', 'sub_project_status', 'Closed'),
                'message' => 'Project Expectations Met?',
            ),
        ),
        'project_expectations_not_met_reason' => array(
            'nonempty_if_no' => array(
                'rule' => array('nonEmptyIfNo', 'project_expectations_met'),
                'message' => 'Please select appropriate reason for NOT meeting Project Expectations.',
            ),
        ),
        'project_expectations_not_met_comment' => array(
            'nonempty_if_other' => array(
                'rule' => array('nonEmptyIfOther', 'project_expectations_not_met_reason'),
                'message' => 'Please give the reason. (Reason: You selected Other)',
            ),
        ),
        'project_approved_by_customer' => array(
            'nonempty_if_x_has_value_y' => array(
                'rule' => array('nonEmptyifXHasValueY', 'sub_project_status', 'Closed'),
                'message' => 'Was Project Approved by Customer?',
            ),
        ),
        'customer_not_accepting_reason' => array(
            'nonempty_if_no' => array(
                'rule' => array('nonEmptyIfNo', 'project_approved_by_customer'),
                'message' => 'Please select appropriate reason for NOT meeting Project Expectations.',
            ),
        ),
        'customer_not_accepting_comment' => array(
            'nonempty_if_other' => array(
                'rule' => array('nonEmptyIfOther', 'customer_not_accepting_reason'),
                'message' => 'Please give the reason. (Reason: You selected Other)',
            ),
        ),
        'overall_quality_rating' => array(
            'nonempty_if_x_has_value_y' => array(
                'rule' => array('nonEmptyifXHasValueY', 'sub_project_status', 'Closed'),
                'message' => 'Please select the rating for the project. (Reason: Project Status is closed)',
            ),
        ),
        'pre_launch_number_of_drives' => array(
            'required_if' => array(
                'rule' => array('requiredIf', 'project_type', '/^Pre/'),
                'message' => 'Please enter number of drives Failed',
            ),
        ),
        'pre_launch_drive1_fail_reason' => array(
            'toomany_drive_fail' => array(
                'rule' => array('checkGreater', 'pre_launch_number_of_drives', 0),
                'message' => 'Please enter the reason for 1st Drive Failure',
            ),
        ),
        'pre_launch_drive1_fail_description' => array(
            'nonempty_if_other' => array(
                'rule' => array('nonEmptyIfOther', 'pre_launch_drive1_fail_reason'),
                'message' => 'Please give the reason. (Reason: You selected Other)',
            ),
        ),
        'pre_launch_drive2_fail_reason' => array(
            'toomany_drive_fail' => array(
                'rule' => array('checkGreater', 'pre_launch_number_of_drives', 1),
                'message' => 'Please enter the reason for 2nd Drive Failure',
            ),
        ),
        'pre_launch_drive2_fail_description' => array(
            'nonempty_if_other' => array(
                'rule' => array('nonEmptyIfOther', 'pre_launch_drive2_fail_reason'),
                'message' => 'Please give the reason. (Reason: You selected Other)',
            ),
        ),
        'pre_launch_drive3_fail_reason' => array(
            'toomany_drive_fail' => array(
                'rule' => array('checkGreater', 'pre_launch_number_of_drives', 2),
                'message' => 'Please enter the reason for 3rd Drive Failure',
            ),
        ),
        'pre_launch_drive3_fail_description' => array(
            'nonempty_if_other' => array(
                'rule' => array('nonEmptyIfOther', 'pre_launch_drive3_fail_reason'),
                'message' => 'Please give the reason. (Reason: You selected Other)',
            ),
        ),
        'post_launch_expedited_tuning' => array(
            'required_if' => array(
                'rule' => array('requiredIf', 'project_type', '/^Post/'),
                'message' => 'Your custom message here',
            ),
        ),
        'post_launch_frequency_band' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Please enter numeric value.',
                'allowEmpty' => true,
            ),
            'required_if' => array(
                'rule' => array('requiredIf', 'project_type', '/^Post/'),
                'message' => 'Please enter Frequency Band',
            ),
        ),
        'post_launch_carrier_tuned' => array(
            'required_if' => array(
                'rule' => array('requiredIf', 'project_type', '/^Post/'),
                'message' => 'Please enter Carrier Tuned',
            ),
        ),
        'post_launch_complete_closeout_package' => array(
            'required_if' => array(
                'rule' => array('requiredIf', 'project_type', '/^Post/'),
                'message' => 'Please enter Closeout Package',
            ),
        ),
        'post_launch_daily_report_delivered' => array(
            'required_if' => array(
                'rule' => array('requiredIf', 'project_type', '/^Post/'),
                'message' => 'Please select Daily Report Delivered?',
            ),
        ),
        'post_launch_kick_off_slides_delivered' => array(
            'required_if' => array(
                'rule' => array('requiredIf', 'project_type', '/^Post/'),
                'message' => 'Please select  Kick-off Slides Delivered?',
            ),
        ),
        'post_launch_tracked_delivered' => array(
            'required_if' => array(
                'rule' => array('requiredIf', 'project_type', '/^Post/'),
                'message' => 'Please select Tracked Delivered?',
            ),
        ),
        'post_launch_market_folder' => array(
            'required_if' => array(
                'rule' => array('requiredIf', 'project_type', '/^Post/'),
                'message' => 'Please enter Market Folder link',
            ),
        ),
    );

    function beforeSave($options = array()) {
        parent::beforeSave($options);
        $this->data['RfV2Module']['additional_engineers'] = array_filter($this->data['RfV2Module']['additional_engineers']);
        $this->data['RfV2Module']['additional_engineers'] = implode('|', $this->data['RfV2Module']['additional_engineers']);
        return true;
    }

    function afterFind($results, $primary = false) {
        parent::afterFind($results, $primary);
        foreach ($results as $key => $row) {
            if (isset($row['RfV2Module']['additional_engineers'])) {
                $results[$key]['RfV2Module']['additional_engineers'] = explode('|', $row['RfV2Module']['additional_engineers']);
            }
        }
        return $results;
    }

    function requiredIf($check, $field, $reg) {
        if (preg_match($reg, $this->data['RfV2Module'][$field])) {
            if ($this->is_empty($check)) {
                return false;
            }
        }
        return true;
    }

    function checkGreater($check, $field, $val = 0) {
        if ($this->data['RfV2Module'][$field] > $val) {;
            if ($this->is_empty($check)) {
                return false;
            }
        }
        return true;
    }

    function nonEmptyIfOther($check, $field) {
        if ($this->data['RfV2Module'][$field] === "Other") {
            if ($this->is_empty($check)) {
                return false;
            }
        }
        return true;
    }

    function nonEmptyIfNo($check, $field) {
        if ($this->data['RfV2Module'][$field] === "No") {
            if ($this->is_empty($check)) {
                return false;
            }
        }
        return true;
    }

    function requiredIflaterDate($check, $date1, $date2) {
        $date1 = strtotime($this->data['RfV2Module'][$date1]);
        $date2 = strtotime($this->data['RfV2Module'][$date2]);
        if( $date2 > $date1) {
            if ($this->is_empty($check)) {
                return false;
            }
        }
        return true;
    }

    function is_empty($check){
        $key = key($check);
        if(empty($check[$key])){
            return true;
        }
        return false;
    }

    function nonEmptyifXHasValueY($check, $x, $y){
        if($this->data['RfV2Module'][$x] === $y){
            if($this->is_empty($check)){
                return false;
            }
        }
        return true;
    }

}

?>