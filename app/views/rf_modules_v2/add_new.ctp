<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
echo $javascript->link("jquery");
echo $javascript->link("vtip-min");
echo $javascript->link("helpbox");
echo $javascript->link("rnc/rf");
echo $html->css('rnc/rf');
$indicator = '<span id="autoindicator" style="display: none">' . $this->Html->image("spinner.gif", array("alt"=>"Working...")) . '</span>';
?>

<li><?php echo $this->Html->link(__('Back', true), array('action' => 'index')); ?> </li>


<?php
$signum = Authsome::get('username');
echo $this->Form->create('RfModule', array("class"=>"form"));

echo $this->Form->input('date_created',
                                array(
                                    //'options' => '',
                                    'label'=>'Date',
                                    'type'=>'date',
                                    'div'=>array('style'=>'display:none'),
                                    'after' => $helpBox->display('date_created'),
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
                                    'after' => $helpBox->display('project_name'),
                                   // 'legend'=>'Project Description'
                                    )
                                );
echo $this->Form->input('customer_unit',
                                array(
                                    'options' => ($databaseFields->getOptions('customer_unit', '3')),
                                    'label'=>'Customer Unit',
                                    'type'=>'select',
                                    'div'=>array('class'=>'formfields'),
                                    'after' => $helpBox->display('customer_unit'),
                                  //  'legend'=>'Project Descripion'
                                    )
                                );
echo $this->Form->input('region',
                                array(
                                    'options' => ($databaseFields->getOptions('region', '3')),
                                    'label'=>'Region',
                                    'type'=>'select',
                                    'div'=>array('class'=>'formfields'),
                                    'after' => $helpBox->display('region'),
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
                                    'div'=>array('class'=>'formfields'),
                                    'after' => $helpBox->display('technology'),
                                    //'legend'=>'Project Description'
                                    )
                                );
echo $this->Form->input('project_type',
                                array(
                                    'options' => ($databaseFields->getOptions('project_type', '3')),
                                    'label'=>'Project Type',
                                    'type'=>'select',
                                    'div'=>array('class'=>'formfields'),
                                    'after' => $helpBox->display('project_type'),
                                    //'legend'=>Project Description
                                    )
                                );
echo $this->Form->input('market',
                                array(
                                    //'options' => '',
                                    'label'=>'Market',
                                    'type'=>'text',
                                    'div'=>array('class'=>'formfields'),
                                    'after' => $helpBox->display('market'),
                                   // 'legend'=>'Project Descrption'
                                    )
                                );
echo "</fieldset><fieldset><legend>Project (sub) Details</legend>";
echo $this->Form->input('market_lead',
                                array(
                                   // 'options' => '',
                                    'class' => 'autocomplete',
                                    'label'=>'Market Lead',
                                    'type'=>'text',
                                    'div'=>array('class'=>'formfields'),
                                    'after' => $helpBox->display('market_lead').$indicator,
                                   // 'legend'=>'Project Description'
                                    )
                                );
?>
<div id="autocomplete_choices" class="autocomplete"></div>
<?php
echo $this->Form->input('project_manager',
                                array(
                                  //  'options' =>'' ,
                                    'label'=>'Project Manager',
                                    'type'=>'text',
                                    'div'=>array('class'=>'formfields'),
                                    'after' => $helpBox->display('project_manager'),
                                    //'legend'=>'Project Description
                                    )
                                );
echo $this->Form->input('work_location',
                                array(
                                    'options' => ($databaseFields->getOptions('work_location', '3')),
                                    'label'=>'Work location',
                                    'type'=>'select',
                                    'div'=>array('class'=>'formfields'),
                                    'after' => $helpBox->display('work_location'),
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
                                    'after' => $helpBox->display('person_completing'),
                                    //'legend'=>Project Description
                                    )
                                );
echo $this->Form->input('sub_project_name',
                                array(
                                   // 'options' =>'' ,
                                    'label'=>'Sub Project Name',
                                    'type'=>'text',
                                    'div'=>array('class'=>'formfields'),
                                    'after' => $helpBox->display('sub_project_name'),
                                  //  'legend'=>Project Description
                                    )
                                );
echo $this->Form->input('number_of_sites',array('after' => $helpBox->display('number_of_sites'), 'div'=>array('class'=>'formfields')));

echo $this->Form->input('sub_project_status',
                                array(
                                    'options' => array(
                                        ''=>'',
                                        'Open'=>'Open',
                                        'Closed'=>'Closed',
                                        'Cancelled'=>'Cancelled'),
                                    'label'=>'Sub Project Status',
                                    'type'=>'select',
                                    'div'=>array('class'=>'formfields'),
                                    'after' => $helpBox->display('sub_project_status'),
                                  //  'legend'=>Project Description
                                    )
                                );
    echo "<fieldset>";
    echo "<legend>Other Involved Engineers</legend><div id='additional_engineers'>";

    echo $this->Form->input('RfAdditionalEngineer.0.engineer_signum', array('label' => 'Additional Engineer', 'div'=>array('class'=>'formfields'),'after' => $helpBox->display('engineer_signum'),));

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
                                    'div'=>array('class'=>'formfields'),
                                    'after' => $helpBox->display('checklist_accurate'),
                                    //'legend'=>Project Inputs
                                    )
                               );

echo $this->Form->input('checklist_accurate_reason',
                                array(
                                    'options'=> array(''=>'', 'Available, but received late'=>'Available, but received late', 'Not available'=>'Not available', 'Not sure who to ask'=>'Not sure who to ask', 'Cluster not 90% ready'=>'Cluster not 90% ready', 'Other'=>'Other'),
                                    'label'=>'Reason',
                                    'type'=>'select',
                                    )
                                );

echo $this->Form->input('checklist_accurate_reason_explain',array('label'=>'Please Explain'));
echo $this->Form->input('sow_available',
                                array(
                                    'options' => ($databaseFields->getOptions('yes_no', '3')),
                                    'label'=>'Is the SOW available and correct?',
                                    'type'=>'select',
                                    'div'=>array('class'=>'formfields'),
                                    'after' => $helpBox->display('sow_available'),
                                   // 'legend'=>Project Inputs
                                    )
                                );

echo $this->Form->input("sow_available_reason",array('options'=> ($databaseFields->getOptions('reason', 3)),'label'=>'Reason'));
echo $this->Form->input('sow_available_reason_explain',array('label'=>'Please Explain'));

echo $this->Form->input('nw_available',
                                array(
                                    'options' => ($databaseFields->getOptions('yes_no', '3')),
                                    'label'=>'Was the NW Number available at project start?',
                                    'type'=>'select',
                                    'div'=>array('class'=>'formfields'),
                                    'after' => $helpBox->display('nw_available'),
                                   // 'legend'=>Project Inputs
                                    )
                                );
echo $this->Form->input("nw_available_reason",array(
                                        'options'=> ($databaseFields->getOptions('reason', 3)),
                                        'label'=>'Reason'));
echo $this->Form->input('nw_available_reason_explain',array('label'=>'Please Explain'));

echo $this->Form->input('project_budget_access',
                                array(
                                    'options' =>($databaseFields->getOptions('yes_no', '3')) ,
                                    'label'=>'Do you have access to the project budget (TPR)?',
                                    'type'=> 'select',
                                    'div'=>array('class'=>'formfields'),
                                    'after' => $helpBox->display('project_budget_access'),
                                  //  'legend'=>Project Inputs
                                    )
                                );
echo $this->Form->input("project_budget_access_reason",array('options'=> ($databaseFields->getOptions('reason', 3)),'label'=>'Reason'));
echo $this->Form->input('project_budget_access_reason_explain',array('label'=>'Please Explain'));

echo $this->Form->input('engineers_qualified',
                                array(
                                    'options' => ($databaseFields->getOptions('yes_no', '3')),
                                    'label'=>'Are > 90% of the engineers qualified for the job?',
                                    'type'=>'select',
                                    'div'=>array('class'=>'formfields'),
                                    'after' => $helpBox->display('engineers_qualified'),
                                 //  'legend'=>Project Inputs
                                    )
                                );
echo $this->Form->input('engineers_qualified_number',array('options'=> ($databaseFields->getOptions('engineers_qualified', 3)),'label'=>'How many are qualified?'));
echo "</fieldset><fieldset><legend>Project Milestone/Dates</legend>";
echo $this->Form->input('project_start_date',
                                array(
                                   // 'options' =>'' ,
                                    'label'=>'Project Start Date',
                                    'type'=>'date',
                                    'div'=>array('class'=>'formfields formdates'),
                                    'after' => $helpBox->display('project_start_date'),
                                    //'legend'=>Project Inputs
                                    )
                                );
echo $this->Form->input('delivery_date',
                                array(
                                   // 'options' =>'' ,
                                    'label'=>'Initial Planned Delivery Date (based on SOW)',
                                    'type'=>'date',
                                    'div'=>array('class'=>'formfields formdates'),
                                    'after' => $helpBox->display('delivery_date'),
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
                                    'div'=>array('class'=>'formfields'),
                                    'after' => $helpBox->display('num_change_recom'),
                                   // 'legend'=>Project Deliverables
                                    )
                                );

echo $this->Form->input('num_reject_recom',
                                array(
                                  //  'options' =>'' ,
                                    'label'=>'No. of recommendations rejected from final/close-out report',
                                    'type'=>'text',
                                    'div'=>array('class'=>'formfields'),
                                    'after' => $helpBox->display('num_reject_recom'),
                                   // 'legend'=>Project Deliverables
                                    )
                                );

echo $this->Form->input('rejection_responsible',
                                array(
                                    'options' => ($databaseFields->getOptions('rejection_responsible', '3')),
                                    'label'=>'Who is responsible for majority of rejections',
                                    )
                                );
echo $this->Form->input('rejection_responsible_reason',
                                array(
                                    'options' => ($databaseFields->getOptions('fail_reason', '3')),
                                    'label'=>'Major reason for rejections'
                                    )
                                );
echo $this->Form->input('rejection_responsible_reason_explain',array('label'=>'Please Explain'));




echo $this->Form->input('num_implemented_changes',
                                array(
                                   // 'options' =>'' ,
                                    'label'=>'Total of number of accepted changes not implemented',
                                    'type'=>'text',
                                    'div'=>array('class'=>'formfields'),
                                    'after' => $helpBox->display('num_implemented_changes'),
                                   // 'legend'=>Project Deliverables
                                    )
                                );

echo $this->Form->input('num_implemented_changes_reason',
                                array(
                                    'options' => ($databaseFields->getOptions('fail_reason', '3')),
                                    'label'=>'Major reason for not implemented',
                                    )
                                );

echo $this->Form->input('num_implemented_changes_reason_explain',array('label'=>'Please Explain'));

echo "</fieldset>";
echo "<fieldset><legend>SOW/Delivery Date adjustments & Tracking</legend>";

echo $this->Form->input('num_sow_adjustments',
                                array(
                                   // 'options' => '',
                                    'label'=>'Total number of SOW adjustments (0=none)',
                                    'type'=>'text',
                                    'div'=>array('class'=>'formfields'),
                                    'after' => $helpBox->display('num_sow_adjustments'),
                                  //  'legend'=>Project Deliverables
                                    )
                                );
echo $this->Form->input('sow_adjustments_reason_1');
echo $this->Form->input('sow_adjustments_reason_1_explain');
echo $this->Form->input('sow_adjustments_reason_2');
echo $this->Form->input('sow_adjustments_reason_2_explain');
echo $this->Form->input('sow_adjustments_reason_3');
echo $this->Form->input('sow_adjustments_reason_3_explain');

echo $this->Form->input('approved_delivery_date',
                                array(
                                    //'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),
                                    'label'=>'Project Approved Delivery Date',
                                    'type'=>'date',
                                    'div'=>array('class'=>'formfields formdates'),
                                    'after' => $helpBox->display('approved_delivery_date'),
                                  //  'legend'=>Project Deliverables
                                    )
                                );

echo $this->Form->input('delivery_date_adjustment',
                                array(
                                  //  'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),
                                    'label'=>'Total number of Delivery Date adjustments (0=none)',
                                    'type'=>'text',
                                    'div'=>array('class'=>'formfields'),
                                    'after' => $helpBox->display('delivery_date_adjustment'),
                                  //  'legend'=>Project Deliverables
                                    )
                                );
echo $this->Form->input('delivery_date_adjustment_reason_1');
echo $this->Form->input('delivery_date_adjustment_reason_1_explain');
echo $this->Form->input('delivery_date_adjustment_reason_2');
echo $this->Form->input('delivery_date_adjustment_reason_2_explain');
echo $this->Form->input('delivery_date_adjustment_reason_3');
echo $this->Form->input('delivery_date_adjustment_reason_3_explain');

echo $this->Form->input('actual_delivery_date',
                                array(
                                   // 'options' => '',
                                    'label'=>'Actual delivery date',
                                    'type'=>'date',
                                    'div'=>array('class'=>'formfields formdates'),
                                    'after' => $helpBox->display('actual_delivery_date'),
                                  //  'legend'=>Project Deliverables
                                    )
                                );


echo $this->Form->input('actual_delivery_date_reason');
echo $this->Form->input('actual_delivery_date_reason_explain');
echo "</fieldset>";

echo "<fieldset><legend>Delivery Review</legend>";
echo $this->Form->input('meet_proj_expectations',
                                array(
                                    'options' => ($databaseFields->getOptions('yes_no', '3')),
                                    'label'=>'Did we meet the project SOW & expectations?',
                                    'type'=>'select',
                                    'div'=>array('class'=>'formfields'),
                                    'after' => $helpBox->display('meet_proj_expectations'),
                                   // 'legend'=>Project Deliverables
                                    )
                                );

echo $this->Form->input('project_approved',
                                array(
                                    'options' => ($databaseFields->getOptions('yes_no', '3')),
                                    'label'=>'Was the project approved by the customer when formally presented (on time)?',
                                    'type'=>'select',
                                    'div'=>array('class'=>'formfields'),
                                    'after' => $helpBox->display('project_approved'),
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
echo $this->Form->end(__('Submit', true));
?>
