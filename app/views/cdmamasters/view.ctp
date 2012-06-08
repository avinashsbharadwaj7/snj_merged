
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
    width: 525px;
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
    <?PHP if($dataValues['Cdmamaster']['nic_signum'] == Authsome::get('username')) {
            echo '&nbsp;|&nbsp; ';
            echo $this->Html->link(__('Edit', true), array('action' => 'edit', $dataValues['Cdmamaster']['id'], true));
    }
    ?>

</li>

<h2><?php  __('View - CDMA Report Number: ');
    echo $dataValues['Cdmamaster']['id'];?></h2>
<div class="lte_container">
<fieldset>
    <legend>Project Information</legend>
    
    <div class="lte_view"><?PHP $i = 0; ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['nic_name']; ?></div>
            <div style="clear: both;"></div>
        </div>
      
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Signum'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['nic_signum']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <?php if ($dataValues['Cdmamaster']['customer'] != 'Other') 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Customer'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['customer']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } else { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Customer'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['customer_other']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } ?>
        
        <?php if (!empty($dataValues['Cdmamaster']['project_manager'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Project Manager'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['project_manager']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>
        
        <?php if (!empty($dataValues['Cdmamaster']['network_id'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Network ID'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['network_id']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>
        
        <?php if (!empty($dataValues['Cdmamaster']['site_lead'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Site Lead'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['site_lead']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } ?>
        
        <?php if (!empty($dataValues['Cdmamaster']['deployment_coordinator'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Deployment Co-ordinator'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['deployment_coordinator']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>
        
        <?php if (!empty($dataValues['Cdmamaster']['leader'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Leader'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['leader']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>

    </div>
</fieldset>  
    
<fieldset>
    <legend>Engineer Information</legend>
    
    <div class="lte_view"><?PHP $i = 0; ?>
        <?php if (!empty($dataValues['Cdmamaster']['engg_1'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engg 1'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['engg_1']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>
        
        <?php if (!empty($dataValues['Cdmamaster']['engg_2'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engg 2'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['engg_2']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>
        
        <?php if (!empty($dataValues['Cdmamaster']['engg_3'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engg 3'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['engg_3']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>
  
        <?php if (!empty($dataValues['Cdmamaster']['engg_4'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engg 4'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['engg_4']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?> 

        <?php if ($dataValues['Cdmamaster']['work_location'] != 'Other')
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Work Location'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['work_location']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } else { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Work Location'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['work_location_other']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } ?>  
  
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Activity Performed on'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['date_activity_performed']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Site Zipcode'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['site_zipcode']; ?></div>
            <div style="clear: both;"></div>
        </div>  
       
        <?php if ($dataValues['Cdmamaster']['region'] != 'Other')
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Region'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['region']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } else { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Region'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['region_other']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } ?> 
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('TCM Engineer'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['tcm_engineer']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        
        <?php if (!empty($dataValues['Cdmamaster']['csr_reference_number'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('CSR Reference Number'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['csr_reference_number']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>
        
        <?php if (!empty($dataValues['Cdmamaster']['csr_status'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Is the Status of CSR Open ?'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['csr_status']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>
        
        <?php if (!empty($dataValues['Cdmamaster']['access_method'])) 
        { ?>
        <?php if ($dataValues['Cdmamaster']['access_method'] != 'Other')
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Access Method'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['access_method']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } else { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Access Method'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['access_method_other']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } ?> 
       <?php } ?>
        
        <?php if (!empty($dataValues['Cdmamaster']['was_mop_used'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Was MOP used ?'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['was_mop_used']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php if ($dataValues['Cdmamaster']['was_mop_used'] == 'Yes')
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('MOP version'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['mop_version']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } ?> 
       <?php } ?>
        
        <?php if (!empty($dataValues['Cdmamaster']['problems_concerning_mop'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Problems concerning MOP ?'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['problems_concerning_mop']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php if ($dataValues['Cdmamaster']['problems_concerning_mop'] == 'Yes')
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Comments'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['problems_concerning_mop_yes']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } ?> 
       <?php } ?>
        
        <?php if (!empty($dataValues['Cdmamaster']['was_scripts_used'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Were Scripts used ?'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['was_scripts_used']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>
        
        <?php if (!empty($dataValues['Cdmamaster']['issues_concerning_scripts'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Issues concerning Scripts'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['issues_concerning_scripts']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php if ($dataValues['Cdmamaster']['issues_concerning_scripts'] == 'Yes')
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Comments'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['script_issues']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } ?> 
       <?php } ?>
        
    </div>
</fieldset>  
    
<fieldset>
    <legend>Activity Description</legend>
    
    <div class="lte_view"><?PHP $i = 0; ?>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Activity Type'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['activity_type']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        
        <?php 
        switch ($dataValues['Cdmamaster']['activity_type'])
        {  
           case "GSM-N Other":
           { ?>
              <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                    <div class="view_col_left"><?php __('Please specify GSM activity'); ?></div>
                    <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['activity_type_other']; ?></div>
                    <div style="clear: both;"></div>
              </div>               
           <?php }
               
           case "CDMA Other":
           { ?>
              <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                    <div class="view_col_left"><?php __('Please specify CDMA activity'); ?></div>
                    <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['activity_type_other']; ?></div>
                    <div style="clear: both;"></div>
              </div>               
           <?php }
               
           case "Carrier Addition":
           { ?>
               <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                    <div class="view_col_left"><?php __('Voice'); ?></div>
                    <div class="view_col_right"><?php if($dataValues['Cdmamaster']['carrier_addition_voice'] == '1') echo 'Yes'; else echo 'No' ; ?></div>
                    <div style="clear: both;"></div>
               </div> 
        
               <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                    <div class="view_col_left"><?php __('Data'); ?></div>
                    <div class="view_col_right"><?php if($dataValues['Cdmamaster']['carrier_addition_data'] == '1') echo 'Yes'; else echo 'No'; ?></div>
                    <div style="clear: both;"></div>
               </div> 
           <?php }
           
           case "Support":
           { ?>
               <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                    <div class="view_col_left"><?php __('Installation'); ?></div>
                    <div class="view_col_right"><?php if($dataValues['Cdmamaster']['support_installation'] == '1') echo 'Yes'; else echo 'No'; ?></div>
                    <div style="clear: both;"></div>
               </div> 
        
               <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                    <div class="view_col_left"><?php __('RF/Drive Testing/Opto'); ?></div>
                    <div class="view_col_right"><?php if($dataValues['Cdmamaster']['support_RF_drivetesting_opto'] == '1') echo 'Yes'; else echo 'No'; ?></div>
                    <div style="clear: both;"></div>
               </div> 
        
               <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                    <div class="view_col_left"><?php __('Customer'); ?></div>
                    <div class="view_col_right"><?php if($dataValues['Cdmamaster']['support_customer'] == '1') echo 'Yes'; else echo 'No'; ?></div>
                    <div style="clear: both;"></div>
               </div> 
           <?php }
           
           case "Migration/Re-Home":
           { ?>
               <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                    <div class="view_col_left"><?php __('Voice'); ?></div>
                    <div class="view_col_right"><?php if($dataValues['Cdmamaster']['migration_voice'] == '1') echo 'Yes'; else echo 'No'; ?></div>
                    <div style="clear: both;"></div>
               </div> 
        
               <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                    <div class="view_col_left"><?php __('Data'); ?></div>
                    <div class="view_col_right"><?php if($dataValues['Cdmamaster']['migration_data'] == '1') echo 'Yes'; else echo 'No'; ?></div>
                    <div style="clear: both;"></div>
               </div> 
        
               <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                    <div class="view_col_left"><?php __('Re-IP'); ?></div>
                    <div class="view_col_right"><?php if($dataValues['Cdmamaster']['migration_reip'] == '1') echo 'Yes'; else echo 'No'; ?></div>
                    <div style="clear: both;"></div>
               </div> 
        
               <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                    <div class="view_col_left"><?php __('RIP'); ?></div>
                    <div class="view_col_right"><?php if($dataValues['Cdmamaster']['migration_rip'] == '1') echo 'Yes'; else echo 'No'; ?></div>
                    <div style="clear: both;"></div>
               </div>
      <?php     }
        }
        ?>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Activity Status'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['activity_status']; ?></div>
            <div style="clear: both;"></div>
        </div>

        <?php if ($dataValues['Cdmamaster']['activity_status'] != "Successful")
        { ?>
               <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                    <div class="view_col_left"><?php __('Total number of issues encountered'); ?></div>
                    <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['activity_status_other']; ?></div>
                    <div style="clear: both;"></div>
               </div>
        
               <?php 
              
               for($nissue=0 ; $nissue < $dataValues['Cdmamaster']['activity_status_other'] ; $nissue++) 
                { ?>
                     <div>
                      <h4> <?php __("ISSUE").__(" ").__($nissue+1); ?> </h4>
                       
                     <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                        <div class="view_col_left"><?php __('Type of issue encountered'); ?></div>
                        <div class="view_col_right"><?php echo $dataValues['Cdmamaster']["type_of_issue_encountered$nissue"]; ?></div>
                        <div style="clear: both;"></div>
                     </div>

                     <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                        <div class="view_col_left"><?php __('Issue owner'); ?></div>
                        <div class="view_col_right"><?php echo $dataValues['Cdmamaster']["issue_owner$nissue"]; ?></div>
                        <div style="clear: both;"></div>
                     </div>

                        <?php if ($dataValues['Cdmamaster']["issue_owner$nissue"] == "Ericsson")
                        { ?>        
                             <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                                <div class="view_col_left"><?php __('Who needs to be contacted ?'); ?></div>
                                <div class="view_col_right"><?php echo $dataValues['Cdmamaster']["who_needs_tobe_contacted$nissue"]; ?></div>
                                <div style="clear: both;"></div>
                             </div>        
                        <?php } ?>
        
                     <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                        <div class="view_col_left"><?php __('Escalation Engineer contacted ?'); ?></div>
                        <div class="view_col_right"><?php echo $dataValues['Cdmamaster']["contact_escalation_engg$nissue"]; ?></div>
                        <div style="clear: both;"></div>
                     </div>

                     <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                        <div class="view_col_left"><?php __('Engineer name'); ?></div>
                        <div class="view_col_right"><?php echo $dataValues['Cdmamaster']["engineer_name$nissue"]; ?></div>
                        <div style="clear: both;"></div>
                     </div>

                     <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                        <div class="view_col_left"><?php __('Engineer signum'); ?></div>
                        <div class="view_col_right"><?php echo $dataValues['Cdmamaster']["engineer_signum$nissue"]; ?></div>
                        <div style="clear: both;"></div>
                     </div>

                     <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                        <div class="view_col_left"><?php __('Escalation issues'); ?></div>
                        <div class="view_col_right"><?php echo $dataValues['Cdmamaster']["escalation_comments$nissue"]; ?></div>
                        <div style="clear: both;"></div>
                     </div>

                     <div <?php if ($i++ % 2 == 0) echo $class;?>>    
                        <div class="view_col_left"><?php __('Impact of the issue'); ?></div>
                        <div class="view_col_right"><?php echo $dataValues['Cdmamaster']["impact_of_the_issue$nissue"]; ?></div>
                        <div style="clear: both;"></div>
                     </div>
                  </div>   
        
        <?php       echo "_________________________________________________________________________________________________________________________";   } 
                 
         } ?>
                 
        <?php if (!empty($dataValues['Cdmamaster']['issues_during_prechecks'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Issues during Pre-Checks'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['issues_during_prechecks']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php if ($dataValues['Cdmamaster']['issues_during_prechecks'] == 'Yes')
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Comments'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['issues_during_prechecks_yes']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } ?> 
       <?php } ?>
        
        <?php if (!empty($dataValues['Cdmamaster']['call_test_performed'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Call Test Performed'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['call_test_performed']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } ?>
        
        <?php if (!empty($dataValues['Cdmamaster']['oss'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('OSS'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['oss']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } ?>
        
        <?php if (!empty($dataValues['Cdmamaster']['rnc'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('RNC'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['rnc']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } ?>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('RBSs'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['rbs']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Total Number of Nodes/RNC Scheduled'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['number_of_rncs_scheduled']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Total Number of Nodes Attempted'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['number_of_rncs_attempted']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <?php if (!empty($dataValues['Cdmamaster']['rncs_excluded'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('RNCs Excluded'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['rncs_excluded']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php if ($dataValues['Cdmamaster']['rncs_excluded'] == 'Yes')
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Total Number of RNCs excluded'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['rncs_excluded_yes']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Reason for excluding the RNCs'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['rncs_excluded_reason']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } ?> 
       <?php } ?>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Total Number of Nodes/RNCs Successful'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['number_of_rncs_successful']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Total Number of Nodes/RNCs unsuccessful'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['number_of_rncs_unsuccessful']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <?php if (!empty($dataValues['Cdmamaster']['reason_for_failed_rncs'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Reason for failed RNCs'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['reason_for_failed_rncs']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>
        
        <?php if (!empty($dataValues['Cdmamaster']['state_of_failed_rncs'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('State of failed/fallback Nodes'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['state_of_failed_rncs']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>

    </div>
</fieldset>  
    
    <div class="lte_view"><?PHP $i = 0; ?>
        <?php if (!empty($dataValues['Cdmamaster']['additional_notes'])) 
        { ?>
        <fieldset>   
        <legend>Additional Information</legend>

        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Additional Notes'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['additional_notes']; ?></div>
            <div style="clear: both;"></div>
        </div> 
      
        <?php } ?>
        
        <?php if (!empty($dataValues['Cdmamaster']['email_addresses'])) 
        { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Email Addresses'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Cdmamaster']['email_addresses']; ?></div>
            <div style="clear: both;"></div>
        </div>
        </fieldset>  
        <?php } ?>
        
    </div>

    <fieldset>
    <legend>File Upload</legend>
    
    <div class="lte_view"><?PHP $i = 0; ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('File Name'); ?></div>
            <div class="view_col_right"><?php 
            if (isset($dataValues['Cdmafile'][0]['file_name']))
            {
            echo $dataValues['Cdmafile'][0]['file_name']; 
            }
            else 
            {
                echo "No files uploaded.";
            }?></div>
            <div style="clear: both;"></div>
        </div> 

    </div>
    </fieldset>  


</div>