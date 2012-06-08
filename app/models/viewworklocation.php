<?php
	class Viewworklocation extends AppModel
	{
		public $name = 'viewworklocation';
		var $useTable = 'viewworklocation';
		
		public function getWorkLocations()
		{
		    
            $query = "SELECT * FROM $this->table";
            $res = $this->query($query);
    		$locations = array();
    		foreach($res as $row)
		    {
    			$locations[$row[$this->table]['idsnj_dd']] = $row[$this->table]['dd_description'];
    		}
			
			//debug ($locations);
    		return $locations;
		}
		
		public function getWorkLocationDescription($id)
		{
			
			$query = "SELECT dd_description FROM viewworklocation WHERE idsnj_dd = '".$id."'";
			$res = $this->query($query);
			
			$resWorkLocation = 'Unidentified ID';
			
			if (!empty ($res))
			{
				$resWorkLocation = $res[0]['viewworklocation']['dd_description'];
			}
			
			return $resWorkLocation;
		}
		
	}
