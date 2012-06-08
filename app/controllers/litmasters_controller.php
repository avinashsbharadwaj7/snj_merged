<?php

/*
 * LTE (LIT) Controller
 */

class LitmastersController extends AppController {

    var $name = 'Litmasters';
    var $helpers = array('Html', 'Form', 'DatabaseFields', 'ShowFields', 'DatePicker', 'MyJsHtml');
    var $components = array('Session', 'Email');
    var $uses = array("LitmasterVerizon", "Litmaster", "LteAttSite");
    var $paginate = array(
        'limit' => 15,
        'page' => 1,
//        'order' => array(
//            'Litmaster.id' => 'asc'
//        )
    );

    function index() {
        /* placeholder */
    }

    function multiple_view() {
//        $this->set('listOfSavedSites', $listOfSavedSites);
//        $this->set('listOfUnsavedSites', $listOfUnsavedSites);
//        $this->Session->setFlash(__($listOfSavedSites .'<br>'. $listOfUnsavedSites, true));
    }

    function view($id = null, $action_link = 'index', $action_arg_1 = false, $listOfSavedSites=null, $listOfUnsavedSites=null) {
        if ($listOfSavedSites != "" || $listOfUnsavedSites != "") {
            $this->redirect(array('controller' => 'litmasters', 'action' => 'multiple_view', $listOfSavedSites, $listOfUnsavedSites));
        } else {
            $data = array();
            if ($id) {
                $data = $this->Litmaster->read(null, $id);
            }
            if (!empty($data)) {
                $this->set('dataValues', $data);
                $this->set(compact('action_link'));
                $this->set(compact('action_arg_1'));
                $this->set('uploadDirFiles', $this->Litmaster->Litfile->getUploadPath());
                $this->set('uploadDirSpecifics', $this->Litmaster->LitfileSupplementary->getUploadPath());
            } else {
                $this->Session->setFlash(__('Invalid LIT Record ID ' . $id, true));
                $this->redirect(array('controller' => 'litmasters', 'action' => 'index'));
            }
        }
    }

    function add() {
        if (isset($this->data['Litmaster']['teamNameField'])) {
            if ($this->data['Litmaster']['teamNameField'] == 'NDS') {
                $lte_customer = $this->data['Litmaster']['lte_customer'];
                $this->Session->write('lte_customer', $lte_customer);
                $this->redirect(array('controller' => 'ndsmasters', 'action' => 'add'));
            } else {
                if ($this->data['Litmaster']['lte_customer'] == "Verizon" && $this->data['Litmaster']['teamNameField'] == "NI") {
                    $this->redirect(array('controller' => 'litmaster_verizons', 'action' => 'add'));
                } else {
                    $lte_customer = $this->data['Litmaster']['lte_customer'];
                }
            }
        }

        if (isset($this->data['Litmaster']['teamNameField'])) {
            if ($this->data['Litmaster']['teamNameField'] == 'NDS') {
                $this->redirect(array('controller' => 'ndsmasters', 'action' => 'add'));
            } else if ($this->data['Litmaster']['teamNameField'] == 'NI - SIAD') {
                $this->redirect(array('controller' => 'siadmasters', 'action' => 'add'));
            } else {
                $this->set('isNI', true);
                $this->Session->write("next_upload_number", 1);
            }
        } else if (!empty($this->data)) {
            $this->set('isNI', true);
            if (isset($this->data['Litfile'])) {
                //save all valid uploads
                $this->saveUploadState('Litfile');
            }
            if (isset($this->data['LitfileSupplementary'])) {
                $this->saveUploadState('LitfileSupplementary');
            }
            if ($this->data['Litmaster']['number_of_sites'] == "Multiple") {
                $data = $this->data;
                $listOfSavedSites = "";
                $listOfUnsavedSites = "";
                $count = 0;
                $i = 0;
                $flagged = false;
                $firstSave = true;
                $tmp_name = null;
                $name = null;
                $sitelistArray = $this->multipleExplode(trim($data['Litmaster']['site_list']));
                $siteCount = count($sitelistArray);
                if($siteCount == 0)
                    $siteCount = 1;
                $this->Litmaster->set($this->data);
                if ($this->Litmaster->validates(array('fieldList' => array('time_taken_for_activity')))) {
                    $time = explode(":", $data['Litmaster']['time_taken_for_activity']);
                    $timeInMinutes = $time[0] * 60 + $time[1];
                    $avgTimeInMinutes = $timeInMinutes / $siteCount;
                    $hours = intval($avgTimeInMinutes / 60);
                    if (strlen($hours) == 1)
                        $hours = "0" . $hours;
                    $minutes = $avgTimeInMinutes % 60;
                    if (strlen($minutes) == 1)
                        $minutes = "0" . $minutes;
                    $avgTimePerActivity = $hours . ":" . $minutes;
                    foreach ($sitelistArray as $siteName) {
                        $data['Litmaster']['site_name'] = trim($siteName);
                        $data['Litmaster']['time_taken_for_activity'] = $avgTimePerActivity;
                        $this->Litmaster->create();
                        if ($this->Litmaster->saveAll($data)) {
                            if ($firstSave) {
                                $firstSave = false;
                                if (!empty($data['LitfileSupplementary'][0]['file']['name'])) {
                                    $tmp_name = $data['LitfileSupplementary'][0]['file']['tmp_name'];
                                    $name = $data['LitfileSupplementary'][0]['file']['name'];
                                }
                            }
                            /* Copy the file back to the tmp folder so
                             * that the file exists when it has to be saved for the next site in the site list */
                            if (!empty($name)) {
                                $id = $this->Litmaster->getLastInsertId();
//                            copy(APP . DS . 'webroot' . DS . 'files' . DS . 'lit' . DS . 'files' . DS . "LIT__." . $id . "__" . $name, $tmp_name);
                                copy('/irt/app/webroot/files/lit/files/' . "LIT_" . $id . "__" . $name, $tmp_name);
                            }
                            $flagged = true;
                            $listOfSavedSites .= "Sitename: " . strtoupper($siteName) . " ==> Report Id: " . $this->Litmaster->id . "<br>";
                            if ($this->params['form']['Email'] == 'Submit without Email') {
                                
                            } else {
                                $this->__sendEmailNotification($this->Litmaster->id, $this->data['Litmaster']['email'], 'Add Report');
                            }
                        } else {
                            $this->__deleteBlankUploads('LitfileSupplementary');
                            $this->Session->write("next_upload_number", (count($this->data['LitfileSupplementary']) > 0) ? count($this->data['LitfileSupplementary']) : 1);
                            $listOfUnsavedSites .= "Failed creating report for sitename: " . strtoupper($siteName) . "<br>";
//                            $this->Session->setFlash('Invalid sites in sitelist:<br>' . $this->Litmaster->invalidSitenames);
                            $this->Session->setFlash(__('Data could not be saved. Please try again.', true));
                        }
                    }
                    /* If at least one site report was save, $flagged=true */
                    if ($flagged) {
                        $this->Session->write('listOfSavedSites', $listOfSavedSites);
                        $this->Session->write('listOfUnsavedSites', $listOfUnsavedSites);
                        $this->redirect(array('controller' => 'litmasters', 'action' => 'multiple_view'));
                    }
                }
            } elseif ($this->data['Litmaster']['number_of_sites'] == "Single") {
                if ($this->Litmaster->saveAll($this->data)) {
                    if ($this->params['form']['Email'] == 'Submit without Email') {
                        $this->Session->setFlash("Report has been added!");
                    } else {
                        $this->Session->setFlash("Report has been added and email notification sent!");
                        $this->__sendEmailNotification($this->Litmaster->id, $this->data['Litmaster']['email'], 'Add Report');
                    }
                    $this->deleteUploadState('Litfile');
                    $this->deleteUploadState('LitfileSupplementary');
                    $this->redirect(array('action' => 'view', $this->Litmaster->id));
                } else {
                    $this->Session->setFlash(__('Data could not be saved. Please try again.', true));
                    $this->__deleteBlankUploads('LitfileSupplementary');
                    $this->Session->write("next_upload_number", (count($this->data['LitfileSupplementary']) > 0) ? count($this->data['LitfileSupplementary']) : 1);
                }
            }
            $this->deleteUploadState('Litfile');
            $this->deleteUploadState('LitfileSupplementary');
        }
    }

    /* Splits the site list based on various seperators */

    function multipleExplode($string = '') {
        $delimiters = array(";", "\n", "        ", " ", ",");
        $mainDelim = $delimiters[count($delimiters) - 1];
        array_pop($delimiters);
        foreach ($delimiters as $delimiter) {
            $string = str_replace($delimiter, $mainDelim, $string);
        }
        $result = explode($mainDelim, $string);
        foreach ($result as $key => $index) {
            if (trim($index) === "" || trim($index) == null) {
                unset($result[$key]);
            }
        }
        return $result;
    }

    function edit($search_id = null, $use_id = false) {
        if (isset($this->data) || $search_id != null) {
            if ($search_id != null && ($use_id == 1) || $use_id) {
                $this->data['Litmaster']['enteredId'] = $search_id;
                $this->data['Litmaster']['lte_customer'] = "AT&T";
            }
            $this->Litmaster->set($this->data);
            if ($this->Litmaster->validates()) {
                if (isset($this->data['Litmaster']['enteredId'])) {
                    if ($this->data['Litmaster']['lte_customer'] == "Verizon") {
                        $this->redirect(array('controller' => 'litmaster_verizons', 'action' => 'edit', $this->data['Litmaster']['enteredId']));
                    }
                    if ($search_id == null) {
                        $search_id = $this->data['Litmaster']['enteredId'];
                    }
                    if ($search_id != "") {
                        $this->data = $this->Litmaster->read(null, $search_id);
                        if (!empty($this->data)) {
                            if (Authsome::get('username') != $this->data['Litmaster']['engineer_signum']) {
                                $this->Session->setFlash(__('You are not authorized to edit this LIT (ID = ' . $this->Litmaster->id . ')', true));
                                $this->redirect(array('action' => 'view', $this->Litmaster->id));
                            } else {
                                $this->prepareUploadState('Litfile');
                                $this->prepareUploadState('LitfileSupplementary');
                                if (isset($this->data['LitfileSupplementary'])) {
                                    // Get number of uploads
                                    $this->Session->write("next_upload_number", (count($this->data['LitfileSupplementary']) > 0) ? count($this->data['LitfileSupplementary']) : 1);
                                }
                                /* Assign variable to the current id that we are working with. */
                                $this->set('litId', $this->Litmaster->id);
                            }
                        }
                    }
                } else {
                    /* LIT has been edited, now lets try to save */
                    if (isset($this->data['Litfile'])) {
                        //save all valid uploads
                        $this->saveUploadState('Litfile');
                    }
                    if (isset($this->data['LitfileSupplementary'])) {
                        $this->saveUploadState('LitfileSupplementary');
                    }
                    if ($this->Litmaster->saveAll($this->data)) {
                        if ($this->params['form']['Email'] == 'Submit with Email') {
                            $this->Session->setFlash("Report has been saved and email notification sent!", true);
                            $this->__sendEmailNotification($this->Litmaster->id, $this->data['Litmaster']['email'], 'Modify Report');
                        } else {
                            $this->Session->setFlash("Report has been saved!", true);
                        }
                        $this->deleteUploadState('Litfile');
                        $this->deleteUploadState('LitfileSupplementary');
                        $this->redirect(array('action' => 'view', $this->Litmaster->id));
                    } else {
                        /* Prolly validation issues.  We need to set litID again so the form loads. */
                        $this->Session->setFlash(__('Data could not be saved. Please try again.', true));
                        $this->__deleteBlankUploads('LitfileSupplementary');
                        $this->Session->write("next_upload_number", (count($this->data['LitfileSupplementary']) > 0) ? count($this->data['LitfileSupplementary']) : 1);
                        $this->set('litId', $this->Litmaster->id);
                    }
                }
            }
        }
    }

    function populate() {
        $this->autoRender = false;
        $siteName = $this->data['Litmaster']['site_name'];
        $data = null;
        $data = $this->LteAttSite->find('all', array('conditions' => array('LteAttSite.site_name' => $siteName)));
        header("Content Type: text/json");
        if (!empty($data)) {
            return json_encode($data);
        } else {
            return null;
        }
    }

    function search($use_args = null) {
        $this->__search($use_args);
    }

    function litexcel($id = null, $use_id=false) {
        ini_set('memory_limit', '-1');
        $this->layout = false;
        if (!$use_id) {
            /* from search */
            $cond = $this->Session->read('session_conditions');
            $this->set("row", $this->Litmaster->find("all", array('conditions' => $cond)));
        } else {
            /* from view */
            $this->set("row", $this->Litmaster->find("all", array('conditions' => array('id' => $id))));
        }
    }

    function updater() {
        $this->autoLayout = false;
        $this->layout = 'ajax';
        if (!isset($this->params['data'])) {
            $num = $this->__getNextUploadNumber();
            $this->set("uploaderUpdate", true);
            $this->set("nextUploaderNumber", $num);
            $this->Session->write('next_upload_number', ($num + 1));
        }
    }

    function download($id, $tag, $model = 'Litfile') {
        $this->view = 'Media';
        $dirPath = $this->Litmaster->$model->getUploadPath();
        $fileName = $this->Litmaster->$model->getFileName($id, $tag);
        if (is_array($fileName) && isset($fileName[$model]) && is_array($fileName[$model])) {
            //returned a hit
            $fileName = $fileName[$model]['file_name'];
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

    /* Serves the link to download the excel template
     * that will contain site info fields required to auto populate LTE AT&T reports. */

    function downloadTemplate() {
        $file = new File("lte_att_autopopulate_template.xls");
        $ext = $file->ext();
        $path = APP . 'webroot' . DS . 'files' . DS . 'lit' . DS . 'lte_att_autopopulate_template.xls';
        $params = array(
            'name' => "lte_att_autopopulate_template.xls",
            'download' => true,
            'extension' => $ext,
            'mimeType' => "application/vnd.ms-excel", // extends internal list of mimeTypes
            'path' => $path,
//            'fileSize' => $path->size(),
        );
        if (file_exists($params['path'])) {
            $this->__sendHeaders($params);
            readfile($params['path']);
            exit();
        }
    }

    function __sendHeaders($params) {
        header("Content-Type: {$params['mimeType']}");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename={$params['name']}");
        header("Content-Transfer-Encoding: binary ");
//        header('Content-Length: ' . $params['fileSize']);
    }

    private function __sendEmailNotification($id, $emails, $action = '') {
        $dl = 'management;';
        if ($this->data['Litmaster']['region'] == "South West")
            $dl = $dl . 'LTE_SW;';
//        elseif ($this->data['Litmaster']['region'] == "South Central")
//            $dl = $dl . 'SL_SC;';
//        elseif ($this->data['Litmaster']['region'] == "North East")
//            $dl = $dl . 'SL_NE;';
//        elseif ($this->data['Litmaster']['region'] == "South East")
//            $dl = $dl . 'SL_SE;';
//        elseif ($this->data['Litmaster']['region'] == "North West")
//            $dl = $dl . 'SL_NW;';
//        elseif ($this->data['Litmaster']['region'] == "North Central")
//            $dl = $dl . 'LTE_NC;';
        $this->set('dataValues', $this->Litmaster->read(null, $id));        
        $subject = "Region:" . $this->data['Litmaster']['region'] . ", Customer:" . $this->data['Litmaster']['lte_customer'] . ", Activity:" . $this->data['Litmaster']['activity_type'] . ", Status:" . $this->data['Litmaster']['activity_status'];        
        $subject = "RNAM-PQR : LTE-LIT " . $action . " - " . $subject;        
        $this->sendEmail($dl, $emails, 'lte_att', $subject);
    }

    private function __getNextUploadNumber() {
        if ($this->Session->check('next_upload_number')) {
            return $this->Session->read('next_upload_number');
        }
    }

    private function __deleteBlankUploads($modelName) {
        if (isset($this->data[$modelName]) && is_array($this->data[$modelName])) {
            foreach ($this->data[$modelName] as $upload_slot => $upload) {
                if (is_array($upload) && isset($upload['file']) && is_array($upload['file'])) {
                    if (!isset($upload['file']['error']) || $upload['file']['error'] != 0) {
                        unset($this->data[$modelName][$upload_slot]);
                    }
                }
            }
        }
    }

    private function __search($use_args) {
        if (empty($this->data)) {
            /* either a new session, or update to pagination */
            if (empty($this->passedArgs) && empty($this->params['pass'])) {
                /* new search session */
                $this->Session->delete('searchSession');
                $this->Session->delete('paginatorArgs');
                $this->Session->delete('session_conditions');
                $conditions_entered = false;
            } else if ($this->Session->check('searchSession') && $this->Session->check('paginatorArgs')) {
                /* same session, prolly updated pagination */
                $this->data = $this->Session->read('searchSession');
                if ($use_args == 'fromView') {
                    /* use args passed into function */
                    $this->passedArgs = $this->Session->read('paginatorArgs');
                }
            } else {
                // user clicking back from form creation or edit
                $this->redirect(array('controller' => 'litmasters', 'action' => 'index'));
            }
        }
        if (!empty($this->data)) {
            /* conditions entered */
            $this->Litmaster->set($this->data);
            $this->Session->write('searchSession', $this->data);
            if (!$this->Litmaster->validates()) {
//                echo "<script type=text/javascript>alert('validation FALSE')</script>";
                $conditions_entered = false;
                $this->Litmaster->invalidFields();
            } else {
//                echo "<script type=text/javascript>alert('validation TRUE')</script>";
                if ($use_args == 'fromSearchResults') {
                    /* hitting back in the results */
                    $conditions_entered = false;
                } else {
                    $conditions_entered = true;
                }
                $this->set('conditions_entered', $conditions_entered);
//                $conditions = $this->__getConditions($this->data['Litmaster']);
                if ($this->data['Litmaster']['lte_customer'] == 'Verizon') {
                    $modelName = 'LitmasterVerizon';
                    $conditions = $this->__getConditions($this->data['Litmaster'], $modelName);
                    $this->set('modelName', $modelName);
                    $this->set('controllerName', "litmaster_verizons");
                    $this->set('litQuery', $this->paginate('LitmasterVerizon', $conditions));
                }
                /* Condition below may never occur if customer is a mandatory field */ else if ($this->data['Litmaster']['lte_customer'] == "") {
                    
                }
//                else if($this->data['Litmaster']['lte_customer'] == 'AT&T') {
                else {
                    $modelName = 'Litmaster';
                    $conditions = $this->__getConditions($this->data['Litmaster'], $modelName);
                    $this->set('modelName', $modelName);
                    $this->set('controllerName', "litmasters");
                    $this->set('litQuery', $this->paginate('Litmaster', $conditions));
                }
//                $this->set('litQuery', $this->paginate('Litmaster', $conditions));
                $this->Session->write('session_conditions', $conditions);
            }
        }
        $this->set('conditions_entered', $conditions_entered);
        $this->Session->write('paginatorArgs', $this->passedArgs);
        $this->params['pass'] = array(); //clear all passed in args
    }

    private function __getConditions($data, $modelName) {
        $conditions = array();
        $conditions = $this->__processDateConditions($data, $modelName);
        if (!$this->__isEmpty($data['litId'])) {
            $conditions[$modelName . '.id'] = $data['litId'];
        }
//        if (!$this->__isEmpty($data['date_created'])) {
//            //$conditions['Litmaster.date_initiated'] = $this->__implodeDate($data['dateCreated']);
//            $conditions[$modelName . '.date_initiated'] = $data['date_created'];
//        }
        if (!$this->__isEmpty($data['engineer_signum_entered'])) {
            $conditions[$modelName . '.engineer_signum'] = $data['engineer_signum_entered'];
        }
        if (!$this->__isEmpty($data['engineer_work_location_entered'])) {
            $conditions[$modelName . '.engineer_work_location'] = $data['engineer_work_location_entered'];
        }
        /* Comment the below condition when litmaster table has reports of ONLY AT&T */
        if (!$this->__isEmpty($data['lte_customer'])) {
            $conditions[$modelName . '.lte_customer'] = $data['lte_customer'];
        }
        if (!$this->__isEmpty($data['site_name_search'])) {
            if ($data['lte_customer'] == "AT&T")
                $conditions[$modelName . '.site_name'] = $data['site_name_search'];
            else if ($data['lte_customer'] == "Verizon")
                $conditions[$modelName . '.enb_name'] = $data['site_name_search'];
        }
        if (!$this->__isEmpty($data['region_search'])) {
            $conditions[$modelName . '.region'] = $data['region_search'];
        }
        if (!$this->__isEmpty($data['activity_type_entered'])) {
            $conditions[$modelName . '.activity_type'] = $data['activity_type_entered'];
        }
        if (!$this->__isEmpty($data['activity_status_entered'])) {
            $conditions[$modelName . '.activity_status'] = $data['activity_status_entered'];
        }

        return $conditions;
    }

    private function __isEmpty($value) {
        return ($value == null || empty($value) || $value == "") ? true : false;
    }

    private function __processDateConditions($data, $modelName) {
        $condition = null;
        if (!$this->__isEmpty($data['from_date']) && !$this->__isEmpty($data['to_date'])) {
            $condition[] = array($modelName . '.date_initiated BETWEEN ? AND ?' => array($data['from_date'], $data['to_date']));
        }
        if (!$this->__isEmpty($data['from_date']) && $this->__isEmpty($data['to_date'])) {
            $condition[] = array($modelName . '.date_initiated >=' => $data['from_date']);
        }
        if ($this->__isEmpty($data['from_date']) && !$this->__isEmpty($data['to_date'])) {
            $condition[] = array($modelName . '.date_initiated <=' => $data['to_date']);
        }
        return $condition;
    }

    /* private function __implodeDate($date) {
      return $date['year'] . '-' . $date['month'] . '-' . $date['day'];
      } */
}

?>
