
<?php
$signum = Authsome::get('username');
$name_concat = Authsome::get('first_name') . ' ' . Authsome::get('last_name');
?>

 <fieldset>
    <h4>Project Information</h4>
    <?php
    echo $this->Form->input('nic_signum', array( "label"=>"Engineer Signum", 
                                                 "readonly"=> "readonly",
                                                 "value"=> $signum ) );
    echo $this->Form->input('nic_name', array( "label"=>"Engineer Name",
                                               "readonly"=> "readonly",
                                               "value"=> $name_concat ) );

    echo $this->Form->input('customer', array("options"=>$databaseFields->getOptions("customer", 5), 'onChange'=>"triggerUpdater(" . $modelNameField . "Customer, 'CustomerPlaceholder', " . $controllerNameField . ")"));
    echo $this->Html->div('', null, array('id'=>'CustomerPlaceholder'));
    /* preloading previously entered values */
    echo (isset($this->data[$modelNameField]['customer']) && $showFields->display('customer', $this->data[$modelNameField]['customer'])) ? $this->Form->input('customer_other', array('label'=>'Please Specify')): "";
    echo "</div>";
    echo $this->Form->input('organization', array('type'=>'select', 'options'=>array(""=>"", "LDO NIC"=>"LDO NIC", "RAN E&O Integration"=>"RAN E&O Integration", "RAN E&O NDS"=>"RAN E&O NDS")));
    echo $this->Form->input('project_manager', array( "label"=>"Project Manager" ) );
    echo $this->Form->input('network_id', array( "label"=>"Network ID", "minlength" =>"8", "type" => "text") );
    echo $this->Form->input('site_lead', array( "label"=>"Site Lead" ) ); 
    echo $this->Form->input('deployment_coordinator', array( "label"=>"Deployment Coordinator" ) ); 
    echo $this->Form->input('leader', array( "label"=>"Leader" ) ); 
    ?>
 </fieldset>