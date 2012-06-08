
<?php
    $ShActivities = array("New Integration (Iub over ATM)",
                          "New Integration (Iub over IP)",
                          "2nd Carrier Add (Regular)",
                          "2nd Carrier Add Split Power Config",
                          "3rd Carrier Add using OBIF & RRUW",                      
                          "3rd Carrier Add Cabinet Reconfiguration",
                          "3rd Carrier Add Split Power Config",                        
                          "4th Carrier Add using OBIF & RRUW",
                          "4th Carrier Add New Cabinet (Iub over ATM)",
                          "4th Carrier Add New Cabinet (Iub over IP)",                   
                          "4th Carrier Add OBIF Split-power Config",                   
                          "5th Carrier Add Cable Crossover (Iub over ATM)",
                          "5th Carrier Add Cable Crossover (Iub over IP)",
                          "5th Carrier Add using OBIF & RRUW",
                          "RU/RRU swaps",
                          "Software Upgrade",                          
                          "Add Sector",
                          "Delete Sector",
                          "Cabinet Swap",               
                          "T1 Add",
                          "TX60-Board Add/Swap",
                          "ET-MFX Board Add ( Node-B )",
                          "TX/RAX Board Add"        
    );
    
    $activityOptionsNIC = $databaseFields->getOptions("new_activities",1);
    $activityOptionsNDS = $databaseFields->getOptions("activity",10);
    $carr = array ("1", "2", "3", "4");
    $yes_no = array(""=>"","Yes"=>"Yes","No"=>"No");
    $yes_no_na = array("","Yes"=>"Yes","No"=>"No", "NA"=>"NA");
    $pingable = array("","Pingable"=>"Pingable","Not Pingable"=>"Not Pingable", "NA"=>"NA");
    $launched = array("","Launched"=>"Launched","Not Launched"=>"Not Launched", "NA"=>"NA");
    $launchedby = array("","Customer"=>"Customer","Ericsson"=>"Ericsson", "As per market PM"=>"As per market PM", "NA"=>"NA");
    
    $EfActivities = array("3rd carrier Add Cable Crossover Solution (Iub over ATM)",
                          "3rd carrier Add Cable Crossover Solution (Iub over IP)",        
                          "4th Carrier Add in 2nd Cabinet");
    
?>
<fieldset>
    <legend><?php __('Information'); ?></legend>
<?php
        echo $ajax->div('information_placeholder', array('class'=>'placeholders'));
        if(!empty($irModule['IrModule']['engineer_team']))
        {      
          if ($irModule['IrModule']['engineer_team'] === "NIC")
          {
                        $action = $this->params['action'];
                        if($action === "edit" || $action === "cloneReport"){
                        echo $this->Form->input('IrModule.activity_type', array("label"=>"Activity Type",
                        "type"=>"text", "readonly"=>"readonly"));
                        }
                        elseif ($action === "add"){
                        echo $this->Form->input('IrModule.activity_type', array("label"=>"Activity Type",
                        "options"=>$activityOptionsNIC,"type"=>"select"));
                        }
                        echo $ajax->div('activity_types_placeholder', array('class'=>'placeholders'));
                        $databaseFields->displayActivityTypeDependency($irModule['IrModule'], "activity_type","IrModule.");
                        echo $ajax->divEnd('activity_types_placeholder');
                        echo $ajax->observeField('IrModuleActivityType', array('update'=>'activity_types_placeholder', 'url'=>array('controller'=>'ir_modules','action'=>'updater'),'frequency'=>0.2));                        
              //from here
              $carrier=substr($irModule['IrModule']['activity_type'], 0, 1);                        
              if ((in_array($irModule['IrModule']['activity_type'], $ShActivities)) && $irModule['IrModule']['activity_type'] !="")
              {
                echo $this->Form->input('IrModule.sh_site', array("label"=>"Site Name", "type"=>"text"));  
                
                if(isset($irModule['IrModule']['sh_site']))
                {
                    echo $this->Form->input('IrModule.shsite_location', array("label"=>"Site Location", 'type'=>'text', 'readonly'=>'readonly'));                    
                    echo $this->Form->input('IrModule.shsite_region', array("label"=>"Site Region", 'readonly'=>'readonly'));                    
                    echo $this->Form->input('IrModule.shsite_market', array("label"=>"Site Market", 'type'=>'text', 'readonly'=>'readonly'));                                      
                }
                echo $this->Form->input('IrModule.sh_rnc', array("label"=>"RNC", 'type'=>'text'));                    
                echo $this->Form->input('IrModule.sh_nodesoftlevel', array("label"=>"Software Level", 'options'=>$databaseFields->getOptions("sftpkgs", 69), 'type'=>'select'));                    
                echo $this->Form->input('IrModule.sh_ipaddr', array("label"=>"IP Address", 'type'=>'text'));                    
                echo $this->Form->input('IrModule.sh_aspenggname', array("label"=>"ASP Engineer name", 'type'=>'text'));                                            
                      if (in_array($carrier, $carr)){
                         // var_dump($carrier);
                      for($i=0; $i < $carrier; $i++)
                      {
                          echo $this->Form->input("IrRssireading.$i.id");?>
                            <fieldset>
                                <legend><?php __("RSSI Values - Carrier ".($i+1)); ?></legend>
                                <table border="4">
                                    <tr>
                                      <td><?php __('RSSI Readings'); ?></td>
                                      <td><?php __('Alpha'); ?></td>
                                      <td><?php __('Beta'); ?></td>
                                      <td><?php __('Gamma'); ?></td>
                                    </tr>
                                    <tr>
                                      <td><?php __('Values'); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_alpha", array('label'=>false)); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_beta", array('label'=>false)); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_gamma", array('label'=>false)); ?></td>
                                    </tr>
                                    
                                    <tr>
                                      <td><?php __('Antenna System Alarms'); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_alpha_antennasystemalarm", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_beta_antennasystemalarm", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_gamma_antennasystemalarm", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                    </tr>
                                    <tr>
                                      <td><?php __('RSSI values acceptable'); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_alpha_rssivalue_acceptable", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_beta_rssivalue_acceptable", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_gamma_rssivalue_acceptable", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                    </tr>
                                    <tr>
                                      <td><?php __('TMA defined in system ?'); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_alpha_tma", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_beta_tma", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_gamma_tma", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                    </tr>
                                    
                                </table>
                            </fieldset>        

                     <?php }
                      }  
                      else {
                          //var_dump($carrier);
                      for($i=0; $i < 4; $i++)
                      {
                          echo $this->Form->input("IrRssireading.$i.id");?>
                            <fieldset>
                                <legend><?php __("RSSI Values - Carrier ".($i+1)); ?></legend>
                                <table border="4">
                                    <tr>
                                      <td><?php __('RSSI Readings'); ?></td>
                                      <td><?php __('Alpha'); ?></td>
                                      <td><?php __('Beta'); ?></td>
                                      <td><?php __('Gamma'); ?></td>
                                    </tr>
                                    <tr>
                                      <td><?php __('Values'); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_alpha", array('label'=>false)); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_beta", array('label'=>false)); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_gamma", array('label'=>false)); ?></td>
                                    </tr>
                                    
                                    <tr>
                                      <td><?php __('Antenna System Alarms'); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_alpha_antennasystemalarm", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_beta_antennasystemalarm", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_gamma_antennasystemalarm", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                    </tr>
                                    <tr>
                                      <td><?php __('RSSI values acceptable'); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_alpha_rssivalue_acceptable", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_beta_rssivalue_acceptable", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_gamma_rssivalue_acceptable", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                    </tr>
                                    <tr>
                                      <td><?php __('TMA defined in system ?'); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_alpha_tma", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_beta_tma", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_gamma_tma", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                    </tr>
                                    
                                </table>
                            </fieldset>        

                     <?php }
                          
                      }

              }
              //till here
                echo $this->Form->input('IrModule.sh_integrationcomplete', array("label"=>"Integration Complete ?", 'options'=>$yes_no, 'type'=>'select'));                                                          
          }
          elseif ($irModule['IrModule']['engineer_team'] === "NDS")
          {
                        $action = $this->params['action'];
                        if($action === "edit" || $action === "cloneReport"){
                        echo $this->Form->input('IrModule.activity_type', array("label"=>"Activity Type",
                        "type"=>"text", "readonly"=>"readonly"));
                        }
                        elseif ($action === "add"){
                        echo $this->Form->input('IrModule.activity_type', array("label"=>"Activity Type",
                        "options"=>$activityOptionsNDS,"type"=>"select"));
                        }
              
                        echo $ajax->div('activity_types_placeholder', array('class'=>'placeholders'));
                        $databaseFields->displayActivityTypeDependency($irModule['IrModule'], "activity_type","IrModule.");
                        echo $ajax->divEnd('activity_types_placeholder');
                        echo $ajax->observeField('IrModuleActivityType', array('update'=>'activity_types_placeholder', 'url'=>array('controller'=>'ir_modules','action'=>'updater'),'frequency'=>0.2));
                        
                        echo $this->Form->input('IrModule.sh_launchstatus', array("label"=>"Launch Status",
                        "options"=>$launched, "type"=>"select"));
                        echo $this->Form->input('IrModule.sh_launchedby', array("label"=>"Launched by",
                        "options"=>$launchedby, "type"=>"select"));
                        echo $this->Form->input('IrModule.sh_readyfortuning', array("label"=>"Ready for tuning",
                        "options"=>$yes_no, "type"=>"select"));
                        echo $this->Form->input('IrModule.sh_readyforservice', array("label"=>"Ready for service",
                        "options"=>$yes_no, "type"=>"select"));

          }
          
                    if (in_array($irModule['IrModule']['activity_type'], $EfActivities) && $irModule['IrModule']['activity_type'] != "")
                    {
                        echo $this->Form->input('IrModule.sh_site1', array("label"=>"Site Name - Cabinet 1", "onblur"=>"showHint(this.value);"));
                        ?><p><span id="txtHint"></span></p>
                        <?php
                                if(isset($irModule['IrModule']['sh_site1']))
                                {
                                    echo $this->Form->input('IrModule.shsite_location', array("label"=>"Site Location", 'type'=>'text', 'readonly'=>'readonly'));                    
                                    echo $this->Form->input('IrModule.shsite_region', array("label"=>"Site Region", 'readonly'=>'readonly'));                    
                                    echo $this->Form->input('IrModule.shsite_market', array("label"=>"Site Market", 'type'=>'text', 'readonly'=>'readonly'));                                      
                                }
                        
                        echo $this->Form->input('IrModule.sh_site2', array("label"=>"Site Name - Cabinet 2", "onblur"=>"showHint2(this.value);"));
                        ?><p><span id="txtHint2"></span></p>
                        <?php
                                if(isset($irModule['IrModule']['sh_site2']))
                                {
                                    echo $this->Form->input('IrModule.shsite_location2', array("label"=>"Site Location", 'type'=>'text', 'readonly'=>'readonly'));                    
                                    echo $this->Form->input('IrModule.shsite_region2', array("label"=>"Site Region", 'readonly'=>'readonly'));                    
                                    echo $this->Form->input('IrModule.shsite_market2', array("label"=>"Site Market", 'type'=>'text', 'readonly'=>'readonly'));                                      
                                }
                        
                        echo $this->Form->input('IrModule.sh_rnc', array("label"=>"RNC", 'type'=>'text'));                    
                        echo $this->Form->input('IrModule.sh_nodesoftlevel', array("label"=>"Software Level", 'options'=>$databaseFields->getOptions("sftpkgs", 69), 'type'=>'select'));                    
                        echo $this->Form->input('IrModule.sh_ipaddr', array("label"=>"IP Address", 'type'=>'text'));                    
                        echo $this->Form->input('IrModule.sh_aspenggname', array("label"=>"ASP Engineer name", 'type'=>'text'));                                            
                        ?>

<?php                 for($i=0; $i < $carrier; $i++)
                      {?>
                            <fieldset>
                                <legend><?php __("RSSI Values - Carrier ".($i+1)); ?></legend>
                                <table border="4">
                                    <tr>
                                      <td><?php __('RSSI Readings'); ?></td>
                                      <td><?php __('Alpha'); ?></td>
                                      <td><?php __('Beta'); ?></td>
                                      <td><?php __('Gamma'); ?></td>
                                    </tr>
                                    <tr>
                                      <td><?php __('Values'); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_alpha", array('label'=>false)); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_beta", array('label'=>false)); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_gamma", array('label'=>false)); ?></td>
                                    </tr>
                                    
                                    <tr>
                                      <td><?php __('Antenna System Alarms'); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_alpha_antennasystemalarm", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_beta_antennasystemalarm", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_gamma_antennasystemalarm", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                    </tr>
                                    <tr>
                                      <td><?php __('RSSI values acceptable'); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_alpha_rssivalue_acceptable", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_beta_rssivalue_acceptable", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_gamma_rssivalue_acceptable", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                    </tr>
                                    <tr>
                                      <td><?php __('TMA defined in system ?'); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_alpha_tma", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_beta_tma", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                      <td><?php echo $this->Form->input("IrRssireading.$i.sh_gamma_tma", array('label'=>false, 'type'=>'select', 'options'=>$databaseFields->getOptions("rssi_readings",1))); ?></td>
                                    </tr>
                                    
                                </table>
                            </fieldset>        
                        
                    <?php }   
                    }
                    
                    if ((in_array($irModule['IrModule']['activity_type'], $EfActivities) && $irModule['IrModule']['activity_type'] != "") || (in_array($irModule['IrModule']['activity_type'], $ShActivities) && $irModule['IrModule']['activity_type'] != ""))
                    {                          
                        echo $this->Form->input('IrModule.sh_methodoftesting', array("label"=>"Method of Testing", "options"=>$databaseFields->getOptions("sh_methodoftesting",1),"type"=>"select"));
                        echo $this->Form->input('IrModule.sh_calltestcomments', array("label"=>"Call Test comments", 'type'=>'textarea'));
                        echo $this->Form->input('IrModule.sh_calltestvoice', array("label"=>"Call Test - Voice", "options"=>$databaseFields->getOptions("rssi_readings",1),"type"=>"select"));
                        echo $this->Form->input('IrModule.sh_calltestcsdata', array("label"=>"Call Test - CS Data", "options"=>$databaseFields->getOptions("rssi_readings",1),"type"=>"select"));
                        echo $this->Form->input('IrModule.sh_calltestpsdata', array("label"=>"Call Test - PS Data", "options"=>$databaseFields->getOptions("rssi_readings",1),"type"=>"select"));
                        echo $this->Form->input('IrModule.sh_calltest911', array("label"=>"Call Test - E911", "options"=>$databaseFields->getOptions("rssi_readings",1),"type"=>"select"));
                        echo $this->Form->input('IrModule.sh_calltest611', array("label"=>"Call Test - 611", "options"=>$databaseFields->getOptions("rssi_readings",1),"type"=>"select"));                        
                        echo $this->Form->input('IrModule.sh_calltest411', array("label"=>"Call Test - 411", "options"=>$databaseFields->getOptions("rssi_readings",1),"type"=>"select"));  
                        
                        echo $this->Form->input('IrModule.sh_ipconnectivity', array("label"=>"IP Connectivity", 'type'=>'select', 'options'=>$yes_no_na));
                        echo $this->Form->input('IrModule.sh_ipconnectivitycomments', array("label"=>"Comments", 'type'=>'textarea'));

                        echo $this->Form->input('IrModule.sh_baselineloaded', array("label"=>"Baseline Loaded", 'type'=>'select', 'options'=>$yes_no_na));
                        echo $this->Form->input('IrModule.sh_baselineversion', array("label"=>"Baseline Loaded Version"));                        
                        echo $this->Form->input('IrModule.sh_baselineloadedcomments', array("label"=>"Comments", 'type'=>'textarea'));

                        echo $this->Form->input('IrModule.sh_nodealarm', array("label"=>"Alarms", 'type'=>'select', 'options'=>$yes_no_na));
                        echo $this->Form->input('IrModule.sh_nodealarmcomments', array("label"=>"Comments", 'type'=>'textarea'));

                        echo $this->Form->input('IrModule.sh_performanceimpact', array("label"=>"In Service Performance Impact", 'type'=>'select', 'options'=>$yes_no_na));
                        echo $this->Form->input('IrModule.sh_performanceimpactcomments', array("label"=>"Comments", 'type'=>'textarea'));

                        echo $this->Form->input('IrModule.sh_lkfloaded', array("label"=>"LKF Loaded", 'type'=>'select', 'options'=>$yes_no_na));
                        echo $this->Form->input('IrModule.sh_lkfcomments', array("label"=>"Comments", 'type'=>'textarea'));
                       
                  }     

        }        
        echo $ajax->divEnd('information_placeholder');

echo $this->Form->input('activity_result', array("label"=>"Status", "options"=>$databaseFields->getOptions("activity_result",1),"type"=>"select"));
echo $ajax->div('number_of_issues_placeholder', array('class'=>'placeholders'));
if($irModule['IrModule']['activity_result'] != "Successful" && $irModule['IrModule']['activity_result'] != "" && $irModule['IrModule']['activity_result'] != "Canceled/Rescheduled"):
    echo $this->Form->input("number_of_issues", array("label"=>"Total Number of issues Encountered", "type"=>"select", "options"=>array("", "1", "2", "3", "4", "5")));
    echo $ajax->observeField('IrModuleNumberOfIssues', array('update'=>'issues_placeholder', 'url'=>array('controller'=>'ir_modules','action'=>'updater'),'frequency'=>0.2));
endif;
echo $ajax->divEnd('number_of_issues_placeholder');
echo $ajax->observeField('IrModuleActivityResult', array('update'=>'number_of_issues_placeholder', 'url'=>array('controller'=>'ir_modules','action'=>'updater'),'frequency'=>0.2));

echo $ajax->div('issues_placeholder', array('class'=>'placeholders'));
if (!empty($irModule['IrIssue'])):
    $databaseFields->displayIssues(count($irModule['IrIssue']));
endif;
echo $ajax->divEnd('issues_placeholder');

echo $this->Form->input('precheck_issue_encountered', array("label"=>"Issues faced during Prechecks?","options"=>$yes_no,"type"=>"select"));
echo $ajax->div('precheck_issue_placeholder', array('class'=>'placeholders'));
echo (!empty($irModule['IrModule']['precheck_issues'])) ? $this->Form->input('precheck_issues', array("label"=>"Please describe the issues")) : "";
echo $ajax->divEnd('precheck_issue_placeholder');
echo $ajax->observeField('IrModulePrecheckIssueEncountered', array('update'=>'precheck_issue_placeholder', 'url'=>array('controller'=>'ir_modules','action'=>'updater'),'frequency'=>0.2));

echo $this->Form->input('concerned_nodes', array("label"=>"Concerned Node(s): Include OSS, RNC and NodeB(s)"));
echo $this->Form->input('total_nodes_scheduled');
echo $this->Form->input('total_nodes_attempted');
echo $this->Form->input('nodes_excluded', array("label"=>"Nodes Excluded?","options"=>$yes_no,"type"=>"select"));
echo $ajax->div('nodes_excluded_reason_placeholder', array('class'=>'placeholders'));
echo (!empty($irModule['IrModule']['total_nodes_excluded']) || !empty($irModule['IrModule']['reason_nodes_excluded'])) ? $this->Form->input('total_nodes_excluded'). $this->Form->input('reason_nodes_excluded') : "";
echo $ajax->divEnd('nodes_excluded_reason_placeholder');
echo $ajax->observeField('IrModuleNodesExcluded', array('update'=>'nodes_excluded_reason_placeholder', 'url'=>array('controller'=>'ir_modules','action'=>'updater'),'frequency'=>0.2));


echo $this->Form->input('total_nodes_successful');
echo $this->Form->input('total_nodes_unsuccessful');
echo $this->Form->input('reason_failed_nodes', array("label"=>"Reason for failed nodes"));
echo $this->Form->input('nodes_state', array("label"=>"State of the failed/fallback nodes"));
echo $this->Form->input('time_spent', array("label"=>"Time Spent on this activity"));
?>
    <font color='red' size='1'>*Please follow HH:MM pattern</font>
<?php    
echo $this->Form->input('email_addresses', array("label"=>"Email Addresses", 'type'=>'textarea'));
?>
</fieldset>