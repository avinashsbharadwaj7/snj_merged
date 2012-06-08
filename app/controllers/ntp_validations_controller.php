<?php
class NtpValidationsController extends AppController {
    
	var $name = 'NtpValidations';
	var $uses = array('NtpValidation','Dropdown','SparkPlug.User');
    var $helpers = array('Html', 'Session', 'Form', 'Js', 'DatePicker','Paginator','databaseFields','javascript','ntpdropdownLogics');
    var $components = array('Session', 'Email', 'RequestHandler');
	var $paginate = array(
            'NtpValidation'    => array(
                'limit'    => 20,
                'page'    => 1,
                'order'    => array(
                'NtpValidation.id'    => 'asc')
            ),
        );
		


        function index() {
	}

        //**************************************Add************************************************
        
        
        function add()
        {
            $this->set("dropdown_fields", $this->Dropdown->find("all",array('order' => array('weight ASC','value'), "conditions"=>array("module_id"=>"7"))));                        
            

            $signum = Authsome::get('username');
            $this->set("signum",$signum);
            $fname = Authsome::get('first_name');
            $lname = Authsome::get('last_name');
            $fullName = $fname.' '.$lname;
            $this->set("name",$fullName);

            
            
            if (!empty($this->data)) {
			
				$date_created = date("Y-m-d H:i:s");
				$this->data['NtpValidation']['date_created'] = $date_created;
				$this->data['NtpValidation']['date_modified'] = $date_created;
			
			if ($this->NtpValidation->saveAll($this->data)) {
                                
                                $recent_id =  $this->NtpValidation->getLastInsertId();
								
                                if($this->params['form']['Email'] == 'Submit without Email')
                                {
                                    $this->Session->setFlash("Report has been added with no email notification!");
                                    $this->redirect(array('action' => 'view', $recent_id));
                                }
                                else
                                {
                                    $this->Session->setFlash("Report has been added and email notification sent!");
									$this->sendEmailNTP($recent_id,'Add Report');
									$this->redirect(array('action' => 'view', $recent_id));
								}
			}
                        else
                            $this->Session->setFlash("Not Saved!");			
        }
	}


      /*  function premodify()
        {
            //$this->set("ids", $this->NtpValidation->find("all",array('fields' => 'id')));            
        }
		
		
		
        function modify($id = null)
        {           
            $this->set("dropdown_fields", $this->Dropdown->find("all",array('order' => array('weight ASC','value'), "conditions"=>array("module_id"=>"2"))));
            $this->set("tcm_fields",$this->User->getTCMenggs());
            $signum = Authsome::get('username');
            $this->set("sig", $signum);

            
           $date_modified = date("Y-m-d");
			
             if (!empty($this->data)) {
			 
			 
						$Week = date("w");
						$time = date('H-m-s');
                        $this->data['NtpValidation']['id'] = substr($this->data['NtpValidation']['id'],4);
                        $this->data['NtpValidation']['date_modified'] = $date_modified;
						if(isset($this->data['Slfile'])) {
							//save all valid uploads
							$this->saveUploadState('Slfile');
						}
						
                        if ($this->NtpValidation->saveAll($this->data)) {
																
								$recent_id =  $this->data['NtpValidation']['id'];
								//$this->Slfile->deleteAll(array('Slfile.NtpValidation_id' => $recent_id, 'Slfile.file_name' => ""));
								
                                
                                if($this->params['form']['Email'] == 'Update without Email')
                                {
                                    $this->Session->setFlash("Report has been updated with no email notification!");
									$this->deleteUploadState('Slfile');
                                    $this->redirect(array('action' => 'view', $recent_id));
                                }
                                else
                                {
                                    $this->Session->setFlash("Report has been updated and email notification sent!");
									$this->deleteUploadState('Slfile');	
									$this->sendEmailSL($recent_id,'Modify Report');
									$this->redirect(array('action' => 'view', $recent_id));
								}
						}
                        else
                        {
                            $this->Session->setFlash("Not Updated!");
                            $this->set("modify_fields_full",$this->data);
							$tcm_lead = $this->Session->read("tcm_lead");
							$this->set("tcm_lead", $tcm_lead);
                        }
            }
			else
            {
				if(!empty($this->params['url']['id']))            
				{
					$id = $this->params['url']['id'];
					$this->data = $this->NtpValidation->read(null, $id);
					if(empty($this->data))
					{
						$this->Session->setFlash(__('SLR Number does not exist', true));
						 $this->redirect(array('action' => 'premodify'));
					}
					
					 $reg_temp = $this->data['NtpValidation']['region'];
					 $reg_temp = substr($reg_temp, 6);
					 $tcm_leads = $this->User->getTCMLead($reg_temp);
					 
					 
					 foreach($tcm_leads as $x):
						 $tcm_lead[$x['User']['username']] = $x['User']['username'];
					 endforeach;
					$this->Session->write("tcm_leads", $tcm_leads);
					 $this->set("tcm_lead", $tcm_lead);

					 if($signum != $this->data['NtpValidation']['nic_signum'] && $signum != $this->data['NtpValidation']['tcm_signum'] && !in_array($signum,$tcm_lead))
					 {
						 $this->Session->setFlash(__('You do not have permissions to edit this report', true));
						 $this->redirect(array('action' => 'premodify'));
					 }

				/*	$reg_temp = $this->data['NtpValidation']['region'];
					 $reg_temp = substr($reg_temp, 6);
					 $tcm_leads = $this->User->getTCMLead($reg_temp);
					 foreach($tcm_leads as $x):
						 $tcm_lead[$x['User']['username']] = $x['User']['username'];
					 endforeach;
					 $this->set("tcm_lead", $tcm_lead);*/
			/*	}
				
				$this->Session->write("file_number", 1);
				$this->prepareUploadState('Slfile');
                $this->set("modify_fields_full", $this->data);
            }

        }
		*/
		
        function view($id = null)
        {
            if($id == null)
                $id = $this->data['NtpValidation']['id'];
            $view_fields = $this->NtpValidation->find("all",array("conditions"=>array("id"=>$id)));
            $this->set("view_fields", $view_fields);
        }
		
		
		function sendEmailNTP($id = null, $action = null)
		{				
				$this->render = false;
				$dl = 'management';
				$this->set("view_fields", $this->data);
				$this->set("id", $id);
				
				/*if($this->data['NtpValidation']['region'] == "North Central")
					$dl = $dl.'SL_NC;';
				elseif($this->data['NtpValidation']['region'] == "South Central")
					$dl = $dl.'SL_SC;';
				elseif($this->data['NtpValidation']['region'] == "North East")
					$dl = $dl.'SL_NE;';
				elseif($this->data['NtpValidation']['region'] == "South East")
					$dl = $dl.'SL_SE;';
				elseif($this->data['NtpValidation']['region'] == "North West")
					$dl = $dl.'SL_NW;';
				elseif($this->data['NtpValidation']['region'] == "South West")
					$dl = $dl.'SL_SW;';
					*/	
				
				$emails = explode("\r\n", $this->data['NtpValidation']['email']);										
				$emails = implode("", $emails);	
								
                $this->sendEmail($dl,$emails,'NTP_Validation_','ntp',$action);
		}


        function presearch()
        {
            $this->set("dropdown_fields", $this->Dropdown->find("all",array('order' => array('weight ASC','value'), "conditions"=>array("module_id"=>"7"))));
        }

        function conds()
        {                
                 if ( !empty($this->data ) )
                   {					
                        $this->data = $this->data['NtpValidation'];
						
						if($this->data['search'] != "%")
						{							
							if($this->data['search'] == "Y")
							{                           
								$yr = $this->data['year'];
								$cond = array("customer LIKE "=>$this->data['customer_search'], "region LIKE "=>$this->data['region_search'], "work_location LIKE "=>$this->data['work_location_search'],"activity_type LIKE "=>$this->data['activity_type_search'],"final_results LIKE "=>$this->data['final_results_search'], "substr(date_created,1,4)"=>$yr);
							}
							else if($this->data['search'] == "D")
							{                            
								$cond = array("customer LIKE "=>$this->data['customer_search'], "region LIKE "=>$this->data['region_search'], "work_location LIKE "=>$this->data['work_location_search'],"activity_type LIKE "=>$this->data['activity_type_search'],"final_results LIKE "=>$this->data['final_results_search'], "STR_TO_DATE(date_created, '%Y-%m-%d') BETWEEN ? AND ?"=>array($this->data['From'],$this->data['To']));
							}
						}
						else
						{
							$cond = array("customer LIKE "=>$this->data['customer_search'], "region LIKE "=>$this->data['region_search'], "work_location LIKE "=>$this->data['work_location_search'],"activity_type LIKE "=>$this->data['activity_type_search'],"final_results LIKE "=>$this->data['final_results_search']);
						}
                        $this->Session->write('cond',$cond);
                   }
        }

			function showsearch()
			{
						$this->conds();
						$cond = $this->Session->read("cond");
						$data = $this->paginate('NtpValidation',$cond);
						if(empty($data))
						{
							$this->Session->setFlash("Data Set is Empty!!!");
                            $this->redirect(array('action' => 'presearch'));
						}
						$this->set('NtpValidations', $data);                 
			}

			function excel()
			{
						ini_set('memory_limit','-1');
						$this->layout = 'ajax';
						$cond = $this->Session->read("cond");
						$this->set("row", $this->NtpValidation->find("all",array('conditions' => $cond)));
			}
		
			function listall()
			{
				$this->Session->write('cond',null);
				$this->Session->write('search_criteria_cond',null);
				$this->redirect(array('action' => 'showsearch'));
			}
		
		
				
}
?>