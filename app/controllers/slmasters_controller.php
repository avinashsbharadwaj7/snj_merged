<?php

class SlmastersController extends AppController {

    var $name = 'Slmasters';
    var $uses = array('Slmaster', 'Slfile', 'Dropdown', 'SparkPlug.User', 'TmobileSlmaster');
    var $helpers = array('Html', 'Session', 'Form', 'Js', 'DatePicker', 'Paginator', 'databaseFields', 'javascript', 'TmobileSpecific');
    var $components = array('Session', 'Email', 'RequestHandler');
    var $paginate = array(
        'Slmaster' => array(
            'limit' => 20,
            'page' => 1,
            'order' => array(
                'Slmaster.id' => 'desc')
        ),
    );

    function index() {
        
    }

    //**************************************Add************************************************

    function preedit() {
        
    }

    function add() {
        $this->set("dropdown_fields", $this->Dropdown->find("all", array('order' => array('weight ASC', 'value'), "conditions" => array("module_id" => "2"))));
        $this->set("tcm_fields", $this->User->getTCMenggs());

        $signum = Authsome::get('username');
        $this->set("signum", $signum);
        $fname = Authsome::get('first_name');
        $lname = Authsome::get('last_name');
        $fullName = $fname . ' ' . $lname;
        $this->set("name", $fullName);

        $date_created = date("Y-m-d");
        $Week = date("w");
        $time = date('H-m-s');
        $now = $date_created . '-' . $time;

        if (!empty($this->data)) {
            $this->data['Slmaster']['date_created'] = $date_created;
            $this->data['Slmaster']['date_modified'] = $date_created;
            $this->data['Slmaster']['week'] = $Week;


            $pos = strpos($this->data['Slmaster']['tcm_name_signum'], '(');
            $tcmsig = substr($this->data['Slmaster']['tcm_name_signum'], $pos);
            $tcmsig = substr($tcmsig, 1, strlen($tcmsig) - 2);
            $this->data['Slmaster']['tcm_signum'] = $tcmsig;

            if (isset($this->data['Slfile'])) {
                //save all valid uploads
                $this->saveUploadState('Slfile');
            }

            if ($this->Slmaster->saveAll($this->data)) {

                $recent_id = $this->Slmaster->getLastInsertId();

                $this->Slfile->deleteAll(array('Slfile.slmaster_id' => $recent_id, 'Slfile.file_name' => ""));

                if ($this->params['form']['Email'] == 'Submit without Email') {
                    $this->Session->setFlash("Report has been added with no email notification!");
                    $this->deleteUploadState('Slfile');
                    $this->redirect(array('action' => 'view', $recent_id));
                } else {
                    $this->Session->setFlash("Report has been added and email notification sent!");
                    $this->deleteUploadState('Slfile');
                    $this->sendEmailSL($recent_id, 'Add Report');
                    $this->redirect(array('action' => 'view', $recent_id));
                }
            } else {
                $this->Session->setFlash("Not Saved!");
            }
            $this->Session->write("file_number", 1);
        } else {
            $this->Session->write("file_number", 1);
        }
    }

    function premodify() {
        //$this->set("ids", $this->Slmaster->find("all",array('fields' => 'id')));            
    }

    function modify($id = null) {
        $this->set("dropdown_fields", $this->Dropdown->find("all", array('order' => array('weight ASC', 'value'), "conditions" => array("module_id" => "2"))));
        $this->set("tcm_fields", $this->User->getTCMenggs());
        $signum = Authsome::get('username');
        $this->set("sig", $signum);


        $date_modified = date("Y-m-d");

        if (!empty($this->data)) {


            $Week = date("w");
            $time = date('H-m-s');
            $this->data['Slmaster']['id'] = substr($this->data['Slmaster']['id'], 4);
            $this->data['Slmaster']['date_modified'] = $date_modified;
            if (isset($this->data['Slfile'])) {
                //save all valid uploads
                $this->saveUploadState('Slfile');
            }

            if ($this->Slmaster->saveAll($this->data)) {

                $recent_id = $this->data['Slmaster']['id'];
                //$this->Slfile->deleteAll(array('Slfile.slmaster_id' => $recent_id, 'Slfile.file_name' => ""));


                if ($this->params['form']['Email'] == 'Update without Email') {
                    $this->Session->setFlash("Report has been updated with no email notification!");
                    $this->deleteUploadState('Slfile');
                    $this->redirect(array('action' => 'view', $recent_id));
                } else {
                    $this->Session->setFlash("Report has been updated and email notification sent!");
                    $this->deleteUploadState('Slfile');
                    $this->sendEmailSL($recent_id, 'Modify Report');
                    $this->redirect(array('action' => 'view', $recent_id));
                }
            } else {
                $this->Session->setFlash("Not Updated!");
                $this->set("modify_fields_full", $this->data);
                $tcm_lead = $this->Session->read("tcm_lead");
                $this->set("tcm_lead", $tcm_lead);
            }
        } else {
            if (!empty($this->params['url']['id'])) {
                $id = $this->params['url']['id'];
                $this->data = $this->Slmaster->read(null, $id);
                if (empty($this->data)) {
                    $this->Session->setFlash(__('SLR Number does not exist', true));
                    $this->redirect(array('action' => 'premodify'));
                }

                $reg_temp = $this->data['Slmaster']['region'];
                $reg_temp = substr($reg_temp, 6);
                $tcm_leads = $this->User->getTCMLead($reg_temp);


                foreach ($tcm_leads as $x):
                    $tcm_lead[$x['User']['username']] = $x['User']['username'];
                endforeach;
                $this->Session->write("tcm_leads", $tcm_leads);
                $this->set("tcm_lead", $tcm_lead);

                if ($signum != $this->data['Slmaster']['nic_signum'] && $signum != $this->data['Slmaster']['tcm_signum'] && !in_array($signum, $tcm_lead)) {
                    $this->Session->setFlash(__('You do not have permissions to edit this report', true));
                    $this->redirect(array('action' => 'premodify'));
                }

                /* 	$reg_temp = $this->data['Slmaster']['region'];
                  $reg_temp = substr($reg_temp, 6);
                  $tcm_leads = $this->User->getTCMLead($reg_temp);
                  foreach($tcm_leads as $x):
                  $tcm_lead[$x['User']['username']] = $x['User']['username'];
                  endforeach;
                  $this->set("tcm_lead", $tcm_lead); */
            }

            $this->Session->write("file_number", 1);
            $this->prepareUploadState('Slfile');
            $this->set("modify_fields_full", $this->data);
        }
    }

    function view($id = null) {
        if ($id == null)
            $id = $this->data['Slmaster']['id'];
        $this->set('fileNames', $this->Slmaster->read(null, $id));
        //var_dump($this->Slmaster->read(null, $id));
        $view_fields = $this->Slmaster->find("all", array("conditions" => array("id" => $id)));
        $this->set("view_fields", $view_fields);
    }

    function sendEmailSL($id = null, $action = null) {
        if ($this->data['Slmaster']['notes'] != "") {
            $sig_model = Authsome::get('username');
            $datetime = date('m/d/y');
            $this->data['Slmaster']['notes'] = $sig_model . " - " . $datetime . "\n" . $this->data['Slmaster']['notes'] . "\n";
            if ($this->data['Slmaster']['additional_notes'] != '')
                $this->data['Slmaster']['additional_notes'] = $this->data['Slmaster']['additional_notes'] . "\n" . $this->data['Slmaster']['notes'];
            else
                $this->data['Slmaster']['additional_notes'] = $this->data['Slmaster']['notes'] . "\n";
        }
        $this->render = false;
        $dl = 'management;SL_all;';
        $this->set("view_fields", $this->data);
        $this->set("id", $id);

        if ($this->data['Slmaster']['region'] == "North Central")
            $dl = $dl . 'SL_NC;';
        elseif ($this->data['Slmaster']['region'] == "South Central")
            $dl = $dl . 'SL_SC;';
        elseif ($this->data['Slmaster']['region'] == "North East")
            $dl = $dl . 'SL_NE;';
        elseif ($this->data['Slmaster']['region'] == "South East")
            $dl = $dl . 'SL_SE;';
        elseif ($this->data['Slmaster']['region'] == "North West")
            $dl = $dl . 'SL_NW;';
        elseif ($this->data['Slmaster']['region'] == "South West")
            $dl = $dl . 'SL_SW;';

        if ($this->data['Slmaster']['work_location'] == "RNAM RDC Mexico")
            $dl = $dl . 'SL__WorkLocMexico;';
        elseif ($this->data['Slmaster']['work_location'] == "RNAM RDC India")
            $dl = $dl . 'SL__WorkLocIndia;';

        $emails = explode("\r\n", $this->data['Slmaster']['email']);
        $emails = implode("", $emails);

        $tcmEmail = $this->User->getTCMEmail($this->data['Slmaster']['tcm_signum']);
        $tcmEmail = $tcmEmail[0]['User']['email'];
        $emails = $emails . ";" . $tcmEmail;

        $this->sendEmail($dl, $emails, 'ScriptLoad', 'sl', $action);
    }
    function preadd()
    {
        
    }

    function presearch() {
        ini_set('memory_limit', '-1');
        $this->Session->write('cond', null);
        $this->Session->write('search_criteria_cond', null);
        $this->set("dropdown_fields", $this->Dropdown->find("all", array('order' => array('weight ASC', 'value'), "conditions" => array("module_id" => "2"))));
        //$this->set("net_nums", $this->Slmaster->find("all",array('fields' => array('DISTINCT (Slmaster.network_number)'))));
        //$this->set("ids", $this->Slmaster->find("all",array('fields' => 'id')));
        //$this->set("signums", $this->Slmaster->find("all",array('fields' => array('DISTINCT (Slmaster.nic_signum)'), 'order' => array('nic_signum ASC'))));
        //$this->set("rncs", $this->Slmaster->find("all",array('fields' => array('DISTINCT (Slmaster.rnc)'), 'order' => array('rnc ASC'))));
        //$this->set("osss", $this->Slmaster->find("all",array('fields' => array('DISTINCT (Slmaster.oss)'), 'order' => array('oss ASC'))));
    }

    function search() {
        ini_set('memory_limit', '-1');
        if (!empty($this->data)) {
            $this->data = $this->data['Slmaster'];
            //$this->data = str_replace("%20", " ", $this->data);
            $search_field = $this->data['search'];
            $this->set('search_criteria_cond', $search_field);

            if ($this->data['search'] == 'date_activity_performed' || $this->data['search'] == 'date_created') {
                $condition = array("$search_field LIKE " => $this->data['data']['Slmaster'][$search_field]);
            } elseif ($this->data['search'] != 'issues_reports') {
                if ($this->data['search'] == 'slr_report_status') {
                    if ($this->data[$search_field] == '0')
                        $this->data[$search_field] = '';
                }
                $condition = array("$search_field LIKE " => $this->data[$search_field]);
            }
            else {
                $iss_arr;
                if ($this->data['issues'] == "Y")
                    $iss_arr = array("Successful with issues - Follow-up Required", "Ongoing", "Canceled/Rescheduled");
                else
                    $iss_arr = array("Successful");
                $condition = array("OR" => array("activity_result" => $iss_arr));
            }
            $this->Session->write('cond', $condition);
            $this->Session->write('search_criteria_cond', $this->data['search']);
        }


        $cond = $this->Session->read("cond");
        $temp_search = $this->Session->read("search_criteria_cond");
        $this->set('search_criteria_cond', $temp_search);

        $data = $this->paginate('Slmaster', $cond);
        $this->set('search_results', $data);
    }

    function prelistall(){
        
    }
    function listall() {
        $this->Session->write('cond', null);
        $this->Session->write('search_criteria_cond', null);
        $this->redirect(array('action' => 'search'));
    }

    function slform() {
        $this->loadModel('Dropdown');
        $this->set("dropdown_fields", $this->Dropdown->find("all", array('order' => array('weight ASC', 'value'), "conditions" => array("module_id" => "2"))));
    }

    function slconds() {
        if (!empty($this->data)) {

            $this->data = $this->data['Slmaster'];

            //$this->data = $this->data['Slmaster'];
            if ($this->data['network_number'] == "")
                $this->data['network_number'] = "%";
            if($this->data['nic_signum'] == "")
            $this->data['nic_signum'] = "%";
            if($this->data['tcm_signum'] == "")
	    $this->data['tcm_signum'] = "%";
            $iss_arr;

            if ($this->data['issues'] == "Y")
                $iss_arr = array("Successful with issues - Follow-up Required", "Ongoing", "Canceled/Rescheduled");
            elseif ($this->data['issues'] == "N")
                $iss_arr = array("Successful", "Successful with issues - Resolved");
            else
                $iss_arr = array("Successful with issues - Follow-up Required", "Ongoing", "Canceled/Rescheduled", "Successful", "Successful with issues - Resolved");

            if ($this->data['search'] == "Y") {
                $yr = $this->data['year'];
                $cond = array("customer LIKE "=>$this->data['customer'], "region LIKE "=>$this->data['region'], "mop_used LIKE "=>$this->data['MOP Used'],"work_location LIKE "=>$this->data['work_location'],"activity_type LIKE "=>$this->data['activity_type'],"network_number LIKE "=>$this->data['network_number'],"nic_signum LIKE "=>$this->data['nic_signum'],"tcm_signum LIKE "=>$this->data['tcm_signum'],"OR"=>array("activity_result" => $iss_arr),"slr_report_status LIKE "=>$this->data['closed'], "substr(date_activity_performed,3,2)"=>substr($yr,2,2));
          } else if ($this->data['search'] == "D") {
                $cond = array("customer LIKE "=>$this->data['customer'], "region LIKE "=>$this->data['region'], "mop_used LIKE "=>$this->data['MOP Used'],"work_location LIKE "=>$this->data['work_location'],"activity_type LIKE "=>$this->data['activity_type'],"network_number LIKE "=>$this->data['network_number'],"nic_signum LIKE "=>$this->data['nic_signum'],"tcm_signum LIKE "=>$this->data['tcm_signum'],"OR"=>array("activity_result" => $iss_arr),"slr_report_status LIKE "=>$this->data['closed'], "STR_TO_DATE(date_activity_performed, '%Y-%m-%d') BETWEEN ? AND ?"=>array($this->data['From'],$this->data['To']));

            }
            $this->Session->write('cond', $cond);
        }
    }

    function sl() {
        $this->slconds();
        $cond = $this->Session->read("cond");
        if ($this->data['customer'] == 'AT&T') {
            $data = $this->paginate('Slmaster', $cond);
            $this->set('slmasters', $data);
        } else if ($this->data['customer'] == 'T-Mobile') {
            $this->redirect(array('action' => 'sl', 'controller' => 'tmobile_slmasters'));
        }
    }

    function slexcel() {
        ini_set('memory_limit', '-1');
        $this->layout = 'ajax';
        $cond = $this->Session->read("cond");
        $this->set("row", $this->Slmaster->find("all", array('conditions' => $cond)));
    }

    function download($id = null) {
        $this->view = 'Media';
        //$id = $this->params['pass'][0];
        $name = $this->params['pass'][0];
        $fileprops = $this->Slfile->read(null, $id);
        var_dump($fileprops['Slfile']['name']);

        $file = new File($name);
        $ext = $file->ext();

        $pos = strpos($name, ".");
        $name = substr($name, 0, $pos);
        $path = "/home/logs/SLR/logs" . DS;

        $params = array(
            'id' => $id,
            'name' => $name,
            'download' => true,
            'extension' => $ext,
            'path' => $path
        );
        $this->set($params);
    }

    function updater() {
        $this->layout = 'ajax';
        if (!isset($this->params['data'])):
            $num_file = $this->_getNextFileNumber();
            $this->set("additional", "add_files_sl");
            $this->set("nextNumberFiles", $num_file);
        else:
            $this->set("additional", "no_add_files_sl");
            $this->set("num_file", (isset($this->params['pass'][0])) ? $this->params['pass'][0] : "");
        endif;
    }

    function _getNextFileNumber() {
        $num = $this->Session->read("file_number");
        $this->Session->write("file_number", $num + 1);
        return $num;
    }

}


?>
