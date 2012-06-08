<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//LTE
?>
<?PHP 
    echo $html->css("lte-lit"); 
    $class = ' class="altrow"';
?>

<li>
    <?PHP if($action_link == 'search' || $action_link == 'export') {
            echo $this->Html->link(__('Back', true), array('action' => $action_link, $action_arg_1));
        }
        else if($action_link == 'edit') {
            echo $this->Html->link(__('Back', true), array('action' => $action_link,null, $dataValues['Litmaster']['id']));
        }
        else {
           echo $this->Html->link(__('Back', true), array('action' => $action_link));
        }
        if($dataValues['Litmaster']['engineer_signum'] == Authsome::get('username')) {
            echo '&nbsp;|&nbsp;';
            echo $this->Html->link(__('Edit', true), array('action' => 'edit', $dataValues['Litmaster']['id'], true));
        }
        if(Authsome::check('/litmasters/export')) {
            echo '&nbsp;|&nbsp;';
            echo $this->Html->link(__('Download Excel', true), array('action' => 'litexcel', $dataValues['Litmaster']['id'], true));
        }
    /* Sort the uploads according to file_tag.
     * We only need to display the filename, so the resulting array
     * will be one-dimensional associative.
     */
    $uploadValuesSup = array();
    if(isset($dataValues['LitfileSupplementary'])) {
        foreach($dataValues['LitfileSupplementary'] as $upload=>$arr) {
            foreach($arr as $key=>$value) {
                if($key == 'file_tag') {
                    $uploadValuesSup[$value] = $arr['file_name'];
                    break;
                }
            }
        }
    }
    $uploadValues = array();
    if(isset($dataValues['Litfile'])) {
        foreach($dataValues['Litfile'] as $upload=>$arr) {
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

<h2><?php  __('View - LIT ID: ');
    echo $dataValues['Litmaster']['id'];?></h2>
<div class="lte_container">
<fieldset>
    <legend>Basic Information</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Date Last Modified'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['date_initiated']; ?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>Engineer Information</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Signum'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['engineer_signum']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['engineer_name']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Work Location'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['engineer_work_location']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?PHP if($showFields->display('engineer_work_location', $dataValues['Litmaster']['engineer_work_location'])) { ?>
            <div<?php if ($i++ % 2 == 0) echo $class;?>>
                <div class="view_col_left"><?PHP __('-Location'); ?></div>
                <div class="view_col_right"><?PHP echo $dataValues['Litmaster']['work_location_remote'] . ' '; ?></div>
                <div style="clear: both;"></div>
            </div>
        <?PHP } ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Team Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['team_name']; ?></div>
            <div style="clear: both;"></div>
        </div>                         
    </div>
</fieldset>  
    
<fieldset>
    <legend>Project Information</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('LTE Customer'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['lte_customer']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Region'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['region']; ?></div>
            <div style="clear: both;"></div>
        </div>                         
    </div>
</fieldset>
<fieldset>
    <legend>Site Information</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Site Name(ENodeB Name)'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['site_name']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Area'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['area']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('OSS'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['oss']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('OSS Version'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['oss_version']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('No of Cells/Sectors'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['no_cells']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('MME 1 Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['mme1_name']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('MME 1 IP Address'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['mme1_ip_address']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('MME 2 Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['mme2_name']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('MME 2 IP Address'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['mme2_ip_address']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('TAC Information'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['tac_information']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Is ENodeB A Part Of MME Pool'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['node_part_pool']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?PHP if($showFields->display('node_part_pool', $dataValues['Litmaster']['node_part_pool'])) { ?>
                <div<?php if ($i++ % 2 == 0) echo $class;?>>
                    <div class="view_col_left"><?PHP __('-Explanation'); ?></div>
                    <div class="view_col_right"><?PHP echo $dataValues['Litmaster']['node_part_pool_explain'] . ' '; ?></div>
                    <div style="clear: both;"></div>
                </div>
        <?PHP } ?>

    </div>
</fieldset>
    
<fieldset>
    <legend>Activity Information</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Activity Type'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['activity_type']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Activity Status'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['activity_status']; ?></div>
            <div style="clear: both;"></div>
        </div>
         <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Activity Comments'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['activity_type_comments']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Password Set'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['password_set']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('No of DULs'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['no_dul']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Onsite Engineer Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['onsite_engineer_name']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Onsite Engineer Phone Number'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['onsite_engineer_phone']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Step In MOP At Which ASP Called In'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['stepin_mop']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <fieldset>
        <legend><?php __('MOP Information'); ?></legend>
         <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('LTE NIC MOP Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['lte_nic_mop_name']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('LTE NIC MOP Version'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['lte_nic_mop_version']; ?></div>
            <div style="clear: both;"></div>
        </div>
         <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('On Site MOP Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['onsite_mop_name']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('On Site MOP Version'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['onsite_mop_version']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Problem in MOP'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['problem_in_mop']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php if($dataValues['Litmaster']['problem_in_mop'] === "Yes") {        ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Reason for Problem'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['reason_for_problem_in_mop']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } ?>
         <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Synchronization Source'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['sync_source']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('LKF Uploaded To OSS'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['lkf_oss']; ?></div>
            <div style="clear: both;"></div>
        </div>
         <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('LKF Installed on eNodeB'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['lkf_enodeb']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('IP Connectivity'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['ip_connectivity']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?PHP if($showFields->display('ip_connectivity', $dataValues['Litmaster']['ip_connectivity'])) { ?>
                <div<?php if ($i++ % 2 == 0) echo $class;?>>
                    <div class="view_col_left"><?PHP __('-Explanation'); ?></div>
                    <div class="view_col_right"><?PHP echo $dataValues['Litmaster']['ip_connectivity_explain'] . ' '; ?></div>
                    <div style="clear: both;"></div>
                </div>
        <?PHP } ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Cell/Sector Status'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['cell_status']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Software Basic Package'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['soft_basic']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?PHP if($showFields->display('soft_basic', $dataValues['Litmaster']['soft_basic'])) { ?>
                <div<?php if ($i++ % 2 == 0) echo $class;?>>
                    <div class="view_col_left"><?php __('-Package'); ?></div>
                    <div class="view_col_right"><?php echo $dataValues['Litmaster']['soft_basic_package']; ?></div>
                    <div style="clear: both;"></div>
                </div>
        <?PHP } ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Software Upgrade Performed'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['soft_upgrade_performed']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?PHP if($showFields->display('soft_upgrade_performed', $dataValues['Litmaster']['soft_upgrade_performed'])) { ?>
                <div<?php if ($i++ % 2 == 0) echo $class;?>>
                    <div class="view_col_left"><?php __('-Software Upgrade Package'); ?></div>
                    <div class="view_col_right"><?php echo $dataValues['Litmaster']['soft_upload']; ?></div>
                    <div style="clear: both;"></div>
                </div>
        <?PHP } ?>
        <?PHP if($showFields->display('soft_upload', $dataValues['Litmaster']['soft_upload'])) { ?>
                <div<?php if ($i++ % 2 == 0) echo $class;?>>
                    <div class="view_col_left"><?php __('-Package'); ?></div>
                    <div class="view_col_right"><?php echo $dataValues['Litmaster']['soft_upload_package']; ?></div>
                    <div style="clear: both;"></div>
                </div>
        <?PHP } ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Basic CV Removed from Rollback list'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['cv_rollback']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('CV Uploaded to OSS FTP Server'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['cv_uploaded_oss']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('System Constants Loaded'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['system_constants_loaded']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?PHP if($showFields->display('system_constants_loaded', $dataValues['Litmaster']['system_constants_loaded']) && isset($uploadValues[2])) { ?>
                <div<?php if ($i++ % 2 == 0) echo $class;?>>
                    <div class="view_col_left"><?PHP __('-File Name'); ?></div>
                    <div class="view_col_right"><?php echo $this->Html->link($uploadValues[2], array('action' => 'download', $dataValues['Litmaster']['id'], 2)); ?></div>
                    <div style="clear: both;"></div>
                </div>
        <?PHP } ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Baseline Loaded'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['baseline_loaded']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('OnSite Router Information(OSR)'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['osr_info']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('3PP Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['3pp_name']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('OnSite Router(OSR) Software Level'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['osr_softlevel']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('OnSite Router(OSR) Pingable'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['osr_pingable']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('OnSite Router(OSR) Alarm'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['osr_alarm']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('OnSite Router(OSR) Version'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['osr_version']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('OnSite Router(OSR) Password'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['osr_password']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Default Router Pingable(SIU/SIAD/Site Router)'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['default_pingable']; ?></div>
            <div style="clear: both;"></div>
        </div>
         <?PHP if($showFields->display('default_pingable', $dataValues['Litmaster']['default_pingable'])) { ?>
                <div<?php if ($i++ % 2 == 0) echo $class;?>>
                    <div class="view_col_left"><?PHP __('-Reason'); ?></div>
                    <div class="view_col_right"><?PHP echo $dataValues['Litmaster']['default_pingable_reason'] . ' '; ?></div>
                    <div style="clear: both;"></div>
                </div>
        <?PHP } ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('NTP Pingable'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['ntp_pingable']; ?></div>
            <div style="clear: both;"></div>
        </div>
         <?PHP if($showFields->display('ntp_pingable', $dataValues['Litmaster']['ntp_pingable'])) { ?>
                <div<?php if ($i++ % 2 == 0) echo $class;?>>
                    <div class="view_col_left"><?PHP __('-Reason'); ?></div>
                    <div class="view_col_right"><?PHP echo $dataValues['Litmaster']['ntp_pingable_reason'] . ' '; ?></div>
                    <div style="clear: both;"></div>
                </div>
        <?PHP } ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('OSS FTP Server Pingable'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['oss_pingable']; ?></div>
            <div style="clear: both;"></div>
        </div>
         <?PHP if($showFields->display('oss_pingable', $dataValues['Litmaster']['oss_pingable'])) { ?>
                <div<?php if ($i++ % 2 == 0) echo $class;?>>
                    <div class="view_col_left"><?PHP __('-Reason'); ?></div>
                    <div class="view_col_right"><?PHP echo $dataValues['Litmaster']['oss_pingable_reason'] . ' '; ?></div>
                    <div style="clear: both;"></div>
                </div>
        <?PHP } ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Term Point To MME'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['term_mme']; ?></div>
            <div style="clear: both;"></div>
        </div>
         <?PHP if($showFields->display('term_mme', $dataValues['Litmaster']['term_mme'])) { ?>
                <div<?php if ($i++ % 2 == 0) echo $class;?>>
                    <div class="view_col_left"><?PHP __('-Reason'); ?></div>
                    <div class="view_col_right"><?PHP echo $dataValues['Litmaster']['term_mme_reason'] . ' '; ?></div>
                    <div style="clear: both;"></div>
                </div>
        <?PHP } ?>
        </fieldset>
    </div>
</fieldset>

<fieldset>
    <legend>Alarm Reporting</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Number of Alarms'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['number_of_alarms']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Actual Text Alarms'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['actual_text_alarms']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Heartbeat Alarm (eNodeB)'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['heartbeat_alarm']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Number of Alarms Matched between eNodeB & ALV'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['alarms_matched_alv']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Heartbeat Alarm (OSR)'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['heartbeat_alarm_osr']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Number of Alarms Matched between OSR & ALV'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['alarms_matched_osr']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Reasons For ALV Related Issues (Please Be As Descriptive As Possible)'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['alarm_issues']; ?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</fieldset>
<fieldset>
         <legend>Antenna Information</legend>
         <div class="lte_view"><?PHP $i = 0; ?>
             <div<?php if ($i++ % 2 == 0) echo $class;?>>
		<div class="view_col_left"><?php __('Any Alarms/Issues Related To Antenna'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['Litmaster']['antenna_alarms']; ?></div>
                <div style="clear: both;"></div>
             </div>
             
             <?PHP if($showFields->display('antenna_alarms', $dataValues['Litmaster']['antenna_alarms'])) { ?>
                <div<?php if ($i++ % 2 == 0) echo $class;?>>
                    <div class="view_col_left"><?PHP __('-Number Of Issues/Alarms'); ?></div>
                    <div class="view_col_right"><?PHP echo $dataValues['Litmaster']['antenna_alarms_count'] . ' '; ?></div>
                    <div style="clear: both;"></div>
                </div>
                <div<?php if ($i++ % 2 == 0) echo $class;?>>
                    <div class="view_col_left"><?PHP __('-Issues/Alarms Information'); ?></div>
                    <div class="view_col_right"><?PHP echo $dataValues['Litmaster']['antenna_alarms_count_info'] . ' '; ?></div>
                    <div style="clear: both;"></div>
                </div>
             <?PHP } ?>
             
             <div<?php if ($i++ % 2 == 0) echo $class;?>>
		<div class="view_col_left"><?php __('Antenna Work Seems Complete'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['Litmaster']['antenna_complete']; ?></div>
                <div style="clear: both;"></div>
             </div>
             <div<?php if ($i++ % 2 == 0) echo $class;?>>
		<div class="view_col_left"><?php __('Location of RRU'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['Litmaster']['rru_loc']; ?></div>
                <div style="clear: both;"></div>
             </div>
             <div<?php if ($i++ % 2 == 0) echo $class;?>>
		<div class="view_col_left"><?php __('Connectors/Jumpers'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['Litmaster']['conn_jump']; ?></div>
                <div style="clear: both;"></div>
             </div>
             <div<?php if ($i++ % 2 == 0) echo $class;?>>
		<div class="view_col_left"><?php __('Type of Cable (Fiber, Coax etc)'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['Litmaster']['cable_type']; ?></div>
                <div style="clear: both;"></div>
             </div>
         </div>
    </fieldset>

<fieldset>
    <legend>Call Testing (CT)</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Was CT Performed On Dummy Load'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['ct_dummyload']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <?PHP if($showFields->display('ct_dummyload', $dataValues['Litmaster']['ct_dummyload'])) { ?>
            <div<?php if ($i++ % 2 == 0) echo $class;?>>
                <div class="view_col_left"><?PHP __('-Reason'); ?></div>
                <div class="view_col_right"><?PHP echo $dataValues['Litmaster']['ct_dummyload_reason'] . ' '; ?></div>
                <div style="clear: both;"></div>
            </div>
        <?PHP } ?>
        
        <fieldset>
            <legend>RSSI Values</legend>
            <div class="lte_view"><?PHP $i = 0; ?>
                <div<?php if ($i++ % 2 == 0) echo $class;?>>
                    <div class="view_col_left"><?php __('Sector A - Branch A'); ?></div>
                    <div class="view_col_right"><?php echo $dataValues['Litmaster']['rssi_sector_a_branch_a']; ?></div>
                    <div style="clear: both;"></div>
                </div>
                <div<?php if ($i++ % 2 == 0) echo $class;?>>
                    <div class="view_col_left"><?php __('Sector A - Branch B'); ?></div>
                    <div class="view_col_right"><?php echo $dataValues['Litmaster']['rssi_sector_a_branch_b']; ?></div>
                    <div style="clear: both;"></div>
                </div>
                <div<?php if ($i++ % 2 == 0) echo $class;?>>
                    <div class="view_col_left"><?php __('Sector B - Branch A'); ?></div>
                    <div class="view_col_right"><?php echo $dataValues['Litmaster']['rssi_sector_b_branch_a']; ?></div>
                    <div style="clear: both;"></div>
                </div>
                <div<?php if ($i++ % 2 == 0) echo $class;?>>
                    <div class="view_col_left"><?php __('Sector B - Branch B'); ?></div>
                    <div class="view_col_right"><?php echo $dataValues['Litmaster']['rssi_sector_b_branch_b']; ?></div>
                    <div style="clear: both;"></div>
                </div>
                <div<?php if ($i++ % 2 == 0) echo $class;?>>
                    <div class="view_col_left"><?php __('Sector C - Branch A'); ?></div>
                    <div class="view_col_right"><?php echo $dataValues['Litmaster']['rssi_sector_c_branch_a']; ?></div>
                    <div style="clear: both;"></div>
                </div>
                <div<?php if ($i++ % 2 == 0) echo $class;?>>
                    <div class="view_col_left"><?php __('Sector C - Branch B'); ?></div>
                    <div class="view_col_right"><?php echo $dataValues['Litmaster']['rssi_sector_c_branch_b']; ?></div>
                    <div style="clear: both;"></div>
                </div>
            </div>
        </fieldset>
        
        <div<?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('RRUL Version'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['rrul_version']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('RRUS Version'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['rrus_version']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('PCI Visible On The CT Equipment'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['pci_visible_ct']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Was Cell/Sector Locked For CT'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['ct_cell_sector_locked']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <?PHP if($showFields->display('ct_cell_sector_locked', $dataValues['Litmaster']['ct_cell_sector_locked'])) { ?>
            <div<?php if ($i++ % 2 == 0) echo $class;?>>
                <div class="view_col_left"><?PHP __('-Reason'); ?></div>
                <div class="view_col_right"><?PHP echo $dataValues['Litmaster']['ct_cell_sector_locked_explain'] . ' '; ?></div>
                <div style="clear: both;"></div>
            </div>
        <?PHP } ?>
       
    </div>
</fieldset>
    
<fieldset>
    <legend>Data Test Result</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Sector A Uplink'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['sector_a_uplink']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Sector A Downlink'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['sector_a_downlink']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Sector B Uplink'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['sector_b_uplink']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Sector B Downlink'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['sector_b_downlink']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Sector C Uplink'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['sector_c_uplink']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Sector C Downlink'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['sector_c_downlink']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Were Screenshots Taken And Sent To PM'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['screen_shot']; ?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</fieldset>
    
<fieldset>
    <legend>Site Integration Status</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Site Integrated'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['site_integrated']; ?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</fieldset>
 
<fieldset>
    <legend>Additional Comments</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Additional Comments'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['additional_comments']; ?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</fieldset>
<?PHP if(isset($dataValues['LitfileSupplementary']) && is_array($dataValues['LitfileSupplementary'])) { ?>
<fieldset>
    <legend>File Uploads</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <?PHP $empty_flag = true;
            for($j = 0; $j < count($uploadValuesSup); $j++) {
                if(isset($uploadValuesSup[$j])) {
                    $empty_flag = false;
        ?>
            <div<?php if ($i++ % 2 == 0) echo $class;?>>
                <div class="view_col_left"><?php __('File ' . ($j + 1)); ?></div>
                <div class="view_col_right"><?php echo $this->Html->link($uploadValuesSup[$j], array('action' => 'download', $dataValues['Litmaster']['id'], $j, 'LitfileSupplementary')); ?></div>
                <div style="clear: both;"></div>
            </div>
            <?PHP } ?>
        <?PHP } 
            if($empty_flag) { ?>
               No Files Added 
        <?PHP }?>
    </div>
</fieldset> 
<?PHP } ?>
</div>