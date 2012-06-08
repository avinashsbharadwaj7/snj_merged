
<fieldset>
    <legend><?php __('Engineer Information'); ?></legend>
    <?php
    echo $this->Form->input('engg_1', array( "label"=>"Engg 1" ) );
    echo $this->Form->input('engg_2', array( "label"=>"Engg 2" ) );
    echo $this->Form->input('engg_3', array( "label"=>"Engg 3" ) );
    echo $this->Form->input('engg_4', array( "label"=>"Engg 4" ) );
   
    echo $this->Form->input('work_location', array("options"=>$databaseFields->getOptions("work_location", 5), 'onChange'=>"triggerUpdater(" . $modelNameField . "WorkLocation, 'WorkLocationPlaceholder', " . $controllerNameField . ")"));
    echo $this->Html->div('', null, array('id'=>'WorkLocationPlaceholder'));
    /* preloading previously entered values */
    echo (isset($this->data[$modelNameField]['work_location']) && $showFields->display('work_location', $this->data[$modelNameField]['work_location'])) ? $this->Form->input('work_location_other', array('label'=>'Please Specify')): "";
    echo "</div>";

    echo $this->Form->input('date_activity_performed', array("label"=>"Date Activity Performed", "type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
     
    echo $this->Form->input('region', array("options"=>$databaseFields->getOptions("region", 5), 'onChange'=>"triggerUpdater(" . $modelNameField . "Region, 'RegionPlaceholder', " . $controllerNameField . ")"));
    echo $this->Html->div('', null, array('id'=>'RegionPlaceholder'));
    /* preloading previously entered values */
    echo (isset($this->data[$modelNameField]['region']) && $showFields->display('region', $this->data[$modelNameField]['region'])) ? $this->Form->input('region_other', array('label'=>'Please Specify')): "";
    echo "</div>";

    echo $this->Form->input('site_zipcode', array( "label"=>"Site Zipcode" ) );
    echo $this->Form->input('tcm_engineer', array( "label"=>"TCM Engineer" ) );
    echo $this->Form->input('csr_reference_number', array( "label"=>"CSR Reference Number" ) );
    
    echo $this->Form->input('csr_status', array("label"=>"Is the Status of CSR Open ?", "options"=>$databaseFields->getOptions("csr_status", 5)));
    echo $this->Html->div('', null, array('id'=>'CsrStatusPlaceholder')); 
    echo "</div>";
    
    echo $this->Form->input('access_method', array("options"=>$databaseFields->getOptions("access_method", 5), 'onChange'=>"triggerUpdater(" . $modelNameField . "AccessMethod, 'AccessMethodPlaceholder', " . $controllerNameField . ")", "label"=>"Access Method"));
    echo $this->Html->div('', null, array('id'=>'AccessMethodPlaceholder')); 
    /* preloading previously entered values */
    echo (isset($this->data[$modelNameField]['access_method']) && $showFields->display('access_method', $this->data[$modelNameField]['access_method'])) ? $this->Form->input('access_method_other', array('label'=>'Please Specify')): "";
    echo "</div>";
    
    echo $this->Form->input('was_mop_used', array("options"=>$databaseFields->getOptions("was_mop_used", 5), 'onChange'=>"triggerUpdater(" . $modelNameField . "WasMopUsed, 'WasMopUsedPlaceholder', " . $controllerNameField . ")", "label"=>"Was Mop Used ?"));
    echo $this->Html->div('', null, array('id'=>'WasMopUsedPlaceholder')); 
    /* preloading previously entered values */
    echo (isset($this->data[$modelNameField]['was_mop_used']) && $showFields->display('was_mop_used', $this->data[$modelNameField]['was_mop_used'])) ? $this->Form->input('mop_version', array('label'=>'Please Specify the Version')): "";
    echo "</div>";
    
    echo $this->Form->input('problems_concerning_mop', array("options"=>$databaseFields->getOptions("problems_concerning_mop", 5), 'onChange'=>"triggerUpdater(" . $modelNameField . "ProblemsConcerningMop, 'ProblemsConcerningMopPlaceholder', " . $controllerNameField . ")", "label"=>"Problems Concerning Mop"));
    echo $this->Html->div('', null, array('id'=>'ProblemsConcerningMopPlaceholder')); 
    /* preloading previously entered values */
    echo (isset($this->data[$modelNameField]['problems_concerning_mop']) && $showFields->display('problems_concerning_mop', $this->data[$modelNameField]['problems_concerning_mop'])) ? $this->Form->input('problems_concerning_mop_yes', array('label'=>'Please Explain')): "";
    echo "</div>";
    
    echo $this->Form->input('was_scripts_used', array("options"=>$databaseFields->getOptions("was_scripts_used", 5),  "label"=>"Were Scripts Used ?"));
    echo $this->Html->div('', null, array('id'=>'WasScriptsUsedPlaceholder')); 
    echo "</div>";
        
    echo $this->Form->input('issues_concerning_scripts', array("options"=>$databaseFields->getOptions("issues_concerning_scripts", 5), 'onChange'=>"triggerUpdater(" . $modelNameField . "IssuesConcerningScripts, 'IssuesConcerningScriptsPlaceholder', " . $controllerNameField . ")"));
    echo $this->Html->div('', null, array('id'=>'IssuesConcerningScriptsPlaceholder')); 
    /* preloading previously entered values */
    echo (isset($this->data[$modelNameField]['issues_concerning_scripts']) && $showFields->display('issues_concerning_scripts', $this->data[$modelNameField]['issues_concerning_scripts'])) ? $this->Form->input('script_issues', array('label'=>'Please mention the Issues')): "";
    echo "</div>";
    
    ?>
</fieldset>