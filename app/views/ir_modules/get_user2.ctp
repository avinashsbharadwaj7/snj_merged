    <?php
    //var_dump($Svalues2);
    //echo "getuser2";
        echo $this->Form->input('IrModule.shsite_location2', array("label" => "Site Location", 'type'=>'text', 'readonly'=>'readonly', "value"=>$Svalues2[0]['SiteDetail']['city']));
        echo $this->Form->input('IrModule.shsite_region2', array("label" => "Site Region", 'type'=>'text', 'readonly'=>'readonly', "value"=>$Svalues2[0]['SiteDetail']['region']));
        echo $this->Form->input('IrModule.shsite_market2', array("label" => "Site Market", 'type'=>'text', 'readonly'=>'readonly', "value"=>$Svalues2[0]['SiteDetail']['sitemarket']));
    ?>
