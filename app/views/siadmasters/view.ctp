<?php
//LTE (SIAD)
?>
<?PHP 
    echo $html->css("lte-lit");
    echo $html->css("lte-siad");
    $class = ' class="altrow"';
    $class_comp = " class=\"siad_col_inner\"";
    $class_comp_alt = " class=\"siad_col_inner_alt\"";
    $search_action = 'searchsite';
    $search_action_arg = 'loadSites';
    $siad_id = $dataValues['Siadmaster']['id'];
    
    if($action_link == "siadNewWindow") {
        echo $html->css("bcp");
        echo $html->css("css_menu");
        echo $html->css("permarinus_blue");
    ?>
        <div class="siad_view_new_window"><?PHP $i = 0; ?>
        <div class="siad_table">
            <div class="siad_row">
                <div class="siad_col_header_id"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Site Record ID">Site Record ID</a></div></div>
                <div class="siad_col_header_signum"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Engineer Signum">Signum</a></div></div>
                <div class="siad_col_header_name"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Engineer Name">Name</a></div></div>
                <div class="siad_col_header_work"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Work Location">Work Location</a></div></div>
                <div class="siad_col_header_team"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Team Name">Team</a></div></div>
                <div class="siad_col_header"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Customer">Customer</a></div></div>
                <div class="siad_col_header"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Region">Region</a></div></div>
                <div class="siad_col_header_site"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Node ID">Node ID</a></div></div>
                <div class="siad_col_header"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="SIAD CLLI">SIAD CLLI</a></div></div>
                <div class="siad_col_header"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="SIAD OAM Loopback IP Address">OAM Loopback IP</a></div></div>
                <div class="siad_col_header"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="OAM Default IP Address">OAM Default IP</a></div></div>
                <div class="siad_col_header"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Bearer Default IP Address">Bearer Default IP</a></div></div>
                <div class="siad_col_header_activity"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Activity Type">Activity Type</a></div></div>
                <div class="siad_col_header_activity"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Activity Status">Activity Status</a></div></div>
                <div class="siad_col_header_comments"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Site Comments">Comments</a></div></div>
                <div style="width: 0px; clear: both;"></div>
                </div>
        <?PHP
            for($j = 0; $j < count($dataValues['Siadsite']); $j++) {
                ?>
                    <div class="siad_row">
                        <div class="siad_col_id"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo $this->Html->link($dataValues['Siadsite'][$j]['id'], array('action' => 'viewsite', $dataValues['Siadsite'][$j]['id'], 'view', $dataValues['Siadmaster']['id'], 'search', 'fromView'))?><?php echo ($dataValues['Siadsite'][$j]['engineer_signum'] == Authsome::get('username')) ? " [" . $this->Html->link(__('Edit', true), array('action' => 'editsite', $dataValues['Siadsite'][$j]['id'])) . "]" : ""; ?></div></div></div>
                        <div class="siad_col_signum"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo $dataValues['Siadsite'][$j]['engineer_signum']; ?></div></div></div>
                        <div class="siad_col_name"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo $dataValues['Siadsite'][$j]['engineer_name']; ?></div></div></div>
                        <div class="siad_col_work"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo $dataValues['Siadsite'][$j]['engineer_work_location']; ?></div></div></div>
                        <div class="siad_col_team"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo $dataValues['Siadsite'][$j]['team_name']; ?></div></div></div>
                        <div class="siad_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo $dataValues['Siadsite'][$j]['lte_customer']; ?></div></div></div>
                        <div class="siad_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo $dataValues['Siadsite'][$j]['lte_region']; ?></div></div></div>
                        <div class="siad_col_site"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo !empty($dataValues['Siadsite'][$j]['site_name']) ? $dataValues['Siadsite'][$j]['site_name'] : "-"?></div></div></div>
                        <div class="siad_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo !empty($dataValues['Siadsite'][$j]['siad_clli']) ? $dataValues['Siadsite'][$j]['siad_clli'] : "-"?></div></div></div>
                        <div class="siad_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo !empty($dataValues['Siadsite'][$j]['oam_loopback_ip_address']) ? $dataValues['Siadsite'][$j]['oam_loopback_ip_address'] : "-"?></div></div></div>
                        <div class="siad_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo !empty($dataValues['Siadsite'][$j]['oam_default_ip_address']) ? $dataValues['Siadsite'][$j]['oam_default_ip_address'] : "-"?></div></div></div>
                        <div class="siad_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo !empty($dataValues['Siadsite'][$j]['bearer_default_ip_address']) ? $dataValues['Siadsite'][$j]['bearer_default_ip_address'] : "-"?></div></div></div>
                        <div class="siad_col_activity"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo !empty($dataValues['Siadsite'][$j]['siad_activity_type']) ? $dataValues['Siadsite'][$j]['siad_activity_type'] : "-"?></div></div></div>
                        <div class="siad_col_activity"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo !empty($dataValues['Siadsite'][$j]['siad_activity_status']) ? $dataValues['Siadsite'][$j]['siad_activity_status'] : "-"?></div></div></div>
                        <div class="siad_col_comments"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo !empty($dataValues['Siadsite'][$j]['additional_comments']) ? $dataValues['Siadsite'][$j]['additional_comments'] : "&nbsp;"?></div></div></div>
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
            echo $this->Html->link(__('Back', true), array('action' => $action_link, $action_arg_1));
        }
        else if($action_link == 'index') {
            echo $this->Html->link(__('Back', true), array('controller'=>'litmasters', 'action' => $action_link));
        }
        else {
           echo $this->Html->link(__('Back', true), array('action' => $action_link));
        }
        if($dataValues['Siadmaster']['engineer_signum'] == Authsome::get('username')) {
            echo '&nbsp;|&nbsp;';
            echo $this->Html->link(__('Edit', true), array('action' => 'edit', $dataValues['Siadmaster']['id'], true));
        }
        if(Authsome::check('/siadmasters/export')) {
            echo '&nbsp;|&nbsp;';
            echo $this->Html->link(__('Download Excel', true), array('action' => 'siadexcel', $dataValues['Siadmaster']['id']));
        }
    /* Sort the uploads according to file_tag.
     * We only need to display the filename, so the resulting array
     * will be one-dimensional associative.
     */
    $uploadValues = array();
    if(isset($dataValues['Siadfile'])) {
        foreach($dataValues['Siadfile'] as $upload=>$arr) {
            foreach($arr as $key=>$value) {
                if($key == 'file_tag') {
                    $uploadValues[$value] = $arr['file_name'];
                    break;
                }
            }
        }
    }
    ?>
</li>
<h2><?php  __('View - SIAD ID: ');
    echo $dataValues['Siadmaster']['id'];?></h2>
<div class="lte_container">
<fieldset>
    <legend>Basic Information</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Date Last Modified'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Siadmaster']['date_created']; ?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>Engineer Information</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Signum'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Siadmaster']['engineer_signum']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Siadmaster']['engineer_name']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Team Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Siadmaster']['team_name']; ?></div>
            <div style="clear: both;"></div>
        </div>                         
    </div>
</fieldset>
<fieldset>
    <legend>Master Record Comments</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Record Comments'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Siadmaster']['record_comments']; ?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>Site Records File</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('File'); ?></div>
            <div class="view_col_right"><?php echo (isset($uploadValues[3])) ? $this->Html->link($uploadValues[3], array('action' => 'download', $dataValues['Siadmaster']['id'], 3)) : "No file uploaded (<i>possibly due to a failed edit attempt</i>)"; ?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>Site Summary</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Total Sites Touched'); ?></div>
            <div class="view_col_right"><?php echo (!isset($dataValues['Siadsite'])) ? 0 : count($dataValues['Siadsite']); ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Site List'); ?></div>
            <div class="view_col_right"><?php
                if(isset($dataValues['Siadsite'])) {
                    $num_sites = count($dataValues['Siadsite']);
                    for($i = 0; $i < $num_sites; $i++) {
                        echo $dataValues['Siadsite'][$i]['site_name'];
                        if($i < $num_sites - 1) {
                            echo ", ";
                        }
                    }
                }
            ?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>Site Records</legend>
    <?PHP echo "[" . $this->Html->link(__('Show in New Window', true), array('action' => 'view', $dataValues['Siadmaster']['id'], 'siadNewWindow'), array('target' => '_blank')) . "]"; ?>
    <div class="siad_view"><?PHP $i = 0; ?>
        <div class="siad_table">
            <div class="siad_row">
                <div class="siad_col_header_id"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Site Record ID">Site Record ID</a></div></div>
                <div class="siad_col_header_signum"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Engineer Signum">Signum</a></div></div>
                <div class="siad_col_header_name"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Engineer Name">Name</a></div></div>
                <div class="siad_col_header_work"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Work Location">Work Location</a></div></div>
                <div class="siad_col_header_team"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Team Name">Team</a></div></div>
                <div class="siad_col_header"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Customer">Customer</a></div></div>
                <div class="siad_col_header"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Region">Region</a></div></div>
                <div class="siad_col_header_site"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Node ID">Node ID</a></div></div>
                <div class="siad_col_header"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="SIAD CLLI">SIAD CLLI</a></div></div>
                <div class="siad_col_header"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="SIAD OAM Loopback IP Address">OAM Loopback IP</a></div></div>
                <div class="siad_col_header"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="OAM Default IP Address">OAM Default IP</a></div></div>
                <div class="siad_col_header"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Bearer Default IP Address">Bearer Default IP</a></div></div>
                <div class="siad_col_header_activity"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Activity Type">Activity Type</a></div></div>
                <div class="siad_col_header_activity"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Activity Status">Activity Status</a></div></div>
                <div class="siad_col_header_comments"><div class="siad_col_header_inner"><a href="javascript:void(0)" title="Site Comments">Comments</a></div></div>
                <div style="width: 0px; clear: both;"></div>
                </div>
        <?PHP
            for($j = 0; $j < count($dataValues['Siadsite']); $j++) {
                ?>
                    <div class="siad_row">
                        <div class="siad_col_id"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo $this->Html->link($dataValues['Siadsite'][$j]['id'], array('action' => 'viewsite', $dataValues['Siadsite'][$j]['id'], 'view', $dataValues['Siadmaster']['id'], 'search', 'fromView'))?><?php echo ($dataValues['Siadsite'][$j]['engineer_signum'] == Authsome::get('username')) ? " [" . $this->Html->link(__('Edit', true), array('action' => 'editsite', $dataValues['Siadsite'][$j]['id'])) . "]" : ""; ?></div></div></div>
                        <div class="siad_col_signum"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo $dataValues['Siadsite'][$j]['engineer_signum']; ?></div></div></div>
                        <div class="siad_col_name"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo $dataValues['Siadsite'][$j]['engineer_name']; ?></div></div></div>
                        <div class="siad_col_work"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo $dataValues['Siadsite'][$j]['engineer_work_location']; ?></div></div></div>
                        <div class="siad_col_team"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo $dataValues['Siadsite'][$j]['team_name']; ?></div></div></div>
                        <div class="siad_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo $dataValues['Siadsite'][$j]['lte_customer']; ?></div></div></div>
                        <div class="siad_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo $dataValues['Siadsite'][$j]['lte_region']; ?></div></div></div>
                        <div class="siad_col_site"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo !empty($dataValues['Siadsite'][$j]['site_name']) ? $dataValues['Siadsite'][$j]['site_name'] : "-"?></div></div></div>
                        <div class="siad_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo !empty($dataValues['Siadsite'][$j]['siad_clli']) ? $dataValues['Siadsite'][$j]['siad_clli'] : "-"?></div></div></div>
                        <div class="siad_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo !empty($dataValues['Siadsite'][$j]['oam_loopback_ip_address']) ? $dataValues['Siadsite'][$j]['oam_loopback_ip_address'] : "-"?></div></div></div>
                        <div class="siad_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo !empty($dataValues['Siadsite'][$j]['oam_default_ip_address']) ? $dataValues['Siadsite'][$j]['oam_default_ip_address'] : "-"?></div></div></div>
                        <div class="siad_col"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo !empty($dataValues['Siadsite'][$j]['bearer_default_ip_address']) ? $dataValues['Siadsite'][$j]['bearer_default_ip_address'] : "-"?></div></div></div>
                        <div class="siad_col_activity"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo !empty($dataValues['Siadsite'][$j]['siad_activity_type']) ? $dataValues['Siadsite'][$j]['siad_activity_type'] : "-"?></div></div></div>
                        <div class="siad_col_activity"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo !empty($dataValues['Siadsite'][$j]['siad_activity_status']) ? $dataValues['Siadsite'][$j]['siad_activity_status'] : "-"?></div></div></div>
                        <div class="siad_col_comments"><div<?PHP echo ($i == 0) ? $class_comp : $class_comp_alt; ?>><div class="siad_nocomparison"><?php echo !empty($dataValues['Siadsite'][$j]['additional_comments']) ? $dataValues['Siadsite'][$j]['additional_comments'] : "&nbsp;"?></div></div></div>
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