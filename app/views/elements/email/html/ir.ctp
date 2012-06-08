
<?PHP
    $class = 'class="altrow"';
?>

<?PHP
    echo $html->css("lte-lit"); 
    $class = ' class="altrow"';
    echo $this->Html->script(array('jquery.js', 'lte_add_modify.js'));      
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

div.view_col_left_gray {
    font-size: 14px;
    padding-left: 4px;
    margin: 0px;
    line-height: 2.5em;
    font-weight: bold;
    width: 300px;
    float: left;
    clear: none;
    background-color:gray;
    word-wrap: break-word;
}

div.view_col_right_gray {
    font-size: 14px;
    margin: 0px;
    line-height: 2.5em;
    width: 940px;
    float: left;
    clear: right;
    background-color:gray;
    word-wrap: break-word;
}

</style>

<h2><?php  __('IR Report Number: ');
    echo $dataValues['IrModule']['id'];?></h2>
<div class="lte_container">
<fieldset>
    
    
    <div class="lte_view"><?PHP $i = 0; ?>
        <?php if (($dataValues['IrModule']['activity_result']== "Successful"))
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left_green"><?php __('Activity Result'); ?></div>
            <div class="view_col_right_green"><?php echo $dataValues['IrModule']['activity_result']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left_green"><?php __('Activity Type'); ?></div>
            <div class="view_col_right_green"><?php echo $dataValues['IrModule']['activity_type']; ?></div>
            <div style="clear: both;"></div>
        </div>    
        
        <?php if (!empty($dataValues['IrModule']['date_time_activity']))
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left_green"><?php __('Day Time Activity ?'); ?></div>
            <div class="view_col_right_green"><?php echo $dataValues['IrModule']['date_time_activity']; ?></div>
            <div style="clear: both;"></div>
        </div>          
        <?php } 
        } ?>
        
        <?php if (($dataValues['IrModule']['activity_result']== "Successful_With_Issues"))
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left_orange"><?php __('Activity Status'); ?></div>
            <div class="view_col_right_orange"><?php echo $dataValues['IrModule']['activity_result']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left_orange"><?php __('Activity Type'); ?></div>
            <div class="view_col_right_orange"><?php echo $dataValues['IrModule']['activity_type']; ?></div>
            <div style="clear: both;"></div>
        </div>  
         <?php if (!empty($dataValues['IrModule']['date_time_activity']))
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left_orange"><?php __('Day Time Activity ?'); ?></div>
            <div class="view_col_right_orange"><?php echo $dataValues['IrModule']['date_time_activity']; ?></div>
            <div style="clear: both;"></div>
        </div>          
        <?php } 
        } ?>

        
        <?php if (($dataValues['IrModule']['activity_result']== "Successful_With_Issues_Follow_Up_Required"))
        { ?> 
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left_orange"><?php __('Activity Status'); ?></div>
            <div class="view_col_right_orange"><?php echo $dataValues['IrModule']['activity_result']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left_orange"><?php __('Activity Type'); ?></div>
            <div class="view_col_right_orange"><?php echo $dataValues['IrModule']['activity_type']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php if (!empty($dataValues['IrModule']['date_time_activity']))
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left_orange"><?php __('Day Time Activity ?'); ?></div>
            <div class="view_col_right_orange"><?php echo $dataValues['IrModule']['date_time_activity']; ?></div>
            <div style="clear: both;"></div>
        </div>          
        <?php } 
        } ?>
        
        <?php if (($dataValues['IrModule']['activity_result']== "Partially_Executed_Follow_up_Required"))
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left_red"><?php __('Activity Status'); ?></div>
            <div class="view_col_right_red"><?php echo $dataValues['IrModule']['activity_result']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left_red"><?php __('Activity Type'); ?></div>
            <div class="view_col_right_red"><?php echo $dataValues['IrModule']['activity_type']; ?></div>
            <div style="clear: both;"></div>
        </div>  
       <?php if (!empty($dataValues['IrModule']['date_time_activity']))
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left_red"><?php __('Day Time Activity ?'); ?></div>
            <div class="view_col_right_red"><?php echo $dataValues['IrModule']['date_time_activity']; ?></div>
            <div style="clear: both;"></div>
        </div>          
        <?php } 
        } ?>
        
        <?php if (($dataValues['IrModule']['activity_result']== "Unsuccessful/Fallback"))
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left_red"><?php __('Activity Status'); ?></div>
            <div class="view_col_right_red"><?php echo $dataValues['IrModule']['activity_result']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left_red"><?php __('Activity Type'); ?></div>
            <div class="view_col_right_red"><?php echo $dataValues['IrModule']['activity_type']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php if (!empty($dataValues['IrModule']['date_time_activity'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left_red"><?php __('Day Time Activity ?'); ?></div>
            <div class="view_col_right_red"><?php echo $dataValues['IrModule']['date_time_activity']; ?></div>
            <div style="clear: both;"></div>
        </div>          
        <?php } 
        } ?>
        
        <?php if (($dataValues['IrModule']['activity_result']== "Canceled/Rescheduled"))
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left_orange"><?php __('Activity Status'); ?></div>
            <div class="view_col_right_orange"><?php echo $dataValues['IrModule']['activity_result']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left_orange"><?php __('Activity Type'); ?></div>
            <div class="view_col_right_orange"><?php echo $dataValues['IrModule']['activity_type']; ?></div>
            <div style="clear: both;"></div>
        </div>          
        <?php if (!empty($dataValues['IrModule']['date_time_activity'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left_orange"><?php __('Day Time Activity ?'); ?></div>
            <div class="view_col_right_orange"><?php echo $dataValues['IrModule']['date_time_activity']; ?></div>
            <div style="clear: both;"></div>
        </div>          
        <?php } 
        } ?>
        
        <?php if (!empty($dataValues['IrModule']['number_of_issues'])) { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Total number of Issues'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['number_of_issues']; ?></div>
            <div style="clear: both;"></div>
        </div>         
        
        <?php echo "______________________________________________________________________" ;?>               
        <?php for($cnt = 0; $cnt < count($dataValues['IrIssue']); $cnt++){
            ?>
        <legend><?php echo "<b>ISSUE #".($cnt + 1)."</b>"; ?></legend>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Issue Type'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrIssue'][$cnt]['type']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Issue Owner'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrIssue'][$cnt]['owner']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        
        <?php if($dataValues['IrIssue'][$cnt]['owner'] === "Ericsson") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Who needs to be contacted ?'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrIssue'][$cnt]['owner_ericsson_contact']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        <?php } ?>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Escalation Engineer contacted ?'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrIssue'][$cnt]['escalation_engineer_contacted']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        <?php if($dataValues['IrIssue'][$cnt]['escalation_engineer_contacted'] === "Yes"){ ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Signum'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrIssue'][$cnt]['escalation_engineer_contact_signum']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrIssue'][$cnt]['escalation_engineer_contact_name']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        <?php }?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Issue Summary'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrIssue'][$cnt]['issue_summary']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Issue Impact'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrIssue'][$cnt]['impact']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php echo "____________________________________________________________________" ;?>               
        <?php } }?>     

        <?php if (!empty($dataValues['IrModule']['sh_subactivity'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left_gray"><?php __('Sub Activity'); ?></div>
            <div class="view_col_right_gray"><?php echo $dataValues['IrModule']['sh_subactivity']; ?></div>
            <div style="clear: both;"></div>
        </div>          
        <?php } ?>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Concerned Nodes'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['concerned_nodes']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($dataValues['IrModule']['customer'] != 'Other') 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Customer'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['customer']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } else { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Customer'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['customer']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } ?>

        <?php if (!empty($dataValues['IrModule']['sh_site'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Site Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['sh_site']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>
        
        <?php if (!empty($dataValues['IrModule']['sh_site1'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Site Name - 1'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['sh_site1']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>

        <?php if (!empty($dataValues['IrModule']['sh_site2'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Site Name - 2'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['sh_site2']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>
        
        <?php if (!empty($dataValues['IrModule']['project_manager'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Project Manager'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['project_manager']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>
                
        <?php if (!empty($dataValues['IrModule']['network_number'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Network ID'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['network_number']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>
                
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['engineer_name']; ?></div>
            <div style="clear: both;"></div>
        </div>     

        <?php if (!empty($dataValues['IrAdditionalEngineer'])) {?>
        <?php
         $i = 0;
         foreach ($dataValues['IrAdditionalEngineer'] as $irAdditionalEngineer) {
        ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __("Additional Engineer $i"); ?></div>
            <div class="view_col_right"><?php echo $irAdditionalEngineer['engineer_signum']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } } ?>
        
        <?php if ($dataValues['IrModule']['engineer_work_location'] != 'Other')
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Work Location'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['engineer_work_location']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } else { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Work Location'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['WorkLocation_Other']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } ?>  
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('TCM Engineer'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['tcm_engineer']; ?></div>
            <div style="clear: both;"></div>
        </div>  
       
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Activity Performed on'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['date_activity_performed']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Region'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['region']; ?></div>
            <div style="clear: both;"></div>
        </div>
       
                        
        <?php if (!empty($dataValues['IrModule']['mop_used'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Was MOP used ?'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['mop_used']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php if ($dataValues['IrModule']['mop_used'] == 'Yes')
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('MOP Revision'); ?></div>
			<?php $dataValues['IrModule']['mop_version'] = str_replace(' ', '&nbsp;',$dataValues['IrModule']['mop_version']);
            $dataValues['IrModule']['mop_version'] = nl2br($dataValues['IrModule']['mop_version']); ?>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['mop_version']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } ?> 
       <?php } ?>
        
        <?php if (!empty($dataValues['IrModule']['script_used'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Were Scripts used ?'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['script_used']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>
        
        <?php if (!empty($dataValues['IrModule']['script_problem_encountered'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Issues concerning Scripts'); ?></div>
			<?php $dataValues['IrModule']['script_problem_encountered'] = str_replace(' ', '&nbsp;',$dataValues['IrModule']['script_problem_encountered']);
            $dataValues['IrModule']['script_problem_encountered'] = nl2br($dataValues['IrModule']['script_problem_encountered']); ?>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['script_problem_encountered']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php if ($dataValues['IrModule']['script_problem_encountered'] == 'Yes')
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Comments'); ?></div>
			<?php $dataValues['IrModule']['script_problems'] = str_replace(' ', '&nbsp;',$dataValues['IrModule']['script_problems']);
            $dataValues['IrModule']['script_problems'] = nl2br($dataValues['IrModule']['script_problems']); ?>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['script_problems']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } ?> 
       <?php } ?>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Time Spent'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['time_spent']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if (!empty($dataValues['IrModule']['precheck_issue_encountered'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Issues faced during Prechecks?'); ?></div>
			<?php $dataValues['IrModule']['precheck_issue_encountered'] = str_replace(' ', '&nbsp;',$dataValues['IrModule']['precheck_issue_encountered']);
            $dataValues['IrModule']['precheck_issue_encountered'] = nl2br($dataValues['IrModule']['precheck_issue_encountered']); ?>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['precheck_issue_encountered']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php if ($dataValues['IrModule']['precheck_issue_encountered'] == 'Yes')
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Comments'); ?></div>
			<?php $dataValues['IrModule']['precheck_issues'] = str_replace(' ', '&nbsp;',$dataValues['IrModule']['precheck_issues']);
            $dataValues['IrModule']['precheck_issues'] = nl2br($dataValues['IrModule']['precheck_issues']); ?>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['precheck_issues']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } ?> 
       <?php } ?>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Total Nodes Scheduled'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['total_nodes_scheduled']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Total Nodes Attempted'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['total_nodes_attempted']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Total Nodes Successful'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['total_nodes_successful']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Total Nodes Unsuccessful'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['total_nodes_unsuccessful']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Link to the view the report'); ?></div>
            <div class="view_col_right"><?php echo $this->Html->link("http://138.85.162.107/pqr/trunk/source/working/index.php/ir_modules/view/{$dataValues['IrModule']['id']}/search/fromView"); ?></div>
            <div style="clear: both;"></div>
        </div>          
                        
        <?php if (!empty($dataValues['IrModule']['additional_notes']))
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Additional Notes'); ?></div>
			<?php $dataValues['IrModule']['additional_notes'] = str_replace(' ', '&nbsp;',$dataValues['IrModule']['additional_notes']);
            $dataValues['IrModule']['additional_notes'] = nl2br($dataValues['IrModule']['additional_notes']); ?>
            <div class="view_col_right"><?php echo $dataValues['IrModule']['additional_notes']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        <?php }?>
    </div>
    
</fieldset>  

</div>