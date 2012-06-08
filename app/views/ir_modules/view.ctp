
<?PHP
    $class = 'class="altrow"';
?>

<?PHP
    //echo $html->css("lte-lit"); 
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
    margin-left: 30px;
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
    width: 265px;
    float: left;
    clear: none;
    word-wrap: break-word;
}

div.view_col_left_pd {
    font-size: 12px;
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
    font-size: 12px;
    float: left;
    clear: right;
    width: 500px;
    line-height: 2em;
    word-wrap: break-word;
}

div.view_col_right_pd {
    margin: 0px;
    font-size: 12px;
    float: left;
    clear: right;
    width: 400px;
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

</style>

<li>
    <?PHP 
           echo $this->Html->link(__('Back', true), array('action' => 'index'));
    ?>
    <?PHP if($irModule['IrModule']['engineer_signum'] == Authsome::get('username')) {
            echo '&nbsp;|&nbsp; ';
           echo $this->Html->link(__('Edit', true), array('action' => 'edit', $irModule['IrModule']['id'], true));
          if($irModule['IrModule']['activity_type'] === "LKF"){ 
           echo '&nbsp;|&nbsp; ';
           echo $this->Html->link(__('Clone Report', true), array('action' => 'cloneReport', $irModule['IrModule']['id'], true));
          }
    }
    ?>

</li>


<div class="irModules view">
<h2><?php  __("IR Report ID : ".$irModule['IrModule']['id']);
               ?></h2>
<?php //var_dump($irModule); ?>
    
    
<div class="lte_container">
<fieldset>
    <legend>Project Information</legend>
    
    <div class="lte_view"><?PHP $i = 0; ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Name'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['engineer_name']; ?></div>
            <div style="clear: both;"></div>
        </div>
      
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Signum'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['engineer_signum']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Team'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['engineer_team']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Customer'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['customer']; ?></div>
            <div style="clear: both;"></div>
        </div>
   
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Project Manager'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['project_manager']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Network Number'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['network_number']; ?></div>
            <div style="clear: both;"></div>
        </div>  
       
        <?php if ($irModule['IrModule']['engineer_work_location'] != "Other") {?>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Work Location'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['engineer_work_location']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } else { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Work Location'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['WorkLocation_Other']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } ?>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Date activity performed'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['date_activity_performed']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Region'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['region']; ?></div>
            <div style="clear: both;"></div>
        </div>  

        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Market'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['market']; ?></div>
            <div style="clear: both;"></div>
        </div>  

        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('TCM Engineer'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['tcm_engineer']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Day Time Activity'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['date_time_activity']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <?php if (!empty($irModule['IrModule']['csr_reference'])) { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('CSR Reference'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['csr_reference']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>
        
        <?php if (!empty($irModule['IrAdditionalEngineer'])) {?>
        <?php
         $i = 0;
         foreach ($irModule['IrAdditionalEngineer'] as $irAdditionalEngineer) {
        ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __("Additional Engineer $i"); ?></div>
            <div class="view_col_right"><?php echo $irAdditionalEngineer['engineer_signum']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } } ?>
        
        <?php if (!empty($irModule['IrModule']['csr_status'])) { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('CSR Status'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['csr_status']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>

        <?php if (!empty($irModule['IrModule']['ccb_work_ticket'])) { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('CCB Work Ticket & NCR/CTS Ticket #'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['ccb_work_ticket']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>

        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Access Method'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['access_method']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        
        <?php if ($irModule['IrModule']['access_method'] == "Smart Laptop") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('ASP Name'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['asp_name']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('ASP Contact'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['asp_contact']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('ASP Email Address'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['asp_emailaddr']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('ASP Logs attached ?'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['asp_logsattached']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        
        <?php } elseif ($irModule['IrModule']['access_method'] == "Sonar") {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Why Sonar was used ?'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['why_sonar_used']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>        

        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('MOP Used ?'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['mop_used']; ?></div>
            <div style="clear: both;"></div>
        </div>  

        <?php if ($irModule['IrModule']['mop_used'] == "Yes") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('MOP Revision'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['mop_version']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Problems concerning MOP'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['mop_problem_encountered']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php if ($irModule['IrModule']['mop_problem_encountered'] == "Yes") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('MOP Problems'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['mop_problems']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php }} ?>        

        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Was scripts used ?'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['script_used']; ?></div>
            <div style="clear: both;"></div>
        </div>  

        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Script Problems encountered ?'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['script_problem_encountered']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        
        <?php if ($irModule['IrModule']['script_problem_encountered'] == "Yes") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Comments'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['script_problems']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>

        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('FTP Server pingable'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['ftp_server_pingable']; ?></div>
            <div style="clear: both;"></div>
        </div>  

        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('NTP Server pingable'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['ntp_server_pingable']; ?></div>
            <div style="clear: both;"></div>
        </div>  
         
    </div>
</fieldset>  

<fieldset>
   <legend>Information</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Activity Type'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['activity_type']; ?></div>
            <div style="clear: both;"></div>
        </div> 

        <?php if (!empty($irModule['IrModule']['sh_subactivity'])) { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Sub Activity'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['sh_subactivity']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        <?php } ?>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Activity Result'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['activity_result']; ?></div>
            <div style="clear: both;"></div>
        </div>  

        <?php if (!empty($irModule['IrModule']['number_of_issues'])) { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Total number of Issues'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['number_of_issues']; ?></div>
            <div style="clear: both;"></div>
        </div>         
        
        <?php echo "_______________________________________________________________________________________________________" ;?>               
        <?php for($cnt = 0; $cnt < count($irModule['IrIssue']); $cnt++){
            ?>
        <legend><?php echo "<b>ISSUE #".($cnt + 1)."</b>"; ?></legend>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Issue Type'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrIssue'][$cnt]['type']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Issue Owner'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrIssue'][$cnt]['owner']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        
        <?php if($irModule['IrIssue'][$cnt]['owner'] === "Ericsson") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Who needs to be contacted ?'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrIssue'][$cnt]['owner_ericsson_contact']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        <?php } ?>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Escalation Engineer contacted ?'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrIssue'][$cnt]['escalation_engineer_contacted']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        <?php if($irModule['IrIssue'][$cnt]['escalation_engineer_contacted'] === "Yes"){ ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Signum'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrIssue'][$cnt]['escalation_engineer_contact_signum']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Name'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrIssue'][$cnt]['escalation_engineer_contact_name']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        <?php }?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Issue Summary'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrIssue'][$cnt]['issue_summary']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Issue Impact'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrIssue'][$cnt]['impact']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php echo "_______________________________________________________________________________________________________" ;?>               
        <?php } }?>     
        
        <?php if ($irModule['IrModule']['engineer_team'] == "NIC") {?>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Integration Complete ?'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['sh_integrationcomplete']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } elseif($irModule['IrModule']['engineer_team'] == "NDS")  { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Launch Status'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['sh_launchstatus']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Launched by'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['sh_launchedby']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Ready for tuning'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['sh_readyfortuning']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Ready for service'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['sh_readyforservice']; ?></div>
            <div style="clear: both;"></div>
        </div>      
        <?php } ?>

        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Precheck Issue Encountered'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['precheck_issue_encountered']; ?></div>
            <div style="clear: both;"></div>
        </div>  

        <?php if ($irModule['IrModule']['precheck_issue_encountered'] == "Yes") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Precheck Issues'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['precheck_issues']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php }?>     
        
        <?php if (!empty($irModule['IrModule']['concerned_nodes'])) { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Concerned Nodes'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['concerned_nodes']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php }?>     
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Total Nodes Scheduled'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['total_nodes_scheduled']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Total Nodes attempted'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['total_nodes_attempted']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Total Nodes successful'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['total_nodes_successful']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Total Nodes unsuccessful'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['total_nodes_unsuccessful']; ?></div>
            <div style="clear: both;"></div>
        </div>  
       	
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Nodes Excluded'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['nodes_excluded']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        
        <?php if ($irModule['IrModule']['nodes_excluded'] == "Yes") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Total Nodes Excluded'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['total_nodes_excluded']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Reason for Nodes excluded'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['reason_nodes_excluded']; ?></div>
            <div style="clear: both;"></div>
        </div>        
        <?php }?>     
        
        <?php if (!empty($irModule['IrModule']['reason_failed_nodes'])) { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Reason for failed nodes'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['reason_failed_nodes']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php }?>     
        <?php if (!empty($irModule['IrModule']['nodes_state'])) { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('State of failed/fallback nodes'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['nodes_state']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php }?>     
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Time Spent on the activity'); ?></div>
            <div class="view_col_right"><?php echo $irModule['IrModule']['time_spent']; ?></div>
            <div style="clear: both;"></div>
        </div>  
      
        <?php if (!empty($irModule['IrModule']['additional_notes'])) { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Additional Notes'); ?></div>
            <?php $irModule['IrModule']['additional_notes'] = str_replace(' ', '&nbsp;',$irModule['IrModule']['additional_notes']);
            $irModule['IrModule']['additional_notes'] = nl2br($irModule['IrModule']['additional_notes']); ?>
            
            <div class="view_col_right"><?php echo $irModule['IrModule']['additional_notes']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php }?>     

        <?php if (!empty($irModule['IrFile'])) { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('File Names'); ?></div>			
            <?php 
                        for ($i=0; $i < 15; $i++)
                        {
                                if(isset($irModule['IrFile'][$i]['file_name']))
                            {
            ?><div class="view_col_right"><?php echo $irModule['IrFile'][$i]['file_name'];
                                echo "\t";
                                echo $this->Html->link(__('Download File', true), array('action' => 'download', 
                                     $irModule['IrFile'][$i]['file_name']));                                
                                echo "\n";
                            }    
                            else 
                                break;    
                        
                        }?></div>
			&nbsp;
            <div style="clear: both;"></div>                        
	</div> <?php } ?>
        
</div>      
</fieldset>   
    
</div>    

</div>