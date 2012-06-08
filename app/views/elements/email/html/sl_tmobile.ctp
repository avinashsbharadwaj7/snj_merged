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
<style>
    /* 
    Document   : lte-lit
    Created on : Jun 2, 2011, 6:32:22 PM
    Author     : ebrrick
    Description:
        Purpose of the stylesheet follows.
*/

/* 
   TODO customize this sample style
   Syntax recommendation http://www.w3.org/TR/REC-CSS2/
*/

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
    font-size: 14px;
    padding-left: 4px;
    margin: 0px;
    line-height: 2.5em;
    font-weight: bold;
    width: 300px;
    float: left;
    clear: none;
    word-wrap: break-word;
}

div.view_col_right {
    margin: 0px;
    font-size: 14px;
    float: left;
    clear: right;
    width: 940px;
    line-height: 2em;
    word-wrap: break-word;
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

div.view_col_left_orange {
    font-size: 14px;
    padding-left: 4px;
    margin: 0px;
    line-height: 2.5em;
    font-weight: bold;
    width: 300px;
    float: left;
    clear: none;
    background-color:orange;
    word-wrap: break-word;
}

div.view_col_right_orange {
    font-size: 14px;
    margin: 0px;
    line-height: 2.5em;
    width: 940px;
    float: left;
    clear: right;
    background-color:orange;
    word-wrap: break-word;
}

div.view_col_left_green {
    font-size: 14px;
    padding-left: 4px;
    margin: 0px;
    line-height: 2.5em;
    font-weight: bold;
    width: 300px;
    float: left;
    clear: none;
    background-color:green;
    word-wrap: break-word;
}

div.view_col_right_green {
    font-size: 14px;
    margin: 0px;
    line-height: 2.5em;
    width: 940px;
    float: left;
    clear: right;
    background-color:green;
    word-wrap: break-word;
}

div.view_col_left_red {
    font-size: 14px;
    padding-left: 4px;
    margin: 0px;
    line-height: 2.5em;
    font-weight: bold;
    width: 300px;
    float: left;
    clear: none;
    background-color:red;
    word-wrap: break-word;
}

div.view_col_right_red {
    font-size: 14px;
    margin: 0px;
    line-height: 2.5em;
    width: 940px;
    float: left;
    clear: right;
    background-color:red;
    word-wrap: break-word;
}
</style>

<?php $view_fields = $view_fields['TmobileSlmaster']; ?>
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
      
 </fieldset> 