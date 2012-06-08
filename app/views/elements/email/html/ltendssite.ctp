<?PHP 
    $class = ' class="altrow"';
?>

<style>
root { 
    display: block;
}

div.lte-link {
    padding: 5px;
    margin: 2px;
    margin-left: 245px;
}

div.lte_view {
   
}

div.lte_container {
    margin-left: 60px;
}

div.altrow {
    background: #E4E8EF;
}

div.view_col_left {
    font-size: 12px;
    padding-left: 4px;
    margin: 0px;
    line-height: 2.5em;
    font-weight: bold;
    width: 46%;
    float: left;
    clear: none;
    
}

div.view_col_right {
    margin: 0px;
    font-size: 12px;
    float: left;
    clear: right;
    width: 53%;
    line-height: 2em;
}

div.ndscomp_table {
   margin: 0px;
   padding: 0px;
   width: 100%;
}

div.ndssummary_row {
    padding: 0px;
    margin: 0px;
    height: 38px;
    width: 675px;
}

div.ndscomp_col_header_inner {
    padding: 6px;
    line-height: 1.5em;
    background-color: #c7e2cc;
}

div.ndscomp_col_header_inner_metric {
    padding: 6px;
    line-height: 1.5em;
    font-size: 12px;
    background-color: #c7e2cc;
    height: 20px;
}

div.ndscomp_col_header_inner_comparison {
    padding: 6px;
    line-height: 1.5em;
    background-color: #c7e2cc;
    text-align: center;
}

div.ndscomp_col_header {
    clear: none;
    float: left;
    margin: 1px;
    border: 1px #000 solid;
    font-weight: bold;  
    width: 83px;
}

div.ndscomp_col_header_metric {
    clear: none;
    float: left;
    margin: 1px;
    border: 1px #000 solid;
    font-weight: bold;
    width: 185px;
    height: 32px;
}

div.ndscomp_col_inner {
    padding: 0px;
    margin: 0px;
    background: #FFF;
}

div.ndscomp_col_inner_alt {
    padding: 0px;
    margin: 0px;
    background: #E4E8EF;
}

div.ndscomp_col {
    clear: none;
    float: left;
    border: 1px #000 solid;
    margin: 1px;
    width: 83px;
    overflow: auto;
}

div.ndscomp_col_metric {
    clear: none;
    float: left;
    border: 1px #000 solid;
    margin: 1px;
    width: 185px;
}


div.ndscomp_nocomparison {
    padding: 6px;
    margin: 0px;
    line-height: 12px;
    font-size: 12px;
    height: 22px;
    vertical-align: middle;
}

div.ndscomp_comparison {
    padding: 2px;
    margin: 0px;
    line-height: 12px;
    font-size: 12px;
    height: 30px;
    text-align: center;
    vertical-align: middle;
}

div.ndscomp_notapplicable {
    padding: 4px;
    margin: 0px;
    background: #ffff00;
    line-height: 12px;
    font-size: 12px;
    text-align: center;
    vertical-align: middle;
    height: 12px;
}

div.ndscomp_success {
    padding: 4px;
    margin: 0px;
    background: #00ff00;
    line-height: 12px;
    font-size: 12px;
    text-align: center;
    vertical-align: middle;
    height: 12px;
}

div.ndscomp_notsuccess {
    padding: 4px;
    margin: 0px;
    background: #ff0000;
    line-height: 12px;
    font-size: 12px;
    text-align: center;
    vertical-align: middle;
    height: 12px;
}

div.ndscomp_nochange {
    padding: 4px;
    margin: 0px;
    background: #00ff00;
    line-height: 12px;
    font-size: 12px;
    text-align: center;
    vertical-align: middle;
    height: 12px;
}

div.ndscomp_investigate {
    padding: 4px;
    margin: 0px;
    background: #ff9900;
    line-height: 12px;
    font-size: 12px;
    text-align: center;
    vertical-align: middle;
    height: 12px;
}
</style>

<?PHP
    $class = ' class="altrow"';
    $class_comp = " class=\"ndscomp_col_inner\"";
    $class_comp_alt = " class=\"ndscomp_col_inner_alt\"";
    $search_action = 'searchsite';
    $search_action_arg = 'loadSites';
    $nds_id = $dataValues['Ndsmaster']['id'];    
?>
<h2><?php  __('View - NDS ID: ');
    echo $dataValues['Ndssite']['ndsmaster_id'];?></h2>
<h2><?php  __('--Site Record ID: ');
    echo $dataValues['Ndssite']['id'];?></h2>
<div class="lte_container">
<fieldset>
    <legend>Basic Information</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Date Last Modified'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Ndsmaster']['date_initiated']; ?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>Engineer Information</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Signum'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Ndsmaster']['engineer_signum']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Ndsmaster']['engineer_name']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Work Location'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Ndsmaster']['engineer_work_location']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?PHP if($showFields->display('engineer_work_location', $dataValues['Ndsmaster']['engineer_work_location'])) { ?>
            <div<?php if ($i++ % 2 == 0) echo $class;?>>
                <div class="view_col_left"><?PHP __('-Location'); ?></div>
                <div class="view_col_right"><?PHP echo $dataValues['Ndsmaster']['work_location_remote'] . ' '; ?></div>
                <div style="clear: both;"></div>
            </div>
        <?PHP } ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Team Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Ndsmaster']['team_name']; ?></div>
            <div style="clear: both;"></div>
        </div>                         
    </div>
</fieldset>
<fieldset>
    <legend>Project Information</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('LTE Customer'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Ndsmaster']['lte_customer']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Region'); ?></div>
            <div class="view_col_right"><?php echo ($dataValues['Ndsmaster']['template_version'] == 1) ? $dataValues['Ndsmaster']['lte_region'] : $dataValues['Ndssite']['lte_region']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Activity'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Ndsmaster']['activity_nds']; ?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>Site Information</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Site Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Ndssite']['site_name']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('PCI Status'); ?></div>
            <div class="view_col_right"><div class="nds_comp_container"><?php echo $ndsComparison->display($dataValues['Ndssite']['pci_status'])?></div></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Power Status'); ?></div>
            <div class="view_col_right"><div class="nds_comp_container"><?php echo $ndsComparison->display($dataValues['Ndssite']['power_status'])?></div></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Baseline'); ?></div>
            <div class="view_col_right"><div class="nds_comp_container"><?php echo $ndsComparison->display($dataValues['Ndssite']['baseline'])?></div></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Neighbor Update'); ?></div>
            <div class="view_col_right"><div class="nds_comp_container"><?php echo $ndsComparison->display($dataValues['Ndssite']['neighbour_update'])?></div></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Alarms Cleared'); ?></div>
            <div class="view_col_right"><div class="nds_comp_container"><?php echo $ndsComparison->display($dataValues['Ndssite']['alarms_clear'])?></div></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('ERBS Status'); ?></div>
            <div class="view_col_right"><div class="nds_comp_container"><?php echo $ndsComparison->display($dataValues['Ndssite']['erbs_status'])?></div></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Cell Status'); ?></div>
            <div class="view_col_right"><div class="nds_comp_container"><?php echo $ndsComparison->display($dataValues['Ndssite']['cell_status'])?></div></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('MIMO/SIMO'); ?></div>
            <div class="view_col_right"><div class="nds_comp_container"><?php echo $ndsComparison->display($dataValues['Ndssite']['mimo_simo'])?></div></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Software Version'); ?></div>
            <div class="view_col_right"><div class="nds_comp_container"><?php echo $ndsComparison->display($dataValues['Ndssite']['software_version'])?></div></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Primary PLMN Reserved'); ?></div>
            <div class="view_col_right"><div class="nds_comp_container"><?php echo $ndsComparison->display($dataValues['Ndssite']['primary_plmn_reserved'])?></div></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Cell Barred'); ?></div>
            <div class="view_col_right"><div class="nds_comp_container"><?php echo $ndsComparison->display($dataValues['Ndssite']['cell_barred'])?></div></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Ready for Functional Test'); ?></div>
            <div class="view_col_right"><div class="nds_comp_container"><?php echo $ndsComparison->display($dataValues['Ndssite']['ready_test'])?></div></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</fieldset>
    <fieldset>
    <legend>Comments</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Pre-Check'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Ndssite']['comments_precheck']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Post-Check'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Ndssite']['comments_postcheck']; ?></div>
            <div style="clear: both;"></div>
        </div>                         
    </div>
</fieldset>
</div>