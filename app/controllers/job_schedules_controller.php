<?php

class JobSchedulesController extends AppController {

    var $name = 'JobSchedules';
    var $uses = array('JobSchedule', 'JobResource');
    var $helpers = array('Html', 'Form', 'Javascript', 'DatabaseFields', 'Ajax', 'ShowFields', 'DatePicker');
    var $components = array('Session', 'Email');
    var $paginate = array(
        'limit' => 10,
        'page' => 1,
        'order' => array(
        'JobSchedule.id' => 'asc'
        )
    );

    function index() {
        
    }

    function schedule() {
        $this->set('count', 0);
        if (!empty($this->data)) {            
            /*Stuffs to do before Save*/
            $maxjobId = $this->JobSchedule->query("SELECT MAX(job_id) FROM job_schedules");            
            $this->data['JobSchedule']['job_id'] = $maxjobId[0][0]['MAX(job_id)'] + 1;
            $this->data['JobSchedule']['revision_number'] = 1;
            $this->data['JobSchedule']['overall_status'] = "Waiting For Reply";
            $addReqCount = count($this->data['AddRequirement']);           
            for($i = 0; $i < $addReqCount; $i++){
                $this->data['AddRequirement'][$i]['job_id'] = $this->data['JobSchedule']['job_id'];
            } 
            /*End*/
            
            if ($this->JobSchedule->saveAll($this->data)) {
                if ($this->params['form']['Email'] == 'Submit without Email') {
                    $this->Session->setFlash("Report has been added with no email notification!");
                    //$this->redirect(array('action' => 'view', $this->JobSchedule->id));
                } else {
                    $this->Session->setFlash("Report has been added and email notification sent!");
                    $this->sendEmailSL($this->JobSchedule->id, "Add Report");
                    $this->redirect(array('action' => 'view', $this->JobSchedule->id));
                }
            }else{
                    $this->set('count', count($this->data['AddRequirement']));
            }
            $this->set("thisDataView", $this->data);
        }
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid Schedule ID ', true));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->set('thisDataView', $this->JobSchedule->read(null, $id));  //dataValues does not become a variable until the view is launched.      
        }
    }

    function modify($id=null) {          
        if (!$id && empty($this->data)) {
            $this->set('isId', false);            
        }
        if (!empty($this->data['JobSchedule']['modifyId'])) {
            $this->Session->write("modifyid", $this->data['JobSchedule']['modifyId']);
            $this->redirect(array("action" => "modify", $this->data['JobSchedule']['modifyId']));
        }              
        if(!empty($this->data)){  
            $addReqCount = count($this->data['AddRequirement']);
            //var_dump($addReqCount);
            for($i = 0; $i < $addReqCount; $i++){
                $this->data['AddRequirement'][$i]['job_id'] = $this->data['JobSchedule']['job_id'];                
            }
            $this->data['JobSchedule']['revision_number'] = $this->data['JobSchedule']['revision_number'] + 1;                           
            if ($this->JobSchedule->saveAll($this->data)) {                   
                if ($this->params['form']['Email'] == 'Submit without Email') {
                    $this->Session->setFlash("Report has been added with no email notification!");
                    $this->redirect(array('action' => 'view', $this->JobSchedule->id));
                } else {
                    $this->Session->setFlash("Report has been added and email notification sent!");
                    $this->sendEmailSL($this->JobSchedule->id, "Add Report");
                    $this->redirect(array('action' => 'view', $this->JobSchedule->id));
                }
            }else{                    
                    var_dump($this->data);
                    var_dump(count($this->data['AddRequirement']));
                    $this->set('count', count($this->data['AddRequirement']));                
            }
        }
        if ($id) {            
            $this->data = $this->JobSchedule->read(null, $id); 
            $this->set('count', count($this->data['AddRequirement']));
            $this->set('isId', true);
            $this->render("modify");
        }
    }

    function add_resource() {    
        $violationApprove = false;
        $violation = false;
        $sessionmodifyId = $this->Session->read("modifyid");        
        $jsData = $this->JobSchedule->read(null, $sessionmodifyId);  
         var_dump($this->data);
         App::import('model', 'JobSchedule');
         $jobId = new JobSchedule();                    
         App::import('model', 'AddRequirement');
         $requirementDetails = new AddRequirement();                         
         /*Get the Job ID from modifyId*/
         $jobid = $jobId->findById($sessionmodifyId);   
         //debug($jobid);
         /*Find the designation for comparison using the corresponding jobid*/
         //$requirementdetails = $requirementDetails->findAllByJobId($jobid['JobSchedule']['job_id']);
         $requirementdetails = $requirementDetails->findAllByJobScheduleId($sessionmodifyId);
         //debug($requirementdetails);
         for($i=0; $i < count($requirementdetails); $i++){
             $designationFromReqmt[] = $requirementdetails[$i]['AddRequirement']['designation'];
         }         
        var_dump($designationFromReqmt);
        
        if($this->data['JobResource']['approve'] === "Yes"){
            unset($this->data['JobResource']['approve']);
            $violationApprove = true;
            for($j=0; $j < count($this->data['JobResource']); $j++){
                $this->data['JobResource'][$j]['approve'] = "Yes";
            }            
        }
        
        /*You get the below data from the add_resource form*/
        for($j=0; $j < count($this->data['JobResource']); $j++){
            $designationFromAddRes[] = $this->data['JobResource'][$j]['active'];
        }
        /*End*/
        
        if (!empty($this->data)) {
            /*Start Comparing*/
            if(!$violationApprove){
                if(count($designationFromReqmt) != count($designationFromAddRes)){
                    //flash and redirect to the same view page with approve as an additional field!
                    $violation = true;
                }elseif(count($designationFromReqmt) == count($designationFromAddRes)){            
                    //if designations match let it save else flash and redirect with approve as an additional field.
                    $designationDiff[] = array_diff($designationFromReqmt, $designationFromAddRes);
                    if(!empty($designationDiff)){
                        $violation = true;
                        }
                    }                   
                }       
                /*End*/                    
                $missingField = false;
                $blackListed= array('s_id'=>'s_id', 'job_schedule_id'=>'job_schedule_id');
                /* This code deletes the empty Engineers from the $this->data */
                foreach ($this->data['JobResource'] as $key => $arr) { 
                    $fieldsToCheck = array_diff_key($this->data['JobResource'][$key], $blackListed);
                    $isEmpty = true;
                    foreach ($fieldsToCheck as $row) {
                        if ($row != "") {
                            $isEmpty = false;
                        }
                    }
                    if ($isEmpty) {
                        unset($this->data['JobResource'][$key]);
                    }
                    /*                     * *** */
                }
                foreach ($this->data['JobResource'] as $key => $row) {
                    $this->JobResource->create();
                    $this->JobResource->set($this->data["JobResource"][$key]);
                    if (!$this->JobResource->validates()) {
                        $missingField = true;
                        break;
                    }
                }

                if (!$missingField && !$violation) {
                    foreach ($this->data['JobResource'] as $key => $row) {
                        $this->JobResource->create();
                        $this->JobResource->set($this->data["JobResource"][$key]);
                        
                        $this->data['JobResource'][$key]['job_schedule_id'] = $jsData['JobSchedule']['job_id'];
                        $this->data['JobResource'][$key]['s_id'] = $jsData['JobSchedule']['id'];        
                                                
                        if ($this->JobResource->save($this->data["JobResource"][$key])){
                            $this->Session->setFlash('Data saved.');   
                            $this->redirect(array('action' => 'index'));
                        }
                        
                        $this->Session->delete("modifyid");
                    }
                } else {
                        if($violation){
                            $this->set('approve', 1);                           
                        }
                        $this->Session->setFlash("Please check all the fields/requirements.");
                }
                if (empty($this->data['JobResource'])) {
                    $this->Session->setFlash('Please enter engineer information.');
                }
            }
        else {
               $this->set('approve', 0);                                
        }      
    }
    
    function EditResource(){
        
    }
}

