<?php
class Mop extends AppModel {
    public $name = 'Mop';
	public $primaryKey = 'mop_id';
	
	public function getMopNames($orgId = null)
	{
	    
	   $query = "SELECT mop_id, mop_name FROM $this->table";
	   if (null != $orgId)
	   {
	       $query .= " WHERE mop_or = ".$orgId;
	   }
       $res = $this->query($query);
       $ret = array();
       foreach($res as $row)
	   {
    			$ret[$row[$this->table]['mop_id']] =
    			    $row[$this->table]['mop_name'];
   		}
    	return $ret;
	}
	
	public function getAllMops()
	{
	    
	   $query = "SELECT mop_id, mop_name, mop_link FROM $this->table AS $this->name ";
       $res = $this->query($query);
       $ret = array();
       foreach($res as $row)
	   {
    			$ret[$row[$this->name]['mop_id']]['mop_name'] =
    			    $row[$this->name]['mop_name'];
    			$ret[$row[$this->name]['mop_id']]['mop_link'] =
    			    $row[$this->name]['mop_link'];
   		}
    	return $ret;
	}
	
	public function getMopNamesSow($sow = null)
	{
	    
	   $query = "SELECT mop_id, mop_name FROM $this->table";
	   if (null != $sow)
	   {
	       $query .= " WHERE scope_of_work = ".$sow;
	   }
       $res = $this->query($query);
       $ret = array();
       foreach($res as $row)
	   {
    			$ret[$row[$this->table]['mop_id']] =
    			    $row[$this->table]['mop_name'];
   		}
    	return $ret;
	}
	
}


