
<?PHP
    $class = ' class="altrow"';
    //echo $this->Html->script(array('jquery.js', 'lte_add_modify.js'));      
?>

<table>
        <tr>
                <th><?php
                            $view_fields = $view_fields['Slmaster'];
                            $array_activity = array(
                                                'New Site Build - 1st Carrier Add',
                                                'New Site Build - 1st & 2nd Carrier Add',
                                                'New Site Build - 1st, 2nd & 3rd Carrier Add',
                                                '2nd Carrier Add',
                                                '3rd Carrier Add - OBIF Solution',
                                                '3rd Carrier Add - 2nd Cabinet Solution',
                                                '4th Carrier Add - OBIF Solution',
                                                '4th Carrier Add - 2nd Cabinet Solution'
                                                );
                            $array_activity_showall = array(
                                                'New Site Build - 1st Carrier Add',
                                                'New Site Build - 1st & 2nd Carrier Add',
                                                'New Site Build - 1st, 2nd & 3rd Carrier Add'
                                                );
                            $array_activity_notransport = array(
                                                '2nd Carrier Add',
                                                '3rd Carrier Add - OBIF Solution',
                                                '4th Carrier Add - OBIF Solution',
                                                '4th Carrier Add - 2nd Cabinet Solution'
                                                );
                            $array_activity_deletion = array(
                                                'Node(Site) - Complete(RNC + OSS)',
                                                'Node(Site) - OSS Relations',
                                                'Node(Site) - RNC Radio Network',
                                                'Node(Site) - RNC Transport Network'
                                                );
                    ?>
               </th>
        </tr>
</table>

<?PHP
    $class = 'class="altrow"';
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

<h2><?php  __('SL Report Details: ');
    echo "SLRW".$id;?></h2>
<h4><?php  __('Date Created: ');
    echo $view_fields['date_created'];?></h4>
<h4><?php  __('Date Modified ');
    echo $view_fields['date_modified']; ?></h4>

<div class="lte_container">
    <fieldset>
    <div class="lte_view"><?PHP $i = 0; ?>
        
        <?php if (($view_fields['activity_result']== "Successful"))
         { ?>
                  <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                      <div class="view_col_left_green"><?php __('Activity Result'); ?></div>
                      <div class="view_col_right_green"><?php echo $view_fields['activity_result']; ?></div>
                      <div style="clear: both;"></div>
                 </div> 
        
                 <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                      <div class="view_col_left_green"><?php __('SLR Report Closed'); ?></div>
                      <div class="view_col_right_green"><?php if($view_fields['slr_report_status'] == '1') echo "Yes"; else echo "No"; ?></div>
                      <div style="clear: both;"></div>
                 </div> 
        <?php } 
              else if (($view_fields['activity_result']== "Successful with issues - Follow-up Required"))
             { ?>
                 <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                      <div class="view_col_left_orange"><?php __('Activity Result'); ?></div>
                      <div class="view_col_right_orange"><?php echo $view_fields['activity_result']; ?></div>
                      <div style="clear: both;"></div>
                 </div> 
        
                 <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                      <div class="view_col_left_orange"><?php __('SLR Report Closed'); ?></div>
                      <div class="view_col_right_orange"><?php if($view_fields['slr_report_status'] == '1') echo "Yes"; else echo "No"; ?></div>
                      <div style="clear: both;"></div>
                 </div> 

        <?php } 
              else if (($view_fields['activity_result']== "Ongoing"))
              { ?>
                <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                      <div class="view_col_left_orange"><?php __('Activity Result'); ?></div>
                      <div class="view_col_right_orange"><?php echo $view_fields['activity_result']; ?></div>
                      <div style="clear: both;"></div>
                 </div>
        
                 <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                      <div class="view_col_left_orange"><?php __('SLR Report Closed'); ?></div>
                      <div class="view_col_right_orange"><?php if($view_fields['slr_report_status'] == '1') echo "Yes"; else echo "No"; ?></div>
                      <div style="clear: both;"></div>
                 </div> 

        <?php } else if (($view_fields['activity_result']== "Canceled/Rescheduled"))
         
            { ?>
                 <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                      <div class="view_col_left_red"><?php __('Activity Result'); ?></div>
                      <div class="view_col_right_red"><?php echo $view_fields['activity_result']; ?></div>
                      <div style="clear: both;"></div>
                 </div>
        
                 <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                      <div class="view_col_left_red"><?php __('SLR Report Closed'); ?></div>
                      <div class="view_col_right_red"><?php if($view_fields['slr_report_status'] == '1') echo "Yes"; else echo "No"; ?></div>
                      <div style="clear: both;"></div>
                 </div> 

        <?php } 
        
        else { ?>
                <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                      <div class="view_col_left_orange"><?php __('Activity Result'); ?></div>
                      <div class="view_col_right_orange"><?php echo $view_fields['activity_result']; ?></div>
                      <div style="clear: both;"></div>
                 </div>
        
                 <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                      <div class="view_col_left_orange"><?php __('SLR Report Closed'); ?></div>
                      <div class="view_col_right_orange"><?php if($view_fields['slr_report_status'] == '1') echo "Yes"; else echo "No"; ?></div>
                      <div style="clear: both;"></div>
                 </div> 
        <?php } ?>

        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Time Spent on the Activity'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['time_taken_for_activity']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Customer Name'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['customer']; ?></div>
            <div style="clear: both;"></div>
        </div>
       
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Project Manager'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['project_manager']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Network Number'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['network_number']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Name'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['nic_name']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Signum'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['nic_signum']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Work Location'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['work_location']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('ATND/TCM Engineer Name/Signum'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['tcm_name_signum']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
         <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('SDM'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['sdm']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Date Activity Performed'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['date_activity_performed']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Region'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['region']; ?></div>
            <div style="clear: both;"></div>
        </div>
       
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Activity'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['activity_type'] ?></div>
            <div style="clear: both;"></div>
        </div> 
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('RNC'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['rnc']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('RBS/s'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['rbs']; ?></div>
            <div style="clear: both;"></div>
        </div> 

        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('OSS'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['oss']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        
        <?php if($view_fields['activity_type'] == "Post Check") { ?>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Original SLR Number'); ?></div>
            <div class="view_col_right"><?php echo "SLRW".$view_fields['activity_type_original_SLR'];  ?></div>
            <div style="clear: both;"></div>
        </div> 
                
        <?php }
        
        else if($view_fields['activity_type'] == "Other") { ?> 
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Activity Description'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['activity_type_other']; ?></div>
            <div style="clear: both;"></div>
        </div>
           
        <?php }
        
        else { 
               if(in_array($view_fields['activity_type'], $array_activity_deletion)) 
               { ?>
                
                <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                    <div class="view_col_left"><?php __('Activity Description'); ?></div>
                    <div class="view_col_right"><?php echo $view_fields['activity_type_other']; ?></div>
                    <div style="clear: both;"></div>
                </div>
                
         <?php } ?>
        <?php } ?>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Pre CV Created'); ?></div>
            <div class="view_col_right"><?php if($view_fields['pre_cv'] == '1') echo "Yes"; else echo "No"; ?></div>
            <div style="clear: both;"></div>
        </div> 
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Post CV Created'); ?></div>
            <div class="view_col_right"><?php if($view_fields['post_cv'] == '1') echo "Yes"; else echo "No"; ?></div>
            <div style="clear: both;"></div>
        </div> 
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Pre Check Complete'); ?></div>
            <div class="view_col_right"><?php if($view_fields['pre_check'] == '1') echo "Yes"; else echo "No"; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <?php if($view_fields['pre_check'] == "1") { ?>
         
       <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Pre Check KPIs'); ?></div>
            <?php $view_fields['pre_check_comments'] = str_replace(' ', '&nbsp;',$view_fields['pre_check_comments']);
            $view_fields['pre_check_comments'] = nl2br($view_fields['pre_check_comments']); ?>
            <div class="view_col_right"><?php echo $view_fields['pre_check_comments']; ?></div>
            &nbsp;
            <div style="clear: both;"></div>
        </div> 
        
        <?php } ?>
        
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Post Check Complete'); ?></div>
            <div class="view_col_right"><?php if($view_fields['post_check'] == '1') echo "Yes"; else echo "No"; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <?php if($view_fields['post_check'] == "1") { ?>
        
       <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Post Check KPIs'); ?></div>
            <?php $view_fields['post_check_comments'] = str_replace(' ', '&nbsp;',$view_fields['post_check_comments']);
            $view_fields['post_check_comments'] = nl2br($view_fields['post_check_comments']); ?>
            <div class="view_col_right"><?php echo $view_fields['post_check_comments']; ?></div>
            &nbsp;
            <div style="clear: both;"></div>
        </div> 
        
        <?php } ?>
          
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Alarms'); ?></div>
            <div class="view_col_right"><?php if($view_fields['alarms'] == '1') echo "Yes"; else echo "No"; ?></div>
            <div style="clear: both;"></div>
        </div> 
        
        <?php if($view_fields['alarms'] == "1") { ?>
        
       <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Alarms Description'); ?></div>
            <?php $view_fields['alarm_comments'] = str_replace(' ', '&nbsp;',$view_fields['alarm_comments']);
            $view_fields['alarm_comments'] = nl2br($view_fields['alarm_comments']); ?>
            <div class="view_col_right"><?php echo $view_fields['alarm_comments']; ?></div>
             &nbsp;
            <div style="clear: both;"></div>
        </div> 
        
        <?php } ?>
       
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Pre and Post Check KPIs Consistent'); ?></div>
            <div class="view_col_right"><?php if($view_fields['kpi_consistency'] == '1') echo "Yes"; else echo "No"; ?></div>
            <div style="clear: both;"></div>
        </div> 

        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('OSS Cleanup Complete - Scripts Deleted'); ?></div>
            <div class="view_col_right"><?php if($view_fields['oss_cleanup_scripts'] == '1') echo "Yes"; else echo "No"; ?></div>
            <div style="clear: both;"></div>
        </div> 
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('OSS Cleanup Complete - PCs cleared'); ?></div>
            <div class="view_col_right"><?php if($view_fields['oss_cleanup_PC'] == '1') echo "Yes"; else echo "No"; ?></div>
            <div style="clear: both;"></div>
        </div> 
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('MOP Used'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['mop_used']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        
        <?php if($view_fields['mop_used'] == "Yes") { ?>
                
       <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('MOP Version'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['mop_version']; ?></div>
            <div style="clear: both;"></div>
       </div> 
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
             <div class="view_col_left"><?php __('Problems encountered with the MOP'); ?></div>
             <div class="view_col_right"><?php echo $view_fields['mop_problem']; ?></div>
             <div style="clear: both;"></div>
        </div> 
        
                    <?php if($view_fields['mop_problem'] == "Yes") { ?>
                    
                    <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                        <div class="view_col_left"><?php __('MOP Problems Description'); ?></div>
                        <?php $view_fields['mop_problem_description'] = str_replace(' ', '&nbsp;',$view_fields['mop_problem_description']);
                        $view_fields['mop_problem_description'] = nl2br($view_fields['mop_problem_description']); ?>
                        <div class="view_col_right"><?php echo $view_fields['mop_problem_description']; ?></div>
                        &nbsp;
                        <div style="clear: both;"></div>
                    </div> 

                    <?php }        
        } ?>
		
	
												<?php if($view_fields['activity_result_unsuccessful'] != "") 
                                               { ?>
                                                <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                                    <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                                                    <div class="view_col_right"><?php echo $view_fields['activity_result_unsuccessful']; ?></div>
                                                    <div style="clear: both;"></div>
                                                </div>

                                                <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                                    <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                                                    <?php $view_fields['activity_result_unsuccessful_explanation'] = str_replace(' ', '&nbsp;',$view_fields['activity_result_unsuccessful_explanation']);
                                                    $view_fields['activity_result_unsuccessful_explanation'] = nl2br($view_fields['activity_result_unsuccessful_explanation']); ?>
                                                    <div class="view_col_right"><?php echo $view_fields['activity_result_unsuccessful_explanation']; ?></div>
                                                                               
                                                    <div style="clear: both;"></div>
                                                </div>
                                                <?php } ?>
												

    <?php if(in_array($view_fields['activity_type'],$array_activity))
    { ?>        
        <?php if(in_array($view_fields['activity_type'],$array_activity_showall) || $view_fields['activity_type'] == "3rd Carrier Add - 2nd Cabinet Solution") 
                
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Transport Script Loaded'); ?></div>
            <div class="view_col_right"><?php if($view_fields['transport_script'] == '1') echo "Yes"; else echo "No"; ?></div>
            <div style="clear: both;"></div>
        </div>   
           
             <?php if($view_fields['transport_script'] == "1") 
                   { ?>
                    <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                        <div class="view_col_left"><?php __('Transport Script Status'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['transport_script_status']; ?></div>
                        <div style="clear: both;"></div>
                    </div>
        
                            <?php if($view_fields['transport_script_status'] != "Loaded Successfully") 
                            { ?>
                                        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                            <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                                            <?php $view_fields['transport_script_comments'] = str_replace(' ', '&nbsp;',$view_fields['transport_script_comments']);
                                            $view_fields['transport_script_comments'] = nl2br($view_fields['transport_script_comments']); ?>
                                            <div class="view_col_right"><?php echo $view_fields['transport_script_comments']; ?></div>
                                            &nbsp;
                                            <div style="clear: both;"></div>
                                        </div>
                                       
                                               <?php if($view_fields['transport_script_tcm'] != "") 
                                               { ?>
                                                <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                                    <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                                                    <div class="view_col_right"><?php echo $view_fields['transport_script_tcm']; ?></div>
                                                    <div style="clear: both;"></div>
                                                </div>

                                                <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                                    <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                                                    <?php $view_fields['transport_script_tcm_explanation'] = str_replace(' ', '&nbsp;',$view_fields['transport_script_tcm_explanation']);
                                                    $view_fields['transport_script_tcm_explanation'] = nl2br($view_fields['transport_script_tcm_explanation']); ?>
                                                    <div class="view_col_right"><?php echo $view_fields['transport_script_tcm_explanation']; ?></div>
                                                    &nbsp;
                                                    <div style="clear: both;"></div>
                                                </div>
                                                <?php } ?>
                              <?php } ?>
                <?php } ?>
        <?php } ?>
        
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Radio Script Loaded'); ?></div>
            <div class="view_col_right"><?php if($view_fields['radio_script'] == '1') echo "Yes"; else echo "No"; ?></div>
            <div style="clear: both;"></div>
        </div>
        
                   <?php if($view_fields['radio_script'] == "1") 
                   { ?>
                    <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                        <div class="view_col_left"><?php __('Radio Script Status'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['radio_script_status'];  ?></div>
                        <div style="clear: both;"></div>
                    </div>
        
                            <?php if($view_fields['radio_script_status'] != "Loaded Successfully") 
                            { ?>
                                        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                            <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                                            <?php $view_fields['radio_script_comments'] = str_replace(' ', '&nbsp;',$view_fields['radio_script_comments']);
                                            $view_fields['radio_script_comments'] = nl2br($view_fields['radio_script_comments']); ?>
                                            <div class="view_col_right"><?php echo $view_fields['radio_script_comments']; ?></div>
                                            &nbsp;
                                            <div style="clear: both;"></div>
                                        </div>
                                       
                                               <?php if($view_fields['radio_script_tcm'] != "") 
                                               { ?>
                                                <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                                    <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                                                    <div class="view_col_right"><?php echo $view_fields['radio_script_tcm']; ?></div>
                                                    <div style="clear: both;"></div>
                                                </div>

                                                <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                                    <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                                                    <?php $view_fields['radio_script_tcm_explanation'] = str_replace(' ', '&nbsp;',$view_fields['radio_script_tcm_explanation']);
                                                    $view_fields['radio_script_tcm_explanation'] = nl2br($view_fields['radio_script_tcm_explanation']); ?>
                                                    <div class="view_col_right"><?php echo $view_fields['radio_script_tcm_explanation']; ?></div>
                                                    &nbsp;
                                                    <div style="clear: both;"></div>
                                                </div>
                                                <?php } ?>
                              <?php } ?>
                <?php } ?>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Newly added sectors locked and cell reserved'); ?></div>
            <div class="view_col_right"><?php if($view_fields['sectors_locked_cellreserved'] == '1') echo "Yes"; else echo "No"; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <?php if(in_array($view_fields['activity_type'],$array_activity_showall) || $view_fields['activity_type'] == "3rd Carrier Add - 2nd Cabinet Solution") 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Continuity Check set to false'); ?></div>
            <div class="view_col_right"><?php if($view_fields['continuity_check'] == '1') echo "Yes"; else echo "No"; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Alarm Report set to 2'); ?></div>
            <div class="view_col_right"><?php if($view_fields['alarm_report'] == '1') echo "Yes"; else echo "No"; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } ?>
        
        <?php if(in_array($view_fields['activity_type'],$array_activity_showall)) 
        { ?>
              
                    <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                        <div class="view_col_left"><?php __('RBS Site File Imported'); ?></div>
                        <div class="view_col_right"><?php if($view_fields['rbs_site_file'] == '1') echo "Yes"; else echo "No"; ?></div>
                        <div style="clear: both;"></div>
                    </div>
                    
                   <?php if($view_fields['rbs_site_file'] == "1") 
                   { ?>
                    <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                        <div class="view_col_left"><?php __('RBS Site File Status'); ?></div>
                        <div class="view_col_right"><?php echo $view_fields['rbs_site_file_status'];  ?></div>
                        <div style="clear: both;"></div>
                    </div>
        
                            <?php if($view_fields['rbs_site_file_status'] != "Loaded Successfully") 
                            { ?>
                                        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                            <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                                            <?php $view_fields['rbs_site_file_comments'] = str_replace(' ', '&nbsp;',$view_fields['rbs_site_file_comments']);
                                            $view_fields['rbs_site_file_comments'] = nl2br($view_fields['rbs_site_file_comments']); ?>
                                            <div class="view_col_right"><?php echo $view_fields['rbs_site_file_comments']; ?></div>
                                            &nbsp;
                                            <div style="clear: both;"></div>
                                        </div>
                                       
                                               <?php if($view_fields['rbs_site_file_tcm'] != "") 
                                               { ?>
                                                <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                                    <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                                                    <div class="view_col_right"><?php echo $view_fields['rbs_site_file_tcm']; ?></div>
                                                    <div style="clear: both;"></div>
                                                </div>

                                                <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                                    <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                                                    <?php $view_fields['rbs_site_file_explanation'] = str_replace(' ', '&nbsp;',$view_fields['rbs_site_file_explanation']);
                                                    $view_fields['rbs_site_file_explanation'] = nl2br($view_fields['rbs_site_file_explanation']); ?>
                                                    <div class="view_col_right"><?php echo $view_fields['rbs_site_file_explanation']; ?></div>
                                                    &nbsp;
                                                    <div style="clear: both;"></div>
                                                </div>
                                                <?php } ?>
                              <?php } ?>
                <?php } ?>

                                                <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                                    <div class="view_col_left"><?php __('RBS ARNE File Copied To The ARNE Folder'); ?></div>
                                                    <div class="view_col_right"><?php if($view_fields['rbs_arne_file'] == '1') echo "Yes"; else echo "No"; ?></div>
                                                    <div style="clear: both;"></div>
                                                </div>
        <?php } ?>  
                        
                    <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                        <div class="view_col_left"><?php __('GSM Cells Imported'); ?></div>
                        <div class="view_col_right"><?php if($view_fields['gsm_cells'] == '1') echo "Yes"; else echo "No"; ?></div>
                        <div style="clear: both;"></div>
                    </div>
            
                            <?php if($view_fields['gsm_cells'] == "1") 
                            { ?>
                            <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                <div class="view_col_left"><?php __('Total Imported'); ?></div>
                                <div class="view_col_right"><?php echo $view_fields['gsm_cells_complete']; ?></div>
                                <div style="clear: both;"></div>
                            </div>

                            <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                <div class="view_col_left"><?php __('Out of'); ?></div>
                                <div class="view_col_right"><?php echo $view_fields['gsm_cells_total']; ?></div>
                                <div style="clear: both;"></div>
                            </div>

                            <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                <div class="view_col_left"><?php __('100% Activation'); ?></div>
                                <div class="view_col_right"><?php if($view_fields['gsm_cells_activation'] == '1') echo "Yes"; else echo "No"; ?></div>
                                <div style="clear: both;"></div>
                            </div>
            
                            <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                <div class="view_col_left"><?php __('GSM Cells Import Status'); ?></div>
                                <div class="view_col_right"><?php echo $view_fields['gsm_cells_status']; ?></div>
                                <div style="clear: both;"></div>
                            </div>

                            
                    <?php if($view_fields['gsm_cells_status'] != "Imported Successfully and Activation Successful")
                            { ?>
                                        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                            <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                                            <?php $view_fields['gsm_cells_comments'] = str_replace(' ', '&nbsp;',$view_fields['gsm_cells_comments']);
                                            $view_fields['gsm_cells_comments'] = nl2br($view_fields['gsm_cells_comments']); ?>
                                            <div class="view_col_right"><?php echo $view_fields['gsm_cells_comments']; ?></div>
                                            &nbsp;
                                            <div style="clear: both;"></div>
                                        </div>
                                       
                                               <?php if($view_fields['gsm_cells_tcm'] != "") 
                                               { ?>
                                                <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                                    <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                                                    <div class="view_col_right"><?php echo $view_fields['gsm_cells_tcm']; ?></div>
                                                    <div style="clear: both;"></div>
                                                </div>

                                                <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                                    <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                                                    <?php $view_fields['gsm_cells_explanation'] = str_replace(' ', '&nbsp;',$view_fields['gsm_cells_explanation']);
                                                    $view_fields['gsm_cells_explanation'] = nl2br($view_fields['gsm_cells_explanation']); ?>
                                                    <div class="view_col_right"><?php echo $view_fields['gsm_cells_explanation']; ?></div>
                                                    &nbsp;
                                                    <div style="clear: both;"></div>
                                                </div>
                                                <?php } ?>
                              <?php } ?>
            <?php } ?>
            
            
                    <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                        <div class="view_col_left"><?php __('GSM Relations Imported'); ?></div>
                        <div class="view_col_right"><?php if($view_fields['gsm_relations'] == '1') echo "Yes"; else echo "No";  ?></div>
                        <div style="clear: both;"></div>
                    </div>
            
                            <?php if($view_fields['gsm_relations'] == "1") 
                            { ?>
                            <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                <div class="view_col_left"><?php __('Total Imported'); ?></div>
                                <div class="view_col_right"><?php echo $view_fields['gsm_relations_complete']; ?></div>
                                <div style="clear: both;"></div>
                            </div>

                            <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                <div class="view_col_left"><?php __('Out of'); ?></div>
                                <div class="view_col_right"><?php echo $view_fields['gsm_relations_total']; ?></div>
                                <div style="clear: both;"></div>
                            </div>

                            <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                <div class="view_col_left"><?php __('100% Activation'); ?></div>
                                <div class="view_col_right"><?php if($view_fields['gsm_relations_activation'] == '1') echo "Yes"; else echo "No"; ?></div>
                                <div style="clear: both;"></div>
                            </div>
            
                            <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                <div class="view_col_left"><?php __('GSM Relations Import Status'); ?></div>
                                <div class="view_col_right"><?php echo $view_fields['gsm_relations_status']; ?></div>
                                <div style="clear: both;"></div>
                            </div>

                            
                    <?php if($view_fields['gsm_relations_status'] != "Imported Successfully and Activation Successful")
                            { ?>
                                        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                            <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                                            <?php $view_fields['gsm_relations_comments'] = str_replace(' ', '&nbsp;',$view_fields['gsm_relations_comments']);
                                            $view_fields['gsm_relations_comments'] = nl2br($view_fields['gsm_relations_comments']); ?>
                                            <div class="view_col_right"><?php echo $view_fields['gsm_relations_comments']; ?></div>
                                            &nbsp;
                                            <div style="clear: both;"></div>
                                        </div>
                                       
                                               <?php if($view_fields['gsm_relations_tcm'] != "") 
                                               { ?>
                                                <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                                    <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                                                    <div class="view_col_right"><?php echo $view_fields['gsm_relations_tcm']; ?></div>
                                                    <div style="clear: both;"></div>
                                                </div>

                                                <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                                    <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                                                    <?php $view_fields['gsm_relations_explanation'] = str_replace(' ', '&nbsp;',$view_fields['gsm_relations_explanation']);
                                                    $view_fields['gsm_relations_explanation'] = nl2br($view_fields['gsm_relations_explanation']); ?>
                                                    <div class="view_col_right"><?php echo $view_fields['gsm_relations_explanation']; ?></div>
                                                    &nbsp;
                                                    <div style="clear: both;"></div>
                                                </div>
                                                <?php } ?>
                              <?php } ?>
            <?php } ?>
            
                    <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                        <div class="view_col_left"><?php __('Utran Relations Imported'); ?></div>
                        <div class="view_col_right"><?php if($view_fields['gsm_relations'] == '1') echo "Yes"; else echo "No";  ?></div>
                        <div style="clear: both;"></div>
                    </div>
            
                            <?php if($view_fields['utran_relations'] == "1") 
                            { ?>
                            <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                <div class="view_col_left"><?php __('Total Imported'); ?></div>
                                <div class="view_col_right"><?php echo $view_fields['utran_relations_complete']; ?></div>
                                <div style="clear: both;"></div>
                            </div>

                            <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                <div class="view_col_left"><?php __('Out of'); ?></div>
                                <div class="view_col_right"><?php echo $view_fields['utran_relations_total']; ?></div>
                                <div style="clear: both;"></div>
                            </div>

                            <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                <div class="view_col_left"><?php __('100% Activation'); ?></div>
                                <div class="view_col_right"><?php if($view_fields['utran_relations_activation'] == '1') echo "Yes"; else echo "No"; ?></div>
                                <div style="clear: both;"></div>
                            </div>
            
                            <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                <div class="view_col_left"><?php __('Utran Relations Import Status'); ?></div>
                                <div class="view_col_right"><?php echo $view_fields['utran_relations_status']; ?></div>
                                <div style="clear: both;"></div>
                            </div>

                            
                    <?php if($view_fields['utran_relations_status'] != "Imported Successfully and Activation Successful")
                            { ?>
                                        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                            <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                                            <?php $view_fields['utran_relations_comments'] = str_replace(' ', '&nbsp;',$view_fields['utran_relations_comments']);
                                            $view_fields['utran_relations_comments'] = nl2br($view_fields['utran_relations_comments']); ?>
                                            <div class="view_col_right"><?php echo $view_fields['utran_relations_comments']; ?></div>
                                            &nbsp;
                                            <div style="clear: both;"></div>
                                        </div>
                                       
                                               <?php if($view_fields['utran_relations_tcm'] != "") 
                                               { ?>
                                                <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                                    <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                                                    <div class="view_col_right"><?php echo $view_fields['utran_relations_tcm']; ?></div>
                                                    <div style="clear: both;"></div>
                                                </div>

                                                <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                                    <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                                                    <?php $view_fields['utran_relations_explanation'] = str_replace(' ', '&nbsp;',$view_fields['utran_relations_explanation']);
                                                    $view_fields['utran_relations_explanation'] = nl2br($view_fields['utran_relations_explanation']); ?>
                                                    <div class="view_col_right"><?php echo $view_fields['utran_relations_explanation']; ?></div>
                                                    &nbsp;
                                                    <div style="clear: both;"></div>
                                                </div>
                                                <?php } ?>
                              <?php } ?>
            <?php } ?>

                    <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                        <div class="view_col_left"><?php __('Interfrequency Relations Imported'); ?></div>
                        <div class="view_col_right"><?php if($view_fields['interfrequency_relations'] == '1') echo "Yes"; else echo "No";  ?></div>
                        <div style="clear: both;"></div>
                    </div>
            
                            <?php if($view_fields['interfrequency_relations'] == "1") 
                            { ?>
                            <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                <div class="view_col_left"><?php __('Total Imported'); ?></div>
                                <div class="view_col_right"><?php echo $view_fields['interfrequency_relations_complete']; ?></div>
                                <div style="clear: both;"></div>
                            </div>

                            <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                <div class="view_col_left"><?php __('Out of'); ?></div>
                                <div class="view_col_right"><?php echo $view_fields['interfrequency_relations_total']; ?></div>
                                <div style="clear: both;"></div>
                            </div>

                            <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                <div class="view_col_left"><?php __('100% Activation'); ?></div>
                                <div class="view_col_right"><?php if($view_fields['interfrequency_relations_activation'] == '1') echo "Yes"; else echo "No"; ?></div>
                                <div style="clear: both;"></div>
                            </div>
            
                            <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                <div class="view_col_left"><?php __('Interfrequency Relations Import Status'); ?></div>
                                <div class="view_col_right"><?php echo $view_fields['interfrequency_relations_status']; ?></div>
                                <div style="clear: both;"></div>
                            </div>

                            
                    <?php if($view_fields['interfrequency_relations_status'] != "Imported Successfully and Activation Successful")
                            { ?>
                                        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                            <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                                            <?php $view_fields['interfrequency_relations_comments'] = str_replace(' ', '&nbsp;',$view_fields['interfrequency_relations_comments']);
                                            $view_fields['interfrequency_relations_comments'] = nl2br($view_fields['interfrequency_relations_comments']); ?>
                                            <div class="view_col_right"><?php echo $view_fields['interfrequency_relations_comments']; ?></div>
                                            &nbsp;
                                            <div style="clear: both;"></div>
                                        </div>
                                       
                                               <?php if($view_fields['interfrequency_relations_tcm'] != "") 
                                               { ?>
                                                <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                                    <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                                                    <div class="view_col_right"><?php echo $view_fields['interfrequency_relations_tcm']; ?></div>
                                                    <div style="clear: both;"></div>
                                                </div>

                                                <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                                    <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                                                    <?php $view_fields['interfrequency_relations_explanation'] = str_replace(' ', '&nbsp;',$view_fields['interfrequency_relations_explanation']);
                                                    $view_fields['interfrequency_relations_explanation'] = nl2br($view_fields['interfrequency_relations_explanation']); 
?>
                                                    <div class="view_col_right"><?php echo $view_fields['interfrequency_relations_explanation']; ?></div>
                                                    &nbsp;
                                                    <div style="clear: both;"></div>
                                                </div>
                                                <?php } ?>
                              <?php } ?>
            <?php } ?>

            
                    <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                        <div class="view_col_left"><?php __('Femto Relations Imported'); ?></div>
                        <div class="view_col_right"><?php if($view_fields['femto_relations'] == '1') echo "Yes"; else echo "No";  ?></div>
                        <div style="clear: both;"></div>
                    </div>
            
                            <?php if($view_fields['femto_relations'] == "1") 
                            { ?>
                            <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                <div class="view_col_left"><?php __('Total Imported'); ?></div>
                                <div class="view_col_right"><?php echo $view_fields['femto_relations_complete']; ?></div>
                                <div style="clear: both;"></div>
                            </div>

                            <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                <div class="view_col_left"><?php __('Out of'); ?></div>
                                <div class="view_col_right"><?php echo $view_fields['femto_relations_total']; ?></div>
                                <div style="clear: both;"></div>
                            </div>

                            <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                <div class="view_col_left"><?php __('100% Activation'); ?></div>
                                <div class="view_col_right"><?php if($view_fields['femto_relations_activation'] == '1') echo "Yes"; else echo "No"; ?></div>
                                <div style="clear: both;"></div>
                            </div>
            
                            <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                <div class="view_col_left"><?php __('Femto Relations Import Status'); ?></div>
                                <div class="view_col_right"><?php echo $view_fields['femto_relations_status']; ?></div>
                                <div style="clear: both;"></div>
                            </div>

                            
                    <?php if($view_fields['femto_relations_status'] != "Imported Successfully and Activation Successful")
                            { ?>
                                        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                            <div class="view_col_left"><?php __('NIC Engineer Comments'); ?></div>
                                            <?php $view_fields['femto_relations_comments'] = str_replace(' ', '&nbsp;',$view_fields['femto_relations_comments']);
                                            $view_fields['femto_relations_comments'] = nl2br($view_fields['femto_relations_comments']); ?>
                                            <div class="view_col_right"><?php echo $view_fields['femto_relations_comments']; ?></div>
                                            &nbsp;
                                            <div style="clear: both;"></div>
                                        </div>
                                       
                                               <?php if($view_fields['femto_relations_tcm'] != "") 
                                               { ?>
                                                <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                                    <div class="view_col_left"><?php __('ATND/TCM Comments'); ?></div>
                                                    <div class="view_col_right"><?php echo $view_fields['femto_relations_tcm']; ?></div>
                                                    <div style="clear: both;"></div>
                                                </div>

                                                <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                                    <div class="view_col_left"><?php __('ATND/TCM Explanation'); ?></div>
                                                    <?php $view_fields['femto_relations_explanation'] = str_replace(' ', '&nbsp;',$view_fields['femto_relations_explanation']);
                                                    $view_fields['femto_relations_explanation'] = nl2br($view_fields['femto_relations_explanation']); ?>
                                                    <div class="view_col_right"><?php echo $view_fields['femto_relations_explanation']; ?></div>
                                                    &nbsp;
                                                    <div style="clear: both;"></div>
                                                </div>
                                                <?php } ?>
                              <?php } ?>
            <?php } ?>
<?php } ?>
 
    
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Additional Notes'); ?></div>
            <?php $view_fields['additional_notes'] = str_replace(' ', '&nbsp;',$view_fields['additional_notes']);
            $view_fields['additional_notes'] = nl2br($view_fields['additional_notes']); ?>
            <div class="view_col_right"><?php echo $view_fields['additional_notes']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        
     </div>
</fieldset>   
</div>       

   
