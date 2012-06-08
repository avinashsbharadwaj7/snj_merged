<?php
echo $html->css('jqgrid/jquery-ui-1.7.3.custom');
echo $html->css('jqgrid/ui.jqgrid');
echo $javascript->link('jqgrid/js/jquery-1.5.2.min', true);
echo $javascript->link('jqgrid/js/jquery-ui-1.7.2.custom.min', true);
echo $javascript->link('jqgrid/js/i18n/grid.locale-en', true);
echo $javascript->link('jqgrid/js/jquery.jqGrid.min', true);

?>
<script type="text/javascript">
    var lastsel;
    jQuery(document).ready(function(){
        jQuery("#rowed1").jqGrid({
            url:'grid_updater/load',
            datatype: "json",
            colNames:['Id','Date Created','Project Name','Customer Unit','Region','Technology','Project Type','Market','Market Lead','Project Manager','Work Location','Person Completing','Person Completing Name','Sub Project Name','Sub Project Status','Checklist Accurate','Checklist Accurate Reason','Checklist Accurate Reason Explain','Sow Available','Sow Available Reason','Sow Available Reason Explain','Nw Available','Nw Available Reason','Nw Available Reason Explain','Project Budget Access','Project Budget Access Reason','Project Budget Access Reason Explain','Engineers Qualified','Engineers Qualified Number','Project Start Date','Delivery Date','Num Change Recom','Num Reject Recom','Rejection Responsible','Rejection Responsible Reason','Rejection Responsible Reason Explain','Num Implemented Changes','Num Implemented Changes Reason','Num Implemented Changes Reason Explain','Num Sow Adjustments','Sow Adjustments Reason 1','Sow Adjustments Reason 1 Explain','Sow Adjustments Reason 2','Sow Adjustments Reason 2 Explain','Sow Adjustments Reason 3','Sow Adjustments Reason 3 Explain','Approved Delivery Date','Delivery Date Adjustment','Delivery Date Adjustment Reason 1','Delivery Date Adjustment Reason 1 Explain','Delivery Date Adjustment Reason 2','Delivery Date Adjustment Reason 2 Explain','Delivery Date Adjustment Reason 3','Delivery Date Adjustment Reason 3 Explain','Actual Delivery Date','Actual Delivery Date Reason','Actual Delivery Date Reason Explain','Meet Proj Expectations','Meet Proj Expectations Reason','Meet Proj Expectations Reason Explain','Project Approved','Customer Accept Reason','Customer Accept Reason Explain','Cluster Name','Project Code','Project Code Available','Num Scope Changes','Created By','Modified Date','Modified By','Graphing Quarter','Project Status'],
            colModel:[
                {name:'id',index:'id', width:100,sortable:true,search:true, editable:false},
                {name:'date_created',index:'date_created', width:100,search:true,sortable:true,editable:false},
                {name:'project_name',index:'project_name', width:200,search:true, sortable:true,editable:true},
                {name:'customer_unit',index:'customer_unit', width:100,search:true, sortable:true,editable:true},
                {name:'region',index:'region', width:120,sortable:true,search:true, editable:true},
                {name:'technology',index:'technology', width:100,sortable:true,search:true, editable:true},
                {name:'project_type',index:'project_type', width:250,sortable:true,search:true, editable:true},
                {name:'market',index:'market', width:120,sortable:true,search:true,editable:true},
                {name:'market_lead',index:'market_lead', width:210,sortable:false,search:false,editable:true},
                {name:'project_manager',index:'project_manager', width:140,sortable:false,search:false,editable:true},
                {name:'work_location',index:'work_location', width:160,sortable:false,search:false,editable:true},
                {name:'person_completing',index:'person_completing', width:100,sortable:false,search:false,editable:true},
                {name:'person_completing_name',index:'person_completing_name', width:175,sortable:false,search:false,editable:true},
                {name:'sub_project_name',index:'sub_project_name', width:300,sortable:false,search:false,editable:true},
                {name:'sub_project_status',index:'sub_project_status', width:100,sortable:false,search:false,editable:true},
                {name:'checklist_accurate',index:'checklist_accurate', width:100,sortable:false,search:false,editable:true},
                {name:'checklist_accurate_reason',index:'checklist_accurate_reason', width:100,sortable:false,search:false,editable:true},
                {name:'checklist_accurate_reason_explain',index:'checklist_accurate_reason_explain', width:100,sortable:false,search:false,editable:true},
                {name:'sow_available',index:'sow_available', width:100,sortable:false,search:false,editable:true},
                {name:'sow_available_reason',index:'sow_available_reason', width:100,sortable:false,search:false,editable:true},
                {name:'sow_available_reason_explain',index:'sow_available_reason_explain', width:100,sortable:false,search:false,editable:true},
                {name:'nw_available',index:'nw_available', width:100,sortable:false,search:false,editable:true},
                {name:'nw_available_reason',index:'nw_available_reason', width:200,sortable:false,search:false,editable:true},
                {name:'nw_available_reason_explain',index:'nw_available_reason_explain', width:100,sortable:false,search:false,editable:true},
                {name:'project_budget_access',index:'project_budget_access', width:100,sortable:false,search:false,editable:true},
                {name:'project_budget_access_reason',index:'project_budget_access_reason', width:100,sortable:false,search:false,editable:true},
                {name:'project_budget_access_reason_explain',index:'project_budget_access_reason_explain', width:100,sortable:false,search:false,editable:true},
                {name:'engineers_qualified',index:'engineers_qualified', width:100,sortable:false,search:false,editable:true},
                {name:'engineers_qualified_number',index:'engineers_qualified_number', width:100,sortable:false,search:false,editable:true},
                {name:'project_start_date',index:'project_start_date', width:120,sortable:false,search:false,editable:true},
                {name:'delivery_date',index:'delivery_date', width:120,sortable:false,search:false,editable:true},
                {name:'num_change_recom',index:'num_change_recom', width:100,sortable:false,search:false,editable:true},
                {name:'num_reject_recom',index:'num_reject_recom', width:100,sortable:false,search:false,editable:true},
                {name:'rejection_responsible',index:'rejection_responsible', width:100,sortable:false,search:false,editable:true},
                {name:'rejection_responsible_reason',index:'rejection_responsible_reason', width:100,sortable:false,search:false,editable:true},
                {name:'rejection_responsible_reason_explain',index:'rejection_responsible_reason_explain', width:100,sortable:false,search:false,editable:true},
                {name:'num_implemented_changes',index:'num_implemented_changes', width:100,sortable:false,search:false,editable:true},
                {name:'num_implemented_changes_reason',index:'num_implemented_changes_reason', width:100,sortable:false,search:false,editable:true},
                {name:'num_implemented_changes_reason_explain',index:'num_implemented_changes_reason_explain', width:100,sortable:false,search:false,editable:true},
                {name:'num_sow_adjustments',index:'num_sow_adjustments', width:100,sortable:false,search:false,editable:true},
                {name:'sow_adjustments_reason_1',index:'sow_adjustments_reason_1', width:100,sortable:false,search:false,editable:true},
                {name:'sow_adjustments_reason_1_explain',index:'sow_adjustments_reason_1_explain', width:100,sortable:false,search:false,editable:true},
                {name:'sow_adjustments_reason_2',index:'sow_adjustments_reason_2', width:100,sortable:false,search:false,editable:true},
                {name:'sow_adjustments_reason_2_explain',index:'sow_adjustments_reason_2_explain', width:100,sortable:false,search:false,editable:true},
                {name:'sow_adjustments_reason_3',index:'sow_adjustments_reason_3', width:100,sortable:false,search:false,editable:true},
                {name:'sow_adjustments_reason_3_explain',index:'sow_adjustments_reason_3_explain', width:100,sortable:false,search:false,editable:true},
                {name:'approved_delivery_date',index:'approved_delivery_date', width:120,sortable:false,search:false,editable:true},
                {name:'delivery_date_adjustment',index:'delivery_date_adjustment', width:100,sortable:false,search:false,editable:true},
                {name:'delivery_date_adjustment_reason_1',index:'delivery_date_adjustment_reason_1', width:100,sortable:false,search:false,editable:true},
                {name:'delivery_date_adjustment_reason_1_explain',index:'delivery_date_adjustment_reason_1_explain', width:100,sortable:false,search:false,editable:true},
                {name:'delivery_date_adjustment_reason_2',index:'delivery_date_adjustment_reason_2', width:100,sortable:false,search:false,editable:true},
                {name:'delivery_date_adjustment_reason_2_explain',index:'delivery_date_adjustment_reason_2_explain', width:100,sortable:false,search:false,editable:true},
                {name:'delivery_date_adjustment_reason_3',index:'delivery_date_adjustment_reason_3', width:100,sortable:false,search:false,editable:true},
                {name:'delivery_date_adjustment_reason_3_explain',index:'delivery_date_adjustment_reason_3_explain', width:100,sortable:false,search:false,editable:true},
                {name:'actual_delivery_date',index:'actual_delivery_date', width:120,sortable:false,search:false,editable:true},
                {name:'actual_delivery_date_reason',index:'actual_delivery_date_reason', width:100,sortable:false,search:false,editable:true},
                {name:'actual_delivery_date_reason_explain',index:'actual_delivery_date_reason_explain', width:100,sortable:false,search:false,editable:true},
                {name:'meet_proj_expectations',index:'meet_proj_expectations', width:100,sortable:false,search:false,editable:true},
                {name:'meet_proj_expectations_reason',index:'meet_proj_expectations_reason', width:200,sortable:false,search:false,editable:true},
                {name:'meet_proj_expectations_reason_explain',index:'meet_proj_expectations_reason_explain', width:100,sortable:false,search:false,editable:true},
                {name:'project_approved',index:'project_approved', width:100,sortable:false,search:false,editable:true},
                {name:'customer_accept_reason',index:'customer_accept_reason', width:100,sortable:false,search:false,editable:true},
                {name:'customer_accept_reason_explain',index:'customer_accept_reason_explain', width:100,sortable:false,search:false,editable:true},
                {name:'cluster_name',index:'cluster_name', width:100,sortable:false,search:false,editable:true},
                {name:'project_code',index:'project_code', width:100,sortable:false,search:false,editable:true},
                {name:'project_code_available',index:'project_code_available', width:100,sortable:false,search:false,editable:true},
                {name:'num_scope_changes',index:'num_scope_changes', width:100,sortable:false,search:false,editable:true},
                {name:'created_by',index:'created_by', width:200,sortable:false,search:false,editable:true},
                {name:'modified_date',index:'modified_date', width:200,sortable:false,search:false,editable:false},
                {name:'modified_by',index:'modified_by', width:200,sortable:false,search:false,editable:false},
                {name:'graphing_quarter',index:'graphing_quarter', width:100,sortable:false,search:false,editable:true},
                {name:'project_status',index:'project_status', width:100,sortable:false,search:false,editable:true}
            ],
            rowNum:30,
            rowList:[30,60,90],
            pager: '#prowed1',
            sortname: 'id',
            viewrecords: true,
            sortorder: "desc",
            ondblClickRow: function(id){
                if(id && id !== lastsel){
                    jQuery('#rowed1').jqGrid('restoreRow',lastsel);
                    jQuery('#rowed1').jqGrid('editRow',id,true);
                    lastsel=id;
                }
            },
            /*onSelectRow
             *ondblClickRow: function(id){
              if(id && id !== lastsel){
                    jQuery('#rowed1').jqGrid('restoreRow',lastsel);
                    jQuery("#rowed1").jqGrid('editGridRow',id,{reloadAfterSubmit:false});
                    //jQuery('#rowed1').jqGrid('editRow',id,true);
                    lastsel=id;
                }
            },*/
            editurl: "grid_saver",
            caption: "RF Data",
            height: "90%",
            scrollOffset: 0,
            altRows: true,
            shrinkToFit: true
        });
        jQuery("#rowed1").jqGrid('navGrid',"#prowed1",{edit:false,add:false,del:false});
       
   });
</script>
<table id="rowed1"></table>
<div id="prowed1"></div>
<br />
