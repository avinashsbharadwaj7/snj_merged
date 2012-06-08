<?php
//LTE-NDS
?>
<?PHP 
    echo $html->css("lte-lit");
    echo $html->css("lte-nds");
    
    $class = ' class="altrow"';
    $class_comp = " class=\"ndscomp_col_inner\"";
    $class_comp_alt = " class=\"ndscomp_col_inner_alt\"";
    $search_action = 'searchsite';
    $search_action_arg = 'loadSites';
    $nds_id = $dataValues['Ndsmaster']['id'];
    
    /* Sort the uploads according to file_tag.
     * We only need to display the filename, so the resulting array
     * will be one-dimensional associative.
     */
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
    
    /* count the appropriate records */
    $ndsComparison->countRecords($dataValues['Ndssite'], array('pci_status', 'power_status', 'baseline', 'neighbour_update', 'alarms_clear', 'cell_status', 'primary_plmn_reserved'), array('parameter_check'=>array('pci_status', 'power_status')));
    
?>

<?PHP if($action_link == "ndsNewWindow") {
    echo $html->css("bcp");
    echo $html->css("css_menu");
    echo $html->css("permarinus_blue");
    ?>
    <div class="nds_view_new_window"><?PHP $i = 0; ?>
        <div class="ndscomp_table">
            <div class="ndscomp_row">
                <div class="ndscomp_col_header_id"><div class="ndscomp_col_header_inner"><a href="javascript:void(0)" title="Record ID">Record ID</a></div></div>
                <?PHP if($dataValues['Ndsmaster']['template_version'] == 2): ?>
                <div class="ndscomp_col_header_region"><div class="ndscomp_col_header_inner"><a href="javascript:void(0)" title="Region">Region</a></div></div>
                <?PHP endif; ?>
                <div class="ndscomp_col_header_site"><div class="ndscomp_col_header_inner"><a href="javascript:void(0)" title="Site Name">Site Name</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="PCI Status">PCI</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="Power Status">Power</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="Baseline">Baseline</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="Neighbor Upgrade">Neighbor</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="Alarms Cleared (Troubleshooting)">Alarms</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="ERBS Status">ERBS</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="Cell Status">Cell</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="MIMO/SIMO">MIMO/SIMO</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="Software Version">Software</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="Primary PLMN Reserved">PLMN</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="Cell Barred">Barred</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="Ready for Functional Test">Ready</a></div></div>
                <div class="ndscomp_col_header_comments"><div class="ndscomp_col_header_inner"><a href="javascript:void(0)" title="Pre-Check Comments">Pre-Check Comments</a></div></div>
                <div class="ndscomp_col_header_comments"><div class="ndscomp_col_header_inner"><a href="javascript:void(0)" title="Post-Check Comments">Post-Check Comments</a></div></div>
                <div style="width: 0px; clear: both;"></div>
                </div>
        <?PHP
            for($j = 0; $j < count($dataValues['Ndssite']); $j++) {
                ?>
                    <div class="ndscomp_row">
                        <div class="ndscomp_col_id"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_nocomparison"><?php echo $this->Html->link($dataValues['Ndssite'][$j]['id'], array('action' => 'viewsite', $dataValues['Ndssite'][$j]['id'], 'view', $dataValues['Ndsmaster']['id'], 'ndsNewWindow'))?><?php echo ($dataValues['Ndsmaster']['engineer_signum'] == Authsome::get('username')) ? " [" . $this->Html->link(__('Edit', true), array('action' => 'editsite', $dataValues['Ndssite'][$j]['id'])) . "]" : ""; ?></div></div></div>
                        <?PHP if($dataValues['Ndsmaster']['template_version'] == 2): ?>
                        <div class="ndscomp_col_region"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_nocomparison"><?php echo !empty($dataValues['Ndssite'][$j]['lte_region']) ? $dataValues['Ndssite'][$j]['lte_region'] : "-"?></div></div></div>
                        <?PHP endif; ?>
                        <div class="ndscomp_col_site"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_nocomparison"><?php echo !empty($dataValues['Ndssite'][$j]['site_name']) ? $dataValues['Ndssite'][$j]['site_name'] : "-"?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['pci_status'])?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['power_status'])?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['baseline'])?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['neighbour_update'])?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['alarms_clear'])?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['erbs_status'])?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['cell_status'])?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['mimo_simo'])?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['software_version'])?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['primary_plmn_reserved'])?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['cell_barred'])?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['ready_test'])?></div></div></div>
                        <div class="ndscomp_col_comments"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_nocomparison"><?php echo !empty($dataValues['Ndssite'][$j]['comments_precheck']) ? $dataValues['Ndssite'][$j]['comments_precheck'] : "&nbsp;"?></div></div></div>
                        <div class="ndscomp_col_comments"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_nocomparison"><?php echo !empty($dataValues['Ndssite'][$j]['comments_postcheck']) ? $dataValues['Ndssite'][$j]['comments_postcheck'] : "&nbsp;"?></div></div></div>
                        <div style="width: 0px; clear: both;"></div>
                        <?PHP $i = (++$i % 2 == 0) ? 0 : 1 ?>
                    </div>
                <?PHP
            }
        ?>
        </div>
    </div>
<?PHP }
    else {
?>
<li>
    <?PHP if($action_link == 'search' || $action_link == 'export') {
            echo $this->Html->link(__('Back', true), array('controller'=>'ndsmasters', 'action' => $action_link, $action_arg_1));
        }
        else if($action_link == 'loadSiteSearch') {
            echo $this->Html->link(__('Back', true), array('controller'=>'ndsmasters', 'action' => 'search', $action_arg_1));
        }
        else if($action_link == 'index') {
            echo $this->Html->link(__('Back', true), array('controller'=>'litmasters', 'action' => $action_link));
        }
        else {
           echo $this->Html->link(__('Back', true), array('controller'=>'ndsmasters', 'action' => $action_link));
        }
        if($dataValues['Ndsmaster']['engineer_signum'] == Authsome::get('username')) {
            echo '&nbsp;|&nbsp;';
            echo $this->Html->link(__('Edit', true), array('action' => 'edit', $dataValues['Ndsmaster']['id'], true));
        }
        if(Authsome::check('/ndsmasters/export')) {
            echo '&nbsp;|&nbsp;';
            echo $this->Html->link(__('Download Excel', true), array('action' => 'ndsexcel', $dataValues['Ndsmaster']['id']));
        }
    ?>

</li>
<h2><?php  __('View - NDS ID: ');
    echo $dataValues['Ndsmaster']['id'];?></h2>
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
            <div class="view_col_right"><?php echo ($dataValues['Ndsmaster']['template_version'] == 1) ? $dataValues['Ndsmaster']['lte_region'] : "<i>(See individual site records below)</i>"; ?></div>
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
            <div class="view_col_right"><?php echo $this->Html->link($uploadValues[0], array('action' => 'download', $dataValues['Ndsmaster']['id'], 0)); ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Post-Check'); ?></div>
            <div class="view_col_right"><?php echo $this->Html->link($uploadValues[1], array('action' => 'download', $dataValues['Ndsmaster']['id'], 1)); ?></div>
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
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('parameter_check', 1), array('action' => $search_action, $search_action_arg, $nds_id, 'pci_status&power_status', 1))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('parameter_check', 3), array('action' => $search_action, $search_action_arg, $nds_id, 'pci_status&power_status', 3))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('parameter_check', 2), array('action' => $search_action, $search_action_arg, $nds_id, 'pci_status&power_status', 2))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('parameter_check', 4), array('action' => $search_action, $search_action_arg, $nds_id, 'pci_status&power_status', 4))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('parameter_check', 0), array('action' => $search_action, $search_action_arg, $nds_id, 'pci_status&power_status', 0))?></div></div></div>
            <div style="width: 0px; clear: both;"></div>
            <?PHP $i = (++$i % 2 == 0) ? 0 : 1 ?>
        </div>
        <div class="ndssummary_row">
            <div class="ndscomp_col_metric"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_nocomparison">Baseline</div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('baseline', 1), array('action' => $search_action, $search_action_arg, $nds_id, 'baseline', 1))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('baseline', 3), array('action' => $search_action, $search_action_arg, $nds_id, 'baseline', 3))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('baseline', 2), array('action' => $search_action, $search_action_arg, $nds_id, 'baseline', 2))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('baseline', 4), array('action' => $search_action, $search_action_arg, $nds_id, 'baseline', 4))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('baseline', 0), array('action' => $search_action, $search_action_arg, $nds_id, 'baseline', 0))?></div></div></div>
            <div style="width: 0px; clear: both;"></div>
            <?PHP $i = (++$i % 2 == 0) ? 0 : 1 ?>
        </div>
        <div class="ndssummary_row">
            <div class="ndscomp_col_metric"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_nocomparison">Neighbor Update</div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('neighbour_update', 1), array('action' => $search_action, $search_action_arg, $nds_id, 'neighbour_update', 1))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('neighbour_update', 3), array('action' => $search_action, $search_action_arg, $nds_id, 'neighbour_update', 3))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('neighbour_update', 2), array('action' => $search_action, $search_action_arg, $nds_id, 'neighbour_update', 2))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('neighbour_update', 4), array('action' => $search_action, $search_action_arg, $nds_id, 'neighbour_update', 4))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('neighbour_update', 0), array('action' => $search_action, $search_action_arg, $nds_id, 'neighbour_update', 0))?></div></div></div>
            <div style="width: 0px; clear: both;"></div>
            <?PHP $i = (++$i % 2 == 0) ? 0 : 1 ?>
        </div>
        <div class="ndssummary_row">
            <div class="ndscomp_col_metric"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_nocomparison">Troubleshooting</div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('alarms_clear', 1), array('action' => $search_action, $search_action_arg, $nds_id, 'alarms_clear', 1))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('alarms_clear', 3), array('action' => $search_action, $search_action_arg, $nds_id, 'alarms_clear', 3))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('alarms_clear', 2), array('action' => $search_action, $search_action_arg, $nds_id, 'alarms_clear', 2))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('alarms_clear', 4), array('action' => $search_action, $search_action_arg, $nds_id, 'alarms_clear', 4))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('alarms_clear', 0), array('action' => $search_action, $search_action_arg, $nds_id, 'alarms_clear', 0))?></div></div></div>
            <div style="width: 0px; clear: both;"></div>
            <?PHP $i = (++$i % 2 == 0) ? 0 : 1 ?>
        </div>
        <div class="ndssummary_row">
            <div class="ndscomp_col_metric"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_nocomparison">Cell Status (unlocked/locked)</div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('cell_status', 1), array('action' => $search_action, $search_action_arg, $nds_id, 'cell_status', 1))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('cell_status', 3), array('action' => $search_action, $search_action_arg, $nds_id, 'cell_status', 3))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('cell_status', 2), array('action' => $search_action, $search_action_arg, $nds_id, 'cell_status', 2))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('cell_status', 4), array('action' => $search_action, $search_action_arg, $nds_id, 'cell_status', 4))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('cell_status', 0), array('action' => $search_action, $search_action_arg, $nds_id, 'cell_status', 0))?></div></div></div>
            <div style="width: 0px; clear: both;"></div>
            <?PHP $i = (++$i % 2 == 0) ? 0 : 1 ?>
        </div>
        <div class="ndssummary_row">
            <div class="ndscomp_col_metric"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_nocomparison">Primary PLMN Reserved</div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('primary_plmn_reserved', 1), array('action' => $search_action, $search_action_arg, $nds_id, 'primary_plmn_reserved', 1))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('primary_plmn_reserved', 3), array('action' => $search_action, $search_action_arg, $nds_id, 'primary_plmn_reserved', 3))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('primary_plmn_reserved', 2), array('action' => $search_action, $search_action_arg, $nds_id, 'primary_plmn_reserved', 2))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('primary_plmn_reserved', 4), array('action' => $search_action, $search_action_arg, $nds_id, 'primary_plmn_reserved', 4))?></div></div></div>
            <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $this->Html->link($ndsComparison->getCount('primary_plmn_reserved', 0), array('action' => $search_action, $search_action_arg, $nds_id, 'primary_plmn_reserved', 0))?></div></div></div>
            <div style="width: 0px; clear: both;"></div>
            <?PHP $i = (++$i % 2 == 0) ? 0 : 1 ?>
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>Pre / Post Check Results</legend>
    <?PHP echo "[" . $this->Html->link(__('Show in New Window', true), array('action' => 'view', $dataValues['Ndsmaster']['id'], 'ndsNewWindow'), array('target' => '_blank')) . "]"; ?>
    <div class="nds_view"><?PHP $i = 0; ?>
        <div class="ndscomp_table">
            <div class="ndscomp_row">
                <div class="ndscomp_col_header_id"><div class="ndscomp_col_header_inner"><a href="javascript:void(0)" title="Record ID">Record ID</a></div></div>
                <?PHP if($dataValues['Ndsmaster']['template_version'] == 2): ?>
                <div class="ndscomp_col_header_region"><div class="ndscomp_col_header_inner"><a href="javascript:void(0)" title="Region">Region</a></div></div>
                <?PHP endif; ?>
                <div class="ndscomp_col_header_site"><div class="ndscomp_col_header_inner"><a href="javascript:void(0)" title="Site Name">Site Name</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="PCI Status">PCI</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="Power Status">Power</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="Baseline">Baseline</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="Neighbor Upgrade">Neighbor</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="Alarms Cleared (Troubleshooting)">Alarms</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="ERBS Status">ERBS</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="Cell Status">Cell</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="MIMO/SIMO">MIMO/SIMO</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="Software Version">Software</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="Primary PLMN Reserved">PLMN</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="Cell Barred">Barred</a></div></div>
                <div class="ndscomp_col_header"><div class="ndscomp_col_header_inner_comparison"><a href="javascript:void(0)" title="Ready for Functional Test">Ready</a></div></div>
                <div class="ndscomp_col_header_comments"><div class="ndscomp_col_header_inner"><a href="javascript:void(0)" title="Pre-Check Comments">Pre-Check Comments</a></div></div>
                <div class="ndscomp_col_header_comments"><div class="ndscomp_col_header_inner"><a href="javascript:void(0)" title="Post-Check Comments">Post-Check Comments</a></div></div>
                <div style="width: 0px; clear: both;"></div>
                </div>
        <?PHP
            for($j = 0; $j < count($dataValues['Ndssite']); $j++) {
                ?>
                    <div class="ndscomp_row">
                        <div class="ndscomp_col_id"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_nocomparison"><?php echo $this->Html->link($dataValues['Ndssite'][$j]['id'], array('action' => 'viewsite', $dataValues['Ndssite'][$j]['id'], 'view', $dataValues['Ndsmaster']['id'], 'search', 'fromView'))?><?php echo ($dataValues['Ndsmaster']['engineer_signum'] == Authsome::get('username')) ? " [" . $this->Html->link(__('Edit', true), array('action' => 'editsite', $dataValues['Ndssite'][$j]['id'])) . "]" : ""; ?></div></div></div>
                        <?PHP if($dataValues['Ndsmaster']['template_version'] == 2): ?>
                        <div class="ndscomp_col_region"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_nocomparison"><?php echo !empty($dataValues['Ndssite'][$j]['lte_region']) ? $dataValues['Ndssite'][$j]['lte_region'] : "-"?></div></div></div>
                        <?PHP endif; ?>
                        <div class="ndscomp_col_site"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_nocomparison"><?php echo !empty($dataValues['Ndssite'][$j]['site_name']) ? $dataValues['Ndssite'][$j]['site_name'] : "-"?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['pci_status'])?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['power_status'])?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['baseline'])?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['neighbour_update'])?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['alarms_clear'])?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['erbs_status'])?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['cell_status'])?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['mimo_simo'])?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['software_version'])?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['primary_plmn_reserved'])?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['cell_barred'])?></div></div></div>
                        <div class="ndscomp_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_comparison"><?php echo $ndsComparison->display($dataValues['Ndssite'][$j]['ready_test'])?></div></div></div>
                        <div class="ndscomp_col_comments"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_nocomparison"><?php echo !empty($dataValues['Ndssite'][$j]['comments_precheck']) ? $dataValues['Ndssite'][$j]['comments_precheck'] : "&nbsp;"?></div></div></div>
                        <div class="ndscomp_col_comments"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="ndscomp_nocomparison"><?php echo !empty($dataValues['Ndssite'][$j]['comments_postcheck']) ? $dataValues['Ndssite'][$j]['comments_postcheck'] : "&nbsp;"?></div></div></div>
                        <div style="width: 0px; clear: both;"></div>
                        <?PHP $i = (++$i % 2 == 0) ? 0 : 1 ?>
                    </div>
                <?PHP
            }
        ?>
        </div>
    </div>
</fieldset>
</div>
<?PHP } ?>