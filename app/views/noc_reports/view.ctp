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
                         
                            $view_fields = $view_fields[0]['NocReport'];
                           
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

<h2><?php  __('NOC Report Number: ');
    echo "NOC".$view_fields['id'];?></h2>
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
            <div class="view_col_left"><?php __('Week Number'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['week']; ?></div>
            <div style="clear: both;"></div>
        </div>
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Network Number'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['network_number']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Region'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['region']; ?></div>
            <div style="clear: both;"></div>
        </div>
		
		<?php if($view_fields['market'] != "") { ?>
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Market'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['market']; ?></div>
            <div style="clear: both;"></div>
        </div>
		<?php } ?>
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Day or Night Activity'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['day_or_night']; ?></div>
            <div style="clear: both;"></div>
        </div>

		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('ASP Full Name'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['asp_name']; ?></div>
            <div style="clear: both;"></div>
        </div>
  
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('ASP Contact Number'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['asp_contact']; ?></div>
            <div style="clear: both;"></div>
        </div> 
       		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('ASP Company'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['asp_company']; ?></div>
            <div style="clear: both;"></div>
        </div>  
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('IM/PM Name'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['im_or_pm']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        
        <?php if($view_fields['im_or_pm_contact'] != "") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('IM/PM Contact Number'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['im_or_pm_contact']; ?></div>
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
            <div class="view_col_left"><?php __('Date Integration Scheduled'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['date_integration_scheduled'] ?></div>
            <div style="clear: both;"></div>
        </div> 
        
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('RNC'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['rnc'] ?></div>
            <div style="clear: both;"></div>
        </div> 
        
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Site Name - Main Cabinet'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['site_name_main_cabinet'] ?></div>
            <div style="clear: both;"></div>
        </div>
		
		<?php if($view_fields['site_name_secondary_cabinet'] != '') { ?>
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Site Name - Secondary Cabinet'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['site_name_secondary_cabinet'] ?></div>
            <div style="clear: both;"></div>
        </div> 
		<?php } ?>
        
       		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('NTP Validated'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['ntp_validated']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		
		<?php if($view_fields['ntp_validated'] == "Yes") { ?>
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('NTP Issues Encountered'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['ntp_issues_encountered']; ?></div>
            <div style="clear: both;"></div>
        </div> 

			<?php if($view_fields['ntp_issues_encountered'] == "Yes") { ?>
			   <div <?php if ($i++ % 2 == 0) echo $class;?>>    
					<div class="view_col_left"><?php __('NTP Issues'); ?></div>
					<?php $view_fields['ntp_issues'] = str_replace(' ', '&nbsp;',$view_fields['ntp_issues']);
					$view_fields['ntp_issues'] = nl2br($view_fields['ntp_issues']); ?>
					<div class="view_col_right"><?php echo $view_fields['ntp_issues']; ?></div>
					<div style="clear: both;"></div>
				</div> 
			<?php } ?>
        <?php } ?>
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('CSB Number'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['csb_number']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('CSB Issues Encountered'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['csb_issues_encountered']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		
		<?php if($view_fields['csb_issues_encountered'] == "Yes") { ?>
			<div <?php if ($i++ % 2 == 0) echo $class;?>>    
					<div class="view_col_left"><?php __('CSB Issues'); ?></div>
					<?php $view_fields['csb_issues'] = str_replace(' ', '&nbsp;',$view_fields['csb_issues']);
					$view_fields['csb_issues'] = nl2br($view_fields['csb_issues']); ?>
					<div class="view_col_right"><?php echo $view_fields['csb_issues']; ?></div>
					<div style="clear: both;"></div>
				</div> 
        <?php } ?>
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Does ASP have the MOP'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['asp_mop']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		
		<?php if($view_fields['asp_mop'] == "Yes") { ?>
			<div <?php if ($i++ % 2 == 0) echo $class;?>>    
					<div class="view_col_left"><?php __('ASP MOP Revision'); ?></div>					
					<div class="view_col_right"><?php echo $view_fields['asp_mop_revision']; ?></div>
					<div style="clear: both;"></div>
				</div> 
        <?php } ?>
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Access to the building'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['building_access']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		
		<?php if($view_fields['building_access'] == "No") { ?>
			<div <?php if ($i++ % 2 == 0) echo $class;?>>    
					<div class="view_col_left"><?php __('Building Access Issues'); ?></div>
					<?php $view_fields['building_access_issues'] = str_replace(' ', '&nbsp;',$view_fields['building_access_issues']);
					$view_fields['building_access_issues'] = nl2br($view_fields['building_access_issues']); ?>
					<div class="view_col_right"><?php echo $view_fields['building_access_issues']; ?></div>
					<div style="clear: both;"></div>
				</div> 
        <?php } ?>
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('ASP knows the Site Location'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['site_location_known']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		
		<?php if($view_fields['site_location_known'] == "No") { ?>
			<div <?php if ($i++ % 2 == 0) echo $class;?>>    
					<div class="view_col_left"><?php __('Site Location/Direction Issues'); ?></div>
					<?php $view_fields['site_location_or_direction_issues'] = str_replace(' ', '&nbsp;',$view_fields['site_location_or_direction_issues']);
					$view_fields['site_location_or_direction_issues'] = nl2br($view_fields['site_location_or_direction_issues']); ?>
					<div class="view_col_right"><?php echo $view_fields['site_location_or_direction_issues']; ?></div>
					<div style="clear: both;"></div>
				</div> 
        <?php } ?>
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Hardware has been delivered'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['hdwr_delivered']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		
		<?php if($view_fields['hdwr_delivered'] == "No") { ?>
			<div <?php if ($i++ % 2 == 0) echo $class;?>>    
					<div class="view_col_left"><?php __('Hardware Delivery Issues'); ?></div>
					<?php $view_fields['hdwr_delivery_issues'] = str_replace(' ', '&nbsp;',$view_fields['hdwr_delivery_issues']);
					$view_fields['hdwr_delivery_issues'] = nl2br($view_fields['hdwr_delivery_issues']); ?>
					<div class="view_col_right"><?php echo $view_fields['hdwr_delivery_issues']; ?></div>
					<div style="clear: both;"></div>
				</div> 
        <?php } ?>
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('ASP has the necessary tools and spares'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['asp_has_tools_spares']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		
		<?php if($view_fields['asp_has_tools_spares'] == "No") { ?>
			<div <?php if ($i++ % 2 == 0) echo $class;?>>    
					<div class="view_col_left"><?php __('Tools and Spares Issues'); ?></div>
					<?php $view_fields['asp_tools_spares_issues'] = str_replace(' ', '&nbsp;',$view_fields['asp_tools_spares_issues']);
					$view_fields['asp_tools_spares_issues'] = nl2br($view_fields['asp_tools_spares_issues']); ?>
					<div class="view_col_right"><?php echo $view_fields['asp_tools_spares_issues']; ?></div>
					<div style="clear: both;"></div>
				</div> 
        <?php } ?>
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('ASP has the required nodeB/TMA scripts'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['asp_has_nodeb_tma_scripts']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		
		<?php if($view_fields['asp_has_nodeb_tma_scripts'] == "No") { ?>
			<div <?php if ($i++ % 2 == 0) echo $class;?>>    
					<div class="view_col_left"><?php __('NodeB/TMA Script Issues'); ?></div>
					<?php $view_fields['asp_nodeb_tma_scripts_issues'] = str_replace(' ', '&nbsp;',$view_fields['asp_nodeb_tma_scripts_issues']);
					$view_fields['asp_nodeb_tma_scripts_issues'] = nl2br($view_fields['asp_nodeb_tma_scripts_issues']); ?>
					<div class="view_col_right"><?php echo $view_fields['asp_nodeb_tma_scripts_issues']; ?></div>
					<div style="clear: both;"></div>
				</div> 
        <?php } ?>
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('NodeB Software Information, Location and Access Confirmed'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['nodeb_swinfo_loc_access_confirmed']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		
		<?php if($view_fields['sw_upgrade_issues'] != "") { ?>
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Software Upgrade Issues'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['sw_upgrade_issues']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		<?php } ?>
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('ASP has the Contact details of NIC, PM/IM, MSN, ATT helpdesk'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['asp_has_contact_details']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Final Result'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['final_results']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		
		<?php if($view_fields['final_results'] != "Passed") { ?>
			<div <?php if ($i++ % 2 == 0) echo $class;?>>    
					<div class="view_col_left"><?php __('Emphasis needed on'); ?></div>
					<?php $view_fields['emphasis_needed_on'] = str_replace(' ', '&nbsp;',$view_fields['emphasis_needed_on']);
					$view_fields['emphasis_needed_on'] = nl2br($view_fields['emphasis_needed_on']); ?>
					<div class="view_col_right"><?php echo $view_fields['emphasis_needed_on']; ?></div>
					<div style="clear: both;"></div>
				</div> 
        <?php } ?>
		
		<?php if($view_fields['contact_details_for_issues'] != "") { ?>
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Contact Details during issue'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['contact_details_for_issues']; ?></div>
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
   
 



