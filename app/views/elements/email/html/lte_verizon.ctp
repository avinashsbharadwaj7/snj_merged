<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h2><?php __('View - LIT ID: ');
echo $dataValues['LitmasterVerizon']['id']; ?></h2>
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

    div.div_rssi_table {
        width: 520px;
        height: 128px;
        padding: 0px;
        margin: 0px;
    }

    div.div_rssi_row {
        width: 100%;
        padding: 0px;
        margin: 0px;
    }

    div.div_rssi_column_header {
        width: 62%;
        clear: none;
        float: left;
        padding: 0px;
        padding-bottom: 6px;
        margin: 0px;
        text-align: center;
    }

    div.div_rssi_column {
        width: 31%;
        clear: none;
        float: left;
        padding: 0px;
        padding-bottom: 6px;
        margin: 0px;
        text-align: center;
    }

    label.div_rssi_column {
        width: 0px;
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

    div.paginator_table {
        margin: 0px;
        padding: 0px;
        width: 100%;
    }

    div.paginator_row {
        padding: 0px;
        margin: 0px;
        width: 100%;
        min-width: 775px;
    }

    div.paginator_col_header_inner {
        padding: 6px;
        line-height: 1.5em;
        background-color: #c7e2cc;
    }

    div.paginator_col_header {
        clear: none;
        float: left;
        margin: 1px;
        border: 1px #000 solid;
        font-weight: bold;  
        width: 16%;
    }

    div.paginator_col_header_id {
        clear: none;
        float: left;
        margin: 1px;
        border: 1px #000 solid;
        font-weight: bold;
        width: 100px;
    }

    div.paginator_col_header_date {
        clear: none;
        float: left;
        margin: 1px;
        border: 1px #000 solid;
        font-weight: bold;
        width: 90px;
    }

    div.paginator_col_inner {
        padding: 6px;
    }

    div.paginator_col_inner_alt {
        padding: 6px;
        background: #E4E8EF;
    }

    div.paginator_col {
        clear: none;
        float: left;
        border: 1px #000 solid;
        margin: 1px;
        width: 16%;
        overflow: auto;
    }

    div.paginator_col_id {
        clear: none;
        float: left;
        border: 1px #000 solid;
        margin: 1px;
        width: 100px;
    }

    div.paginator_col_date {
        clear: none;
        float: left;
        margin: 1px;
        border: 1px #000 solid;
        width: 90px;
    }

    div.paginator_nav_left {
        text-align: left;
        margin: 0px;
        padding-bottom: 6px;
        padding-top: 6px;
        padding-left: 1px;
    }
</style>

<div class="lte_container">
    <fieldset>
        <legend>Basic Information</legend>
        <div class="lte_view"><?PHP $i = 0; ?>
            <div<?php if ($i++ % 2 == 0)
    echo $class; ?>>    
                <div class="view_col_left"><?php __('Date Last Modified'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['date_initiated']; ?></div>
                <div style="clear: both;"></div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Engineer Information</legend>
        <div class="lte_view"><?PHP $i = 0; ?>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                <div class="view_col_left"><?php __('Engineer Signum'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['engineer_signum']; ?></div>
                <div style="clear: both;"></div>
            </div>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                <div class="view_col_left"><?php __('Engineer Name'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['engineer_name']; ?></div>
                <div style="clear: both;"></div>
            </div>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                <div class="view_col_left"><?php __('Engineer Work Location'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['engineer_work_location']; ?></div>
                <div style="clear: both;"></div>
            </div>
        </div>
    </fieldset>  

    <fieldset>
        <legend>Project Information</legend>
        <div class="lte_view"><?PHP $i = 0; ?>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                <div class="view_col_left"><?php __('LTE Customer'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['lte_customer']; ?></div>
                <div style="clear: both;"></div>
            </div>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                <div class="view_col_left"><?php __('Region'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['region']; ?></div>
                <div style="clear: both;"></div>
            </div>                         
        </div>
    </fieldset>
    <fieldset>
        <legend>Site Information</legend>
        <div class="lte_view"><?PHP $i = 0; ?>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                <div class="view_col_left"><?php __('ENodeB Name'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['enb_name']; ?></div>
                <div style="clear: both;"></div>
            </div>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                <div class="view_col_left"><?php __('Area'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['area']; ?></div>
                <div style="clear: both;"></div>
            </div>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                <div class="view_col_left"><?php __('OSS'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['oss']; ?></div>
                <div style="clear: both;"></div>
            </div>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                <div class="view_col_left"><?php __('OSS Version'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['oss_version']; ?></div>
                <div style="clear: both;"></div>
            </div>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                <div class="view_col_left"><?php __('No of Cells/Sectors'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['no_cells']; ?></div>
                <div style="clear: both;"></div>
            </div>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                <div class="view_col_left"><?php __('MME 1 Name'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['mme1_name']; ?></div>
                <div style="clear: both;"></div>
            </div>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                <div class="view_col_left"><?php __('MME 1 IP Address'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['mme1_ip_address']; ?></div>
                <div style="clear: both;"></div>
            </div>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                <div class="view_col_left"><?php __('MME 2 Name'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['mme2_name']; ?></div>
                <div style="clear: both;"></div>
            </div>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                <div class="view_col_left"><?php __('MME 2 IP Address'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['mme2_ip_address']; ?></div>
                <div style="clear: both;"></div>
            </div>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                <div class="view_col_left"><?php __('TAC Information'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['tac_information']; ?></div>
                <div style="clear: both;"></div>
            </div>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                <div class="view_col_left"><?php __('Is ENodeB A Part Of MME Pool'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['node_part_pool']; ?></div>
                <div style="clear: both;"></div>
            </div>

        </div>
    </fieldset>

    <fieldset>
        <legend>Activity Information</legend>
        <div class="lte_view"><?PHP $i = 0; ?>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                <div class="view_col_left"><?php __('Activity'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['activity']; ?></div>
                <div style="clear: both;"></div>
            </div>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                <div class="view_col_left"><?php __('Activity Status'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['activity_status']; ?></div>
                <div style="clear: both;"></div>
            </div>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                <div class="view_col_left"><?php __('Time Taken for Activity'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['time_taken_for_activity'] . " (HH:MM)"; ?></div>
                <div style="clear: both;"></div>
            </div>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                <div class="view_col_left"><?php __('ASP Engineer Name'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['asp_engineer_name']; ?></div>
                <div style="clear: both;"></div>
            </div>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                <div class="view_col_left"><?php __('Sonar Updated'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['sonar_updated']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <fieldset>
                <legend><?php __('MOP Information'); ?></legend>
                <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                    <div class="view_col_left"><?php __('IP Connectivity'); ?></div>
                    <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['ip_connectivity']; ?></div>
                    <div style="clear: both;"></div>
                </div>
                <div<?php if ($i++ % 2 == 0)
                        echo $class; ?>>    
                    <div class="view_col_left"><?php __('Baseline Loaded'); ?></div>
                    <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['baseline_loaded']; ?></div>
                    <div style="clear: both;"></div>
                </div>
                <div<?php if ($i++ % 2 == 0)
                        echo $class; ?>>    
                    <div class="view_col_left"><?php __('NTP Pingable'); ?></div>
                    <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['ntp_pingable']; ?></div>
                    <div style="clear: both;"></div>
                </div>
            </fieldset>
        </div>
    </fieldset>

    <fieldset>
        <legend>Alarm Reporting</legend>
        <div class="lte_view"><?PHP $i = 0; ?>
            <div<?php if ($i++ % 2 == 0)
                        echo $class; ?>>    
                <div class="view_col_left"><?php __('ENodeB Alarm'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['enodeb_alarm']; ?></div>
                <div style="clear: both;"></div>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend>Site Integration Status</legend>
        <div class="lte_view"><?PHP $i = 0; ?>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <div class="view_col_left"><?php __('Integration Complete'); ?></div>
                <?php
                if ($dataValues['LitmasterVerizon']['integration_complete']) {
                    $integration_complete = "Yes";
                } else {
                    $integration_complete = "No";
                }
                ?>
                <div class="view_col_right"><?php echo $integration_complete; ?></div>
                <div style="clear: both;"></div>
            </div>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <div class="view_col_left"><?php __('Ready For Tuning'); ?></div>
                <?php
                if ($dataValues['LitmasterVerizon']['ready_for_tuning']) {
                    $ready_for_tuning = "Yes";
                } else {
                    $ready_for_tuning = "No";
                }
                ?>
                <div class="view_col_right"><?php echo $ready_for_tuning; ?></div>
                <div style="clear: both;"></div>
            </div>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <div class="view_col_left"><?php __('Ready For Service'); ?></div>
                <?php
                if ($dataValues['LitmasterVerizon']['ready_for_service']) {
                    $ready_for_service = "Yes";
                } else {
                    $ready_for_service = "No";
                }
                ?>
                <div class="view_col_right"><?php echo $ready_for_service; ?></div>
                <div style="clear: both;"></div>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend>Email Addresses of Recipients</legend>
        <div class="lte_view"><?PHP $i = 0; ?>
            <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                    <?php echo "<div class='paginator_col_inner_alt'>Please separate multiple addresses by semi-colons.</div>"; ?>
                <div class="view_col_left"><?php __('Email Addresses'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['email']; ?></div>
                <div style="clear: both;"></div>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend>Additional Comments</legend>
        <div class="lte_view"><?PHP $i = 0; ?>
            <div<?php if ($i++ % 2 == 0)
                        echo $class; ?>>
                <div class="view_col_left"><?php __('Additional Comments'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['additional_comments']; ?></div>
                <div style="clear: both;"></div>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend>File Upload</legend>
        <div class="lte_view"><?PHP $i = 0; ?>
            <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                <div class="view_col_left"><?php __('File Name'); ?></div>
                <div class="view_col_right"><?php
                if (isset($dataValues['LitfileVerizon']['file_name'])) {
                    echo $dataValues['LitfileVerizon']['file_name'];
                } else {
                    echo "No files uploaded.";
                }
                    ?>
                </div>
                <div style="clear: both;"></div>
            </div> 
        </div>
    </fieldset> 
</div>