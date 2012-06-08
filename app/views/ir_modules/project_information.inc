<?php
$yes_no = array(""=>"","Yes"=>"Yes","No"=>"No");

$yes_no_na = array(""=>"","Yes"=>"Yes","No"=>"No","N/A"=>"N/A");
?>
<fieldset>
     <h4>Engineer Details</h4>
    <?php
        echo $this->Form->input('date_initiated', array("label"=>"Date", "type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
        echo $this->Form->input('engineer_signum',array( 'READONLY' => true, 'value'=>$signum));
        echo $this->Form->input('engineer_name',array( 'READONLY' => true, 'value'=>$name));
        if($this->params['action'] === "edit" || $this->params['action'] === "cloneReport"){
            echo $this->Form->input('IrModule.engineer_team', array("label"=>"Engineer Team", "type"=>"text", "readonly"=>"readonly"));
            }
        else
            echo $this->Form->input('engineer_team', array("options"=>$databaseFields->getOptions("engineer_team",1)));            
        echo $ajax->observeField('IrModuleEngineerTeam', array('update'=>'information_placeholder', 'url'=>array('controller'=>'ir_modules','action'=>'updater'),'frequency'=>0.2));
    ?>
</fieldset>



<fieldset>
    <legend><?php __('Project Information'); ?></legend>
<?php
echo $this->Form->input('organization', array('type'=>'select', 'options'=>array(""=>"", "LDO NIC"=>"LDO NIC", "RAN E&O Integration"=>"RAN E&O Integration", "RAN E&O NDS"=>"RAN E&O NDS")));
echo $this->Form->input('date_time_activity', array('label'=>"Day Time Activity ?", 'type'=>'select', 'options'=>array(""=>"", "Yes"=>"Yes", "No"=>"No")));
echo $this->Form->input('customer', array("options"=>$databaseFields->getOptions("customer",1)));
echo $this->Form->input('project_manager');
echo $this->Form->input('network_number');
echo $this->Form->input('SDM');

echo $this->Form->input('engineer_work_location', array("options"=>$databaseFields->getOptions("work_loc",1)));
echo $ajax->div('worklocation_other_placeholder', array('class'=>'placeholders'));
echo in_array($irModule['IrModule']['engineer_work_location'],$irDependentArray->dep_arr['engineer_work_location']) ? $this->Form->input('WorkLocation_Other'): "";
echo $ajax->divEnd('worklocation_other_placeholder');
echo $ajax->observeField('IrModuleEngineerWorkLocation', array('update'=>'worklocation_other_placeholder', 'url'=>array('controller'=>'ir_modules','action'=>'updater')));

echo $datePicker->picker('date_activity_performed',array('label'=>'Date Activity Performed', 'READONLY' => true, 'style'=>'background-color:#F6F6CC;  width:auto;'));


echo $this->Form->input('region', array("options"=>$databaseFields->getOptions("region",1)));
echo $ajax->div('region_placeholder', array('class'=>'placeholders'));
if(!empty($irModule['IrModule']['region'])) {
switch($irModule['IrModule']['region']){
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
}
echo $ajax->divEnd('region_placeholder');
echo $ajax->observeField('IrModuleRegion', array('update'=>'region_placeholder', 'url'=>array('controller'=>'ir_modules','action'=>'updater'),'frequency'=>0.2));                        

//echo $ajax->div('tcmengg_placeholder', array('class'=>'placeholders'));
//
//echo $ajax->divEnd('tcmengg_placeholder');
//echo $ajax->observeField('IrModuleTcmEngineer', array('update'=>'tcmengg_placeholder', 'url'=>array('controller'=>'ir_modules','action'=>'updater'),'frequency'=>0.2));                        

echo $this->Form->input('tcm_engineer', array("label"=>"TCM Engineer", "type"=>"text"));
?>
    
<fieldset>
    <legend><?php __('Other Involved Engineers'); ?></legend>
    <div id="additional_engineers">
    <font color='red' size='1'>*Please enter signums only.</font>    
        <?php
        if (!empty($irModule['IrAdditionalEngineer'])):
            $databaseFields->addEngineers(count($irModule['IrAdditionalEngineer']));
        else:
            $databaseFields->addEngineers(1);
        endif;
    ?>
    </div>
<?php
    echo $this->Ajax->link("+", array('controller' => 'ir_modules', 'action' => 'updater'), array("update" => "additional_engineers", "position" => "bottom"));
?>
</fieldset>
<?php
echo $this->Form->input('csr_reference', array("label"=>"CSR Reference #"));
echo $this->Form->input('csr_status', array("label"=>"Is the status of this CSR open?","type"=>"select","options"=>$yes_no));
echo $this->Form->input('ccb_work_ticket', array("label"=>"CCB Work Ticket & NCR/CTS Ticket #", 'type'=>'textarea'));
?>
                <font color='red' size='1'>*The above field is mandatory only if the Customer is AT&T.</font>
<?php    
echo $this->Form->input('IrModule.was_there_anyissue', array("label"=>"Was there any Issue ?", 'type'=>'select', "options"=>$yes_no));
echo $ajax->div('was_there_anyissues_placeholder', array('class'=>'placeholders'));
echo (!empty($irModule['IrModule']['was_there_anyissue'])) ? $this->Form->input('time_spent') : "";
echo $ajax->divEnd('was_there_anyissues_placeholder');
echo $ajax->observeField('IrModuleWasThereAnyissue', array('update'=>'was_there_anyissues_placeholder', 'url'=>array('controller'=>'ir_modules','action'=>'updater'),'frequency'=>0.2));                        


echo $this->Form->input('iwos_ticket_num', array("label"=>"IWOS Ticket#"));

echo $this->Form->input('access_method', array("options"=>array(""=>"","OSS"=>"OSS","Sonar"=>"Sonar", "Smart Laptop"=>"Smart Laptop"), "type"=>"select","label"=>"Access Method Used?"));
echo $ajax->div('sonar_reason_placeholder', array('class'=>'placeholders'));
    if(!empty($irModule['IrModule']['access_method'])) {
        switch($irModule['IrModule']['access_method']){
            case "Sonar":
                echo $this->Form->input('why_sonar_used', array('type'=>'textarea'));
                echo $this->Form->input('why_sl_not_used', array("label"=>"Why was SL not used?", "options" => $databaseFields->getOptions("sl_not_used",1), "type"=>"select"));                
                break;
            case "Smart Laptop":    
                echo $this->Form->input('asp_name',array("label"=>"ASP/FSO Name"));
                echo $this->Form->input('asp_contact',array("label"=>"Contact Number"));
                echo $this->Form->input('asp_emailaddr',array("label"=>"Email Address"));
                echo $this->Form->input('asp_logsattached',array("label"=>"Will ASP Logs be attached after Submission of the report?", 'type'=>'select', 'options'=>array("","Yes", "No")));
                break;
            case "OSS":
                echo $this->Form->input('why_sl_not_used', array("label"=>"Why was SL not used?", "options" => $databaseFields->getOptions("sl_not_used",1), "type"=>"select"));                
                break;
        }
    }
//echo in_array($irModule['IrModule']['access_method'],$irDependentArray->dep_arr['access_method']) ? $this->Form->input('why_sonar_used'): "";
echo $ajax->divEnd('sonar_reason_placeholder');
echo $ajax->observeField('IrModuleAccessMethod', array('update'=>'sonar_reason_placeholder', 'url'=>array('controller'=>'ir_modules','action'=>'updater')));

echo $this->Form->input('mop_used', array("label"=>"Was a MOP used?","options"=>$yes_no, "type"=>"select"));

echo $ajax->div('mop_used_placeholder', array('class'=>'placeholders'));
if(in_array($irModule['IrModule']['mop_used'],$irDependentArray->dep_arr['mop_used'])):
        echo $this->Form->input('mop_version',array("label"=>"MOP Revision"));
        echo $this->Form->input('mop_problem_encountered', array("label"=>"Did you have any problems concerning this MOP?","options"=>$yes_no, "type"=>"select"));
        echo $ajax->div('mop_problems_placeholder', array('class'=>'placeholders'));
        echo in_array($irModule['IrModule']['mop_problem_encountered'],$irDependentArray->dep_arr['mop_problem_encountered']) ? $this->Form->input('mop_problems',array("label"=>"Describe the problems")): "";
        echo $ajax->divEnd('mop_problems_placeholder');
        echo $ajax->observeField('IrModuleMopProblemEncountered', array('update'=>'mop_problems_placeholder', 'url'=>array('controller'=>'ir_modules','action'=>'updater')));

endif;
echo $ajax->divEnd('mop_used_placeholder');
echo $ajax->observeField('IrModuleMopUsed', array('update'=>'mop_used_placeholder', 'url'=>array('controller'=>'ir_modules','action'=>'updater')));


echo $this->Form->input('script_used', array("label"=>"Was a script(s) used?",
                        "options"=>$yes_no, "type"=>"select"));

echo $this->Form->input('script_problem_encountered', array("label"=>"Did you face any issues concerning this Script(s)?",
                        "options"=>$yes_no, "type"=>"select"));
echo $ajax->div('script_problems_placeholder', array('class'=>'placeholders'));
echo (!empty($irModule['IrModule']['script_problems'])) ? $this->Form->input('script_problems',array("label"=>"Describe the issues")): "";
echo $ajax->divEnd('script_problems_placeholder');
echo $ajax->observeField('IrModuleScriptProblemEncountered', array('update'=>'script_problems_placeholder', 'url'=>array('controller'=>'ir_modules','action'=>'updater')));

echo $this->Form->input('ftp_server_pingable', array("label"=>"FTP Server Pingable?",
                        "options"=>$yes_no_na,"type"=>"select", "div"=>array("id"=>"ftp_server_pingable_id")));

echo $this->Form->input('ntp_server_pingable', array("label"=>"NTP Server Pingable?",
                        "options"=>$yes_no_na,"type"=>"select", "div"=>array("id"=>"ntp_server_pingable_id")));
//Checking
?>
</fieldset>
