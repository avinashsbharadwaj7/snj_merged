<?php

/*
 * LTE (SIAD) Controller
 *
 */

class SiadmastersController extends AppController {

    var $name = 'Siadmasters';
    var $helpers = array('Html', 'Form', 'DatabaseFields', 'ShowFields', 'DatePicker', 'NdsComparison');
    var $components = array('Session', 'Email');
    var $paginate = array(
        'limit' => 30,
        'page' => 1,
        'order' => array(
            'Siadsite.siadmaster_id' => 'asc',
            'Siadsite.id' => 'asc'
        )
    );
    //parser vars
    var $embargoedColumns = array();
    var $exceptionMsg = '';
    var $compSheetName = 'SIAD_ACTIVITY_TEMPLATE';
    var $compFields = array(
            //Fields to add.  Multiple keys can map to the same value.
            //This helps to catch any combinations of column titles that may be entered
            //Put all keys in uppercase (excel columns converted to uppercase).
            'SIGNUM'=>'engineer_signum',
            'WORK LOCATION'=>'engineer_work_location',
            'CUSTOMER' => 'lte_customer',
            'REGION' => 'lte_region',
            'NODE ID' => 'site_name',
            'SITE NAME' => 'site_name',
            'SIAD CLLI' => 'siad_clli',
            'SIAD OAM LOOPBACK IP' => 'oam_loopback_ip_address',
            'SIAD OAM LOOPBACK IP ADDRESS' => 'oam_loopback_ip_address',
            'OAM LOOPBACK IP' => 'oam_loopback_ip_address',
            'OAM LOOPBACK IP ADDRESS' => 'oam_loopback_ip_address',
            'OAM DEFAULT IP ADDRESS' => 'oam_default_ip_address',
            'OAM DEFAULT IP' => 'oam_default_ip_address',
            'SIAD OAM DEFAULT IP ADDRESS' => 'oam_default_ip_address',
            'SIAD OAM DEFAULT IP' => 'oam_default_ip_address',
            'BEARER DEFAULT IP ADDRESS' => 'bearer_default_ip_address',
            'BEARER DEFAULT IP' => 'bearer_default_ip_address',
            'ACTIVITY TYPE' => 'siad_activity_type',
            'FINAL RESULT' => 'siad_activity_status',
            'ACTIVITY_STATUS' => 'siad_activity_status',
            'COMMENT' => 'additional_comments',
            'COMMENTS' => 'additional_comments',
            'ADDITIONAL COMMENTS' => 'additional_comments'
        );
    
    function view($id = null, $action_link = 'index', $action_arg_1 = false) {
        $data = array();
        if($id) {
            $data = $this->Siadmaster->read(null, $id);
        }
        if(!empty($data)) {
            if($action_link == 'siadNewWindow') {
                $this->layout = 'ajax';
            }
            $this->set('dataValues', $data);
            $this->set(compact('action_link'));
            $this->set(compact('action_arg_1'));
        }
        else {
            $this->Session->setFlash(__('Invalid SIAD Record ID ', true));
            $this->redirect(array('controller' => 'litmasters', 'action' => 'index'));
        }
    }
    
    function viewsite($id = null, $action_link = 'index', $action_arg_1 = false, $action_arg_2 = false, $action_arg_3 = false) {
       $data = array();
        if($id) {
            $data = $this->Siadmaster->Siadsite->read(null, $id);
        }
        if(!empty($data)) {
            $this->set('dataValues', $data);
            $this->set(compact('action_link'));
            $this->set(compact('action_arg_1'));
            $this->set(compact('action_arg_2'));
            $this->set(compact('action_arg_3'));
        }
        else {
            $this->Session->setFlash(__('Invalid SIAD Site Record ID ', true));
            $this->redirect(array('controller' => 'litmasters', 'action' => 'index'));
        }
    }
    
    function add() {
        if(!empty($this->data)) {
            $this->Siadmaster->create();
            if(isset($this->data['Siadfile'])) {
                //save all valid uploads
                $this->saveUploadState('Siadfile');
            }
            if($this->Siadmaster->saveAll($this->data)) {
                //validation passes
                //parse the file
                $result = $this->__parseRecords($this->Siadmaster->id);
                if($result >= 0) {
                    //Attempt to save the individual records
                    $failArray = array();
                    foreach($this->data['Siadsite'] as $index => $record) {
                        //first check validation
                        $data['Siadsite'] = $record;
                        $this->Siadmaster->Siadsite->set($record);
                        if(!$this->Siadmaster->Siadsite->validates()) {
                            array_push($failArray, $index + 2);
                        }
                    }
                    if(count($failArray) == 0) {
                        //validation passes
                        $failArray = array();
                        foreach($this->data['Siadsite'] as $index => $record) {
                            //now save
                            $this->Siadmaster->Siadsite->create();
                            $data['Siadsite'] = $record;
                            if(!$this->Siadmaster->Siadsite->save($record)) {
                                array_push($failArray, $index + 2);
                            }
                        }
                        if(count($failArray) > 0) {
                            //at least some records didn't save for some reason
                            $outMsg = '<BR>--' . count($failArray) . ' records cound not be saved<BR>-- Records (Row #):';
                            foreach($failArray as $record) {
                                $outMsg .= $record . ' ';
                            }
                        }
                        else {
                            $outMsg = '<BR>+ ' . count($this->data['Siadsite']) . ' records added';
                        }
                        $outMsg = __("Records have been extracted and saved" . $outMsg, true);
                        //check if any columns didn't make it
                        if(count($this->embargoedColumns) > 0) {
                            //some columns were embargoed
                            $outMsg .= __("<BR>- The following fields are not valid and were omitted:<BR>", true);
                            foreach($this->embargoedColumns as $column => $value) {
                                $outMsg .= "-- Column: " . $column . ", Field: " . $value . "<BR>";
                            }
                        }
                        if($this->data['Siadmaster']['sendEmail'] == 1) {
                            $this->Session->setFlash($outMsg . "<BR>" . __("Report has been added and email notification sent!", true));
                            $this->__sendEmailNotification($this->Siadmaster->id, $this->data['Siadmaster']['email'], 'Add Report');
                        }
                        else {
                            $this->Session->setFlash($outMsg . "<BR>" . __("Report has been added with no email notification!", true));
                        }
                        $this->deleteUploadState('Siadfile');
                        $this->redirect(array('action' => 'view', $this->Siadmaster->id));
                    }
                    else {
                        //records could not be validated, so nothing saved
                        $this->Siadmaster->Siadfile->deleteFile($this->Siadmaster->id, 3);
                        $this->Siadmaster->Siadfile->deleteAll(array('siadmaster_id' => $this->Siadmaster->id), false);
                        $this->Siadmaster->delete($this->Siadmaster->id, false);
                        $this->deleteUploadState('Siadfile');
                        unset($this->data['Siadfile']);
                        $outMsg = '<BR>- ' . count($failArray) . ' records could not be validated (Row # in spreadsheet):<BR>';
                        foreach($failArray as $record) {
                            $outMsg .= "-- Row: " . $record . '<BR>';
                        }
                        $this->Session->setFlash(__("Records have NOT been saved.  Please try again" . $outMsg, true));
                    }
                }
                else {
                   $this->Siadmaster->Siadfile->deleteFile($this->Siadmaster->id, 3);
                   $this->Siadmaster->Siadfile->deleteAll(array('siadmaster_id' => $this->Siadmaster->id), false);
                   $this->Siadmaster->delete($this->Siadmaster->id, false);
                   $this->deleteUploadState('Siadfile');
                   unset($this->data['Siadfile']);
                   $this->Session->setFlash(__("Records could not be extracted from Template<BR>-- " . $this->exceptionMsg, true)); 
                }
            }
            else {
                $this->Session->setFlash(__('Data could not be saved. Please try again.', true));
            }
        }
        else {
            $this->deleteUploadState('Siadfile');
        }
    }
    
    function edit($search_id = null, $use_id = false, $is_siad = true) {
            if(isset($this->data['Siadmaster']['enteredId'])|| $use_id){
                /* true once an ID is entered or one is supplied */
                if(!$use_id) {
                    /* if false, then use the entered ID */
                    $search_id = $this->data['Siadmaster']['enteredId'];
                }
                App::import('helper', 'ShowFields'); //breaking MVC, oh yeah!
                $recordIDMode = new ShowFieldsHelper();
                if(!$is_siad || (isset($this->data['Siadmaster']['idMode']) && $recordIDMode->display('siad_edit_criteria', $this->data['Siadmaster']['idMode']))) {
                    // edit SIAD site record, redirect
                    $this->redirect(array('action' => 'editsite', $search_id));
                }
                $this->data = $this->Siadmaster->read(null, $search_id); 
                if(empty($this->data)){
                    /* if this->data is still empty, then it means the entered id is not valid. */
                    $this->Session->setFlash(__('Invalid SIAD Record ID: ' . $search_id, true));
                    $this->redirect(array('controller' => 'litmasters', 'action' => 'index'));
                }
                /* we now need to check for authorization */
                if(Authsome::get('username') != $this->data['Siadmaster']['engineer_signum']) {
                    $this->Session->setFlash(__('You are not authorized to edit this SIAD Record (ID = ' . $this->Siadmaster->id . ')', true));
                    $this->redirect(array('action' => 'view', $this->Siadmaster->id, 'edit'));
                }
                /* prepare saved uploads */
                $this->prepareUploadState('Siadfile');
                /* Assign variable to the current id that we are working with. */
                $this->set('siadId', $this->Siadmaster->id);
            }
            else if(!empty($this->data)) {
                /* SIAD record has been edited, now lets try to save */
                if(isset($this->data['Siadfile'])) {
                    //save all valid uploads
                    $this->saveUploadState('Siadfile');
                }
                if($this->Siadmaster->saveAll($this->data)) {
                    //validation passes
                    //parse the file
                    $result = $this->__parseRecords($this->Siadmaster->id);
                    if($result >= 0) {
                        //Attempt to save the individual records
                        $failArray = array();
                        foreach($this->data['Siadsite'] as $index => $record) {
                            //first check validation
                            $data['Siadsite'] = $record;
                            $this->Siadmaster->Siadsite->set($record);
                            if(!$this->Siadmaster->Siadsite->validates()) {
                                array_push($failArray, $index + 2);
                            }
                        }
                        if(count($failArray) == 0) {
                            //validation passes
                            //first delete the old entries
                            $this->Siadmaster->Siadsite->deleteAll(array('Siadsite.siadmaster_id' => $this->Siadmaster->id));
                            $failArray = array();
                            foreach($this->data['Siadsite'] as $index => $record) {
                                //now save
                                $this->Siadmaster->Siadsite->create();
                                $data['Siadsite'] = $record;
                                if(!$this->Siadmaster->Siadsite->save($record)) {
                                    array_push($failArray, $index + 2);
                                }
                            }
                            if(count($failArray) > 0) {
                                //at least some records didn't save for some reason
                                $outMsg = '<BR>--' . count($failArray) . ' records cound not be saved<BR>-- Records (Row #):';
                                foreach($failArray as $record) {
                                    $outMsg .= $record . ' ';
                                }
                            }
                            else {
                                $outMsg = '<BR>+ ' . count($this->data['Siadsite']) . ' records added';
                            }
                            $outMsg = __("Records have been extracted and saved" . $outMsg, true);
                            //check if any columns didn't make it
                            if(count($this->embargoedColumns) > 0) {
                                //some columns were embargoed
                                $outMsg .= __("<BR>- The following fields are not valid and were omitted:<BR>", true);
                                foreach($this->embargoedColumns as $column => $value) {
                                    $outMsg .= "-- Column: " . $column . ", Field: " . $value . "<BR>";
                                }
                            }
                            if($this->data['Siadmaster']['sendEmail'] == 1) {
                                $this->Session->setFlash($outMsg . "<BR>" . __("Report has been updated and email notification sent!", true));
                                $this->__sendEmailNotification($this->Siadmaster->id, $this->data['Siadmaster']['email'], 'Modify Report');
                            }
                            else {
                                $this->Session->setFlash($outMsg . "<BR>" . __("Report has been updated with no email notification!", true));
                            }
                            $this->deleteUploadState('Siadfile');
                            $this->redirect(array('action' => 'view', $this->Siadmaster->id));
                        }
                        else {
                            //records could not be validated, so nothing saved
                            $outMsg = '<BR>- ' . count($failArray) . ' records could not be validated (Row # in spreadsheet):<BR>';
                            foreach($failArray as $record) {
                                $outMsg .= "-- Row: " . $record . '<BR>';
                            }
                            $this->Session->setFlash(__("Site records have NOT been saved (Master record updated).  Please try again" . $outMsg, true));
                            $this->Siadmaster->Siadfile->deleteFile($this->Siadmaster->id, 3);
                            $this->Siadmaster->Siadfile->deleteAll(array('siadmaster_id' => $this->Siadmaster->id), false);
                            $this->deleteUploadState('Siadfile');
                            unset($this->data['Siadfile']);
                            $this->set('siadId', $this->Siadmaster->id);
                        }
                    }
                    else {
                       $this->Session->setFlash(__("Records could not be extracted from Template<BR>-- " . $this->exceptionMsg, true)); 
                       $this->Siadmaster->Siadfile->deleteFile($this->Siadmaster->id, 3);
                       $this->Siadmaster->Siadfile->deleteAll(array('siadmaster_id' => $this->Siadmaster->id), false);
                       $this->deleteUploadState('Siadfile');
                       unset($this->data['Siadfile']);
                       $this->set('siadId', $this->Siadmaster->id);
                    }
                }
                else {
                    // Prolly validation issues.
                    $this->Session->setFlash(__('Data could not be saved. Please try again.', true));
                    $this->set('siadId', $this->Siadmaster->id);
                }
            } 
    }
    
    function editsite($site_id) {
        if(empty($this->data)) {
            $this->data = $this->Siadmaster->Siadsite->read(null, $site_id);
            if(empty($this->data)){
                // if this->data is still empty, then it means the entered id is not valid.
                $this->Session->setFlash(__('Invalid SIAD Site Record ID: ' . $site_id, true));
                $this->redirect(array('controller' => 'litmasters', 'action' => 'index'));
            }
            // we now need to check for authorization
            if(Authsome::get('username') != $this->data['Siadmaster']['engineer_signum']) {
                $this->Session->setFlash(__('You are not authorized to edit this SIAD Site Record (ID = ' . $site_id . ')', true));
                $this->redirect(array('action' => 'viewsite', $site_id, 'edit'));
            }
        }
        else {
            if($this->Siadmaster->Siadsite->saveAll($this->data)) {
                if($this->data['Siadmaster']['sendEmail'] == 1) {
                    $this->Session->setFlash("Report has been updated and email notification sent!");
                    $this->__sendEmailNotification($this->Siadmaster->Siadsite->id, $this->data['Siadmaster']['email'], 'Modify Site Report', true);
                }
                else {
                    $this->Session->setFlash("Report has been updated with no email notification!");
                }
                $this->redirect(array('action' => 'viewsite', $this->Siadmaster->Siadsite->id));
            }
            else {
                $this->Session->setFlash(__('Data could not be saved. Please try again.', true));
            }
        }
    }
    
    function download($id, $tag) {
        $this->view = 'Media';
        $dirPath = $this->Siadmaster->Siadfile->getUploadPath();
        $fileName = $this->Siadmaster->Siadfile->getFileName($id, $tag);
        if(is_array($fileName) && isset($fileName['Siadfile']) && is_array($fileName['Siadfile'])) {
            //returned a hit
            $fileName = $fileName['Siadfile']['file_name'];
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
    
    function searchsite($use_args = null, $arg_1 = null, $arg_2 = null, $arg_3 = null) {
        if($use_args == 'loadSites') {
            // redirect from a view, we need to load the appropriate sites
            $conditions_entered = true;
            $conditions['siadmaster_id'] = $arg_1;
            $conditions[$arg_2] = $arg_3;
            $this->set('recordID', $arg_1);
            $this->Session->write('session_conditions_siad_site', $conditions);
            $this->Session->write('paginatorArgs_siad_site', $this->passedArgs);
        }
        else if($use_args == 'fromViewSite') {
            $conditions = $this->Session->read('session_conditions_siad_site');
            $this->set('recordID', $conditions['siadmaster_id']);
            $this->passedArgs = $this->Session->read('paginatorArgs_siad_site');
        }
        else {
            $conditions = $this->Session->read('session_conditions_siad_site');
            $this->set('recordID', $conditions['siadmaster_id']);
            $this->Session->write('paginatorArgs_siad_site', $this->passedArgs);
            
        }
        $this->set('siadQuery', $this->paginate('Siadsite', $conditions));
        $this->params['pass'] = array(); //clear all passed in args
    }
    
    function search($use_args = null, $arg_1 = null) {
        if(empty($this->data)) {
            /* either a new session, or update to pagination */
            if(empty($this->passedArgs) && empty($this->params['pass'])) {
                // new search session
                $this->Session->delete('searchSession_siad');
                $this->Session->delete('paginatorArgs_siad');
                $this->Session->delete('session_conditions_siad');
                $conditions_entered = false;
            }
            else if($this->Session->check('searchSession_siad') && $this->Session->check('paginatorArgs_siad')){
                // same session, prolly updated pagination
                $this->data = $this->Session->read('searchSession_siad');
                if($use_args == 'fromView') {
                   // use args passed into function
                   $this->passedArgs = $this->Session->read('paginatorArgs_siad');
                }
            }
            else {
                // user clicking back from form creation or edit
                $this->redirect(array('controller'=>'litmasters', 'action' => 'index'));
            }
        }
        if(!empty($this->data)) {
            // conditions entered
            $this->Siadmaster->set($this->data);
            $this->Session->write('searchSession_siad', $this->data);
            if(!$this->Siadmaster->validates()) {
                $conditions_entered = false;
                $this->Siadmaster->invalidFields();
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
                $this->set('siadQuery', $this->paginate('Siadsite', $conditions));
                $this->Session->write('session_conditions_siad', $conditions);
            }
        }
        $this->set('conditions_entered', $conditions_entered);
        $this->Session->write('paginatorArgs_siad', $this->passedArgs);
        $this->params['pass'] = array(); //clear all passed in args
    }
    
    function siadexcel($id = null, $arg_1 = null) {
        ini_set('memory_limit', '-1');
        $this->layout = false;
        if($arg_1 == 'search') {
            //from search
            $cond = $this->Session->read('session_conditions_siad');
            $this->set("row", $this->Siadmaster->Siadsite->find("all",array('conditions' => $cond)));
        }
        else if($arg_1 == 'searchsite') {
            // from searchsite
            $cond = $this->Session->read('session_conditions_siad_site');
            $this->set("row", $this->Siadmaster->Siadsite->find("all",array('conditions' => $cond)));
        }
        else if($arg_1 == 'viewsite'){
            // from viewsite
            $this->set("row", $this->Siadmaster->Siadsite->find("all",array('conditions' => array('Siadsite.id' => $id))));
        }
        else {
            $this->set("row", $this->Siadmaster->Siadsite->find("all",array('conditions' => array('siadmaster_id' => $id))));
        }
    }
    
    private function __getConditions($data) {
        $conditions = array();
        if(!$this->__isEmpty($data['Siadmaster']['date_created_entered'])) {
            $conditions['Siadmaster.date_created'] = $data['Siadmaster']['date_created_entered'];
        }
        if(!$this->__isEmpty($data['Siadmaster']['siadId'])) {
            $conditions['Siadmaster.id'] = $data['Siadmaster']['siadId'];
        }
        if(!$this->__isEmpty($data['Siadmaster']['siteId'])) {
            $conditions['Siadsite.id'] = $data['Siadmaster']['siteId'];
        }
        if(!$this->__isEmpty($data['Siadmaster']['site_name_entered'])) {
            $conditions['Siadsite.site_name'] = $data['Siadmaster']['site_name_entered'];
        }
        if(!$this->__isEmpty($data['Siadmaster']['engineer_signum_entered'])) {
            $conditions['Siadmaster.engineer_signum'] = $data['Siadmaster']['engineer_signum_entered'];
        }
        if(!$this->__isEmpty($data['Siadmaster']['engineer_work_location_entered'])) {
            $conditions['Siadsite.engineer_work_location'] = $data['Siadmaster']['engineer_work_location_entered'];
        }
        if(!$this->__isEmpty($data['Siadmaster']['lte_customer_entered'])) {
            $conditions['Siadsite.lte_customer'] = $data['Siadmaster']['lte_customer_entered'];
        }
        if(!$this->__isEmpty($data['Siadmaster']['region_entered'])) {
            $conditions['Siadsite.lte_region'] = $data['Siadmaster']['region_entered'];
        }
        if(!$this->__isEmpty($data['Siadmaster']['activity_type_entered'])) {
            $conditions['Siadsite.siad_activity_type'] = $data['Siadmaster']['activity_type_entered'];
        }
        if(!$this->__isEmpty($data['Siadmaster']['activity_status_entered'])) {
            $conditions['Siadsite.siad_activity_status'] = $data['Siadmaster']['activity_status_entered'];
        }
        
        return $conditions;
    }
    
    private function __isEmpty($value){
        return ($value == null || empty($value) || $value == "") ? true : false;
    }
    
    private function __sendEmailNotification($id, $emails, $action = '', $is_site = false) {
        $dl = 'management;lte_nds;';
        //$dl = '';
        if(!$is_site) {
            $this->set('dataValues', $this->Siadmaster->read(null, $id));
            $this->sendEmail($dl,$emails,'LTE-SIAD','ltesiad', $action);
        }
        else {
            $this->set('dataValues', $this->Siadmaster->Siadsite->read(null, $id));
            $this->sendEmail($dl,$emails,'LTE-SIAD-SITE','ltesiadsite', $action); 
        }
    }
    
    private function __parseRecords($fileID) {
        $dirPath = $this->Siadmaster->Siadfile->getUploadPath();
        $fileName = $this->Siadmaster->Siadfile->getFileName($fileID, 3);
        if(is_array($fileName) && isset($fileName['Siadfile']) && is_array($fileName['Siadfile'])) {
            //returned a hit
            $fileName = $fileName['Siadfile']['file_name'];
        }
        App::import('Vendor', 'php-excel/Classes/phpexcel', array('file' => 'PHPExcel.php'));
        $cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_in_memory;
        PHPExcel_Settings::setCacheStorageMethod($cacheMethod);
        try {
            //file load
            $fileType = PHPExcel_IOFactory::identify($dirPath . DS . $fileName);
            $reader = PHPExcel_IOFactory::createReader($fileType);
            if($fileType != 'CSV') {
                $reader->setReadDataOnly(true);
                $reader->setLoadSheetsOnly($this->compSheetName);
            }
            $records = $reader->load($dirPath . DS . $fileName);
        }
        catch(Exception $e) {
            $this->exceptionMsg = $e->getMessage();
            return -2;
        }
        if($fileType != 'CSV' && ($records->getSheetCount() == 0 || strtoupper($records->getActiveSheet()->getTitle()) != $this->compSheetName)) {
            //invalid loaded sheet for preCheck
            $this->exceptionMsg = "Cannot find sheet: " . $this->compSheetName;
            return -3;
        }
        //now the file should be loaded, so lets start some serious parsing action
        $highestColumn = $records->getActiveSheet()->getHighestColumn();
        $highestRow = $records->getActiveSheet()->getHighestRow();
        $highestColumn++;
        $data = array();
        $columns = array();
        App::import('helper', 'DatabaseFields'); //breaking MVC again :)
        $dropDowns = new DatabaseFieldsHelper();
        //first we straight-up parse, then we derive other fields later on
        //grab field (column) names
        for($column = 'A'; $column != $highestColumn; $column++) {
            //parse down each column
            $currentValue = trim($records->getActiveSheet()->getCell($column . '1')->getValue());
            if(isset($this->compFields[strtoupper($currentValue)])) {
                $columns[$column] = $this->compFields[strtoupper($currentValue)];
            }
            else {
                //embargo column as we cannot store its field
                $this->embargoedColumns[$column] = $currentValue;
            }
        }
        foreach($columns as $column => $value) {
            //parse down each column
            //grab the dropdown list if current field is a dropdown
            $list = $dropDowns->getOptions($value, 4, false);
            foreach($list as $key=>$value) {
               $list[strtoupper($key)] = $value;
               unset($list[$key]);
            }
            for($row = 2; $row < $highestRow + 1; $row++) {
                //parse each row for the current field
                $currentValue = trim($records->getActiveSheet()->getCell($column . $row)->getValue());
                if(isset($list[strtoupper($currentValue)])) {
                    //value is a dropdown and valid
                    $data[$row - 2][$columns[$column]] = $list[strtoupper($currentValue)];
                }
                else {
                    //either field is not a dropdown or the dropdown value is not valid (just save anyways)
                    $data[$row - 2][$columns[$column]] = $currentValue;
                }
            }
        }
        //derive the other values
        for($row = 0; $row < count($data); $row++) {
            if(isset($data[$row]['engineer_signum'])) {
                App::import('model', 'User');
                $users = new User();
                $user = $users->find('first', array('conditions' => array('User.username' => $data[$row]['engineer_signum'])));
                $nameConcat = $user['User']['first_name'] . ' ' . $user['User']['last_name'];
                if($nameConcat != ' ') {
                    $data[$row]['engineer_name'] = $nameConcat;
                }
                else {
                   $data[$row]['engineer_name'] = $data[$row]['engineer_signum'];
                }
            }
            $data[$row]['siadmaster_id'] = $fileID;
            $data[$row]['team_name'] = 'NI';
            $data[$row]['date_created'] = date("Y-m-d");
        }
        if(count($data) == 0) {
            $this->exceptionMsg = "File contains no records";
            return -5;
        }
        $this->data['Siadsite'] = $data;
        //var_dump($this->data);
        return 0;
    }
}

?>
