<?php
class CakefeedbacksController extends AppController {
	
	var $name = 'Cakefeedbacks';
	var $uses = array('Cakefeedback','Dropdown','Cakefeedbackcomment');
    var $helpers = array('Html', 'Session', 'Form', 'Js', 'DatePicker','Paginator','databaseFields','javascript');
    var $components = array('Session', 'Email', 'RequestHandler');

			function feedbackindex()
			{
			}
			
			function addfeedback()
			{
				$list = $this->Dropdown->find("all",array('fields'=>array('label','value'),'conditions'=>array('module_id'=>0),'order' => array('weight ASC','value')));
				$modules = array();
				foreach($list as $temp):
					$temp = $temp['Dropdown'];
					$modules[$temp['value']] = $temp['label'];
				endforeach;
				
				$signum = Authsome::get('username');
				$first = Authsome::get('first_name');
				$last = Authsome::get('last_name');
				$name = $first." ".$last;
				$email = Authsome::get('email');

				$this->set('modules',$modules);
				$this->set('signum',$signum);
				$this->set('name',$name);
				$this->set('email',$email);
			
				if (!empty($this->data)) {	
				
				
				$this->data['Cakefeedback']['date'] = date('Y-m-d H-i-s');
				$this->data['Cakefeedback']['email'] = $email;
				  if($this->data['Cakefeedback']['category'] == "Feedback")
						$this->data['Cakefeedback']['notes'] = $this->data['Cakefeedback']['notes_fb'];
				  elseif($this->data['Cakefeedback']['category'] == "Request")
						$this->data['Cakefeedback']['notes'] = $this->data['Cakefeedback']['notes_req'];
				$this->data['Cakefeedback']['status'] = 0;
				
				if(array_key_exists('priority', $this->data['Cakefeedback']) && $this->data['Cakefeedback']['priority'] == "")
				 {
					if($this->data['Cakefeedback']['category'] == "Feedback")
						$this->data['Cakefeedback']['priority'] = 0;
					else
						$this->data['Cakefeedback']['priority'] = 3;
				 }
				
				if ($this->Cakefeedback->saveAll($this->data)) { 
							
									$recent_id =  $this->Cakefeedback->getLastInsertId();
									$this->Session->setFlash("Feedback/Request has been added and email notification sent!");
									$this->sendEmailLL_feedback($recent_id,'Add Request/Feedback');
									$this->redirect(array('action' => 'viewfeedback', $recent_id));                                
							}
							else
							{                            
								$this->Session->setFlash("Not Saved!");
							}                        
				}			
			}
			
			
		function modifyfeedback()
		{		
			$signum = Authsome::get('username');
			$first = Authsome::get('first_name');
			$last = Authsome::get('last_name');
			$name = $first." ".$last;
			
			if(!empty($this->data))
			{				
				$id = $this->data['Cakefeedback']['id'];
				$query_status = "Select status as old_status from cakefeedbacks where id = '$id'";
				$result = $this->Cakefeedback->query($query_status);
				$result = $result[0]['cakefeedbacks']['old_status'];
				$flag = 0;
				
				if($this->data['Cakefeedback']['status'] != $result)
				{
					$new_status = $this->data['Cakefeedback']['status'];
					$query = "Update cakefeedbacks set status = '$new_status', sdt_signum = '$signum', sdt_name = '$name' where id = '$id'";
					$flagresult = $this->Cakefeedback->query($query);
					if($flagresult == false)
						$flag = 1;
				}				
				if(array_key_exists('comments', $this->data['Cakefeedbackcomment']) && $this->data['Cakefeedbackcomment']['comments'] != "")
				{
					$this->data['Cakefeedbackcomment']['signum'] = $signum;
					$this->data['Cakefeedbackcomment']['name'] = $name;
					$this->data['Cakefeedbackcomment']['cakefeedback_id'] = $this->data['Cakefeedback']['id'];					
					$this->data['Cakefeedbackcomment']['date'] = date('Y-m-d H-i-s');
					$date = date('Y-m-d H-i-s');
					$comments = addslashes($this->data['Cakefeedbackcomment']['comments']);
					$query1 = "Insert into cakefeedbackcomments (cakefeedback_id, signum, name, date, comments) values 
							('$id','$signum','$name','$date','$comments')";
					$flagresult1 = $this->Cakefeedbackcomment->query($query1);
					if($flagresult1 == false)
						$flag = 1;
				}
				else
					unset($this->data['Cakefeedbackcomment']);
					
				if($flag == 0)
				{
					$this->Session->setFlash("Feedback/Request has been modified and email notification sent!");
					$this->sendEmailLL_feedback($id,'Modify Request/Feedback');
				}
				else
				{
					
					$this->Session->setFlash("Not Saved!");
				}
				$this->redirect(array('action' => 'viewfeedback', $this->data['Cakefeedback']['id']));
			}
		}
			
		function presearch()
        {
			$list = $this->Dropdown->find("all",array('fields'=>array('label','value'),'conditions'=>array('module_id'=>0),'order' => array('weight ASC','value')));				$modules = array();
			foreach($list as $temp):
				$temp = $temp['Dropdown'];
				$modules[$temp['value']] = $temp['label'];
			endforeach;
			$this->set('modules',$modules);
            $this->Session->write('cond',null);
        }
		
		function search()
		{			 
			 if(!empty($this->data))
			 {
				$this->data = $this->data['Cakefeedback'];
				 foreach ($this->data as $key=>$value):
						if($value == "")
							$this->data[$key] = "%";
				 endforeach;
				 if($this->data['From'] == "%" || $this->data['To'] == "%")
				 {
					//$this->data['From'] = "1970-01-01";
					$this->data['From'] = "0000-00-00";
					$this->data['To'] = date("Y-m-d");
				 }
				 if($this->data['status'] != "%")
					$this->data['category'] = 'Request';
				 $condition = array(
										'id LIKE' => $this->data['id'],
										'signum LIKE' => $this->data['signum'],
										'name LIKE' => $this->data['name'],
										'module LIKE' => $this->data['module'],
										'category LIKE' => $this->data['category'],
										'priority LIKE' => $this->data['priority'],
										'status LIKE' => $this->data['status'],	
										'STR_TO_DATE(date, "%Y-%m-%d") BETWEEN ? AND ?' => array($this->data['From'],$this->data['To'])
										);
				$this->Session->write('cond',$condition);				
				$this->Session->write('limit',$this->data['pagination_count']);
			}
			//ini_set('memory_limit','-1');
            $cond = $this->Session->read("cond");   
			$this->set("condition_search", $cond);
			$limit = $this->Session->read("limit");
			$this->paginate = array(
					'limit' => $limit
					);
					//var_dump($cond);
			$data = $this->paginate('Cakefeedback',$cond);	
			if(empty($data))
			{
				$this->Session->setFlash("Data set is empty!");									
				$this->redirect(array('action' => 'presearch'));        
			}
            $this->set('data', $data);
		}
		
		function listall()
        {
            $this->Session->write('cond',null);
			$this->Session->write('limit',20);
            $this->redirect(array('action' => 'search'));			
        }
				
		function viewfeedback($id = null)
		{
			if($id == null)
                $id = $this->data['Cakefeedback']['id'];
            $view_fields = $this->Cakefeedback->find("all",array("conditions"=>array("id"=>$id)));
			$group = Authsome::get('user_group_id');
            $this->set('group', $group);
            $this->set("view_fields", $view_fields);    
		}
		
		function sendEmailLL_feedback($id = null,$action = null)
		{
			$dl = 'management';
			$view_fields = $this->Cakefeedback->find("all",array("conditions"=>array("id"=>$id)));
			$this->set("view_fields", $view_fields[0]);	
			$emails = $view_fields[0]['Cakefeedback']['email'];
			$this->sendEmail($dl,$emails,'Feedback_Request_','pqr_feedback',$action);
		}

}
?>