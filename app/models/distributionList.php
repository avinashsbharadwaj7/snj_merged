<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
class distributionList extends AppModel {
	var $name = 'distributionList';
 
        
        public function getDLists()
        {
            $signum = Authsome::get ('username');
             $query = "select listname from distribution_lists where id in 
                 (select dl_id from email_lists where user_id=
                  (select id from users where username='".$signum."'))";
            print_r("here now".$query);
            // $res = $this->DistributionList->query($query);
             return $query;
        }
     
}
?>