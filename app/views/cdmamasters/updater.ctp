<?php
$modelNameField = 'Cdmamaster';
$controllerNameField = "'cdmamasters'";
?>


<?php 
   $key = key($this->data['Cdmamaster']);
   //var_dump($this->data);
   //var_dump($key);
   if($showFields->display($key, $this->data['Cdmamaster'][$key]))
   {            
            switch($key)
            {
                case "customer":
                    echo $this->Form->input('Cdmamaster.customer_other', array('label'=>'-Please Specify'));
                    break;
                
                case "work_location":
                    echo $this->Form->input('Cdmamaster.work_location_other', array('label'=>'-Please Specify'));
                    break;
                
                case "region":
                    echo $this->Form->input('Cdmamaster.region_other', array('label'=>'-Please Specify'));
                    break;
                
                case "access_method":
                    echo $this->Form->input('Cdmamaster.access_method_other', array('label'=>'-Please Specify'));
                    break;
                
                case "was_mop_used":
                    echo $this->Form->input('Cdmamaster.mop_version', array('label'=>'-Please Specify the Version'));
                    break;
                
                case "problems_concerning_mop";
                    echo $this->Form->input('Cdmamaster.problems_concerning_mop_yes', array('label'=>'-Please Explain', 'type'=>'textarea'));
                    break;
                    
                case "issues_concerning_scripts":
                    echo $this->Form->input('Cdmamaster.issues_concerning_scripts_explain', array('label'=>'-Please mention the Issues', 'type'=>'textarea'));
                    break;
                
                case "activity_status":
                    //echo $this->Form->input('Cdmamaster.activity_status_other', array('label'=>'-Total Number of Issues encountered'));
                    echo $this->Form->input('Cdmamaster.activity_status_other', array('label'=>"-Total number of issues encountered", "options"=>$databaseFields->getOptions("activity_status_other", 5), 'onChange'=>"triggerUpdater(" . $modelNameField . "ActivityStatusOther, 'ActivityStatusOtherPlaceholder', " . $controllerNameField . ")"));                
                    echo $this->Html->div('', null, array('id'=>'ActivityStatusOtherPlaceholder'));
                    break;
                    
                case "issues_during_prechecks":
                    echo $this->Form->input('Cdmamaster.issues_during_prechecks_yes', array('label'=>'-Please Explain', 'type'=>'textarea'));
                    break;
                    
                case "rncs_excluded":
                    echo $this->Form->input('Cdmamaster.rncs_excluded_yes', array('label'=>"-Total Number of RNC's excluded"));
                    echo $this->Form->input('Cdmamaster.rncs_excluded_reason', array('label'=>"-Reason for excluding the RNC's", "type"=>"textarea"));
                    break;
                
                case "activity_type":
                    switch($this->data['Cdmamaster'][$key])
                        {
                            case "GSM-N Other":
                                echo $this->Form->input('Cdmamaster.activity_type_other', array('label'=>"-Please Specify"));
                                break;
                            
                            case "CDMA Other":
                                echo $this->Form->input('Cdmamaster.activity_type_other', array('label'=>"-Please Specify"));
                                break;
                            
                            case "Carrier Addition":
                                echo $this->Form->input('Cdmamaster.carrier_addition_voice', array('label'=>"-Voice (1xRTT)", 'type'=>'checkbox'));
                                echo $this->Form->input('Cdmamaster.carrier_addition_data', array('label'=>"-Data (EVDO)", 'type'=>'checkbox'));
                                break;
                            
                            case "Support":
                                echo $this->Form->input('Cdmamaster.support_installation', array('label'=>"-Installation", 'type'=>'checkbox'));
                                echo $this->Form->input('Cdmamaster.support_RF_drivetesting_opto', array('label'=>"-RF/Drive Testing/Opto", 'type'=>'checkbox'));
                                echo $this->Form->input('Cdmamaster.support_customer', array('label'=>"-Customer", 'type'=>'checkbox'));
                                break;
                            
                            case "Migration/Re-Home":
                                echo $this->Form->input('Cdmamaster.migration_voice', array('label'=>"-Voice", 'type'=>'checkbox'));
                                echo $this->Form->input('Cdmamaster.migration_data', array('label'=>"-Data", 'type'=>'checkbox'));
                                echo $this->Form->input('Cdmamaster.migration_reip', array('label'=>"-Re-IP", 'type'=>'checkbox'));
                                echo $this->Form->input('Cdmamaster.migration_rip', array('label'=>"-RIP", 'type'=>'checkbox'));                                
                                break;
                        }
                    
                    break;
                    
            }
   }   
   
   elseif($key === "activity_status_other") 
       {
       for($GLOBALS["issueno"]=0 ; $GLOBALS["issueno"] < $this->data['Cdmamaster']['activity_status_other'] ; $GLOBALS["issueno"]++) 
       {
       //switch($key):
           //var_dump($GLOBALS["issueno"]);
               __("ISSUE").__(" ").__($GLOBALS["issueno"]+1);
          // case "activity_status_other":
               echo $this->Form->input("Cdmamaster.type_of_issue_encountered".$GLOBALS["issueno"], array('label'=>"-Type of Issue encountered", "options"=>$databaseFields->getOptions("type_of_issue_encountered", 5)));
               echo $this->Html->div('', null, array('id'=>"TypeOfIssueEncountered".$GLOBALS["issueno"]."Placeholder"));
               /* preloading previously entered values */
               echo (isset($this->data[$modelNameField]['type_of_issue_encountered']) && $showFields->display('type_of_issue_encountered', $this->data[$modelNameField]['type_of_issue_encountered'])) ? $this->Form->input('type_of_issue_encountered', array('label'=>"Type of Issue encountered")): "";
               echo "</div>";
               
               echo $this->Form->input("Cdmamaster.issue_owner".$GLOBALS["issueno"], array('label'=>"-Issue Owner", "options"=>$databaseFields->getOptions("issue_owner", 5), 'onChange'=>"triggerUpdater(" . $modelNameField . "IssueOwner".$GLOBALS["issueno"].", 'IssueOwner".$GLOBALS["issueno"]."Placeholder', " . $controllerNameField . ")"));
               echo $this->Html->div('', null, array('id'=>"IssueOwner".$GLOBALS["issueno"]."Placeholder"));
               /* preloading previously entered values */
               echo (isset($this->data[$modelNameField]['issue_owner']) && $showFields->display('issue_owner', $this->data[$modelNameField]['issue_owner'])) ? $this->Form->input('issue_owner', array('label'=>'Issue Owner')): "";
               echo "</div>";
               
               echo $this->Form->input("Cdmamaster.contact_escalation_engg".$GLOBALS["issueno"], array('label'=>"-Did you contact the escalation engineer ?","options"=>$databaseFields->getOptions("contact_escalation_engg", 5)));
               echo $this->Html->div('', null, array('id'=>'ContactEscalationEngineer'.$GLOBALS["issueno"].'Placeholder'));
               /* preloading previously entered values */
               echo (isset($this->data[$modelNameField]['contact_escalation_engg']) && $showFields->display('contact_escalation_engg', $this->data[$modelNameField]['contact_escalation_engg'])) ? $this->Form->input('contact_escalation_engg', array('label'=>"Did you contact the escalation engineer ?")): "";
               echo "</div>";
               
               echo $this->Form->input("Cdmamaster.engineer_name".$GLOBALS["issueno"], array('label'=>"-Engineer Name"));
               echo $this->Form->input("Cdmamaster.engineer_signum".$GLOBALS["issueno"], array('label'=>"-Engineer Signum"));
               echo $this->Form->input("Cdmamaster.escalation_comments".$GLOBALS["issueno"], array('label'=>"-Summarize Escalation/Troubleshooting/Issues", 'type'=>'textarea'));
               
               echo $this->Form->input("Cdmamaster.impact_of_the_issue".$GLOBALS["issueno"], array('label'=>"-Impact of the Issue", "options"=>$databaseFields->getOptions("impact_of_the_issue", 5)));
               echo $this->Html->div('', null, array('id'=>'ImpactOfTheIssue'.$GLOBALS["issueno"].'Placeholder'));
               /* preloading previously entered values */
               echo (isset($this->data[$modelNameField]['impact_of_the_issue']) && $showFields->display('impact_of_the_issue', $this->data[$modelNameField]['impact_of_the_issue'])) ? $this->Form->input('impact_of_the_issue', array('label'=>"Impact of the Issue")): "";
               echo "</div>";
               
             //  break;  
               
          // case "issue_owner":
               
      // endswitch;
       }
   }
   else 
   {
       $issueno = substr($key, 11);
       switch($this->data['Cdmamaster'][$key]):
           
           case "Customer":
               break;
           case "Ericsson":
               echo $this->Form->input("Cdmamaster.who_needs_tobe_contacted".$issueno, array('label'=>"-Who needs to be contacted ?", "options"=>$databaseFields->getOptions("who_needs_tobe_contacted", 5)));
               echo $this->Html->div('', null, array('id'=>'WhoNeedsTobeContacted'.$issueno.'Placeholder'));
               echo "</div>";
              
           break; 
           
           case "RCA Ongoing":
                    echo "PM needs to follow up on this and get back to either one of the following. ";
                    echo "</br>";
                    echo "1> The Manager for the US region - Stephen Wang";
                    echo "</br>";
                    echo "2> The Engineer who performed the activity - Administrator";
                    echo "</br>";
                    echo "3> One of the administrators (Jaimin Patel, Kaushik Mirani, Preethi Varambally).";
            
           break;  
        
       endswitch;
   } 
?>
