<fieldset>
    <legend><?php __('Activity Information'); ?></legend>
    
    <?php
   /* activity_type
    
    */
   $action = $this->params['action'];
   if($action === "edit"){
   echo $this->Form->input('activity_type', array("label"=>"Activity Type",
                           "type"=>"text", "readonly"=>"readonly"));
                        }
   elseif ($action === "add"){
       echo $this->Form->input('activity_type', array("options"=>$databaseFields->getOptions("activity_type", 5), 
           'onChange'=>"triggerUpdater(" . $modelNameField . "ActivityType, 
           'ActivityTypePlaceholder', " . $controllerNameField . ")"));                            
           }

    //echo $this->Form->input('activity_type', array("options"=>$databaseFields->getOptions("activity_type", 5), 'onChange'=>"triggerUpdater(" . $modelNameField . "ActivityType, 'ActivityTypePlaceholder', " . $controllerNameField . ")"));
    echo $this->Html->div('', null, array('id'=>'ActivityTypePlaceholder'));
    /* preloading previously entered values */
    //echo (isset($this->data[$modelNameField]['activity_type']) && $showFields->display('activity_type', $this->data[$modelNameField]['activity_type'])) ? $this->Form->input('activity_type_other', array('label'=>'Please Specify')): "";
    if((isset($this->data[$modelNameField]['activity_type'])))
    {               //$key = key($this->data['Cdmamaster']);
                    switch($this->data['Cdmamaster']['activity_type'])
                        {                            
                            case "GSM-N Other":
                                echo $this->Form->input('activity_type_other', array('label'=>"Please Specify"));
                                break;
                            
                            case "CDMA Other":
                                echo $this->Form->input('activity_type_other', array('label'=>"Please Specify"));
                                break;
                            
                            case "Carrier Addition":
                                echo $this->Form->input('carrier_addition_voice', array('label'=>"Voice (1xRTT)", 'type'=>'checkbox'));
                                echo $this->Form->input('carrier_addition_data', array('label'=>"Data (EVDO)", 'type'=>'checkbox'));
                                break;
                            
                            case "Support":
                                echo $this->Form->input('support_installation', array('label'=>"Installation", 'type'=>'checkbox'));
                                echo $this->Form->input('support_RF_drivetesting_opto', array('label'=>"RF/Drive Testing/Opto", 'type'=>'checkbox'));
                                echo $this->Form->input('support_customer', array('label'=>"Customer", 'type'=>'checkbox'));
                                break;
                            
                            case "Migration/Re-Home":
                                echo $this->Form->input('migration_voice', array('label'=>"Voice", 'type'=>'checkbox'));
                                echo $this->Form->input('migration_data', array('label'=>"Data", 'type'=>'checkbox'));
                                echo $this->Form->input('migration_reip', array('label'=>"Re-IP", 'type'=>'checkbox'));
                                echo $this->Form->input('migration_rip', array('label'=>"RIP", 'type'=>'checkbox'));                                
                                break;
                        }

    }
    echo "</div>";
    
    echo $this->Form->input('activity_status', array("options"=>$databaseFields->getOptions("activity_status", 5), 'onChange'=>"triggerUpdater(" . $modelNameField . "ActivityStatus, 'ActivityStatusPlaceholder', " . $controllerNameField . ")"));
    echo $this->Html->div('', null, array('id'=>'ActivityStatusPlaceholder'));
    /* preloading previously entered values */
    echo (isset($this->data[$modelNameField]['activity_status']) && $showFields->display('activity_status', $this->data[$modelNameField]['activity_status'])) ? $this->Form->input('activity_status_other', array('label'=>'Total Number of Issues encountered')): "";
    echo "</div>";
    
    if(isset($this->data[$modelNameField]['activity_status_other']))
        {
             for($aissue=0 ; $aissue < $this->data['Cdmamaster']['activity_status_other'] ; $aissue++) 
             { 
               __("ISSUE").__(" ").__($aissue+1);
               echo $this->Form->input("Cdmamaster.type_of_issue_encountered".$aissue, array('label'=>"Type of Issue encountered", "options"=>$databaseFields->getOptions("type_of_issue_encountered", 5)));
               echo $this->Html->div('', null, array('id'=>"TypeOfIssueEncountered".$aissue."Placeholder"));
               /* preloading previously entered values */
               echo (isset($this->data[$modelNameField]['type_of_issue_encountered']) && $showFields->display('type_of_issue_encountered', $this->data[$modelNameField]['type_of_issue_encountered'])) ? $this->Form->input('type_of_issue_encountered', array('label'=>"Type of Issue encountered")): "";
               echo "</div>";
               
               echo $this->Form->input("Cdmamaster.issue_owner".$aissue, array('label'=>"Issue Owner", "options"=>$databaseFields->getOptions("issue_owner", 5), 'onChange'=>"triggerUpdater(" . $modelNameField . "IssueOwner".$aissue.", 'IssueOwner".$aissue."Placeholder', " . $controllerNameField . ")"));
               echo $this->Html->div('', null, array('id'=>"IssueOwner".$aissue."Placeholder"));
               /* preloading previously entered values */
               echo (isset($this->data[$modelNameField]['issue_owner']) && $showFields->display('issue_owner', $this->data[$modelNameField]['issue_owner'])) ? $this->Form->input('issue_owner', array('label'=>'Issue Owner')): "";
               echo "</div>";
               
                if($this->data[$modelNameField]["issue_owner$aissue"] == "Ericsson")
                    {
                        echo $this->Form->input("Cdmamaster.who_needs_tobe_contacted".$aissue, array('label'=>"Who needs to be contacted ?", "options"=>$databaseFields->getOptions("who_needs_tobe_contacted", 5)));
                        echo $this->Html->div('', null, array('id'=>"WhoNeedsTobeContacted".$aissue."Placeholder"));
                        /* preloading previously entered values */
                        echo (isset($this->data[$modelNameField]["who_needs_tobe_contacted$aissue"]) && $showFields->display("who_needs_tobe_contacted$aissue", $this->data[$modelNameField]["who_needs_tobe_contacted$aissue"])) ? $this->Form->input("who_needs_tobe_contacted$aissue", array('label'=>"Who needs to be contacted ?")): "";
                        echo "</div>";
                    }    
               
               echo $this->Form->input("Cdmamaster.contact_escalation_engg".$aissue, array('label'=>"Did you contact the escalation engineer ?","options"=>$databaseFields->getOptions("contact_escalation_engg", 5)));
               echo $this->Html->div('', null, array('id'=>'ContactEscalationEngineer'.$aissue.'Placeholder'));
               /* preloading previously entered values */
               echo (isset($this->data[$modelNameField]['contact_escalation_engg']) && $showFields->display('contact_escalation_engg', $this->data[$modelNameField]['contact_escalation_engg'])) ? $this->Form->input('contact_escalation_engg', array('label'=>"Did you contact the escalation engineer ?")): "";
               echo "</div>";
               
               echo $this->Form->input("Cdmamaster.engineer_name".$aissue, array('label'=>"Engineer Name"));
               echo $this->Form->input("Cdmamaster.engineer_signum".$aissue, array('label'=>"Engineer Signum"));
               echo $this->Form->input("Cdmamaster.escalation_comments".$aissue, array('label'=>"Summarize Escalation/Troubleshooting/Issues", 'type'=>'textarea'));
               
               echo $this->Form->input("Cdmamaster.impact_of_the_issue".$aissue, array('label'=>"Impact of the Issue", "options"=>$databaseFields->getOptions("impact_of_the_issue", 5)));
               echo $this->Html->div('', null, array('id'=>'ImpactOfTheIssue'.$aissue.'Placeholder'));
               /* preloading previously entered values */
               echo (isset($this->data[$modelNameField]['impact_of_the_issue']) && $showFields->display('impact_of_the_issue', $this->data[$modelNameField]['impact_of_the_issue'])) ? $this->Form->input('impact_of_the_issue', array('label'=>"Impact of the Issue")): "";
               echo "</div>";
             }   
        }
        
    echo $this->Form->input('issues_during_prechecks', array("options"=>$databaseFields->getOptions("issues_during_prechecks", 5), 'onChange'=>"triggerUpdater(" . $modelNameField . "IssuesDuringPrechecks, 'IssuesDuringPrechecksPlaceholder', " . $controllerNameField . ")"));
    echo $this->Html->div('', null, array('id'=>'IssuesDuringPrechecksPlaceholder'));
    /* preloading previously entered values */
    echo (isset($this->data[$modelNameField]['issues_during_prechecks']) && $showFields->display('issues_during_prechecks', $this->data[$modelNameField]['issues_during_prechecks'])) ? $this->Form->input('issues_during_prechecks_yes', array('label'=>'Total Number of Issues encountered')): "";
    echo "</div>";
    
    echo $this->Form->input('call_test_performed', array("label"=>"Call test performed ?", "options"=>$databaseFields->getOptions("call_test_performed", 5)));
    echo $this->Html->div('', null, array('id'=>'CallTestPerformedPlaceholder')); 
    echo "</div>";

    echo $this->Form->input('rnc', array( "label"=>"RNC" ) );
    echo $this->Form->input('oss', array( "label"=>"OSS" ) );
    echo $this->Form->input('rbs', array( "label"=>"RBS's", "type"=>"textarea" ) );
    echo $this->Form->input('number_of_rncs_scheduled', array( "label"=>"Total Number of Nodes/RNC's Scheduled" ) );
    echo $this->Form->input('number_of_rncs_attempted', array( "label"=>"Total Number of Nodes Attempted" ) );

    echo $this->Form->input('rncs_excluded', array("label"=>"RNC's Excluded", "options"=>$databaseFields->getOptions("rncs_excluded", 5), 'onChange'=>"triggerUpdater(" . $modelNameField . "RncsExcluded, 'RncsExcludedPlaceholder', " . $controllerNameField . ")"));
    echo $this->Html->div('', null, array('id'=>'RncsExcludedPlaceholder'));
    /* preloading previously entered values */
    echo (isset($this->data[$modelNameField]['rncs_excluded']) && $showFields->display('rncs_excluded', $this->data[$modelNameField]['rncs_excluded'])) ? $this->Form->input('rncs_excluded_yes', array('label'=>"Total Number of Nodes/RNC's excluded")): "";
    echo (isset($this->data[$modelNameField]['rncs_excluded']) && $showFields->display('rncs_excluded', $this->data[$modelNameField]['rncs_excluded'])) ? $this->Form->input('rncs_excluded_reason', array('label'=>"Reason for excluding the RNC's", "type"=>"textarea")): "";
    echo "</div>";
    
    echo $this->Form->input('number_of_rncs_successful', array( "label"=>"Total Number of Nodes/RNC's Successful" ) );
    echo $this->Form->input('number_of_rncs_unsuccessful', array( "label"=>"Total Number of Nodes/RNC's Unsuccessful" ) );
    echo $this->Form->input('reason_for_failed_rncs', array( "label"=>"Reason for Failed Nodes/RNCs", "type"=>"textarea" ) );
    echo $this->Form->input('state_of_failed_rncs', array( "label"=>"State of the Failed/Fallback Nodes", "type"=>"textarea" ) );
    ?>
</fieldset>