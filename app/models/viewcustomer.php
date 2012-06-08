<?php
	class Viewcustomer extends AppModel
	{
		public $name = 'viewcustomer';
		var $useTable = 'viewcustomer';
		
		public function getCustomers()
		{
		    
            $query = "SELECT idsnj_dd, dd_description FROM viewcustomer";
            $res = $this->query($query);
    		$customers = array();
    		foreach($res as $row)
		    {
    			$customers[$row[$this->table]['idsnj_dd']] = $row[$this->table]['dd_description'];
    		}
			
			//debug ($customers);
    		return $customers;
		}
		
		public function getCustomerName ($id)
		{
		
			$query = "SELECT dd_description FROM viewcustomer WHERE idsnj_dd = '".$id."'";
			$res = $this->query($query);
			
			//debug ($res);
			$resCustomerName = $res[0]['viewcustomer']['dd_description'];
			return $resCustomerName;
		}
	}
