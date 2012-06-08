<?php
	class Viewtechnology extends AppModel
	{
		public $name = 'viewtechnology';
		var $useTable = 'viewtechnology';
		
		public function getTechnologies()
		{
		    
            $query = "SELECT idsnj_dd, dd_description FROM viewtechnology";
            $res = $this->query($query);
    		$technologies = array();
			
    		foreach($res as $row)
		    {
    			$technologies[$row['viewtechnology']['idsnj_dd']] =
    			    $row['viewtechnology']['dd_description'];
                        
            }
    		return $technologies;
		}
		
		public function getTechnologyDescription($techId)
		{
			$query = "SELECT dd_description FROM viewtechnology WHERE idsnj_dd = '".$techId."'";
			
			$res = $this->query($query);
			
			return $res[0]['viewtechnology']['dd_description'];
		}
		
	}
