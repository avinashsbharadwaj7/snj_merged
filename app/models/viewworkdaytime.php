<?php
	class Viewworkdaytime extends AppModel
	{
		public $name = 'viewworkdaytime';
		var $useTable = 'viewworkdaytime';
		
		public function getWorkDayTimes()
		{
		    
                $query = "SELECT dd_description FROM $this->table";
                $res = $this->query($query);
    		$ret = array();
			$ret['--Select--'] = '--Select--';
    		foreach($res as $row)
		    {
    			$ret[$row[$this->table]['dd_description']] =
    			     $row[$this->table]['dd_description'];
    		}
    		return $ret;
		}
		
	}
