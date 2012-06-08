    <?php 
    //var_dump($sitename);
    if($sitename == "NA" || $sitename == "na") 
        { ?>
    <font color='blue' size='1'><?php echo "Invalid Site Name. Please ignore the comment if you don't have to enter the site details."; ?></font> 
      <?php  } else
        //if ($sitename != "NA" || $sitename != "na") 
        { ?>
        <font color='blue' size='1'><?php echo "The Corresponding Site Location, Region and Market for ".$sitename. " are"; ?></font>
        <?php
        echo $this->Form->input('IrModule.shsite_location', array("label" => "Site Location", 'type'=>'text', 'readonly'=>'readonly', "value"=>$Svalues[0]['SiteDetail']['city']));
        echo $this->Form->input('IrModule.shsite_region', array("label" => "Site Region", 'type'=>'text', 'readonly'=>'readonly', "value"=>$Svalues[0]['SiteDetail']['region']));
        echo $this->Form->input('IrModule.shsite_market', array("label" => "Site Market", 'type'=>'text', 'readonly'=>'readonly', "value"=>$Svalues[0]['SiteDetail']['sitemarket']));
        }     ?>
