<?php
class ResourcesController extends AppController 
{
    public $name = 'Resources';
    public $helpers = array('Html', 'Form', 'DatePicker','Ajax','Javascript');
	public $uses = array('Task', 'Resource', 'Job', 'User', 'Groupid');
	public $components = array('Session');
		//PRIVATE FUNCTION TO CONVERT TIME FROM THE CAKE FORMAT TO THE MYSQL FORMAT
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
				$resTime = "0".$resTime.":".$cakeTime['min'].":00";
			}
								
		}
		else if (!strcmp ($cakeTime['meridian'], 'pm'))
		{
		
			$resTime = $cakeTime['hour'];
			if ( $cakeTime['hour'] == 12)
			{
				$resTime = $cakeTime['hour'];
				$resTime = $resTime + 12;
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
			
		return $resTime;
	}
	
	//INDEX ACTION FOR THE RESOURCE VIEW
    public function index() 
	{
        $this->set('resources', $this->Resource->find('all'));
    }
	
	//VIEW ACTION FOR THE RESOURCE VIEW
	public function view($jobid = null) 
	{
        
		$conditions = array("job_id" => $this->request->query[0], "task_id" => $this->request->query[1]);
		$this->set('resource', $this->Resource->find('all', array('conditions' => $conditions)));
    }
	
     public function addsupport($jobid = null, $taskid = null)
        {
                 if (empty ($this->data))
                {
                    $this->set('jobid',$jobid);
                    $this->set('taskid',$taskid);
                    $job = $this->Job->find('all', array ('conditions' => array ('job_id' => $jobid)));
                    $task = $this->Task->find('all', array ('conditions' => array ('task_id' => $taskid, 'job_id' => $jobid)));
		
					$this->set ('task', $task);
					$this->set ('job', $job);
			
				}
                else
                {
                    $supportSignums = preg_split('@[\W]+@', $this->data['Resource']['support_signums'], -1, PREG_SPLIT_NO_EMPTY);
                    var_dump($supportSignums);
                    foreach ($supportSignums as $supportSignum)
                    {
                            $this->Resource->query("INSERT INTO resources (job_id, task_id, user_signum, start_date, start_time, end_date, end_time, rev_no, nullified) VALUES ('".$jobid."', '".$taskid."', '".$supportSignum."', 1, 0)");
                    }
                   // $this->redirect (array ('controller' => 'jobs', 'action' => 'my tickets'));
                }
        }
        
	//ADD ACTION FOR THE RESOURCE VIEW
	public function add($id = null, $task_id = null) 
	{
		$task_id = 1;
		$conditions = array("job_id" => $id, "task_id" => $task_id);
		$result = $this->Task->find('first', array('conditions'=> $conditions, 'order' => 'rev_no DESC', 'limit' => 1));
		
		$resTasks = $this->Task->find ('all', array ('conditions' => array ('job_id' => $id), 'fields' => 'task_id'));
		foreach ($resTasks as $task)
		{
			$taskIdArray[$task['Task']['task_id']] = 'Task '.$task['Task']['task_id'];
		}
		
		
		$this->set('taskIdArray', $taskIdArray);
		//debug ($result);
		$this->set('start_time',$result['Task']['start_time']);
		$this->set('end_time',$result['Task']['end_time']);
		$this->set('start_date',$result['Task']['start_date']);
		$this->set('end_date',$result['Task']['end_date']);
		if (empty ($this->data))
		{			
			if ($result['Task']['ticket_conflict_status'] == 1)
			{
				$this->set('func_id', $id);
				$this->set('task_id', $task_id);
			
				$this->set('flag', 1);
			}
			
			else
			{
				$this->set('flag',0);
				
				$this->set('func_id', $id);
				$this->set('task_id', $task_id);
				
				$conditions = array("job_id" => $id, "nullified <>" => 1);
				$resResources = $this->Resource->find('all', array('conditions' => $conditions));
				
				
				$this->set('Resources', $resResources);
			}
		}
		
        else 
		{
			//debug ($this->data);
			//exit;
			
			$conditions = array("job_id" => $id, "task_id" => $task_id);
			$result = $this->Task->find('first', array('conditions'=> $conditions, 'order' => 'rev_no DESC', 'limit' => 1));
			
			$signum = Authsome::get('username');
			
			$this->data['Resource']['job_id'] = $this->data['Resource']['id_task'];
			
			if (@(int)$this->data['Resource']['flexible'] == 0)
			{
				$this->data['Resource']['availability'] = 100;
			}
			
			if (@(int)$this->data['Resource']['is_support'] == 1)
			{
				$this->data['Resource']['availability'] = 0;
			}
						
			$start_time = $this->__convertTime($this->data['Resource']['start_time']);			
			$end_time = $this->__convertTime($this->data['Resource']['end_time']);
			$this->data['Resource']['start_time'] = $start_time;
			$this->data['Resource']['end_time'] = $end_time;
			
			$this->data['Resource']['designation'] = $this->User->getDesignation($this->data['Resource']['user_signum']);
			$this->data['Resource']['nullified'] = 0;
			$this->data['Resource']['rev_no'] = 0;    
			$resourceAvailability = $this->Resource->getAvailability($this->data['Resource']['user_signum'], $this->data['Resource']['start_date'], $start_time, $this->data['Resource']['end_date'], $end_time);			
			
			$availability = $this->data['Resource']['availability'] + $resourceAvailability;			
			$this->data['Resource']['added_by'] = $signum;
			
			//debug ($availability);
			
			if ($result['Task']['start_time'] > $start_time || $result['Task']['end_time'] > $end_time)
			{
				$this->Session->setFlash("Please select the start and end time within the task");
				$this->redirect(array('action' => 'add', $this->data['Resource']['id_task']));
			}
			
			
			if ($availability > 100)
			{			
				$this->Session->setFlash("The job can't be assigned to " . $this->data['Resource']['user_signum']);
				$this->redirect(array('action' => 'add', $this->data['Resource']['id_task']));
				return;
			}
						
			//check if exists
			$resourceExists = $this->Resource->getResource($this->data['Resource']['user_signum']);	
		   
			if (count($resourceExists) == 0 )
			{
				$this->Session->setFlash("User with this signum not found: ". $this->data['Resource']['user_signum']);
				$this->redirect(array('action' => 'add', $this->data['Resource']['id_task']));
			} 
			
			else
			{
				//debug ($this->data);
				
				if (empty($this->data['Resource']['TasksSelected']))
				{
					$this->Session->setFlash("SELECT TASK");
					$this->redirect(array('action' => 'add', $this->data['Resource']['id_task']));
				}
				
				
				foreach ($this->data['Resource']['TasksSelected'] as $task_id)
				{
					$this->data['Resource']['task_id'] = $task_id;
					//debug($this->data);
					//exit;
					
					$this->Resource->create();
					if ($this->Resource->save($this->data)) 
					{
						$this->Session->setFlash('Your resource has been saved.');						
					} 
					else 
					{
						$this->Session->setFlash('Unable to add your post.');						
					}
				}
				
				$this->redirect(array('action' => 'add', $this->data['Resource']['id_task']));
			}
			
        }
	
	}
        
        
	
	//SUBMIT ACTION FOR THE RESOURCE VIEW
	public function submit($jobId = null, $taskId = null)
	{
	
		//FIRST CHECK FOR DESIGNATION LEVEL MISMATCH AGAINST JOB RISK
		if (empty($this->data))
		{
			$this->set ('jobId', $jobId);
			$this->set ('taskId', $taskId);
                        
			//check for no. of resources
			$NoofEnggRequired = $this->Job->getEngineers($jobId);
			$NoAssigned = $this->Resource->getResourceCount($jobId);
			
		   
			$riskLevel = $this->Job->getMopRiskLevel($jobId);
			//$this->set('flag', 0);
			
			$countSeniors = $this->Resource->getDesignationCount ('Senior', $jobId, $taskId);
			$countExperienced = $this->Resource->getDesignationCount ('Experienced', $jobId, $taskId);
			$countAssessed = $this->Resource->getDesignationCount ('Assessed', $jobId, $taskId);

			//$flashtext = $this->Session->getFlash();

			if ($riskLevel == 'High')
			{
				//debug ("HIGH");
				if ($countSeniors < 1)
				{
					$this->Session->setFlash ('NO SENIOR ALLOCATED FOR HIGH RISK TASK');
					$this->set('flag', 1);
				}
				
				else
				{
					$this->Resource->query("UPDATE resources SET rev_no = 1 WHERE job_id = '".$jobId."'");
					$this->redirect(array ('controller' => 'jobs', 'action' => 'view',$jobId));
					$this->set('flag', 0);
				}
			}
			
			else if ($riskLevel == 'Medium')
			{	
				if ($countExperienced < 1 && $countSeniors < 1)
				{ 
					//debug ("IN HERE");
					$this->Session->setFlash('ATLEAST ONE EXPERIENCED NEEDED FOR A MEDIUM RISK TASK');
					$this->set('flag', 1);
				}
				
				else
				{
					$this->Resource->query("UPDATE resources SET rev_no = 1 WHERE job_id = '".$jobId."'");
					$this->redirect(array ('controller' => 'jobs', 'action' => 'view',$jobId));
					$this->set('flag', 0);
				}
				
			}
			
			else
			{
				//debug ("low");
				
				$this->set('flag', 0);
				$this->Resource->query("UPDATE resources SET rev_no = 1 WHERE job_id = '".$jobId."'");
				$this->redirect(array ('controller' => 'jobs', 'action' => 'view',$jobId));
			}
		
		}
   
		else 
		{
			//OBTAIN COMMENTS FROM THE LINE MANAGER FOR ALLOCATING A MISMATCHED RESOURCE
			//debug ($this->data);
			//debug($jobId);
			//exit;
			$jobId = $this->data['resource']['job_id'];
			$taskId = $this->data['resource']['task_id']; 
			
			$this->set ('jobId', $jobId);
			$this->set ('taskId', $taskId);
			
			$flag_resource = true;
			if ($this->data['resource']['approval_comments'] == '')
			{
				$this->Session->setFlash("PLEASE ENTER APPROVAL COMMENTS");
				$flag_resource = false;
				$this->set('flag', 1);
			}
			
			if (sizeof ($this->data['resource']) == 5)
			{
				if ($this->data['resource']['approval_comments_more'] == '')
				{
					$this->Session->setFlash("PLEASE ENTER APPROVAL COMMENTS FOR LESS RESOURCE COUNT");
					$flag_resource = false;
					$this->set('flag', 1);
					$approval_comments = $this->data['resource']['approval_comments'] . "\n" . $this->data['resource']['approval_comments_more'];
				}
			}
			
			if (sizeof ($this->data['resource']) == 4)
			{
				if ($this->data['resource']['approved'] == '')
				{
					$this->Session->setFlash("PLEASE CHECK THE APPROVED BOX");
					$flag_resource = false;
					$this->set('flag', 1);
					$approval_comments = $this->data['resource']['approval_comments'] . "\n";
				}
			}
			
			
			
			if ($flag_resource == true)
			{
				$this->Resource->query("UPDATE resources SET rev_no = 1, approval_comments = '".$approval_comments."' WHERE job_id = '".$this->data['resource']['job_id']."'");
				$this->redirect(array ('controller' => 'jobs', 'action' => 'view',$jobId));
			}
			
			//$this->redirect(array ('controller' => 'Jobs', 'action' => 'mytickets'));
		}
	}
	
	public function exception ($job_id = null, $task_id = null, $resource_signum = null)
	{
		if (empty($this->data))
		{
			$this->set('job_id', $job_id);
			$this->set('task_id', $task_id);
			$this->set('resource', $resource_signum);
			
			$endTime = $this->Resource->getEndTime ($job_id, $task_id, $resource_signum);
			$this->set('end_time', $endTime);
		}
		
		else 
		{
			$this->set('job_id', $job_id);
			$this->set('task_id', $task_id);
			$this->set('resource', $resource_signum);
			
			$end_time = $this->data['Resource']['end_time'];
			
			$end_time = $this->__convertTime ($end_time);
			//debug ($end_time);
			
			$this->Resource->query("UPDATE resources SET end_time = '".$end_time."' WHERE job_id = '".$this->data['Resource']['job_id']."' AND task_id = '".$this->data['Resource']['task_id']."' AND user_signum = '".$this->data['Resource']['user_signum']."'");
			$this->Resource->query("UPDATE tasks SET end_time = '".$end_time."' WHERE job_id = '".$this->data['Resource']['job_id']."'");
			if ($this->data['Resource']['outage'])
			{
				$this->Resource->query ("UPDATE tasks SET outage = 1 WHERE job_id = '".$this->data['Resource']['job_id']."' AND task_id = '".$this->data['Resource']['task_id']."'");
			}
			
			$this->redirect(array ('controller' => 'jobs', 'action' => 'mytickets'));
		}
	}
	
	public function outage ($jobId = null)
	{
		if (empty ($this->data))
		{
			$this->set ('job_id', $jobId);
			$resTasks = $this->Task->find ('all', array ('conditions' => array ('job_id' => $jobId), 'fields' => 'task_id'));
			
			$taskIdArray = array ();
			
			foreach ($resTasks as $task)
			{
				$taskIdArray[$task['Task']['task_id']] = 'Task '.$task['Task']['task_id'];
			}
			
			$this->set('taskIdArray', $taskIdArray);
		}
		
		else
		{
			//debug ($this->data['Resource']['TasksSelected']);
			foreach ($this->data['Resource']['TasksSelected'] as $task_id)
			{
				
				$query = "UPDATE tasks SET outage = 1 WHERE job_id = '".$this->data['Resource']['job_id']."' AND task_id = '".$task_id."'";
				//debug ($query);
				$this->Resource->query ($query);
			}
			
			$this->redirect(array ('controller' => 'jobs', 'action' => 'mytickets'));
		}	
	}
}
?>