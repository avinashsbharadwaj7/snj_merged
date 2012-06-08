<?php
/*
    Document   : rf_modules_controller
    Author     : emoibhu Moiz Bhukhiya
    Description: controller for RF module
*/

class RfModulesController extends AppController {

    var $helpers = array('Html', 'Form', 'Javascript', 'DatabaseFields', 'Ajax', 'RfGridViewer', 'MyHtml');
    var $components = array('Session');
    var $name = 'RfModules';
    var $managers = array('ewukali','EUSFZWS');
    
    // var $layout = 'permarinus_blue';
    //var $uses = array('Feedback');
    //var $uses = array('Field');

    function  beforeFilter() {
        parent::beforeFilter();
        $this->Session->setFlash(__("Redirected to RF Module v2",true));
        $this->redirect(array("controller" => "rf_v2_modules", "action"=>$this->action));
    }

    function index() {
        
    }

    function myhtml(){
        $myData = null;
        
        if(!empty($this->data))
                $myData = $this->data;
        $this->set(compact('myData'));
    }

    function edit($id = null) {
        $this->set('hasId', (!$id)? true:false);
        if (!$id && !empty($this->data['RfModule']['editId'])) {
            $this->redirect(array('action' => 'edit', $this->data['RfModule']['editId']));
        }
        if (!empty($this->data) && empty($this->data['RfModule']['editId'])) {
            $this->_ignoreAdditionalEngineer();
            if ($this->RfModule->saveAll($this->data)) {
                $this->Session->setFlash(__('The data has been saved', true));
                $this->redirect(array('action' => 'view', $id));
            } else {
                $this->Session->write("edit_id", $id);
                $this->set('RfReport', $this->data);
                $this->Session->setFlash(__('Data could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data) && !empty($id)) {
            $this->data = $this->RfModule->read(null, $id);
            if (empty($this->data)) {
                $this->Session->setFlash(__('Invalid report id'.$id, true));
                $this->redirect(array('action' => 'index'));
            }
            $this->Session->write("edit_id", $id);
            $this->set('RfReport', $this->data);
        }
        $this->__checkEditPermission($id);
    }

    function view($id) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid report id', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('RfModule', $this->RfModule->findById($id));
    }

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
            $conditions = $this->__getConditions($this->data['RfModule']);
            $this->paginate = array('RfModule' => array('limit' => 20,'page' => 1,'order' => array('RfModule.id' => 'asc')));
            $this->set('RfReports', $this->paginate("RfModule", $conditions));
        }
    }

    function download(){
        ini_set('memory_limit', '-1');
        $data = array();
        $searchQuery = $this->Session->read("RfSearchData");
        if($searchQuery == null || empty($searchQuery)){
            $this->Session->setFlash(__('Please click on search button', true));
            $this->redirect(array('action' => 'search'));
        }else{
            $conditions = $this->__getConditions($searchQuery['RfModule']);
            $data = $this->RfModule->find('all',array("conditions"=>$conditions));
            $this->set('data', $data);
            $this->layout = "ajax";
        }
    }

    function copy($id){
        if (!$id) {
            $this->Session->setFlash(__('Invalid report id', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->data = $this->RfModule->read(null, $id);
        unset($this->data['RfModule']['id']);
        unset($this->data['RfAdditionalEngineer']);
        $this->data['RfModule']['date_created'] = date("Y-m-d");
        $this->data['RfModule']['person_completing'] = Authsome::get('username');
        $this->RfModule->create();
        if($this->RfModule->save($this->data)){
            $this->Session->setFlash(__('Clone created with id: '.$this->RfModule->id, true));
            $this->redirect(array('action' => 'view', $this->RfModule->id));
        }else{
            $this->Session->setFlash(__('Error Occurred', true));
            $this->redirect(array('action' => 'view', $id));
        }
    }

    function listall() {
        $this->paginate = array(
            'RfModule' => array(
                'limit' => 20,
                'page' => 1,
                'order' => array(
                    'RfModule.id' => 'asc')
            )
        );
        $this->set('RfReports', $this->paginate("RfModule"));
    }

    function add() {
       if (!empty($this->data)) {
            $this->RfModule->create();
            $this->_ignoreAdditionalEngineer();
            if ($this->RfModule->saveAll($this->data)) {
                $id = $this->RfModule->id;
                $this->Session->setFlash('Your report has been added.');
                $this->redirect(array('action' => 'view', $id));
            } else {
                $this->Session->setFlash('Your report could not be saved. Please try again!');
            }
        }
        $this->Session->write("additional_engineer_number", 1);
    }

    function updater() {
        $this->layout = 'ajax';
        if (!isset($this->params['data'])):
            $num = $this->_getNextEngineerNumber();
            $this->set("add_engineers", true);
            $this->set("nextNumber", $num);
        else:
            $this->set("add_engineers", false);
            $this->set("data",(isset($this->params['data']['RfModule'])) ? $this->params['data']['RfModule'] : $this->params['data']['PreLaunchReport'][0]);
        endif;
    }

    function _getNextEngineerNumber() {
        $num = $this->Session->read("additional_engineer_number");
        $this->Session->write("additional_engineer_number", $num + 1);
        return $num;
    }

    function grid_edit(){
        $this->layout = 'ajax';
    }

    function grid_updater(){
        $this->layout = 'ajax';
        list($order, $page, $limit, $conditions) = $this->checkParams();
        $data = $this->RfModule->find('all', array('conditions'=>$conditions, 'order'=>$order, 'page'=>$page, 'limit'=>$limit));
        $count = $this->RfModule->find('count', array('conditions'=>$conditions));
        $loadRequest = ($this->params['pass'][0] == "load") ? $this->makeRows($data, $limit, $page, $count) : null;
        $this->set(compact('loadRequest', 'data', 'editRequest'));
    }

    function grid_saver(){
        $this->autoRender = false;
        $data['RfModule'] = $this->params['form'];
        echo ($this->RfModule->save($data)) ? "Saved" : "Couldn't Save";
    }

    function import(){
        $toDisplay = null;
        if($this->data['RfModule']['xlfile']){
            if(!in_array($this->data['RfModule']['xlfile']['type'], array('application/vnd.ms-excel', 'application/download'))){
                $this->Session->setFlash('Invalid File type'.$this->data['RfModule']['xlfile']['type']);
                $this->redirect(array('action'=>'import'));
            }
            $new_name = $this->data['RfModule']['xlfile']['tmp_name'].'.xls';
            move_uploaded_file($this->data['RfModule']['xlfile']['tmp_name'], $new_name);
            App::import('Vendor', 'php-excel-reader/reader2');
            $data = new Spreadsheet_Excel_Reader();
            $data->setOutputEncoding('CP1251');
            $data->read($new_name);
            $rows = $data->sheets[0]['cells'];
            $map = $this->map($this->data['RfModule']['template_type']);
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
                $toDisplay[$ingest['RfModule']['id']] = ($this->RfModule->saveAll($ingest)) ? true : false;
            }

        }
        $this->set(compact('toDisplay'));
    }

    function checkForDuplicatesAndSave($data){
        $conditions = array('RfModule.project_name'=>$data['RfModule']['project_name'],
                'RfModule.technology'=>$data['RfModule']['technology'],
                'RfModule.sub_project_name'=>$data['RfModule']['sub_project_name']);
        $duplicates = $this->RfModule->find('all', array('conditions'=>$conditions));
        if(count($duplicates) == 1){
            $data['RfModule']['id'] = $duplicates[0]['RfModule']['id'];
            return ($this->RfModule->saveAll($data)) ? $duplicates[0]['RfModule']['id'] : false;
        }
        if(count($duplicates) > 1){
            $this->Session->setFlash('Duplicates found for Project Name & Technology combination');
            return false;
        }
        $this->RfModule->create();
        $data['RfModule']['date_created'] = date("Y-m-d G:i:s");debug($data);
        if($this->RfModule->saveAll($data)){
            $id = $this->RfModule->getLastInsertId();
            $this->Session->setFlash('New report created. ID: '. $id);
            return $id;
        }else{
            $this->Session->setFlash('Error occurred while reading a row.');
            return false;
        }
        
    }

    function prepareToIngest($row, $map){
        foreach ($row as $key => $value){

            if($map[$key] == "additional_engineer"){
                $engineers = explode(",", $value);
                for($i=0; $i<count($engineers);$i++){
                    $data['RfAdditionalEngineer'][$i]['engineer_signum'] = trim($engineers[$i]);
                }
            }elseif(preg_match("/^pre_launch/", $map[$key]) > 0){
                $data = $this->__preprocessPreLaunchData($data, $map[$key], $value);
            }elseif(preg_match("/^post_launch/", $map[$key]) > 0){
                $data = $this->__preprocessPostLaunchData($data, $map[$key], $value);
            }else{
                $data['RfModule'][$map[$key]] = $value;
            }
        }
        $data['RfModule']['project_start_date'] = $this->__changeDateFormat($data['RfModule']['project_start_date']);
        $data['RfModule']['delivery_date'] = $this->__changeDateFormat($data['RfModule']['delivery_date']);
        $data['RfModule']['approved_delivery_date'] = $this->__changeDateFormat($data['RfModule']['approved_delivery_date']);
        $data['RfModule']['actual_delivery_date'] = $this->__changeDateFormat($data['RfModule']['actual_delivery_date']);
        return $data;
    }

    function __changeDateFormat($date){
        if (preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $date)){
            preg_match('/(?P<date>\w+)\/(?P<month>\w+)\/(?P<year>\w+)/', $date, $match);
            $date = $match['month'] . "/" . $match['date'] . "/" . $match['year'];
        }
        return date('Y-m-d', strtotime($date));
    }

    function __getConditions($data){
        list($data, $conditions) = $this->__stripDates($data);
        if(!$this->__isEmpty($data['customer_unit'])){
            $conditions[] = array('RfModule.customer_unit'=> $data['customer_unit']);
        }
        if(!$this->__isEmpty($data['region'])){
            $conditions[] = array('RfModule.region LIKE'=> "%{$data['region']}%");
        }
        if(!$this->__isEmpty($data['market'])){
            $conditions[] = array('RfModule.market LIKE'=> "%{$data['market']}%");
        }
        if(!$this->__isEmpty($data['technology'])){
            $conditions[] = array('RfModule.technology'=> $data['technology']);
        }
        if(!$this->__isEmpty($data['project_type'])){
            $conditions[] = array('RfModule.project_type'=> $data['project_type']);
        }
        if(!$this->__isEmpty($data['work_location'])){
            $conditions[] = array('RfModule.work_location'=> $data['work_location']);
        }
        return $conditions;
    }

    function __isEmpty($value){
        return ($value == null || empty($value) || $value == "") ? true : false;
    }

    function __stripDates($data){
        $conditions = null;
        if(!$this->__isEmpty($data['expected_delivery_date_from']) && !$this->__isEmpty($data['expected_delivery_date_to']))
            $conditions[] = array('RfModule.approved_delivery_date BETWEEN ? AND ?'=> array($data['expected_delivery_date_from'], $data['expected_delivery_date_to']));
        if(!$this->__isEmpty($data['actual_delivery_date_from']) && !$this->__isEmpty($data['actual_delivery_date_to']))
            $conditions[] = array('RfModule.actual_delivery_date BETWEEN ? AND ?'=> array($data['actual_delivery_date_from'], $data['actual_delivery_date_to']));
        unset($data['expected_delivery_date_from']);
        unset($data['expected_delivery_date_to']);
        unset($data['actual_delivery_date_from']);
        unset($data['actual_delivery_date_to']);
        return array($data, $conditions);
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

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id. ', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->data = $this->RfModule->read(null, $id);
        $user = Authsome::get('username');
        if ($user != $this->data['RfModule']['person_completing'] && !in_array($user, $this->managers)) {
            $this->Session->setFlash(__('You are not authorized to delete this report!', true));
            $this->redirect(array('action' => 'view', $id));
        }
        if ($this->RfModule->delete($id)) {
            $this->Session->setFlash(__("Entry with ID $id deleted", true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Entry was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

    function __checkEditPermission($id){
        if(!empty($this->data)){
            if (Authsome::get('username') != $this->data['RfModule']['person_completing'] && Authsome::get('user_group_id') != 1 && !in_array(Authsome::get('username'), $this->managers)) {
                $this->Session->setFlash(__('You are not authorized to edit this report!', true));
                $this->redirect(array('action' => 'view', $id));
            }
        }
    }

    function _ignoreAdditionalEngineer() {
        if (empty($this->data['RfAdditionalEngineer'][0]['engineer_signum'])) {
            unset($this->data['RfAdditionalEngineer']);
        }
    }

    function makeRows($data, $numRows, $page, $count) {
        $ret = null;
        $row = null;
        foreach ($data as $entry) {
            $entry = $entry['RfModule'];
            $cell = null;
            foreach ($entry as $key => $value) {
                $cell[] = $value;
            }
            $row[] = array('id' => $entry['id'], 'cell' => $cell);
        }
        $total = ceil($count/$numRows);
        $ret = array('page' => "$page", 'total' => $total, 'records' => $count, 'rows' => $row);
        return json_encode($ret);
    }
    
    function checkParams(){
        $params = $this->params['url'];
        $order = array('RfModule.'.$params['sidx']=>$params['sord']);
        $page = $params['page'];
        $limit = $params['rows'];
        $conditions = $this->prepareCondition($params);
        //var_dump($conditions);
        return array($order, $page, $limit, $conditions);
    }

    function prepareCondition($params){
        if($params['_search'] == 'false') return array('1'=>'1');
        switch ($params['searchOper']){
            case 'eq': return array($params['searchField'] => $params['searchString']);
            case 'ne': return array($params['searchField'].' <>' => $params['searchString']);
            case 'bw': return array($params['searchField'].' LIKE' => $params['searchString'].'%');
            case 'ew': return array($params['searchField'].' LIKE' => '%'.$params['searchString']);
            case 'bn': return array($params['searchField'].' NOT LIKE' => $params['searchString'].'%');
            case 'en': return array($params['searchField'].' NOT LIKE' => '%'.$params['searchString']);
            case 'cn': return array($params['searchField'].' LIKE' => '%'.$params['searchString'].'%');
            case 'nn': return array($params['searchField'].' NOT LIKE' => '%'.$params['searchString'].'%');
        }
    }

    function map($excelId = 0){
        $map = array( 0 =>'unknown',
                1 => 'id', 2 => 'project_name',3 => 'customer_unit',4 => 'region',5 => 'technology',6 => 'project_type',7 => 'market',
                8 => 'market_lead',9 => 'project_manager',10 => 'work_location',11 => 'person_completing',12 => 'sub_project_name',13 => 'sub_project_status',
                14 => 'additional_engineer',15 => 'checklist_accurate',16 => 'checklist_accurate_reason',17 => 'sow_available',18 => 'sow_available_reason',
                19 => 'nw_available',20 => 'nw_available_reason',21 => 'project_budget_access',22 => 'project_budget_access_reason',23 => 'engineers_qualified',
                24 => 'engineers_qualified_number',25 => 'project_start_date',26 => 'delivery_date',27 => 'num_change_recom',28 => 'num_reject_recom',
                29 => 'rejection_responsible',30=> 'rejection_responsible_reason', 31 => 'num_implemented_changes',32 => 'num_implemented_changes_reason',
                33 => 'num_sow_adjustments', 34 => 'sow_adjustments_reason_1',
                35 => 'sow_adjustments_reason_2',36 => 'sow_adjustments_reason_3',37 => 'approved_delivery_date',38 => 'delivery_date_adjustment',
                39 => 'delivery_date_adjustment_reason_1',40 => 'delivery_date_adjustment_reason_2',41 => 'delivery_date_adjustment_reason_3',
                42 => 'actual_delivery_date',43 => 'meet_proj_expectations',44 => 'project_approved', 45 => 'overall_quality_rating'
             );
        if($excelId == 0){
            return $map;
        }
        if($excelId == 1){
            $myMap = array(
                46 => "post_launch_carrier_tuned", 47 => "post_launch_complete_closeout_package", 48 => "post_launch_expedited_tuning",
                49 => "post_launch_frequency_band", 50 => "post_launch_daily_report_delivered", 51 => "post_launch_kick_off_slides_delivered",
                52 => "post_launch_tracked_delivered", 53 => "post_launch_market_folder"
            );
            $map = array_merge($map, $myMap);
            return $map;
        }
        if($excelId == 2){
            $myMap = array(
                46 => "pre_launch_number_of_drives", 47 => "pre_launch_drive1_fail_reason",
                48 => "pre_launch_drive2_fail_reason", 50 => "pre_launch_drive3_fail_reason"
            );
            $map = array_merge($map, $myMap);
            return $map;
        }


    }

    function test(){
        $data = $this->RfModule->find('all',array("conditions"=> array("id"=>3)));
        $this->autoRender = false;
        foreach($data as $entry){
            var_dump($entry['RfAdditionalEngineer']);
        }
    }

    function autoComplete(){
        Configure::write('debug', 0);
        $this->layout = 'ajax';
        App::import('model', 'RfEngineerList');
        $rfEngineerList = new RfEngineerList();
        $q = current($this->data['RfModule']);
        $conditions = array(
                        "OR" => array(
                            array('RfEngineerList.first_name LIKE'=> $q.'%'),
                            array('RfEngineerList.last_name LIKE'=> $q .'%')
                            )
            );
        $names = $rfEngineerList->find("all", array(
            'conditions'=> $conditions,
            'fields'=>array('full_name')));
        $this->set('names', $names);
    }

    function __preprocessPreLaunchData($data, $key, $value){
        $key = str_replace("pre_launch_", "", $key);
        $data['PreLaunchReport'][0][$key] = $value;
        return $data;
    }

    function __preprocessPostLaunchData($data, $key, $value){
        $key = str_replace("post_launch_", "", $key);
        $data['RfPostLaunchReport'][0][$key] = $value;
        return $data;
    }

}
?>
