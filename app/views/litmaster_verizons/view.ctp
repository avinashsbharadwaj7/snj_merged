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
    <?PHP
    echo $this->Html->link(__('LTE Home', true), array('controller' => 'litmasters', 'action' => 'index'));
    ?>
    <?PHP
    if ($dataValues['LitmasterVerizon']['engineer_signum'] == Authsome::get('username')) {
        echo '&nbsp;|&nbsp; ';
        echo $this->Html->link(__('Edit', true), array('action' => 'edit', $dataValues['LitmasterVerizon']['id']));
    }
    if (Authsome::check('/litmaster_verizons/export')) {
        echo '&nbsp;|&nbsp; ';
        echo $this->Html->link(__('Download Excel', true), array('action' => 'litexcel', $dataValues['LitmasterVerizon']['id'], true));
    }
    ?>

</li>

<h2><?php __('View - LIT ID: ');
    echo $dataValues['LitmasterVerizon']['id']; ?></h2>
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
            <div<?php if ($i++ % 2 == 0) echo $class;?>>    
                <div class="view_col_left"><?php __('Activity Status'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['activity_status']; ?></div>
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
                    <div class="view_col_left"><?php __('Problem in MOP'); ?></div>
                    <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['problem_in_mop']; ?></div>
                    <div style="clear: both;"></div>
                </div>
                <?php if($dataValues['LitmasterVerizon']['problem_in_mop'] === 'Yes') { ?>
                <div<?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                    <div class="view_col_left"><?php __('Reason For Problem in MOP'); ?></div>
                    <div class="view_col_right"><?php echo $dataValues['LitmasterVerizon']['reason_for_problem_in_mop']; ?></div>
                    <div style="clear: both;"></div>
                </div>
                <?php } ?>
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
                if (!empty($dataValues['LitfileVerizon']['file_name'])) {
                    echo $dataValues['LitfileVerizon']['file_name'];
//                    if (Authsome::check('/litmaster_verizons/export')) {
                        ?>
                        <div><?php echo $this->Html->link(__('Download File', true), array('action' => 'download', $dataValues['LitmasterVerizon']['id'], true)); ?>
                        </div>
                        <?php
//                    }
                    } else {
                        echo "No file uploaded.";
                    }
                    ?>
                </div>
                <div style="clear: both;"></div>
            </div> 
        </div>
    </fieldset>  

</div>