<?php

/*
* To change this template, choose Tools | Templates
* and open the template in the editor.
*/
?>
<?php

class CofmastersController extends AppController {

var $name = 'Cofmasters';
var $uses = array('Cofmaster', 'CofFile', 'SparkPlug.User');
var $helpers = array('Html', 'Form', 'Javascript', 'Ajax', 'DatePicker', 'TmobileSpecific');
var $components = array('Session', 'Email', 'RequestHandler');
var $paginate = array(
    'limit' => 10,
    'page' => 1,
    'order' => array(
        'Cofmaster.id' => 'asc'
    )
);

var $msg="";

function index() {

}

function add() {

    $date_created = date("Y-m-d");
    if (!empty($this->data)) {
        $this->data['Cofmaster']['date_modified'] = $date_created;
        if ($this->Cofmaster->save($this->data)) {
            if (!empty($this->data['CofFile'])) {
                if($this->data['CofFile']['file']['name']!=""){
                if (!($this->fileUpload($this->Cofmaster->id))) {
                    $this->Session->setFlash($this->msg);
                    return false;
                }
                }
            }

            if ($this->params['form']['Email'] == 'Submit without Email') {
                $this->Session->setFlash("Report has been added with no email notification!");
                $this->redirect(array('action' => 'view', $this->Cofmaster->id));
            } else {
                $this->Session->setFlash("Report has been added and email notification sent!");
                $this->sendEmailSL($this->Cofmaster->id, 'Add Report');
                $this->redirect(array('action' => 'view', $this->Cofmaster->id));
            }
        } else {
            $this->Session->setFlash("Report could not be saved.Please check entered data!");
        }
    }
}

function sendEmailSL($id = null, $action = null) {

    $this->render = false;
    $dl = 'management';
    $this->data = $this->Cofmaster->read(null, $id);
    $this->set("dataValues", $this->data);

    $this->set("id", $id);

    $emails = explode("\r\n", $this->data['Cofmaster']['email']);
    $emails = implode("", $emails);


    $this->sendEmail($dl, $emails, 'COF', 'cof', $action, 'Cofmaster');
}

function preedit() {

}

function edit($id=null, $flag=false) {

    
    if (!empty($this->data['Cofmaster']['enteredId']) || $flag) {

        if (!$flag)
            $id = $this->data['Cofmaster']['enteredId'];

        $this->data = $this->Cofmaster->read(null, $id);
        
        if (empty($this->data)) {
            $this->Session->setFlash(__('Invalid COF ID: ' . $id, true));
            $this->redirect(array('action' => 'preedit'));
        } else {
            if (Authsome::get('username') != $this->data['Cofmaster']['signum']) {
                $this->Session->setFlash(__('You are not authorized to edit this COF ID: ' . $id, true));
                $this->redirect(array('action' => 'view', $this->Cofmaster->id, 'edit'));
            }
            $this->set("dataValues", $this->data);
        }
    } else if (!empty($this->data)) {
        $previous = $this->Cofmaster->read(null, $id);
        $date_modified = date("Y-m-d");
        $this->data['Cofmaster']['date_modified'] = $date_modified;
        $this->data['Cofmaster']['id'] = $id;
      
        if (!empty($this->data['CofFile'])) {
            if (!empty($previous['CofFile'])) {
                if($previous['CofFile']['file_name']!=null)
                {
                if (!($this->deleteFileUpload($previous))) {
                    $this->Session->setFlash("Error uploading new file");
                    $this->set("dataValues", $this->data);
                    return false;
                }
                }
            }
        }

        if ($this->Cofmaster->save($this->data)) {
            if (!empty($this->data['CofFile'])) {
                 if($this->data['CofFile']['file']['name']!=""){
                if (!($this->fileUpload($this->Cofmaster->id))) {
                    $this->Session->setFlash($this->msg);
                    return false;
                }
                 }
            }
            if ($this->params['form']['Email'] == 'Submit without Email') {
                $this->Session->setFlash("Report has been added with no email notification!");
                $this->redirect(array('action' => 'view', $this->Cofmaster->id));
            } else {
                $this->Session->setFlash("Report has been added and email notification sent!");
                $this->sendEmailSL($this->Cofmaster->id, "Modify Report"."-".$this->data['Cofmaster']['id']);
                $this->redirect(array('action' => 'view', $this->Cofmaster->id));
            }

            $this->set("dataValues", $this->data);
        }
    }
}

function deleteFileUpload($previous) {

    $filename = $previous['CofFile']['file_path'];
    if (file_exists($filename)) {
        if (!unlink($filename))
            return false;
    }
    else
        return false;
    $id = $previous['CofFile']['id'];
    if (!($this->CofFile->delete($id)))
        return false;

    return true;
}

function search($use_args=null) {

    if (empty($this->data)) {
        /* either a new session, or update to pagination */
        if (empty($this->passedArgs) && empty($this->params['pass'])) {
            /* new search session */
            $this->Session->delete('searchSession');
            $this->Session->delete('paginatorArgs');
            $this->Session->delete('session_conditions');
            $conditions_entered = false;
        } else {
            /* same session, prolly updated pagination */
            $this->data = $this->Session->read('searchSession');
            if ($use_args == 'fromView') {
                /* use args passed into function */
                $this->passedArgs = $this->Session->read('paginatorArgs');
            }
        }
    }
    if (!empty($this->data)) {
        /* conditions entered */
        $this->Cofmaster->set($this->data);
        $this->Session->write('searchSession', $this->data);

        if ($use_args == 'fromSearchResults') {
            /* hitting back in the results */
            $conditions_entered = false;
        } else {
            $conditions_entered = true;
        }
        $this->set('conditions_entered', $conditions_entered);
        $conditions = $this->__getConditions($this->data['Cofmaster']);
        $this->set('csrQuery', $this->paginate('Cofmaster', $conditions));
        $this->Session->write('session_conditions', $conditions);
    }

    $this->set('conditions_entered', $conditions_entered);
    $this->Session->write('paginatorArgs', $this->passedArgs);
    $this->params['pass'] = array(); //clear all passed in args
}

private function __getConditions($data) {
    $conditions = array();
    $conditions = $this->__processDateConditions($data);
    if(!$this->__isEmpty($data['signum_search'])) {
        $conditions['Cofmaster.signum'] = $data['signum_search'];
    }
    if(!$this->__isEmpty($data['activity_type_search'])) {
        $conditions['Cofmaster.activity_type'] = $data['activity_type_search'];
    }
//    if (!$this->__isEmpty($data['date_init'])) {
//       $conditions['Cofmaster.date_init'] = $data['date_init'];
//    }

    if (!$this->__isEmpty($data['network_num'])) {
        $conditions['Cofmaster.network_num'] = $data['network_number'];
    }

    if (!$this->__isEmpty($data['cofid'])) {
        $conditions['Cofmaster.id'] = $data['cofid'];
    }

    return $conditions;
}

private function __processDateConditions($data, $modelName = "Cofmaster") {
        $condition = null;
        if(!$this->__isEmpty($data['from_date']) && !$this->__isEmpty($data['to_date'])) {
            $condition[] = array($modelName.'.date_init BETWEEN ? AND ?' => array($data['from_date'], $data['to_date']));
        }
        if(!$this->__isEmpty($data['from_date']) && $this->__isEmpty($data['to_date'])) {
            $condition[] = array($modelName.'.date_init >=' => $data['from_date']);
        }
        if($this->__isEmpty($data['from_date']) && !$this->__isEmpty($data['to_date'])) {
            $condition[] = array($modelName.'.date_init <=' => $data['to_date']);
        }
        return $condition;
    }

private function __isEmpty($value) {
    return ($value == null || empty($value) || $value == "") ? true : false;
}

function cofexcel($id = null, $use_id=false) {
        ini_set('memory_limit', '-1');
        $this->layout = false;
        if (!$use_id) {
            /* from search */
            $cond = $this->Session->read('session_conditions');
            $this->set("row", $this->Cofmaster->find("all", array('conditions' => $cond)));
        } else {
            /* from view */
            $this->set("row", $this->Cofmaster->find("all", array('conditions' => array('id' => $id))));
        }
    }

function view($id=null) {
    $this->set('dataValues', $this->Cofmaster->read(null, $id));
}

function fileUpload($recentid) {
    $check = false;
    if (array_key_exists('CofFile', $this->data) && array_key_exists('file', $this->data['CofFile'])) {

        $check = array_key_exists('name', $this->data['CofFile']['file']);
    }
    if ($check) {
        if ($this->data['CofFile']['file']['name']) {
            foreach ($this->data['CofFile'] as $files):
                if (!($this->uploadFiletoDir($files, $recentid))) {
                    return false;
                }
            endforeach;
        }
    }
    else
        return false;
    // End File Upload

    return true;
}

function uploadFiletoDir($data, $recentid) {

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

    $file = new File($data['name']);
    $ext = $file->ext();

    if (!in_array($ext, $extensions)) {
        $this->msg = 'The tool does not support this File Type.';
        return false;
    }
    if (strpos($data['name'], '&')) {
        $this->msg = 'File name is invalid.';
        return false;
    } else {
        //'uploadDir' => '/irt/app/webroot/files/SLR/tmobile_logs' = on the server
         $folder = APP ."webroot". DS . "files" .DS."cof". DS. "cof_fileuploads".DS.$recentid;//Server
        //$folder = APP . "webroot" . DS . "files" . DS . "cof_fileuploads" . DS . $recentid;//localhost
        if (!is_dir($folder))
            mkdir($folder);
        $path = $folder . DS . $data['name'];

        if (move_uploaded_file($data["tmp_name"], $path)) {
            if ($this->__addEntry($path,$recentid)) {
                return true;
            } else {
                $this->msg = "File Couldn't Be Saved!";
                return false;
            }
        } else {
            $this->msg = "File Upload Error.";
            return false;
        }
        return true;
    }
}

function __addEntry($path,$recentid) {
    $data["CofFile"] = array(
       "cofmaster_id" => $recentid,
        "file_name" => $this->data['CofFile']['file']['name'],
        "file_type" => $this->data['CofFile']['file']['type'],
        "file_size" => $this->data['CofFile']['file']['size'],
        "file_created" => date('Y-m-d G:i:s'),
        "file_path" => $path);
    if ($this->CofFile->save($data)) {
        return true;
    } else {
        $this->msg = "File data couldnot be saved.";
        return false;
    }
}

function download($id=null) {

    $this->view = 'Media';
    $this->data = $this->Cofmaster->read(null, $id);
    $file = new File($this->data['CofFile']['file_name']);
    $ext = $file->ext();
    $params = array(
        'id' => $this->data['CofFile']['id'],
        'name' => $this->data['CofFile']['file_name'],
        'download' => true,
        'extension' => $ext,
        'mimeType' => $this->data['CofFile']['file_type'], // extends internal list of mimeTypes
        'path' => $this->data['CofFile']['file_path'],
        'fileSize' => $this->data['CofFile']['file_size']
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
    header('Content-Length: ' . $params['fileSize']);
}

}

?>
