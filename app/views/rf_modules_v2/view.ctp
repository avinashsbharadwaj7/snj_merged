<?php
echo $this->Html->css(array('rf_specific'));
?>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php //echo $this->Html->link(__('Edit Ir Module', true), array('action' => 'edit', $RfModule['RfModule']['id'])); ?> </li>
        <li><?php //echo $this->Html->link(__('Delete Ir Module', true), array('action' => 'delete', $RfModule['RfModule']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $RfModule['RfModule']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List All Reports', true), array('action' => 'listall')); ?> </li>
        <li><?php echo $this->Html->link(__('Add', true), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Clone', true), array('action' => 'copy', $RfModule['RfModule']['id'])); ?> </li>
        <li><?php echo $this->Html->link('Edit', array('action' => 'edit', $RfModule['RfModule']['id']), null, 'Are you sure you want to edit?'); ?> </li>
        <li><?php echo $this->Html->link('Delete', array('action' => 'delete', $RfModule['RfModule']['id']), null, 'Are you sure you want to delete entry#'.$RfModule['RfModule']['id'].'?'); ?> </li>
        <li><?php echo $this->Html->link(__('Feedback', true), array('controller'=>'feedbacks','action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('View Comments/Feedback', true), array('controller'=>'feedbacks','action' => 'listall')); ?> </li>
    </ul>
</div>


<div class="RfModules view">

<fieldset>
    <legend>Project Definition</legend>
    <dl>
    <fieldset>
        <legend>Project Description</legend>
<h2><?php  __('ID: '.'RF1000'.$RfModule['RfModule']['id']);?></h2>
    <dl><?php $i = 0; $class = ' class="altrow"';?>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date Created'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['date_created']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Project Name'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['project_name']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Customer Unit'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['customer_unit']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Region'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['region']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Technology'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['technology']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Project Type'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['project_type']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Market'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['market']; ?>
            &nbsp;
        </dd>
    </dl>
        </fieldset>
    <fieldset>       
        <legend>Project (sub) Details</legend>
        <dl>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Market Lead'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['market_lead']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Project Manager'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['project_manager']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Work Location'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['work_location']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name of person completing this report'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['person_completing']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sub-project name'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['sub_project_name']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sub-project Status'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['sub_project_status']; ?>
            &nbsp;
        </dd>
        <fieldset>
            <legend>Additional Engineers</legend>
            <?php
        $i = 0;
        foreach ($RfModule['RfAdditionalEngineer'] as $rfAdditionalEngineer):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
        ?>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Engineer'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $rfAdditionalEngineer['engineer_signum']; ?>
            &nbsp;
        </dd>
    <?php endforeach; ?>
        
        </fieldset>
        </dl>
       </fieldset>
        </dl>
</fieldset>
    <fieldset>
        <legend>Project Inputs</legend>
        <dl>
        <fieldset>
            <legend>Input Verification</legend>
        <dl>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Are the project inputs/checklists available and accurate?'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['checklist_accurate']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reason'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['checklist_accurate_reason']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Please explain'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['checklist_accurate_reason_explain']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Is the SOW available and correct?'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['sow_available']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reason'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['sow_available_reason']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Please explain'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['sow_available_reason_explain']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Was the NW available at project start? '); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['nw_available']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reason'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['nw_available_reason']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Please explain'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['nw_available_reason_explain']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Do you have access to the project budget (TPR)? '); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['project_budget_access']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reason'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['project_budget_access_reason']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Please explain'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['project_budget_access_reason_explain']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Are > 90% of the engineers qualified for the job?'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['engineers_qualified']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('How mnay are qualified'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['engineers_qualified_number']; ?>
            &nbsp;
        </dd>
        </dl>
        </fieldset>
        <fieldset>
            <legend>Project Milestone/Dates</legend>
            <dl>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Project Start Date'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['project_start_date']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Initial Planned Delivery Date (based on SOW)'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['delivery_date']; ?>
            &nbsp;
        </dd>
        </dl>
        </fieldset>
            </dl>
    </fieldset>
        <fieldset>
            <legend>Project Deliverables</legend>
            
                <fieldset>
                    <legend>Recommendations & Implementations</legend>
                    <dl>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Number of recommendations rejected from final/close-out report'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['num_change_recom']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Who responsible for majority of rejections?'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['rejection_responsible']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Major reason for rejections'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['rejection_responsible_reason']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Please explain'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['rejection_responsible_reason_explain']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total of number of accepted changes not implemented'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['num_implemented_changes']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Major reason for not implemented'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['num_implemented_changes_reason']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Please explain'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['num_implemented_changes_reason_explain']; ?>
            &nbsp;
        </dd>
        </dl>
        </fieldset>
        <fieldset>
            <legend>SOW/Delivery Date adjustments & Tracking</legend>
            <dl>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total number of SOW adjustments (0=none)'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['num_sow_adjustments']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reason for SOW Adjustments 1st time'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['sow_adjustments_reason_1']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Please explain'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['sow_adjustments_reason_1_explain']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reason for SOW Adjustments 2nd time '); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['sow_adjustments_reason_2']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Please explain'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['sow_adjustments_reason_2_explain']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reason for SOW Adjustments 3rd time'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['sow_adjustments_reason_3']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Please explain'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['sow_adjustments_reason_3_explain']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Project Approved Delivery Date'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['approved_delivery_date']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total number of Delivery Date adjustments (0=none)'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['delivery_date_adjustment']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reason for 1st change to planned date'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['delivery_date_adjustment_reason_1']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Please explain'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['delivery_date_adjustment_reason_1_explain']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reason for 2nd change to planned date'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['delivery_date_adjustment_reason_2']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Please explain'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['delivery_date_adjustment_reason_2_explain']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reason for 3rd change to planned date'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['delivery_date_adjustment_reason_3']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Please explain'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['delivery_date_adjustment_reason_3_explain']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Actual Delivery Date'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['actual_delivery_date']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reason for late delivery'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['actual_delivery_date_reason']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Please explain'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['actual_delivery_date_reason_explain']; ?>
            &nbsp;
        </dd>
        </dl>
        </fieldset>
        <fieldset>
            <legend>Delivery Review</legend>
            <dl>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Did we meet the project SOW & expectations?'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['meet_proj_expectations']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reason for not meeting SOW & Expectations'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['meet_proj_expectations_reason']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Please explain'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['meet_proj_expectations_reason_explain']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Was the project approved by the customer when formally presented (on time)?'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['project_approved']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reason for customer not accepting project'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['customer_accept_reason']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Please explain'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $RfModule['RfModule']['customer_accept_reason_explain']; ?>
            &nbsp;
        </dd>
        </dl>
        </fieldset>
       </fieldset>
    
</div>



    

