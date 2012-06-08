<?php echo $html->css(array('rnc/style', 'rnc/view', 'rnc/css_menu', 'rnc/bcp', 'rnc/rf')); ?>
<div class="rfV2Modules view">
<h2><?php  __('Rf V2 Module');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Project Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['project_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Customer Unit'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['customer_unit']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Region'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['region']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('State/Province'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['state']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Technology'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['technology']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Project Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['project_type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Market'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['market']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Market Lead'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['market_lead']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Project Manager'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['project_manager']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Work Location'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['work_location']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Person Completing'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['person_completing']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sub Project Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['sub_project_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sub Project Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['sub_project_status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Number Of Sites'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['number_of_sites']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Additional Engineers'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo implode(", ",$rfV2Module['RfV2Module']['additional_engineers']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Are the project inputs/checklists available and accurate?'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['checklist_accurate']; ?>
			&nbsp;
		</dd>
                <?php if(!empty($rfV2Module['RfV2Module']['checklist_inaccurate_reason'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Checklist Inaccurate Reason'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['checklist_inaccurate_reason']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['checklist_inaccurate_comment'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Checklist Inaccurate Comments'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['checklist_inaccurate_comment']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Is the SOW available and correct? '); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['sow_available']; ?>
			&nbsp;
		</dd>
                <?php if(!empty($rfV2Module['RfV2Module']['sow_unavailable_reason'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sow Unavailable Reason'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['sow_unavailable_reason']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['sow_unavailable_reason_comment'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sow Unavailable Comments'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['sow_unavailable_reason_comment']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Was the NW Number available at project start? '); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['nw_number_available']; ?>
			&nbsp;
		</dd>
                <?php if(!empty($rfV2Module['RfV2Module']['nw_number_unavailable_reason'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nw Number Unavailable Reason'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['nw_number_unavailable_reason']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['nw_number_unavailable_comment'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nw Number Unavailable Comment'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['nw_number_unavailable_comment']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Do you have access to the project budget (TPR)? '); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['project_budget_access']; ?>
			&nbsp;
		</dd>
                <?php if(!empty($rfV2Module['RfV2Module']['project_budget_no_access_reason'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Project Budget No Access Reason'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['project_budget_no_access_reason']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['project_budget_no_access_comment'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Project Budget No Access Comment'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['project_budget_no_access_comment']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Are > 90% of the engineers qualified for the job? '); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['engineers_qualified']; ?>
			&nbsp;
		</dd>
                <?php if(!empty($rfV2Module['RfV2Module']['engineers_qualified_quantity'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Engineers Qualified Quantity'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['engineers_qualified_quantity']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Project Start Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['project_start_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Initial Planned Delivery Date (based on SOW)'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['initial_planned_delivery_date_on_sow']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Number of change recommendations (0=none)'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['change_recommendations_number']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('No. of recommendations rejected from final/close-out report'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['rejected_recommendations_number']; ?>
			&nbsp;
		</dd>
                <?php if(!empty($rfV2Module['RfV2Module']['majority_rejection_responsible'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Who is responsible for majority of rejections'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['majority_rejection_responsible']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['major_rejection_reason'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Major reason for rejections'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['major_rejection_reason']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['major_rejection_reason_comment'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Major Rejection Reason Comment'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['major_rejection_reason_comment']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total of number of accepted changes not implemented'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['changes_not_implemented_number']; ?>
			&nbsp;
		</dd>
                <?php if(!empty($rfV2Module['RfV2Module']['major_not_implemented_reason'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Major reason for not implemented'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['major_not_implemented_reason']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['major_not_implemented_comment'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Major Not Implemented Comment'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['major_not_implemented_comment']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total number of SOW adjustments (0=none)'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['sow_adjustments_number']; ?>
			&nbsp;
		</dd>
                <?php if(!empty($rfV2Module['RfV2Module']['sow_adjustments_reason_1'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reason for SOW adjustments 1st time '); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['sow_adjustments_reason_1']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['sow_adjustments_reason_1_comment'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sow Adjustments Reason 1 Comment'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['sow_adjustments_reason_1_comment']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['sow_adjustments_reason_2'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reason for SOW adjustments 2nd time '); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['sow_adjustments_reason_2']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['sow_adjustments_reason_2_comment'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sow Adjustments Reason 2 Comment'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['sow_adjustments_reason_2_comment']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['sow_adjustments_reason_3'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reason for SOW adjustments 3rd time '); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['sow_adjustments_reason_3']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['sow_adjustments_reason_3_comment'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sow Adjustments Reason 3 Comment'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['sow_adjustments_reason_3_comment']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total number of Delivery Date adjustments (0=none)'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['delivery_date_adjustments_number']; ?>
			&nbsp;
		</dd>
                <?php if(!empty($rfV2Module['RfV2Module']['delivery_date_adjustment_reason_1'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Delivery Date Adjustment Reason 1Reason for 1st change to planned date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['delivery_date_adjustment_reason_1']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['delivery_date_adjustment_reason_1_comment'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Delivery Date Adjustment Reason 1 Comment'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['delivery_date_adjustment_reason_1_comment']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['delivery_date_adjustment_reason_2'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Delivery Date Adjustment Reason 1Reason for 2nd change to planned date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['delivery_date_adjustment_reason_2']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['delivery_date_adjustment_reason_2_comment'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Delivery Date Adjustment Reason 2 Comment'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['delivery_date_adjustment_reason_2_comment']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['delivery_date_adjustment_reason_3'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Delivery Date Adjustment Reason 1Reason for 3rd change to planned date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['delivery_date_adjustment_reason_3']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['delivery_date_adjustment_reason_3_comment'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Delivery Date Adjustment Reason 3 Comment'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['delivery_date_adjustment_reason_3_comment']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Actual Delivery Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['actual_delivery_date']; ?>
			&nbsp;
		</dd>
                <?php if(!empty($rfV2Module['RfV2Module']['late_delivery_reason'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Late Delivery Reason'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['late_delivery_reason']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['late_delivery_comment'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Late Delivery Comment'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['late_delivery_comment']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Did we meet the project SOW & expectations?'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['project_expectations_met']; ?>
			&nbsp;
		</dd>
                <?php if(!empty($rfV2Module['RfV2Module']['project_expectations_not_met_reason'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reason for not meeting SOW & Expectations'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['project_expectations_not_met_reason']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['project_expectations_not_met_comment'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reason for not meeting SOW & Expectations(Comments)'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['project_expectations_not_met_comment']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Was the project approved by the customer when formally presented (on time)? '); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['project_approved_by_customer']; ?>
			&nbsp;
		</dd>
                <?php if(!empty($rfV2Module['RfV2Module']['customer_not_accepting_reason'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reason for customer not accepting project'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['customer_not_accepting_reason']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['customer_not_accepting_comment'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reason for customer not accepting project (Comment)'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['customer_not_accepting_comment']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Overall Quality Rating'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['overall_quality_rating']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Last Modified By'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['last_modified_by']; ?>
			&nbsp;
		</dd>
                <?php if(!empty($rfV2Module['RfV2Module']['pre_launch_number_of_drives'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pre Launch: Number Of Drives'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['pre_launch_number_of_drives']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['pre_launch_drive1_fail_reason'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pre Launch: Drive1 Fail Reason'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['pre_launch_drive1_fail_reason']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['pre_launch_drive1_fail_description'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pre Launch: Drive1 Fail Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['pre_launch_drive1_fail_description']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['pre_launch_drive2_fail_reason'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pre Launch: Drive2 Fail Reason'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['pre_launch_drive2_fail_reason']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['pre_launch_drive2_fail_description'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pre Launch: Drive2 Fail Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['pre_launch_drive2_fail_description']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['pre_launch_drive3_fail_reason'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pre Launch: Drive3 Fail Reason'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['pre_launch_drive3_fail_reason']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['pre_launch_drive3_fail_description'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pre Launch: Drive3 Fail Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['pre_launch_drive3_fail_description']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['post_launch_expedited_tuning'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Post Launch: Expedited Tuning'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['post_launch_expedited_tuning']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['post_launch_frequency_band'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Post Launch: Frequency Band'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['post_launch_frequency_band']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['post_launch_carrier_tuned'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Post Launch: Carrier Tuned'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['post_launch_carrier_tuned']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['post_launch_complete_closeout_package'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Post Launch: Complete Closeout Package'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['post_launch_complete_closeout_package']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['post_launch_daily_report_delivered'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Post Launch: Daily Report Delivered'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['post_launch_daily_report_delivered']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['post_launch_kick_off_slides_delivered'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Post Launch: Kick Off Slides Delivered'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['post_launch_kick_off_slides_delivered']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['post_launch_tracked_delivered'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Post Launch: Tracked Delivered'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['post_launch_tracked_delivered']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
                <?php if(!empty($rfV2Module['RfV2Module']['post_launch_market_folder'])): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Post Launch: Market Folder'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['post_launch_market_folder']; ?>
			&nbsp;
		</dd>
                <?php endif;?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rfV2Module['RfV2Module']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rf V2 Module', true), array('action' => 'edit', $rfV2Module['RfV2Module']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Rf V2 Module', true), array('action' => 'delete', $rfV2Module['RfV2Module']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $rfV2Module['RfV2Module']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rf V2 Modules', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rf V2 Module', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
