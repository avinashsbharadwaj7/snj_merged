<?php
	class Vieworganization extends AppModel
	{
		public $name = 'vieworganization';
		var $useTable = 'vieworganization';
		
		public function getOrgs()
		{
		    
            $query = "SELECT idsnj_dd, dd_description FROM vieworganization";
            $res = $this->query($query);
    		$orgs = array();
    		foreach($res as $orgInfo)
		    {
    			$orgs[$orgInfo['vieworganization']['idsnj_dd']] =
    			     $orgInfo['vieworganization']['dd_description'];
    		}
    		return $orgs;
		}
		
		public function getOrgName($id)
		{
		    
            $query = "SELECT dd_description FROM vieworganization".
                      " WHERE idsnj_dd = '$id'";
            $res = $this->query($query);
    		$ret = "UNKNOWN($id)";
    		foreach($res as $orgInfo)
		    {
    			$ret = $orgInfo['vieworganization']['dd_description'];
    			break;
    		}
    		return $ret;
		}
		
	    public function getOrgMappings()
    	{
	    
            $query = "SELECT idsnj_dd, dd_description FROM $this->table";
            $res = $this->query($query);
            $ret = array();
            foreach($res as $row)
            {
                $ret[$row[$this->table]['idsnj_dd']] = $row[$this->table]['dd_description'];
            }
            return $ret;
		}
		
		public function getOrgId ($organization)
		{
			$query = "SELECT idsnj_dd FROM vieworganization WHERE dd_description = '". $organization . "'";
			
			$res = $this->query ($query);
			
			$resGetOrgId = 0;
			
			if (!empty ($res))
			{
				$resGetOrgId = $res[0]['vieworganization']['idsnj_dd'];
			}
			
			return $resGetOrgId;
		}
		
		
	}
