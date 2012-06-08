<?php

class CdmamastersController extends AppController 
{

    var $name = 'Cdmamasters';
    var $helpers = array('Html', 'Form', 'Javascript', 'DatabaseFields', 'Ajax', 'ShowFields', 'DatePicker');
    var $components = array('Session', 'Email');
     
    var $paginate = array(
        'limit' => 10,
        'page' => 1,
        'order' => array(
        'Cdmamaster.id' => 'asc'
        )
    );

    function index() 
    {
        /* placeholder */
    }
    
    function view($id = null, $action_link = 'index', $action_arg_1 = false) 
    { 
       if(!$id) 
       {
        $this->Session->setFlash(__('Invalid CDMA ID ', true));
        $this->redirect(array('action' => 'index'));
       }
       $this->set('dataValues', $this->Cdmamaster->read(null, $id));  //dataValues does not become a variable until the view is launched.

    }
    
    function add()
    {
        
        if (!empty($this->data)) 
        {
         //$this->Cdmamaster->create();
         if(isset($this->data['Cdmafile'])) 
         {
                //save all valid uploads
                $this->saveUploadState('Cdmafile');
         }     
         
         if($this->Cdmamaster->saveAll($this->data)) 
         {  /* validation passes */
            //$this->Session->setFlash(__('Data has been saved', true)); 
            //$this->redirect(array('action' => 'view', $this->Cdmamaster->id));
           
            if($this->params['form']['Email'] == 'Submit without Email')
            {									
             $this->Session->setFlash("Report has been added with no email notification!");  
            
            
            $this->redirect(array('action' => 'view', $this->Cdmamaster->id));
            }
            else
            {
             $this->Session->setFlash("Report has been added and email notification sent!");
             $this->sendEmailSL($this->Cdmamaster->id, "Add Report"); 
             $this->redirect(array('action' => 'view', $this->Cdmamaster->id));
            }

         }
         else 
            {    
             $this->Session->setFlash(__('Data could not be saved. Please try again.', true));
            }
        }
        else 
        {
            $this->deleteUploadState('Cdmafile');
        }   
    }
    
    function edit($search_id = null, $use_id = false)
    {
      
      if(!empty($this->data['Cdmamaster']['enteredId'])|| $use_id)
      {
       /* true once an ID is entered or one is supplied */
        if(!$use_id) 
        {
         /* if false, then use the entered ID */
         $search_id = $this->data['Cdmamaster']['enteredId'];
        }
        $this->data = $this->Cdmamaster->read(null, $search_id); 
        
        if(empty($this->data))
        {
        /* if this->data is still empty, then it means the entered id is not valid. */
        $this->Session->setFlash(__('Invalid CDMA ID: ' . $search_id, true));
        $this->redirect(array('action' => 'edit'));
        }
        /* we now need to check for authorization */
        if(Authsome::get('username') != $this->data['Cdmamaster']['nic_signum']) 
        {
        $this->Session->setFlash(__('You are not authorized to edit this CDMA (ID = ' . $this->Cdmamaster->id . ')', true));
        $this->redirect(array('action' => 'view', $this->Cdmamaster->id, 'edit'));
        }
        $this->prepareUploadState('Cdmafile');
        /* Assign variable to the current id that we are working with. */
        $this->set('cdmaId', $this->Cdmamaster->id);
      }
     else if (!empty($this->data)) 
        {
                 if(isset($this->data['Cdmafile'])) 
                 {
                     //save all valid uploads
                    $this->saveUploadState('Cdmafile');
                 }       

         if($this->Cdmamaster->saveAll($this->data)) 
         {  /* validation passes */
            if($this->params['form']['Email'] == 'Submit without Email')
            {									
             $this->Session->setFlash("Report has been added with no email notification!");                                    
            // $this->redirect(array('action' => 'view', $this->Cdmamaster->id, 'noEmail', 'noEmail'));
             $this->redirect(array('action' => 'view', $this->Cdmamaster->id));
            }
            else
            {
             $this->Session->setFlash("Report has been added and email notification sent!");
             $this->sendEmailSL($this->Cdmamaster->id, "Edit Report"); 
             $this->redirect(array('action' => 'view', $this->Cdmamaster->id));
            }   
         }
         else 
         {    
            $this->Session->setFlash(__('Data could not be saved. Please try again.', true));
         }
        }
        
        else 
        {
            $this->deleteUploadState('Cdmafile');
        }

         $this->set('cdmaId', $this->Cdmamaster->id);
    } 

    function search($use_args=null)
    {
     if(empty($this->data)) 
     {
       /* either a new session, or update to pagination */
       if(empty($this->passedArgs) && empty($this->params['pass'])) 
       {
         /* new search session */
         $this->Session->delete('searchSession');
         $this->Session->delete('paginatorArgs');
         $this->Session->delete('session_conditions');
         $conditions_entered = false;
       }
       else 
       {
         /* same session, prolly updated pagination */
         $this->data = $this->Session->read('searchSession');
         if($use_args == 'fromView') 
         {
         /* use args passed into function */
         $this->passedArgs = $this->Session->read('paginatorArgs');
         }
       } 
     }
     if(!empty($this->data)) 
     {
     /* conditions entered */
     $this->Cdmamaster->set($this->data);
     $this->Session->write('searchSession', $this->data);
       /* if(!$this->Cdmamaster->validates()) 
        {
            $conditions_entered = false;
            $this->Cdmamaster->invalidFields();
        }
        else */
        {
            if($use_args == 'fromSearchResults') 
            {
            /* hitting back in the results */
            $conditions_entered = false;
            }
            else 
            {
            $conditions_entered = true;
            }
            $this->set('conditions_entered', $conditions_entered);
            $conditions = $this->__getConditions($this->data['Cdmamaster']);
            $this->set('cdmaQuery', $this->paginate('Cdmamaster', $conditions));
            $this->Session->write('session_conditions', $conditions);
        }
      }
        $this->set('conditions_entered', $conditions_entered);
        $this->Session->write('paginatorArgs', $this->passedArgs);
        $this->params['pass'] = array(); //clear all passed in args
   
    }
    
    private function __getConditions($data) 
    {
        $conditions = array();
        //var_dump($data);
        if(!$this->__isEmpty($data['nic_signum'])) 
        {
            $conditions['Cdmamaster.nic_signum'] = $data['nic_signum'];
        }
                                 
        if (!$this->__isEmpty($data['From']) && !$this->__isEmpty($data['To']))
        {   
            $conditions['Cdmamaster.date_activity_performed  BETWEEN ? AND ?'] = array($data['From'],$data['To']);    
        }
        
        if(!$this->__isEmpty($data['network_id'])) 
        {
            $conditions['Cdmamaster.network_id'] = $data['network_id'];
        }
        
        if(!$this->__isEmpty($data['cdmaid'])) 
        {
            $conditions['Cdmamaster.id'] = $data['cdmaid'];
        }
        //var_dump($conditions);
        return $conditions;
    }
    
    private function __isEmpty($value)
    {
        return ($value == null || empty($value) || $value == "") ? true : false;
    }
    
    function updater()
    {
      $this->layout = 'ajax';
    }
    
    function sendEmailSL($id, $action)
    {
        $this->set('dataValues', $this->Cdmamaster->read(null, $id));
	$this->render = false;
	$emails = explode("\r\n", $this->data['Cdmamaster']['email_addresses']);										
	$emails = implode("", $emails);	
        $subject = "Customer:" . $this->data['Cdmamaster']['customer'] . ", CDMA Activity Type:" . $this->data['Cdmamaster']['activity_type'];
        $subject = "RNAM-PQR: " . $action . " - " . $subject;
        /*$this->sendEmail($dl,$emails,'ScriptLoad','sl');*/
        $this->sendEmail('management;', $emails, 'CDMA', 'cdma', $subject);
    }
    
        function cdmaexcel($id = null, $use_id=false) {
        ini_set('memory_limit', '-1');
        $this->layout = 'ajax';
        
        if(!$use_id) {
            /* from search */
            $cond = $this->Session->read('session_conditions');
            $this->set("row", $this->Cdmamaster->find("all",array('conditions' => $cond)));
            //var_dump($cond);
                    }
       else {
            //from view 
            $this->set("row", $this->Cdmamaster->find("all",array('conditions' => array('id' => $id))));
        }
    }


}



?>