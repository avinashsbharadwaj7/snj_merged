<?php

/*
 * CSR Controller
 *
 */

class CsrmastersController extends AppController 
{

    var $name = 'Csrmasters';
    var $helpers = array('Html', 'Form', 'Javascript', 'DatabaseFields', 'Ajax', 'ShowFields', 'DatePicker');
    var $components = array('Session', 'Email');
     
    var $paginate = array(
        'limit' => 10,
        'page' => 1,
        'order' => array(
        'Csrmaster.id' => 'asc'
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
        $this->Session->setFlash(__('Invalid CSR ID ', true));
        $this->redirect(array('action' => 'index'));
       }
       $this->set('dataValues', $this->Csrmaster->read(null, $id));  //dataValues does not become a variable until the view is launched.
       //var_dump($this->Csrmaster->read(null, $id));
       
     //  $this->set(compact('action_link'));
     //  $this->set(compact('action_arg_1'));
        // echo $action_link;
      /* if($action_link == 'sendEmail')
       {
	//$email_list = 'management;'.$action_arg_1;
	$this->sendEmail('management;', $action_arg_1, 'CSR', 'csr'); 
       }  */
    }
    
  function add() 
    {   
        //var_dump($this->data);
        if (!empty($this->data)) 
        {
         //$this->Csrmaster->create();
         if(isset($this->data['Csrfile'])) 
         {
                //save all valid uploads
                $this->saveUploadState('Csrfile');
         }       
         
         if($this->Csrmaster->saveAll($this->data)) 
         {  /* validation passes */
            //$this->Session->setFlash(__('Data has been saved', true)); 
            //$this->redirect(array('action' => 'view', $this->Csrmaster->id));
            if($this->params['form']['Email'] == 'Submit without Email')
            {									
             $this->Session->setFlash("Report has been added with no email notification!");                                    
            // $this->redirect(array('action' => 'view', $this->Csrmaster->id, 'noEmail', 'noEmail'));
             $this->redirect(array('action' => 'view', $this->Csrmaster->id));
            }
            else
            {
             $this->Session->setFlash("Report has been added and email notification sent!");
           //  $this->redirect(array('action' => 'view', $this->Csrmaster->id,'sendEmail', $this->data['Csrmaster']['email']));
             $this->sendEmailSL($this->Csrmaster->id, "Add Report"); 
             $this->redirect(array('action' => 'view', $this->Csrmaster->id));
            }

         }
         else 
            {    
             $this->Session->setFlash(__('Data could not be saved. Please try again.', true));
            }
        }
        else 
        {
            $this->deleteUploadState('Csrfile');
        }
    }
    
    function sendEmailSL($id, $action)
    {
        $this->set('dataValues', $this->Csrmaster->read(null, $id));
	$this->render = false;
	$emails = explode("\r\n", $this->data['Csrmaster']['email']);										
	$emails = implode("", $emails);	
        /*$this->sendEmail($dl,$emails,'ScriptLoad','sl');*/
        $this->sendEmail('management;', $emails, 'CSR', 'csr', $action);
    }
  
    function edit($search_id = null, $use_id = false)
    {
      if(!empty($this->data['Csrmaster']['enteredId'])|| $use_id)
      {
       /* true once an ID is entered or one is supplied */
        if(!$use_id) 
        {
         /* if false, then use the entered ID */
         $search_id = $this->data['Csrmaster']['enteredId'];
        }
        $this->data = $this->Csrmaster->read(null, $search_id); 
        if(empty($this->data))
        {
        /* if this->data is still empty, then it means the entered id is not valid. */
        $this->Session->setFlash(__('Invalid CSR ID: ' . $search_id, true));
        $this->redirect(array('action' => 'edit'));
        }
        /* we now need to check for authorization */
        if(Authsome::get('username') != $this->data['Csrmaster']['nic_signum']) 
        {
        $this->Session->setFlash(__('You are not authorized to edit this CSR (ID = ' . $this->Csrmaster->id . ')', true));
        $this->redirect(array('action' => 'view', $this->Csrmaster->id, 'edit'));
        }
        $this->prepareUploadState('Csrfile');
        /* Assign variable to the current id that we are working with. */
        $this->set('csrId', $this->Csrmaster->id);
      }
     else if (!empty($this->data)) 
        {
        // $this->Csrmaster->create();
                  if(isset($this->data['Csrfile'])) 
                 {
                     //save all valid uploads
                    $this->saveUploadState('Csrfile');
                 }       

         if($this->Csrmaster->saveAll($this->data)) 
         {  /* validation passes */
            //$this->Session->setFlash(__('Data has been saved', true)); 
            //$this->redirect(array('action' => 'view', $this->Csrmaster->id));
            if($this->params['form']['Email'] == 'Submit without Email')
            {									
             $this->Session->setFlash("Report has been added with no email notification!");                                    
            // $this->redirect(array('action' => 'view', $this->Csrmaster->id, 'noEmail', 'noEmail'));
             $this->redirect(array('action' => 'view', $this->Csrmaster->id));
            }
            else
            {
             $this->Session->setFlash("Report has been added and email notification sent!");
            // $this->redirect(array('action' => 'view', $this->Csrmaster->id,'sendEmail', $this->data['Csrmaster']['email']));
             $this->sendEmailSL($this->Csrmaster->id, "Modify Report"."-".$this->data['Csrmaster']['id']);
             $this->redirect(array('action' => 'view', $this->Csrmaster->id));
            }   
         }
         else 
         {    
            $this->Session->setFlash(__('Data could not be saved. Please try again.', true));
         }
        }
        
        else 
        {
            $this->deleteUploadState('Csrfile');
        }

         $this->set('csrId', $this->Csrmaster->id);
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
     $this->Csrmaster->set($this->data);
     $this->Session->write('searchSession', $this->data);
       /* if(!$this->Csrmaster->validates()) 
        {
            $conditions_entered = false;
            $this->Csrmaster->invalidFields();
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
            $conditions = $this->__getConditions($this->data['Csrmaster']);
            $this->set('csrQuery', $this->paginate('Csrmaster', $conditions));
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
                                 
        if(!$this->__isEmpty($data['date_initiated'])) 
        {
            //$conditions['Csrmaster.date_initiated'] = $this->__implodeDate($data['dateCreated']);
            $conditions['Csrmaster.date_initiated'] = $data['date_initiated'];
        }
        
        if(!$this->__isEmpty($data['network_number'])) 
        {
            $conditions['Csrmaster.network_number'] = $data['network_number'];
        }
        
        if(!$this->__isEmpty($data['csrid'])) 
        {
            $conditions['Csrmaster.id'] = $data['csrid'];
        }
        
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
    
    
    
    
    
    
}

?>
