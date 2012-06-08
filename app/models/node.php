<?php
	class Node extends AppModel
	{
		public $name = 'Node';

		
		public function getNodeType($nodeName)
		{
            $query = "SELECT type FROM target WHERE name = '".$nodeName."'";
		    $this->query($query);
		    $nodeTypeResult = $this->query ($query);
					
			$nodeType = "";
            if (sizeof($nodeTypeResult))
			{
				$nodeType = $nodeTypeResult[0]['target']['type'];
			}
			return $nodeType;
		}
		
                
		public function getNodeTasks($JobId)
		{
			$query = "select * from nodes, tasks where nodes.task_id = tasks.task_id and nodes.job_id = tasks.job_id and tasks.rev_no = (SELECT max(rev_no) from tasks as t where t.job_id = ".$JobId.") and nodes.job_id=".$JobId ;
			$this->query($query);
			$nodeResult = $this->query ($query);


			return $nodeResult;
		}
                
		public function insertTempTarget($tempTarget)
		{
			$query = "INSERT INTO temp_target
					(name,
					type,
					ipaddress,
					password,
					customer,
					flag)
					VALUES("
					."'".$tempTarget['name']."', "
					."'".$tempTarget['type']."', "
					."'".$tempTarget['ipaddress']."', "
					."'".$tempTarget['password']."', "
					."'".$tempTarget['customer']."', "
					."'".$tempTarget['flag']."'"
					.")";
					
			$res = $this->query($query);
		}
		
		function cancel($jobId = null)
		{
			if ($jobId != null)
			{
				$query = "UPDATE nodes SET job_rev = '-1', task_rev = 0 WHERE job_id = '".$jobId."'";
				
				$res = $this->query ($query);
			}
		}
		
	}
