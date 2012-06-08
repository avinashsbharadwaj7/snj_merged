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
    
    $uploadValues = array();
    if(isset($dataValues['Ndsfile']) && is_array($dataValues['Ndsfile'])) {
        foreach($dataValues['Ndsfile'] as $upload=>$arr) {
            foreach($arr as $key=>$value) {
                if($key == 'file_tag') {
                    $uploadValues[$value] = $arr['file_name'];
                    break;
                }
            }
        }
    }
     $ndsComparison->countRecords($dataValues['Ndssite'], array('pci_status', 'power_status', 'baseline', 'neighbour_update', 'alarms_clear', 'cell_status', 'primary_plmn_reserved'), array('parameter_check'=>array('pci_status', 'power_status')));
?>

<h2><?php  __('View - NDS Record ID: ');
    echo $dataValues['Ndsmaster']['id'];?></h2>
<div class="lte_container">
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
            <div class="view_col_right"><?php echo ($dataValues['Ndsmaster']['template_version'] == 1) ? $dataValues['Ndsmaster']['lte_region'] : "<i>(Region stored per site)</i>"; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Activity Type'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Ndsmaster']['activity_nds']; ?></div>
            <div style="clear: both;"></div>
        </div>  
    </div>
</fieldset>
    
<fieldset>
    <legend>Enode-B Report</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Total Sites Touched'); ?></div>
            <div class="view_col_right"><?php echo (count($dataValues['Ndssite']) ==  1 && $dataValues['Ndssite'][0]['site_name'] == "INVALID") ? 0 : count($dataValues['Ndssite']); ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Site List'); ?></div>
            <div class="view_col_right"><?php
                $num_sites = count($dataValues['Ndssite']);
                for($i = 0; $i < $num_sites; $i++) {
                    echo $dataValues['Ndssite'][$i]['site_name'];
                    if($i < $num_sites - 1) {
                        echo ", ";
                    }
                }
            ?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</fieldset>

<fieldset>
    <legend>Pre / Post Check Files</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Pre-Check'); ?></div>
            <div class="view_col_right"><?php echo $uploadValues[0] ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Post-Check'); ?></div>
            <div class="view_col_right"><?php echo $uploadValues[1] ?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</fieldset>
    
<fieldset>
    <legend>Pre / Post Check Summary</legend>
    <?PHP $i = 0; ?>
    <div class="ndscomp_table">
        <div class="ndssummary_row">
            <div class="ndscomp_col_header_metric"><div class="ndscomp_col_header_inner_metric">Metric</div></div>
            <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><?php echo $ndsComparison->display(1)?></div></div>
            <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><?php echo $ndsComparison->display(3)?></div></div>
            <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><?php echo $ndsComparison->display(2)?></div></div>
            <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><?php echo $ndsComparison->display(4)?></div></div>
            <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><?php echo $ndsComparison->display(0)?></div></div>
            <div style="width: 0px; clear: both;"></div>
        </div>
        <div class="ndssummary_row">
            <div class="ndscomp_col_metric"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_nocomparison">Parameter Check</div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('parameter_check', 1)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('parameter_check', 3)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('parameter_check', 2)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('parameter_check', 4)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('parameter_check', 0)?></div></div></div>
            <div style="width: 0px; clear: both;"></div>
            <?PHP $i = (++$i % 2 == 0) ? 0 : 1 ?>
        </div>
        <div class="ndssummary_row">
            <div class="ndscomp_col_metric"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_nocomparison">Baseline</div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('baseline', 1)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('baseline', 3)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('baseline', 2)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('baseline', 4)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('baseline', 0)?></div></div></div>
            <div style="width: 0px; clear: both;"></div>
            <?PHP $i = (++$i % 2 == 0) ? 0 : 1 ?>
        </div>
        <div class="ndssummary_row">
            <div class="ndscomp_col_metric"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_nocomparison">Neighbor Update</div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('neighbour_update', 1)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('neighbour_update', 3)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('neighbour_update', 2)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('neighbour_update', 4)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('neighbour_update', 0)?></div></div></div>
            <div style="width: 0px; clear: both;"></div>
            <?PHP $i = (++$i % 2 == 0) ? 0 : 1 ?>
        </div>
        <div class="ndssummary_row">
            <div class="ndscomp_col_metric"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_nocomparison">Troubleshooting</div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('alarms_clear', 1)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('alarms_clear', 3)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('alarms_clear', 2)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('alarms_clear', 4)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('alarms_clear', 0)?></div></div></div>
            <div style="width: 0px; clear: both;"></div>
            <?PHP $i = (++$i % 2 == 0) ? 0 : 1 ?>
        </div>
        <div class="ndssummary_row">
            <div class="ndscomp_col_metric"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_nocomparison">Cell Status (unlocked/locked)</div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('cell_status', 1)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('cell_status', 3)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('cell_status', 2)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('cell_status', 4)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('cell_status', 0)?></div></div></div>
            <div style="width: 0px; clear: both;"></div>
            <?PHP $i = (++$i % 2 == 0) ? 0 : 1 ?>
        </div>
        <div class="ndssummary_row">
            <div class="ndscomp_col_metric"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_nocomparison">Primary PLMN Reserved</div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('primary_plmn_reserved', 1)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('primary_plmn_reserved', 3)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('primary_plmn_reserved', 2)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('primary_plmn_reserved', 4)?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->getCount('primary_plmn_reserved', 0)?></div></div></div>
            <div style="width: 0px; clear: both;"></div>
            <?PHP $i = (++$i % 2 == 0) ? 0 : 1 ?>
        </div>
    </div>
</fieldset>
</div>