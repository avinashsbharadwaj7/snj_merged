<?php

class TiTrackersController extends AppController {

    var $name = 'TiTrackers';
    var $uses = array('TiTracker', 'SparkPlug.User');
    var $helpers = array('Html', 'Session', 'Form', 'Js', 'Javascript', 'DatePicker', 'Ajax', 'IrDependentArray', 'Paginator', 'databaseFields');
    var $components = array('Session', 'Email', 'RequestHandler');
    //Used for IR Excel!
    var $paginate = array(
        'limit' => 20,
        'page' => 1,
        'order' => array(
            'TiTracker.id' => 'desc'
        )
    );


    function index() {

    }

    function add() {
        $signum = Authsome::get('username');
        $this->set("signum", $signum);
        $fname = Authsome::get('first_name');
        $lname = Authsome::get('last_name');
        $fullName = $fname . ' ' . $lname;
        $this->set("name", $fullName);
        if(empty($this->data)){
            $this->Session->write('title_count', 1);
        }
        if (!empty($this->data)) {

            $date_created = date("Y-m-d H:i:s");
            $this->data['TiTracker']['date_created'] = $date_created;
            $this->data['TiTracker']['date_modified'] = $date_created;
            $this->removeBlankTitles();
            if ($this->TiTracker->saveAll($this->data)) {

                $recent_id = $this->TiTracker->getLastInsertId();

                if ($this->params['form']['Email'] == 'Submit without Email') {
                    $this->Session->setFlash("Report has been added with no email notification!");
                    $this->redirect(array('action' => 'view', $recent_id));
                } else {
                    $this->Session->setFlash("Report has been added and email notification sent!");
                    $this->sendEmailNTP($recent_id, 'Add Report');
                    $this->redirect(array('action' => 'view', $recent_id));
                }
            }
            else{
                $this->set('data', $this->data);
                $this->Session->setFlash("Not Saved!");
            }
        }
    }

    function premodify() {
        $this->set("ids", $this->TiTracker->find("all", array('fields' => 'id')));
    }

    function modify($id = null) {
        $signum = Authsome::get('username');
        $date_modified = date("Y-m-d H:i:s");

        if (!empty($this->data)) {
            $this->removeBlankTitles();
            if ($this->TiTracker->saveAll($this->data)) {

                $recent_id = $this->data['TiTracker']['id'];

                if ($this->params['form']['Email'] == 'Update without Email') {
                    $this->Session->setFlash("Report has been updated with no email notification!");
                    $this->redirect(array('action' => 'view', $recent_id));
                } else {
                    $this->Session->setFlash("Report has been updated and email notification sent!");
                    $this->sendEmailNTP($recent_id, 'Modify Report');
                    $this->redirect(array('action' => 'view', $recent_id));
                }
            } else {
                $this->Session->setFlash("Not Updated!");
                $this->set("modify_fields_full", $this->data);
            }
        } else {
            if (!empty($this->params['url']['id'])) {
                $id = $this->params['url']['id'];
                $this->data = $this->TiTracker->read(null, $id);
                $this->Session->write('title_count', count($this->data['TiTrackerTitle']));
                if (empty($this->data)) {
                    $this->Session->setFlash(__('NPI TI Number does not exist', true));
                    $this->redirect(array('action' => 'premodify'));
                }

                if ($signum != $this->data['TiTracker']['signum']) {
                    $this->Session->setFlash(__('You do not have permissions to edit this report', true));
                    $this->redirect(array('action' => 'premodify'));
                }
            }
            $this->set("modify_fields_full", $this->data);
        }
    }

    function view($id = null) {
        if ($id == null)
            $id = $this->data['TiTracker']['id'];
        $view_fields = $this->TiTracker->read(null, $id);
        $this->set("view_fields", $view_fields);
    }

    function sendEmailNTP($id = null, $action = null) {
        $this->render = false;
        $dl = 'management;npi_ti';
        $this->set("view_fields", $this->data);
        $this->set("id", $id);

        $emails = explode("\r\n", $this->data['TiTracker']['email']);
        $emails = implode("", $emails);

        $this->sendEmail($dl, $emails, 'NPI_TI_', 'ti', $action);
    }

    function presearch() {

    }

    function conds() {
        if (!empty($this->data)) {
            $this->data = $this->data['TiTracker'];

            //if($this->data['signum_search'] == '')
            $this->data['signum_search'] = '%' . $this->data['signum_search'] . '%';
            //if($this->data['title_search'] == '')
            //if($this->data['project_search'] == '')
            $this->data['project_search'] = '%' . $this->data['project_search'] . '%';
            if ($this->data['search'] != "%") {
                if ($this->data['search'] == "Y") {
                    $yr = $this->data['year'];
                    $tempCond = array("substr(created,1,4)" => $yr);
                } else if ($this->data['search'] == "D") {
                    $tempCond = array("STR_TO_DATE(created, '%Y-%m-%d') BETWEEN ? AND ?" => array($this->data['From'], $this->data['To']));
                }
            } else {
                 $tempCond = array();
            }
            $cond = array(
                "signum LIKE " => $this->data['signum_search'],
                "project LIKE " => $this->data['project_search'],
                $tempCond,
                );//debug($cond);exit();
            $this->Session->write('cond', $cond);
        }
    }

    function showsearch() {
        $this->conds();
        $cond = $this->Session->read("cond");
        $data = $this->paginate('TiTracker', $cond);
        if (empty($data)) {
            $this->Session->setFlash("Data Set is Empty!!!");
            $this->redirect(array('action' => 'presearch'));
        }
        $this->set('TiTrackers', $data);
    }

    function excel() {
        ini_set('memory_limit', '-1');
        $this->layout = 'ajax';
        $cond = $this->Session->read("cond");
        $this->set("row", $this->TiTracker->find("all", array('conditions' => $cond)));
    }

    function listall() {
        $this->Session->write('cond', null);
        $this->redirect(array('action' => 'showsearch'));
    }

    function addTitle(){
        $count = $this->Session->read('title_count');
        $this->set('title_count', $count++);
        $this->Session->write('title_count', $count);
    }

    function removeBlankTitles(){
        $i=0;
        foreach($this->data['TiTrackerTitle'] as $title){
            if($i==0){
                continue;
            }
            if($title['title'] == "" && $title['description'] == ""){
                unset($this->data['TiTrackerTitle'][$i]);
            }
            $i++;
        }
    }

}

?>