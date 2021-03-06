<?php

class AuthcodesController extends AppController
{
    var $name = 'Authcodes';
    var $uses = array('Authcode','Job','Groupid','Task','User','Node');
    var $components = array('Session','Email');
    var $helpers = array('Html', 'Form', 'Javascript', 'DatabaseFields', 'Ajax', 'ShowFields', 'DatePicker');
    
     public function beforeFilter()
    {
        $this->set('pmgroupid', $this->Groupid->getGroupID(Groupid::PM_GROUP));
        $this->set('lmgroupid', $this->Groupid->getGroupID(Groupid::LM_GROUP));
        $this->set('enggroupid', $this->Groupid->getGroupID(Groupid::ENG_GROUP));
        $this->set('groupId',Authsome::get ('user_group_id'));
    }
    
    function index($job_id = null, $task_id = null, $node_name = null)
    {
		$this->set('key',null);
		
		if (empty ($this->data))
		{
			//fetch the Job data
			$job = $this->Job->findByJobId($job_id);
			//debug($job); 
			if(empty($job)){
				$this->Session->setFlash("Job ID:$job_id cannot be found.");
				$this->redirect(array ('controller' => 'jobs', 'action' => 'view/'.$job_id));
				exit;
			}
			$task = $this->Task->find('first',array('conditions'=>array('job_id'=>$job_id,'task_id'=>$task_id)));
			if(empty($task)){
				$this->Session->setFlash("Task ID:$task_id for Job ID:$job_id cannot be found.");
				$this->redirect(array ('controller' => 'jobs', 'action' => 'view/'.$job_id));
				exit;
			}
			
			
			$this->set('job_id', $job_id);
			$this->set('task_id', $task_id);
			$this->set('node_name', $node_name);
		}
		
		else
		{
		    $job_id = $this->data['Authcode']['job_id'];
		    $job = $this->Job->findByJobId($job_id);
			//debug($job); 
			if(empty($job)){
				$this->Session->setFlash("Job ID:$job_id cannot be found.");
				$this->redirect(array ('controller' => 'jobs', 'action' => 'view/'.$job_id));
				exit;
			}
			$task_id = $this->data['Authcode']['task_id'];
			$task = $this->Task->find('first',array('conditions'=>array('job_id'=>$job_id,'task_id'=>$task_id)));
			if(empty($task)){
				$this->Session->setFlash("Task ID:$task_id for Job ID:$job_id cannot be found.");
				$this->redirect(array ('controller' => 'jobs', 'action' => 'view/'.$job_id));
				exit;
			}
		    
		    $min = 667101;
			$max = 11115111; 
			$rand  = rand($min,$max);
			//echo "$rand";
			
			$this->set('job_id', $this->data['Authcode']['job_id']);
			$this->set('task_id', $this->data['Authcode']['task_id']);
			$this->set('node_name', $this->data['Authcode']['node_name']);
			$this->set('key',$rand);
			$this->data['Authcode']['auth_code'] = $rand;
			$this->data['Authcode']['tckt_id'] = $this->data['Authcode']['job_id'].".".$this->data['Authcode']['task_id'];
			$this->data['Authcode']['timestamp'] = date( 'Y-m-d H:i:s');
			$this->Authcode->save($this->data);
			
			$this->sendEmailToLineManager($this->data,$job['Job']);	
			if (Authsome::get ('user_group_id') == $this->Groupid->getGroupID(Groupid::LM_GROUP)){
				$this->Session->setFlash("Please note that a copy of the authorization code has been e-mailed to you.");
			}
			
			if (Authsome::get ('user_group_id') == $this->Groupid->getGroupID(Groupid::ENG_GROUP)){
				$this->sendEmailToEngineer($this->data,$job['Job']);
				$this->Session->setFlash("Authorization Request Sent to Line Manager.");
				$this->redirect(array ('controller' => 'jobs', 'action' => 'view/'.$job_id));
				exit;
			}					
		}
    }
    
    public function sendEmailToEngineer($data,$job){
		//debug($data);
		//debug($job);
        //exit();
        
        //fetch node info
        $node = $this->Node->find('first',array('conditions'=>array('job_id'=>$data['Authcode']['job_id'],'task_id'=>$data['Authcode']['task_id'],'concerned_node'=>$data['Authcode']['node_name'])));
        
        //fetch manager e-mail address
        $manager = $this->User->findByUsername($job['Signum']);
        
        $data['Job'] = $job;
        $data['Authcode']['show'] = 0;
        $data['Authcode']['engineer_name'] = Authsome::get('first_name')." ".Authsome::get('last_name');
        $data['Authcode']['node_type'] = $node['Node']['node_type'];
        $this->set('data',$data);
		$this->render = false;
		
		
		$this->Email->to = Authsome::get('email');
		$this->Email->bcc = 'PDLNAMIRTA@ex1.eamcs.ericsson.se';
		$this->Email->replyTo = 'PDLNAMIRTA@ex1.eamcs.ericsson.se';
		$this->Email->return = 'PDLNAMIRTA@ex1.eamcs.ericsson.se';

		$this->Email->subject = "RNAM-PQR: SnJ Request Authorization Code";
		$this->Email->from = 'PQR_notification@ericsson.com';
		$this->Email->template = 'snj_auth_code';
		$this->Email->sendAs = 'html';
		$this->Email->send();
    }
    
    public function sendEmailToLineManager($data,$job){
		//debug($data);
		//debug($job);
        //exit();
        
        //fetch node info
        $node = $this->Node->find('first',array('conditions'=>array('job_id'=>$data['Authcode']['job_id'],'task_id'=>$data['Authcode']['task_id'],'concerned_node'=>$data['Authcode']['node_name'])));
        
        //fetch manager e-mail address
        $manager = $this->User->findByUsername($job['Signum']);
        
        $data['Job'] = $job;
        $data['Authcode']['show'] = 1;
        if (Authsome::get ('user_group_id') == $this->Groupid->getGroupID(Groupid::ENG_GROUP)){
        	$data['Authcode']['engineer_name'] = Authsome::get('first_name')." ".Authsome::get('last_name');
        }
        $data['Authcode']['node_type'] = $node['Node']['node_type'];
        $this->set('data',$data);
		$this->render = false;
		
		$this->Email->to = $manager['User']['email'];
		$this->Email->bcc = 'PDLNAMIRTA@ex1.eamcs.ericsson.se';
		$this->Email->replyTo = 'PDLNAMIRTA@ex1.eamcs.ericsson.se';
		$this->Email->return = 'PDLNAMIRTA@ex1.eamcs.ericsson.se';

		$this->Email->subject = "RNAM-PQR: SnJ Request Authorization Code";
		$this->Email->from = 'PQR_notification@ericsson.com';
		$this->Email->template = 'snj_auth_code';
		$this->Email->sendAs = 'html';
		$this->Email->send();	
    }
}
?>
