<?php
class User extends AppModel {
	var $name = 'User';
        
        public function getDesignation($signum)
	{
            $query = "SELECT designation FROM users WHERE username = '".$signum."'";
            $resDesignation = $this->query ($query);
           
			//debug ($resDesignation);
            return $resDesignation[0]['users']['designation'];
	}
}
?>
