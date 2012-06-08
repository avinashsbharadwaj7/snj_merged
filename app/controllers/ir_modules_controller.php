<?php
class IrModulesController extends AppController {
        
	var $name = 'IrModules';
        var $uses = array('IrModule','IrFile','IrIssue','IrAdditionalEngineer','Dropdown','SparkPlug.User', 'IrRssireading');
        var $helpers = array('Html', 'Session', 'Form', 'Js', 'Javascript','DatePicker', 'Ajax','IrDependentArray','Paginator','databaseFields');        
        var $components = array('Session', 'Email', 'RequestHandler');
        //Used for IR Excel!
        var $paginate = array(
            'limit' => 15,
            'page' => 1,
            'order' => array(
            'IrModule.id' => 'desc'
            )
        );
        
	function listall() {
		$this->IrModule->recursive = 0;
		$this->set('irModules', $this->paginate());
	}

        function index(){
            
        }

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid report id', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('irModule', $this->IrModule->read(null, $id));
	}

	function add() {
            
            $this->set("dropdown_fields", $this->Dropdown->find("all",array('order' => array('weight ASC','value'), "conditions"=>array("module_id"=>"2"))));                         
            //$this->set('tcm_fields', $this->User->getTCMenggs());
            App::import('model', 'User');
            $user = new User();                 
            $this->set('tcm_fields', $user->find("all",array('conditions'=>
                array("tcm_rights"=>array('1','2','3')), 'order'=> 'username ASC')));
            
                     
            $signum = Authsome::get('username');
            $this->set("signum",$signum);
            $fname = Authsome::get('first_name');
            $lname = Authsome::get('last_name');
            $fullName = $fname.' '.$lname;
            $this->set("name",$fullName);

		if (!empty($this->data)) {
                    
                     //var_dump($this->data);
                    // exit();
                     if(isset($this->data['IrFile'])) 
                     {
                            //save all valid uploads
                            $this->saveUploadState('IrFile');
                     }     

			if(!empty($this->data['IrModule']['sub_activities']))
                                $this->data['IrModule']['sub_activities'] = implode ("|", $this->data['IrModule']['sub_activities']);
                        $this->IrModule->create();
                        $this->_ignoreAdditionalEngineer();
                        $this->set('irModule', $this->data);
                        
                        if (($this->IrModule->saveAll($this->data))) 
						{
                                                    if($this->params['form']['Email'] == 'Submit without Email')
                                                    {									
                                                     $this->Session->setFlash("Report has been added with no email notification!");  


                                                    $this->redirect(array('action' => 'view', $this->IrModule->id));
                                                    }
                                                    else
                                                    {
                                                     $this->Session->setFlash("Report has been added and email notification sent!");
                                                     $this->sendEmailSL($this->IrModule->id, "Add Report"); 
                                                     $this->redirect(array('action' => 'view', $this->IrModule->id));
                                                    }
						} 
						else 
						{
							$this->Session->setFlash(__('Data could not be saved. Please, try again.', true));
						}
		}
                else {
                           
                    $this->deleteUploadState('IrFile');
                }
                
                $this->set('irModule', $this->data);
                
                $this->Session->write("additional_engineer_number", 1);
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
       if(empty($this->data['IrModule']['region'])){
           $this->data['IrModule']['market'] = '';
       }  
     /* conditions entered */
     $this->IrModule->set($this->data);
     $this->Session->write('searchSession', $this->data);
       /* if(!$this->IrModule->validates()) 
        {
            $conditions_entered = false;
            $this->IrModule->invalidFields();
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
            $conditions = $this->__getConditions($this->data['IrModule']);
            //var_dump($conditions);
            $this->set('irQuery', $this->paginate('IrModule', $conditions));
            $this->Session->write('session_conditions', $conditions);
        }
      }
        $this->set('conditions_entered', $conditions_entered);
        $this->Session->write('paginatorArgs', $this->passedArgs);
        $this->params['pass'] = array(); //clear all passed in args
   
    }
//    private function __GetTcmEngg()
//    {
//        return $this->find("all",array('conditions'=>array("tcm_rights"=>array('1','2','3')), 'order'=> 'username ASC'));		
//    }
private function __getConditions($data) 
    {        
        $conditions = array();
        
        if(!$this->__isEmpty($data['irid'])) 
        {
            $conditions['IrModule.id'] = $data['irid'];
        }
                                 
        if(!$this->__isEmpty($data['activity_type'])) 
        {
            //var_dump($data['activity_type']);
            if($data['activity_type'] == "Baseline")
            {    
                $data['activity_type'] = array("2nd Carrier Add"=>"2nd Carrier Add",                    
                    "3rd carrier Add Cable Crossover Solution (Iub over ATM)"=>"3rd carrier Add Cable Crossover Solution (Iub over ATM)",
                    "3rd carrier Add Cable Crossover Solution (Iub over IP)"=>"3rd carrier Add Cable Crossover Solution (Iub over IP)",
                    "4th carrier add in 2nd cabinet"=>"4th carrier add in 2nd cabinet", 
                    "3rd Carrier Add using OBIF & RRUW"=>"3rd Carrier Add using OBIF & RRUW", 
                    "4th carrier add using OBIF & RRUW"=>"4th carrier add using OBIF & RRUW", 
                    "New Integration (lub over ATM)"=>"New Integration (lub over ATM)", 
                    "New Integration (lub over IP)"=>"New Integration (lub over IP)");
                $conditions['IrModule.activity_type'] = $data['activity_type'];
            }
            elseif($data['activity_type'] == "NIC-Day Time Activities"){
                 $temp = $this->Dropdown->find('all', array('conditions'=>array("Dropdown.field"=>"activities_search_ir")));
                 foreach($temp as $tmp){
                     $conditions['IrModule.activity_type'][] = $tmp['Dropdown']['value'];
                 }
            }
            elseif($data['activity_type'] == "Smart Laptop"){                  
                $temp = $this->Dropdown->find('all', array('conditions'=>array("Dropdown.field"=>"smart_laptop_activities")));                                
                 foreach($temp as $tmp){
                     $conditions['IrModule.activity_type'][] = $tmp['Dropdown']['value'];
                 }                
            }          
            elseif($data['activity_type'] == "VOC"){
                $temp = $this->Dropdown->find('all', array('conditions'=>array("Dropdown.field"=>"voc_activities")));                
                foreach($temp as $tmp){
                    $conditions['IrModule.activity_type'][] = $tmp['Dropdown']['value'];
                }
            }
            else $conditions['IrModule.activity_type'] = $data['activity_type'];
        }

        if (!$this->__isEmpty($data['From']) && !$this->__isEmpty($data['To']))
        {   
            $conditions['IrModule.date_activity_performed  BETWEEN ? AND ?'] = array($data['From'],$data['To']);    
        }
        if(!$this->__isEmpty($data['region'])) 
        {
            $conditions['IrModule.region'] = $data['region'];
        }

        if(!$this->__isEmpty($data['engineer_work_location'])) 
        {
            $conditions['IrModule.engineer_work_location'] = $data['engineer_work_location'];
        }

        if(!$this->__isEmpty($data['engineer_signum'])) 
        {
            $conditions['IrModule.engineer_signum'] = $data['engineer_signum'];
        }

        if(!$this->__isEmpty($data['customer'])) 
        {
            $conditions['IrModule.customer'] = $data['customer'];
        }

        if(!$this->__isEmpty($data['access_method'])) 
        {
            $conditions['IrModule.access_method'] = $data['access_method'];
        }
        
        if(!$this->__isEmpty($data['network_number'])) 
        {
            $conditions['IrModule.network_number'] = $data['network_number'];
        }
        
        if(!$this->__isEmpty($data['market'])){           
            $conditions['IrModule.market'] = $data['market'];
        }        
        return $conditions;
    }
    
    private function __isEmpty($value)
    {
        return ($value == null || empty($value) || $value == "") ? true : false;
    }

    function edit($search_id = null, $use_id = false)
    {
            App::import('model', 'User');
            $user = new User();                 
            $this->set('tcm_fields', $user->find("all",array('conditions'=>
                array("tcm_rights"=>array('1','2','3')), 'order'=> 'username ASC')));
        
      $this->set('tcm_fields', $this->User->getTCMenggs());
      if(!empty($this->data['IrModule']['enteredId'])|| $use_id)
      {
       /* true once an ID is entered or one is supplied */
        if(!$use_id) 
        {
         /* if false, then use the entered ID */
         $search_id = $this->data['IrModule']['enteredId'];
        }
        $this->data = $this->IrModule->read(null, $search_id); 
        $this->set('irModule', $this->data);
        if(empty($this->data))
        {
        /* if this->data is still empty, then it means the entered id is not valid. */
        $this->Session->setFlash(__('Invalid IR ID: ' . $search_id, true));
        $this->redirect(array('action' => 'edit'));
        }
        /* we now need to check for authorization */
        if(Authsome::get('username') != $this->data['IrModule']['engineer_signum']) 
        {
        $this->Session->setFlash(__('You are not authorized to edit this IR (ID = ' . $this->IrModule->id . ')', true));
        $this->redirect(array('action' => 'view', $this->IrModule->id, 'edit'));
        }
        $this->prepareUploadState('IrFile');
        /* Assign variable to the current id that we are working with. */
        $this->set('irId', $this->IrModule->id);
      }
     else if (!empty($this->data)) 
        {
         //var_dump($this->data);
                 if(isset($this->data['IrFile'])) 
                 {
                     //save all valid uploads
                    $this->saveUploadState('IrFile');
                 }       
                        if(!empty($this->data['IrModule']['sub_activities']))
                        $this->data['IrModule']['sub_activities'] = implode ("|", $this->data['IrModule']['sub_activities']);
                        $this->IrModule->create();
                        $this->_ignoreAdditionalEngineer();
                        $this->set('irModule', $this->data);
                        //$this->data['IrRssireading']['sh_carrier'] = $this->data['IrModule']['sh_selectcarrier'];
        
         if(($this->IrModule->saveAll($this->data)))
         {  /* validation passes */
             //debug($this->params);
            if($this->params['form']['Email'] == 'Submit without Email')
            {	                
             $this->Session->setFlash("Report has been added with no email notification!");                                    
            // $this->redirect(array('action' => 'view', $this->IrModule->id, 'noEmail', 'noEmail'));
             $this->redirect(array('action' => 'view', $this->IrModule->id));
            }
            else
            {
             $this->Session->setFlash("Report has been added and email notification sent!");
             $this->sendEmailSL($this->IrModule->id, "Edit Report"); 
             $this->redirect(array('action' => 'view', $this->IrModule->id));
            }   
         }
         else 
         {    
            $this->Session->setFlash(__('Data could not be saved. Please try again.', true));
            $this->set('irId', $this->data['IrModule']['id']);
            //$this->redirect(array('action' => 'index'));
         }
        }
        
        else 
        {
            $this->deleteUploadState('IrFile');
        }

         //$this->set('irId', $this->IrModule->id);
         $this->Session->write("additional_engineer_number", 1);
    } 

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id. ', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->IrModule->delete($id)) {
			$this->Session->setFlash(__('Ir module deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ir module was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

		function download($id = null) {
                    debug($this->params);
                                $this->view = 'Media';				
				$name = $this->params['pass'][0]; 
                                $name = urldecode($name);
                                $fileprops = $this->IrFile->read(null, $id);
				$file = new File($name);
				$ext = $file->ext();			    		
				$pos = strpos($name, ".");                                                
				$name = substr($name, 0, $pos);                    
                                //$name = preg_replace("/[^a-zA-Z0-9]/", "", $name);
                    debug($name);                                                                    
                                $path = "/home/logs/IR/logs/ir/";    
                                //on server path "webroot/files/ir"
				//$path = APP . "webroot/files/ir". DS ;
				//$path = "C:".DS."wamp".DS."repository".DS."ir";
				$params = array(
					  'id' => $id,
					  'name' => $name,
                                          'mimeType' => $this->data['IrFile']['file_type'],
					  'download' => true,
					  'extension' => $ext,  
					  'path' => $path,
                                          'fileSize' => $this->data['IrFile']['file_size']
			   );
			  $this->set($params);
			}
                    
        function updater(){
            App::import('model', 'User');
            $user = new User();                 
            $this->set('tcm_fields', $user->find("all",array('conditions'=>
                array("tcm_rights"=>array('1','2','3')), 'order'=> 'username ASC')));

            $this->layout = 'ajax';
            if(!empty($this->params['pass'])){
                if($this->params['pass'] == "edit"){
                    $id = $this->Session->read("edit_id");
                    $this->data = $this->IrModule->read(null, $id);
                }
            }
            if(!isset($this->params['data'])):
                    $num = $this->_getNextEngineerNumber();
                    $this->set("add_engineers", true);
                    $this->set("nextNumber",$num);
            else:
                    $this->set("add_engineers",false);
                    $this->set("data",(isset($this->params['data']['IrModule']))?$this->params['data']['IrModule']:$this->params['data']['IrIssue'][$this->params['pass'][0]]);
                    $this->set("num",(isset($this->params['pass'][0]))? $this->params['pass'][0]:"");
            endif;
        }

        function _getNextEngineerNumber(){
            $num = $this->Session->read("additional_engineer_number");
            $this->Session->write("additional_engineer_number",$num+1);
            return $num;
        }

        function _ignoreAdditionalEngineer(){
            if(empty($this->data['IrAdditionalEngineer'][0]['engineer_signum'])){
                unset($this->data['IrAdditionalEngineer']);
            }
        }
                
        function getUser()
        {
            App::import('model', 'SiteDetail');
            $sitedetails = new SiteDetail();
            $this->layout = "ajax";
            Configure::write('debug', 0);
            $q=$_GET["q"];
            $q=trim($q);
            $this->set('Svalues', $sitedetails->find('all', array("conditions"=>array("sitename"=>$q))));
            $this->set('sitename', $q);
            //echo "Corresponding Site Location, Region etc.. for ".$q. " are :";                           
            $this->render('get_user');
        }
        
       function getUser2()
        {
            App::import('model', 'SiteDetail');
            $sitedetails = new SiteDetail();
            $this->layout = "ajax";
            Configure::write('debug', 0);
            $q=$_GET["q"];
            $q=trim($q);
            $this->set('Svalues2', $sitedetails->find('all', array("conditions"=>array("sitename"=>$q))));
            //echo "Corresponding Site Location, Region etc.. for ".$q. " are :";
            ?>
            <font color='blue' size='1'><?php echo "The Corresponding Site Location, Region and Market for ".$q. " are"; ?></font>
     <?php  $this->render('get_user2');
        }
        

    function sendEmailSL($id, $action)
    {
        $this->set('dataValues', $this->IrModule->read(null, $id));
        $this->data =  $this->IrModule->read(null, $id);
	$this->render = false;
        $dl = 'management;IR_all;IR_Roger;'.'EMC_ITAC_WRAN;';
        
        if($this->data['IrModule']['activity_type'] == "NodeB Rehome")
            $dl = $dl.'IR_NodeB_Rehome;';
        
        if($this->data['IrModule']['access_method'] == "Smart Laptop")
            $dl = $dl.'SmartLaptop_IR;';
        if($this->data['IrModule']['region'] == "North Central")
            $dl = $dl.'IR_NC;';
	elseif($this->data['IrModule']['region'] == "South Central")
            $dl = $dl.'IR_SC;';
	elseif($this->data['IrModule']['region'] == "North East")
            $dl = $dl.'IR_NE;';
	elseif($this->data['IrModule']['region'] == "South East")
            $dl = $dl.'IR_SE;';        
	elseif($this->data['IrModule']['region'] == "North West")
            $dl = $dl.'IR_NW;';
	elseif($this->data['IrModule']['region'] == "South West")
            $dl = $dl.'IR_SW;';	
	if($this->data['IrModule']['engineer_work_location'] == "RNAM RDC Mexico")
            $dl = $dl.'IR__WorkLocMexico;';
	elseif($this->data['IrModule']['engineer_work_location'] == "RNAM RDC India")
            $dl = $dl.'IR__WorkLocIndia;';			
                
	$emails = explode("\r\n", $this->data['IrModule']['email_addresses']);										
	$emails = implode("", $emails);	
        $this->sendEmail($dl, $emails, 'IR', 'ir', $action);
    }
    
    function irexcel($id = null, $use_id=false) {
        ini_set('memory_limit', '-1');
        $this->layout = 'ajax';
        
        if(!$use_id) {
            /* from search */
            $cond = $this->Session->read('session_conditions');
            $this->set("row", $this->IrModule->find("all",array('conditions' => $cond)));
            //var_dump($cond);
            $this->set("irheader", $this->IrIssue->query("desc ir_issues"));
            /*$this->set("irissuevalues", $this->IrIssue->query("select irmodule_id, type, script_issue, script_issue_contact, owner, 
                owner_ericsson_contact, escalation_engineer_contacted, escalation_engineer_contact_name, 
                escalation_engineer_contact_signum, issue_summary, impact, name_affected_rnc, number_affected_nodeb, 
                name_affected_nodeb from ir_issues"));*/
            $this->set("irissuevalues", $this->IrIssue->find("all",array('conditions' => $cond)));
        }
       else {
            //from view 
            $this->set("row", $this->IrModule->find("all",array('conditions' => array('id' => $id))));
            }
        }
    
       function cloneReport($id = NULL){ 
           
        if(!empty($this->data)){                  
            if ($this->IrModule->saveAll($this->data)) {                    
                if ($this->params['form']['Email'] == 'Submit without Email') {
                    $this->Session->setFlash("Report has been added with no email notification!");
                    $this->redirect(array('action' => 'view', $this->IrModule->id));
                } else {
                    $this->Session->setFlash("Report has been added and email notification sent!");
                    $this->sendEmailSL($this->IrModule->id, "Add Report");
                    $this->redirect(array('action' => 'view', $this->IrModule->id));
                    }
                }
                $this->set("irModule", $this->data);                
            }  
         
        if($id){
               $this->IrModule->create(); 
               $this->data = $this->IrModule->read(null, $id);        
               unset($this->data['IrModule']['id']);  
               $this->set("irModule", $this->data);
               $this->render('add');                
           }            
       }
}
?>

