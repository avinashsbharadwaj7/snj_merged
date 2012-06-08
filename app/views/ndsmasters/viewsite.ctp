<?php
//LTE-NDS (Site view)
?>
<?PHP 
    echo $html->css("lte-lit");
    echo $html->css("lte-nds"); 
    $class = ' class="altrow"';
    
    $class_comp = " class=\"ndscomp_col_inner\"";
    $class_comp_alt = " class=\"ndscomp_col_inner_alt\"";
?>
<li>
    <?PHP if($action_link == 'search' || $action_link == 'export' || $action_link == 'searchsite') {
            echo $this->Html->link(__('Back', true), array('action' => $action_link, $action_arg_1));
        }
        else if($action_link == 'view' || $action_arg_2 == 'search') {
            echo $this->Html->link(__('Back', true), array('action' => $action_link, $action_arg_1, $action_arg_2, $action_arg_3));
        }
        else if($action_link == 'view') {
            echo $this->Html->link(__('Back', true), array('action' => $action_link, $action_arg_1, $action_arg_2));
        }
        else {
           echo $this->Html->link(__('Back', true), array('controller' => 'litmasters', 'action' => 'index'));
        }
        if($dataValues['Ndsmaster']['engineer_signum'] == Authsome::get('username')) {
            echo '&nbsp;|&nbsp;';
            echo $this->Html->link(__('Edit', true), array('action' => 'editsite', $dataValues['Ndssite']['id']));
        }
        if(Authsome::check('/ndsmasters/export')) {
            echo '&nbsp;|&nbsp;';
            echo $this->Html->link(__('Download Excel', true), array('action' => 'ndsexcel', $dataValues['Ndssite']['id'], 'viewsite'));
        }
    ?>
</li>
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