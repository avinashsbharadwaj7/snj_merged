<?php

class Job extends AppModel {
    public $name = 'Job';
	public $hasMany = array('Task', 'Node', 'Resource');
    public $validate = array(
        
	   'Organization' => array(
			'rule' => array ('ddnotEmpty', 'Organization'),
			'message'=>'Enter organization'
		),
		
		'Work_Location' => array(
			'rule'=> array ('ddnotEmpty', 'Work_Location'),
			'message'=>'Enter a work location'
		),
		
		'customer' => array(
			'rule'=> array ('ddnotEmpty', 'customer'),
			'message'=>'Enter customer information'
		),
		
		'Technology'=> array(
			'rule'=> array ('ddnotEmpty', 'Technology'),
			'message'=>'Enter the technology'
		),
		
		'Region'=> array(
			'rule'=> array ('ddTextNotEmpty', 'Region'),
			'message'=>'Enter the region'
		),
		
		'Work_day_time' => array(
			'rule'=> array ('ddTextNotEmpty', 'Work_day_time'),
			'message'=>'enter the work day time information'
		),
		
		'Scope_of_work'=> array(
			'rule'=> array ('ddnotEmpty', 'Scope_of_work'),
			'message'=>'Enter scope of work'
		),
		
		'MOP Link'=> array(
			'rule'=> array ('ddnotEmpty', 'MOP Link'),
			'message'=>'Enter MOP link'
		),
		
		'mop_risk_level'=> array(
			'rule'=> array ('ddTextNotEmpty', 'mop_risk_level'),
			'message'=>'Enter the mop risk level for this task'
		),
		
		'NodeEntryType'=> array(
			'rule'=> array ('ddTextNotEmpty', 'NodeEntryType'),
			'message'=>'Enter the node entry type'
		),
		
		'mop_link' => array (
			'rule' => array ('ddNotEmpty', 'mop_link'),
			'message' => 'Enter the MOP link'
		),
		
		'Network_Number' => array('rule' => 'numeric', 'message' => 'Please supply numeric value for Network Number.'),
		
		'CCB_tckt_no' => array('rule' => 'numeric', 'message' => 'Please supply numeric value for CCB Ticket Number.'),
		
		'no_of_eng_needed' => array ('rule' => 'numeric', 'message' => 'Please supply numeric value for number of engeers')
    );
    
    static $sowMappings = null;
    static $orgMappings = null;
    static $mops        = null;
    
    function getPMEmail($jobId)
    {
        $query = "SELECT distinct email FROM jobs, users WHERE job_id = '".$jobId."' and jobs.signum = users.username";
		
		$res = $this->query ($query);
               
                $pmemail = $res[0]['users']['email'];
               return $pmemail;
    }
    
    function getLMEmail($jobId)
    {
        $query = "SELECT email FROM jobs, users WHERE job_id = '".$jobId."' and jobs.modifier_name = users.username";
		
		$res = $this->query ($query);
		print_r("res:".$res);
                if(!empty($res))
                	$lmemail = $res[0]['users']['email'];
                else
                        $lmemail = "";
		return $lmemail;
    }
    
     function getResourcesEmails($jobId)
    {
        $query = "SELECT email FROM resources,users WHERE job_id = '".$jobId."' and resources.user_signum = users.username";
		
		$res = $this->query ($query);
		
                $i=0;		
                $ids ="";
                foreach($res as $temp_ids):
                        $ids = $ids.";".$temp_ids['users']['email'];
                endforeach;
               
		return $ids;
    }
    
    
    function getMopRiskLevel ($jobId)
	{
		$query = "SELECT mop_risk_level FROM jobs WHERE job_id = '".$jobId."'";
		
		$res = $this->query ($query);
		
		$resMopRiskLevel = $res[0]['jobs']['mop_risk_level'];
		return $resMopRiskLevel;
	}
	
	//VALIDATION FUNCTION
	function ddnotEmpty ($check, $field)
	{
		//debug ($check);
		
		if ($check[$field] == 0)
		{
			return false;
		}
		
		else
		{
			return true;
		}
	}

	//VALIDATION FUNCTION WHEN DROPDOWN TEXT IS STORED
	function ddTextNotEmpty ($check, $field)
	{
	
		//debug ($this->data);
		
		if ($check[$field] == '--Select--')
		{
			return false;
		}
		
		else 
		{
			return true;
		}
	}
        
     function getEngineers ($jobId)
	{
		$query = "SELECT no_of_eng_needed FROM jobs WHERE job_id = '".$jobId."'";
		
		$res = $this->query ($query);
		
		$resEngg = $res[0]['jobs']['no_of_eng_needed'];
		return $resEngg;
	}

    function getTickets ($fieldMapping, $conditions=null, $taskConditions = null)
	{
	
		//$query = "DELETE FROM jobs WHERE rev_no = -2";		
		//$this->query($query);
		
		//$query = "DELETE FROM tasks WHERE rev_no = -2";
		//$this->query($query);
		
		//$query = "DELETE FROM nodes WHERE job_rev = 0";
		//$this->query($query);
		
		//$query = "DELETE FROM node_conflicts WHERE job_rev_no = -2";
		//$this->query ($query);
	
		if ($taskConditions != "")
		{
			$taskConditions = " WHERE job_id IN (SELECT job_id FROM tasks WHERE ".$taskConditions. ")";
		}
		
		ini_set('max_execution_time', '300');
		
		$query_getTickets = "SELECT * FROM jobs as Job, 
										(SELECT max(rev_no) as max_rev_no, job_id FROM jobs ".$taskConditions."GROUP BY job_id) maxresults 
										WHERE Job.job_id = maxresults.job_id AND Job.rev_no = maxresults.max_rev_no
										AND rev_no <> -2";
										
										
		//debug ($query_getTickets);
		
		if ($conditions != "")
		{
			$query_getTickets .= " AND ".$conditions;
		}
		
			
		
		//echo ($query_getTickets);
		//$query_getTickets .= ;
		$query_getTickets .= "GROUP BY Job.job_id ORDER BY Job.job_id DESC";
		//debug ($query_getTickets);
		$search_results = $this->query($query_getTickets);
		
		//print_r ($search_results);
		
		//$search_task_results = $this->Task->find('all', array ("recursive"=>1, 'conditions' => $conditions));
		//$search_results = $this->Resource->find('all', array("recursive"=>1 'conditions' => $conditions));
	    
	   	$aaData=array();
        $rowIndex=0;
        foreach ($search_results as $result)
        {
		
			$query = "SELECT * FROM tasks WHERE job_id = '".$result['Job']['job_id']."' AND rev_no = (SELECT max(rev_no) FROM tasks WHERE job_id = '".$result['Job']['job_id']."')";
			
			$search_results_task = $this->query($query);
			$search_results_resource = $this->query("SELECT * FROM resources WHERE job_id = '".$result['Job']['job_id']."' AND nullified <> 1 AND rev_no = 1");
			
			//echo $taskConditions;
			$result['Task'] = $search_results_task;
			$result['Resource'] = $search_results_resource;

			
			
			//print_r ($result['Task']);
			
            $entry = array();
            $entryIndex=0;
            foreach ($fieldMapping as $fields)
            {
				//print_r ($fields);
                if (null != $fields['column'])
                {
                    $entry[$entryIndex] = $result[$fields['table']][$fields['column']];
                }
                else
                {
                    $entry[$entryIndex] = $result[$fields['table']];
                }
                if (false !== $fields['translate'])
                {
                    $entry[$entryIndex] =  $this->translate($entry[$entryIndex], $fields, $result);
                }
                $entryIndex++;
            }
            $aaData[$rowIndex] = $entry;
            $rowIndex++;
        }
        return $aaData;
	}

    function getTicketsEngineer($fieldMapping, $conditions=null, $ldoSelfAssign=false)
	{
		$search_results = array();
	    $quer = "
			SELECT Resource.job_id, Resource.task_id,
			Task.start_date, Task.end_date, Task.start_time, Task.end_time, Task.ticket_status, Task.task_id,
			Job.Scope_of_work, Job.mop_link, 
			Job.Organization, Job.no_of_eng_needed, Job.job_id, Job.rev_no, Job.Signum 
			FROM
			resources as Resource, tasks as Task, jobs as Job, 
			(
								SELECT max(rev_no) as max_rev_no, job_id
								FROM jobs
								GROUP BY job_id
							) maxjobresults,
							(
								SELECT max(rev_no) as task_max_rev_no, job_id
								FROM tasks
								GROUP BY job_id
							) maxtaskresults
			WHERE ";
		if(!empty($conditions)){
			$quer .= $conditions." AND ";
		}
		$quer .="
			maxtaskresults.job_id = maxjobresults.job_id 
			AND Job.job_id = Task.job_id 
			AND Task.rev_no = maxtaskresults.task_max_rev_no 
			AND Task.rev_no <> -1
			AND Job.job_id  = maxjobresults.job_id 
			AND Job.rev_no  = maxjobresults.max_rev_no
			AND Job.rev_no <> -1
			AND Resource.task_id = Task.task_id
			AND Resource.job_id  = Task.job_id
			AND Resource.job_id  = Job.job_id
			AND Resource.rev_no != 0
			AND Resource.nullified != 1
               ";
	    //debug ($quer);
	    $search_results = $this->query($quer);
		// echo "Assigned to me = ".count($search_results)."\n";
		
		$queryLDOSelfAssign =		
			"SELECT
			Job.job_id, Job.rev_no,
			Task.task_id, Task.rev_no,
			Task.start_date, Task.end_date, Task.start_time, Task.end_time, Task.ticket_status,  Job.Scope_of_work, Job.mop_link,  Job.Organization, Job.no_of_eng_needed, Job.Signum  FROM  tasks as Task, jobs as Job, 
			(
				SELECT max(rev_no) as max_rev_no, job_id
				FROM jobs
				GROUP BY job_id
			) maxjobresults,
			(
				SELECT max(rev_no) as task_max_rev_no, job_id
				FROM tasks
				GROUP BY job_id
			) maxtaskresults

			WHERE
			maxtaskresults.job_id = maxjobresults.job_id 
			AND Job.job_id = Task.job_id 
			AND Task.rev_no = maxtaskresults.task_max_rev_no 
			AND Job.job_id  = maxjobresults.job_id 
			AND Job.rev_no  = maxjobresults.max_rev_no 
			AND Job.Organization  = '3'
			AND (( Task.ticket_status IS NULL) OR Task.ticket_status  NOT IN (1))";
		
		
		if ($ldoSelfAssign)
		{
			$search_results = array_merge($search_results, $this->query($queryLDOSelfAssign));
			//debug ($this->query($queryLDOSelfAssign));
		}
	    
	   	$aaData=array();
        $rowIndex=0;
        foreach ($search_results as $result)
        {
            $entry = array();
            $entryIndex=0;
            foreach ($fieldMapping as $fields)
            {
                if ((null == $fields['column']) && (null == $fields['column']))
                {
                    $entry[$entryIndex] = null;
                }
                else if (null != $fields['column'])
                {
                    $entry[$entryIndex] = $result[$fields['table']][$fields['column']];
                }
                else
                {
                    $entry[$entryIndex] = $result[$fields['table']];
                }
                if (false !== $fields['translate'])
                {
                    $entry[$entryIndex] =  $this->translate($entry[$entryIndex], $fields, $result);
                }
                $entryIndex++;
            }
            $aaData[$rowIndex] = $entry;
            $rowIndex++;
        }
        
        return $aaData;
	}

    function translate($what, $type, $row)
    {
        if( null == self::$orgMappings)
        {
            $obj = new Vieworganization();
            self::$orgMappings = $obj->getOrgMappings();
        }
        if( null == self::$sowMappings)
        {
            $obj = new Snjscopeofwork();
            self::$sowMappings = $obj->getSoWMappings();
        }
        if( null == self::$mops)
        {
            $obj = new Mop();
            self::$mops = $obj->getAllMops();
        }
        
        switch ($type['translate'])
        {
            case 'moplink':
                {
                    $mopLink = array_key_exists($what, self::$mops) ? self::$mops[$what]['mop_link'] : "No MOP";
                    $mopName = array_key_exists($what, self::$mops) ? self::$mops[$what]['mop_name'] : "";
                    return '<a href="'.$mopLink.'">'.$mopName.'</a>';
                }
                break;
                
            case 'detailimg':
                {
                    return '<img src="'.Router::url('/', true).'../img/details_open.png">';
                }
                break;
                
            case 'lm':
                {
                    return 'linemgr'; // TODO: This is not available in the DB yet.
                }
                break;
                
            case 'resourcestartdt':
                {
                    // $what ==> Task.start_date TODO: Should this be Resource.start_date ?
                    return $what . " " . $row['Task']['start_time'];
                }
                break;
                
            case 'resourceenddt':
                {
                    // $what ==> Task.start_date TODO: Should this be Resource.end_date ?
                    return $what . " " . $row['Task']['end_time'];
                }
                break;
                
            case 'nodes':
                {
                    return "Don't need here."; // TODO : Move this to expanded view ?
                }
                break;
                
            case 'taskstatus': // TODO : Rework this.
                {
                    switch ($what)
                    {
                        case 0:
                            {
                                return "New Job";
                            }
                        break;
                        case 1:
                            {
                                return "Started";
                            }
                        break;
                        case 2:
                            {
                                return "Partially Completed";
                            }
                        break;
                        case 3:
                            {
                                return "Completed";
                            }
                        break;
                        case 4:
                            {
                                return "Restarted";
                            }
                        break;
                        default:
                            {
                                return "UNKNOWN";
                            }
                        break;
                    }
                    return "Don't need here.";
                }
                break;
                
            case 'ticketviewlink':
                {
                    return '<a href="'.Router::url('/', true).'jobs/view/'.$what.'/'.$row['Task']['task_id'].'">'.$row["Job"]["job_id"].".".$row['Task']['task_id'] .'</a>';
                }
                break;
                
            case 'jobviewlink':
                {
                    return '<a href="'.Router::url('/', true).'jobs/view/'.$what.'">'.$what.'</a>';
                }
                break;
                
            case 'scopeofwork':
                {
                    return array_key_exists($what, self::$sowMappings) ? self::$sowMappings[$what] : $what;
                }
                break;
                
            case 'organization':
                {
                    return array_key_exists($what, self::$orgMappings) ? self::$orgMappings[$what] : $what;
                }
                break;
                
            case 'resourcesassigned':
                {
                    
					//debug ($row["Resource"]);
					
					$user_signums = array ();
					
					foreach ($row["Resource"] as $resource)
					{
						//Find Unique user signums
						if (!in_array($resource['resources']['user_signum'], $user_signums))
						{
							array_push($user_signums, $resource['resources']['user_signum']);
						}
					}
					$count = count($user_signums);
                    $ret = $count ? "Yes" : "No";
                    if (($count) &&($count != $what))
                    {
                        $ret .= " (".$count . " of " . $what . ")";
                        
                    }
                    return $ret;
                }
                break;
                
            case 'conflictstatus':
                {
                    $ret = 'No';
                    if (!empty ($row['Task'][0]))
                    {
                        foreach($row["Task"][0] as $task) 
                        {
                            if($task["ticket_conflict_status"]) 
                            {
                                $ret = "Yes";
                            }
                        }
                    }
                    return $ret;
                }
                break;
                
            case 'numchildtickets':
                {
                    $ret = "0";
                    if (!empty ($row['Task'][0]))
                    {
                        foreach($row["Task"][0] as $task) 
                        {
                            if($task["job_id"]) 
                            {
                                $ret = $task["job_id"];
                            }
                          
                        }
                    }
                    //return count($row["Task"])."-".$ret ;
                    //return '<a href="'.Router::url('/', true).'tasks/view/'.$ret.'">'.count($row["Task"]).'</a>';
                    return count($row["Task"]);
                }
                break;
                
            case 'action':
                   return '<a href="'.Router::url('/', true).'jobs/edit/'.$what.'">'.'Edit'.'</a>';
                   //return 'Edit';
                break;
            
        }
        return $what;
    }
	
	function getMaxTaskId($job_id)
	{
		$query = "SELECT max(task_id) FROM tasks WHERE job_id = ".$job_id;
		
		$res = $this->query($query);
		
		return $res[0][0]['max(task_id)'];
	}
	
	function cancel($jobId = null,$signum=null,$name=null)
	{
		if ($jobId != null)
		{
			$query = "UPDATE jobs SET rev_no = '-1',modifier_signum='$signum',modifier_name='$name',modification_timestamp='".date("Y-m-d H:i:s")."' WHERE job_id = '".$jobId."'";
			//debug($query);
			$res = $this->query ($query);
		}
	}
}
?>
