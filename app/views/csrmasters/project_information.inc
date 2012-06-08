<?php
$csrtype = array(""=>"", "Project"=>"Project", "Problem"=>"Problem", "Warranty"=>"Warranty", "Consultation"=>"Consultation", "Other"=>"Other");
$customer  = array(""=>"", "AT&T"=>"AT&T", "T-Mobile"=>"T-Mobile", "Rogers"=>"Rogers", "Others"=>"Others");
$ntype = array(""=>"", "GSM"=>"GSM", "LTE"=>"LTE", "WCDMA"=>"WCDMA", "Other"=>"Other");
$nodetype = array(""=>"", "RBS/NodeB"=>"RBS/NodeB", "RNC"=>"RNC", "OSS"=>"OSS", "BSC"=>"BSC", "MSC"=>"MSC", "SGSN"=>"SGSN", "Other"=>"Other");
?>
 <fieldset>
    <h4>Project Information</h4>
    <?php
    echo $this->Form->input('csr_type', array( "label"=>"CSR Type", "type"=>"select", "options"=>$csrtype) );
    echo $this->Form->input('customer', array( "label"=>"Customer", "type"=>"select", "options"=>$customer) );
    echo $this->Form->input('organization', array('type'=>'select', 'options'=>array(""=>"", "LDO NIC"=>"LDO NIC", "RAN E&O Integration"=>"RAN E&O Integration", "RAN E&O NDS"=>"RAN E&O NDS")));    
    echo $this->Form->input('network_type', array( "label"=>"Network Type", "type"=>"select", "options"=>$ntype) );
    echo $this->Form->input('node_type', array( "label"=>"Node Type", "type"=>"select", "options"=>$nodetype) );
    echo $this->Form->input('sub_product', array( "label"=>"Sub Product" ) );
    echo $this->Form->input('site_name', array( "label"=>"Site Name" ) ); 
    echo $this->Form->input('node_details', array( "label"=>"Node Details" ) ); 
    echo $this->Form->input('software_level', array( "label"=>"Software Level" ) ); 
    ?>
 </fieldset>