<?php if(!empty($RfReport['RfModule']['id'])): ?>
<ul><li><?php echo $this->Html->link(__('Back', true), array('action' => 'view', $RfReport['RfModule']['id'])); ?> </li></ul>
<?php endif; ?>

<?php if($hasId): ?>
    <div class="RfModules form">
    <?php
        echo $this->Form->create(null, array('action' => 'edit'));
        echo $form->input('editId', array("label" => "Enter the ID:"));
        echo $this->Form->end(__('Submit', true));
    ?>
    </div>
<?php else:
$signum = Authsome::get('username');
echo $this->Form->create('RfModule', array("class"=>"form"));

echo $this->Form->input('id');
echo $this->Form->input('date_created',
                                array(
                                    //'options' => '',
                                    'label'=>'Date',
                                    'type'=>'date',
                                    'div'=>array('style'=>'display:none'),

                                   // 'legend'=>'Project Description'
                                    )
                                );

echo "<fieldset><legend>Project Definition</legend><fieldset><legend>Project Description</legend>";
echo $this->Form->input('project_name',
                                array(
                                    //'options' => '',
                                    'label'=>'Project Name',
                                    'type'=>'text',
                                    'div'=>array('class'=>'formfields'),

                                   // 'legend'=>'Project Description'
                                    )
                                );
echo $this->Form->input('customer_unit',
                                array(
                                    'options' => ($databaseFields->getOptions('customer_unit', '3')),
                                    'label'=>'Customer Unit',
                                    'type'=>'select',
                                    'div'=>array('class'=>'formfields')
                                  //  'legend'=>'Project Descripion'
                                    )
                                );
echo $this->Form->input('region',
                                array(
                                    'options' => ($databaseFields->getOptions('region', '3')),
                                    'label'=>'Region',
                                    'type'=>'select',
                                    'div'=>array('class'=>'formfields')
                                   // 'legend'=>'Project Description'
                                    )
                                );
echo $this->Form->input('state',
                                array(
                                    'div'=>array('class'=>'formfields'),
                                    'after' => $helpBox->display('state'),
                                    'label' => 'State/Province',
                                    )
                                );
echo $this->Form->input('technology',
                                array(
                                    'options' => ($databaseFields->getOptions('technology', '3')),
                                    'label'=>'Technology',
                                    'type'=>'select',
                                    'div'=>array('class'=>'formfields')
                                    //'legend'=>'Project Description'
                                    )
                                );
echo $this->Form->input('project_type',
                                array(
                                    'options' => ($databaseFields->getOptions('project_type', '3')),
                                    'label'=>'Project Type',
                                    'type'=>'select',
                                    'div'=>array('class'=>'formfields')
                                    //'legend'=>Project Description
                                    )
                                );
echo $this->Form->input('market',
                                array(
                                    //'options' => '',
                                    'label'=>'Market',
                                    'type'=>'text',
                                    'div'=>array('class'=>'formfields')
                                   // 'legend'=>'Project Descrption'
                                    )
                                );
echo "</fieldset><fieldset><legend>Project (sub) Details</legend>";
echo $this->Form->input('market_lead',
                                array(
                                   // 'options' => '',
                                    'label'=>'Market Lead',
                                    'type'=>'text',
                                    'div'=>array('class'=>'formfields')
                                   // 'legend'=>'Project Description'
                                    )
                                );
echo $this->Form->input('project_manager',
                                array(
                                  //  'options' =>'' ,
                                    'label'=>'Project Manager',
                                    'type'=>'text',
                                    'div'=>array('class'=>'formfields')
                                    //'legend'=>'Project Description
                                    )
                                );
echo $this->Form->input('work_location',
                                array(
                                    'options' => ($databaseFields->getOptions('work_location', '3')),
                                    'label'=>'Work location',
                                    'type'=>'select',
                                    'div'=>array('class'=>'formfields')
                                   // 'legend'=>Project Description
                                    )
                                );
echo $this->Form->input('person_completing',
                                array(
                                   // 'options' =>'' ,
                                    'label'=>'Engineer Signum',
                                    'type'=>'text',
                                    'div'=>array('class'=>'formfields'

                                        ),
                                    'value'=> $signum,
                                    'readonly'=> 'readonly',
                                    //'legend'=>Project Description
                                    )
                                );
echo $this->Form->input('sub_project_name',
                                array(
                                   // 'options' =>'' ,
                                    'label'=>'Sub Project Name',
                                    'type'=>'text',
                                    'div'=>array('class'=>'formfields')
                                  //  'legend'=>Project Description
                                    )
                                );
echo $this->Form->input('number_of_sites',array('after' => $helpBox->display('number_of_sites')));

echo $this->Form->input('sub_project_status',
                                array(
                                    'options' => array(
                                        ''=>'',
                                        'Open'=>'Open',
                                        'Closed'=>'Closed',
                                        'Cancelled'=>'Cancelled'),
                                    'label'=>'Sub Project Status',
                                    'type'=>'select',
                                    'div'=>array('class'=>'formfields')
                                  //  'legend'=>Project Description
                                    )
                                );
    echo "<fieldset>";
    echo "<legend>Other Involved Engineers</legend><div id='additional_engineers'>";

    echo $this->Form->input('RfAdditionalEngineer.0.engineer_signum', array('label' => 'Additional Engineer', 'div'=>array('class'=>'formfields')));

    echo "</div>";
    echo $this->Ajax->link("+", array(
                                    'controller' => 'rf_modules',
                                    'action' => 'updater'
                                    ),
                                array(
                                        "update" => "additional_engineers",
                                        "position" => "bottom")
                            );

    echo "</fieldset>";

echo "</fieldset></fieldset><fieldset><legend>Project Inputs</legend><fieldset><legend>Input Verification</legend>";

echo $this->Form->input('checklist_accurate',
                                array(
                                    'options' => ($databaseFields->getOptions('yes_no', '3')),
                                    'label'=>'Are the project inputs/checklists available and accurate?',
                                    'type'=>'select',
                                    'div'=>array('class'=>'formfields')
                                    //'legend'=>Project Inputs
                                    )
                               );

echo $ajax->div('checklist_accurate_reason_placeholder', array('class'=>'formfields'));
//var_dump($RfReport['RfModule']['checklist_accurate']);
if($RfReport['RfModule']['checklist_accurate'] ==  'No'):
    echo $this->Form->input('checklist_accurate_reason',
                        array(
                                        'options'=> array(''=>'', 'Available, but received late'=>'Available, but received late', 'Not available'=>'Not available', 'Not sure who to ask'=>'Not sure who to ask', 'Cluster not 90% ready'=>'Cluster not 90% ready', 'Other'=>'Other'),
                                        'label'=>'Reason',
                                        'type'=>'select',
                                        ));
    echo $ajax->observeField('RfModuleChecklistAccurateReason',
                                array(
                                    "update"=>"checklist_accurate_reason_explain_placeholder",
                                    "url"=>array(
                                        'controller'=>'rf_modules',
                                        'action'=>'updater')
                                    )
                        );
endif;

echo $ajax->divEnd('checklist_accurate_reason_placeholder');
echo $ajax->observeField('RfModuleChecklistAccurate',
                                array(
                                    "update"=>"checklist_accurate_reason_placeholder",
                                    "url"=>array(
                                        'controller'=>'rf_modules',
                                        'action'=>'updater')
                                    )
                        );

echo $ajax->div('checklist_accurate_reason_explain_placeholder');
if(!empty($RfReport['RfModule']['checklist_accurate_reason'])){
if($RfReport['RfModule']['checklist_accurate_reason'] == "Other"):
    echo $this->Form->input('checklist_accurate_reason_explain',
                                    array(
                                        //'options'=> array(''=>'', 'Available, but received late'=>'Available, but received late', 'Not available'=>'Not available', 'Not sure who to ask'=>'Not sure who to ask', 'Cluster not 90% ready'=>'Cluster not 90% ready'),
                                        'label'=>'Please Explain',
                                        //'type'=>'textarea',
                                        'name'=>'data[RfModule][checklist_accurate_reason_explain]',
                                        'div'=>false,
                                        //'legend'=>Project Inputs
                                        )
                                    );
endif;}
echo $ajax->divEnd('checklist_accurate_reason_explain_placeholder');


echo $this->Form->input('sow_available',
                                array(
                                    'options' => ($databaseFields->getOptions('yes_no', '3')),
                                    'label'=>'Is the SOW available and correct?',
                                    'type'=>'select',
                                    'div'=>array('class'=>'formfields')
                                   // 'legend'=>Project Inputs
                                    )
                                );

echo $ajax->div('sow_available_reason_placeholder', array('class'=>'formfields'));
if($RfReport['RfModule']['sow_available'] ==  'No'):
    echo $this->Form->input("sow_available_reason",
                                    array(
                                        'options'=> ($databaseFields->getOptions('reason', 3)),
                                        'label'=>'Reason',
                                        'type'=>'select',
                                        'name'=>'data[RfModule][sow_available_reason]',
                                        'div'=>false,
                                        //'legend'=>Project Inputs
                                        )
                                    );
    echo $ajax->observeField('RfModuleSowAvailableReason',
                                array(
                                    "update"=>"sow_available_reason_explain_placeholder",
                                    "url"=>array(
                                        'controller'=>'rf_modules',
                                        'action'=>'updater')
                                    )
                        );
    endif;

echo $ajax->divEnd('sow_available_reason_placeholder');
echo $ajax->observeField('RfModuleSowAvailable',
                                array(
                                    "update"=>"sow_available_reason_placeholder",
                                    "url"=>array(
                                        'controller'=>'rf_modules',
                                        'action'=>'updater')
                                    )
                        );

echo $ajax->div('sow_available_reason_explain_placeholder');
if(!empty($RfReport['RfModule']['sow_available_reason'])){
    if($RfReport['RfModule']['sow_available_reason'] ==  'Other'):
        echo $this->Form->input('sow_available_reason_explain',
                                    array(
                                        //'options'=> array(''=>'', 'Available, but received late'=>'Available, but received late', 'Not available'=>'Not available', 'Not sure who to ask'=>'Not sure who to ask', 'Cluster not 90% ready'=>'Cluster not 90% ready'),
                                        'label'=>'Please Explain',
                                        //'type'=>'textarea',
                                        'name'=>'data[RfModule][sow_available_reason_explain]',
                                        'div'=>false,
                                        //'legend'=>Project Inputs
                                        )
                                    );
    endif;
}

echo $ajax->divEnd('sow_available_reason_explain_placeholder');


echo $this->Form->input('nw_available',
                                array(
                                    'options' => ($databaseFields->getOptions('yes_no', '3')),
                                    'label'=>'Was the NW Number available at project start?',
                                    'type'=>'select',
                                    'div'=>array('class'=>'formfields')
                                   // 'legend'=>Project Inputs
                                    )
                                );
echo $ajax->div('nw_available_reason_placeholder', array('class'=>'formfields'));
    if($RfReport['RfModule']['nw_available'] ==  'No'):
        echo $this->Form->input("nw_available_reason",
                                    array(
                                        'options'=> ($databaseFields->getOptions('reason', 3)),
                                        'label'=>'Reason',
                                        'type'=>'select',
                                        'name'=>'data[RfModule][nw_available_reason]',
                                        'div'=>false,
                                        //'legend'=>Project Inputs
                                        )
                                    );
    echo $ajax->observeField('RfModuleNwAvailableReason',
                                array(
                                    "update"=>"nw_available_reason_explain_placeholder",
                                    "url"=>array(
                                        'controller'=>'rf_modules',
                                        'action'=>'updater')
                                    )
                        );
    endif;
echo $ajax->divEnd('nw_available_reason_placeholder');
echo $ajax->observeField('RfModuleNwAvailable',
                                array(
                                    "update"=>"nw_available_reason_placeholder",
                                    "url"=>array(
                                        'controller'=>'rf_modules',
                                        'action'=>'updater')
                                    )
                        );

echo $ajax->div('nw_available_reason_explain_placeholder');
if(!empty($RfReport['RfModule']['nw_available_reason'])){
    if($RfReport['RfModule']['nw_available_reason'] ==  'Other'):
        echo $this->Form->input('nw_available_reason_explain',
                                    array(
                                        //'options'=> array(''=>'', 'Available, but received late'=>'Available, but received late', 'Not available'=>'Not available', 'Not sure who to ask'=>'Not sure who to ask', 'Cluster not 90% ready'=>'Cluster not 90% ready'),
                                        'label'=>'Please Explain',
                                        //'type'=>'textarea',
                                        'name'=>'data[RfModule][nw_available_reason_explain]',
                                        'div'=>false,
                                        //'legend'=>Project Inputs
                                        )
                                    );
    endif;
}
echo $ajax->divEnd('nw_available_reason_explain_placeholder');


echo $this->Form->input('project_budget_access',
                                array(
                                    'options' =>($databaseFields->getOptions('yes_no', '3')) ,
                                    'label'=>'Do you have access to the project budget (TPR)?',
                                    'type'=> 'select',
                                    'div'=>array('class'=>'formfields')
                                  //  'legend'=>Project Inputs
                                    )
                                );
echo $ajax->div('project_budget_access_reason_placeholder', array('class'=>'formfields'));
     if($RfReport['RfModule']['project_budget_access'] ==  'No'):
         echo $this->Form->input("Rproject_budget_access_reason",
                                    array(
                                        'options'=> ($databaseFields->getOptions('reason', 3)),
                                        'label'=>'Reason',
                                        'type'=>'select',
                                        'name'=>'data[RfModule][project_budget_access_reason]',
                                        'div'=>false,
                                        //'legend'=>Project Inputs
                                        )
                                    );
    echo $ajax->observeField('RfModuleProjectBudgetAccessReason',
                                array(
                                    "update"=>"project_budget_access_reason_explain_placeholder",
                                    "url"=>array(
                                        'controller'=>'rf_modules',
                                        'action'=>'updater')
                                    )
                        );
    endif;
echo $ajax->divEnd('project_budget_access_reason_placeholder');
echo $ajax->observeField('RfModuleProjectBudgetAccess',
                                array(
                                    "update"=>"project_budget_access_reason_placeholder",
                                    "url"=>array(
                                        'controller'=>'rf_modules',
                                        'action'=>'updater')
                                    )
                        );

echo $ajax->div('project_budget_access_reason_explain_placeholder');
if(!empty($RfReport['RfModule']['project_budget_access_reason'])){
    if($RfReport['RfModule']['project_budget_access_reason'] ==  'Other'):
        echo $this->Form->input('project_budget_access_reason_explain',
                                    array(
                                        //'options'=> array(''=>'', 'Available, but received late'=>'Available, but received late', 'Not available'=>'Not available', 'Not sure who to ask'=>'Not sure who to ask', 'Cluster not 90% ready'=>'Cluster not 90% ready'),
                                        'label'=>'Please Explain',
                                        //'type'=>'textarea',
                                        'name'=>'data[RfModule][project_budget_access_reason_explain]',
                                        'div'=>false,
                                        //'legend'=>Project Inputs
                                        )
                                    );
    endif;}
        
echo $ajax->divEnd('project_budget_access_reason_explain_placeholder');


echo $this->Form->input('engineers_qualified',
                                array(
                                    'options' => ($databaseFields->getOptions('yes_no', '3')),
                                    'label'=>'Are > 90% of the engineers qualified for the job?',
                                    'type'=>'select',
                                    'div'=>array('class'=>'formfields')
                                 //  'legend'=>Project Inputs
                                    )
                                );
echo $ajax->div('engineers_qualified_number_placeholder', array('class'=>'formfields'));
    if($RfReport['RfModule']['engineers_qualified'] ==  'No'):
        echo $this->Form->input('engineers_qualified_number',
                                    array(
                                        'options'=> ($databaseFields->getOptions('engineers_qualified', 3)),
                                        'label'=>'How many are qualified?',
                                        'type'=>'select',
                                        'name'=>'data[RfModule][engineers_qualified_number]',
                                        'div'=>false,
                                        //'legend'=>Project Inputs
                                        )
                                    );
    endif;
        
echo $ajax->divEnd('engineers_qualified_number_placeholder');
echo $ajax->observeField('RfModuleEngineersQualified',
                            array(
                                "update"=>"engineers_qualified_number_placeholder",
                                "url"=>array(
                                    'controller'=>'rf_modules',
                                    'action'=>'updater')
                                )
                        );


echo "</fieldset><fieldset><legend>Project Milestone/Dates</legend>";
echo $this->Form->input('project_start_date',
                                array(
                                   // 'options' =>'' ,
                                    'label'=>'Project Start Date',
                                    'type'=>'date',
                                    'div'=>array('class'=>'formfields formdates')
                                    //'legend'=>Project Inputs
                                    )
                                );
echo $this->Form->input('delivery_date',
                                array(
                                   // 'options' =>'' ,
                                    'label'=>'Initial Planned Delivery Date (based on SOW)',
                                    'type'=>'date',
                                    'div'=>array('class'=>'formfields formdates')
                                    //'legend'=>Project Inputs
                                    )
                                );

echo "</fieldset></fieldset>";
echo "<fieldset><legend>Project Deliverables</legend>";
echo "<fieldset><legend>Recommendations & Implementations</legend>";

echo $this->Form->input('num_change_recom',
                                array(
                                  //  'options' => '',
                                    'label'=>'Number of change recommendations (0=none)',
                                    'type'=>'text',
                                    'div'=>array('class'=>'formfields')
                                   // 'legend'=>Project Deliverables
                                    )
                                );

echo $ajax->div('num_reject_recom_placeholder', array('class'=>'formfields'));

echo $ajax->divEnd('num_reject_recom_placeholder');


echo $this->Form->input('num_reject_recom',
                                array(
                                  //  'options' =>'' ,
                                    'label'=>'No. of recommendations rejected from final/close-out report',
                                    'type'=>'text',
                                    'div'=>array('class'=>'formfields')
                                   // 'legend'=>Project Deliverables
                                    )
                                );

echo $ajax->div('num_reject_recom_placeholder', array('class'=>'formfields'));
    
echo $ajax->divEnd('num_reject_recom_placeholder');

echo $ajax->observeField('RfModuleNumRejectRecom',
                                array(
                                    "update"=>"rejection_responsible_placeholder",
                                    'frequency'=>'1',
                                    "url"=>array(
                                        'controller'=>'rf_modules',
                                        'action'=>'updater'),
                                        'complete'=>'Element.show("rejection_responsible_wrapper_placeholder")')
                        );

    if($RfReport['RfModule']['num_reject_recom'] >  0):
    echo $ajax->div('rejection_responsible_wrapper_placeholder');
    echo $ajax->div('rejection_responsible_placeholder');
    echo $this->Form->input('rejection_responsible',
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
    else:
        echo $ajax->div('rejection_responsible_wrapper_placeholder', array( 'style'=>'display:none'));

        echo $ajax->div('rejection_responsible_placeholder', array('class'=>'formfields'));

    endif;


echo $ajax->divEnd('rejection_responsible_placeholder');


echo $ajax->div('rejection_responsible_reason_placeholder', array('class'=>'formfields'));
    if($RfReport['RfModule']['rejection_responsible'] <>  null):
        echo $this->Form->input('rejection_responsible_reason',
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
    endif;
echo $ajax->divEnd('rejection_responsible_reason_placeholder');

echo $ajax->div('rejection_responsible_reason_explain_placeholder');
    if($RfReport['RfModule']['rejection_responsible_reason'] ==  'Other'):
        echo $this->Form->input('rejection_responsible_reason_explain',
                                array(
                                   // 'options' => ($databaseFields->getOptions('rejection_responsible', '3')),
                                    'label'=>'Please Explain',
                                   // 'type'=>'text',
                                    'name'=>'data[RfModule][rejection_responsible_reason_explain]',
                                    'div'=>false,
                                   // 'legend'=>Project Deliverables
                                    )
                                );
    endif;
echo $ajax->divEnd('rejection_responsible_reason_explain_placeholder');
echo $ajax->divEnd('rejection_responsible_wrapper_placeholder');
//



echo $this->Form->input('num_implemented_changes',
                                array(
                                   // 'options' =>'' ,
                                    'label'=>'Total of number of accepted changes not implemented',
                                    'type'=>'text',
                                    'div'=>array('class'=>'formfields')
                                   // 'legend'=>Project Deliverables
                                    )
                                );

echo $ajax->div('num_implemented_changes_reason_placeholder', array('class'=>'formfields'));
    if($RfReport['RfModule']['num_implemented_changes'] >  0):
        echo $this->Form->input('num_implemented_changes_reason',
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
    endif;
        
echo $ajax->divEnd('num_implemented_changes_reason_placeholder');

echo $ajax->observeField('RfModuleNumImplementedChanges',
                                array(
                                    "update"=>"num_implemented_changes_reason_placeholder",
                                    'frequency'=>'1',
                                    "url"=>array(
                                        'controller'=>'rf_modules',
                                        'action'=>'updater')
                                        //'complete'=>'Element.show("rejection_responsible_wrapper_placeholder")'
                                 )
                        );

echo $ajax->div('num_implemented_changes_reason_explain_placeholder');
if(!empty($RfReport['RfModule']['num_implemented_changes_reason'])){
   if($RfReport['RfModule']['num_implemented_changes_reason'] ==  'Other'):
    echo $this->Form->input('num_implemented_changes_reason_explain',
                                array(
                                   // 'options' => ($databaseFields->getOptions('fail_reason', '3')),
                                    'label'=>'Please Explain',
                                  //  'type'=>'select',
                                    'name'=>'data[RfModule][num_implemented_changes_reason_explain]',
                                    'div'=>false,
                                   // 'legend'=>Project Deliverables
                                    )
                                );
endif;}
echo $ajax->divEnd('num_implemented_changes_reason_explain_placeholder');


echo "</fieldset>";
echo "<fieldset><legend>SOW/Delivery Date adjustments & Tracking</legend>";

echo $this->Form->input('num_sow_adjustments',
                                array(
                                   // 'options' => '',
                                    'label'=>'Total number of SOW adjustments (0=none)',
                                    'type'=>'text',
                                    'div'=>array('class'=>'formfields')
                                  //  'legend'=>Project Deliverables
                                    )
                                );
echo $ajax->div('num_sow_adjustments', array('class'=>'formfields'));
echo $ajax->divEnd('num_sow_adjustments');

echo $ajax->div('num_sow_adjustments_wrapper');

if ($RfReport['RfModule']['num_sow_adjustments'] > 0):
    if (!empty($RfReport['RfModule']['delivery_date_adjustment_reason_1'])) {
        echo $this->Form->input('RfModule.delivery_date_adjustment_reason_1',
                array(
                    'options' => ($databaseFields->getOptions('late_reason', 3)),
                    'label' => 'Reason for 1st change to planned date',
                    'type' => 'select',
                    'name' => 'data[RfModule][delivery_date_adjustment_reason_1]',
                    'div' => array('class' => 'formfields'),
                // 'legend'=>Project Deliverables
                )
        );
        echo $ajax->observeField('RfModuleDeliveryDateAdjustmentReason1',
                array(
                    "update" => "delivery_date_adjustment_reason_1_other_explain",
                    'frequency' => '1',
                    "url" => array(
                        'controller' => 'rf_modules',
                        'action' => 'updater'
                    )
                )
        );
    }
endif;

    echo $ajax->div('delivery_date_adjustment_reason_1_other_explain');

        if(!empty($RfReport['RfModule']['delivery_date_adjustment_reason_1'])){
            if ($RfReport['RfModule']['delivery_date_adjustment_reason_1'] == "Other" && $RfReport['RfModule']['num_sow_adjustments'] > 0 ):
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
            endif;
        }
    echo $ajax->divEnd('delivery_date_adjustment_reason_1_other_explain');

    if(!empty($RfReport['RfModule']['delivery_date_adjustment_reason_2'])){
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
    echo $ajax->observeField('RfModuleDeliveryDateAdjustmentReason2',
                        array(
                            "update"=>"delivery_date_adjustment_reason_2_other_explain",
                            'frequency'=>'1',
                            "url"=>array(
                                'controller'=>'rf_modules',
                                'action'=>'updater'
                                )
                            )
                        );
    echo $ajax->div('delivery_date_adjustment_reason_2_other_explain');
        if(!empty($RfReport['RfModule']['delivery_date_adjustment_reason_2_explain'])){
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
        }
    echo $ajax->divEnd('delivery_date_adjustment_reason_2_other_explain');


    }

    if(!empty($RfReport['RfModule']['delivery_date_adjustment_reason_3'])){
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
    echo $ajax->observeField('RfModuleDeliveryDateAdjustmentReason3',
                        array(
                            "update"=>"delivery_date_adjustment_reason_3_other_explain",
                            'frequency'=>'1',
                            "url"=>array(
                                'controller'=>'rf_modules',
                                'action'=>'updater'
                                )
                            )
                        );
    echo $ajax->div('delivery_date_adjustment_reason_3_other_explain');
        if(!empty($RfReport['RfModule']['delivery_date_adjustment_reason_3_explain'])){
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
        }
    echo $ajax->divEnd('delivery_date_adjustment_reason_3_other_explain');
    }

echo $ajax->divEnd('num_sow_adjustments_wrapper');

echo $ajax->observeField('RfModuleNumSowAdjustments',
                                array(
                                    "update"=>"num_sow_adjustments_wrapper",
                                    'frequency'=>'1',
                                    "url"=>array(
                                        'controller'=>'rf_modules',
                                        'action'=>'updater',
                                        'complete'=>'Element.show("num_sow_adjustments_wrapper")')
                                 )
                        );


echo $this->Form->input('approved_delivery_date',
                                array(
                                    //'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),
                                    'label'=>'Project Approved Delivery Date',
                                    'type'=>'date',
                                    'div'=>array('class'=>'formfields formdates')
                                  //  'legend'=>Project Deliverables
                                    )
                                );
echo $ajax->div('approved_delivery_date_placeholder', array('class'=>'formfields'));
echo $ajax->divEnd('approved_delivery_date_placeholder');


echo $this->Form->input('delivery_date_adjustment',
                                array(
                                  //  'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),
                                    'label'=>'Total number of Delivery Date adjustments (0=none)',
                                    'type'=>'text',
                                    'div'=>array('class'=>'formfields')
                                  //  'legend'=>Project Deliverables
                                    )
                                );


echo $ajax->div('delivery_date_adjustment_placeholder', array('class'=>'formfields'));
echo $ajax->divEnd('delivery_date_adjustment_placeholder');

echo $ajax->div('delivery_date_adjustment_wrapper');
echo $ajax->divEnd('delivery_date_adjustment_wrapper');

echo $ajax->observeField('RfModuleDeliveryDateAdjustment',
                                array(
                                    "update"=>"delivery_date_adjustment_wrapper",
                                    'frequency'=>'1',
                                    "url"=>array(
                                        'controller'=>'rf_modules',
                                        'action'=>'updater')
                                        //'complete'=>'Element.show("delivery_date_adjustment_wrapper")')
                                 )
                        );

echo $this->Form->input('actual_delivery_date',
                                array(
                                   // 'options' => '',
                                    'label'=>'Actual delivery date',
                                    'type'=>'date',
                                    'div'=>array('class'=>'formfields formdates')
                                  //  'legend'=>Project Deliverables
                                    )
                                );

echo $ajax->observeField('RfModuleActualDeliveryDateDay',
                                array(
                                    "update"=>"actual_delivery_date_reason_placeholder",
                                    'frequency'=>'1',
                                    "url"=>array(
                                        'controller'=>'rf_modules',
                                        'action'=>'updater'),
                                    'with'=> 'Form.serialize($("RfModuleAddForm"))'
                                        //'complete'=>'Element.show("delivery_date_adjustment_wrapper")')
                                 )
                        );

echo $ajax->observeField('RfModuleActualDeliveryDateMonth',
                                array(
                                    "update"=>"actual_delivery_date_reason_placeholder",
                                    'frequency'=>'1',
                                    "url"=>array(
                                        'controller'=>'rf_modules',
                                        'action'=>'updater'),
                                    'with'=> 'Form.serialize($("RfModuleAddForm"))'
                                        //'complete'=>'Element.show("delivery_date_adjustment_wrapper")')
                                 )
                        );

echo $ajax->observeField('RfModuleActualDeliveryDateYear',
                                array(
                                    "update"=>"actual_delivery_date_reason_placeholder",
                                    'frequency'=>'1',
                                    "url"=>array(
                                        'controller'=>'rf_modules',
                                        'action'=>'updater'),
                                    'with'=> 'Form.serialize($("RfModuleAddForm"))'
                                        //'complete'=>'Element.show("delivery_date_adjustment_wrapper")')
                                 )
                        );

echo $ajax->div('actual_delivery_date_reason_placeholder', array('class'=>'formfields'));
echo $ajax->divEnd('actual_delivery_date_reason_placeholder');

echo $ajax->div('actual_delivery_date_explain_placeholder');
echo $ajax->divEnd('actual_delivery_date_explain_placeholder');
//echo $this->Form->input('late_delivery_reason',
//                                array(
//                                    'options' =>($databaseFields->getOptions('late_reason', 3)),
//                                    'label'=>'Reason for late delivery (if applicable)',
//                                    'type'=>'select',
//                                    'div'=>array('class'=>'formfields')
//                                   // 'legend'=>Project Deliverables
//                                    )
//                                );
//echo $this->Form->input('late_delivery_reason_explain',
//                                array(
//                                   // 'options' =>'' ,
//                                    'label'=>'Please explain',
//                                    'type'=>'text',
//                                    'div'=>array('class'=>'formfields')
//                                   // 'legend'=>Project Deliverables
//                                    )
//                                );
echo "</fieldset>";
echo "<fieldset><legend>Delivery Review</legend>";
echo $this->Form->input('meet_proj_expectations',
                                array(
                                    'options' => ($databaseFields->getOptions('yes_no', '3')),
                                    'label'=>'Did we meet the project SOW & expectations?',
                                    'type'=>'select',
                                    'div'=>array('class'=>'formfields')
                                   // 'legend'=>Project Deliverables
                                    )
                                );
echo $ajax->div('meet_proj_expectations_reason_placeholder', array('class'=>'formfields'));
echo $ajax->divEnd('meet_proj_expectations_reason_placeholder');

echo $ajax->observeField('RfModuleMeetProjExpectations',
                                array(
                                    "update"=>"meet_proj_expectations_reason_placeholder",
                                    'frequency'=>'1',
                                    "url"=>array(
                                        'controller'=>'rf_modules',
                                        'action'=>'updater')
                                        //'complete'=>'Element.show("delivery_date_adjustment_wrapper")')
                                 )
                        );

echo $ajax->div('meet_proj_expectations_reason_explain_placeholder');
echo $ajax->divEnd('meet_proj_expectations_reason_explain_placeholder');


echo $this->Form->input('project_approved',
                                array(
                                    'options' => ($databaseFields->getOptions('yes_no', '3')),
                                    'label'=>'Was the project approved by the customer when formally presented (on time)?',
                                    'type'=>'select',
                                    'div'=>array('class'=>'formfields')
                                   // 'legend'=>Project Deliverables
                                    )
                                );

echo $ajax->div('project_approved_reason_placeholder', array('class'=>'formfields'));
echo $ajax->divEnd('project_approved_reason_placeholder');

echo $ajax->observeField('RfModuleProjectApproved',
                                array(
                                    "update"=>"project_approved_reason_placeholder",
                                    'frequency'=>'1',
                                    "url"=>array(
                                        'controller'=>'rf_modules',
                                        'action'=>'updater')
                                        //'complete'=>'Element.show("delivery_date_adjustment_wrapper")')
                                 )
                        );

echo $ajax->div('project_approved_reason_explain_placeholder');
echo $ajax->divEnd('project_approved_reason_explain_placeholder');

    echo $this->Form->input('overall_quality_rating',
                                array(
                                    'options' => ($databaseFields->getOptions('overall_quality_rating', '3')),
                                    'after' => $helpBox->display('overall_quality_rating'),
                                    )
                                );


echo "</fieldset></fieldset>";
echo $this->Form->end(__('Submit', true));?>

<?php endif; ?>
