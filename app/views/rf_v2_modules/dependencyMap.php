<?php

$dependencyMap = array(
    "project_type" => array(
        "rf_precheck_fields" => array(
            "directId" => true,
            "values" => "/^Pre/"
        ),
        "rf_postcheck_fields" => array(
            "directId" => true,
            "values" => "/^Post/"
        )
    ),
    "checklist_accurate" => array(
        "checklist_inaccurate_reason" => array(
            "values" => array("No")
        ),
        "checklist_inaccurate_comment" => array(
            "values" => array("No")
        ),
    ),
    "sow_available" => array(
        "sow_unavailable_reason" => array(
            "values" => array("No")
        ),
        "sow_unavailable_reason_comment" => array(
            "values" => array("No")
        ),
    ),
    "nw_number_available" => array(
        "nw_number_unavailable_reason" => array(
            "values" => array("No")
        ),
        "nw_number_unavailable_comment" => array(
            "values" => array("No")
        ),
    ),
    "project_budget_access" => array(
        "project_budget_no_access_reason" => array(
            "values" => array("No")
        ),
        "project_budget_no_access_comment" => array(
            "values" => array("No")
        ),
    ),
    "engineers_qualified" => array(
        "engineers_qualified_quantity" => array(
            "values" => array("No")
        ),
    ),
    "rejected_recommendations_number" => array(
        "majority_rejection_responsible" => array(
            "values" => array(0),
            "callback" => "greaterThan"
        ),
    ),
    "majority_rejection_responsible" => array(
        "major_rejection_reason" => array(
            "values" => array("Customer", "Ericsson", "Both")
        ),
    ),
    "major_rejection_reason" => array(
        "major_rejection_reason_comment" => array(
            "values" => array("Other")
        ),
    ),
    "changes_not_implemented_number" => array(
        "major_not_implemented_reason" => array(
            "values" => array(0),
            "callback" => "greaterThan"
        ),
    ),
    "major_not_implemented_reason" => array(
        "major_not_implemented_comment" => array(
            "values" => array("Other")
        ),
    ),
    "actual_delivery_date" => array(
        "late_delivery_reason" => array(
            "values" => array("RfV2ModuleInitialPlannedDeliveryDateOnSow", "RfV2ModuleActualDeliveryDate"),
            "callback" => "compareDates"
        ),
    ),
    "initial_planned_delivery_date_on_sow" => array(
        "late_delivery_reason" => array(
            "values" => array("RfV2ModuleInitialPlannedDeliveryDateOnSow", "RfV2ModuleActualDeliveryDate"),
            "callback" => "compareDates"
        ),
    ),
    "late_delivery_reason" => array(
        "late_delivery_comment" => array(
            "values" => array("Other"),
        ),
    ),
    "sow_adjustments_number" => array(
        "sow_adjustments_reason_1" => array(
            "values" => array(0),
            "callback" => "greaterThan"
        ),
        "sow_adjustments_reason_1_comment" => array(
            "values" => array(0),
            "callback" => "greaterThan"
        ),
        "sow_adjustments_reason_2" => array(
            "values" => array(1),
            "callback" => "greaterThan"
        ),
        "sow_adjustments_reason_2_comment" => array(
            "values" => array(1),
            "callback" => "greaterThan"
        ),
        "sow_adjustments_reason_3" => array(
            "values" => array(2),
            "callback" => "greaterThan"
        ),
        "sow_adjustments_reason_3_comment" => array(
            "values" => array(2),
            "callback" => "greaterThan"
        ),
    ),
    "delivery_date_adjustments_number" => array(
        "delivery_date_adjustment_reason_1" => array(
            "values" => array(0),
            "callback" => "greaterThan"
        ),
        "delivery_date_adjustment_reason_1_comment" => array(
            "values" => array(0),
            "callback" => "greaterThan"
        ),
        "delivery_date_adjustment_reason_2" => array(
            "values" => array(1),
            "callback" => "greaterThan"
        ),
        "delivery_date_adjustment_reason_2_comment" => array(
            "values" => array(1),
            "callback" => "greaterThan"
        ),
        "delivery_date_adjustment_reason_3" => array(
            "values" => array(2),
            "callback" => "greaterThan"
        ),
        "delivery_date_adjustment_reason_3_comment" => array(
            "values" => array(2),
            "callback" => "greaterThan"
        ),
    ),
    "project_expectations_met" => array(
        "project_expectations_not_met_reason" => array(
            "values" => array("No"),
        )
    ),
    "project_expectations_not_met_reason" => array(
        "project_expectations_not_met_comment" => array(
            "values" => array("Other"),
        )
    ),
    "project_approved_by_customer" => array(
        "customer_not_accepting_reason" => array(
            "values" => array("No"),
        )
    ),
    "customer_not_accepting_reason" => array(
        "customer_not_accepting_comment" => array(
            "values" => array("Other"),
        )
    ),
);
?>
