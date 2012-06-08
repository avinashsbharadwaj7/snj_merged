<?php

class Slmaster extends AppModel {
    var $name = 'Slmaster';    


    var $values_arr = array(
                    'work_location' => array('Onsite(Customer)','Remote','Other'),
                    'access_method' => array('Sonar'),
                    'mop_used' => array('Yes'),
                    'mop_problem' => array('Yes'),
                    'activity_type_other' => array('Node(Site) - RNC Transport Network','Node(Site) - RNC Radio Network','Node(Site) - OSS Relations','Node(Site) - Complete(RNC + OSS)','Other'),
                    'activity_type_original_SLR' => array('Post Check'),
                    'activity_result' => array('Successful with issues - Follow-up Required'),
                    'alarms' => array('1'),
                    'pre_check' => array('1'),
                    'post_check' => array('1'),
                    'transport_script' => array('1'),
                    'radio_script' => array('1'),
                    'rbs_site_file' => array('1'),
                    'gsm_cells' => array('1'),
                    'gsm_relations' => array('1'),
                    'utran_relations' => array('1'),
                    'interfrequency_relations' => array('1'),
                    'femto_relations' => array('1'),
                    'transport_script_status' => array('Not Loaded Successfully'),
                    'radio_script_status' => array('Not Loaded Successfully'),
                    'rbs_site_file_status' => array('Not Loaded Successfully'),
                    'gsm_cells_status' => array('Partially Imported and Activation Successful','Imported Successfully and Activation Not Successful','Partially Imported and Activation Not Successful','Not Imported Successfully and No Activation'),
                    'gsm_relations_status' => array('Partially Imported and Activation Successful','Imported Successfully and Activation Not Successful','Partially Imported and Activation Not Successful','Not Imported Successfully and No Activation'),
                    'utran_relations_status' => array('Partially Imported and Activation Successful','Imported Successfully and Activation Not Successful','Partially Imported and Activation Not Successful','Not Imported Successfully and No Activation'),
                    'interfrequency_relations_status' => array('Partially Imported and Activation Successful','Imported Successfully and Activation Not Successful','Partially Imported and Activation Not Successful','Not Imported Successfully and No Activation'),
                    'femto_relations_status' => array('Partially Imported and Activation Successful','Imported Successfully and Activation Not Successful','Partially Imported and Activation Not Successful','Not Imported Successfully and No Activation'),                    
                    
                    );


    var $double_check = array(
                          'activity_type_original_SLR',
                          'gsm_cells_complete',
                          'gsm_cells_total',
                          'gsm_relations_complete',
                          'gsm_relations_total',
                          'utran_relations_complete',
                          'utran_relations_total',
                          'interfrequency_relations_complete',
                          'interfrequency_relations_total',
                          'femto_relations_complete',
                          'femto_relations_total'
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
              'network_number' => array(
                          'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Network Number cannot be empty.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
                          'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Numbers only.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
                           'minLength' => array(
				'rule' => array('between', 8, 8),
				'message' => 'Network Number has to be 8 digits.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
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
                'organization' => array(
                          'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select the Organization.',
                                'last' => true
                          ),
		),
        
                'technology' => array(
                          'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select the Technology.',
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
                'tcm_name_signum' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select the TCM Name/Signum.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'date_activity_performed' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select the Date the activity was performed.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),                 
		
                 'access_method' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please select the Access Method used.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'access_method_sonar' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','access_method'),
				'message' => 'Please select the reason for the usage of Sonar.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                 'mop_used' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please Specify if a MOP was used.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                 'mop_version' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','mop_used'),
				'message' => 'Please Specify the MOP version.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'mop_problem' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','mop_used'),
				'message' => 'Please Specify if any issues where encountered with the MOP.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                 'mop_problem_description' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','mop_problem'),
				'message' => 'Please Specify the MOP problems.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'activity_type' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please Select the Activity.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                 'activity_type_other' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','activity_type'),
				'message' => 'Please Specify the Activity.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'activity_type_original_SLR' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','activity_type'),
				'message' => 'This field is mandatory and has to be numeric.',
                                'last' => true,
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'activity_result' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please Select the Activity Result.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),                
		),
                'issue_owner' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','activity_result'),
				'message' => 'Please Select the Issue Owner.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
                 ),
                 'rnc' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please Specify the RNC.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                 'oss' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please Specify the OSS.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                 'rbs' => array(
                          'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Please Specify the RBS/s.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'alarm_comments' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','alarms'),
				'message' => 'Please Specify the alarms.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'pre_check_comments' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','pre_check'),
				'message' => 'Please Specify the PreCheck KPIs.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'post_check_comments' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','post_check'),
				'message' => 'Please Specify the PostCheck KPIs.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'transport_script_status' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','transport_script'),
				'message' => 'Please Select the Status.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'transport_script_comments' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','transport_script_status'),
				'message' => 'Please Explain.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'transport_script_tcm_explanation' => array(
                          'notempty' => array(
				'rule' => array('validateTCMfields','transport_script_tcm'),
				'message' => 'Please Explain.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'radio_script_status' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','radio_script'),
				'message' => 'Please Select the Status.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'radio_script_comments' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','radio_script_status'),
				'message' => 'Please Explain.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'radio_script_tcm_explanation' => array(
                          'notempty' => array(
				'rule' => array('validateTCMfields','radio_script_tcm'),
				'message' => 'Please Explain.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'rbs_site_file_status' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','rbs_site_file'),
				'message' => 'Please Select the Status.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'rbs_site_file_comments' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','rbs_site_file_status'),
				'message' => 'Please Explain.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'rbs_site_file_explanation' => array(
                          'notempty' => array(
				'rule' => array('validateTCMfields','rbs_site_file_tcm'),
				'message' => 'Please Explain.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'gsm_cells_complete' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','gsm_cells'),
				'message' => 'This field is mandatory and has to be numeric.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'gsm_cells_total' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','gsm_cells'),
				'message' => 'This field is mandatory and has to be numeric.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'gsm_cells_status' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','gsm_cells'),
				'message' => 'Please Select the Status.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'gsm_cells_comments' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','gsm_cells_status'),
				'message' => 'Please Explain.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'gsm_cells_explanation' => array(
                          'notempty' => array(
				'rule' => array('validateTCMfields','gsm_cells_tcm'),
				'message' => 'Please Explain.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'gsm_relations_complete' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','gsm_relations'),
				'message' => 'This field is mandatory and has to be numeric.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'gsm_relations_total' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','gsm_relations'),
				'message' => 'This field is mandatory and has to be numeric.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'gsm_relations_status' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','gsm_relations'),
				'message' => 'Please Select the Status.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'gsm_relations_comments' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','gsm_relations_status'),
				'message' => 'Please Explain.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'gsm_relations_explanation' => array(
                          'notempty' => array(
				'rule' => array('validateTCMfields','gsm_relations_tcm'),
				'message' => 'Please Explain.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'utran_relations_complete' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','utran_relations'),
				'message' => 'This field is mandatory and has to be numeric.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'utran_relations_total' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','utran_relations'),
				'message' => 'This field is mandatory and has to be numeric.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'utran_relations_status' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','utran_relations'),
				'message' => 'Please Select the Status.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'utran_relations_comments' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','utran_relations_status'),
				'message' => 'Please Explain.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'utran_relations_explanation' => array(
                          'notempty' => array(
				'rule' => array('validateTCMfields','utran_relations_tcm'),
				'message' => 'Please Explain.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'interfrequency_relations_complete' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','interfrequency_relations'),
				'message' => 'This field is mandatory and has to be numeric.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'interfrequency_relations_total' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','interfrequency_relations'),
				'message' => 'This field is mandatory and has to be numeric.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'interfrequency_relations_status' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','interfrequency_relations'),
				'message' => 'Please Select the Status.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'interfrequency_relations_comments' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','interfrequency_relations_status'),
				'message' => 'Please Explain.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'interfrequency_relations_explanation' => array(
                          'notempty' => array(
				'rule' => array('validateTCMfields','interfrequency_relations_tcm'),
				'message' => 'Please Explain.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'femto_relations_complete' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','femto_relations'),
				'message' => 'This field is mandatory and has to be numeric.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'femto_relations_total' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','femto_relations'),
				'message' => 'This field is mandatory and has to be numeric.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'femto_relations_status' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','femto_relations'),
				'message' => 'Please Select the Status.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'femto_relations_comments' => array(
                          'notempty' => array(
				'rule' => array('validateDependency','femto_relations_status'),
				'message' => 'Please Explain.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
                'femto_relations_explanation' => array(
                          'notempty' => array(
				'rule' => array('validateTCMfields','femto_relations_tcm'),
				'message' => 'Please Explain.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),
		
                'activity_result_unsuccessful_explanation' => array(
                          'notempty' => array(
				'rule' => array('validateTCMfields','activity_result_unsuccessful'),
				'message' => 'Please Explain.',
                                'last' => true
				//'allowEmpty' => false
                                //'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
                          ),
		),


        );
		
		
		var $hasMany = array(
		'Slfile' => array(
			'className' => 'Slfile',
			'foreignKey' => 'slmaster_id',
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

    
    function validateDependency($check,$compare) {
           // var_dump($this->data);
      $compare_field = $this->data['Slmaster'][$compare]; // get the value in the $compare field
      if(key($check) == 'activity_type_other')
          $compare = key($check);
      if(key($check) == 'activity_type_original_SLR')
          $compare = key($check);

      $val = $this->values_arr[$compare];   //get the dependent values form the array above for the $compare field
      if(in_array($compare_field,$val) && ($check[key($check)] == "")) //check if the value is $compare is in the dependent values - if yes and the field that is checked for is empty (mandatory field empty) return false
            return false;
      elseif(in_array($compare_field,$val) && ($check[key($check)] != "")) //if its not empty, check if this field belongs to the double check array which contains all field names that have to number only. if yes, call check numeric function on it, if not, return true
      {
          if(in_array(key($check),$this->double_check)) 
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
      $val = $this->data['Slmaster'][$compare];
      if($sig_model != $this->data['Slmaster']['nic_signum'] && $val != "")
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
	  
	  if($this->data['Slmaster']['notes'] != "")
		  {
				$sig_model = Authsome::get('username');
				$datetime = date('m/d/y H:i');
				$this->data['Slmaster']['notes'] = $sig_model." - ".$datetime."\n".$this->data['Slmaster']['notes']."\n";
				if($this->data['Slmaster']['additional_notes'] != '')
					$this->data['Slmaster']['additional_notes'] = $this->data['Slmaster']['additional_notes']."\n".$this->data['Slmaster']['notes'];
				else
					$this->data['Slmaster']['additional_notes'] = $this->data['Slmaster']['notes']."\n";
		  }
      return true;
  }
}


?>