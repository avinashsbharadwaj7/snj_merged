<?php
class JobsController extends AppController {
    public $name = 'Jobs';
    public $helpers = array('Html', 'Form','Ajax','Javascript', 'DatePicker');
    public $components = array('Session','Email');
	public $uses = array( 'Job'
	                     ,'Task'
                         ,'Node'
                         ,'Dropdown'
                         ,'NodeConflict'
	                     ,'Snjscopeofwork'
	                     ,'Vieworganization'
	                     ,'Viewworklocation'
	                     ,'Viewcustomer'
	                     ,'Viewtechnology'
	                     ,'Viewregion'
	                     ,'Viewworkdaytime'
	                     ,'Viewrequesttype'
	                     ,'Mop'
	                     ,'Market'
						 ,'Resource'
						 ,'User'
						 ,'Groupid','DistributionList'
	                    );
	                    
    public function beforeFilter()
    {
        $this->set('pmgroupid', $this->Groupid->getGroupID(Groupid::PM_GROUP));
        $this->set('lmgroupid', $this->Groupid->getGroupID(Groupid::LM_GROUP));
        $this->set('enggroupid', $this->Groupid->getGroupID(Groupid::ENG_GROUP));
    }
    
    public function index() {
        $this->set('jobs', $this->Job->find('all'));
    }
	

	public function view($id = null, $rev_no = 0) 
	{
		$res = $this->Job->find('all', array ('conditions' => array ('job_id' => $id), 'order' => 'rev_no DESC'));
		
		if(!empty($rev_no)){
			$job = $this->Job->find('first', array ('conditions' => array ('job_id' => $id,'rev_no'=>$rev_no)));
		}else{
			$job['Job'] = $res[0]['Job'];
		}
		//debug ($job);
				
		$job['Job']['Organization'] = $this->Vieworganization->getOrgName($job['Job']['Organization'] );
		$job['Job']['Scope_of_work'] = $this->Snjscopeofwork->getSoWName($job['Job']['Scope_of_work']);
		
		$job['Job']['Work_Location'] = $this->Viewworklocation->getWorkLocationDescription($job['Job']['Work_Location']);
		$job['Job']['customer'] = $this->Viewcustomer->getCustomerName ($job['Job']['customer']);

		//Changing for node reparenting.
	
		$jobInformation = $this->Job->find('all', array('conditions' => array ('job_id' => $id)));
		$dateCreated = $jobInformation[0]['Job']['date_created'];
		$name = $jobInformation[0]['Job']['Name'];
		
		//Finding the job ids created during node reparenting
		$jobIdsCreated = $this->Job->find('all', array('conditions' => array ('date_created' => $dateCreated, 'Name' => $name, 'rev_no >' => 0)));
		
		
		
		//Get the created jobids and put it in an array
		
		$arrJobId = array();
		$count = 0;
		
		foreach ($jobIdsCreated as $element)
		{
			$arrJobId[$count] = $element['Job']['job_id'];
			$count++;
		}
		
		$this->set('arrJobId', $arrJobId);
		
		
		//$nodeData = $this->Node->query (""SELECT * FROM nodes as Node WHERE job_id = '".$id."' AND rev_no = (SELECT max(rev_no) FROM nodes WHERE job_id = '".$id."')");
		$data = $this->Job->query("SELECT * FROM tasks as Task WHERE job_id = '".$id."' AND rev_no = (SELECT max(rev_no) FROM tasks WHERE job_id = '".$id."')");
		$nodeData = $this->Node->find('all', array ('conditions' => array ('job_id' => $id)));
		
		$resourceData = $this->Resource->find('all', array('conditions' => array ('job_id' => $id, 'rev_no' => 1, 'nullified <>' => 1)));
		$this->Resource->query("delete from resources where job_id = '" .$id."' AND rev_no = 0");
				
	    $mopLinkRes = $this->Job->query("SELECT mop_link, mop_name FROM mops WHERE mops.mop_id = '".$job['Job']['mop_link']."'");
		if (sizeof($mopLinkRes) != 0)
		{
			$job['Job']['mop_link'] = $mopLinkRes[0]['mops']['mop_link'];
			$job['Job']['mop_name'] = $mopLinkRes[0]['mops']['mop_name'];
			$this->set("flag", 0);
		}
		
		else
		{
			$this->set("flag", 1);
		}
		
		$job['Job']['Technology'] = $this->Viewtechnology->getTechnologyDescription($job['Job']['Technology']);
				
		$this->set('job', $job );
		$this->set('jobs',$res);
		$this->set ('tasks', $data);
		$this->set ('nodes', $nodeData);
		$this->set ('resources', $resourceData);
		
    }
	
	
	private function __convertTime ($cakeTime)
	{
		if (!strcmp($cakeTime['meridian'],'am'))
		{
			$resTime = $cakeTime['hour'] + 12;
			
			
			if ($resTime == 24)
			{
				$resTime = '00:'.$cakeTime['min'].":00";
			}
			
			else 
			{
				$resTime = $resTime - 12;
				if ($resTime < 10)
				{
					$resTime = "0".$resTime.":".$cakeTime['min'].":00";
				}
				else
				{
					$resTime = $resTime.":".$cakeTime['min'].":00";
				}
			}
								
		}
		else if (!strcmp ($cakeTime['meridian'], 'pm'))
		{
		
			$resTime = $cakeTime['hour'];
			if ( $cakeTime['hour'] == 12)
			{
				$resTime = $cakeTime['hour'];
				//$resTime = $resTime + 12;
				$resTime = $resTime.":".$cakeTime['min'].":00";
			}
			
			else
			{
				$resTime = $resTime + 12;
				$resTime = $resTime.":".$cakeTime['min'].":00";
			}
		}
		
		else
		{				
			$resTime = $cakeTime['hour'].":".$cakeTime['min'].":00";
		}
		
		//debug ($resTime);
		//debug ($cakeTime);
		return $resTime;
	}
	
	private function __validate ()
	{
		$flag = false;
				
		date_default_timezone_set('America/Chicago');
		
		if ($this->data['Task']['start_date'] == '')
		{
			$this->Session->setFlash('ENTER START DATE');
			$flag = true;
		}
	
		if ($this->data['Task']['end_date'] == '')
		{
			$this->Session->setFlash('ENTER END DATE');
			$flag = true;
		}
		
		$start_time = $this->__convertTime ($this->data['Task']['start_time']);
		//debug ($this->data['Task']['start_time']);
		//debug ($start_time);
		
		if ($start_time == '::00')
		{
			$this->Session->setFlash('ENTER START TIME');
			$flag = true;
		}
		
		$end_time = $this->__convertTime ($this->data['Task']['end_time']);
		
		if ($end_time == '::00')
		{
			$this->Session->setFlash('ENTER END TIME');
			$flag = true;
		}
		
		$dateTime = $this->data['Task']['start_date'].' '.$start_time;
		//debug (date( 'Y-m-d H:i:s'));
		//debug ($dateTime);
		
		if ($dateTime < date( 'Y-m-d H:i:s'))
		{
			$this->Session->setFlash('Enter a start date and time which is later than todays date');
			$flag = true;
		}
		
		if ($this->data['Task']['start_date'] > $this->data['Task']['end_date'])
		{
			$this->Session->setFlash('Enter a end date which is greater than the start date');
			$flag = true;
		}
		
		if ($end_time < $start_time)
		{
			if ($this->data['Task']['end_date'] <= $this->data['Task']['start_date'])
			{
				$this->Session->setFlash('Enter an end time which is after the start time');
				$flag = true;
			}
		}

		if ($this->data['Node']['concerned_node'] == '')
		{
			$this->Session->setFlash('Enter a set of concerned nodes');
			$flag = true;					
		}
		
		return $flag;
	}

	public function _isResourceNullified($oldData = null, $newData = null)
	{
		//debug ($oldData);
		//debug ($newData);
		
		$newStartTime = $this->__convertTime($newData['start_time']);
		$newEndTime = $this->__convertTime($newData['end_time']);
		if ($oldData['start_date'] != $newData['start_date'])
		{
			return false;
		}
		
		else if ($oldData['end_date'] != $newData['end_date'])
		{
			return false;
		}
		
		else if ($oldData['start_time'] != $newStartTime)
		{
			return false;
		}
		
		else if ($oldData['end_time'] != $newEndTime)
		{
			return false;
		}
		
		else if ($oldData['no_of_engineers'] != $newData['no_of_engineers'])
		{
			return false;
		}
		
		else if ($oldData['mop_risk_level'] != $newData['mop_risk_level'])
		{
			return false;
		}
		
		else
		{
			return true;
		}
	}    
    
    public function add($id = null) 
	{
	
	    ini_set('error_log', '/tmp/snj.log');
		//$this->Job->query("DELETE FROM jobs WHERE rev_no = -2");
	    
	    $errorsFound = false;
		$msg = "";
	    
		$orgs = array("--Select--") + $this->Vieworganization->getOrgs();
		$this->set("orgs", $orgs);
		    
		$workLocations = array("--Select--") + $this->Viewworklocation->getWorkLocations();
		$this->set("workLocations", $workLocations);
		    
		$customers = array("--Select--") + $this->Viewcustomer->getCustomers();
		$this->set("customers", $customers);
		    
		$technologies = array("--Select--") + $this->Viewtechnology->getTechnologies();
		$this->set("technologies", $technologies);
		
		$regions = $this->Viewregion->getRegions();
		$this->set("regions", $regions);
		    
		$workDayTimes = $this->Viewworkdaytime->getWorkDayTimes();
		$this->set("workDayTimes", $workDayTimes);
		
		$requestTypes = array("--Select--") + $this->Viewrequesttype->getRequestTypes();
		$this->set("requestTypes", $requestTypes);
		    
		$markets = array("--Select--") + $this->Market->getMarkets();
		$this->set("markets", $markets);
		    
		$sows = array("--Select--") + $this->Snjscopeofwork->getSoooWs($this->data['Job']['Organization']);
		$this->set("sows", $sows);
		    
		$mopNames = array("--Select--") + $this->Mop->getMopNamesSow($this->data['Job']['Scope_of_work']);
		$this->set("mopNames", $mopNames);
		    
		$dropdown_values = $this->Dropdown->find('all',array('order'=>array('weight ASC','value'),'conditions'=>array('module_id'=>7)));
		$this->set('dropdown_values',$dropdown_values);
		
		
		//debug ($this->data);
		
		if (empty($this->data))
		{
		
			//$this->Job->query("DELETE FROM jobs WHERE rev_no = -2");
			//$this->Job->query("DELETE FROM tasks WHERE rev_no = -2");
			//$this->Job->query("DELETE FROM nodes WHERE job_rev = 0");
			//$this->Job->query("DELETE FROM node_conflicts WHERE job_rev_no = -2");
			
			
			if ($id != null)
			{
				
			
				$resJob = $this->Job->query("SELECT * FROM jobs as Job WHERE job_id = '".$id."' AND rev_no = (SELECT max(rev_no) FROM jobs WHERE job_id = '".$id."')");
				$resTask = $this->Task->query("SELECT * FROM tasks as Task WHERE job_id = '".$id."' AND rev_no = (SELECT max(rev_no) FROM tasks WHERE job_id = '".$id."')");
				$resNode = $this->Node->find('all', array ('conditions' => array ('job_id'=> $id)));
			
				if (sizeof($resTask) == 0)
				{					
					$resTask = array (array('Task' => ''));
				}
				
				if (sizeof($resNode) == 0)
				{
					$resNode = array(array ('Node' => ''));
				}
				
				//debug ($resTask);
				
				$arrData = array ('Job' => $resJob[sizeof($resJob)-1]['Job'], 'Task' => $resTask[0]['Task'], 'Node' => $resNode[0]['Node']);
				$this->data = $arrData;
				$this->data['Node']['concerned_node'] = "";
				
				
				foreach ($resTask as $task)
				{
					//debug($task['Task']['node_name']);
					//debug ($task);
					if ($task['Task'] != "")
					{
						$this->data['Node']['concerned_node'] .= $task['Task']['node_name']."\n";
					}
				}
				//debug ($this->data);
							
				$this->set('jobid', $id);
				return;
			}
		}
		
        if (!empty ($this->data)) 
		{
		    //debug ($this->data);
			
			if (isset($this->data['Job']['job_id']))
			{
				//Cancel Job.
				$this->Job->query("UPDATE jobs SET rev_no = '-2' WHERE job_id = '".$this->data['Job']['job_id']."'");
		
				//Cancel Task
				$this->Job->query("UPDATE tasks SET rev_no = '-2' WHERE job_id = '".$this->data['Job']['job_id']."'");
				
				//Cancel Node
				$this->Job->query("UPDATE nodes SET job_rev = '-2', task_rev = -2 WHERE job_id = '".$this->data['Job']['job_id']."'");
				
				//Cancle Resources
				$this->Job->query ("UPDATE resources SET nullified = 1 WHERE job_id = '".$this->data['Job']['job_id']."'"); 
			}
			
			//return;
			$res = $this->Job->find('first', array (
				'fields' => 'max(job_id)'
			));						
			$jobid = $res[0]['max(job_id)'];			
			$jobid++;
			
			$this->data['Job']['job_id'] = $jobid;
			
			$task_id = $this->Job->getMaxTaskId($jobid) + 1;
			$this->data['Job']['date_created'] = $mysqldate = date( 'Y-m-d H:i:s');
			$this->data['Job']['job_id'] = $jobid;
						
			$this->data['Task']['job_id'] = $jobid;
			$this->data['Task']['task_id'] = $task_id;
			$this->data['Task']['rev_no'] = -2;
			$this->data['Job']['rev_no'] = -2;
			
			$this->data['Task']['job_rev_no'] = -2;
			
			$this->data['Node']['job_rev'] = -2;
			$this->data['Node']['task_rev'] = -2;
			$draft = "";
			
			
			
			
			
			if (isset($this->params['form']['add/save']))
			{
				$draft = $this->params['form']['add/save'];
			}
			
			if($draft=='Save Draft'){
				//SAVE DRAFT
				
				$this->data['Job']['rev_no'] = 0;
				
				
				$parent_names = array ();
				$parent_type = array ();
				$tempConcernedNode = $this->data['Node']['concerned_node'];
				$node_names = $this->data['Node']['concerned_node'];
				//debug($node_names);
				$nodes = preg_split('@[\W]+@', $node_names, -1, PREG_SPLIT_NO_EMPTY);
				//debug($nodes);
				$nodes = array_unique ($nodes);
				$cid = 1;
				$tempParent = "";						
				
				//save draft job
				unset($this->Job->validate);
				if ($this->Job->save($this->data))
				{				  
					$errorsFound = false;
				}else{
					$this->Session->setFlash("Job Data cannot be saved");
					$errorsFound = true;
					return;
				}
				
				//save draft tasks
				foreach ($nodes as $node)
				{	
					$this->data['Task']['parallel_activity'] = $this->data['Job']['Parallely_Running_Activity'];
					$this->data['Task']['node_name'] = $node;
					$this->data['Node']['concerned_node'] = $node;
					$this->data['Node']['task_id'] = $task_id;
					$this->data['Task']['task_id'] = $task_id;
					//$this->data['Task']['ticket_conflict_status'] = 0;
					$count = 0;
					$parent_names[0] = $node;
					$parent_name = $parent_names[0];
					$nodeType = $this->Node->getNodeType($node);
					
					while (sizeof($parent_name)){	
						$size = sizeof($parent_name);
						$query = "SELECT name, type FROM target WHERE id = (SELECT parent_id FROM target_parent WHERE node_id = (SELECT id FROM target WHERE name = '". $parent_names[$count]. "'))";
						
						$parent_name = $this->Job->query($query);	
						//debug ($parent_name);
						//return;
						
						if (sizeof($parent_name) != 0 )
						{
							if ($count == 1)
							{
								//$this->Session->setFlash('IN HERE');
								$count++;
								$parent_names[$count] = $parent_name[0]['target']['name'];
								$parent_type [$count] = $parent_name[0]['target']['type'];
								$tempcount = $count - 1;
								$this->Node->query ("INSERT INTO nodes (job_rev, task_rev, job_id, task_id, concerned_node, target_node, adjacent_nodes, node_type) VALUES ('0', '1', '".$jobid."', '".$task_id."', '".$parent_name[0]['target']['name']."', '".$this->data['Node']['target_node'.$tempcount]."', '".$this->data['Node']['adjacent_nodes'.$tempcount]."', '" .$parent_name [0]['target']['type']. "')");
							}else{
								$count++;
								$parent_names[$count] = $parent_name[0]['target']['name'];
								$this->Node->query ("INSERT INTO nodes (job_rev, task_rev, job_id, task_id, concerned_node, target_node, adjacent_nodes, node_type) VALUES ('0', '1', '".$jobid."', '".$task_id."', '".$parent_name[0]['target']['name']."', '".$this->data['Node']['target_node']."', '".$this->data['Node']['adjacent_nodes']."', '" .$parent_name [0]['target']['type']. "')");
							}
						}							
					}
					$this->Job->query ("INSERT INTO nodes (job_rev, task_rev, job_id, task_id, concerned_node, node_type) VALUES ('0', '1', '".$jobid."', '".$task_id."', '".$node."', '" . $nodeType. "')");
					unset($this->Task->validate);
					$this->Task->create();
					if ($this->Task->save($this->data))
					{
						$task_id++;
					}
					$tempParent = $parent_names[1];
				}
				
				
				//send e-mail
				$data = $this->data;
				$task = $this->Task->find('all',array('conditions'=>array('job_id'=>$data['Job']['job_id'])));
				$node = $this->Node->find('all',array('conditions'=>array('job_id'=>$data['Job']['job_id'])));
				$resource = $this->Resource->find('all',array('conditions'=>array('job_id'=>$data['Job']['job_id'])));
				
				$merge = array();
				
				$merge['Job'] = $data['Job'];
				$merge['Task']= $task;
				$merge['Node']= $node;
				$merge['Resource']=$resource;
				
				$merge['Job']['Organization'] = $this->Vieworganization->getOrgName($data['Job']['Organization'] );
				$merge['Job']['Scope_of_work'] = $this->Snjscopeofwork->getSoWName($data['Job']['Scope_of_work']);
				$merge['Job']['Work_Location'] = $this->Viewworklocation->getWorkLocationDescription($data['Job']['Work_Location']);
				$merge['Job']['customer'] = $this->Viewcustomer->getCustomerName ($data['Job']['customer']);
				$mop = $this->Mop->findByMopId($data['Job']['mop_link']);
				$merge['Job']['mop_name'] = $mop['Mop']['mop_name'];
							
				$start = $data['Task']['start_date']." ".$data['Task']['start_time']['hour'].":".$data['Task']['start_time']['min']." ".$data['Task']['start_time']['meridian'];
                				
				$this->sendEmailSNJ($merge, '', 'D');
				$this->redirect(array('controller'=>'jobs','action'=>'mytickets'));
				
			}
			
			else
			{
			
				//debug ("IN HERE");
				
				//ADD TICKET (NO DRAFT)
				if ($this->__validate())
				{
					return;
				}
				
				$parent_names = array ();
				$parent_type = array ();
				
				$tempConcernedNode = $this->data['Node']['concerned_node'];
				$node_names = $this->data['Node']['concerned_node'];
				//debug($node_names);
				
				$nodes = preg_split('@[\W]+@', $node_names, -1, PREG_SPLIT_NO_EMPTY);
				//debug($nodes);
				
				$nodes = array_unique ($nodes);
				
				$cid = 1;
				
				$tempParent = "";
			
				if ($this->Job->save($this->data))
				{				  
					$errorsFound = false;
				}
			
			
				else
				{
					//debug ($tempConcernedNode);
					$this->data['Job']['concerned_node'] = $tempConcernedNode;
					$this->Session->setFlash("Job Data cannot be saved");
					$errorsFound = true;
					return;
				}
			
			
				foreach ($nodes as $node)
				{	
					//debug ($node);
					$this->data['Task']['parallel_activity'] = $this->data['Job']['Parallely_Running_Activity'];
					$this->data['Task']['node_name'] = $node;
					$this->data['Node']['concerned_node'] = $node;
					$this->data['Node']['task_id'] = $task_id;
					$this->data['Task']['task_id'] = $task_id;
					
					$count = 0;
					$parent_names[0] = $node;
					
					$parent_name = $parent_names[0];
					
					$nodeType = $this->Node->getNodeType($node);					
										
														
					if ("" == $nodeType && $this->data['Job']['Scope_of_work'] != 50 && $this->data['Job']['Scope_of_work'] != 51)
					{
							$msg = $msg.$node.", ";
		
							$msg = "INVALID NODE: ".$node;
							$errorsFound = true;
							$this->data['Node']['concerned_node'] = $node_names;
							break;
					}
					
					
					else
					{
						while (sizeof($parent_name))
						{	
							$size = sizeof($parent_name);
							$query = "SELECT name, type FROM target WHERE id = (SELECT parent_id FROM target_parent WHERE node_id = (SELECT id FROM target WHERE name = '". $parent_names[$count]. "'))";
							
							$parent_name = $this->Job->query($query);	
							//debug ($parent_name);
							//return;
							
							if (sizeof($parent_name) != 0 )
							{
								if ($count == 1)
								{
									//$this->Session->setFlash('IN HERE');
									$count++;
									$parent_names[$count] = $parent_name[0]['target']['name'];
									$parent_type [$count] = $parent_name[0]['target']['type'];
									
									
									if ($this->data['Job']['node_Reparenting'] == true)
									{
										//debug($parent_names);
										//debug($jobid);
										//debug($task_id);
										//debug ($parent_name[0]['target']['name']);
										//debug ($parent_names[1]);
										if ($parent_names[1] != $tempParent && $tempParent != "")
										{
											//debug($jobid);
											
											//debug ($tempParent);
											//return;
											
											$task_id = 1;
											
											//debug($task_id);
											//$jobid++;
											$this->data['Task']['job_id'] = $jobid;
											$this->data['Job']['job_id'] = $jobid;
											$this->data['Task']['task_id'] = $task_id;
											//$this->Job->create();
											//$this->Job->save($this->data);
											$msg = "PARENT NODE INFORMATION MISMATCH";
											$nodeMismatch = true;
											$errorsFound = false;	
										}						
									}
									
									//debug ($count);
									//debug($parent_names[1]);
									//debug($jobid);
									//debug($task_id);
									
									$tempcount = $count - 1;

									$this->Node->query ("INSERT INTO nodes (job_rev, task_rev, job_id, task_id, concerned_node, target_node, adjacent_nodes, node_type) VALUES ('0', '1', '".$jobid."', '".$task_id."', '".$parent_name[0]['target']['name']."', '".$this->data['Node']['target_node'.$tempcount]."', '".$this->data['Node']['adjacent_nodes'.$tempcount]."', '" .$parent_name [0]['target']['type']. "')");
	
								}
								
								else
								{
									$count++;
									$parent_names[$count] = $parent_name[0]['target']['name'];
									
									if ($this->data['Job']['node_Reparenting'] == true)
									{
										//debug($parent_names);
										//debug($jobid);
										//debug($task_id);
										//debug ($parent_name[0]['target']['name']);
										//debug ($parent_names[1]);
										if ($parent_names[1] != $tempParent && $tempParent != "")
										{
											//debug($jobid);
											
											//debug ($tempParent);
											//return;
											
											$task_id = 1;
											
											//debug($task_id);
											$jobid++;
											$this->data['Task']['job_id'] = $jobid;
											$this->data['Job']['job_id'] = $jobid;
											$this->data['Task']['task_id'] = $task_id;
											$this->Job->create();
											$this->Job->save($this->data);
											
											//EMAIL FOR NODE REPARENTING
											
											//Start Eddie
											$data = $this->data;
											$task = $this->Task->find('all',array('conditions'=>array('job_id'=>$data['Job']['job_id'])));
											$node_email = $this->Node->find('all',array('conditions'=>array('job_id'=>$data['Job']['job_id'])));
											$resource = $this->Resource->find('all',array('conditions'=>array('job_id'=>$data['Job']['job_id'])));
											
											$merge = array();
											
											$merge['Job'] = $data['Job'];
											$merge['Task']= $task;
											$merge['Node']= $node_email;
											$merge['Resource']=$resource;
											
											$merge['Job']['Organization'] = $this->Vieworganization->getOrgName($data['Job']['Organization'] );
											$merge['Job']['Scope_of_work'] = $this->Snjscopeofwork->getSoWName($data['Job']['Scope_of_work']);
											$merge['Job']['Work_Location'] = $this->Viewworklocation->getWorkLocationDescription($data['Job']['Work_Location']);
											$merge['Job']['customer'] = $this->Viewcustomer->getCustomerName ($data['Job']['customer']);
											$mop = $this->Mop->findByMopId($data['Job']['mop_link']);
											$merge['Job']['mop_name'] = $mop['Mop']['mop_name'];
														
											$start = $data['Task']['start_date']." ".$data['Task']['start_time']['hour'].":".$data['Task']['start_time']['min']." ".$data['Task']['start_time']['meridian'];
											
											//Generate dirty list name dynamically
											$dl = "SNJ";
											$dl .= "_".$merge['Job']['Organization'];
											$dl .= "_".$merge['Job']['customer'];
											$dl .= "_".$merge['Job']['Work_Location'];
								
											$dl = preg_replace("/[^a-zA-Z 0-9 _]+/","", $dl);
											$dl = str_replace(" ", "", $dl);
											$dl = strtoupper($dl);
											
											if( (strtotime($start) - time()) <= 28000){
												$dl .= ';snj_8hours';
											}
											
											//debug ("IN HERE");
											
											//$this->sendEmailSNJ($merge, $dl, 'A');
											
											$msg = "PARENT NODE INFORMATION MISMATCH";
											$nodeMismatch = true;
											$errorsFound = false;	
										}						
									}
									
									//$tempParent = $parent_names[1];	
									//debug($jobid);
									//debug($task_id);
									$this->Node->query ("INSERT INTO nodes (job_rev, task_rev, job_id, task_id, concerned_node, target_node, adjacent_nodes, node_type) VALUES ('0', '1', '".$jobid."', '".$task_id."', '".$parent_name[0]['target']['name']."', '".$this->data['Node']['target_node']."', '".$this->data['Node']['adjacent_nodes']."', '" .$parent_name [0]['target']['type']. "')");
									
								}
							}
						
							else 
							{								
								//debug ($query);
								$msg = "PARENT FOR ".$node." NOT FOUND";
								$errorsFound = true;
								
								if ($this->data['Job']['Scope_of_work'] == 50 || $this->data['Job']['Scope_of_work'] == 51)
								{
									$errorsFound = false;
								}
								
								else if ($parent_type[$count] == "RNC" || $parent_type[$count] == "OSS")
								{
									$errorsFound = false;
								}
								
								
							}
							
								
						}
						
						if ($errorsFound == false)
						{
							//debug ($node);
							$this->Job->query ("INSERT INTO nodes (job_rev, task_rev, job_id, task_id, concerned_node, node_type) VALUES ('0', '1', '".$jobid."', '".$task_id."', '".$node."', '" . $nodeType. "')");
							
							//debug($task_id);
							//debug($jobid);
							$this->Task->create();
							if ($this->Task->save($this->data))
							{
								$task_id++;
							}
						}
						
									
						else
						{
							$this->data['Job']['concerned_node'] = $tempConcernedNode;
							$this->Session->setFlash($msg);
							$errorsFound = true;
							break;
						}
						
						//debug($tempParent);
						//$errorsFound = true;					
						
					}
					
					//debug ($parent_names);
					
					if (sizeof($parent_names) > 1)
					{
						$tempParent = $parent_names[1];
					}
				}

				if ($errorsFound == true)
				{
					$this->data['Job']['concerned_node'] = $tempConcernedNode;
					$this->Session->setFlash($msg);
					$errorsFound = true;
				}
			
				else
				{
					//Start Eddie
					$data = $this->data;
					$task = $this->Task->find('all',array('conditions'=>array('job_id'=>$data['Job']['job_id'])));
					$node = $this->Node->find('all',array('conditions'=>array('job_id'=>$data['Job']['job_id'])));
					$resource = $this->Resource->find('all',array('conditions'=>array('job_id'=>$data['Job']['job_id'])));
					
					$merge = array();
					
					$merge['Job'] = $data['Job'];
					$merge['Task']= $task;
					$merge['Node']= $node;
					$merge['Resource']=$resource;
					
					$merge['Job']['Organization'] = $this->Vieworganization->getOrgName($data['Job']['Organization'] );
					$merge['Job']['Scope_of_work'] = $this->Snjscopeofwork->getSoWName($data['Job']['Scope_of_work']);
					$merge['Job']['Work_Location'] = $this->Viewworklocation->getWorkLocationDescription($data['Job']['Work_Location']);
					$merge['Job']['customer'] = $this->Viewcustomer->getCustomerName ($data['Job']['customer']);
					$mop = $this->Mop->findByMopId($data['Job']['mop_link']);
					$merge['Job']['mop_name'] = $mop['Mop']['mop_name'];
								
					$start = $data['Task']['start_date']." ".$data['Task']['start_time']['hour'].":".$data['Task']['start_time']['min']." ".$data['Task']['start_time']['meridian'];
	                
			        //Generate dirty list name dynamically
					$dl = "SNJ";
					$dl .= "_".$merge['Job']['Organization'];
					$dl .= "_".$merge['Job']['customer'];
					$dl .= "_".$merge['Job']['Work_Location'];
		
					$dl = preg_replace("/[^a-zA-Z 0-9 _]+/","", $dl);
					$dl = str_replace(" ", "", $dl);
					$dl = strtoupper($dl);
	       			
	               	if( (strtotime($start) - time()) <= 28000){
			        	$dl .= ';snj_8hours';
			        }
					
					$this->sendEmailSNJ($merge, $dl, 'A');
					$this->redirect('/jobs/crp/'.$jobid);
					
				}
                        
				if($errorsFound == true)
				{
					//set organization
					$this->set('JobOrganization', $this->data['Job']['Organization']);
					//JobTechnology
					$this->set('JobTechnology', $this->data['Job']['Technology']);
					//scope_of_work
					$this->set('scope_of_work', $this->data['Job']['Scope_of_work']);
				}
        	}
        }
		
    }
	
	function edit($id = null) 
	{
		ini_set('error_log', '/tmp/snj.log');
	    
		$concernedNodes = "";
                $errorsFound = false;
	    
		$orgs = array("--Select--") + $this->Vieworganization->getOrgs();
		$this->set("orgs", $orgs);
		    
		$workLocations = array("--Select--") + $this->Viewworklocation->getWorkLocations();
		$this->set("workLocations", $workLocations);
		    
		$customers = array("--Select--") + $this->Viewcustomer->getCustomers();
		$this->set("customers", $customers);
		    
		$technologies = array("--Select--") + $this->Viewtechnology->getTechnologies();
		$this->set("technologies", $technologies);
		
		$regions = $this->Viewregion->getRegions();
		$this->set("regions", $regions);
		    
		$workDayTimes=$this->Viewworkdaytime->getWorkDayTimes();
		$this->set("workDayTimes", $workDayTimes);
		
		$requestTypes = array("--Select--") + $this->Viewrequesttype->getRequestTypes();
		$this->set("requestTypes", $requestTypes);
		    
		$markets = array("--Select--") + $this->Market->getMarkets();
		$this->set("markets", $markets);
		    
		$sows = array("--Select--") + $this->Snjscopeofwork->getSoooWs();
		$this->set("sows", $sows);
		    
		$mopNames = array("--Select--") + $this->Mop->getMopNames();
		$this->set("mopNames", $mopNames);
		    
		$dropdown_values = $this->Dropdown->find('all',array('order'=>array('weight ASC','value'),'conditions'=>array('module_id'=>7)));
		$this->set('dropdown_values',$dropdown_values);
		
		//debug ($this->data);
		if (empty($this->data))		
		{
			$resJob = $this->Job->query("SELECT * FROM jobs as Job WHERE job_id = '".$id."' AND rev_no = (SELECT max(rev_no) FROM jobs WHERE job_id = '".$id."')");
			$resTask = $this->Task->query("SELECT * FROM tasks as Task WHERE job_id = '".$id."' AND rev_no = (SELECT max(rev_no) FROM tasks WHERE job_id = '".$id."')");
			$resNode = $this->Node->find('all', array ('conditions' => array ('job_id'=> $id)));
            //debug ($resNode);
            //debug($resJob);
            if($resJob[0]['Job']['rev_no']=='-1'){
            	$this->Session->setFlash('Cannot edit a job that has been cancelled.');
            	$this->redirect(array ('controller' => 'Jobs', 'action' => 'view',$id));
            	exit;
            }       

			if ($resJob[0]['Job']['rev_no'] == 0)
			{
				$this->redirect('/jobs/add/'.$id);
			}
                        
			$this->set('mstart_time',$resTask[0]['Task']['maintenance_window_start_time']);
			$this->set('mend_time',$resTask[0]['Task']['maintenance_window_end_time']);
			$this->set('mstart_date',$resTask[0]['Task']['maintenance_window_start_date']);
			$this->set('mend_date',$resTask[0]['Task']['maintenance_window_end_date']);
			
			//debug ($resTask);
			
			array_shift($resJob[sizeof($resJob) - 1]['Job']);
			$this->data['Job'] = $resJob[sizeof($resJob) - 1]['Job'];
			
			array_shift ($resTask[sizeof($resTask) - 1 ]['Task']);

			$this->data['Task']= $resTask[sizeof($resTask) - 1]['Task'];
			$this->data['Node'] = $resNode;;
			$concerendNode = "";
			//debug ($resTask);
			foreach ($resTask as $task)
			{
				$concerendNode = $concerendNode."\n".$task['Task']['node_name'];
			}
			
			$this->set('concernedNodes', $concerendNode);
			//debug ($this->data);
			
            $this->set('Organization',$this->data['Job']['Organization']);
			$res_mop_name = $this->Job->query ("SELECT mop_name FROM mops as Mop WHERE mop_id = '".$this->data['Job']['mop_link']."'");
			//debug ($res_mop_name);
			$mop_name = $res_mop_name[0]['Mop']['mop_name'];
			
			
            $this->set('mop_link_id',$mop_name);

		} 
		
		else 
		{
			//debug ($this->data);
			if ($this->__validate())
			{
				$this->redirect(array ('controller' => 'jobs', 'action' => 'edit', $this->data['Job']['job_id']));
			}
			
			$resJob = $this->Job->query("SELECT * FROM jobs as Job WHERE job_id = '".$this->data['Job']['job_id']."' AND rev_no = (SELECT max(rev_no) FROM jobs WHERE job_id = '".$this->data['Job']['job_id']."')");
			//debug($resJob);
			
			$resTask = $this->Task->query("SELECT * FROM tasks as Task WHERE job_id = '".$this->data['Job']['job_id']."' AND rev_no = (SELECT max(rev_no) FROM tasks WHERE job_id = '".$this->data['Job']['job_id']."')");
			//debug ($resTask);
			
			$oldData['no_of_engineers'] = $resJob[0]['Job']['no_of_eng_needed'];
			$oldData['start_date'] = $resTask[0]['Task']['start_date'];
			$oldData['end_date'] = $resTask[0]['Task']['end_date'];
			$oldData['start_time'] = $resTask[0]['Task']['start_time'];
			$oldData['end_time'] = $resTask[0]['Task']['end_time'];
			$oldData['mop_risk_level'] = $resJob[0]['Job']['mop_risk_level'];
			
			$newData['no_of_engineers'] = $this->data['Job']['no_of_eng_needed'];
			$newData['start_date'] = $this->data['Task']['start_date'];
			$newData['end_date'] = $this->data['Task']['end_date'];
			$newData['start_time'] = $this->data['Task']['start_time'];
			$newData['end_time'] = $this->data['Task']['end_time'];
			$newData['mop_risk_level'] = $this->data['Job']['mop_risk_level'];
			
			
			//Function to check if any of the resource nullification fields have changed.
			if (!($this->_isResourceNullified($oldData, $newData)))
			{
				//debug ("IN HERE");
				$this->Job->query ("UPDATE resources SET nullified = 1 WHERE job_id = '".$this->data['Job']['job_id']."'"); 
			}
			//debug ($this->data);
			
			$nodes = explode ("\n", $this->data['Node']['concerned_node']);
			$this->data['Job']['modification_timestamp'] = $mysqldate = date( 'Y-m-d H:i:s');
			$this->data['Task']['modifier_timestamp'] = $mysqldate = date( 'Y-m-d H:i:s');
			
			//debug ($this->data);
			
			$rev_no = $this->data['Job']['rev_no'];
			
			$this->data['Job']['rev_no'] = $rev_no + 1;

			//debug ($this->Job->id);
			$this->Job->create();
			if($this->Job->save($this->data)) 
			{
				$countTasks = $this->Task->getCountTasks($this->data['Job']['job_id']);
				$count = 1;
				
				//debug ($countTasks);
				while ($count <= $countTasks)
				{
					//debug ("IN HERE");
				
					$this->data['Task']['rev_no'] = $rev_no + 1;
					$this->data['Task']['task_id'] = $count;
					$this->data['Task']['job_id'] = $this->data['Job']['job_id'];
					$this->data['Task']['node_name'] = $nodes[$count - 1];
					
					//debug ($this->data['Task']);
										
					$this->Task->create();
					if (!($this->Task->save($this->data)))
					{
						//debug ("IN TASK HERE");
						$this->Session->setFlash('Your post can not be updated');
						break;
					}
					$count ++;
				}
				
				$this->Session->setFlash('Your post has been updated.');
			} 
			
			else 
			{
				$this->Session->setFlash('Unable to update your post.');
			}
			
            $this->set('Organization',$this->data['Job']['Organization']);
            $this->set('mop_link_id',$this->data['Job']['mop_link']);
            
            //Start Eddie
			$data = $this->data;
			$task = $this->Task->find('all',array('conditions'=>array('job_id'=>$data['Job']['job_id'])));
			$node = $this->Node->find('all',array('conditions'=>array('job_id'=>$data['Job']['job_id'])));
			$resource = $this->Resource->find('all',array('conditions'=>array('job_id'=>$data['Job']['job_id'])));
			
			$merge = array();
			
			$merge['Job'] = $data['Job'];
			$merge['Task']= $task;
			$merge['Node']= $node;
			$merge['Resource']=$resource;
			
			$merge['Job']['Organization'] = $this->Vieworganization->getOrgName($data['Job']['Organization'] );
			$merge['Job']['Scope_of_work'] = $this->Snjscopeofwork->getSoWName($data['Job']['Scope_of_work']);
			$merge['Job']['Work_Location'] = $this->Viewworklocation->getWorkLocationDescription($data['Job']['Work_Location']);
			$merge['Job']['customer'] = $this->Viewcustomer->getCustomerName ($data['Job']['customer']);
			$mop = $this->Mop->findByMopId($data['Job']['mop_link']);
			$merge['Job']['mop_name'] = $mop['Mop']['mop_name'];
			
			//Generate dirty list name dynamically
			$dl = "SNJ";
			$dl .= "_".$merge['Job']['Organization'];
			$dl .= "_".$merge['Job']['customer'];
			$dl .= "_".$merge['Job']['Work_Location'];

			$dl = preg_replace("/[^a-zA-Z 0-9 _]+/","", $dl);
			$dl = str_replace(" ", "", $dl);
			$dl = strtoupper($dl);
			
			//$this->sendEmailSNJ($merge, $dl, 'E');
			//End Eddie
            
			$this->redirect(array ('controller' => 'Jobs', 'action' => 'mytickets'));
		}	
	}
	
	function search ()
	{    
		$orgs = array("--Select--") + $this->Vieworganization->getOrgs();
		$this->set("orgs", $orgs);
		    
		$workLocations = array("--Select--") + $this->Viewworklocation->getWorkLocations();
		$this->set("workLocations", $workLocations);
		    
		$customers = array("--Select--") + $this->Viewcustomer->getCustomers();
		$this->set("customers", $customers);
		    
		$technologies = array("--Select--") + $this->Viewtechnology->getTechnologies();
		$this->set("technologies", $technologies);
		
		$regions = $this->Viewregion->getRegions();
		$this->set("regions", $regions);
		    
		$workDayTimes = $this->Viewworkdaytime->getWorkDayTimes();
		$this->set("workDayTimes", $workDayTimes);
		
		$requestTypes = array("--Select--") + $this->Viewrequesttype->getRequestTypes();
		$this->set("requestTypes", $requestTypes);
		    
		$markets = array("--Select--") + $this->Market->getMarkets();
		$this->set("markets", $markets);
		    
		$sows = array("--Select--") + $this->Snjscopeofwork->getSoooWs();
		$this->set("sows", $sows);
		    
		$mopNames = array("--Select--") + $this->Mop->getMopNames();
		$this->set("mopNames", $mopNames);
		    
		$dropdown_values = $this->Dropdown->find('all',array('order'=>array('weight ASC','value'),'conditions'=>array('module_id'=>7)));
		$this->set('dropdown_values',$dropdown_values);
		
        $groupId = Authsome::get ('user_group_id');        
            
		if (!empty ($this->data))
		{				
			//debug ($this->data);
			$conditions = array();
			$taskConditions = "";
			
			if ($this->data['Job']['job_id'] != "")
			{
				$conditions[] = "Job.job_id = '".$this->data['Job']['job_id']."'";
			}
			
			if ($this->data['Job']['Signum'] != "")
			{
				$conditions[]= "signum = '".$this->data['Job']['Signum']."'";
			}
			
			if ($this->data['Job']['Name'] != "")
			{
				$conditions[]="Name = '".$this->data['Job']['Name']."'";
			}
			
			if ($this->data['Job']['Organization'] != 0)
			{
			    $conditions[]="Organization = '".$this->data['Job']['Organization']."'";
			}
			
			if ($this->data['Job']['customer'] != 0)
			{
			    $conditions[]="customer = '".$this->data['Job']['customer']."'";
			}
			
			if ($this->data['Job']['Region'] != "--Select--")
			{
			    $conditions[] = "Region = '".$this->data['Job']['Region']."'";
			}
			
			if ($this->data['Job']['Work_Location'] != 0)
			{
			   $conditions[]= "Work_Location = '".$this->data ['Job']['Work_Location']."'";
			}
			
			if ($this->data['Job']['Network_Number'] != "")
			{
			   $conditions[]="Network_Number = '".$this->data ['Job']['Network_Number']."'";
			}
			
			if ($this->data['Job']['Technology'] != 0)
			{
			   $conditions[] = "Technology = '".$this->data ['Job']['Technology']."'";
			}
			
			if ($this->data['Job']['Market'] != 0)
			{
				$conditions[] = "Market = '".$this->data['Job']['Market']."'";
			}
			
			if ($this->data['Job']['scope_of_work'] != 0)
			{
				$conditions[] = "Scope_of_work = '".$this->data['Job']['scope_of_work']."'";
			}
			
			if ($this->data['Job']['Work_day_time'] != "--Select--")
			{
				$conditions[] = "Work_day_time = '".$this->data['Job']['Work_day_time']."'";
			}
			
			if ( $this->data['Job']['Creation Date/Time'] == 1)
			{
				if ($this->data['Job']['Search Type'] ==  "daterange")
				{
					$conditions [] = "Job.date_created >= '" . $this->data['Job']['date_start'] . " 00:00:00' AND Job.date_created <= '" . $this->data['Job']['date_end'] . " 00:00:00'";
				}
				
				if  ($this->data['Job']['Search Type'] ==  "quarter")
				{
					if ($this->data['Job']['Quarter'] ==  1)
					{
						$conditions [] = "Job.date_created BETWEEN '2012-01-01 00:00:00' AND '2012-04-01 00:00:00'";
					}
					
					if ($this->data['Job']['Quarter'] ==  2)
					{
						$conditions [] = "Job.date_created BETWEEN '2012-04-01 00:00:00' AND '2012-07-01 00:00:00'";
					}
					
					if ($this->data['Job']['Quarter'] ==  3)
					{
						$conditions [] = "Job.date_created BETWEEN '2012-08-01 00:00:00' AND '2012-10-01 00:00:00'";
					}
					
					if ($this->data['Job']['Quarter'] ==  4)
					{
						$conditions [] = "Job.date_created BETWEEN '2012-10-01 00:00:00' AND '2013-01-01 00:00:00'";
					}
				}	
				
				if ($this->data['Job']['Search Type'] ==  "year")
				{
					if ($this->data['Job']['Year'] == 2009)
					{
						$conditions [] = "Job.date_created BETWEEN '2009-01-01 00:00:00' AND '2010-01-01 00:00:00'";
					}
					
					if ($this->data['Job']['Year'] == 2010)
					{
						$conditions [] = "AND Job.date_created BETWEEN '2010-01-01 00:00:00' AND '2011-01-01 00:00:00'";
					}
					
					if ($this->data['Job']['Year'] == 2011)
					{
						$conditions [] = "Job.date_created BETWEEN '2011-01-01 00:00:00' AND '2012-01-01 00:00:00'";
					}
					
					if ($this->data['Job']['Year'] == 2012)
					{
						$conditions [] = "Job.date_created BETWEEN '2012-01-01 00:00:00' AND '2013-01-01 00:00:00'";
					}
				}
			}
			
			if ($this->data['Job']['Job Start Date/Time'] == 1)
			{
				if ($this->data['Job']['Search Type'] ==  "daterange")
				{
					$taskConditions = "  start_date BETWEEN '" . $this->data['Job']['date_start'] ."' AND '". $this->data['Job']['date_end'] . "'";
				}
				
				
				if  ($this->data['Job']['Search Type'] ==  "quarter")
				{
					if ($this->data['Job']['Quarter'] ==  1)
					{
						$taskConditions = " date_created BETWEEN '2012-01-01 00:00:00' AND '2012-04-01 00:00:00'";
					}
					
					if ($this->data['Job']['Quarter'] ==  2)
					{
						$taskConditions = "  date_created BETWEEN '2012-04-01 00:00:00' AND '2012-07-01 00:00:00'";
					}
					
					if ($this->data['Job']['Quarter'] ==  3)
					{
						$taskConditions = "   date_created BETWEEN '2012-08-01 00:00:00' AND '2012-10-01 00:00:00'";
					}
					
					if ($this->data['Job']['Quarter'] ==  4)
					{
						$taskConditions = "   date_created BETWEEN '2012-10-01 00:00:00' AND '2013-01-01 00:00:00'";
					}
				}
				
				if ($this->data['Job']['Search Type'] ==  "year")
				{
					if ($this->data['Job']['Year'] == 2009)
					{
						$taskConditions = "  date_created BETWEEN '2009-01-01 00:00:00' AND '2010-01-01 00:00:00'";
					}
					
					if ($this->data['Job']['Year'] == 2010)
					{
						$taskConditions = "  date_created BETWEEN '2010-01-01 00:00:00' AND '2011-01-01 00:00:00'";
					}
					
					if ($this->data['Job']['Year'] == 2011)
					{
						$taskConditions = " date_created BETWEEN '2011-01-01 00:00:00' AND '2012-01-01 00:00:00'";
					}
					
					if ($this->data['Job']['Year'] == 2012)
					{
						$taskConditions = " date_created BETWEEN '2012-01-01 00:00:00' AND '2013-01-01 00:00:00'";
					}
				} 
			}

			$conditions = implode(" AND ", $conditions);
			//debug($conditions);
			//debug($taskConditions);
			
			if ($groupId == $this->Groupid->getGroupID(Groupid::PM_GROUP))
			{
	            $fieldMapping = array (
			     0 => array ('table' => 'Job', 'column' => 'job_id' , 'translate' => null ,"th_name"=>"Job ID", "th_id"=>"job_id", "sort_type"=>"int", "key"=>'true')
			    ,1 => array ('table' => 'Job', 'column' => 'Organization', 'translate' => 'organization' ,"th_name"=>"Org", "th_id"=>"org" )
			    ,2 => array ('table' => 'Job', 'column' => 'Scope_of_work', 'translate' => 'scopeofwork' ,"th_name"=>"SoW", "th_id"=>"sow" ) 
			    ,3 => array ('table' => 'Job', 'column' => 'date_created', 'translate' => 'false' ,"th_name"=>"Date Created", "th_id"=>"date_created" ) 
	    		// ,3 => array ('table' => 'Task', 'column' => 'start_date' , 'translate' => 'jobstartdt' )
	    		// ,4 => array ('table' => 'Task', 'column' => 'end_date' , 'translate' => 'jobenddt' )
			    ,4 => array ('table' => 'Task', 'column' => null, 'translate' => 'conflictstatus' ,"th_name"=>"Conflict", "th_id"=>"conflict")
			    ,5 => array ('table' => 'Job', 'column' => 'no_of_eng_needed', 'translate' => 'resourcesassigned' ,"th_name"=>"Resources Assigned", "th_id"=>"resources")
			    ,6 => array ('table' => 'Task', 'column' => null, 'translate' => 'numchildtickets',"th_name"=>"Child Tickets", "th_id"=>"children", "sort_type"=>"int")
			    ,7 => array ('table' => 'Job', 'column' => 'job_id', 'translate' => 'action' ,"th_name"=>"Action", "th_id"=>"action", "sortable"=>'false')
	            );
			}
			else  if ($groupId == $this->Groupid->getGroupID(Groupid::LM_GROUP))
		    {
	            $fieldMapping = array (
			     0 => array ('table' => 'Job', 'column' => 'job_id' , 'translate' => null,"th_name"=>"Job ID", "th_id"=>"job_id", "sort_type"=>"int", "key"=>'true' )
			    ,1 => array ('table' => 'Job', 'column' => 'Signum', 'translate' => false ,"th_name"=>"Signum","th_id"=>"signum")
			    ,2 => array ('table' => 'Job', 'column' => 'Region', 'translate' => false ,"th_name"=>"Region","th_id"=>"region") 
			    ,3 => array ('table' => 'Job', 'column' => 'Scope_of_work', 'translate' => 'scopeofwork',"th_name"=>"SoW","th_id"=>"sow" ) 
			    ,4 => array ('table' => 'Job', 'column' => 'date_created', 'translate' => 'false',"th_name"=>"Date Created","th_id"=>"date_created") 
	    		// ,3 => array ('table' => 'Task', 'column' => 'start_date' , 'translate' => 'jobstartdt' )
	    		// ,4 => array ('table' => 'Task', 'column' => 'end_date' , 'translate' => 'jobenddt' )
			    ,5 => array ('table' => 'Task', 'column' => null, 'translate' => 'conflictstatus' ,"th_name"=>"Conflict", "th_id"=>"conflict" )
			    ,6 => array ('table' => 'Job', 'column' => 'no_of_eng_needed', 'translate' => 'resourcesassigned',"th_name"=>"Resources Assigned", "th_id"=>"resources" )
			    ,7 => array ('table' => 'Task', 'column' => null, 'translate' => 'numchildtickets',"th_name"=>"Child Tickets", "th_id"=>"children", "sort_type"=>"int" )
	            );
			}	
			
			$search_results = array();
			if ($groupId == $this->Groupid->getGroupID(Groupid::ENG_GROUP))
			{
	  		   /*
			    * Engineer view: This is the mapping of HTML table column number to DB results indices [table][column]
			    */
			    $fieldMapping = array (
	    		     0 => array ('table' => 'Job', 'column' => 'job_id' , 'translate' => null,"th_name"=>"Job ID", "th_id"=>"job_id", "sort_type"=>"int", "key"=>'true' )
	    		    ,1 => array ('table' => 'Job', 'column' => null , 'translate' => 'lm', 'th_name'=>"LM","th_id"=>"lm" )
	    		    ,2 => array ('table' => 'Task', 'column' => 'start_date' , 'translate' => 'resourcestartdt',"th_name"=>"Start Date","th_id"=>"start_date" )
	    		    ,3 => array ('table' => 'Task', 'column' => 'end_date' , 'translate' => 'resourceenddt' ,"th_name"=>"End Date","th_id"=>"end_date")
	    		    ,4 => array ('table' => 'Job', 'column' => 'Scope_of_work', 'translate' => 'scopeofwork',"th_name"=>"SoW","th_id"=>"sow" ) 
	    		    ,5 => array ('table' => 'Job', 'column' => 'mop_link', 'translate' => 'moplink' ,"th_name"=>"MOP Link","th_id"=>"mop_link")
	    		    ,6 => array ('table' => 'Task', 'column' => 'ticket_status', 'translate' => 'taskstatus',"th_name"=>"Status","th_id"=>"status" )
	    		);
			    $search_results = $this->Job->getTicketsEngineer($fieldMapping, $conditions, false);
			}
			else
			{
				//echo $taskConditions;
			    $search_results = $this->Job->getTickets($fieldMapping, $conditions, $taskConditions);
			}
			//debug($fieldMapping);
			//debug($search_results);
			//exit;
			
			$colModel = array();
			$colNames = array();
			foreach($fieldMapping as $key=>$field){
				$colModel[$key] = "{name: '".$field['th_id']."'";
				$colModel[$key] .= (isset($field['key']))?", key: ".$field['key']:"";
				$colModel[$key] .= (isset($field['sortable']))?", sortable: ".$field['sortable']:"";
				$colModel[$key] .= (isset($field['sort_type']))?", sorttype: '".$field['sort_type']."'}":"}";
				$colNames[$key] = "'".$field['th_name']."'";
			} 			
			
			$this->set('field_mapping',$fieldMapping);
			$this->set('search_results', $search_results);			
			$this->set('colModel', implode(",",$colModel));
			$this->set('colNames', implode(",",$colNames));
			$this->layout = 'snj';
		    $this->render('search_results');
		}
	}
	
	function search_results() {}
	
	function view_search($result_job)
	{
		$this->set('search_results', $result_job);
	}
	
	function __parsePreLaunch($id)
     {
         // echo "I am in PL  ";
          $dirPath = $this->Prupload->getUploadPath();
          $fileName = $this->Prupload->getFileName($id);
          
          App::import('Vendor', 'php-excel-reader/reader2');
          $data = new Spreadsheet_Excel_Reader();
          $data->setOutputEncoding('CP1251');
          $data->read("C:\\wamp\\www\\pqr\\".$fileName['Prupload']['name']);
           //debug($data);
            $rows = $data->sheets[0]['cells'];
            $map = $this->map();
            $i=0;
            $exceldata = array();
            foreach($rows as $row){
                if ($row[1] === "SITE")
                    continue;                
                $temp = null;
                $j=1;
                foreach($row as $column){                    
                    $temp[$map[$j++]] = $column;
                }
                $exceldata[$i] = $temp;
                $i++;
            }
            $this->__SaveDatapac($exceldata);                       
           
        }
        
    private function __SaveDatapac($exceldata){        
        App::import('model', 'prelaunchnds');
        $prelaunchnds = new prelaunchnd();
        Configure::write('debug', 0);
        foreach($exceldata as $record)
        {   
            $prelaunchnds->saveAll($record);        
        }    
    }
     function map(){
        return array(
            1 => 'site', 2 => 'utrancell',3 => 'rnc',4 => 'market',5 => 'oss',
            6 => 'sonarport',7 => 'utranengg', 8 => 'rfpm',9 => 'comments'
         );
    }
            
     
    function __parseMarkLaunch($id)
    {
         $dirPath = $this->Prupload->getUploadPath();
          $fileName = $this->Prupload->getFileName($id);
          App::import('Vendor', 'php-excel-reader/reader2');
            //$data = new Spreadsheet_Excel_Reader("C:/wamp/www/pqr".$fileName['Prupload']['name'], true);
            $data = new Spreadsheet_Excel_Reader('PreLaunch_NDS.xls',true);
            $data->setOutputEncoding('CP1251');
            //debug($data);
            $map = $this->map();
            $i=0;
            $exceldata = array();
            foreach($rows as $row){
                if ($row[1] === "SITE")
                    continue;                
                $temp = null;
                $j=1;
                foreach($row as $column){                    
                    $temp[$map[$j++]] = $column;
                }
                $exceldata[$i] = $temp;
                $i++;
            }
            $this->__SaveDatapac($exceldata);                       
    }
	
	public function crp($id = null)
	{
	
		//debug ("IN CRP");
		
		//Changing for node reparenting.
	
		$jobInformation = $this->Job->find('all', array('conditions' => array ('job_id' => $id)));
		$dateCreated = $jobInformation[0]['Job']['date_created'];
		$name = $jobInformation[0]['Job']['Name'];
		
		//Finding the job ids created during node reparenting
		$jobIdsCreated = $this->Job->find('all', array('conditions' => array ('date_created' => $dateCreated, 'Name' => $name)));		
		
		//Get the created jobids and put it in an array
		
		$arrJobId = array();
		$flagNodeConflict = false;
		$count = 0;
		//debug ($jobIdsCreated);
		foreach ($jobIdsCreated as $element)
		{
			$nodeconflict = $this->NodeConflict->find('count', array ('conditions' => array ('job_id' => $element['Job']['job_id'])));
			//debug ($element['Job']['job_id']);
			//debug ($nodeconflict);
			if ($nodeconflict > 0)
			{
				$flagNodeConflict = true;
			}
			
			$arrJobId[$count] = $element['Job']['job_id'];
			$count++;
		}
		
		//debug ($flagNodeConflict);
		//return;
		
		$this->set('id', $id);
		
		
		if (empty($this->data))
		{
			if ($flagNodeConflict == false)
			{	
			
				$job_id = $id;
				
				$this->set('flag', 1);
				
				foreach ($arrJobId as $job_id)
				{					
					$this->Job->query ("UPDATE jobs SET rev_no = 1, conflict_comments = '".$this->data['Job']['conflict_comments']."'"."WHERE job_id = '".$job_id."' AND rev_no <> 0");
					$this->Job->query ("UPDATE tasks SET rev_no = 1, job_rev_no = 1 WHERE job_id = '".$job_id."' AND rev_no <> 0");
					$this->Job->query ("UPDATE nodes SET job_rev = 1 WHERE job_id = '".$job_id."' AND rev_no <> 0");					
				}
				
				//debug ("UPDATE tasks SET ticket_conflict_status = 1 WHERE job_id = '".$job_id."'");
				
				$this->redirect ('view/'.$id);
			}
			
			else
			{
				$this->set('flag', 0);
				$conflicting_nodes = array();
				$conflicting_information = array();
				$count = 0;
				
				//debug ($arrJobId);
				
				foreach ($arrJobId as $job_id)
				{
					//debug ($job_id);
					//debug ($this->NodeConflict->find('all', array('conditions' => array ('job_id' => $job_id), 'fields' => array ('DISTINCT conflicting_job_id', 'node_name', 'task_id'))));
					
					$tempConflictingNodes = $this->NodeConflict->find('all', array('conditions' => array ('job_id' => $job_id), 'fields' => array ('DISTINCT conflicting_job_id', 'node_name', 'task_id')));
					
					//debug($tempConflictingNodes);
					//exit;
					if (sizeof($tempConflictingNodes) > 0)
					{
						//debug($tempConflictingNodes);
					
						$tempConflictingInformation = $this->Job->find('all', array('conditions'=>array ('job_id'=>$tempConflictingNodes[0]['NodeConflict']['conflicting_job_id']), 'fields' => array ('Name', 'Scope_of_work')));
						$sow = $this->Snjscopeofwork->getSoooWs();
						$conflicting_nodes [$count] = $tempConflictingNodes;											
						$conflicting_information[$count] = $tempConflictingInformation;
						//debug($conflicting_information);
						foreach($conflicting_nodes as $key=>$node){
							$conflicting_nodes[$key]['job_name'] = $conflicting_information[0][0]['Job']['Name'];
							$conflicting_nodes[$key]['sow'] = $sow[$conflicting_information[0][0]['Job']['Scope_of_work']];
						}
						
						$count ++;
						
						//debug ($conflicting_nodes);
						$this->set('sow', $sow);
						$this->set('conflicting_nodes', $conflicting_nodes);
						$this->Job->query ("UPDATE tasks SET ticket_conflict_status = 1 WHERE job_id = '".$job_id."'");

					}
					
					//debug ($conflicting_nodes);
					

				}
				
				
				//$this->set('conflicting_informations', $conflicting_information);
					
				
				
			}
		}
		
		else
		{
		
			//Changing for node reparenting.
			$id = $this->data['Job']['id'];
			$jobInformation = $this->Job->find('all', array('conditions' => array ('job_id' => $id)));
			$dateCreated = $jobInformation[0]['Job']['date_created'];
			$name = $jobInformation[0]['Job']['Name'];
			
			//Finding the job ids created during node reparenting
			$jobIdsCreated = $this->Job->find('all', array('conditions' => array ('date_created' => $dateCreated, 'Name' => $name)));
			
			//debug ($id);
			
			//Get the created jobids and put it in an array
			
			$arrJobId = array();
			$count = 0;
			
			foreach ($jobIdsCreated as $element)
			{
				$arrJobId[$count] = $element['Job']['job_id'];
				$count++;
			}
		
		
			$job_id = $this->data['Job']['id'];
			
			$flag = true;
			
			//debug ("IN HERE");
			
			
			if ($this->data['Job']['conflict_comments'] == '')
			{
				$this->Session->setFlash ('PLEASE ENTER THE COMMENTS');
				$flag = false;
				$this->redirect ('crp/'.$job_id);
				
				//debug ("THIS IS HERE");
			}
			
			if ($flag == true)
			{
			
				//debug ($arrJobId);
				
				foreach($arrJobId as $job_id)
				{
					
					debug ("in here");
					
					$this->Job->query ("UPDATE jobs SET rev_no = 1, conflict_comments = '".$this->data['Job']['conflict_comments']."'"."WHERE job_id = '".$job_id."'");
					$this->Job->query ("UPDATE tasks SET rev_no = 1, job_rev_no = 1 WHERE job_id = '".$job_id."'");
					$this->Job->query ("UPDATE nodes SET job_rev = 1 WHERE job_id = '".$job_id."'");
					$this->Job->query ("UPDATE node_conflicts set job_rev_no = 1 WHERE job_id = '".$job_id."'");
				
					//debug ("UPDATE tasks SET ticket_conflict_status = 1 WHERE job_id = '".$job_id."'");
					//$this->Job->query ("UPDATE tasks SET ticket_conflict_status = 1 WHERE job_id = '".$job_id."'");
				
				}
				
				$this->redirect ('view/'.$job_id);
			}
		}
	}
	
	
        
    /*public function addsupport($jobid = null, $taskid = null)
    {
             if (empty ($this->data))
	            {
	                $this->set('jobid',$jobid);
	                $this->set('taskid',$taskid);
	                
	                $job = $this->Job->find('all', array ('conditions' => array ('job_id' => $jobid)));
	                $this->set ('job', $job);
	                
	                $resTasks = $this->Task->find('all', array ('conditions' => array ('task_id' => $taskid, 'job_id' => $jobid)));
	                debug($resTasks);
	                $taskIdArray = array();		 
					foreach ($resTasks as $task)
					{
						$taskIdArray[$task['Task']['task_id']] = 'Task '.$task['Task']['task_id'];
					}
					$this->set('taskIdArray', $taskIdArray);
			 }
            else
            {
                debug($this->data);
                exit;
                $supportSignums = preg_split('@[\W]+@', $this->data['Resource']['support_signums'], -1, PREG_SPLIT_NO_EMPTY);
                foreach ($supportSignums as $supportSignum)
                {
                        $this->Resource->query("INSERT INTO resources (job_id, task_id, user_signum, start_date, start_time, end_date, end_time, rev_no, nullified) VALUES ('".$jobid."', '".$taskid."', '".$supportSignum."', 1, 0)");
                }
                $this->redirect (array ('controller' => 'jobs', 'action' => 'mytickets'));
            }
    }*/
        
	public function viewengineer($jobid = null, $taskid = null) 
	{
		
		if (empty ($this->data))
		{
			
			$this->set('jobid',$jobid);
			$this->set('taskid',$taskid);
		
			$job = $this->Job->find('all', array ('conditions' => array ('job_id' => $jobid)));
			$task = $this->Task->find('all', array ('conditions' => array ('task_id' => $taskid, 'job_id' => $jobid)));
		
			$this->set ('task', $task);
			$this->set ('job', $job);			
			
			$organization = $job[0]['Job']['Organization'];
			
			$this->set ('organization', $organization);
			
			$jobStatus = $task[0]['Task']['ticket_status'];
			
			$options = array('0'=>'New Ticket',
                                 '1' => 'Started');
								 
			if ($jobStatus == 1)
			{
				$options = array ('2' => 'Partialy Completed',
								  '3' => 'completed');
			}
			
			if ($jobStatus == 2)
			{
				$options = array ('4' => 'Restarted');
			}
			
			if ($jobStatus == 3)
			{
				$options = array ('3' => 'Completed');
			}
			
			if ($jobStatus == 4)
			{
				$options = array ('2' => 'Partialy Completed', '3' => 'Restarted');
			}
								 
			$this->set ('options' , $options);
			
			//$this->redirect ('viewengineer/'.$jobid.'/'.$taskid);
		}
		
		else
		{
			
			$organization = Authsome::get('organization');
			debug ($organization);
			debug ($this->data);
			if ($organization == 'LDO NIC' && $this->data['Job']['Organization'] == 3)
			{			
				//debug ($this->data);
				
				if ($this->data['Job']['ticket_status'] == "1" || $this->data['Job']['ticket_status'] == 4)
				{
					//debug ("IN HERE");
					$jobid = $this->data['Job']['job_id'];
					$taskid = $this->data['Job']['task_id'];
					
					$task = $this->Task->find('all', array ('conditions' => array ('job_id' => $jobid, 'task_id' => $taskid)));
					//debug ($task);
					
					$user_signum = $this->data['Job']['user_signum'];
					$resource_name = $this->data['Job']['resource_name'];
					
					$start_date = $task[0]['Task']['start_date'];
					$end_date = $task[sizeof($task) - 1]['Task']['end_date'];
					
					$start_time = $task[sizeof($task) - 1]['Task']['start_time'];
					$end_time = $task[sizeof($task) - 1]['Task']['end_time'];
					
					$designation = $this->User->getDesignation($user_signum);
					
					$this->Job->query("INSERT INTO resources (job_id, task_id, user_signum, start_date, start_time, end_date, end_time, resource_name, rev_no, nullified, availability, designation) VALUES ('".$jobid."', '".$taskid."', '".$user_signum."', '".$start_date."', '".$start_time."', '".$end_date."', '".$end_time."', '".$resource_name."', 1, 0, 100, '" .$designation."')");
					
					$supportSignums = preg_split('@[\W]+@', $this->data['Job']['support_signums'], -1, PREG_SPLIT_NO_EMPTY);					
				}
			}
			
			$this->Job->query ("UPDATE tasks SET ticket_status = '".$this->data['Job']['ticket_status']."' WHERE job_id = '".$this->data['Job']['job_id']."' AND task_id = '".$this->data['Job']['task_id']."'");
			$this->redirect (array ('controller' => 'jobs', 'action' => 'view',$this->data['Job']['job_id']));
		}
		
	}
	
	
	/*
	 * This action returns json data. So, no view.
	 */
	public function getmytickets()
	{
	    $this->layout='ajax';
	    $this->autoLayout = false;
	    $this->autoRender = false;
	    $this->header('Content-Type: application/json');
	    
		$groupId = Authsome::get ('user_group_id');
		$signum = Authsome::get ('username');
		$organization = Authsome::get ('organization');
		
		
		
		$orgId = $this->Vieworganization->getOrgId($organization);
		
		$ldoSelfAssign = false;

		$conditions = null;
		if ($groupId == $this->Groupid->getGroupID(Groupid::PM_GROUP))
		{
		    $conditions = "Signum = '". $signum. "'";
		}
		
		if ($groupId == $this->Groupid->getGroupID(Groupid::LM_GROUP))
		{
		    $conditions = "Organization = '". $orgId. "' AND rev_no > 0 ";
		}
		
		if ($groupId == $this->Groupid->getGroupID(Groupid::ENG_GROUP))
		{
		   $conditions = "Resource.user_signum = '". $signum. "'";
		   if ($organization == 'LDO NIC')
		   {
		        $ldoSelfAssign = true;
		   }
		}
		
		$taskConditions = "";
	
		$json = $this->getmyticketsdata($conditions, $ldoSelfAssign, $taskConditions);
		echo json_encode($json);
		return;
	}
	
	public function getmyticketsdata($conditions, $ldoSelfAssign=false, $taskConditions = null, $showAction = true )
	{
	    
		$groupId = Authsome::get ('user_group_id');
		
        /*$fieldMapping = array (
		     0 => array ('table' => 'Job', 'column' => 'job_id' , 'translate' => 'jobviewlink' )
		    ,1 => array ('table' => 'Job', 'column' => 'rev_no' , 'translate' => false )
		    ,2 => array ('table' => 'Job', 'column' => 'Signum' , 'translate' => false )
		    ,3 => array ('table' => 'Job', 'column' => 'Organization', 'translate' => 'organization' )
		    ,4 => array ('table' => 'Job', 'column' => 'Scope_of_work', 'translate' => 'scopeofwork' ) 
		    ,5 => array ('table' => 'Task', 'column' => null, 'translate' => 'conflictstatus' )
		    ,6 => array ('table' => 'Job', 'column' => 'no_of_eng_needed', 'translate' => 'resourcesassigned' )
		    ,7 => array ('table' => 'Task', 'column' => null, 'translate' => 'numchildtickets' )
		    ,
		);*/
		
		if ($groupId == $this->Groupid->getGroupID(Groupid::PM_GROUP))
		{
            $fieldMapping = array (
		     0 => array ('table' => 'Job', 'column' => 'job_id' , 'translate' => 'jobviewlink' )
		    ,1 => array ('table' => 'Job', 'column' => 'Organization', 'translate' => 'organization' )
		    ,2 => array ('table' => 'Job', 'column' => 'Scope_of_work', 'translate' => 'scopeofwork' ) 
		    ,3 => array ('table' => 'Job', 'column' => 'date_created', 'translate' => 'false' ) 
    		// ,3 => array ('table' => 'Task', 'column' => 'start_date' , 'translate' => 'jobstartdt' )
    		// ,4 => array ('table' => 'Task', 'column' => 'end_date' , 'translate' => 'jobenddt' )
		    ,4 => array ('table' => 'Task', 'column' => null, 'translate' => 'conflictstatus' )
		    ,5 => array ('table' => 'Job', 'column' => 'no_of_eng_needed', 'translate' => 'resourcesassigned' )
		    ,6 => array ('table' => 'Task', 'column' => null, 'translate' => 'numchildtickets' )
		    ,7 => array ('table' => 'Job', 'column' => 'job_id', 'translate' => 'action' )
            );
            if($showAction) $fieldMapping[8] = array ('table' => 'Job', 'column' => 'job_id', 'translate' => 'action' );
		}
		else  if ($groupId == $this->Groupid->getGroupID(Groupid::LM_GROUP))
	    {
            $fieldMapping = array (
		     0 => array ('table' => 'Job', 'column' => 'job_id' , 'translate' => 'jobviewlink' )
		    ,1 => array ('table' => 'Job', 'column' => 'Signum', 'translate' => false )
		    ,2 => array ('table' => 'Job', 'column' => 'Region', 'translate' => false ) 
		    ,3 => array ('table' => 'Job', 'column' => 'Scope_of_work', 'translate' => 'scopeofwork' ) 
		    ,4 => array ('table' => 'Job', 'column' => 'date_created', 'translate' => 'false' ) 
    		// ,3 => array ('table' => 'Task', 'column' => 'start_date' , 'translate' => 'jobstartdt' )
    		// ,4 => array ('table' => 'Task', 'column' => 'end_date' , 'translate' => 'jobenddt' )
		    ,5 => array ('table' => 'Task', 'column' => null, 'translate' => 'conflictstatus' )
		    ,6 => array ('table' => 'Job', 'column' => 'no_of_eng_needed', 'translate' => 'resourcesassigned' )
		    ,7 => array ('table' => 'Task', 'column' => null, 'translate' => 'numchildtickets' )
            );
            if($showAction) $fieldMapping[8] = array ('table' => 'Job', 'column' => 'job_id', 'translate' => 'action' );
		}	
		
		$search_results = array();
		if ($groupId == $this->Groupid->getGroupID(Groupid::ENG_GROUP))
		{
  		   /*
		    * Engineer view: This is the mapping of HTML table column number to DB results indices [table][column]
		    */
		    $fieldMapping = array (
    		     0 => array ('table' => 'Job', 'column' => 'job_id' , 'translate' => 'ticketviewlink' )
    		    ,1 => array ('table' => 'Job', 'column' => null , 'translate' => 'lm' )
    		    ,2 => array ('table' => 'Task', 'column' => 'start_date' , 'translate' => 'resourcestartdt' )
    		    ,3 => array ('table' => 'Task', 'column' => 'end_date' , 'translate' => 'resourceenddt' )
    		    ,4 => array ('table' => 'Job', 'column' => 'Scope_of_work', 'translate' => 'scopeofwork' ) 
    		    ,5 => array ('table' => 'Job', 'column' => 'mop_link', 'translate' => 'moplink' )
    		    ,6 => array ('table' => 'Task', 'column' => 'ticket_status', 'translate' => 'taskstatus' )
    		);
		    $search_results = $this->Job->getTicketsEngineer($fieldMapping, $conditions, $ldoSelfAssign);
		}
		else
		{
			//echo $taskConditions;
		    $search_results = $this->Job->getTickets($fieldMapping, $conditions, $taskConditions);
		}
		//debug ($search_results);
		$json = array('aaData' => $search_results);
		return $json;
	}
	
	public function mytickets()
	{
		$groupId = Authsome::get ('user_group_id');
		$signum = Authsome::get ('username');
		$organization = Authsome::get ('organization');
		$orgId = $this->Vieworganization->getOrgId($organization);
		$ldoSelfAssign = false;
		$conditions = null;		
		$taskConditions = "";
		
		if ($groupId == $this->Groupid->getGroupID(Groupid::PM_GROUP))
		{
            $conditions = "Signum = '". $signum. "'";
            $fieldMapping = array (
		     0 => array ('table' => 'Job', 'column' => 'job_id' , 'translate' => null ,"th_name"=>"Job ID", "th_id"=>"job_id", "sort_type"=>"int", "key"=>'true')
		    ,1 => array ('table' => 'Job', 'column' => 'Organization', 'translate' => 'organization' ,"th_name"=>"Org", "th_id"=>"org" )
		    ,2 => array ('table' => 'Job', 'column' => 'Scope_of_work', 'translate' => 'scopeofwork' ,"th_name"=>"SoW", "th_id"=>"sow" ) 
		    ,3 => array ('table' => 'Job', 'column' => 'date_created', 'translate' => 'false' ,"th_name"=>"Date Created", "th_id"=>"date_created" ) 
    		// ,3 => array ('table' => 'Task', 'column' => 'start_date' , 'translate' => 'jobstartdt' )
    		// ,4 => array ('table' => 'Task', 'column' => 'end_date' , 'translate' => 'jobenddt' )
		    ,4 => array ('table' => 'Task', 'column' => null, 'translate' => 'conflictstatus' ,"th_name"=>"Conflict", "th_id"=>"conflict")
		    ,5 => array ('table' => 'Job', 'column' => 'no_of_eng_needed', 'translate' => 'resourcesassigned' ,"th_name"=>"Resources Assigned", "th_id"=>"resources")
		    ,6 => array ('table' => 'Task', 'column' => null, 'translate' => 'numchildtickets',"th_name"=>"Child Tickets", "th_id"=>"children", "sort_type"=>"int")
		    ,7 => array ('table' => 'Job', 'column' => 'job_id', 'translate' => 'action' ,"th_name"=>"Action", "th_id"=>"action", "sortable"=>'false')
            );
		}
		else  if ($groupId == $this->Groupid->getGroupID(Groupid::LM_GROUP))
	    {
            $conditions = "Organization = '". $orgId. "' AND rev_no > 0 ";
            $fieldMapping = array (
		     0 => array ('table' => 'Job', 'column' => 'job_id' , 'translate' => null,"th_name"=>"Job ID", "th_id"=>"job_id", "sort_type"=>"int", "key"=>'true' )
		    ,1 => array ('table' => 'Job', 'column' => 'Signum', 'translate' => false ,"th_name"=>"Signum","th_id"=>"signum")
		    ,2 => array ('table' => 'Job', 'column' => 'Region', 'translate' => false ,"th_name"=>"Region","th_id"=>"region") 
		    ,3 => array ('table' => 'Job', 'column' => 'Scope_of_work', 'translate' => 'scopeofwork',"th_name"=>"SoW","th_id"=>"sow" ) 
		    ,4 => array ('table' => 'Job', 'column' => 'date_created', 'translate' => 'false',"th_name"=>"Date Created","th_id"=>"date_created") 
    		// ,3 => array ('table' => 'Task', 'column' => 'start_date' , 'translate' => 'jobstartdt' )
    		// ,4 => array ('table' => 'Task', 'column' => 'end_date' , 'translate' => 'jobenddt' )
		    ,5 => array ('table' => 'Task', 'column' => null, 'translate' => 'conflictstatus' ,"th_name"=>"Conflict", "th_id"=>"conflict" )
		    ,6 => array ('table' => 'Job', 'column' => 'no_of_eng_needed', 'translate' => 'resourcesassigned',"th_name"=>"Resources Assigned", "th_id"=>"resources" )
		    ,7 => array ('table' => 'Task', 'column' => null, 'translate' => 'numchildtickets',"th_name"=>"Child Tickets", "th_id"=>"children", "sort_type"=>"int" )
            );
		}	
			
		$search_results = array();
		if ($groupId == $this->Groupid->getGroupID(Groupid::ENG_GROUP))
		{
  		   $conditions = "Resource.user_signum = '". $signum. "'";
		   if ($organization == 'LDO NIC')
		   {
		        $ldoSelfAssign = true;
		   }
  		   
  		   /*
		    * Engineer view: This is the mapping of HTML table column number to DB results indices [table][column]
		    */
		    $fieldMapping = array (
    		     0 => array ('table' => 'Job', 'column' => 'job_id' , 'translate' => null,"th_name"=>"Job ID", "th_id"=>"job_id", "sort_type"=>"int", "key"=>'true' )
    		    ,1 => array ('table' => 'Job', 'column' => null , 'translate' => 'lm', 'th_name'=>"LM","th_id"=>"lm" )
    		    ,2 => array ('table' => 'Task', 'column' => 'start_date' , 'translate' => 'resourcestartdt',"th_name"=>"Start Date","th_id"=>"start_date" )
    		    ,3 => array ('table' => 'Task', 'column' => 'end_date' , 'translate' => 'resourceenddt' ,"th_name"=>"End Date","th_id"=>"end_date")
    		    ,4 => array ('table' => 'Job', 'column' => 'Scope_of_work', 'translate' => 'scopeofwork',"th_name"=>"SoW","th_id"=>"sow" ) 
    		    ,5 => array ('table' => 'Job', 'column' => 'mop_link', 'translate' => 'moplink' ,"th_name"=>"MOP Link","th_id"=>"mop_link")
    		    ,6 => array ('table' => 'Task', 'column' => 'ticket_status', 'translate' => 'taskstatus',"th_name"=>"Status","th_id"=>"status" )
    		);
		    $search_results = $this->Job->getTicketsEngineer($fieldMapping, $conditions, false);
		}
		else
		{
			//echo $taskConditions;
		    $search_results = $this->Job->getTickets($fieldMapping, $conditions, $taskConditions);
		}
		//debug($fieldMapping);
		//debug($search_results);
		//exit;
		$colModel = array();
		$colNames = array();
		foreach($fieldMapping as $key=>$field){
			$colModel[$key] = "{name: '".$field['th_id']."'";
			$colModel[$key] .= (isset($field['key']))?", key: ".$field['key']:"";
			$colModel[$key] .= (isset($field['sortable']))?", sortable: ".$field['sortable']:"";
			$colModel[$key] .= (isset($field['sort_type']))?", sorttype: '".$field['sort_type']."'}":"}";
			$colNames[$key] = "'".$field['th_name']."'";
		} 			
		
		$this->set('field_mapping',$fieldMapping);
		$this->set('search_results', $search_results);			
		$this->set('colModel', implode(",",$colModel));
		$this->set('colNames', implode(",",$colNames));
		$this->layout = 'snj';	
		$this->render('search_results');	
	}
        
	public function sendEmailSNJ($data, $dl=null, $action=null)
    {

        //debug($data);
        //debug($dl);
        //exit();
        $this->set('data',$data);
              
        $actiondescr = "";
        switch($action)
        {
            case 'A': 
            {
                $actiondescr = "Add Job";
            }
            break;
                
            case 'E':
             {
                $actiondescr = "Edit Job";
             }
            break;
                
            case 'R':
             {
                $actiondescr = "Add Resources";
                $pmEmail = $pmEmail.$this->Job->getLMEmail($data['Job']['job_id']);
                $pmEmail = $pmEmail.$this->Job->getResourcesEmails($data['Job']['job_id']);
                
              }
            break;
            
            case 'D':
             {
                $actiondescr = "Draft Job";
             }
            break;
        }
	    
	    $emails = "";
            
        if($action!='D'){             
	        //print_r("Emails:".$this->data['Job']['email_addresses']);
	        
	        if( !empty($this->data['Job']['email_addresses']))
	        {
	            $emails = explode("\r\n", $this->data['Job']['email_addresses']);  
	            $emails = implode("", $emails); 
	            //debug($emails);
	         }
        }
        
        $subject = "Organization:" . $data['Job']['Organization'] . ", Customer:" . $data['Job']['customer'] . ", Region:" . $data['Job']['Region'] . ", Activity Type:" . $data['Job']['Scope_of_work'];
        $subject = "RNAM-PQR : SnJ " . $actiondescr . " - " . $subject;
        
        $this->render = false;
        $this->sendEmail($dl, $emails, 'snj', $subject);
    }

    public function downloadpm() {       
        $this->view = 'Media';       
        $params = array( 
            'id' => 'userguidepm.zip', 
            'name' => 'userguide',              
            'download' => true,              
            'extension' => 'zip',  
            //// must be lower case          
            'path' => APP . 'files' . DS. 'snj' . DS  
            //    // don't forget terminal 'DS'            
            //            //     
            //   
            );  
            $this->set($params);    
    }
	
	public function cancel ($jobId = null)
	{
		
		//Cancel Job.
		$this->Job->cancel($jobId,Authsome::get('username'),Authsome::get('first_name') . ' ' . Authsome::get('last_name'));
		
		//Cancel Task
		$this->Task->cancel($jobId,Authsome::get('username'),Authsome::get('first_name') . ' ' . Authsome::get('last_name'));
		
		//Cancel Node
		$this->Node->cancel($jobId);
		
		//Cancle Resources
		$this->Job->query ("UPDATE resources SET nullified = 1 WHERE job_id = '".$jobId."'"); 
		
		$this->Session->setFlash("This Job Has Been Cancelled.");
		$this->redirect (array ('controller' => 'jobs', 'action' => 'view',$jobId));
		
		
	}
}
?>