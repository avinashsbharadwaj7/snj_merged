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
<?php echo $html->script('tmobile_view'); ?>
<li>
    <?PHP
    echo $html->link("Back", array('controller' => 'slmasters', 'action' => 'index'));
    ?>
   

</li>
<br>
<?php $view_fields = $view_fields[0]['TmobileSlmaster']; ?>
<h2><?php __('SL Report Details: ');
echo "SLRW" . $view_fields['id']; ?></h2>
<br>
<h2><?php __('Date Created: ');
    echo $view_fields['date_created']; ?></h2>
<br>
<h2><?php __('Date Modified ');
    echo $view_fields['date_created']; ?></h2>

<fieldset>
    <legend>Engineer Information</legend>

    <div class="lte_view"><?PHP $i = 0; ?>

        <div <?php if ($i++ % 2 == 0)
        echo $class; ?>>
            <div class="view_col_left"><?php __('NIC Engineer Signum'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['nic_signum']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
            <div class="view_col_left"><?php __('NIC Engineer Name'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['nic_name']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
            <div class="view_col_left"><?php __('Work Location'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['work_location_other'] != "")
                echo $view_fields['work_location'] . " - " . $view_fields['work_location_other'];
            else
                echo $view_fields['work_location'];
?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</fieldset>

<fieldset>
    <legend>Project Information</legend>

    <div class="lte_view"><?PHP $i = 0; ?>
        <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
            <div class="view_col_left"><?php __('Customer'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['customer']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
            <div class="view_col_left"><?php __('Network Number'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['network_number']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
            <div class="view_col_left"><?php __('Project Manager'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['project_manager']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
            <div class="view_col_left"><?php __('SDM'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['sdm']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
            <div class="view_col_left"><?php __('Region'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['region']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
            <div class="view_col_left"><?php __('Technology'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['technology']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
            <div class="view_col_left"><?php __('ATND/TCM Engineer Name/Signum'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['tcm_name_signum']; ?></div>
            <div style="clear: both;"></div>
        </div>
      
        <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
            <div class="view_col_left"><?php __('Date Activity Performed'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['date_activity_performed']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
            <div class="view_col_left"><?php __('Access Method Used'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['access_method']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['access_method'] == "Sonar") { ?>

            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left"><?php __('Reason why Sonar was used'); ?></div>
                <?php $view_fields['access_method_sonar'] = str_replace(' ', '&nbsp;', $view_fields['access_method_sonar']);
                $view_fields['access_method_sonar'] = nl2br($view_fields['access_method_sonar']); ?>
                <div class="view_col_right"><?php echo $view_fields['access_method_sonar']; ?></div>

                <div style="clear: both;"></div>
            </div>

        <?php } ?>

        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left"><?php __('MOP Used'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['mop_used']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['mop_used'] == "Yes") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left"><?php __('MOP Version'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['mop_version']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                <div class="view_col_left"><?php __('Problems encountered with the MOP'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['mop_problem']; ?></div>
                <div style="clear: both;"></div>
            </div>
        <?php } ?>


        <?php if ($view_fields['mop_problem'] == "Yes") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left"><?php __('MOP Problems Description'); ?></div>
                <?php $view_fields['mop_problem_description'] = str_replace(' ', '&nbsp;', $view_fields['mop_problem_description']);
                $view_fields['mop_problem_description'] = nl2br($view_fields['mop_problem_description']); ?>
                <div class="view_col_right"><?php echo $view_fields['mop_problem_description']; ?></div>
                <div style="clear: both;"></div>
            <?php } ?>
        </div>
</fieldset>

<fieldset>
    <legend>Activity Information</legend>

    <div class="lte_view"><?PHP $i = 0; ?>

        <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
            <div class="view_col_left"><?php __('Activity'); ?></div>
            <div class="view_col_right" id="activity_type_selected"><?php echo $view_fields['activity_type'] ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php
        if ($view_fields['activity_type'] == 'Other') {
            ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left"><?php __('Activity Description'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['activity_type_other']; ?></div>
                <div style="clear: both;"></div>
            </div>

        <?php } ?>



        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left"><?php __('Activity Result'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['activity_result'] ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['activity_result'] == "Successful with issues - Follow-up Required") { ?>

            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left"><?php __('Issue Owner'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['issue_owner']; ?></div>
                <div style="clear: both;"></div>
            </div>

        <?php } ?>

        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left"><?php __('RNC'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['rnc']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
            <div class="view_col_left"><?php __('OSS'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['oss']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
            <div class="view_col_left"><?php __('RBS/s'); ?></div>
            <?php $view_fields['rbs'] = str_replace(' ', '&nbsp;', $view_fields['rbs']);
            $view_fields['rbs'] = nl2br($view_fields['rbs']); ?>
            <div class="view_col_right"><?php echo $view_fields['rbs']; ?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</fieldset>

<fieldset>
    <legend>Checkpoints</legend>

    <div class="lte_view"><?PHP $i = 0; ?>

        <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
            <div class="view_col_left"><?php __('Pre CV Created'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['pre_cv'] == '1')
                echo "Yes"; else
                echo "No";
            ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
            <div class="view_col_left"><?php __('Post CV Created'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['post_cv'] == '1')
                echo "Yes"; else
                echo "No";
            ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['pre_check'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left"><?php __('Pre Check Complete'); ?></div>
                <div class="view_col_right"><?php
            if ($view_fields['pre_check'] == '1')
                echo "Yes"; else
                echo "No";
            ?></div>
                <div style="clear: both;"></div>
            </div>

            <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <div class="view_col_left"><?php __('Pre Check KPIs'); ?></div>
                <?php $view_fields['pre_check_comments'] = str_replace(' ', '&nbsp;', $view_fields['pre_check_comments']);
                $view_fields['pre_check_comments'] = nl2br($view_fields['pre_check_comments']); ?>
                <div class="view_col_right"><?php echo $view_fields['pre_check_comments']; ?></div>

                <div style="clear: both;"></div>
            </div>

        <?php }
        else { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left"><?php __('Pre Check Complete'); ?></div>
                <div class="view_col_right"><?php
            if ($view_fields['pre_check'] == '1')
                echo "Yes"; else
                echo "No";
            ?></div>
                <div style="clear: both;"></div>
            </div>
        <?php } ?>

        <?php if ($view_fields['post_check'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left"><?php __('Post Check Complete'); ?></div>
                <div class="view_col_right"><?php
            if ($view_fields['post_check'] == '1')
                echo "Yes"; else
                echo "No";
            ?></div>
                <div style="clear: both;"></div>
            </div>

            <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <div class="view_col_left"><?php __('Post Check KPIs'); ?></div>
                <?php $view_fields['post_check_comments'] = str_replace(' ', '&nbsp;', $view_fields['post_check_comments']);
                $view_fields['post_check_comments'] = nl2br($view_fields['post_check_comments']); ?>
                <div class="view_col_right"><?php echo $view_fields['post_check_comments']; ?></div>

                <div style="clear: both;"></div>
            </div>

        <?php }
        else { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left"><?php __('Post Check Complete'); ?></div>
                <div class="view_col_right"><?php
            if ($view_fields['post_check'] == '1')
                echo "Yes"; else
                echo "No";
            ?></div>
                <div style="clear: both;"></div>
            </div>
        <?php } ?>

        <?php if ($view_fields['alarms'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left"><?php __('Alarms'); ?></div>
                <div class="view_col_right"><?php
            if ($view_fields['alarms'] == '1')
                echo "Yes"; else
                echo "No";
            ?></div>
                <div style="clear: both;"></div>
            </div>

            <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <div class="view_col_left"><?php __('Alarms Description'); ?></div>
                <?php $view_fields['alarm_comments'] = str_replace(' ', '&nbsp;', $view_fields['alarm_comments']);
                $view_fields['alarm_comments'] = nl2br($view_fields['alarm_comments']); ?>
                <div class="view_col_right"><?php echo $view_fields['alarm_comments']; ?></div>

                <div style="clear: both;"></div>
            </div>

        <?php }
        else { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left"><?php __('Alarms'); ?></div>
                <div class="view_col_right"><?php
            if ($view_fields['alarms'] == '1')
                echo "Yes"; else
                echo "No";
            ?></div>
                <div style="clear: both;"></div>
            </div>
        <?php } ?>

        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left"><?php __('Pre and Post Check KPIs Consistent'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['kpi_consistency'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
            <div class="view_col_left"><?php __('OSS Cleanup Complete - Scripts Deleted'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['oss_cleanup_scripts'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
            <div class="view_col_left"><?php __('OSS Cleanup Complete - PCs cleared'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['oss_cleanup_PC'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

    </div>
</fieldset>
<fieldset class="hide_class" id="rnc">
    <legend>RNC Scripts</legend>

    <div class="hide_class" id="rnc_script1_div">
        <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('Sitename_02_RNC_UtranCell_2nd_carrier_West_baseline_10_1 script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rnc_script1'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rnc_script1'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('Sitename_02_RNC_UtranCell_2nd_carrier_West_baseline_10_1 script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rnc_script1_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rnc_script1_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rnc_script1_comments'] = str_replace(' ', '&nbsp;', $view_fields['rnc_script1_comments']);
                    $view_fields['rnc_script1_comments'] = nl2br($view_fields['rnc_script1_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rnc_script1_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rnc_script1_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rnc_script1_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rnc_script1_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rnc_script1_tcm_explanation']);
                        $view_fields['rnc_script1_tcm_explanation'] = nl2br($view_fields['rnc_script1_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rnc_script1_tcm_explanation']; ?></div>

                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>

    <div class="hide_class" id="rnc_script2_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('Sitename_01_RNC_IMA_Modify_VC41 script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rnc_script2'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rnc_script2'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('Sitename_01_RNC_IMA_Modify_VC41 script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rnc_script2_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rnc_script2_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rnc_script2_comments'] = str_replace(' ', '&nbsp;', $view_fields['rnc_script2_comments']);
                    $view_fields['rnc_script2_comments'] = nl2br($view_fields['rnc_script2_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rnc_script2_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rnc_script2_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rnc_script2_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rnc_script2_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rnc_script2_tcm_explanation']);
                        $view_fields['rnc_script2_tcm_explanation'] = nl2br($view_fields['rnc_script2_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rnc_script2_tcm_explanation']; ?></div>

                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>

    <div class="hide_class" id="rnc_script3_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('Sitename_02_RNC_UtranCell_2nd_Carrier_West_V10-2-4 script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rnc_script3'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rnc_script3'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('Sitename_02_RNC_UtranCell_2nd_Carrier_West_V10-2-4 script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rnc_script3_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rnc_script3_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rnc_script3_comments'] = str_replace(' ', '&nbsp;', $view_fields['rnc_script3_comments']);
                    $view_fields['rnc_script3_comments'] = nl2br($view_fields['rnc_script3_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rnc_script3_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rnc_script3_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rnc_script3_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rnc_script3_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rnc_script3_tcm_explanation']);
                        $view_fields['rnc_script3_tcm_explanation'] = nl2br($view_fields['rnc_script3_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rnc_script3_tcm_explanation']; ?></div>

                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>

    <div class="hide_class" id="rnc_script4_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('Sitename_02b_RNC_UtranCell_1stC_West_RBSType_Setting_maxTransmissionPower script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rnc_script4'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rnc_script4'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('Sitename_02b_RNC_UtranCell_1stC_West_RBSType_Setting_maxTransmissionPower script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rnc_script4_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rnc_script4_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rnc_script4_comments'] = str_replace(' ', '&nbsp;', $view_fields['rnc_script4_comments']);
                    $view_fields['rnc_script4_comments'] = nl2br($view_fields['rnc_script4_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rnc_script4_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rnc_script4_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rnc_script4_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rnc_script4_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rnc_script4_tcm_explanation']);
                        $view_fields['rnc_script4_tcm_explanation'] = nl2br($view_fields['rnc_script4_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rnc_script4_tcm_explanation']; ?></div>

                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>

    <div class="hide_class" id="rnc_script5_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('D_02_RNCname_Sitename_RBSId_ATM_Switch_to_IPv4_Date.mo script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rnc_script5'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rnc_script5'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('D_02_RNCname_Sitename_RBSId_ATM_Switch_to_IPv4_Date.mo script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rnc_script5_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rnc_script5_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rnc_script5_comments'] = str_replace(' ', '&nbsp;', $view_fields['rnc_script5_comments']);
                    $view_fields['rnc_script5_comments'] = nl2br($view_fields['rnc_script5_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rnc_script5_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rnc_script5_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rnc_script5_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rnc_script5_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rnc_script5_tcm_explanation']);
                        $view_fields['rnc_script5_tcm_explanation'] = nl2br($view_fields['rnc_script5_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rnc_script5_tcm_explanation']; ?></div>

                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>

    <div class="hide_class" id="rnc_script6_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('02_RNC_PUREIPMOS_Sitename_RNCname script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rnc_script6'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rnc_script6'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('02_RNC_PUREIPMOS_Sitename_RNCname script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rnc_script6_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rnc_script6_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rnc_script6_comments'] = str_replace(' ', '&nbsp;', $view_fields['rnc_script6_comments']);
                    $view_fields['rnc_script6_comments'] = nl2br($view_fields['rnc_script6_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rnc_script6_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rnc_script6_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rnc_script6_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rnc_script6_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rnc_script6_tcm_explanation']);
                        $view_fields['rnc_script6_tcm_explanation'] = nl2br($view_fields['rnc_script6_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rnc_script6_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>

    <div class="hide_class" id="rnc_script7_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('04C_RNC_CLEANUP_Sitename_RNCname script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rnc_script7'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rnc_script7'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('04C_RNC_CLEANUP_Sitename_RNCname script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rnc_script7_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rnc_script7_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rnc_script7_comments'] = str_replace(' ', '&nbsp;', $view_fields['rnc_script7_comments']);
                    $view_fields['rnc_script7_comments'] = nl2br($view_fields['rnc_script7_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rnc_script7_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rnc_script7_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rnc_script7_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rnc_script7_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rnc_script7_tcm_explanation']);
                        $view_fields['rnc_script7_tcm_explanation'] = nl2br($view_fields['rnc_script7_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rnc_script7_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>

    <div class="hide_class" id="rnc_script8_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('Sitename_RNC_UtranCell_West_Setting_PrimaryCPICH_maxTransmissionPower script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rnc_script8'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rnc_script8'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('Sitename_RNC_UtranCell_West_Setting_PrimaryCPICH_maxTransmissionPower script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rnc_script8_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rnc_script8_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rnc_script8_comments'] = str_replace(' ', '&nbsp;', $view_fields['rnc_script8_comments']);
                    $view_fields['rnc_script8_comments'] = nl2br($view_fields['rnc_script8_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rnc_script8_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rnc_script8_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rnc_script8_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rnc_script8_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rnc_script8_tcm_explanation']);
                        $view_fields['rnc_script8_tcm_explanation'] = nl2br($view_fields['rnc_script8_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rnc_script8_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>

    <div class="hide_class" id="rnc_script9_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('No Scripts provided'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rnc_script9'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rnc_script9'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('No Scripts provided'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rnc_script9_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rnc_script9_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rnc_script9_comments'] = str_replace(' ', '&nbsp;', $view_fields['rnc_script9_comments']);
                    $view_fields['rnc_script9_comments'] = nl2br($view_fields['rnc_script9_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rnc_script9_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rnc_script9_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rnc_script9_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rnc_script9_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rnc_script9_tcm_explanation']);
                        $view_fields['rnc_script9_tcm_explanation'] = nl2br($view_fields['rnc_script9_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rnc_script9_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
    <div class="hide_class" id="rnc_script10_div">
        <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('RNC_Aal2_Iub.mo script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rnc_script10'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rnc_script10'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('RNC_Aal2_Iub.mo script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rnc_script10_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rnc_script10_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rnc_script10_comments'] = str_replace(' ', '&nbsp;', $view_fields['rnc_script10_comments']);
                    $view_fields['rnc_script10_comments'] = nl2br($view_fields['rnc_script10_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rnc_script10_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rnc_script10_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rnc_script10_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rnc_script10_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rnc_script10_tcm_explanation']);
                        $view_fields['rnc_script10_tcm_explanation'] = nl2br($view_fields['rnc_script10_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rnc_script10_tcm_explanation']; ?></div>

                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
    <div class="hide_class" id="rnc_script11_div">
        <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('RNC_UtranCell.mo script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rnc_script11'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rnc_script11'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('RNC_UtranCell.mo script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rnc_script11_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rnc_script11_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rnc_script11_comments'] = str_replace(' ', '&nbsp;', $view_fields['rnc_script11_comments']);
                    $view_fields['rnc_script11_comments'] = nl2br($view_fields['rnc_script11_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rnc_script11_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rnc_script11_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rnc_script11_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rnc_script11_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rnc_script11_tcm_explanation']);
                        $view_fields['rnc_script11_tcm_explanation'] = nl2br($view_fields['rnc_script11_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rnc_script11_tcm_explanation']; ?></div>

                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
    
</fieldset>


<fieldset class="hide_class" id="rbs">
<legend>RBS Scripts</legend>  

<div class="hide_class" id="rbs_script1_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('Sitename_RBS_2ndCarrier_modifySector script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rbs_script1'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rbs_script1'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('Sitename_RBS_2ndCarrier_modifySector script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rbs_script1_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rbs_script1_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rbs_script1_comments'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script1_comments']);
                    $view_fields['rbs_script1_comments'] = nl2br($view_fields['rbs_script1_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rbs_script1_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rbs_script1_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script1_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rbs_script1_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script1_tcm_explanation']);
                        $view_fields['rbs_script1_tcm_explanation'] = nl2br($view_fields['rbs_script1_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script1_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>

<div class="hide_class" id="rbs_script2_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('Sitename_external_hw_1C_2C script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rbs_script2'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rbs_script2'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('Sitename_external_hw_1C_2C script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rbs_script2_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rbs_script2_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rbs_script2_comments'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script2_comments']);
                    $view_fields['rbs_script2_comments'] = nl2br($view_fields['rbs_script2_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rbs_script2_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rbs_script2_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script2_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rbs_script2_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script2_tcm_explanation']);
                        $view_fields['rbs_script2_tcm_explanation'] = nl2br($view_fields['rbs_script2_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script2_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>    

    <div class="hide_class" id="rbs_script3_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('Sitename_RBS_AddPSU script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rbs_script3'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rbs_script3'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('Sitename_RBS_AddPSU script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rbs_script3_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rbs_script3_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rbs_script3_comments'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script3_comments']);
                    $view_fields['rbs_script3_comments'] = nl2br($view_fields['rbs_script3_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rbs_script3_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rbs_script3_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script3_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rbs_script3_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script3_tcm_explanation']);
                        $view_fields['rbs_script3_tcm_explanation'] = nl2br($view_fields['rbs_script3_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script3_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>    
    
    <div class="hide_class" id="rbs_script4_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('B_01_Sitename_RBSId_RBS_ETMFX_Date.mo script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rbs_script4'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rbs_script4'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('B_01_Sitename_RBSId_RBS_ETMFX_Date.mo script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rbs_script4_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rbs_script4_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rbs_script4_comments'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script4_comments']);
                    $view_fields['rbs_script4_comments'] = nl2br($view_fields['rbs_script4_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rbs_script4_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rbs_script4_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script4_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rbs_script4_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script4_tcm_explanation']);
                        $view_fields['rbs_script4_tcm_explanation'] = nl2br($view_fields['rbs_script4_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script4_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div> 

    <div class="hide_class" id="rbs_script5_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('B_02_Sitename_RBSId_RBS_EthernetPort_Date.mo script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rbs_script5'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rbs_script5'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('B_02_Sitename_RBSId_RBS_EthernetPort_Date.mo script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rbs_script5_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rbs_script5_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rbs_script5_comments'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script5_comments']);
                    $view_fields['rbs_script5_comments'] = nl2br($view_fields['rbs_script5_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rbs_script5_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rbs_script5_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script5_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rbs_script5_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script5_tcm_explanation']);
                        $view_fields['rbs_script5_tcm_explanation'] = nl2br($view_fields['rbs_script5_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script5_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div> 
    
        <div class="hide_class" id="rbs_script6_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('C_01_Sitename_RBSId_RBS_UserPlane_ON_SITE_Date.mo script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rbs_script6'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rbs_script6'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('C_01_Sitename_RBSId_RBS_UserPlane_ON_SITE_Date.mo script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rbs_script6_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rbs_script6_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rbs_script6_comments'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script6_comments']);
                    $view_fields['rbs_script6_comments'] = nl2br($view_fields['rbs_script6_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rbs_script6_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rbs_script6_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script6_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rbs_script6_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script6_tcm_explanation']);
                        $view_fields['rbs_script6_tcm_explanation'] = nl2br($view_fields['rbs_script6_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script6_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div> 

    <div class="hide_class" id="rbs_script7_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('C_02_Sitename_RBSId_RBS_Sync_Add_ON_SITE_Date.mo script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rbs_script7'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rbs_script7'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('C_02_Sitename_RBSId_RBS_Sync_Add_ON_SITE_Date.mo script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rbs_script7_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rbs_script7_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rbs_script7_comments'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script7_comments']);
                    $view_fields['rbs_script7_comments'] = nl2br($view_fields['rbs_script7_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rbs_script7_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rbs_script7_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script7_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rbs_script7_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script7_tcm_explanation']);
                        $view_fields['rbs_script7_tcm_explanation'] = nl2br($view_fields['rbs_script7_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script7_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div> 

   <div class="hide_class" id="rbs_script8_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('D_01_Sitename_RBSId_ATM_Switch_to_IPv4_Date.mo script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rbs_script8'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rbs_script8'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('D_01_Sitename_RBSId_ATM_Switch_to_IPv4_Date.mo script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rbs_script8_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rbs_script8_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rbs_script8_comments'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script8_comments']);
                    $view_fields['rbs_script8_comments'] = nl2br($view_fields['rbs_script8_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rbs_script8_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rbs_script8_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script8_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rbs_script8_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script8_tcm_explanation']);
                        $view_fields['rbs_script8_tcm_explanation'] = nl2br($view_fields['rbs_script8_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script8_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div> 
    
     <div class="hide_class" id="rbs_script9_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('02_RBS_PUREIPMOS_Sitename script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rbs_script9'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rbs_script9'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('02_RBS_PUREIPMOS_Sitename script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rbs_script9_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rbs_script9_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rbs_script9_comments'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script9_comments']);
                    $view_fields['rbs_script9_comments'] = nl2br($view_fields['rbs_script9_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rbs_script9_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rbs_script9_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script9_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rbs_script9_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script9_tcm_explanation']);
                        $view_fields['rbs_script9_tcm_explanation'] = nl2br($view_fields['rbs_script9_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script9_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>

   
    <div class="hide_class" id="rbs_script10_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('03A_RBS_OAMMOS_Sitename script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rbs_script10'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rbs_script10'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('03A_RBS_OAMMOS_Sitename script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rbs_script10_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rbs_script10_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rbs_script10_comments'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script10_comments']);
                    $view_fields['rbs_script10_comments'] = nl2br($view_fields['rbs_script10_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rbs_script10_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rbs_script10_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script10_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rbs_script10_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script10_tcm_explanation']);
                        $view_fields['rbs_script10_tcm_explanation'] = nl2br($view_fields['rbs_script10_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script10_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
    
    
    <div class="hide_class" id="rbs_script11_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('03B_RBS_OAMMOS_Sitename script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rbs_script11'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rbs_script11'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('03B_RBS_OAMMOS_Sitename script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rbs_script11_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rbs_script11_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rbs_script11_comments'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script11_comments']);
                    $view_fields['rbs_script11_comments'] = nl2br($view_fields['rbs_script11_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rbs_script11_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rbs_script11_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script11_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rbs_script11_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script11_tcm_explanation']);
                        $view_fields['rbs_script11_tcm_explanation'] = nl2br($view_fields['rbs_script11_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script11_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
   
    
    <div class="hide_class" id="rbs_script12_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('03C_RBS_OAMMOS_Sitename script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rbs_script12'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rbs_script12'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('03C_RBS_OAMMOS_Sitename script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rbs_script12_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rbs_script12_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rbs_script12_comments'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script12_comments']);
                    $view_fields['rbs_script12_comments'] = nl2br($view_fields['rbs_script12_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rbs_script12_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rbs_script12_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script12_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rbs_script12_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script12_tcm_explanation']);
                        $view_fields['rbs_script12_tcm_explanation'] = nl2br($view_fields['rbs_script12_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script12_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
    
    <div class="hide_class" id="rbs_script13_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('04A_RBS_CLEANUP_Sitename script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rbs_script13'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rbs_script13'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('04A_RBS_CLEANUP_Sitename script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rbs_script13_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rbs_script13_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rbs_script13_comments'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script13_comments']);
                    $view_fields['rbs_script13_comments'] = nl2br($view_fields['rbs_script13_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rbs_script13_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rbs_script13_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script13_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rbs_script13_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script13_tcm_explanation']);
                        $view_fields['rbs_script13_tcm_explanation'] = nl2br($view_fields['rbs_script13_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script13_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
     
    <div class="hide_class" id="rbs_script14_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('04B_RBS_CLEANUP_Sitename script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rbs_script14'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rbs_script14'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('04B_RBS_CLEANUP_Sitename script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rbs_script14_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rbs_script14_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rbs_script14_comments'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script14_comments']);
                    $view_fields['rbs_script14_comments'] = nl2br($view_fields['rbs_script14_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rbs_script14_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rbs_script14_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script14_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rbs_script14_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script14_tcm_explanation']);
                        $view_fields['rbs_script14_tcm_explanation'] = nl2br($view_fields['rbs_script14_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script14_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
  
    <div class="hide_class" id="rbs_script15_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('Sitename_01_oam_access script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rbs_script15'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rbs_script15'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('Sitename_01_oam_access script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rbs_script15_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rbs_script15_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rbs_script15_comments'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script15_comments']);
                    $view_fields['rbs_script15_comments'] = nl2br($view_fields['rbs_script15_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rbs_script15_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rbs_script15_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script15_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rbs_script15_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script15_tcm_explanation']);
                        $view_fields['rbs_script15_tcm_explanation'] = nl2br($view_fields['rbs_script15_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script15_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
    
    <div class="hide_class" id="rbs_script16_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('Sitename_03_SiteComplete_IP/ATM script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rbs_script16'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rbs_script16'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('Sitename_03_SiteComplete_IP/ATM script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rbs_script16_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rbs_script16_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rbs_script16_comments'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script16_comments']);
                    $view_fields['rbs_script16_comments'] = nl2br($view_fields['rbs_script16_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rbs_script16_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rbs_script16_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script16_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rbs_script16_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script16_tcm_explanation']);
                        $view_fields['rbs_script16_tcm_explanation'] = nl2br($view_fields['rbs_script16_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script16_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>

    <div class="hide_class" id="rbs_script17_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('External_hw.xml script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rbs_script17'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rbs_script17'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('External_hw.xml script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rbs_script17_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rbs_script17_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rbs_script17_comments'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script17_comments']);
                    $view_fields['rbs_script17_comments'] = nl2br($view_fields['rbs_script17_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rbs_script17_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rbs_script17_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script17_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rbs_script17_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script17_tcm_explanation']);
                        $view_fields['rbs_script17_tcm_explanation'] = nl2br($view_fields['rbs_script17_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script17_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
    <div class="hide_class" id="rbs_script18_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('oam_access.xml script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rbs_script18'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rbs_script18'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('oam_access.xml script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rbs_script18_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rbs_script18_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rbs_script18_comments'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script18_comments']);
                    $view_fields['rbs_script18_comments'] = nl2br($view_fields['rbs_script18_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rbs_script18_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rbs_script18_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script18_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rbs_script18_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script18_tcm_explanation']);
                        $view_fields['rbs_script18_tcm_explanation'] = nl2br($view_fields['rbs_script18_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script18_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
    <div class="hide_class" id="rbs_script19_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('RBS_SiteComplete.mo script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['rbs_script19'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['rbs_script19'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('RBS_SiteComplete.mo script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['rbs_script19_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['rbs_script19_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['rbs_script19_comments'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script19_comments']);
                    $view_fields['rbs_script19_comments'] = nl2br($view_fields['rbs_script19_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['rbs_script19_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['rbs_script19_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script19_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['rbs_script19_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['rbs_script19_tcm_explanation']);
                        $view_fields['rbs_script19_tcm_explanation'] = nl2br($view_fields['rbs_script19_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['rbs_script19_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    </fieldset>

  <?php //Fallback Scripts ?>

<fieldset class="hide_class" id="fback">
<legend>Fallback Scripts</legend>  

<div class="hide_class" id="fback_script1_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('Sitename_Fallback_RNC_UtranCell_1stC_West_RBSType_Setting_maxTransmissionPower script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['fback_script1'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['fback_script1'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('Sitename_Fallback_RNC_UtranCell_1stC_West_RBSType_Setting_maxTransmissionPower script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['fback_script1_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['fback_script1_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['fback_script1_comments'] = str_replace(' ', '&nbsp;', $view_fields['fback_script1_comments']);
                    $view_fields['fback_script1_comments'] = nl2br($view_fields['fback_script1_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['fback_script1_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['fback_script1_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['fback_script1_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['fback_script1_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['fback_script1_tcm_explanation']);
                        $view_fields['fback_script1_tcm_explanation'] = nl2br($view_fields['fback_script1_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['fback_script1_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
    
    <div class="hide_class" id="fback_script2_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('B_01_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['fback_script2'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['fback_script2'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('B_01_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['fback_script2_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['fback_script2_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['fback_script2_comments'] = str_replace(' ', '&nbsp;', $view_fields['fback_script2_comments']);
                    $view_fields['fback_script2_comments'] = nl2br($view_fields['fback_script2_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['fback_script2_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['fback_script2_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['fback_script2_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['fback_script2_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['fback_script2_tcm_explanation']);
                        $view_fields['fback_script2_tcm_explanation'] = nl2br($view_fields['fback_script2_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['fback_script2_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
   
    <div class="hide_class" id="fback_script3_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('B_02_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['fback_script3'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['fback_script3'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('B_02_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['fback_script3_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['fback_script3_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['fback_script3_comments'] = str_replace(' ', '&nbsp;', $view_fields['fback_script3_comments']);
                    $view_fields['fback_script3_comments'] = nl2br($view_fields['fback_script3_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['fback_script3_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['fback_script3_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['fback_script3_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['fback_script3_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['fback_script3_tcm_explanation']);
                        $view_fields['fback_script3_tcm_explanation'] = nl2br($view_fields['fback_script3_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['fback_script3_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>

  
    
    <div class="hide_class" id="fback_script4_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('C_01_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['fback_script4'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['fback_script4'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('C_01_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['fback_script4_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['fback_script4_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['fback_script4_comments'] = str_replace(' ', '&nbsp;', $view_fields['fback_script4_comments']);
                    $view_fields['fback_script4_comments'] = nl2br($view_fields['fback_script4_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['fback_script4_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['fback_script4_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['fback_script4_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['fback_script4_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['fback_script4_tcm_explanation']);
                        $view_fields['fback_script4_tcm_explanation'] = nl2br($view_fields['fback_script4_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['fback_script4_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
  
    
    <div class="hide_class" id="fback_script5_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('C_02_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['fback_script5'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['fback_script5'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('C_02_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['fback_script5_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['fback_script5_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['fback_script5_comments'] = str_replace(' ', '&nbsp;', $view_fields['fback_script5_comments']);
                    $view_fields['fback_script5_comments'] = nl2br($view_fields['fback_script5_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['fback_script5_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['fback_script5_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['fback_script5_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['fback_script5_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['fback_script5_tcm_explanation']);
                        $view_fields['fback_script5_tcm_explanation'] = nl2br($view_fields['fback_script5_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['fback_script5_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
   
    
    <div class="hide_class" id="fback_script6_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('D_01_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['fback_script6'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['fback_script6'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('D_01_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['fback_script6_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['fback_script6_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['fback_script6_comments'] = str_replace(' ', '&nbsp;', $view_fields['fback_script6_comments']);
                    $view_fields['fback_script6_comments'] = nl2br($view_fields['fback_script6_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['fback_script6_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['fback_script6_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['fback_script6_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['fback_script6_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['fback_script6_tcm_explanation']);
                        $view_fields['fback_script6_tcm_explanation'] = nl2br($view_fields['fback_script6_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['fback_script6_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
   
    
    <div class="hide_class" id="fback_script7_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('D_02_Fback_RNCname_Sitename_RBSId_Hybrid_Scripts_Date.mo script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['fback_script7'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['fback_script7'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('D_02_Fback_RNCname_Sitename_RBSId_Hybrid_Scripts_Date.mo script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['fback_script7_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['fback_script7_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['fback_script7_comments'] = str_replace(' ', '&nbsp;', $view_fields['fback_script7_comments']);
                    $view_fields['fback_script7_comments'] = nl2br($view_fields['fback_script7_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['fback_script7_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['fback_script7_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['fback_script7_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['fback_script7_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['fback_script7_tcm_explanation']);
                        $view_fields['fback_script7_tcm_explanation'] = nl2br($view_fields['fback_script7_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['fback_script7_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
  
    
    <div class="hide_class" id="fback_script8_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('FALLBACK_02_RBS_PUREIPMOS_Sitename script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['fback_script8'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['fback_script8'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('FALLBACK_02_RBS_PUREIPMOS_Sitename script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['fback_script8_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['fback_script8_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['fback_script8_comments'] = str_replace(' ', '&nbsp;', $view_fields['fback_script8_comments']);
                    $view_fields['fback_script8_comments'] = nl2br($view_fields['fback_script8_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['fback_script8_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['fback_script8_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['fback_script8_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['fback_script8_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['fback_script8_tcm_explanation']);
                        $view_fields['fback_script8_tcm_explanation'] = nl2br($view_fields['fback_script8_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['fback_script8_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
    
    <div class="hide_class" id="fback_script9_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('FALLBACK_02_RNC_PUREIPMOS_Sitename_RNCname script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['fback_script9'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['fback_script9'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('FALLBACK_02_RNC_PUREIPMOS_Sitename_RNCname script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['fback_script9_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['fback_script9_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['fback_script9_comments'] = str_replace(' ', '&nbsp;', $view_fields['fback_script9_comments']);
                    $view_fields['fback_script9_comments'] = nl2br($view_fields['fback_script9_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['fback_script9_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['fback_script9_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['fback_script9_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['fback_script9_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['fback_script9_tcm_explanation']);
                        $view_fields['fback_script9_tcm_explanation'] = nl2br($view_fields['fback_script9_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['fback_script9_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
   
    <div class="hide_class" id="fback_script10_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('FALLBACK_03A_RBS_OAMMOS_Sitename script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['fback_script10'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['fback_script10'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('FALLBACK_03A_RBS_OAMMOS_Sitename script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['fback_script10_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['fback_script10_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['fback_script10_comments'] = str_replace(' ', '&nbsp;', $view_fields['fback_script10_comments']);
                    $view_fields['fback_script10_comments'] = nl2br($view_fields['fback_script10_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['fback_script10_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['fback_script10_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['fback_script10_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['fback_script10_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['fback_script10_tcm_explanation']);
                        $view_fields['fback_script10_tcm_explanation'] = nl2br($view_fields['fback_script10_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['fback_script10_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
   
    <div class="hide_class" id="fback_script11_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('FALLBACK_03B_RBS_OAMMOS_Sitename script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['fback_script11'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['fback_script11'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('FALLBACK_03B_RBS_OAMMOS_Sitename script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['fback_script11_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['fback_script11_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['fback_script11_comments'] = str_replace(' ', '&nbsp;', $view_fields['fback_script11_comments']);
                    $view_fields['fback_script11_comments'] = nl2br($view_fields['fback_script11_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['fback_script11_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['fback_script11_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['fback_script11_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['fback_script11_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['fback_script11_tcm_explanation']);
                        $view_fields['fback_script11_tcm_explanation'] = nl2br($view_fields['fback_script11_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['fback_script11_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
   
    <div class="hide_class" id="fback_script12_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('FALLBACK_04A_RBS_CLEANUP_Sitename script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['fback_script12'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['fback_script12'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('FALLBACK_04A_RBS_CLEANUP_Sitename script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['fback_script12_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['fback_script12_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['fback_script12_comments'] = str_replace(' ', '&nbsp;', $view_fields['fback_script12_comments']);
                    $view_fields['fback_script12_comments'] = nl2br($view_fields['fback_script12_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['fback_script12_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['fback_script12_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['fback_script12_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['fback_script12_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['fback_script12_tcm_explanation']);
                        $view_fields['fback_script12_tcm_explanation'] = nl2br($view_fields['fback_script12_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['fback_script12_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
    
    <div class="hide_class" id="fback_script13_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('FALLBACK_04B_RBS_CLEANUP_Sitename script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['fback_script13'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['fback_script13'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('FALLBACK_04B_RBS_CLEANUP_Sitename script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['fback_script13_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['fback_script13_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['fback_script13_comments'] = str_replace(' ', '&nbsp;', $view_fields['fback_script13_comments']);
                    $view_fields['fback_script13_comments'] = nl2br($view_fields['fback_script13_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['fback_script13_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['fback_script13_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['fback_script13_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['fback_script13_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['fback_script13_tcm_explanation']);
                        $view_fields['fback_script13_tcm_explanation'] = nl2br($view_fields['fback_script13_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['fback_script13_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
 
    <div class="hide_class" id="fback_script14_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('FALLBACK_04C_RNC_CLEANUP_Sitename_RNCname script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['fback_script14'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['fback_script14'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('FALLBACK_04C_RNC_CLEANUP_Sitename_RNCname script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['fback_script14_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['fback_script14_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['fback_script14_comments'] = str_replace(' ', '&nbsp;', $view_fields['fback_script14_comments']);
                    $view_fields['fback_script14_comments'] = nl2br($view_fields['fback_script14_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['fback_script14_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['fback_script14_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['fback_script14_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['fback_script14_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['fback_script14_tcm_explanation']);
                        $view_fields['fback_script14_tcm_explanation'] = nl2br($view_fields['fback_script14_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['fback_script14_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
    
    
    <div class="hide_class" id="fback_script15_div">
        <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
            <div class="view_col_left" style="width:100%"><?php __('Sitename_Fallback_RNC_UtranCell_West_Setting_PrimaryCPICH_maxTransmissionPower script loaded'); ?></div>
            <div class="view_col_right"><?php
            if ($view_fields['fback_script15'] == '1')
                echo "Yes"; else
                echo "No";
        ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($view_fields['fback_script15'] == "1") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                <div class="view_col_left" style="width:100%"><?php __('Sitename_Fallback_RNC_UtranCell_West_Setting_PrimaryCPICH_maxTransmissionPower script status'); ?></div>
                <div class="view_col_right"><?php echo $view_fields['fback_script15_status']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <?php if ($view_fields['fback_script15_status'] != "Loaded Successfully") { ?>
                <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>
                    <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                    <?php $view_fields['fback_script15_comments'] = str_replace(' ', '&nbsp;', $view_fields['fback_script15_comments']);
                    $view_fields['fback_script15_comments'] = nl2br($view_fields['fback_script15_comments']); ?>
                    <div class="view_col_right"><?php echo $view_fields['fback_script15_comments']; ?></div>

                    <div style="clear: both;"></div>
                </div>

                <?php if ($view_fields['fback_script15_tcm'] != "") { ?>
                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['fback_script15_tcm']; ?></div>
                        <div style="clear: both;"></div>
                    </div>

                    <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                        <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                        <?php $view_fields['fback_script15_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['fback_script15_tcm_explanation']);
                        $view_fields['fback_script15_tcm_explanation'] = nl2br($view_fields['fback_script15_tcm_explanation']); ?>
                        <div class="view_col_right"><?php echo $view_fields['fback_script15_tcm_explanation']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
</fieldset>

<fieldset class="hide_class" id="oss">
    <legend>OSS Scripts</legend>
    
     <div class="hide_class" id="oss_script1_div">
    <div <?php if ($i++ % 2 == 0)
    echo $class; ?>>    
        <div class="view_col_left"><?php __('GSM Cells Imported'); ?></div>
        <div class="view_col_right"><?php if ($view_fields['oss_script1'] == '1')
    echo "Yes"; else
    echo "No"; ?></div>
        <div style="clear: both;"></div>
    </div>

<?php if ($view_fields['oss_script1'] == "1") { ?>
        <div <?php if ($i++ % 2 == 0)
        echo $class; ?>>    
            <div class="view_col_left"><?php __('Total Imported'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['oss_script1_complete']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
        echo $class; ?>>    
            <div class="view_col_left"><?php __('Out of'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['oss_script1_total']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
        echo $class; ?>>    
            <div class="view_col_left"><?php __('100% Activation'); ?></div>
            <div class="view_col_right"><?php if ($view_fields['oss_script1_activation'] == '1')
        echo "Yes"; else
        echo "No"; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
        echo $class; ?>>    
            <div class="view_col_left"><?php __('GSM Cells Import Status'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['oss_script1_status']; ?></div>
            <div style="clear: both;"></div>
        </div>


    <?php if ($view_fields['oss_script1_status'] != "Imported Successfully and Activation Successful") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>    
                <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
            <?php $view_fields['oss_script1_comments'] = str_replace(' ', '&nbsp;', $view_fields['oss_script1_comments']);
            $view_fields['oss_script1_comments'] = nl2br($view_fields['oss_script1_comments']); ?>
                <div class="view_col_right"><?php echo $view_fields['oss_script1_comments']; ?></div>

                <div style="clear: both;"></div>
            </div>

        <?php if ($view_fields['oss_script1_tcm'] != "") { ?>
                <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>    
                    <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                    <div class="view_col_right"><?php echo $view_fields['oss_script1_tcm']; ?></div>
                    <div style="clear: both;"></div>
                </div>

                <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>    
                    <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
            <?php $view_fields['oss_script1_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['oss_script1_tcm_explanation']);
            $view_fields['oss_script1_tcm_explanation'] = nl2br($view_fields['oss_script1_tcm_explanation']); ?>
                    <div class="view_col_right"><?php echo $view_fields['oss_script1_tcm_explanation']; ?></div>

                    <div style="clear: both;"></div>
                </div>
        <?php } ?>
    <?php } ?>
<?php } ?>
     </div>
    
     <div class="hide_class" id="oss_script2_div">
  <div <?php if ($i++ % 2 == 0)
    echo $class; ?>>    
        <div class="view_col_left"><?php __('GSM Relations Imported'); ?></div>
        <div class="view_col_right"><?php if ($view_fields['oss_script2'] == '1')
    echo "Yes"; else
    echo "No"; ?></div>
        <div style="clear: both;"></div>
    </div>

<?php if ($view_fields['oss_script2'] == "1") { ?>
        <div <?php if ($i++ % 2 == 0)
        echo $class; ?>>    
            <div class="view_col_left"><?php __('Total Imported'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['oss_script2_complete']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
        echo $class; ?>>    
            <div class="view_col_left"><?php __('Out of'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['oss_script2_total']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
        echo $class; ?>>    
            <div class="view_col_left"><?php __('100% Activation'); ?></div>
            <div class="view_col_right"><?php if ($view_fields['oss_script2_activation'] == '1')
        echo "Yes"; else
        echo "No"; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
        echo $class; ?>>    
            <div class="view_col_left"><?php __('GSM Relations Import Status'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['oss_script2_status']; ?></div>
            <div style="clear: both;"></div>
        </div>


    <?php if ($view_fields['oss_script2_status'] != "Imported Successfully and Activation Successful") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>    
                <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
            <?php $view_fields['oss_script2_comments'] = str_replace(' ', '&nbsp;', $view_fields['oss_script2_comments']);
            $view_fields['oss_script2_comments'] = nl2br($view_fields['oss_script2_comments']); ?>
                <div class="view_col_right"><?php echo $view_fields['oss_script2_comments']; ?></div>

                <div style="clear: both;"></div>
            </div>

        <?php if ($view_fields['oss_script2_tcm'] != "") { ?>
                <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>    
                    <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                    <div class="view_col_right"><?php echo $view_fields['oss_script2_tcm']; ?></div>
                    <div style="clear: both;"></div>
                </div>

                <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>    
                    <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
            <?php $view_fields['oss_script2_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['oss_script2_tcm_explanation']);
            $view_fields['oss_script2_tcm_explanation'] = nl2br($view_fields['oss_script2_tcm_explanation']); ?>
                    <div class="view_col_right"><?php echo $view_fields['oss_script2_tcm_explanation']; ?></div>

                    <div style="clear: both;"></div>
                </div>
        <?php } ?>
    <?php } ?>
<?php } ?>   
     </div>
    
     
  <div class="hide_class" id="oss_script3_div">
 <div <?php if ($i++ % 2 == 0)
    echo $class; ?>>    
        <div class="view_col_left"><?php __('Utran Relations Imported'); ?></div>
        <div class="view_col_right"><?php if ($view_fields['oss_script3'] == '1')
    echo "Yes"; else
    echo "No"; ?></div>
        <div style="clear: both;"></div>
    </div>

<?php if ($view_fields['oss_script3'] == "1") { ?>
        <div <?php if ($i++ % 2 == 0)
        echo $class; ?>>    
            <div class="view_col_left"><?php __('Total Imported'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['oss_script3_complete']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
        echo $class; ?>>    
            <div class="view_col_left"><?php __('Out of'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['oss_script3_total']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
        echo $class; ?>>    
            <div class="view_col_left"><?php __('100% Activation'); ?></div>
            <div class="view_col_right"><?php if ($view_fields['oss_script3_activation'] == '1')
        echo "Yes"; else
        echo "No"; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
        echo $class; ?>>    
            <div class="view_col_left"><?php __('Utran Relations Import Status'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['oss_script3_status']; ?></div>
            <div style="clear: both;"></div>
        </div>


    <?php if ($view_fields['oss_script3_status'] != "Imported Successfully and Activation Successful") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>    
                <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
            <?php $view_fields['oss_script3_comments'] = str_replace(' ', '&nbsp;', $view_fields['oss_script3_comments']);
            $view_fields['oss_script3_comments'] = nl2br($view_fields['oss_script3_comments']); ?>
                <div class="view_col_right"><?php echo $view_fields['oss_script3_comments']; ?></div>

                <div style="clear: both;"></div>
            </div>

        <?php if ($view_fields['oss_script3_tcm'] != "") { ?>
                <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>    
                    <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                    <div class="view_col_right"><?php echo $view_fields['oss_script3_tcm']; ?></div>
                    <div style="clear: both;"></div>
                </div>

                <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>    
                    <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
            <?php $view_fields['oss_script3_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['oss_script3_tcm_explanation']);
            $view_fields['oss_script3_tcm_explanation'] = nl2br($view_fields['oss_script3_tcm_explanation']); ?>
                    <div class="view_col_right"><?php echo $view_fields['oss_script3_tcm_explanation']; ?></div>

                    <div style="clear: both;"></div>
                </div>
        <?php } ?>
    <?php } ?>
<?php } ?>
</div>

     
  <div class="hide_class" id="oss_script4_div">
 <div <?php if ($i++ % 2 == 0)
    echo $class; ?>>    
        <div class="view_col_left"><?php __('OSS_RBS_tmobile Imported'); ?></div>
        <div class="view_col_right"><?php if ($view_fields['oss_script4'] == '1')
    echo "Yes"; else
    echo "No"; ?></div>
        <div style="clear: both;"></div>
    </div>

<?php if ($view_fields['oss_script4'] == "1") { ?>
        <div <?php if ($i++ % 2 == 0)
        echo $class; ?>>    
            <div class="view_col_left"><?php __('Total Imported'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['oss_script4_complete']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
        echo $class; ?>>    
            <div class="view_col_left"><?php __('Out of'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['oss_script4_total']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
        echo $class; ?>>    
            <div class="view_col_left"><?php __('100% Activation'); ?></div>
            <div class="view_col_right"><?php if ($view_fields['oss_script4_activation'] == '1')
        echo "Yes"; else
        echo "No"; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
        echo $class; ?>>    
            <div class="view_col_left"><?php __('OSS_RBS_tmobile Import Status'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['oss_script4_status']; ?></div>
            <div style="clear: both;"></div>
        </div>


    <?php if ($view_fields['oss_script4_status'] != "Imported Successfully and Activation Successful") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>    
                <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
            <?php $view_fields['oss_script4_comments'] = str_replace(' ', '&nbsp;', $view_fields['oss_script4_comments']);
            $view_fields['oss_script4_comments'] = nl2br($view_fields['oss_script4_comments']); ?>
                <div class="view_col_right"><?php echo $view_fields['oss_script4_comments']; ?></div>

                <div style="clear: both;"></div>
            </div>

        <?php if ($view_fields['oss_script4_tcm'] != "") { ?>
                <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>    
                    <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                    <div class="view_col_right"><?php echo $view_fields['oss_script4_tcm']; ?></div>
                    <div style="clear: both;"></div>
                </div>

                <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>    
                    <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
            <?php $view_fields['oss_script4_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['oss_script4_tcm_explanation']);
            $view_fields['oss_script4_tcm_explanation'] = nl2br($view_fields['oss_script4_tcm_explanation']); ?>
                    <div class="view_col_right"><?php echo $view_fields['oss_script4_tcm_explanation']; ?></div>

                    <div style="clear: both;"></div>
                </div>
        <?php } ?>
    <?php } ?>
<?php } ?>
</div>
  
  <div class="hide_class" id="oss_script5_div">
 <div <?php if ($i++ % 2 == 0)
    echo $class; ?>>    
        <div class="view_col_left"><?php __('OSS_Site_tmobile Imported'); ?></div>
        <div class="view_col_right"><?php if ($view_fields['oss_script5'] == '1')
    echo "Yes"; else
    echo "No"; ?></div>
        <div style="clear: both;"></div>
    </div>

<?php if ($view_fields['oss_script5'] == "1") { ?>
        <div <?php if ($i++ % 2 == 0)
        echo $class; ?>>    
            <div class="view_col_left"><?php __('Total Imported'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['oss_script5_complete']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
        echo $class; ?>>    
            <div class="view_col_left"><?php __('Out of'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['oss_script5_total']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
        echo $class; ?>>    
            <div class="view_col_left"><?php __('100% Activation'); ?></div>
            <div class="view_col_right"><?php if ($view_fields['oss_script5_activation'] == '1')
        echo "Yes"; else
        echo "No"; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0)
        echo $class; ?>>    
            <div class="view_col_left"><?php __('OSS_Site_tmobile Import Status'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['oss_script5_status']; ?></div>
            <div style="clear: both;"></div>
        </div>


    <?php if ($view_fields['oss_script5_status'] != "Imported Successfully and Activation Successful") { ?>
            <div <?php if ($i++ % 2 == 0)
            echo $class; ?>>    
                <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
            <?php $view_fields['oss_script5_comments'] = str_replace(' ', '&nbsp;', $view_fields['oss_script5_comments']);
            $view_fields['oss_script5_comments'] = nl2br($view_fields['oss_script5_comments']); ?>
                <div class="view_col_right"><?php echo $view_fields['oss_script5_comments']; ?></div>

                <div style="clear: both;"></div>
            </div>

        <?php if ($view_fields['oss_script5_tcm'] != "") { ?>
                <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>    
                    <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                    <div class="view_col_right"><?php echo $view_fields['oss_script5_tcm']; ?></div>
                    <div style="clear: both;"></div>
                </div>

                <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>    
                    <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
            <?php $view_fields['oss_script5_tcm_explanation'] = str_replace(' ', '&nbsp;', $view_fields['oss_script5_tcm_explanation']);
            $view_fields['oss_script5_tcm_explanation'] = nl2br($view_fields['oss_script5_tcm_explanation']); ?>
                    <div class="view_col_right"><?php echo $view_fields['oss_script5_tcm_explanation']; ?></div>

                    <div style="clear: both;"></div>
                </div>
        <?php } ?>
    <?php } ?>
<?php } ?>
</div>   
    
</fieldset>

<fieldset>       
  <legend>Additional Information</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Additional Notes'); ?></div>
            <?php $view_fields['additional_notes'] = str_replace(' ', '&nbsp;',$view_fields['additional_notes']);
            $view_fields['additional_notes'] = nl2br($view_fields['additional_notes']); ?>
            <div class="view_col_right"><?php echo $view_fields['additional_notes']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('SLR Report Closed'); ?></div>
            <div class="view_col_right"><?php if($view_fields['slr_report_status'] == '1') echo "Yes"; else echo "No"; ?></div>
            <div style="clear: both;"></div>
        </div> 
      
       
        <div <?php 
        $filedata = $fileNames['TmobileSlfile'];
        ?>
            <div class="view_col_left"><?php __('File Attached'); ?></div>
            <div class="view_col_right"> 
           <?php
                if (($filedata['file_name'])!="")
                {
                echo $filedata['file_name']; ?>
                <br/>
                <?php  echo $this->Html->link(__('Download File', true), array('action' => 'download', $view_fields['id'])); ?>
                <br/>
             <?php   }
             
            ?>
            </div>
            <div style="clear: both;"></div>
        </div>  
    </div>
 
 </fieldset> 