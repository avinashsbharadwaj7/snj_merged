<?php
	class Viewrequesttype extends AppModel
	{
		public $name = 'viewrequesttype';
		var $useTable = 'viewrequesttype';
		
		public function getRequestTypes()
		{
		    
            $query = "SELECT dd_description FROM $this->table";
            $res = $this->query($query);
    		$ret = array();
    		foreach($res as $row)
		    {
    			$ret[$row[$this->table]['dd_description']] = 
    			    $row[$this->table]['dd_description'];
    		}
    		return $ret;
		}
		
	}
?>