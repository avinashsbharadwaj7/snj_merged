<?php

class TmobileSlmaster extends AppModel {

    var $name = 'TmobileSlmaster';
    var $hasOne= array(
        'TmobileSlfile' => array(
            'className' => 'TmobileSlfile',
            'foreignKey' => 'tmobile_slmaster_id',
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
    );
    
    var $status_arr = array(
        'status' => array('Loaded Successfully','Not Loaded Successfully')
        
    );
    
    var $status_oss_arr = array(
        'status' => array('Imported Successfully and Activation Successful',
                          'Partially Imported and Activation Successful',
                          'Imported Successfully and Activation Not Successful',
                          'Partially Imported and Activation Not Successful',
                          'Not Imported Successfully and No Activation'            
            )
        
    );
    var $values_arr = array(
        'work_location' => array('Onsite(Customer)', 'Remote', 'Other'),
        'access_method' => array('Sonar'),
        'mop_used' => array('Yes'),
        'mop_problem' => array('Yes'),
        'activity_type_other' => array('Other'),
        //'activity_type_original_SLR' => array('Post Check'),
        'activity_result' => array('Successful with issues - Follow-up Required'),
        'alarms' => array('1'),
        'pre_check' => array('1'),
        'post_check' => array('1'),
        'valid_status' => array('Not Loaded Successfully','Partially Imported and Activation Successful',
                          'Imported Successfully and Activation Not Successful',
                          'Partially Imported and Activation Not Successful',
                          'Not Imported Successfully and No Activation'   ),
        
    );
    
    
    var $validate = array(
        'customer' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please select the Customer.',
                'last' => true
            ),
        ),
                'time_taken_for_activity'=> array(
			'notempty' => array(
				'rule' => array('time'),                                
				'message' => 'Please enter the time spent on this activity in the right format (HH:MM).',
			),
		),                
        'network_number' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Network Number cannot be empty.',
                'last' => true
            ),
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Numbers only.',
                'last' => true
            ),
            'minLength' => array(
                'rule' => array('between', 8, 8),
                'message' => 'Network Number has to be 8 digits.',
                'last' => true
            ),
        ),
        'region' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please select the Region.',
                'last' => true
            ),
        ),
        'technology' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please select the Technology.',
                'last' => true
            ),
        ),
        'work_location' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please select the Work Location.',
                'last' => true
            ),
        ),
        'work_location_other' => array(
            'notempty' => array(
                'rule' => array('validateDependency', 'work_location'),
                'message' => 'Please Specify the Work Location.',
                'last' => true
            ),
        ),
        'tcm_name_signum' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please select the TCM Name/Signum.',
                'last' => true
            ),
        ),
        'date_activity_performed' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please select the Date the activity was performed.',
                'last' => true
            ),
        ),
        'access_method' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please select the Access Method used.',
                'last' => true
            ),
        ),
        'access_method_sonar' => array(
            'notempty' => array(
                'rule' => array('validateDependency', 'access_method'),
                'message' => 'Please select the reason for the usage of Sonar.',
                'last' => true
            ),
        ),
        'mop_used' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please Specify if a MOP was used.',
                'last' => true
            ),
        ),
        'mop_version' => array(
            'notempty' => array(
                'rule' => array('validateDependency', 'mop_used'),
                'message' => 'Please Specify the MOP version.',
                'last' => true
            ),
        ),
        'mop_problem' => array(
            'notempty' => array(
                'rule' => array('validateDependency', 'mop_used'),
                'message' => 'Please Specify if any issues where encountered with the MOP.',
                'last' => true
            ),
        ),
        'mop_problem_description' => array(
            'notempty' => array(
                'rule' => array('validateDependency', 'mop_problem'),
                'message' => 'Please Specify the MOP problems.',
                'last' => true
            ),
        ),
        'activity_type' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please Select the Activity.',
                'last' => true
            ),
        ),
                 'activity_type_other' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','activity_type'),
				'message' => 'Please Specify the Activity.',
                                'last' => true
				
                          ),
		),
//                'activity_type_original_SLR' => array(
//                          'notempty' => array(
//				'rule' => array('validateDependency','activity_type'),
//				'message' => 'This field is mandatory and has to be numeric.',
//                                'last' => true,
//				
//                          ),
//		),
        'activity_result' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please Select the Activity Result.',
                'last' => true
            ),
        ),
        'issue_owner' => array(
            'notempty' => array(
                'rule' => array('validateDependency', 'activity_result'),
                'message' => 'Please Select the Issue Owner.',
                'last' => true
            ),
        ),
        'rnc' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please Specify the RNC.',
                'last' => true
            ),
        ),
        'oss' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please Specify the OSS.',
                'last' => true
            ),
        ),
        'rbs' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please Specify the RBS/s.',
                'last' => true
            ),
        ),
        'alarm_comments' => array(
            'notempty' => array(
                'rule' => array('validateDependency', 'alarms'),
                'message' => 'Please Specify the alarms.',
                'last' => true
            ),
        ),
        'pre_check_comments' => array(
            'notempty' => array(
                'rule' => array('validateDependency', 'pre_check'),
                'message' => 'Please Specify the PreCheck KPIs.',
                'last' => true
            ),
        ),
        'post_check_comments' => array(
            'notempty' => array(
                'rule' => array('validateDependency', 'post_check'),
                'message' => 'Please Specify the PostCheck KPIs.',
                'last' => true
            ),
        ),
        
        //RNC
        'rnc_script1_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rnc_script1'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rnc_script1_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rnc_script1_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rnc_script1_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rnc_script1_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rnc_script2_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rnc_script2'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rnc_script2_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rnc_script2_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rnc_script2_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rnc_script2_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
          'rnc_script3_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rnc_script3'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rnc_script3_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rnc_script3_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rnc_script3_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rnc_script3_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rnc_script4_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rnc_script4'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rnc_script4_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rnc_script4_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rnc_script4_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rnc_script4_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rnc_script5_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rnc_script5'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rnc_script5_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rnc_script5_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rnc_script5_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rnc_script5_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rnc_script6_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rnc_script6'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rnc_script6_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rnc_script6_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rnc_script6_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rnc_script6_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rnc_script7_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rnc_script7'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rnc_script7_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rnc_script7_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rnc_script7_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rnc_script7_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rnc_script8_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rnc_script8'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rnc_script8_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rnc_script8_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rnc_script8_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rnc_script8_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rnc_script10_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rnc_script10'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rnc_script10_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rnc_script10_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rnc_script10_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rnc_script10_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rnc_script11_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rnc_script11'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rnc_script11_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rnc_script11_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rnc_script11_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rnc_script11_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        
        //RBS
        'rbs_script1_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rbs_script1'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rbs_script1_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rbs_script1_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script1_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rbs_script1_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script2_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rbs_script2'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rbs_script2_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rbs_script2_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script2_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rbs_script2_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script3_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rbs_script3'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rbs_script3_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rbs_script3_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script3_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rbs_script3_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script4_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rbs_script4'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rbs_script4_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rbs_script4_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script4_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rbs_script4_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script5_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rbs_script5'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rbs_script5_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rbs_script5_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script5_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rbs_script5_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script6_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rbs_script6'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rbs_script6_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rbs_script6_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script6_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rbs_script6_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script7_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rbs_script7'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rbs_script7_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rbs_script7_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script7_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rbs_script7_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script8_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rbs_script8'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rbs_script8_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rbs_script8_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script8_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rbs_script8_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script9_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rbs_script9'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rbs_script9_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rbs_script9_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script9_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rbs_script9_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script10_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rbs_script10'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rbs_script10_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rbs_script10_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script10_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rbs_script10_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script11_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rbs_script11'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rbs_script11_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rbs_script11_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script11_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rbs_script11_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script12_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rbs_script12'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rbs_script12_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rbs_script12_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script12_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rbs_script12_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script13_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rbs_script13'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rbs_script13_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rbs_script13_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script13_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rbs_script13_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script14_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rbs_script14'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rbs_script14_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rbs_script14_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script14_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rbs_script14_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script15_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rbs_script15'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rbs_script15_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rbs_script15_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script15_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rbs_script15_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script16_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rbs_script16'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rbs_script16_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rbs_script16_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script16_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rbs_script16_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script17_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rbs_script17'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rbs_script17_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rbs_script17_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script17_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rbs_script17_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script18_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rbs_script18'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rbs_script18_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rbs_script18_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script18_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rbs_script18_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script19_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','rbs_script19'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'rbs_script19_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','rbs_script19_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'rbs_script19_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','rbs_script19_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        //Fback
        'fback_script1_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','fback_script1'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'fback_script1_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','fback_script1_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script1_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','fback_script1_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script2_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','fback_script2'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'fback_script2_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','fback_script2_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script2_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','fback_script2_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script3_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','fback_script3'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'fback_script3_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','fback_script3_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script3_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','fback_script3_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script4_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','fback_script4'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'fback_script4_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','fback_script4_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script4_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','fback_script4_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script5_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','fback_script5'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'fback_script5_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','fback_script5_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script5_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','fback_script5_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script6_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','fback_script6'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'fback_script6_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','fback_script6_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script6_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','fback_script6_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script7_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','fback_script7'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'fback_script7_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','fback_script7_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script7_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','fback_script7_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script8_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','fback_script8'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'fback_script8_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','fback_script8_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script8_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','fback_script8_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script9_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','fback_script9'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'fback_script9_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','fback_script9_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script9_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','fback_script9_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script10_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','fback_script10'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'fback_script10_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','fback_script10_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script10_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','fback_script10_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script11_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','fback_script11'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'fback_script11_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','fback_script11_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script11_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','fback_script11_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script12_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','fback_script12'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'fback_script12_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','fback_script12_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script12_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','fback_script12_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script13_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','fback_script13'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'fback_script13_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','fback_script13_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script13_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','fback_script13_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script14_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','fback_script14'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'fback_script14_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','fback_script14_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script14_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','fback_script14_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script15_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','fback_script15'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'fback_script15_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','fback_script15_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script15_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','fback_script15_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script16_status' => array(
            'notempty' => array(
                'rule'=>array('validateScriptfields','fback_script16'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        
        'fback_script16_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','fback_script16_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'fback_script16_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','fback_script16_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        //OSS
        
        'oss_script1_status' => array(
            'notempty' => array(
                'rule'=>array('validateOssscriptfields','oss_script1'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        'oss_script1_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','oss_script1_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'oss_script1_complete' => array(
            'notempty' => array(
                'rule'=>array('validateoss','oss_script1'),
                'message' => 'This field is mandatory and has to be numeric.',
                'last'=> true
            ),
        ),
        
        'oss_script1_total' => array(
            'notempty' => array(
                'rule'=>array('validateoss','oss_script1'),
                'message' => 'This field is mandatory and has to be numeric.',
                'last'=> true
            ),
        ),
                
        
        'oss_script1_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','oss_script1_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'oss_script2_status' => array(
            'notempty' => array(
                'rule'=>array('validateOssscriptfields','oss_script2'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        'oss_script2_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','oss_script2_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'oss_script2_complete' => array(
            'notempty' => array(
                'rule'=>array('validateoss','oss_script2'),
                'message' => 'This field is mandatory and has to be numeric.',
                'last'=> true
            ),
        ),
        
        'oss_script2_total' => array(
            'notempty' => array(
                'rule'=>array('validateoss','oss_script2'),
                'message' => 'This field is mandatory and has to be numeric.',
                'last'=> true
            ),
        ),
                
        
        'oss_script2_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','oss_script2_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'oss_script3_status' => array(
            'notempty' => array(
                'rule'=>array('validateOssscriptfields','oss_script3'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        'oss_script3_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','oss_script3_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'oss_script3_complete' => array(
            'notempty' => array(
                'rule'=>array('validateoss','oss_script3'),
                'message' => 'This field is mandatory and has to be numeric.',
                'last'=> true
            ),
        ),
        
        'oss_script3_total' => array(
            'notempty' => array(
                'rule'=>array('validateoss','oss_script3'),
                'message' => 'This field is mandatory and has to be numeric.',
                'last'=> true
            ),
        ),
                
        
        'oss_script3_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','oss_script3_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'oss_script4_status' => array(
            'notempty' => array(
                'rule'=>array('validateOssscriptfields','oss_script4'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        'oss_script4_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','oss_script4_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'oss_script4_complete' => array(
            'notempty' => array(
                'rule'=>array('validateoss','oss_script4'),
                'message' => 'This field is mandatory and has to be numeric.',
                'last'=> true
            ),
        ),
        
        'oss_script4_total' => array(
            'notempty' => array(
                'rule'=>array('validateoss','oss_script4'),
                'message' => 'This field is mandatory and has to be numeric.',
                'last'=> true
            ),
        ),
                
        
        'oss_script4_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','oss_script4_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'oss_script5_status' => array(
            'notempty' => array(
                'rule'=>array('validateOssscriptfields','oss_script5'),
                'message' => 'Select status.',
                'last'=> true
            ),
        ),
        'oss_script5_comments' => array(
            'notempty' => array(
                'rule'=>array('validateScriptcomments','oss_script5_status'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
        'oss_script5_complete' => array(
            'notempty' => array(
                'rule'=>array('validateoss','oss_script5'),
                'message' => 'This field is mandatory and has to be numeric.',
                'last'=> true
            ),
        ),
        
        'oss_script5_total' => array(
            'notempty' => array(
                'rule'=>array('validateoss','oss_script5'),
                'message' => 'This field is mandatory and has to be numeric.',
                'last'=> true
            ),
        ),
                
        
        'oss_script5_tcm_explanation' => array(
            'notempty' => array(
                'rule'=>array('validateTCMfields','oss_script5_tcm'),
                'message' => 'Please specify the errors.',
                'last'=> true
            ),
        ),
        
    );
    
        
    function validateoss($check, $compare)
    {
       $compare_field = $this->data['TmobileSlmaster'][$compare]; 
       $val = $this->status_arr['status'];
       if($compare_field=='0')
           return true;
       if($compare_field=='1' && $check[key($check)]!="")
       {
           if (is_numeric($check[key($check)]))
            return true;
            else
            return false;
       }
           else
               return false;
    }
    
    function validateScriptcomments($check,$compare){
       $compare_field = $this->data['TmobileSlmaster'][$compare];  
       $val = $this->values_arr['valid_status'];
       if(!(in_array($compare_field,$val)))
        return true;
       else if(in_array($compare_field,$val) && $check[key($check)] != "")
        return true;
       
        else 
         return false;
    
    }
    function validateScriptfields($check, $compare) {        
        
        $compare_field = $this->data['TmobileSlmaster'][$compare]; 
       $val = $this->status_arr['status'];
       if($compare_field=='0')
           return true;
        else if($compare_field=='1' && in_array(($check[key($check)]),$val))
            return true;
        else
            return false;
            
        
    }
    
    function validateOssscriptfields($check,$compare)
    {
        $compare_field = $this->data['TmobileSlmaster'][$compare]; 
       $val = $this->status_oss_arr['status'];
       if($compare_field=='0')
           return true;
        else if($compare_field=='1' && in_array(($check[key($check)]),$val))
            return true;
        else
            return false;
    }
    
    function validateDependency($check, $compare) {

        $compare_field = $this->data['TmobileSlmaster'][$compare]; // get the value in the $compare field
        
        if (key($check) == 'activity_type_other')
            $compare = key($check);
//        if (key($check) == 'activity_type_original_SLR')
//            $compare = key($check);
        
        $val = $this->values_arr[$compare];   //get the dependent values form the array above for the $compare field
        if (in_array($compare_field, $val) && ($check[key($check)] == "")) //check if the value is $compare is in the dependent values - if yes and the field that is checked for is empty (mandatory field empty) return false
            return false;
//      elseif(in_array($compare_field,$val) && ($check[key($check)] != "")) //if its not empty, check if this field belongs to the double check array which contains all field names that have to number only. if yes, call check numeric function on it, if not, return true
//      {
//          if(in_array(key($check),$this->double_check)) 
//            return $this->checkNumeric($check);
//          else
//            return true;
//      }
        else
            return true;
    }

    function validateTCMfields($check, $compare) {
        $sig_model = Authsome::get('username');
       
        $val = $this->data['TmobileSlmaster'][$compare];
         
          
        if ($sig_model != $this->data['TmobileSlmaster']['nic_signum'] && $val != "") {         
           
            if ($check[key($check)] == "")
               return false;
            else
                return true;
        }
        else
            return true;
    }

    function checkNumeric($check) {
        if (is_numeric($check[key($check)]))
            return true;
        else
            return false;
    }

  

}

?>