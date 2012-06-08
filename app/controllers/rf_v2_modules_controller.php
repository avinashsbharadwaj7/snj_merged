<?php

class RfV2ModulesController extends AppController {

    var $name = 'RfV2Modules';
    var $helpers = array('Html', 'Form', 'Javascript', 'DatabaseFields', 'Ajax', 'RfGridViewer', 'MyJsHtml');
    var $components = array('Session');

    function beforeFilter() {
        parent::beforeFilter();
        $this->layout = "rnc";
    }

    function index() {
        $this->RfV2Module->recursive = 0;
        $this->set('rfV2Modules', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid rf v2 module', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('rfV2Module', $this->RfV2Module->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->RfV2Module->create();
            if ($this->RfV2Module->save($this->data)) {
                $this->Session->setFlash(__('The rf v2 module has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The rf v2 module could not be saved. Please, try again.', true));
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->render("edit");
        }
        if(isset($this->data['RfV2Module']['editId'])){
            $this->redirect(array("action"=>"edit", $this->data['RfV2Module']['editId']));
        }
        if (isset($this->data['RfV2Module']['id']) && $id) {
            if ($this->RfV2Module->save($this->data)) {
                $this->Session->setFlash(__('The Report has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Report could not be saved. Please, try again.', true));
            }
            $this->render("add");
        }
        if (!isset($this->data['RfV2Module']['id']) && $id) {
            $this->data = $this->RfV2Module->read(null, $id);
            $this->render("add");
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for rf v2 module', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->RfV2Module->delete($id)) {
            $this->Session->setFlash(__('Rf v2 module deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Rf v2 module was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

    function autoComplete() {
        Configure::write('debug', 0);
        $this->layout = 'ajax';
        $this->autoRender = false;
        App::import('model', 'RfEngineerList');
        $rfEngineerList = new RfEngineerList();
        $q = $this->params['url']['term'];
        $conditions = array(
            "OR" => array(
                array('RfEngineerList.first_name LIKE' => $q . '%'),
                array('RfEngineerList.last_name LIKE' => $q . '%')
            )
        );
        $names = $rfEngineerList->find("all", array(
                    'conditions' => $conditions,
                    'fields' => array('full_name')));
        $return = array();
        foreach($names as $name){
            $return[] = $name['RfEngineerList']['full_name'];
        }
        return json_encode(array_values($return));
    }

    function import(){
        $toDisplay = null;
        if($this->data['RfV2Module']['xlfile']){
            if(!in_array($this->data['RfV2Module']['xlfile']['type'], array('application/vnd.ms-excel', 'application/download'))){
                $this->Session->setFlash('Invalid File type'.$this->data['RfV2Module']['xlfile']['type']);
                $this->redirect(array('action'=>'import'));
            }
            $new_name = $this->data['RfV2Module']['xlfile']['tmp_name'].'.xls';
            move_uploaded_file($this->data['RfV2Module']['xlfile']['tmp_name'], $new_name);
            App::import('Vendor', 'php-excel-reader/reader2');
            $data = new Spreadsheet_Excel_Reader();
            $data->setOutputEncoding('CP1251');
            $data->read($new_name);
            $rows = $data->sheets[0]['cells'];
            $map = $this->map($this->data['RfV2Module']['template_type']);//debug($map);exit();
            foreach($rows as $row){
                if(isset($row[1])) if($row[1] === 'ID') continue;
                $ingest = $this->prepareToIngest($row, $map);
                if(!isset($row[1])){
                    $id = $this->checkForDuplicatesAndSave($ingest);
                    if($id) {
                        $toDisplay[$id] = true;
                    }
                    continue;
                }
                $toDisplay[$ingest['RfV2Module']['id']] = ($this->RfV2Module->save($ingest)) ? true : false;
            }

        }
        $this->set(compact('toDisplay'));
    }

    function map($excelId = 0){
        $map = array('unknown',
                'id', 'project_name','customer_unit','region', 'state', 'technology','project_type','market',
                'market_lead','project_manager','work_location','person_completing','sub_project_name','sub_project_status',
                'number_of_sites',
                'additional_engineers','checklist_accurate','checklist_inaccurate_reason','sow_available','sow_unavailable_reason',
                'nw_number_available','nw_number_unavailable_reason','project_budget_access','project_budget_no_access_reason','engineers_qualified',
                'engineers_qualified_quantity','project_start_date','initial_planned_delivery_date_on_sow','change_recommendations_number',
                'rejected_recommendations_number','majority_rejection_responsible','major_rejection_reason',
                'changes_not_implemented_number','major_not_implemented_reason',
                'sow_adjustments_number', 'sow_adjustments_reason_1','sow_adjustments_reason_2','sow_adjustments_reason_3',
                'delivery_date_adjustments_number','delivery_date_adjustment_reason_1','delivery_date_adjustment_reason_2','delivery_date_adjustment_reason_3',
                'actual_delivery_date',
                'project_expectations_met','project_approved_by_customer', 'overall_quality_rating'
             );
        if($excelId == 0){
            return $map;
        }
        if($excelId == 1){
            $myMap = array(
                "post_launch_carrier_tuned", "post_launch_complete_closeout_package", "post_launch_expedited_tuning",
                "post_launch_frequency_band", "post_launch_daily_report_delivered", "post_launch_kick_off_slides_delivered",
                "post_launch_tracked_delivered", "post_launch_market_folder"
            );
            $map = array_merge($map, $myMap);
            return $map;
        }
        if($excelId == 2){
            $myMap = array(
                "pre_launch_number_of_drives", "pre_launch_drive1_fail_reason",
                "pre_launch_drive2_fail_reason", "pre_launch_drive3_fail_reason"
            );
            $map = array_merge($map, $myMap);
            return $map;
        }
    }

    function checkForDuplicatesAndSave($data){
        $conditions = array('RfV2Module.project_name'=>$data['RfV2Module']['project_name'],
                'RfV2Module.technology'=>$data['RfV2Module']['technology'],
                'RfV2Module.sub_project_name'=>$data['RfV2Module']['sub_project_name']);
        $duplicates = $this->RfV2Module->find('all', array('conditions'=>$conditions));
        if(count($duplicates) == 1){
            $data['RfV2Module']['id'] = $duplicates[0]['RfV2Module']['id'];
            return ($this->RfV2Module->save($data)) ? $duplicates[0]['RfV2Module']['id'] : false;
        }
        if(count($duplicates) > 1){
            $this->Session->setFlash('Duplicates found for Project Name & Technology combination. ID: '.$duplicates[0]["RfV2Module"]["id"]);
            return false;
        }
        $this->RfV2Module->create();
        if($this->RfV2Module->save($data)){
            $id = $this->RfV2Module->getLastInsertId();
            $this->Session->setFlash('New report created. ID: '. $id);
            return $id;
        }else{
            $this->Session->setFlash('Error occurred while reading a row...');
            return false;
        }

    }

    function prepareToIngest($row, $map){
        foreach ($row as $key => $value){

            if($map[$key] === "additional_engineers"){
                $temp = explode(",", $value);
                $temp = array_filter($temp);
                $temp = array_unique($temp);
                foreach($temp as $key1 => $val){
                    $temp[$key1] = trim($val);
                }
                $data['RfV2Module'][$map[$key]] = $temp;
            }else{
                $data['RfV2Module'][$map[$key]] = $value;
            }
        }
        $data['RfV2Module']['project_start_date'] = $this->__changeDateFormat($data['RfV2Module']['project_start_date']);
        $data['RfV2Module']['initial_planned_delivery_date_on_sow'] = $this->__changeDateFormat($data['RfV2Module']['initial_planned_delivery_date_on_sow']);
        $data['RfV2Module']['actual_delivery_date'] = $this->__changeDateFormat($data['RfV2Module']['actual_delivery_date']);
        return $data;
    }

    function __changeDateFormat($date){
        if (preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $date)){
            preg_match('/(?P<date>\w+)\/(?P<month>\w+)\/(?P<year>\w+)/', $date, $match);
            $date = $match['month'] . "/" . $match['date'] . "/" . $match['year'];
        }
        return date('Y-m-d', strtotime($date));
    }

    function download_file($filename) {
        $this->view = 'Media';
        $mimeType = strrpos($filename, "ppt") === strlen($filename) - strlen("ppt") ?
                array('ppt' => 'application/vnd.ms-powerpoint') :
                array("xls" => "application/vnd.ms-excel");
        $pathInfo = pathinfo($filename);
        $params = array(
            'id' => $filename,
            'name' => $pathInfo['filename'],
            'extension' => $pathInfo['extension'],
            'mimeType' => $mimeType, // extends internal list of mimeTypes
            'path' => APP . DS . 'webroot' . DS . 'files' . DS . 'rf' . DS
        );
        $this->set($params);
    }

    function dashboard(){}
    function templates(){}

    function search() {
        if (empty($this->data)) {
            $this->set('searchRendered', false);
        }
        if(empty($this->passedArgs) && empty($this->data)){
            $this->Session->delete("RfSearchData");
        }
        if(!empty($this->passedArgs) && empty($this->data)){
            $this->data = $this->Session->read("RfSearchData");
        }
        if(!empty($this->data)){
            $this->Session->write("RfSearchData", $this->data);
            $this->set('searchRendered', true);
            $conditions = $this->__getConditions($this->data['RfV2Module']);
            $this->paginate = array('RfV2Module' => array('limit' => 20,'page' => 1,'order' => array('RfV2Module.id' => 'asc')));
            $this->set('RfReports', $this->paginate("RfV2Module", $conditions));
        }
    }

    function __getConditions($data){
        list($data, $conditions) = $this->__stripDates($data);
        if(!$this->__isEmpty($data['customer_unit'])){
            $conditions[] = array('RfV2Module.customer_unit'=> $data['customer_unit']);
        }
        if(!$this->__isEmpty($data['region'])){
            $conditions[] = array('RfV2Module.region LIKE'=> "%{$data['region']}%");
        }
        if(!$this->__isEmpty($data['market'])){
            $conditions[] = array('RfV2Module.market LIKE'=> "%{$data['market']}%");
        }
        if(!$this->__isEmpty($data['technology'])){
            $conditions[] = array('RfV2Module.technology'=> $data['technology']);
        }
        if(!$this->__isEmpty($data['project_type'])){
            $conditions[] = array('RfV2Module.project_type'=> $data['project_type']);
        }
        if(!$this->__isEmpty($data['work_location'])){
            $conditions[] = array('RfV2Module.work_location'=> $data['work_location']);
        }
        return $conditions;
    }

    function __isEmpty($value){
        return ($value == null || empty($value) || $value == "") ? true : false;
    }

    function __stripDates($data){
        $conditions = null;
        if(!$this->__isEmpty($data['expected_delivery_date_from']) && !$this->__isEmpty($data['expected_delivery_date_to']))
            $conditions[] = array('RfV2Module.approved_delivery_date BETWEEN ? AND ?'=> array($data['expected_delivery_date_from'], $data['expected_delivery_date_to']));
        if(!$this->__isEmpty($data['actual_delivery_date_from']) && !$this->__isEmpty($data['actual_delivery_date_to']))
            $conditions[] = array('RfV2Module.actual_delivery_date BETWEEN ? AND ?'=> array($data['actual_delivery_date_from'], $data['actual_delivery_date_to']));
        unset($data['expected_delivery_date_from']);
        unset($data['expected_delivery_date_to']);
        unset($data['actual_delivery_date_from']);
        unset($data['actual_delivery_date_to']);
        return array($data, $conditions);
    }

    function download(){
        ini_set('memory_limit', '-1');
        $data = array();
        $searchQuery = $this->Session->read("RfSearchData");
        if($searchQuery == null || empty($searchQuery)){
            $this->Session->setFlash(__('Please click on search button', true));
            $this->redirect(array('action' => 'search'));
        }else{
            $conditions = $this->__getConditions($searchQuery['RfV2Module']);
            $data = $this->RfV2Module->find('all',array("conditions"=>$conditions));
            $this->set('data', $data);
            $this->layout = "ajax";
        }
    }
}

?>