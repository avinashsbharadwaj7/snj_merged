<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
class DistributionList extends AppModel {
	var $name = 'DistributionList';
        
       
                public function getLists()
		{
		    
                $query = "SELECT id,name FROM distribution_lists where name like 'SNJ%'";
                $res = $this->query($query);
                    $dls = array();
                    foreach($res as $dlinfo)
                        {
                            $dls[$dlinfo['distribution_lists']['id']] =
                                 $dlinfo['distribution_lists']['name'];
                    }
    		return $dls;
		}
      
       }              		
?>