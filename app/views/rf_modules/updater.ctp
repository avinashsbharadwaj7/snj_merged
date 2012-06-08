<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if($add_engineers)
    echo $this->Form->input('RfAdditionalEngineer.'.$nextNumber.'.engineer_signum', array('label'=>'Additional Engineer', 'div'=>array('class'=> 'formfields')));
else{
$key = key($data);//var_dump($key,$data[$key], $data);
//var_dump($databaseFields->getOptions('engineers_qualified', 3));
if($key == 'checklist_accurate' && $data[$key] == "No"):
    echo $this->Form->input('RfModule.checklist_accurate_reason',
                                    array(
                                        'options'=> array(''=>'', 'Available, but received late'=>'Available, but received late', 'Not available'=>'Not available', 'Not sure who to ask'=>'Not sure who to ask', 'Cluster not 90% ready'=>'Cluster not 90% ready', 'Other'=>'Other'),
                                        'label'=>'Reason',
                                        'type'=>'select',
                                        'name'=>'data[RfModule][checklist_accurate_reason]',
                                        'div'=>false,
                                        //'legend'=>Project Inputs
                                        )
                                    );

    echo $ajax->div('checklist_accurate_reason_explain_placeholder');
    echo $this->Form->input('RfModule.checklist_accurate_reason_explain',
                                    array(
                                        //'options'=> array(''=>'', 'Available, but received late'=>'Available, but received late', 'Not available'=>'Not available', 'Not sure who to ask'=>'Not sure who to ask', 'Cluster not 90% ready'=>'Cluster not 90% ready'),
                                        'label'=>'Please Explain',
                                        //'type'=>'textarea',
                                        'name'=>'data[RfModule][checklist_accurate_reason_explain]',
                                        'div'=>false,
                                        //'legend'=>Project Inputs
                                        )
                                    );
    echo $ajax->divEnd('checklist_accurate_reason_explain_placeholder');

//    echo $ajax->observeField('RfModuleChecklistAccurateReason',
//                                array(
//                                    "update"=>"checklist_accurate_reason_explain_placeholder",
//                                    "url"=>array(
//                                        'controller'=>'rf_modules',
//                                        'action'=>'updater')
//                                    )
//                        );
//elseif($key == 'checklist_accurate_reason' && $data[$key] == "Other"):
//    echo $this->Form->input('RfModule.checklist_accurate_reason_explain',
//                                    array(
//                                        //'options'=> array(''=>'', 'Available, but received late'=>'Available, but received late', 'Not available'=>'Not available', 'Not sure who to ask'=>'Not sure who to ask', 'Cluster not 90% ready'=>'Cluster not 90% ready'),
//                                        'label'=>'Please Explain',
//                                        //'type'=>'textarea',
//                                        'name'=>'data[RfModule][checklist_accurate_reason_explain]',
//                                        'div'=>false,
//                                        //'legend'=>Project Inputs
//                                        )
//                                    );
elseif($key == 'sow_available' && $data[$key] == "No"):
    echo $this->Form->input("RfModule.sow_available_reason",
                                    array(
                                        'options'=> ($databaseFields->getOptions('reason', 3)),
                                        'label'=>'Reason',
                                        'type'=>'select',
                                        'name'=>'data[RfModule][sow_available_reason]',
                                        'div'=>false,
                                        //'legend'=>Project Inputs
                                        )
                                    );
echo $ajax->div('sow_available_reason_explain_placeholder');
echo $this->Form->input('RfModule.sow_available_reason_explain',
                                    array(
                                        //'options'=> array(''=>'', 'Available, but received late'=>'Available, but received late', 'Not available'=>'Not available', 'Not sure who to ask'=>'Not sure who to ask', 'Cluster not 90% ready'=>'Cluster not 90% ready'),
                                        'label'=>'Please Explain',
                                        //'type'=>'textarea',
                                        'name'=>'data[RfModule][sow_available_reason_explain]',
                                        'div'=>false,
                                        //'legend'=>Project Inputs
                                        )
                                    );
echo $ajax->divEnd('sow_available_reason_explain_placeholder');
//    echo $ajax->observeField('RfModuleSowAvailableReason',
//                                array(
//                                    "update"=>"sow_available_reason_explain_placeholder",
//                                    "url"=>array(
//                                        'controller'=>'rf_modules',
//                                        'action'=>'updater')
//                                    )
//                        );
//elseif($key == 'sow_available_reason' && $data[$key] == "Other"):
//    echo $this->Form->input('RfModule.sow_available_reason_explain',
//                                    array(
//                                        //'options'=> array(''=>'', 'Available, but received late'=>'Available, but received late', 'Not available'=>'Not available', 'Not sure who to ask'=>'Not sure who to ask', 'Cluster not 90% ready'=>'Cluster not 90% ready'),
//                                        'label'=>'Please Explain',
//                                        //'type'=>'textarea',
//                                        'name'=>'data[RfModule][sow_available_reason_explain]',
//                                        'div'=>false,
//                                        //'legend'=>Project Inputs
//                                        )
//                                    );

elseif($key == "project_type" && preg_match("/^Post*/", $data[$key])):
    ?>
    <fieldset>
		<legend><?php __('Add Post Launch Report'); ?></legend>
	<?php
		echo $this->Form->input('RfPostLaunchReport.0.carrier_tuned');
		echo $this->Form->input('RfPostLaunchReport.0.complete_closeout_package', array('options' => ($databaseFields->getOptions('yes_no', '3'))));
		echo $this->Form->input('RfPostLaunchReport.0.expedited_tuning', array('options' => ($databaseFields->getOptions('yes_no', '3'))));
		echo $this->Form->input('RfPostLaunchReport.0.frequency_band');
		echo $this->Form->input('RfPostLaunchReport.0.daily_report_delivered', array('options' => ($databaseFields->getOptions('yes_no', '3'))));
		echo $this->Form->input('RfPostLaunchReport.0.kick_off_slides_delivered', array('options' => ($databaseFields->getOptions('yes_no', '3'))));
		echo $this->Form->input('RfPostLaunchReport.0.tracked_delivered', array('options' => ($databaseFields->getOptions('yes_no', '3'))));
		echo $this->Form->input('RfPostLaunchReport.0.market_folder');
	?>
</fieldset>
<?php
elseif($key == "project_type" && preg_match("/^Pre*/", $data[$key])):
    ?>
    <fieldset>
		<legend><?php __('Add Pre Launch Report'); ?></legend>
	<?php
		echo $this->Form->input('PreLaunchReport.0.number_of_drives');
                echo $ajax->div('pre_launch_drives_placeholder', array('class'=>'formfields'));
                echo $ajax->divEnd('pre_launch_drives_placeholder');
                echo $ajax->observeField('PreLaunchReport0NumberOfDrives', array('update'=>'pre_launch_drives_placeholder',
                    'url'=>array('action'=>'updater')));
	?>
</fieldset>
<?php
elseif($key == 'number_of_drives'):
    for($i=1; $i<=$data[$key] && $i<4; $i++){
            echo $this->Form->input("PreLaunchReport.0.drive{$i}_fail_reason", array('options'=> $databaseFields->getOptions('pre_launch_drive_fail_reason', 3)));
        echo $this->Form->input("PreLaunchReport.0.drive{$i}_fail_description");
    }
elseif($key == 'nw_available' && $data[$key] == "No"):
    echo $this->Form->input("RfModule.nw_available_reason",
                                    array(
                                        'options'=> ($databaseFields->getOptions('reason', 3)),
                                        'label'=>'Reason',
                                        'type'=>'select',
                                        'name'=>'data[RfModule][nw_available_reason]',
                                        'div'=>false,
                                        //'legend'=>Project Inputs
                                        )
                                    );
echo $ajax->div('nw_available_reason_explain_placeholder');
echo $this->Form->input('RfModule.nw_available_reason_explain',
                                    array(
                                        //'options'=> array(''=>'', 'Available, but received late'=>'Available, but received late', 'Not available'=>'Not available', 'Not sure who to ask'=>'Not sure who to ask', 'Cluster not 90% ready'=>'Cluster not 90% ready'),
                                        'label'=>'Please Explain',
                                        //'type'=>'textarea',
                                        'name'=>'data[RfModule][nw_available_reason_explain]',
                                        'div'=>false,
                                        //'legend'=>Project Inputs
                                        )
                                    );
echo $ajax->divEnd('nw_available_reason_explain_placeholder');
//    echo $ajax->observeField('RfModuleNwAvailableReason',
//                                array(
//                                    "update"=>"nw_available_reason_explain_placeholder",
//                                    "url"=>array(
//                                        'controller'=>'rf_modules',
//                                        'action'=>'updater')
//                                    )
//                        );
//elseif($key == 'nw_available_reason' && $data[$key] == "Other"):
//    echo $this->Form->input('RfModule.nw_available_reason_explain',
//                                    array(
//                                        //'options'=> array(''=>'', 'Available, but received late'=>'Available, but received late', 'Not available'=>'Not available', 'Not sure who to ask'=>'Not sure who to ask', 'Cluster not 90% ready'=>'Cluster not 90% ready'),
//                                        'label'=>'Please Explain',
//                                        //'type'=>'textarea',
//                                        'name'=>'data[RfModule][nw_available_reason_explain]',
//                                        'div'=>false,
//                                        //'legend'=>Project Inputs
//                                        )
//                                    );
elseif($key == 'project_budget_access' && $data[$key] == "No"):
    echo $this->Form->input("RfModule.project_budget_access_reason",
                                    array(
                                        'options'=> ($databaseFields->getOptions('reason', 3)),
                                        'label'=>'Reason',
                                        'type'=>'select',
                                        'name'=>'data[RfModule][project_budget_access_reason]',
                                        'div'=>false,
                                        //'legend'=>Project Inputs
                                        )
                                    );
echo $ajax->div('project_budget_access_reason_explain_placeholder');
    echo $this->Form->input('RfModule.project_budget_access_reason_explain',
                                    array(
                                        //'options'=> array(''=>'', 'Available, but received late'=>'Available, but received late', 'Not available'=>'Not available', 'Not sure who to ask'=>'Not sure who to ask', 'Cluster not 90% ready'=>'Cluster not 90% ready'),
                                        'label'=>'Please Explain',
                                        //'type'=>'textarea',
                                        'name'=>'data[RfModule][project_budget_access_reason_explain]',
                                        'div'=>false,
                                        //'legend'=>Project Inputs
                                        )
                                    );
echo $ajax->divEnd('project_budget_access_reason_explain_placeholder');

//    echo $ajax->observeField('RfModuleProjectBudgetAccessReason',
//                                array(
//                                    "update"=>"project_budget_access_reason_explain_placeholder",
//                                    "url"=>array(
//                                        'controller'=>'rf_modules',
//                                        'action'=>'updater')
//                                    )
//                        );
//elseif($key == 'project_budget_access_reason' && $data[$key] == "Other"):
//    echo $this->Form->input('RfModule.project_budget_access_reason_explain',
//                                    array(
//                                        //'options'=> array(''=>'', 'Available, but received late'=>'Available, but received late', 'Not available'=>'Not available', 'Not sure who to ask'=>'Not sure who to ask', 'Cluster not 90% ready'=>'Cluster not 90% ready'),
//                                        'label'=>'Please Explain',
//                                        //'type'=>'textarea',
//                                        'name'=>'data[RfModule][project_budget_access_reason_explain]',
//                                        'div'=>false,
//                                        //'legend'=>Project Inputs
//                                        )
//                                    );
//
elseif($key == 'engineers_qualified' && $data[$key] == "No"):
    echo $this->Form->input('RfModule.engineers_qualified_number',
                                    array(
                                        'options'=> ($databaseFields->getOptions('engineers_qualified', 3)),
                                        'label'=>'How many are qualified?',
                                        'type'=>'select',
                                        'name'=>'data[RfModule][engineers_qualified_number]',
                                        'div'=>false,
                                        //'legend'=>Project Inputs
                                        )
                                    );


elseif($key == "num_reject_recom" && $data[$key] > 0):
    echo $this->Form->input('RfModule.rejection_responsible',
                                array(
                                    'options' => ($databaseFields->getOptions('rejection_responsible', '3')),
                                    'label'=>'Who is responsible for majority of rejections',
                                    'type'=>'select',
                                    'name'=>'data[RfModule][rejection_responsible]',
                                    'div'=>array('class'=>'formfields'),
                                   // 'legend'=>Project Deliverables
                                    )
                                );

    echo $ajax->observeField('RfModuleRejectionResponsible',
                                array(
                                    "update"=>"rejection_responsible_reason_placeholder",
                                    "url"=>array(
                                        'controller'=>'rf_modules',
                                        'action'=>'updater')
                                    )
                        );

elseif($key == 'rejection_responsible' && $data[$key] <> null):
    echo $this->Form->input('RfModule.rejection_responsible_reason',
                                array(
                                    'options' => ($databaseFields->getOptions('fail_reason', '3')),
                                    'label'=>'Major reason for rejections',
                                    'type'=>'select',
                                    'name'=>'data[RfModule][rejection_responsible_reason]',
                                    'div'=>array('class'=> 'formfields'),
                                   // 'legend'=>Project Deliverables
                                    )
                                );
    echo $ajax->observeField('RfModuleRejectionResponsibleReason',
                        array(
                            "update"=>"rejection_responsible_reason_explain_placeholder",
                            'frequency'=>'1',
                            "url"=>array(
                                'controller'=>'rf_modules',
                                'action'=>'updater'
                                )
                            )
                        );

elseif($key == "rejection_responsible_reason" && $data[$key] == 'Other'):
    echo $this->Form->input('RfModule.rejection_responsible_reason_explain',
                                array(
                                   // 'options' => ($databaseFields->getOptions('rejection_responsible', '3')),
                                    'label'=>'Please Explain',
                                   // 'type'=>'text',
                                    'name'=>'data[RfModule][rejection_responsible_reason_explain]',
                                    'div'=>false,
                                   // 'legend'=>Project Deliverables
                                    )
                                );
elseif($key == "num_implemented_changes" && $data[$key] > 0):
    echo $this->Form->input('RfModule.num_implemented_changes_reason',
                                array(
                                    'options' => ($databaseFields->getOptions('fail_reason', '3')),
                                    'label'=>'Major reason for not implemented',
                                    'type'=>'select',
                                    'name'=>'data[RfModule][num_implemented_changes_reason]',
                                    'div'=>false,
                                   // 'legend'=>Project Deliverables
                                    )
                                );
    echo $ajax->observeField('RfModuleNumImplementedChangesReason',
                        array(
                            "update"=>"num_implemented_changes_reason_explain_placeholder",
                            'frequency'=>'1',
                            "url"=>array(
                                'controller'=>'rf_modules',
                                'action'=>'updater'
                                )
                            )
                        );

elseif($key == "num_implemented_changes_reason" && $data[$key] == "Other"):
    echo $this->Form->input('RfModule.num_implemented_changes_reason_explain',
                                array(
                                   // 'options' => ($databaseFields->getOptions('fail_reason', '3')),
                                    'label'=>'Please Explain',
                                  //  'type'=>'select',
                                    'name'=>'data[RfModule][num_implemented_changes_reason_explain]',
                                    'div'=>false,
                                   // 'legend'=>Project Deliverables
                                    )
                                );
//@Moiz Requires Revision badly
elseif($key == "num_sow_adjustments" && $data[$key] == 1):
    echo $this->Form->input('RfModule.sow_adjustments_reason_1',
                                array(
                                    'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),
                                    'label'=>'Reason for SOW adjustments 1st time',
                                    'type'=>'select',
                                    'name'=>'data[RfModule][sow_adjustments_reason_1]',
                                    'div'=>array('class'=>'formfields'),
                                   // 'legend'=>Project Deliverables
                                    )
                                );
echo $ajax->div('sow_adjustments_reason_1_other_explain');
    echo $this->Form->input('RfModule.sow_adjustments_reason_1_explain',
                                array(
                                    //'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),
                                    'label'=>'Please Explain',
                                   // 'type'=>'select',
                                    'name'=>'data[RfModule][sow_adjustments_reason_1_explain]',
                                    'div'=>false,
                                   // 'legend'=>Project Deliverables
                                    )
                                );
echo $ajax->divEnd('sow_adjustments_reason_1_other_explain');
//
//    echo $ajax->observeField('RfModuleSowAdjustmentsReason1',
//                        array(
//                            "update"=>"sow_adjustments_reason_1_other_explain",
//                            'frequency'=>'1',
//                            "url"=>array(
//                                'controller'=>'rf_modules',
//                                'action'=>'updater'
//                                )
//                            )
//                        );
//
//    echo $ajax->div('sow_adjustments_reason_1_other_explain');
//    echo $ajax->divEnd('sow_adjustments_reason_1_other_explain');
//
//elseif($key == "sow_adjustments_reason_1" && $data[$key] == "Other"):
//    echo $this->Form->input('RfModule.sow_adjustments_reason_1_explain',
//                                array(
//                                    //'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),
//                                    'label'=>'Please Explain',
//                                   // 'type'=>'select',
//                                    'name'=>'data[RfModule][sow_adjustments_reason_1_explain]',
//                                    'div'=>false,
//                                   // 'legend'=>Project Deliverables
//                                    )
//                                );

elseif($key == "num_sow_adjustments" && $data[$key] == 2):
    echo $this->Form->input('RfModule.sow_adjustments_reason_1',
                                array(
                                    'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),
                                    'label'=>'Reason for SOW adjustments 1st time',
                                    'type'=>'select',
                                    'name'=>'data[RfModule][sow_adjustments_reason_1]',
                                    'div'=>array('class'=>'formfields'),
                                   // 'legend'=>Project Deliverables
                                    )
                                );
echo $ajax->div('sow_adjustments_reason_1_other_explain');
    echo $this->Form->input('RfModule.sow_adjustments_reason_1_explain',
                                array(
                                    //'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),
                                    'label'=>'Please Explain',
                                   // 'type'=>'select',
                                    'name'=>'data[RfModule][sow_adjustments_reason_1_explain]',
                                    'div'=>false,
                                   // 'legend'=>Project Deliverables
                                    )
                                );
echo $ajax->divEnd('sow_adjustments_reason_1_other_explain');
//    echo $ajax->observeField('RfModuleSowAdjustmentsReason1',
//                        array(
//                            "update"=>"sow_adjustments_reason_1_other_explain",
//                            'frequency'=>'1',
//                            "url"=>array(
//                                'controller'=>'rf_modules',
//                                'action'=>'updater'
//                                )
//                            )
//                        );
//    echo $ajax->div('sow_adjustments_reason_1_other_explain');
//    echo $ajax->divEnd('sow_adjustments_reason_1_other_explain');

    echo $this->Form->input('RfModule.sow_adjustments_reason_2',
                                array(
                                    'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),
                                    'label'=>'Reason for SOW adjustments 2nd time',
                                    'type'=>'select',
                                    'name'=>'data[RfModule][sow_adjustments_reason_2]',
                                    'div'=>array('class'=>'formfields'),
                                   // 'legend'=>Project Deliverables
                                    )
                                );
    echo $ajax->div('sow_adjustments_reason_2_other_explain');
    echo $this->Form->input('RfModule.sow_adjustments_reason_2_explain',
                                array(
                                    'label'=>'Please Explain',
                                    'name'=>'data[RfModule][sow_adjustments_reason_2_explain]',
                                    'div'=>false,
                                    )
                                );
    echo $ajax->divEnd('sow_adjustments_reason_2_other_explain');
//    echo $ajax->observeField('RfModuleSowAdjustmentsReason2',
//                        array(
//                            "update"=>"sow_adjustments_reason_2_other_explain",
//                            'frequency'=>'1',
//                            "url"=>array(
//                                'controller'=>'rf_modules',
//                                'action'=>'updater'
//                                )
//                            )
//                        );
//    echo $ajax->div('sow_adjustments_reason_2_other_explain');
//    echo $ajax->divEnd('sow_adjustments_reason_2_other_explain');

//elseif($key == "sow_adjustments_reason_2" && $data[$key] == "Other"):
//    echo $this->Form->input('RfModule.sow_adjustments_reason_2_explain',
//                                array(
//                                    'label'=>'Please Explain',
//                                    'name'=>'data[RfModule][sow_adjustments_reason_2_explain]',
//                                    'div'=>false,
//                                    )
//                                );

elseif($key == "num_sow_adjustments" && $data[$key] > 2):
    echo $this->Form->input('RfModule.sow_adjustments_reason_1',
                                array(
                                    'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),
                                    'label'=>'Reason for SOW adjustments 1st time',
                                    'type'=>'select',
                                    'name'=>'data[RfModule][sow_adjustments_reason_1]',
                                    'div'=>array('class'=>'formfields'),
                                    )
                                );
echo $ajax->div('sow_adjustments_reason_1_other_explain');
    echo $this->Form->input('RfModule.sow_adjustments_reason_1_explain',
                                array(
                                    //'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),
                                    'label'=>'Please Explain',
                                   // 'type'=>'select',
                                    'name'=>'data[RfModule][sow_adjustments_reason_1_explain]',
                                    'div'=>false,
                                   // 'legend'=>Project Deliverables
                                    )
                                );
echo $ajax->divEnd('sow_adjustments_reason_1_other_explain');
//    echo $ajax->observeField('RfModuleSowAdjustmentsReason1',
//                        array(
//                            "update"=>"sow_adjustments_reason_1_other_explain",
//                            'frequency'=>'1',
//                            "url"=>array(
//                                'controller'=>'rf_modules',
//                                'action'=>'updater'
//                                )
//                            )
//                        );
//    echo $ajax->div('sow_adjustments_reason_1_other_explain');
//    echo $ajax->divEnd('sow_adjustments_reason_1_other_explain');

    echo $this->Form->input('RfModule.sow_adjustments_reason_2',
                                array(
                                    'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),
                                    'label'=>'Reason for SOW adjustments 2nd time',
                                    'type'=>'select',
                                    'name'=>'data[RfModule][sow_adjustments_reason_2]',
                                    'div'=>array('class'=>'formfields'),
                                    )
                                );
    echo $ajax->div('sow_adjustments_reason_2_other_explain');
    echo $this->Form->input('RfModule.sow_adjustments_reason_2_explain',
                                array(
                                    'label'=>'Please Explain',
                                    'name'=>'data[RfModule][sow_adjustments_reason_2_explain]',
                                    'div'=>false,
                                    )
                                );
    echo $ajax->divEnd('sow_adjustments_reason_2_other_explain');
//    echo $ajax->observeField('RfModuleSowAdjustmentsReason2',
//                        array(
//                            "update"=>"sow_adjustments_reason_2_other_explain",
//                            'frequency'=>'1',
//                            "url"=>array(
//                                'controller'=>'rf_modules',
//                                'action'=>'updater'
//                                )
//                            )
//                        );
//    echo $ajax->div('sow_adjustments_reason_2_other_explain');
//    echo $ajax->divEnd('sow_adjustments_reason_2_other_explain');

    echo $this->Form->input('RfModule.sow_adjustments_reason_3',
                                array(
                                    'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),
                                    'label'=>'Reason for SOW adjustments 3rd time',
                                    'type'=>'select',
                                    'name'=>'data[RfModule][sow_adjustments_reason_3]',
                                    'div'=>array('class'=>'formfields'),
                                    )
                                );
    echo $ajax->div('sow_adjustments_reason_3_other_explain');
    echo $this->Form->input('RfModule.sow_adjustments_reason_3_explain',
                                array(
                                    'label'=>'Please Explain',
                                    'name'=>'data[RfModule][sow_adjustments_reason_3_explain]',
                                    'div'=>false,
                                    )
                                );
    echo $ajax->divEnd('sow_adjustments_reason_3_other_explain');
//    echo $ajax->observeField('RfModuleSowAdjustmentsReason3',
//                        array(
//                            "update"=>"sow_adjustments_reason_3_other_explain",
//                            'frequency'=>'1',
//                            "url"=>array(
//                                'controller'=>'rf_modules',
//                                'action'=>'updater'
//                                )
//                            )
//                        );
//    echo $ajax->div('sow_adjustments_reason_3_other_explain');
//    echo $ajax->divEnd('sow_adjustments_reason_3_other_explain');

//elseif($key == "sow_adjustments_reason_3" && $data[$key] == "Other"):
//    echo $this->Form->input('RfModule.sow_adjustments_reason_3_explain',
//                                array(
//                                    'label'=>'Please Explain',
//                                    'name'=>'data[RfModule][sow_adjustments_reason_3_explain]',
//                                    'div'=>false,
//                                    )
//                                );
//
elseif($key == "delivery_date_adjustment" && $data[$key] == 1):
    echo $this->Form->input('RfModule.delivery_date_adjustment_reason_1',
                                array(
                                    'options' => ($databaseFields->getOptions('late_reason', 3)),
                                    'label'=>'Reason for 1st change to planned date',
                                    'type'=>'select',
                                    'name'=>'data[RfModule][delivery_date_adjustment_reason_1]',
                                    'div'=>array('class'=>'formfields'),
                                   // 'legend'=>Project Deliverables
                                    )
                                );
//    echo $ajax->observeField('RfModuleDeliveryDateAdjustmentReason1',
//                        array(
//                            "update"=>"delivery_date_adjustment_reason_1_other_explain",
//                            'frequency'=>'1',
//                            "url"=>array(
//                                'controller'=>'rf_modules',
//                                'action'=>'updater'
//                                )
//                            )
//                        );

    echo $ajax->div('delivery_date_adjustment_reason_1_other_explain');
    echo $this->Form->input('RfModule.delivery_date_adjustment_reason_1_explain',
                                array(
                                    //'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),
                                    'label'=>'Please Explain',
                                   // 'type'=>'select',
                                    'name'=>'data[RfModule][delivery_date_adjustment_reason_1_explain]',
                                    'div'=>false,
                                   // 'legend'=>Project Deliverables
                                    )
                                );
    echo $ajax->divEnd('delivery_date_adjustment_reason_1_other_explain');

//elseif($key == "delivery_date_adjustment_reason_1" && $data[$key] == "Other"):
//    echo $this->Form->input('RfModule.delivery_date_adjustment_reason_1_explain',
//                                array(
//                                    //'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),
//                                    'label'=>'Please Explain',
//                                   // 'type'=>'select',
//                                    'name'=>'data[RfModule][delivery_date_adjustment_reason_1_explain]',
//                                    'div'=>false,
//                                   // 'legend'=>Project Deliverables
//                                    )
//                                );
//
elseif($key == "delivery_date_adjustment" && $data[$key] == 2):
    echo $this->Form->input('RfModule.delivery_date_adjustment_reason_1',
                                array(
                                    'options' => ($databaseFields->getOptions('late_reason', 3)),
                                    'label'=>'Reason for 1st change to planned date',
                                    'type'=>'select',
                                    'name'=>'data[RfModule][delivery_date_adjustment_reason_1]',
                                    'div'=>array('class'=>'formfields'),
                                   // 'legend'=>Project Deliverables
                                    )
                                );
//    echo $ajax->observeField('RfModuleDeliveryDateAdjustmentReason1',
//                        array(
//                            "update"=>"delivery_date_adjustment_reason_1_other_explain",
//                            'frequency'=>'1',
//                            "url"=>array(
//                                'controller'=>'rf_modules',
//                                'action'=>'updater'
//                                )
//                            )
//                        );

    echo $ajax->div('delivery_date_adjustment_reason_1_other_explain');
    echo $this->Form->input('RfModule.delivery_date_adjustment_reason_1_explain',
                                array(
                                    //'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),
                                    'label'=>'Please Explain',
                                   // 'type'=>'select',
                                    'name'=>'data[RfModule][delivery_date_adjustment_reason_1_explain]',
                                    'div'=>false,
                                   // 'legend'=>Project Deliverables
                                    )
                                );
    echo $ajax->divEnd('delivery_date_adjustment_reason_1_other_explain');

    echo $this->Form->input('RfModule.delivery_date_adjustment_reason_2',
                                array(
                                    'options' => ($databaseFields->getOptions('late_reason', 3)),
                                    'label'=>'Reason for 2nd change to planned date',
                                    'type'=>'select',
                                    'name'=>'data[RfModule][delivery_date_adjustment_reason_2]',
                                    'div'=>array('class'=>'formfields'),
                                   // 'legend'=>Project Deliverables
                                    )
                                );
//    echo $ajax->observeField('RfModuleDeliveryDateAdjustmentReason2',
//                        array(
//                            "update"=>"delivery_date_adjustment_reason_2_other_explain",
//                            'frequency'=>'1',
//                            "url"=>array(
//                                'controller'=>'rf_modules',
//                                'action'=>'updater'
//                                )
//                            )
//                        );
    echo $ajax->div('delivery_date_adjustment_reason_2_other_explain');
    echo $this->Form->input('RfModule.delivery_date_adjustment_reason_2_explain',
                                array(
                                    //'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),
                                    'label'=>'Please Explain',
                                   // 'type'=>'select',
                                    'name'=>'data[RfModule][delivery_date_adjustment_reason_2_explain]',
                                    'div'=>false,
                                   // 'legend'=>Project Deliverables
                                    )
                                );
    echo $ajax->divEnd('delivery_date_adjustment_reason_2_other_explain');

//elseif($key == "delivery_date_adjustment_reason_2" && $data[$key] == "Other"):
//    echo $this->Form->input('RfModule.delivery_date_adjustment_reason_2_explain',
//                                array(
//                                    //'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),
//                                    'label'=>'Please Explain',
//                                   // 'type'=>'select',
//                                    'name'=>'data[RfModule][delivery_date_adjustment_reason_2_explain]',
//                                    'div'=>false,
//                                   // 'legend'=>Project Deliverables
//                                    )
//                                );
//
elseif($key == "delivery_date_adjustment" && $data[$key] > 2):
    echo $this->Form->input('RfModule.delivery_date_adjustment_reason_1',
                                array(
                                    'options' => ($databaseFields->getOptions('late_reason', 3)),
                                    'label'=>'Reason for 1st change to planned date',
                                    'type'=>'select',
                                    'name'=>'data[RfModule][delivery_date_adjustment_reason_1]',
                                    'div'=>array('class'=>'formfields'),
                                   // 'legend'=>Project Deliverables
                                    )
                                );
//    echo $ajax->observeField('RfModuleDeliveryDateAdjustmentReason1',
//                        array(
//                            "update"=>"delivery_date_adjustment_reason_1_other_explain",
//                            'frequency'=>'1',
//                            "url"=>array(
//                                'controller'=>'rf_modules',
//                                'action'=>'updater'
//                                )
//                            )
//                        );

    echo $ajax->div('delivery_date_adjustment_reason_1_other_explain');
    echo $this->Form->input('RfModule.delivery_date_adjustment_reason_1_explain',
                                array(
                                    //'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),
                                    'label'=>'Please Explain',
                                   // 'type'=>'select',
                                    'name'=>'data[RfModule][delivery_date_adjustment_reason_1_explain]',
                                    'div'=>false,
                                   // 'legend'=>Project Deliverables
                                    )
                                );
    echo $ajax->divEnd('delivery_date_adjustment_reason_1_other_explain');

    echo $this->Form->input('RfModule.delivery_date_adjustment_reason_2',
                                array(
                                    'options' => ($databaseFields->getOptions('late_reason', 3)),
                                    'label'=>'Reason for 2nd change to planned date',
                                    'type'=>'select',
                                    'name'=>'data[RfModule][delivery_date_adjustment_reason_2]',
                                    'div'=>array('class'=>'formfields'),
                                   // 'legend'=>Project Deliverables
                                    )
                                );
//    echo $ajax->observeField('RfModuleDeliveryDateAdjustmentReason2',
//                        array(
//                            "update"=>"delivery_date_adjustment_reason_2_other_explain",
//                            'frequency'=>'1',
//                            "url"=>array(
//                                'controller'=>'rf_modules',
//                                'action'=>'updater'
//                                )
//                            )
//                        );
    echo $ajax->div('delivery_date_adjustment_reason_2_other_explain');
    echo $this->Form->input('RfModule.delivery_date_adjustment_reason_2_explain',
                                array(
                                    //'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),
                                    'label'=>'Please Explain',
                                   // 'type'=>'select',
                                    'name'=>'data[RfModule][delivery_date_adjustment_reason_2_explain]',
                                    'div'=>false,
                                   // 'legend'=>Project Deliverables
                                    )
                                );
    echo $ajax->divEnd('delivery_date_adjustment_reason_2_other_explain');

    echo $this->Form->input('RfModule.delivery_date_adjustment_reason_3',
                                array(
                                    'options' => ($databaseFields->getOptions('late_reason', 3)),
                                    'label'=>'Reason for 3rd change to planned date',
                                    'type'=>'select',
                                    'name'=>'data[RfModule][delivery_date_adjustment_reason_3]',
                                    'div'=>array('class'=>'formfields'),
                                   // 'legend'=>Project Deliverables
                                    )
                                );
//    echo $ajax->observeField('RfModuleDeliveryDateAdjustmentReason3',
//                        array(
//                            "update"=>"delivery_date_adjustment_reason_3_other_explain",
//                            'frequency'=>'1',
//                            "url"=>array(
//                                'controller'=>'rf_modules',
//                                'action'=>'updater'
//                                )
//                            )
//                        );
    echo $ajax->div('delivery_date_adjustment_reason_3_other_explain');
        echo $this->Form->input('RfModule.delivery_date_adjustment_reason_3_explain',
                                array(
                                    //'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),
                                    'label'=>'Please Explain',
                                   // 'type'=>'select',
                                    'name'=>'data[RfModule][delivery_date_adjustment_reason_3_explain]',
                                    'div'=>false,
                                   // 'legend'=>Project Deliverables
                                    )
                                );

    echo $ajax->divEnd('delivery_date_adjustment_reason_3_other_explain');

//elseif($key == "delivery_date_adjustment_reason_3" && $data[$key] == "Other"):
//    echo $this->Form->input('RfModule.delivery_date_adjustment_reason_3_explain',
//                                array(
//                                    //'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),
//                                    'label'=>'Please Explain',
//                                   // 'type'=>'select',
//                                    'name'=>'data[RfModule][delivery_date_adjustment_reason_3_explain]',
//                                    'div'=>false,
//                                   // 'legend'=>Project Deliverables
//                                    )
//                                );
//
elseif($key == "meet_proj_expectations" && $data[$key] == "No"):
    echo $this->Form->input('RfModule.meet_proj_expectations_reason',
                                array(
                                    'options' =>($databaseFields->getOptions('late_reason', 3)),
                                    'label'=>'Reason for not meeting SOW & Expectations',
                                    'name'=>'data[RfModule][meet_proj_expectations_reason]',
                                    'type'=>'select',
                                    'div'=>array('class'=>'formfields')
                                   // 'legend'=>Project Deliverables
                                    )
                                );
    echo $ajax->observeField('RfModuleMeetProjExpectationsReason',
                                    array(
                                        "update"=>"meet_proj_expectations_reason_explain_placeholder",
                                        'frequency'=>'1',
                                        "url"=>array(
                                            'controller'=>'rf_modules',
                                            'action'=>'updater')
                                            //'complete'=>'Element.show("delivery_date_adjustment_wrapper")')
                                     )
                            );
elseif($key == "meet_proj_expectations_reason" && $data[$key] == "Other"):
    echo $this->Form->input('RfModule.meet_proj_expectations_reason_explain',
                                    array(
                                       // 'options' =>'' ,
                                        'label'=>'Please explain',
                                        'name'=>'data[RfModule][meet_proj_expectations_reason_explain]',
                                        'type'=>'text',
                                  //  'div'=>array('class'=>'formfields')
                                   // 'legend'=>Project Deliverables
                                    )
                                );

elseif($key == "project_approved" && $data[$key] == "No"):
    echo $this->Form->input('RfModule.customer_accept_reason',
                                    array(
                                        'options' => array(''=>'','Prefer different solution'=>'Prefer different solution', 'To costly'=>'To costly', 'To timely'=>'To timely', 'Against standard'=>'Against standard', 'Wrong suggestions'=>'Wrong suggestions', 'Lacking justification'=>'Lacking justification', 'Other'=>'Other'),
                                        'label'=>'Reason for customer not accepting project',
                                        'type'=>'select',
                                        'name'=>'data[RfModule][customer_accept_reason]',
                                        'div'=>array('class'=>'formfields')
                                       // 'legend'=>Project Deliverables
                                        )
                                    );
                                    
    echo $ajax->observeField('RfModuleCustomerAcceptReason',
                                    array(
                                        "update"=>"project_approved_reason_explain_placeholder",
                                        'frequency'=>'1',
                                        "url"=>array(
                                            'controller'=>'rf_modules',
                                            'action'=>'updater')
                                            //'complete'=>'Element.show("delivery_date_adjustment_wrapper")')
                                     )
                            );

elseif($key == "customer_accept_reason" && $data[$key] == "Other"):
    echo $this->Form->input('RfModule.customer_accept_reason_explain',
                                array(
                                   // 'options' => ($databaseFields->getOptions('project_status', '3')),
                                    'label'=>'Please explain',
                                    'name'=>'data[RfModule][customer_accept_reason_explain]',
                                    'type'=>'text',
                                    //'div'=>array('class'=>'formfields')
                                   // 'legend'=>Project Deliverables
                                    )
                                );


elseif($key == "project_name"):
    $actual_date = strtotime($data['actual_delivery_date']['month']."-".$data['actual_delivery_date']['day']."-".$data['actual_delivery_date']['year']);
//    var_dump($actual_date);
    $planned_date = strtotime($data['approved_delivery_date']['month']."-".$data['approved_delivery_date']['day']."-".$data['approved_delivery_date']['year']);
//    var_dump($actual_date);
    
    if($actual_date > $planned_date):
        echo $this->Form->input('RfModule.actual_delivery_date_reason',
                                array(
                                   'options' => ($databaseFields->getOptions('late_reason', '3')),
                                    'label'=>'Reason for late delivery',
                                    'name'=>'data[RfModule][actual_delivery_date_reason]',
                                    'type'=>'select',
                                    //'div'=>array('class'=>'formfields')
                                   // 'legend'=>Project Deliverables
                                    )
                                );
    echo $ajax->observeField('RfModuleActualDeliveryDateReason',
                                array(
                                    "update"=>"actual_delivery_date_explain_placeholder",
                                    'frequency'=>'1',
                                    "url"=>array(
                                        'controller'=>'rf_modules',
                                        'action'=>'updater')
                                    
                                 )
                        );
    endif;
elseif($key == "actual_delivery_date_reason" && $data[$key] == "Other"):

    echo $this->Form->input('RfModule.actual_delivery_date_reason_explain',
                                array(
                                   // 'options' => ($databaseFields->getOptions('project_status', '3')),
                                    'label'=>'Please explain',
                                    'name'=>'data[RfModule][actual_delivery_date_reason_explain]',
                                    'type'=>'text',
                                   
                                    )
                                );
endif;
}
?>
