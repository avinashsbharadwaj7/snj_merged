<li>
    <?PHP 
           echo $this->Html->link(__('Back', true), array('action' => 'index'));
    ?>
</li>

<?PHP
    echo $html->css("lte-lit"); 
    $class = ' class="altrow"';
    echo $this->Html->script(array('jquery.js', 'lte_add_modify.js'));      
?>

<table>
        <tr>
                <th><?php
                         
                            $view_fields = $view_fields[0]['TacReport'];
                           
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
    margin-left: 0px;
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
    width: 300px;
    float: left;
    clear: none;
    word-wrap:break-word;
}

div.view_col_right {
    margin: 0px;
    font-size: 12px;
    float: left;
    clear: right;
    width: 525px;
    line-height: 2em;
    word-wrap:break-word;
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

<h2><?php  __('TAC Report Number: ');
    echo "TAC".$view_fields['id'];?></h2>
<h2><?php  __('Date Created: ');
    echo $view_fields['date_created'];?></h2>
<h2><?php  __('Date Modified ');
    echo $view_fields['date_modified']; ?></h2>

<div class="lte_container">
<fieldset>
    <legend>Engineer Information</legend>
    
    <div class="lte_view"><?PHP $i = 0; ?>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Signum'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['signum'];  ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Name'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['name'];  ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Work Location'); ?></div>
            <div class="view_col_right"><?php
            if($view_fields['work_location_other'] != "")
                    echo $view_fields['work_location']." - ".$view_fields['work_location_other'];
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
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Customer'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['customer']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Region'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['region']; ?></div>
            <div style="clear: both;"></div>
        </div>
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('IR Report ID'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['ir_report_id']; ?></div>
            <div style="clear: both;"></div>
        </div>

		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('RNC'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['rnc']; ?></div>
            <div style="clear: both;"></div>
        </div>
  
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Site Name'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['site_name']; ?></div>
            <div style="clear: both;"></div>
        </div> 
       		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('NIC or TAC Engineer Creating the Report'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['nic_or_tac']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        
        <?php if($view_fields['nic_or_tac'] == "TAC") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('NIC Engineer Signum'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['nic_engineer_signum']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } else { ?>
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('TAC NIC Engineer Signum'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['tac_nic_engineer_signum']; ?></div>
            <div style="clear: both;"></div>
        </div>  
		<?php } ?>
		
		<?php if($view_fields['tac_tcm_engineer_signum'] != "") { ?>
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('TAC TCM Engineer Signum'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['tac_tcm_engineer_signum']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		<?php } ?>
		
		<?php if($view_fields['tac_msn_engineer_signum'] != "") { ?>
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('TAC MSN Engineer Signum'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['tac_msn_engineer_signum']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		<?php } ?>
		
		<?php if($view_fields['tac_rf_engineer_signum'] != "") { ?>
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('TAC RF Engineer Signum'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['tac_rf_engineer_signum']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		<?php } ?>
		
		<?php if($view_fields['market_pm'] != "") { ?>
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Market PM'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['market_pm']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		<?php } ?>
		
    </div>
</fieldset>  
    
<fieldset>
    <legend>Activity Information</legend>
    
    <div class="lte_view"><?PHP $i = 0; ?>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Activity'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['activity_type'] ?></div>
            <div style="clear: both;"></div>
        </div> 
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Issue Faced'); ?></div>
			<?php $view_fields['issue'] = str_replace(' ', '&nbsp;',$view_fields['issue']);
            $view_fields['issue'] = nl2br($view_fields['issue']); ?>
            <div class="view_col_right"><?php echo $view_fields['issue']  ?></div>
            <div style="clear: both;"></div>
        </div> 
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Solution'); ?></div>
			<?php $view_fields['solution'] = str_replace(' ', '&nbsp;',$view_fields['solution']);
            $view_fields['solution'] = nl2br($view_fields['solution']); ?>
            <div class="view_col_right"><?php echo $view_fields['solution']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		
		<?php if(Authsome::get('user_group_id') == 35004 || Authsome::get('user_group_id') == 1 || Authsome::get('username') == $view_fields['signum']) { ?>
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Cause Of The Problem'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['cause_of_the_problem']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		<?php } ?>
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Issue Resolved'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['issue_resolved']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		
		 <?php if($view_fields['issue_resolved'] == "No") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('The reason why the issue was not resolved'); ?></div>
			<?php $view_fields['issue_not_resolved_reason'] = str_replace(' ', '&nbsp;',$view_fields['issue_not_resolved_reason']);
            $view_fields['issue_not_resolved_reason'] = nl2br($view_fields['issue_not_resolved_reason']); ?>
            <div class="view_col_right"><?php echo $view_fields['issue_not_resolved_reason']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Escalated to'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['escalated_to']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		
        <?php } ?>

		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Comments'); ?></div>
			<?php $view_fields['comments'] = str_replace(' ', '&nbsp;',$view_fields['comments']);
            $view_fields['comments'] = nl2br($view_fields['comments']); ?>
            <div class="view_col_right"><?php echo $view_fields['comments']; ?></div>
            <div style="clear: both;"></div>
        </div> 
    </div>
</fieldset>  
   
 



