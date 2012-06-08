<?php

	class TasksController extends AppController
	{
		public $name = 'Tasks';
		public $helpers = array ('Html', 'Form', 'DatePicker');
		public $components = array ('Session');
		public $uses = array ('Task', 'Node');

		public function index ($id = null)
		{
			$this->set ('tasks', $this->Task->find('all', array ('conditions' => array ('job_id' => $id))));	
		}
		
		public function view($id=null)
		{
			//$data = $this->Node->find('all', array ('conditions' => array ('job_id' => $id)));			
                        //
			//debug ($data);
            $data = $this->Node->getNodeTasks($id);
			$this->set ('nodes', $data);
		}
		
		public function add($id = null)
		{
		
		//$date = new DateTime();
		
			if (!empty ($this->data) )
			{
				$this->Task->set('job_id', $id);
			
				$res = $this->Task->find('first', array (
					'fields' => 'max(task_id)',
					'conditions' => array('job_id = ' => $id)
				));			
			
			//debug ($res);
			
			$taskid = $res[0]['max(task_id)'];
			
			//$taskid = $taskid;
			
			$taskid++;
			
			debug($taskid);
			
			$this->Task->set('task_id', $taskid);

			$nodename = $this->data['nodes']['concerned_node'];
			
			$this->Task->query("insert into nodes (concerned_node, job_id, job_rev, task_id, task_rev) values ('" .$nodename. "', '" .$id. "', '0', '" .$taskid. "', '0')" );
			if ($this->Task->save($this->request->data)) 
			{				
				$this->Session->setFlash('Your post has been saved.');
				//$this->redirect(array('action' => 'index'));
			}
	
			else 
			{
				$this->Session->setFlash('Unable to add your post.');
			}
		}
		}

		public function edit ($id)
		{
			$this->Task->id = $id;
			
			$date = new DateTime();
			
			if (empty($this->data)) 
			{
				$this->data = $this->Task->read();
			}

			else 
			{
			
				$res = $this->Task->find('first', array (
					'fields' => 'max(rev_no)',
					'conditions' => array('id_tasks = ' => $id)
				));	

				$id = $this->Task->find('first', array (
					'fields' => 'max(job_id)',
					'conditions' => array('id_tasks = ' => $id)
				));	

				$revno = $res[0]['max(rev_no)'];
				$job_id = $id[0]['max(job_id)'];
				

				$this->data['Task']['job_id'] = $job_id + 1;
				$this->data['Task']['rev_no'] = $revno + 1;
				$this->data['Task']['modifier_name'] = 'Default Name';
				$this->data['Task']['modification_timestamp'] = $date->getTimestamp();
				
			
				if ($this->Task->save($this->data)) 
				{
					$this->Session->setFlash('Your post has been updated.');
					$this->redirect(array('action' => 'index'));
				} 
				else 
				{
					$this->Session->setFlash('Unable to update your post.');
				}
			}
		}
		

	}
?>