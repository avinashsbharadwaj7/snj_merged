
<?php
    echo $html->css("lte-lit");
    echo $this->Html->script(array('jquery.js', 'lte_add_modify.js'));
    //var_dump($data);       
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
    
    //for Market..
    $activityOptionsNIC = $databaseFields->getOptions("new_activities",1);
    $activityOptionsNDS = $databaseFields->getOptions("activity",10);
    $carr = array ("1", "2", "3", "4", "5");
    $yes_no = array(""=>"","Yes"=>"Yes","No"=>"No");
    $yes_no_na = array("","Yes"=>"Yes","No"=>"No", "NA"=>"NA");
    $pingable = array("","Pingable"=>"Pingable","Not Pingable"=>"Not Pingable", "NA"=>"NA");
    $launched = array("","Launched"=>"Launched","Not Launched"=>"Not Launched", "NA"=>"NA");
    $launchedby = array("","Customer"=>"Customer","Ericsson"=>"Ericsson", "As per market PM"=>"As per market PM", "NA"=>"NA");

    $EfActivities = array("3rd carrier Add Cable Crossover Solution (Iub over ATM)",
                          "3rd carrier Add Cable Crossover Solution (Iub over IP)",        
                          "4th Carrier Add in 2nd Cabinet");
    
    if($add_engineers):
        $databaseFields->addEngineer($nextNumber);
    else:
        $key = key($data);
        //var_dump($data);
        //var_dump($key);
       
            $carrier=substr($data[$key], 0, 1);
            //var_dump($carrier);
        
        switch($key){
            case "region":
                switch($data[$key]){
                    case "North Central":
                        echo $this->Form->input('IrModule.market',array("type"=>"select", "options"=>$databaseFields->getOptions("ncentral",18)));
                        //echo $this->Form->input('IrModule.tcm_engineer', array("label"=>"TCM Engineer", "type"=>"select", "options"=>$TcmEnggCentral));
                        break;
                    case "South Central":
                        echo $this->Form->input('IrModule.market',array("type"=>"select", "options"=>$databaseFields->getOptions("scentral",19)));
                        //echo $this->Form->input('IrModule.tcm_engineer', array("label"=>"TCM Engineer", "type"=>"select", "options"=>$TcmEnggCentral));
                        break;
                    case "North East":
                        echo $this->Form->input('IrModule.market',array("type"=>"select", "options"=>$databaseFields->getOptions("neast",20)));
                        //echo $this->Form->input('IrModule.tcm_engineer', array("label"=>"TCM Engineer", "type"=>"select", "options"=>$TcmEnggEast));
                        break;
                    case "South East":
                        echo $this->Form->input('IrModule.market',array("type"=>"select", "options"=>$databaseFields->getOptions("seast",21)));
                        //echo $this->Form->input('IrModule.tcm_engineer', array("label"=>"TCM Engineer", "type"=>"select", "options"=>$TcmEnggEast));
                        break;
                    case "North West":
                        echo $this->Form->input('IrModule.market',array("type"=>"select", "options"=>$databaseFields->getOptions("nwest",22)));
                       // echo $this->Form->input('IrModule.tcm_engineer', array("label"=>"TCM Engineer", "type"=>"select", "options"=>$TcmEnggWest));
                        break;
                    case "South West":                                                
                        echo $this->Form->input('IrModule.market',array("type"=>"select", "options"=>$databaseFields->getOptions("swest",23)));
                       // echo $this->Form->input('IrModule.tcm_engineer', array("label"=>"TCM Engineer", "type"=>"select", "options"=>$TcmEnggWest));
                        break;
                }
                
            case "type":
                if ($data[$key] == "Human Error")
                {
                    echo $this->Form->input("IrIssue.$num.name_affected_rnc", array("label"=>"Name of affected RNC"));
                    echo $this->Form->input("IrIssue.$num.number_affected_nodeb", array("label"=>"Number of affected NodeB"));
                    echo $this->Form->input("IrIssue.$num.name_affected_nodeb", array("label"=>"Name of affected NodeB"));                    
                }
                break;
                
            case "activity_result": 
                echo ($data[$key] != "Successful" && $data[$key] != "" && $data[$key] != "Canceled/Rescheduled" ) ? $this->Form->input("IrModule.number_of_issues",
                array("label"=>"Total Number of issues Encountered", "type"=>"select", "options"=>array("", "1", "2", "3", "4", "5"))): "";
                echo $ajax->observeField('IrModuleNumberOfIssues', array('update'=>'issues_placeholder', 'url'=>array('controller'=>'ir_modules','action'=>'updater'),'frequency'=>0.2));
                if ($data[$key] === "Canceled/Rescheduled")
                    echo $this->Form->input('IrModule.reason_for_cancellation', array('label'=>"Reason for Cancellation", 'type'=>'select', "options"=>$databaseFields->getOptions("reason_for_cancellation",1)));
                break;
            case "engineer_work_location":    echo in_array($data[$key],$irDependentArray->dep_arr['engineer_work_location']) ? $this->Form->input('IrModule.WorkLocation_Other'): "";
                break;
            
            case "number_of_issues": 
                if ($data[$key] != "")
                    $databaseFields->displayIssues($data[$key]);  
                echo $ajax->observeField('IrModuleActivityResult', array('update'=>'issues_placeholder', 'url'=>array('controller'=>'ir_modules','action'=>'updater'),'frequency'=>0.2));
                break;
            
            case "access_method": 
                switch($data[$key]){
                    case "Smart Laptop":
                        echo $this->Form->input('IrModule.asp_name',array("label"=>"ASP/FSO Name"));
                        echo $this->Form->input('IrModule.asp_contact',array("label"=>"Contact Number"));
                        echo $this->Form->input('IrModule.asp_emailaddr',array("label"=>"Email Address"));
                        echo $this->Form->input('IrModule.asp_logsattached',array("label"=>"Will ASP Logs be attached after Submission of the report?", 'type'=>'select', 'options'=>array("","Yes", "No")));
                        break;
                    case "Sonar":
                        echo $this->Form->input('IrModule.why_sonar_used', array("type"=>"textarea"));
                        echo $this->Form->input('IrModule.why_sl_not_used', array("label"=>"Why was SL not used?", "options" => $databaseFields->getOptions("sl_not_used",1), "type"=>"select"));
                        break;
                    case "OSS":
                        echo $this->Form->input('IrModule.why_sl_not_used', array("label"=>"Why was SL not used?", "options" => $databaseFields->getOptions("sl_not_used",1), "type"=>"select"));
                        break;
                }
                break;
            case "mop_used":  if(in_array($data[$key],$irDependentArray->dep_arr['mop_used'])):
                                    //echo $this->Form->input('IrModule.mop_name',array("label"=>"MOP Name"));
                                    echo $this->Form->input('IrModule.mop_version',array("label"=>"MOP Revision"));
                                    //echo $this->Form->input('IrModule.mop_document_number',array("label"=>"MOP Document Number"));
                                    echo $this->Form->input('IrModule.mop_problem_encountered',array("label"=>"Did you have any problems concerning this MOP?", "options"=>$yes_no, "type"=>"select"));
                                    echo $ajax->div('mop_problems_placeholder', array('class'=>'placeholders'));
                                    echo $ajax->divEnd('mop_problems_placeholder');
                                    echo $ajax->observeField('IrModuleMopProblemEncountered', array('update'=>'mop_problems_placeholder', 'url'=>array('controller'=>'ir_modules','action'=>'updater'),'frequency'=>0.2));
                              endif;
                break;
            case "mop_problem_encountered": echo ($data[$key] == "Yes") ? $this->Form->input('IrModule.mop_problems',array("label"=>"Describe the issues")): "";
                break;
            case "script_problem_encountered" : echo ($data[$key] == "Yes") ? $this->Form->input('IrModule.script_problems',array("label"=>"Describe the issues")): "";
                break;
 //           case "region":
 //                echo $this->Form->input('IrModule.tcm_engineer', array("label"=>"TCM Engineer", "options"=>$databaseFields->getOptionsUsers("first_name",105),"type"=>"select"));                
            case "was_there_anyissue":
                if ($data[$key] == "Yes") echo $this->Form->input('IrModule.time_spent', array("label"=>"Time spent on this issue"));
                break;
                
            case "escalation_engineer_contacted":
                if ($data[$key] === "Yes") 
                {
                    echo $this->Form->input("IrIssue.$num.escalation_engineer_contact_name");
                    echo $this->Form->input("IrIssue.$num.escalation_engineer_contact_signum");                    
                }
            case "engineer_team":
                if ($data[$key] === "NIC")
                {
                        echo $this->Form->input('IrModule.activity_type', array("label"=>"Activity Type",
                        "options"=>$activityOptionsNIC,"type"=>"select"));
                        echo $ajax->div('activity_types_placeholder', array('class'=>'placeholders'));
                        
                        echo $ajax->divEnd('activity_types_placeholder');
                        echo $ajax->observeField('IrModuleActivityType', array('update'=>'activity_types_placeholder', 'url'=>array('controller'=>'ir_modules','action'=>'updater'),'frequency'=>0.2));
                        echo $this->Form->input('IrModule.sh_integrationcomplete', array("label"=>"Integration Complete ?", 'options'=>$yes_no, 'type'=>'select'));                    
                }
                else if ($data[$key] === "NDS")
                {
                        echo $this->Form->input('IrModule.activity_type', array("label"=>"Activity Type",
                        "options"=>$activityOptionsNDS,"type"=>"select"));
                        echo $ajax->div('activity_types_placeholder', array('class'=>'placeholders'));
                        //$databaseFields->displayActivityTypeDependency($irModule['IrModule'], "activity_type","");
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
                break;
                
            case "no_of_files":
                //var_dump($this->data);
                for ($fc=1; $fc <= $data[$key]; $fc++)
                {
                      if(isset($this->data['IrFile'][$fc]['file']['error']) && is_array($this->data['IrFile'][$fc]['file']) && $this->data['IrFile'][$fc]['file']['error'] == 0) {
                            if(isset($this->data['IrFile'][$fc]['origFileName']) && is_array($this->data['IrFile'][$fc])) {
                                echo $this->Form->input('IrFile.'.$fc.'.file', array('type'=>'text', 'readonly'=>'readonly', 'label'=>'File '. $fc, 'value'=>$this->data['IrFile'][$fc]['file']['name'], 'after'=>$this->Html->link(__('Change', true), "javascript:void(0)", array('id'=>'upload'.$fc.'Click', 'onClick'=>"showUploaderWithUndo('upload'.$fc.'Click', 'IrFile'.$fc.'File', $fc, 'IrFile', '" . $this->data['IrFile'][$fc]['origFileName'] . "'); return false"))));
                            }
                            else {
                                echo $this->Form->input('IrFile.'.$fc.'.file', array('type'=>'text', 'readonly'=>'readonly', 'label'=>'File '. $fc, 'value'=>$this->data['IrFile'][$fc]['file']['name'], 'after'=>$this->Html->link(__('Change', true), "javascript:void(0)", array('id'=>'upload'.$fc.'Click', 'onClick'=>"showUploader('upload'.$fc.'Click', 'IrFile'.$fc.'File', $fc, 'IrFile'); return false"))));
                            }
                        }
                        else {
                            echo $this->Form->input('IrFile.'.$fc.'.file', array('type'=>'file', 'label'=>'File '. $fc));

                }  }   
    
                break;
                
            case "activity_type" : 
                $databaseFields->displayActivityTypeDependency($data,$key,"IrModule.");
                if (in_array($data[$key], $ShActivities) && $data[$key] != "")
                {     
                      if($data[$key] != "LKF"){  
                        echo $this->Form->input("IrModule.sh_subactivity", array('label'=>"Sub Activities", 'type'=>'select', 'options'=>$databaseFields->getOptions("sub_activity",1)));                         
                        }
                      echo $this->Form->input('IrModule.sh_site', array("label"=>"Site Name", "onblur"=>"showHint(this.value);"));
                      ?><p><span id="txtHint"></span></p>
                      <?php
                        echo $this->Form->input('IrModule.sh_rnc', array("label"=>"RNC", 'type'=>'text'));                    
                        echo $this->Form->input('IrModule.sh_nodesoftlevel', array("label"=>"Software Level", 'options'=>$databaseFields->getOptions("sftpkgs",69), 'type'=>'select'));                    
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
                      }else if($data[$key] == "New Integration (Iub over ATM)" || $data[$key] == "New Integration (Iub over IP)")  
                      {
                          echo $this->Form->input('IrModule.carriers', array('label'=>'Number of Carriers Integrated','type'=>'select', 'options'=>array(''=>'', '1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4')));                                              
                          for($i=0; $i < 4; $i++){
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
                            <?php
                      }                      
                        }
                      else {                         
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
                  
                    else if (in_array($data[$key], $EfActivities) && $data[$key] != "")
                    {   
                        //var_dump($data[$key]);
                      if($data[$key] != "LKF"){  
                        echo $this->Form->input("IrModule.sh_subactivity", array('label'=>"Sub Activities", 'type'=>'select', 'options'=>$databaseFields->getOptions("sub_activity",1)));                         
                        }

                        echo $this->Form->input('IrModule.sh_site1', array("label"=>"Site Name - Cabinet 1", "onblur"=>"showHint(this.value);"));
                        ?><p><span id="txtHint"></span></p>
                        <?php
                        echo $this->Form->input('IrModule.sh_site2', array("label"=>"Site Name - Cabinet 2", "onblur"=>"showHint2(this.value);"));
                        ?><p><span id="txtHint2"></span></p>
                        <?php
                        echo $this->Form->input('IrModule.sh_rnc', array("label"=>"RNC", 'type'=>'text'));                    
                        echo $this->Form->input('IrModule.sh_nodesoftlevel', array("label"=>"Software Level", 'options'=>$databaseFields->getOptions("sftpkgs", 69), 'type'=>'select'));                    
                        echo $this->Form->input('IrModule.sh_ipaddr', array("label"=>"IP Address", 'type'=>'text'));                    
                        echo $this->Form->input('IrModule.sh_aspenggname', array("label"=>"ASP Engineer name", 'type'=>'text'));                                            
                        ?>
                        
                        <?php
                      for($i=0; $i < $carrier; $i++)
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
                    if ((in_array($data[$key], $EfActivities) && $data[$key] != "") || (in_array($data[$key], $ShActivities) && $data[$key] != ""))
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
              
                break;
            
            case "type" : if($data[$key] == "Script Issue"):
                    echo $this->Form->input("IrIssue.{$num}.script_issue",array("label"=>"What was the Script Issue due to?", "options"=>$databaseFields->getOptions("script_issue",1), "type"=>"select"));
                    echo $this->Form->input("IrIssue.{$num}.script_issue_contact",array("label"=>"Who was contacted to resolve this?"));
                endif;
                break;
            case "owner" : echo ($data[$key] == "Ericsson") ? $this->Form->input("IrIssue.$num.owner_ericsson_contact",array("label"=>"Who needs to be contacted", "options"=>$databaseFields->getOptions("issue_ericsson_contact",1), "type"=>"select")):"";
                break;
            case "precheck_issue_encountered" : echo ($data[$key] == "Yes") ? $this->Form->input('IrModule.precheck_issues', array("label"=>"Please describe the issues")) : "";
                break;
            case "nodes_excluded": echo ($data[$key] == "Yes") ? $this->Form->input('IrModule.total_nodes_excluded'). $this->Form->input('IrModule.reason_nodes_excluded') : "";
                break;
 }
    endif;

    function __addRssiValues($carrierNos){
    
    }    
    ?>
