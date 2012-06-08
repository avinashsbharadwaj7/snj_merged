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
	background: #E4E8EF;
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
<?php $view_fields = $view_fields['NtpValidation']; ?>
<h2><font size='3'; color='blue';><?php  __('NTP Report Number: '); ?></font>
    <font size='3';><?php echo "NTP".$id;?></font></h2>
<h2><font size='3'; color='blue';><?php  __('Date Created: '); ?></font>
    <font size='3';><?php echo $view_fields['date_created'];?></font></h2>
<h2><font size='3'; color='blue';><?php  __('Date Modified ');  ?></font>
    <font size='3';><?php echo $view_fields['date_modified']; ?></font></h2>

<div class="lte_container">
<fieldset>
    <legend>Engineer Information</legend>
    
    <div class="lte_view"><?PHP $i = 0; ?>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('NIC Engineer Signum'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['nic_signum'];  ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('NIC Engineer Name'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['nic_name'];  ?></div>
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
            <div class="view_col_left"><?php __('Network Number'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['network_number']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Region'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['region']; ?></div>
            <div style="clear: both;"></div>
        </div>

		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Market'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['market']; ?></div>
            <div style="clear: both;"></div>
        </div>
  
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Date Integration Scheduled'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['date_integration_scheduled']; ?></div>
            <div style="clear: both;"></div>
        </div> 
       
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('RNC'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['rnc']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Site Name - Main Cabinet'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['site_main_cabinet']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        
        <?php if($view_fields['site_secondary_cabinet'] != "") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Site Name - Secondary Cabinet'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['site_secondary_cabinet']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('CSB Number'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['csb_number']; ?></div>
            <div style="clear: both;"></div>
        </div>  
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('CSB OKAY'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['csb_check']; ?></div>
            <div style="clear: both;"></div>
        </div>  
      
        <?php if($view_fields['csb_check'] == "No") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('CSB Issues'); ?></div>
			<?php $view_fields['csb_issue'] = str_replace(' ', '&nbsp;',$view_fields['csb_issue']);
            $view_fields['csb_issue'] = nl2br($view_fields['csb_issue']); ?>
            <div class="view_col_right"><?php echo $view_fields['csb_issue']; ?></div>
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
            <div class="view_col_left"><?php __('Final Result'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['final_results']  ?></div>
            <div style="clear: both;"></div>
        </div> 
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('RNC/OSS Script Load Complete'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['rnc_oss_script_load_complete']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		
		 <?php if($view_fields['rnc_oss_script_load_complete'] == "No") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('RNC/OSS Scripts Released'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['rnc_oss_scripts_released']; ?></div>
            <div style="clear: both;"></div>
        </div> 
			
				<?php if($view_fields['rnc_oss_scripts_released'] == "Yes") { ?>
				<div <?php if ($i++ % 2 == 0) echo $class;?>>    
					<div class="view_col_left"><?php __('RNC/OSS Scripts Release Date'); ?></div>
					<div class="view_col_right"><?php echo $view_fields['rnc_oss_scripts_release_date']; ?></div>
					<div style="clear: both;"></div>
				</div> 
				<?php } ?>
		
        <?php } ?>


		<?php if($view_fields['rnc_oss_script_load_scheduled_before_integration'] != "") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('RNC/OSS Scripts Released before Integration'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['rnc_oss_script_load_scheduled_before_integration']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        <?php } ?>
		
		<?php if($view_fields['rnc_oss_scripts_issue'] != "") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('RNC/OSS Scripts Issue'); ?></div>
			<?php $view_fields['rnc_oss_scripts_issue'] = str_replace(' ', '&nbsp;',$view_fields['rnc_oss_scripts_issue']);
            $view_fields['rnc_oss_scripts_issue'] = nl2br($view_fields['rnc_oss_scripts_issue']); ?>
            <div class="view_col_right"><?php echo $view_fields['rnc_oss_scripts_issue']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        <?php } ?>
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('RNC Frequency OKAY'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['rnc_frequency_check']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		<?php if($view_fields['rnc_frequency_check'] == "No") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('RNC Frequency Issue'); ?></div>
			<?php $view_fields['rnc_frequency_issue'] = str_replace(' ', '&nbsp;',$view_fields['rnc_frequency_issue']);
            $view_fields['rnc_frequency_issue'] = nl2br($view_fields['rnc_frequency_issue']); ?>
            <div class="view_col_right"><?php echo $view_fields['rnc_frequency_issue']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        <?php } ?>
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('VSWR Check OKAY'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['vswr_check']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		<?php if($view_fields['vswr_check'] == "No") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('VSWR Issue'); ?></div>
			<?php $view_fields['vswr_issue'] = str_replace(' ', '&nbsp;',$view_fields['vswr_issue']);
            $view_fields['vswr_issue'] = nl2br($view_fields['vswr_issue']); ?>
            <div class="view_col_right"><?php echo $view_fields['vswr_issue']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        <?php } ?>
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('RSSI Check OKAY'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['rssi_check']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		<?php if($view_fields['rssi_check'] == "No") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('RSSI Issue'); ?></div>
			<?php $view_fields['rssi_issue'] = str_replace(' ', '&nbsp;',$view_fields['rssi_issue']);
            $view_fields['rssi_issue'] = nl2br($view_fields['rssi_issue']); ?>
            <div class="view_col_right"><?php echo $view_fields['rssi_issue']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        <?php } ?>
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Alarms'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['alarm_check']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		<?php if($view_fields['alarm_check'] == "Yes") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Alarms Description'); ?></div>
			<?php $view_fields['alarm_description'] = str_replace(' ', '&nbsp;',$view_fields['alarm_description']);
            $view_fields['alarm_description'] = nl2br($view_fields['alarm_description']); ?>
            <div class="view_col_right"><?php echo $view_fields['alarm_description']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        <?php } ?>
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('KPIs Check OKAY'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['kpi_check']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		<?php if($view_fields['kpi_check'] == "No") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Bad KPIs Description'); ?></div>
			<?php $view_fields['bad_kpi_description'] = str_replace(' ', '&nbsp;',$view_fields['bad_kpi_description']);
            $view_fields['bad_kpi_description'] = nl2br($view_fields['bad_kpi_description']); ?>
            <div class="view_col_right"><?php echo $view_fields['bad_kpi_description']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        <?php } ?>
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Steered HS Allocation'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['steered_hs_allocation']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Auto Configuration'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['auto_configuration']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Cabinet View Checked'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['cabinet_view_check']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Cabinet View Issue'); ?></div>
			<?php $view_fields['cabinet_issue'] = str_replace(' ', '&nbsp;',$view_fields['cabinet_issue']);
            $view_fields['cabinet_issue'] = nl2br($view_fields['cabinet_issue']); ?>
            <div class="view_col_right"><?php echo $view_fields['cabinet_issue']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('NTP Pingable'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['ntp_pingable']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		<?php if($view_fields['ntp_pingable'] == "No") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('NTP Issue'); ?></div>
			<?php $view_fields['ntp_issues'] = str_replace(' ', '&nbsp;',$view_fields['ntp_issues']);
            $view_fields['ntp_issues'] = nl2br($view_fields['ntp_issues']); ?>
            <div class="view_col_right"><?php echo $view_fields['ntp_issues']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        <?php } ?>
		
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('FTP Pingable'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['ftp_pingable']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		<?php if($view_fields['ftp_pingable'] == "No") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('FTP Issue'); ?></div>
			<?php $view_fields['ftp_issues'] = str_replace(' ', '&nbsp;',$view_fields['ftp_issues']);
            $view_fields['ftp_issues'] = nl2br($view_fields['ftp_issues']); ?>
            <div class="view_col_right"><?php echo $view_fields['ftp_issues']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        <?php } ?>
		
		
		<?php if($view_fields['traffic_descriptors_check'] != "") { ?>
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Traffic Descriptors Check'); ?></div>
			<?php $view_fields['traffic_descriptors_check'] = str_replace(' ', '&nbsp;',$view_fields['traffic_descriptors_check']);
            $view_fields['traffic_descriptors_check'] = nl2br($view_fields['traffic_descriptors_check']); ?>
            <div class="view_col_right"><?php echo $view_fields['traffic_descriptors_check']; ?></div>
            <div style="clear: both;"></div>
        </div> 
		<?php } ?>
		
		<?php if($view_fields['final_results'] == "No") { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Emphasis Needed On'); ?></div>
			<?php $view_fields['emphasis_needed_on'] = str_replace(' ', '&nbsp;',$view_fields['emphasis_needed_on']);
            $view_fields['emphasis_needed_on'] = nl2br($view_fields['emphasis_needed_on']); ?>
            <div class="view_col_right"><?php echo $view_fields['emphasis_needed_on']; ?></div>
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
   
 



