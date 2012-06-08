<?php

/*
 * LTE (NDS) Controller
 *
 */

class NdsmastersController extends AppController {

    var $name = 'Ndsmasters';
    var $helpers = array('Html', 'Form', 'DatabaseFields', 'ShowFields', 'DatePicker', 'NdsComparison');
    var $components = array('Session', 'Email');
    var $exceptionMsg;
    var $compSheetName = 'SUMMARY'; //name of comparison sheet (pre/post check)
    var $compOK = 'OK';
    var $compNOK= 'NOK';
    var $timePerSite;
    var $siteName = 'site_name'; //must match the value of the site name key(s) in $compFields
    var $precheckAppend = '_precheck'; //for preserved fields, this gets appended to the DB field name
    var $postcheckAppend = '_postcheck'; //for preserved fields, this gets appended to the DB field name
    var $compFields = array(
            //Non-comparison fields to add.  Multiple keys can map to the same value.
            //This helps to catch any combinations of column titles that may be entered
            //Put all keys in uppercase (excel columns converted to uppercase).
            //'CLUSTER ID'=>'cluster_id',
            'ENODEB NAME'=>'site_name',
            'COMMENTS'=>'comments',
            'REGION'=>'lte_region'
        );
    var $preserveFields = array(
            //This gives a list of the non-comparison fields that we need to save the values
            //for in both precheck and postcheck (by default only postcheck is saved).
            'COMMENTS'=>'comments'
        );
    var $templateVersion = array(
            //depending on the fields present in the template, this will affect the version
            'REGION'=>2 //if region is present, then template is version 2
    );
    var $compFieldsComparison = array(
            //Comparison fields to add.  Multiple keys can map to the same value.
            //This helps to catch any combinations of column titles that may be entered
            //Put all keys in uppercase (excel columns converted to uppercase).
            'PCI STATUS'=>'pci_status',
            'POWER'=>'power_status',
            'POWER STATUS'=>'power_status',
            'BASELINE'=>'baseline',
            'NCELL LOADED'=>'neighbour_update',
            'ALARMSCLEAR'=>'alarms_clear',
            'ERBS STATUS'=>'erbs_status',
            //'CO-LOCATED TECHNOLOGY CELL'=>'technology_cell',
            'CELL STATUS'=>'cell_status',
            'MIMO/SIMO'=>'mimo_simo',
            'SW VERSION'=>'software_version',
            'PRIMARYPLMNRESERVED'=>'primary_plmn_reserved',
            'CELL BARRED'=>'cell_barred',
            'READY FOR FUNCTIONAL TEST'=>'ready_test'
        );
    var $paginate = array(
        'limit' => 30,
        'page' => 1,
        'order' => array(
            'Ndssite.ndsmaster_id' => 'asc',
            'Ndssite.id' => 'asc'
        )
    );
    
    function add() {
        if(!empty($this->data)) {
            $this->Ndsmaster->create();
            if(isset($this->data['Ndsfile'])) {
                //save all valid uploads
                $this->saveUploadState('Ndsfile');
            }
            if($this->Ndsmaster->saveAll($this->data)) {
                /* validation passes */
                $outMsg = '';
                if(($compCheck = $this->__compareChecks($this->Ndsmaster->id)) < 1) {
                    // comparison failed
                    $this->Ndsmaster->Ndssite->create();
                    $tempRecord['ndsmaster_id'] = $this->Ndsmaster->id;
                    $tempRecord[$this->compFields['ENODEB NAME']] = "INVALID";
                    if($compCheck != -2 && $this->Ndsmaster->Ndssite->save($tempRecord, false)) {
                        $outMsg = __('Data has been saved, however, the uploads could not be compared (no site records added).<BR>' . $this->exceptionMsg . '<BR>', true);
                    }
                    else {
                        $this->Session->setFlash(__('Data could not be saved, file upload issue.<BR>' . $this->exceptionMsg, true));
//                        $this->redirect(array('action' => 'add'));
                    }
                }
                else {
                    //save template version
                    $t_ver = array();
                    $t_ver['Ndsmaster']['template_version'] = $compCheck;
                    $this->Ndsmaster->save($t_ver, false, array('template_version'));
                    //save each record into the database
                    $saveFail = false;
                    for($i = 0; $i < count($this->data['Ndssite']); $i++) {
                        $this->Ndsmaster->Ndssite->create();
                        $currentRecord = $this->data['Ndssite'][$i];
                        $currentRecord['ndsmaster_id'] = $this->Ndsmaster->id;
                        //divide time_taken by the total number of sites (i.e the total number of rows)
                        $currentRecord['time_taken_for_activity'] = $this->timePerSite;
                        if(!$this->Ndsmaster->Ndssite->save($currentRecord, false)) {
                            $saveFail = true;
                        }
                    }
                    if(!$saveFail) {
                        $outMsg = __('Data has been saved' . '<BR>', true);
                    }
                    else {
                        // problem if this happens
                        $outMsg = __('Data has been saved, however, one or more site records could not be saved.' . '<BR>', true);
                    }
                }
                if($this->data['Ndsmaster']['sendEmail'] == 1) {
                    
                    $this->Session->setFlash($outMsg . "Report has been added and email notification sent!");
                    $this->__sendEmailNotification($this->Ndsmaster->id, $this->data['Ndsmaster']['email'], 'Add Report');
                }
                else {
                    $this->Session->setFlash($outMsg . "Report has been added with no email notification!");
                }
                $this->deleteUploadState('Ndsfile');
//                $this->redirect(array('action' => 'view', $this->Ndsmaster->id));
            } 
            else {
                $this->Session->setFlash(__('Data could not be saved. Please try again.', true));
            }
        }
        else {
            $this->deleteUploadState('Ndsfile');
        }
    }
    
    function editsite($site_id) {
        if(empty($this->data)) {
            $this->data = $this->Ndsmaster->Ndssite->read(null, $site_id);
            if(empty($this->data)){
                // if this->data is still empty, then it means the entered id is not valid.
                $this->Session->setFlash(__('Invalid NDS Site Record ID: ' . $site_id, true));
                $this->redirect(array('controller' => 'litmasters', 'action' => 'index'));
            }
            // we now need to check for authorization
            if(Authsome::get('username') != $this->data['Ndsmaster']['engineer_signum']) {
                $this->Session->setFlash(__('You are not authorized to edit this NDS Site Record (ID = ' . $site_id . ')', true));
                $this->redirect(array('action' => 'viewsite', $site_id, 'edit'));
            }
        }
        else {
            if($this->Ndsmaster->Ndssite->saveAll($this->data)) {
                if($this->data['Ndsmaster']['sendEmail'] == 1) {
                    $this->Session->setFlash("Report has been added and email notification sent!");
                    $this->__sendEmailNotification($this->Ndsmaster->Ndssite->id, $this->data['Ndsmaster']['email'], 'Modify Site Report', true);
                }
                else {
                    $this->Session->setFlash("Report has been added with no email notification!");
                }
                $this->redirect(array('action' => 'viewsite', $this->Ndsmaster->Ndssite->id));
            }
            else {
                $this->Session->setFlash(__('Data could not be saved. Please try again.', true));
            }
        }
    }
    
    function edit($search_id = null, $use_id = false, $is_nds = true) {
            if(isset($this->data['Ndsmaster']['enteredId'])|| $use_id){
                /* true once an ID is entered or one is supplied */
                if(!$use_id) {
                    /* if false, then use the entered ID */
                    $search_id = $this->data['Ndsmaster']['enteredId'];
                }
                App::import('helper', 'ShowFields'); //breaking MVC, oh yeah!
                $recordIDMode = new ShowFieldsHelper();
                if(!$is_nds || (isset($this->data['Ndsmaster']['idMode']) && $recordIDMode->display('nds_edit_criteria', $this->data['Ndsmaster']['idMode']))) {
                    // edit NDS site record, redirect
                    $this->redirect(array('action' => 'editsite', $search_id));
                }
                $this->data = $this->Ndsmaster->read(null, $search_id); 
                if(empty($this->data)){
                    /* if this->data is still empty, then it means the entered id is not valid. */
                    $this->Session->setFlash(__('Invalid NDS Record ID: ' . $search_id, true));
                    $this->redirect(array('controller' => 'litmasters', 'action' => 'index'));
                }
                /* we now need to check for authorization */
                if(Authsome::get('username') != $this->data['Ndsmaster']['engineer_signum']) {
                    $this->Session->setFlash(__('You are not authorized to edit this NDS Record (ID = ' . $this->Ndsmaster->id . ')', true));
                    $this->redirect(array('action' => 'view', $this->Ndsmaster->id, 'edit'));
                }
                /* prepare saved uploads */
                $this->prepareUploadState('Ndsfile');
                /* Assign variable to the current id that we are working with. */
                $this->set('ndsId', $this->Ndsmaster->id);
            }
            else if(!empty($this->data)) {
                /* NDS record has been edited, now lets try to save */
                if(isset($this->data['Ndsfile'])) {
                    //save all valid uploads
                    $this->saveUploadState('Ndsfile');
                }
                if($this->Ndsmaster->saveAll($this->data)) {
                    // validation passes
                    $outMsg = '';
                    if(($compCheck = $this->__compareChecks($this->Ndsmaster->id)) < 1) {
                        // comparison failed (don't delete prior records)
                        $outMsg = __('Data has been saved, however, the uploads could not be compared (no site records changed).<BR>' . $this->exceptionMsg . '<BR>', true);
                    }
                    else {
                        //save template version
                        $t_ver = array();
                        $t_ver['Ndsmaster']['template_version'] = $compCheck;
                        $this->Ndsmaster->save($t_ver, false, array('template_version'));
                        //save each record into the database
                        //first delete the old entries
                        $this->Ndsmaster->Ndssite->deleteAll(array('Ndssite.ndsmaster_id' => $this->Ndsmaster->id));
                        $saveFail = false;
                        for($i = 0; $i < count($this->data['Ndssite']); $i++) {
                            $this->Ndsmaster->Ndssite->create();
                            $currentRecord = $this->data['Ndssite'][$i];
                            $currentRecord['ndsmaster_id'] = $this->Ndsmaster->id;
                            if(!$this->Ndsmaster->Ndssite->save($currentRecord, false)) {
                                $saveFail = true;
                            }
                        }
                        if(!$saveFail) {
                            $outMsg = __('Data has been saved' . '<BR>', true);
                        }
                        else {
                            // problem if this happens
                            $outMsg = __('Data has been saved, however, one or more site records could not be saved.' . '<BR>', true);
                        }
                    }
                    if($this->data['Ndsmaster']['sendEmail'] == 1) {
                        $this->Session->setFlash($outMsg . "Report has been added and email notification sent!");
                        $this->__sendEmailNotification($this->Ndsmaster->id, $this->data['Ndsmaster']['email'], 'Modify Report');
     
                    }
                    else {
                        $this->Session->setFlash($outMsg . "Report has been added with no email notification!");
                    }
                    $this->deleteUploadState('Ndsfile');
                    $this->redirect(array('action' => 'view', $this->Ndsmaster->id));
                }
                else {
                    // Prolly validation issues.  We need to set litID again so the form loads.
                    $this->Session->setFlash(__('Data could not be saved. Please try again.', true));
                    $this->set('ndsId', $this->Ndsmaster->id);
                }
            } 
    }
    
    function searchsite($use_args = null, $arg_1 = null, $arg_2 = null, $arg_3 = null) {
        if($use_args == 'loadSites') {
            // redirect from a view, we need to load the appropriate sites
            $tmpArr = explode("&", $arg_2);
            $field_conditions = array();
            foreach($tmpArr as $field) {
                $field_conditions[$field] = $arg_3;
            }
            $conditions_entered = true;
            $conditions['ndsmaster_id'] = $arg_1;
            $conditions['or'] = $field_conditions;
            $this->set('recordID', $arg_1);
            $this->Session->write('session_conditions_NDS_site', $conditions);
            $this->Session->write('paginatorArgsNDS_site', $this->passedArgs);
        }
        else if($use_args == 'fromViewSite') {
            $conditions = $this->Session->read('session_conditions_NDS_site');
            $this->set('recordID', $conditions['ndsmaster_id']);
            $this->passedArgs = $this->Session->read('paginatorArgsNDS_site');
        }
        else {
            $conditions = $this->Session->read('session_conditions_NDS_site');
            $this->set('recordID', $conditions['ndsmaster_id']);
            $this->Session->write('paginatorArgsNDS_site', $this->passedArgs);
            
        }
        $this->set('ndsQuery', $this->paginate('Ndssite', $conditions));
        $this->params['pass'] = array(); //clear all passed in args
    }
    
    function search($use_args = null, $arg_1 = null) {
        if(empty($this->data)) {
            /* either a new session, or update to pagination */
            if(empty($this->passedArgs) && empty($this->params['pass'])) {
                // new search session
                $this->Session->delete('searchSessionNDS');
                $this->Session->delete('paginatorArgsNDS');
                $this->Session->delete('session_conditions_NDS');
                $conditions_entered = false;
            }
            else if($this->Session->check('searchSessionNDS') && $this->Session->check('paginatorArgsNDS')){
                // same session, prolly updated pagination
                $this->data = $this->Session->read('searchSessionNDS');
                if($use_args == 'fromView') {
                   // use args passed into function
                   $this->passedArgs = $this->Session->read('paginatorArgsNDS');
                }
            }
            else {
                // user clicking back from form creation or edit
                $this->redirect(array('controller'=>'litmasters', 'action' => 'index'));
            }
        }
        if(!empty($this->data)) {
            // conditions entered
            $this->Ndsmaster->set($this->data);
            $this->Session->write('searchSessionNDS', $this->data);
            if(!$this->Ndsmaster->validates()) {
                $conditions_entered = false;
                $this->Ndsmaster->invalidFields();
            }
            else {
                if($use_args == 'fromSearchResults') {
                    // hitting back in the results
                    $conditions_entered = false;
                }
                else {
                    $conditions_entered = true;
                }
                $this->set('conditions_entered', $conditions_entered);
                $conditions = $this->__getConditions($this->data);
                $this->set('ndsQuery', $this->paginate('Ndssite', $conditions));
                $this->Session->write('session_conditions_NDS', $conditions);
            }
        }
        $this->set('conditions_entered', $conditions_entered);
        $this->Session->write('paginatorArgsNDS', $this->passedArgs);
        $this->params['pass'] = array(); //clear all passed in args
    }
    
    function ndsexcel($id = null, $arg_1 = null) {
        ini_set('memory_limit', '-1');
        $this->layout = false;
        if($arg_1 == 'search') {
            //from search
            $cond = $this->Session->read('session_conditions_NDS');
            $this->set("row", $this->Ndsmaster->Ndssite->find("all",array('conditions' => $cond)));
        }
        else if($arg_1 == 'searchsite') {
            // from searchsite
            $cond = $this->Session->read('session_conditions_NDS_site');
            $this->set("row", $this->Ndsmaster->Ndssite->find("all",array('conditions' => $cond)));
        }
        else if($arg_1 == 'viewsite'){
            // from viewsite
            $this->set("row", $this->Ndsmaster->Ndssite->find("all",array('conditions' => array('Ndssite.id' => $id))));
        }
        else {
            $this->set("row", $this->Ndsmaster->Ndssite->find("all",array('conditions' => array('ndsmaster_id' => $id))));
        }
    }
    
    function updater(){
        $this->layout = 'ajax';
    }
    
    function view($id = null, $action_link = 'index', $action_arg_1 = false) {
       $data = array();
        if($id) {
            $data = $this->Ndsmaster->read(null, $id);
        }
        if(!empty($data)) {
            if($action_link == 'ndsNewWindow') {
                $this->layout = 'ajax';
            }
            $this->set('dataValues', $data);
            $this->set(compact('action_link'));
            $this->set(compact('action_arg_1'));
        }
        else {
            $this->Session->setFlash(__('Invalid NDS Record ID ', true));
            $this->redirect(array('controller' => 'litmasters', 'action' => 'index'));
        }
    }
    
    function viewsite($id = null, $action_link = 'index', $action_arg_1 = false, $action_arg_2 = false, $action_arg_3 = false) {
       $data = array();
        if($id) {
            $data = $this->Ndsmaster->Ndssite->read(null, $id);
        }
        if(!empty($data)) {
            $this->set('dataValues', $data);
            $this->set(compact('action_link'));
            $this->set(compact('action_arg_1'));
            $this->set(compact('action_arg_2'));
            $this->set(compact('action_arg_3'));
        }
        else {
            $this->Session->setFlash(__('Invalid NDS Site Record ID ', true));
            $this->redirect(array('controller' => 'litmasters', 'action' => 'index'));
        }
    }
    
    function download($id, $tag) {
        $this->view = 'Media';
        $dirPath = $this->Ndsmaster->Ndsfile->getUploadPath();
        $fileName = $this->Ndsmaster->Ndsfile->getFileName($id, $tag);
        if(is_array($fileName) && isset($fileName['Ndsfile']) && is_array($fileName['Ndsfile'])) {
            //returned a hit
            $fileName = $fileName['Ndsfile']['file_name'];
        }
        $path = $dirPath . '/';
        $file = new File($fileName);
        $fileNameID = $fileName;
        $fileName = $file->name();
        $ext = $file->ext();
	$params = array(
            'id' => $fileNameID,
            'name' => $fileName,
            'download' => true,
            'extension' => $ext,  
            'path' => $path 
        );
        $this->set($params);
    }
    
    private function __sendEmailNotification($id, $emails, $action = '', $is_site = false) {
        $dl = 'management;lte_nds;';
        //$dl = '';
        if(!$is_site) {
            $this->set('dataValues', $this->Ndsmaster->read(null, $id));
            $this->sendEmail($dl,$emails,'LTE-NDS','ltends', $action);
        }
        else {
            $this->set('dataValues', $this->Ndsmaster->Ndssite->read(null, $id));
            $this->sendEmail($dl,$emails,'LTE-NDS-SITE','ltendssite', $action); 
        }
    }
    
    private function __getConditions($data) {
        $conditions = array();
        if(!$this->__isEmpty($data['Ndsmaster']['date_created'])) {
            //$conditions['Litmaster.date_initiated'] = $this->__implodeDate($data['dateCreated']);
            $conditions['Ndsmaster.date_initiated'] = $data['Ndsmaster']['date_created'];
        }
        if(!$this->__isEmpty($data['Ndsmaster']['ndsId'])) {
            $conditions['Ndsmaster.id'] = $data['Ndsmaster']['ndsId'];
        }
        if(!$this->__isEmpty($data['Ndsmaster']['siteId'])) {
            $conditions['Ndssite.id'] = $data['Ndsmaster']['siteId'];
        }
        if(!$this->__isEmpty($data['Ndssite']['site_name'])) {
            $conditions['Ndssite.site_name'] = $data['Ndssite']['site_name'];
        }
        if(!$this->__isEmpty($data['Ndsmaster']['engineer_signum_entered'])) {
            $conditions['Ndsmaster.engineer_signum'] = $data['Ndsmaster']['engineer_signum_entered'];
        }
        if(!$this->__isEmpty($data['Ndsmaster']['engineer_work_location_entered'])) {
            $conditions['Ndsmaster.engineer_work_location'] = $data['Ndsmaster']['engineer_work_location_entered'];
        }
        if(!$this->__isEmpty($data['Ndsmaster']['lte_customer'])) {
            $conditions['Ndsmaster.lte_customer'] = $data['Ndsmaster']['lte_customer'];
        }
        if(!$this->__isEmpty($data['Ndsmaster']['lte_region'])) {
            $conditions['Ndsmaster.lte_region'] = $data['Ndsmaster']['lte_region'];
        }
        
        return $conditions;
    }
    
    private function __isEmpty($value){
        return ($value == null || empty($value) || $value == "") ? true : false;
    }
    
    private function __compareChecks($ndsmasterID) {
        $dirPath = $this->Ndsmaster->Ndsfile->getUploadPath();
        $preCheckFileName = $this->Ndsmaster->Ndsfile->getFileName($ndsmasterID, 0);
        if(is_array($preCheckFileName) && isset($preCheckFileName['Ndsfile']) && is_array($preCheckFileName['Ndsfile'])) {
            //returned a hit
            $preCheckFileName = $preCheckFileName['Ndsfile']['file_name'];
        }
        $postCheckFileName = $this->Ndsmaster->Ndsfile->getFileName($ndsmasterID, 1);
        if(is_array($postCheckFileName) && isset($postCheckFileName['Ndsfile']) && is_array($postCheckFileName['Ndsfile'])) {
            //returned a hit
            $postCheckFileName = $postCheckFileName['Ndsfile']['file_name'];
        }
        
        App::import('Vendor', 'php-excel/Classes/phpexcel', array('file' => 'PHPExcel.php'));
        $cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_in_memory;
        PHPExcel_Settings::setCacheStorageMethod($cacheMethod);

        try {
            //precheck load
            $preCheckFileType = PHPExcel_IOFactory::identify($dirPath . DS . $preCheckFileName);
            $preCheckReader = PHPExcel_IOFactory::createReader($preCheckFileType);
            if($preCheckFileType != 'CSV') {
                $preCheckReader->setReadDataOnly(true);
                $preCheckReader->setLoadSheetsOnly($this->compSheetName);
            }
            $preCheck = $preCheckReader->load($dirPath . DS . $preCheckFileName);
            //postcheck load
            $postCheckFileType = PHPExcel_IOFactory::identify($dirPath . DS . $postCheckFileName);
            $postCheckReader = PHPExcel_IOFactory::createReader($postCheckFileType);
            if($postCheckFileType != 'CSV') {
                $postCheckReader->setReadDataOnly(true);
                $postCheckReader->setLoadSheetsOnly($this->compSheetName);
            }
            $postCheck = $postCheckReader->load($dirPath . DS . $postCheckFileName);
        }
        catch(Exception $e) {
            $this->exceptionMsg = $e->getMessage();
            return -2;
        }
        //The sheet should be loaded at this point (if not then it'll try to load
        //all of them which will prolly time out).
        //precompare validaton checks
        if($preCheckFileType != 'CSV' && ($preCheck->getSheetCount() == 0 || strtoupper($preCheck->getActiveSheet()->getTitle()) != $this->compSheetName)) {
            //invalid loaded sheet for preCheck
            $this->exceptionMsg = "PreCheck: Cannot find sheet: " . $this->compSheetName;
            return -3;
        }
        if($postCheckFileType != 'CSV' && ($postCheck->getSheetCount() == 0 || strtoupper($postCheck->getActiveSheet()->getTitle()) != $this->compSheetName)) {
            //invalid loaded sheet for postCheck
            $this->exceptionMsg = "PostCheck: Cannot find sheet: " . $this->compSheetName;
            return -3;
        }
        //figure out the column positions of both the pre and postcheck files
        //then figure out the site name (row) positions of the post check file
        $highestColumn = ($preCheck->getActiveSheet()->getHighestColumn() > $postCheck->getActiveSheet()->getHighestColumn()) ? $preCheck->getActiveSheet()->getHighestColumn() : $postCheck->getActiveSheet()->getHighestColumn();
        $highestRow = $postCheck->getActiveSheet()->getHighestRow();
        $this->timePerSite = $this->data['Ndsmaster']['time_taken_for_activity']/$highestRow;
        $highestColumn++;
        $postCheckRowPos = array();
        $preCheckColPos = array();
        $postCheckColPos = array();
        $preCheckSiteNameColPos = null;
        $postCheckSiteNameColPos = null;
        App::import('helper', 'DatabaseFields'); //breaking MVC again :)
        $dropDowns = new DatabaseFieldsHelper();
        $calculated_version = 1;
        //get column positions (fields)
        for($column = 'A'; $column != $highestColumn; $column++) {
            $excelFieldPre = strtoupper(trim($preCheck->getActiveSheet()->getCell($column . '1')->getValue()));
            $excelFieldPost = strtoupper(trim($postCheck->getActiveSheet()->getCell($column . '1')->getValue()));
            if(isset($this->compFields[$excelFieldPre])) {
                //current column is a valid field (precheck)
                if($this->compFields[$excelFieldPre] == $this->siteName) {
                    $preCheckSiteNameColPos = $column;
                }
                else {
                    $preCheckColPos[$excelFieldPre] = $column;
                }
            }
            else if(isset($this->compFieldsComparison[$excelFieldPre])) {
                $preCheckColPos[$excelFieldPre] = $column;
            }
            if(isset($this->compFields[$excelFieldPost])) {
                //current column is a valid field (postcheck)
                if($this->compFields[$excelFieldPost] == $this->siteName) {
                    $postCheckSiteNameColPos = $column;
                }
                else {
                    $postCheckColPos[$excelFieldPost] = $column;
                }
            }
            else if(isset($this->compFieldsComparison[$excelFieldPost])) {
                $postCheckColPos[$excelFieldPost] = $column;
            }
            //check version
            if(isset($this->templateVersion[$excelFieldPre]) && $this->templateVersion[$excelFieldPre] > $calculated_version) {
                $calculated_version = $this->templateVersion[$excelFieldPre];
            }
        }
        //get row positions (site names) of postcheck file
        if(!empty($postCheckSiteNameColPos)) {
            for($row = 2; $row < $highestRow + 1; $row++) {
                $siteName = strtoupper(trim($postCheck->getActiveSheet()->getCell($postCheckSiteNameColPos . $row)->getValue()));
                $postCheckRowPos[$siteName] = $row;
            }
        }
        else {
            //could not find the site name column for the postCheck file
            $this->exceptionMsg = "PostCheck: Cannot find the Site Name column";
            return -4;
        }
        //prune the fields from the precheck column list that is not present in the postcheck
        //this is an optimization that speeds along comparisons by removing unneccesary set checks
        foreach($preCheckColPos as $field=>$columnPos) {
            if(!isset($postCheckColPos[$field])) {
                if(!isset($this->preserveFields[$field])) {
                    unset($preCheckColPos[$field]);
                }
                else {
                    // for a preserved field, it is okay if it is present in one file but not the other
                    // need to add this to the postcheck array
                    $postCheckColPos[$field] = -1;
                }
            }
        }
        //check for preserved fields in the postcheck that are not in the precheck
        foreach($this->preserveFields as $field=>$DBField) {
            if(isset($postCheckColPos[$field]) && !isset($preCheckColPos[$field])) {
                $preCheckColPos[$field] = -1;
            }
        }
        //go through all the rows of the precheck file and make the comparisons
        $highestRow = $preCheck->getActiveSheet()->getHighestRow();
        $data = array(); //will become $this->data[$model] eventually
        $successfulComparison = false;
        for($row = 2; $row < $highestRow + 1; $row++) {
            //pull the site name
            $siteName = strtoupper(trim($preCheck->getActiveSheet()->getCell($preCheckSiteNameColPos . $row)->getValue()));
            $data['Ndssite'][$row - 2][$this->siteName] = $siteName; //save site name in new record
            if(isset($postCheckRowPos[$siteName])) {
                //populate the rest of the site record
                $rowPost = $postCheckRowPos[$siteName];
                foreach($preCheckColPos as $field=>$columnPos) {
                    if($preCheckColPos[$field] != -1) {
                        $currentValuePre = trim($preCheck->getActiveSheet()->getCell($columnPos . $row)->getValue());
                    }
                    else {
                       $currentValuePre = '';
                    }
                    if($postCheckColPos[$field] != -1) {
                        $currentValuePost = trim($postCheck->getActiveSheet()->getCell($postCheckColPos[$field] . $rowPost)->getValue());
                    }
                    else {
                        $currentValuePost = '';
                    }
                    if(isset($this->compFields[$field])) {
                        //non-comparison to take place
                        if(isset($this->preserveFields[$field])) {
                            //non-shared field (save both values - this assumes we have the fields for it in the DB)
                            $data['Ndssite'][$row - 2][$this->compFields[$field]. $this->precheckAppend] = $currentValuePre;
                            $data['Ndssite'][$row - 2][$this->compFields[$field] . $this->postcheckAppend] = $currentValuePost;
                        }
                        else {
                            //shared field (take only the postcheck value)
                            $list = $dropDowns->getOptions($this->compFields[$field], 4, false);
                            foreach($list as $key=>$value) {
                                $list[strtoupper($key)] = $value;
                                unset($list[$key]);
                            }
                            if(isset($list[strtoupper($currentValuePost)])) {
                                //value is a dropdown and valid
                                $data['Ndssite'][$row - 2][$this->compFields[$field]] = $list[strtoupper($currentValuePost)];
                            }
                            else {
                                //either field is not a dropdown or the dropdown value is not valid (just save anyways)
                                $data['Ndssite'][$row - 2][$this->compFields[$field]] = $currentValuePost;
                            }
                        }
                    }
                    else if(isset($this->compFieldsComparison[$field])) {
                        //comparison to take place
                        $currentValuePre = strtoupper($currentValuePre);
                        $currentValuePost = strtoupper($currentValuePost);
                        if($currentValuePre == $this->compNOK && $currentValuePost == $this->compOK) {
                            //success
                            $compResult = 1;
                            $successfulComparison = true;
                        }
                        else if($currentValuePre == $this->compNOK && $currentValuePost == $this->compNOK) {
                            //Not Success
                            $compResult = 2;
                            $successfulComparison = true;
                        }
                        else if($currentValuePre == $this->compOK && $currentValuePost == $this->compOK) {
                            //No Change
                            $compResult = 3;
                            $successfulComparison = true;
                        }
                        else if($currentValuePre == $this->compOK && $currentValuePost == $this->compNOK) {
                            //More Investigation
                            $compResult = 4;
                            $successfulComparison = true;
                        }
                        else {
                            //undefined value given in either Pre or Post file
                            $compResult = 0;
                        }
                        $data['Ndssite'][$row - 2][$this->compFieldsComparison[$field]] = $compResult;
                    }
                }
            }
        }
        if(empty($data) || !$successfulComparison) {
            $this->exceptionMsg = "Could not compare the files given.";
            return -1;
        }
        $this->data['Ndssite'] = $data['Ndssite'];
        return $calculated_version;
        //return 1;
    }
}

?>
