<?php

class TmobileSlmastersController extends AppController {

var $name = 'TmobileSlmasters';
var $uses = array('TmobileSlfile', 'Dropdown', 'SparkPlug.User', 'TmobileSlmaster', 'Slmaster','TcmTmobileUser');
var $helpers = array('Html', 'Session', 'Form', 'Js', 'DatePicker', 'Paginator', 'databaseFields', 'javascript', 'TmobileSpecific');
var $components = array('Session', 'Email', 'RequestHandler');
var $paginate = array(
    'TmobileSlmaster' => array(
        'limit' => 20,
        'page' => 1,
        'order' => array(
            'TmobileSlmaster.id' => 'asc')
    ),
);

function index() {

}

function add() {
    $tcm_users= $this->TcmTmobileUser->getAllTcmEngineers();

  $this->set("tcm_fields", $tcm_users);
  //  $this->set("tcm_fields", $this->User->getTCMenggs());
    $date_created = date("Y-m-d");
    $Week = date("w");
    $time = date('H-m-s');
    $now = $date_created . '-' . $time;

    if (!empty($this->data)) {
        $this->data['TmobileSlmaster']['date_created'] = $date_created;
        $this->data['TmobileSlmaster']['date_modified'] = $date_created;
        $this->data['TmobileSlmaster']['week'] = $Week;

        /*             * ****TCM ******* */
        $pos = strpos($this->data['TmobileSlmaster']['tcm_name_signum'], '(');
        $tcmsig = substr($this->data['TmobileSlmaster']['tcm_name_signum'], $pos);
        $tcmsig = substr($tcmsig, 1, strlen($tcmsig) - 2);
        $this->data['TmobileSlmaster']['tcm_signum'] = $tcmsig;
        $sig_model = Authsome::get('username');
        $datetime = date('m/d/y H:i');
        $extra_comments = $sig_model . " - " . $datetime . "\n";
        if ($this->data['TmobileSlmaster']['additional_notes'] != "") {
            $this->data['TmobileSlmaster']['additional_notes'] = $extra_comments . "\n" . $this->data['TmobileSlmaster']['additional_notes'];
        } else {
            $this->data['TmobileSlmaster']['additional_notes'] = $extra_comments;
        }
       
        if ($this->TmobileSlmaster->saveAll($this->data)) {
           
            $recent_id = $this->TmobileSlmaster->getLastInsertId();
            //'uploadDir' => '/irt/app/webroot/files/SLR/tmobile_logs',
            $this->fileUpload($recent_id);
            
            if ($this->params['form']['Email'] == 'Submit without Email') {
                $this->Session->setFlash("Report has been added with no email notification!");
               
                $this->redirect(array('action' => 'view', $recent_id));
            } else {
                $this->Session->setFlash("Report has been added and email notification sent!");
                
                $this->sendEmailSL($recent_id,'Add Report');
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

function sendEmailSL($id = null, $action = null) {
//        if ($this->data['Slmaster']['notes'] != "") {
//            $sig_model = Authsome::get('username');
//            $datetime = date('m/d/y');
//            $this->data['Slmaster']['notes'] = $sig_model . " - " . $datetime . "\n" . $this->data['Slmaster']['notes'] . "\n";
//            if ($this->data['Slmaster']['additional_notes'] != '')
//                $this->data['Slmaster']['additional_notes'] = $this->data['Slmaster']['additional_notes'] . "\n" . $this->data['Slmaster']['notes'];
//            else
//                $this->data['Slmaster']['additional_notes'] = $this->data['Slmaster']['notes'] . "\n";
//        }
    $this->render = false;
    $dl = 'management;SL_Tmobile_All;';
    $this->data = $this->TmobileSlmaster->read(null, $id);
    $this->set("view_fields", $this->data);
    
    $this->set("id", $id);

    if ($this->data['TmobileSlmaster']['region'] == "North Central")
        $dl = $dl . 'SL_Tmobile_NC;';
    elseif ($this->data['TmobileSlmaster']['region'] == "South Central")
        $dl = $dl . 'SL_Tmobile_SC;';
    elseif ($this->data['TmobileSlmaster']['region'] == "North East")
        $dl = $dl . 'SL_Tmobile_NE;';
    elseif ($this->data['TmobileSlmaster']['region'] == "South East")
        $dl = $dl . 'SL_Tmobile_SE;';
    elseif ($this->data['TmobileSlmaster']['region'] == "North West")
        $dl = $dl . 'SL_Tmobile_NW;';
    elseif ($this->data['TmobileSlmaster']['region'] == "South West")
        $dl = $dl . 'SL_Tmobile_SW;';

    if ($this->data['TmobileSlmaster']['work_location'] == "RNAM RDC Mexico")
        $dl = $dl . 'SL_Tmobile_WorkLocMexico;';
    elseif ($this->data['TmobileSlmaster']['work_location'] == "RNAM RDC India")
        $dl = $dl . 'SL_Tmobile_WorkLocIndia;';

    $emails = explode("\r\n", $this->data['TmobileSlmaster']['email']);
    $emails = implode("", $emails);

    $tcmEmail = $this->User->getTCMEmail($this->data['TmobileSlmaster']['tcm_signum']);
    $tcmEmail = $tcmEmail[0]['User']['email'];
    $emails = $emails . ";" . $tcmEmail;
        
    $this->sendEmail($dl, $emails, 'T-mobileScriptLoad', 'sl_tmobile', $action, 'TmobileSlmaster');
}

function view($id) {
        if ($id == null)
        $id = $this->data['TmobileSlmaster']['id'];
     $this->set('fileNames', $this->TmobileSlmaster->read(null, $id));

    $view_fields = $this->TmobileSlmaster->findAllById($id);

    $this->set("view_fields", $view_fields);
}

function download($id) {
        $this->view = 'Media';
        $this->data = $this->TmobileSlmaster->read(null, $id);
        $file = new File($this->data['TmobileSlfile']['file_name']);
       $ext = $file->ext();
        $params = array(
                    'id' => $this->data['TmobileSlfile']['id'],
                    'name' => $this->data['TmobileSlfile']['file_name'],
                    'download' => true,
                    'extension' => $ext,
                    'mimeType' => $this->data['TmobileSlfile']['file_type'], // extends internal list of mimeTypes
                    'path' => $this->data['TmobileSlfile']['file_path'],
                    'fileSize' => $this->data['TmobileSlfile']['file_size']
                );

           if(file_exists($params['path'])){
                    $this->__sendHeaders($params);
                    readfile($params['path']);
                    exit();
                }
    }

 function __sendHeaders($params){
            header("Content-Type: {$params['mimeType']}");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Content-Type: application/force-download");
            header("Content-Type: application/octet-stream");
            header("Content-Type: application/download");
            header("Content-Disposition: attachment;filename={$params['name']}");
            header("Content-Transfer-Encoding: binary ");
            header('Content-Length: ' . $params['fileSize']);
        }
function premodify() {

}

function modify($id=null) {
    
    $check = 'modify';
    $signum = Authsome::get('username');
    $tcm_users= $this->TcmTmobileUser->getAllTcmEngineers();
    $this->set("tcm_fields", $tcm_users);
    //$this->set("tcm_fields", $this->User->getTCMenggs());

    if (!(empty($this->data))) {
        $previous = $this->TmobileSlmaster->read(null, $id);
        $Week = date("w");
        $date_modified = date("Y-m-d");
        $this->data['TmobileSlmaster']['id'] = substr($this->data['TmobileSlmaster']['id'], 4);
        $this->data['TmobileSlmaster']['date_modified'] = $date_modified;
        if(!empty($this->data['TmobileSlfile']))
        {
        if(!empty($previous['TmobileSlfile']))
        {
            $this->deleteFileUpload($previous);
        }
        }
        if ($this->TmobileSlmaster->saveAll($this->data)) {
            $recent_id = $this->data['TmobileSlmaster']['id'];

            $this->fileUpload($recent_id);
            if ($this->params['form']['Email'] == 'Update without Email') {
                $this->Session->setFlash("Report has been updated with no email notification!");                
               $this->redirect(array('action' => 'view', $recent_id));
            } else {
                $this->Session->setFlash("Report has been updated and email notification sent!");
               
                $this->sendEmailSL($recent_id, 'Modify Report');
                $this->redirect(array('action' => 'view', $recent_id));
            }
            $this->set('modify_fields_full', $this->data);
            $tcm_lead = $this->Session->read("tcm_leads");
            $this->set("tcm_lead", $tcm_lead);
        } else {
            $this->Session->setFlash(__('Data could not be saved. Please, try again.', true));

            $this->set('modify_fields_full', $this->data);
            $tcm_lead = $this->Session->read("tcm_lead");
            $this->set("tcm_lead", $tcm_lead);
        }
    } else {
        if (!empty($this->params['url']['id'])) {
            $id = $this->params['url']['id'];
            $this->data = $this->TmobileSlmaster->read(null, $id);
            
            if (empty($this->data)) {
                $this->Session->setFlash(__('SLR Number does not exist', true));
                $this->redirect(array('action' => 'premodify'));
            }

            $reg_temp = $this->data['TmobileSlmaster']['region'];
            $reg_temp = substr($reg_temp, 6);
            $tcm_leads = $this->TcmTmobileUser->getTcmLeadsByRegion($reg_temp);
            
            //$tcm_leads = $this->User->getTCMLead($reg_temp);

            foreach ($tcm_leads as $x):
                $tcm_lead[$x['User']['username']] = $x['User']['username'];
            endforeach;
            //var_dump($tcm_lead);
            $this->Session->write("tcm_leads", $tcm_leads);
            $this->set("tcm_lead", $tcm_lead);
           
            if ($signum != $this->data['TmobileSlmaster']['nic_signum'] && $signum != $this->data['TmobileSlmaster']['tcm_signum'] && !in_array($signum, $tcm_lead)) {
                $this->Session->setFlash(__('You do not have permissions to edit this report', true));
                $this->redirect(array('action' => 'premodify'));
            }
        }       
        
        $this->set("modify_fields_full", $this->data);
    }
}

function deleteFileUpload($previous)
{
 
     $filename =$previous['TmobileSlfile']['file_path'];
      if(file_exists($filename)){
                unlink($filename);
       }
       $id=$previous['TmobileSlfile']['id'];
       $this->TmobileSlfile->delete($id);
}

function search() {
        ini_set('memory_limit', '-1');
        if (!empty($this->data)) {
            $this->data = $this->data['TmobileSlmaster'];
           
            $search_field = $this->data['search'];
            $this->set('search_criteria_cond', $search_field);

            if ($this->data['search'] == 'date_activity_performed' || $this->data['search'] == 'date_created') {
                $condition = array("$search_field LIKE " => $this->data['data']['TmobileSlmaster'][$search_field]);
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

        $data = $this->paginate('TmobileSlmaster', $cond);
        $this->set('search_results', $data);
}
function listall() {
        $this->Session->write('cond', null);
        $this->Session->write('search_criteria_cond', null);
        $this->redirect(array('action' => 'search'));
    }
function sl() {
    $cond = $this->Session->read("cond");
    $data = $this->paginate('TmobileSlmaster', $cond);
    $this->set('tslmasters', $data);
}

function slexcel() {
    ini_set('memory_limit', '-1');
    $this->layout = 'ajax';
    $cond = $this->Session->read("cond");
    $this->set("row", $this->TmobileSlmaster->find("all", array('conditions' => $cond)));
   
}

function fileUpload($recentid) {
    $check = false;
    if (array_key_exists('TmobileSlfile', $this->data) && array_key_exists('file', $this->data['TmobileSlfile'])) {

        $check = array_key_exists('name', $this->data['TmobileSlfile']['file']);
    }
    if ($check) {
        if ($this->data['TmobileSlfile']['file']['name']) {
            foreach ($this->data['TmobileSlfile'] as $files):
                $this->uploadFiletoDir($files,$recentid);
            endforeach;
        }
    }
    // End File Upload

    return true;
}

function uploadFiletoDir($data,$recentid) {


    $file = new File($data['name']);
    $ext = $file->ext();
    $extensions = array(
        'xls', 'xlsx', 'db', 'mbd',
        'txt', 'pdf', 'doc', 'docx',
        'log', 'rtf', 'wpd', 'wps',
        'csv', 'dat', 'pps', 'ppt',
        'pptx', 'sdf', 'xml', 'bmp',
        'gif', 'jpg', 'png', 'psd',
        'thm', 'tif', 'svg', 'sql',
        'html', 'htm', 'js', 'php',
        'bin', 'mim', '7z', 'deb',
        'gz', 'pkg', 'rar', 'sit',
        'sitx', 'tar.gz', 'zip',
        'zipx');
    $msg = "";

   
    if (!in_array($ext, $extensions)) {
        $msg = 'The tool does not support this File Type.';
        return $msg;
    } elseif (strpos($data['name'], '&')) {
        $msg = 'File name is invalid.';
        return $msg;
    } else {
        
        $date_created = date("Y-m-d-H-i-s");
        $file_name = $data['name'];
        //'uploadDir' => '/irt/app/webroot/files/SLR/tmobile_logs',
        $folder = APP ."webroot". DS . "files" .DS."SLR". DS. "tmobile_logs".DS.$recentid;
         if(!is_dir($folder)) mkdir($folder);
        $path = $folder .DS.$data['name'];
        
        if (move_uploaded_file($data["tmp_name"], $path))
            $this->__addEntry($path);
        
        return $date_created;
    }
}

function __addEntry($path) {
    $data["TmobileSlfile"] = array(
    //"tmobile_slmaster_id" => $recentid,
    "file_name" => $this->data['TmobileSlfile']['file']['name'],
    "file_type" => $this->data['TmobileSlfile']['file']['type'],
    "file_size" => $this->data['TmobileSlfile']['file']['size'],
    "file_created" => date('Y-m-d G:i:s'),
    "file_path" => $path);
    if ($this->TmobileSlfile->save($data)) {
        return true;
    }
    else
        return false;
}

}

?>