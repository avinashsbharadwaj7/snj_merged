<?php

	class NodesController extends AppController 
	{
		public $name = "nodes";
		public $helpers = array('Html', 'Form','Ajax','Javascript', 'DatePicker');
		public $components = array('Session');
		//public $uses = 'Job';
		
		//ACTION FOR INSERTING THE PASSWORD AND IP ADDRESS TO THE target_node table
		public function target_node($jobId = null, $taskId = null, $nodeName = null)
		{
			if (empty ($this->data))
			{
				$this->set('job_id', $jobId);
				$this->set('task_id', $taskId);
				$this->set('node_name', $nodeName);
				
				$node_type = $this->Node->getNodeType($nodeName);
				$this->set('node_type', $node_type);
			}
			
			else
			{
				$tempTarget ['name'] = $this->data['Node']['node_name'];
				$tempTarget ['type'] = $this->data['Node']['node_type'];
				$tempTarget ['ipaddress'] = $this->data['Node']['ip_addr'];
				$ip = ip2long($this->data['Node']['ip_addr']);
				
				if (ip == -1 || $ip == FALSE)
				{
					$this->Session->setFlast("ENTER A PROPER IP");
					$this->redirect(array ('controller' => 'nodes', 'action' => 'target_node', $this->data['Node']['job_id'], $this_data['Node']['task_id'], $tempTarget['name']));
				}
				
				$tempTarget['flag'] = 1;
				
				$this->Node->insertTempTarget($tempTarget);
				$this->redirect(array ('controller' => 'jobs', 'action' => 'mytickets'));
			}
		}
	}

?>