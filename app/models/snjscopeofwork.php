<?php
class Snjscopeofwork extends AppModel {
    public $name = 'Snjscopeofwork';
    var $useTable = 'snjscopeofworks';
    
	public $primaryKey = 'idsnj_scope_of_work';
        
        	
	public function getSoooWs($orgId = null)
	{
	    
	   $query = "SELECT idsnj_scope_of_work, snj_sow_description FROM $this->table";
	   if (null != $orgId)
	   {
	       $query .= " WHERE idsnj_dd_fk = ".$orgId;
	   }
       $res = $this->query($query);
       $ret = array();
       foreach($res as $row)
	   {
    			$ret[$row[$this->table]['idsnj_scope_of_work']] = $row[$this->table]['snj_sow_description'];
   	   }
       return $ret;
	}
	
	public function getSoWName($id)
	{
	    
	   $query = "SELECT snj_sow_description FROM $this->table WHERE idsnj_scope_of_work = '$id'";
       $res = $this->query($query);
       $ret = $id;
       foreach($res as $row)
	   {
    		$ret = $row[$this->table]['snj_sow_description'];
    		break;
   	   }
       return $ret;
	}
	
	public function getSoWMappings()
	{
	    
	   $query = "SELECT idsnj_scope_of_work, snj_sow_description FROM $this->table";
       $res = $this->query($query);
       $ret = array();
       foreach($res as $row)
	   {
    		$ret[$row[$this->table]['idsnj_scope_of_work']] = $row[$this->table]['snj_sow_description'];
   	   }
       return $ret;
	}
	
}


