<?php
	class Viewregion extends AppModel
	{
		public $name = 'viewregion';
		var $useTable = 'viewregion';
		
		public function getRegions()
		{
		    
            $query = "SELECT dd_description FROM $this->table";
            $res = $this->query($query);
    		$ret = array();
			$ret["--Select--"] = "--Select--";
    		foreach($res as $row)
		    {				
    			$ret[$row[$this->table]['dd_description']] =
    			    $row[$this->table]['dd_description'];
    		}
			//debug ($ret);
    		return $ret;
		}
		
	}
