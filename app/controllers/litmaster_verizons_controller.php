<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class LitmasterVerizonsController extends AppController {

    var $name = 'LitmasterVerizons';
    var $helpers = array('Html', 'Form', 'DatabaseFields', 'ShowFields', 'DatePicker', 'MyJsHtml');
    var $components = array('Session', 'Email');
    var $uses = array("LitmasterVerizon", "SparkPlug.User", "Litmaster", "LitfileVerizon");
    var $paginate = array(
        'limit' => 15,
        'page' => 1,
        'order' => array(
            'LitmasterVerizon.id' => 'asc'
        )
    );
    var $firstUpload;

    function add() {
        if (!empty($this->data)) {
            if (isset($this->data['LitfileVerizon'])) {
                
            }
            if ($this->data['LitmasterVerizon']['number_of_sites'] == "Multiple") {
                $data = $this->data;
                $listOfSavedSites = "";
                $listOfUnsavedSites = "";
                $this->firstUpload = true;
                $sitelistArray = $this->multipleExplode($data['LitmasterVerizon']['site_list']);
                foreach ($sitelistArray as $siteName) {
                    $data['LitmasterVerizon']['enb_name'] = trim($siteName);
                    if (!$this->firstUpload) {
//                        copy('C:' . DS . 'wamp' . DS . 'repository' . DS . 'litfile_verizon' . DS . $name, $tmp_name);
                        copy('/irt/app/webroot/files/lit/files/verizon/' . $name, $tmp_name);
                    }
                    $this->LitmasterVerizon->create();
                    if ($this->LitmasterVerizon->saveAll($data)) {
                        $id = $this->LitmasterVerizon->getLastInsertId();
                        if (!empty($data['LitfileVerizon']['file']['name'])) {
                            $tmp_name = $data['LitfileVerizon']['file']['tmp_name'];
                            $name = $data['LitfileVerizon']['file']['name'];
                            $this->firstUpload = false;
                            $this->fileUpload($id);
                        }
                        $listOfSavedSites .= "Sitename: " . strtoupper($siteName) . " ==> Report Id: " . $this->LitmasterVerizon->id . "<br>";
                        if ($this->params['form']['Email'] == 'Save without Email') {
                            
                        } else {
                            $this->__sendEmailNotification($this->LitmasterVerizon->id, $data['LitmasterVerizon']['email'], 'Add Report');
                        }
                    } else {
                        $listOfUnsavedSites .= "Failed creating report for sitename: " . strtoupper($siteName) . "<br>";
                    }
                }
                $this->Session->write('listOfSavedSites', $listOfSavedSites);
                $this->Session->write('listOfUnsavedSites', $listOfUnsavedSites);
                $this->redirect(array('action' => 'multiple_view'));
            } else if ($this->data['LitmasterVerizon']['number_of_sites'] == "Single") {
                if ($this->LitmasterVerizon->saveAll($this->data)) {
                    $id = $this->LitmasterVerizon->getLastInsertId();
                    if (!empty($this->data['LitfileVerizon']['file']['name'])) {
                        $this->fileUpload($id);
                    }

                    if ($this->params['form']['Email'] == 'Save without Email') {
                        $this->Session->setFlash("Report has been saved!");
                    } else {
                        $this->Session->setFlash("Report has been saved and email notification sent!");
                        $this->__sendEmailNotification($this->LitmasterVerizon->id, $this->data['LitmasterVerizon']['email'], 'Add Report');
                    }
                    $this->redirect(array('action' => 'view', $id));
                } else {
                    $this->Session->setFlash("Report could not be saved. Please try again!");
                }
            }
        } else {
            $this->deleteUploadState('LitfileVerizon');
        }
    }

    function multipleExplode($string = '') {
        $delimiters = array(";", "\n", " ", "\t", ",");
        $mainDelim = $delimiters[count($delimiters) - 1];
        array_pop($delimiters);
        foreach ($delimiters as $delimiter) {
            $string = str_replace($delimiter, $mainDelim, $string);
        }
        $result = explode($mainDelim, $string);
        return $result;
    }

    function fileUpload($recentid) {
        $check = false;
        if (array_key_exists('LitfileVerizon', $this->data) && array_key_exists('file', $this->data['LitfileVerizon'])) {
            $check = array_key_exists('name', $this->data['LitfileVerizon']['file']);
        }
        if ($check) {
            if (!empty($this->data['LitfileVerizon']['file']['name'])) {
                foreach ($this->data['LitfileVerizon'] as $files):
                    $this->uploadFiletoDir($files, $recentid);
                endforeach;
            }
        } else {
            return false;
        }
        // End File Upload

        return true;
    }

    function uploadFiletoDir($data, $recentid) {
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
            'zipx', 'xsd', 'rar');
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
            $folder = DS . "irt" . DS . "app" . DS . "webroot" . DS . "files" . DS . "lit" . DS . "files" . DS . "verizon";
//            $folder = 'C:' . DS . 'wamp' . DS . 'repository' . DS . 'litfile_verizon';
            if (!is_dir($folder))
                mkdir($folder);
            $path = $folder . DS . $data['name'];
            if (file_exists($path) && file_exists($data['tmp_name'])) {
                if (move_uploaded_file($data['tmp_name'], $path) || !$this->firstUpload) {
                    $this->__addEntry($path, $recentid);
                }
            }
            return $date_created;
        }
    }

    function __addEntry($path, $recentid) {
        $data["LitfileVerizon"] = array(
            "file_name" => $this->data['LitfileVerizon']['file']['name'],
            "file_type" => $this->data['LitfileVerizon']['file']['type'],
            "file_size" => $this->data['LitfileVerizon']['file']['size'],
            "file_created" => date('Y-m-d G:i:s'),
            "file_path" => $path,
            "litmaster_verizon_id" => $recentid);
        if ($this->LitfileVerizon->save($data)) {
            return true;
        }
        else
            return false;
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

    function download($id) {
        $this->data = $this->LitmasterVerizon->read(null, $id);
        $file = new File($this->data['LitfileVerizon']['file_name']);
        $ext = $file->ext();
        $params = array(
            'id' => $this->data['LitfileVerizon']['id'],
            'name' => $this->data['LitfileVerizon']['file_name'],
            'download' => true,
            'extension' => $ext,
            'mimeType' => $this->data['LitfileVerizon']['file_type'], // extends internal list of mimeTypes
            'path' => $this->data['LitfileVerizon']['file_path'],
            'fileSize' => $this->data['LitfileVerizon']['file_size']
        );

        if (file_exists($params['path'])) {
            $this->__sendHeaders($params);
            readfile($params['path']);
            exit();
        }
    }

    function edit($id = null) {
        if (isset($id)) {
            /* Edit is called from Search or View */
            if (empty($this->data)) {
                $this->data = $this->LitmasterVerizon->read(null, $id);
                if (isset($this->data['LitfileVerizon']['id'])) {
                    $this->Session->write('old_file_record_id', $this->data['LitfileVerizon']['id']);
                }
                /* Assign $dataValues the data in $this->data so that $dataValues can be used in the view */
                $dataValues = $this->data;
                if (empty($this->data)) {
                    $this->Session->setFlash(__('Invalid LIT Id.' . $id, true));
                    $this->redirect(array('controller' => 'Litmasters', 'action' => 'edit'));
                } else if (Authsome::get('username') != $this->data['LitmasterVerizon']['engineer_signum']) {
                    $this->Session->setFlash(__('You are not authorized to edit this report (LIT Id:' . $this->data['LitmasterVerizon']['id']));
                    $this->redirect(array('controller' => 'Litmasters', 'action' => 'edit'));
                }
            } else {
                /* Changes have been made to report. Save editted report */
                if ($this->LitmasterVerizon->save($this->data)) {
                    if (!empty($this->data['LitfileVerizon']['file']['name'])) {
                        $old_file_record_id = $this->Session->read('old_file_record_id');
                        $id = $this->data['LitmasterVerizon']['id'];
                        if ($this->fileUpload($id)) {
                            $this->LitfileVerizon->delete($old_file_record_id);
                        }
                    }
                    if ($this->params['form']['Email'] == 'Save without Email') {
                        $this->Session->setFlash("Report has been saved!");
                    } else {
                        $this->Session->setFlash("Report has been saved and email notification sent!");
                        $this->__sendEmailNotification($this->LitmasterVerizon->id, $this->data['LitmasterVerizon']['email'], 'Modify Report');
                    }
                    $this->redirect(array('action' => 'view', $this->data['LitmasterVerizon']['id']));
                }
            }
        } else {
            $this->redirect(array('controller' => 'Litmasters', 'action' => 'edit'));
        }
    }

    function search() {
        if ($this->data['']) {
            
        }
        if (!empty($this->data)) {
            
        }
    }

    function litexcel($id = null, $use_id=false) {
        ini_set('memory_limit', '-1');
        $this->layout = 'ajax';
        if (!$use_id) {
            /* from search */
            $cond = $this->Session->read('session_conditions');
            $this->set("row", $this->LitmasterVerizon->find("all", array('conditions' => $cond)));
        } else {
            /* from view */
            $this->set("row", $this->LitmasterVerizon->find("all", array('conditions' => array('LitmasterVerizon.id' => $id))));
        }
    }

    function view($id=null) {
        if (empty($id)) {
            $this->redirect(array('controller' => 'Litmasters', 'action' => 'index'));
        } else {
            $this->data = $this->LitmasterVerizon->read(null, $id);
            $this->set('dataValues', $this->data);
        }
    }

    private function __sendEmailNotification($id, $emails, $action = '') {
        $dl = 'management';
        //$dl = '';
        $this->set('dataValues', $this->LitmasterVerizon->read(null, $id));
        $this->sendEmail($dl, $emails, 'LTE-LIT-Verizon', 'lte_verizon', $action);
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

    function multiple_view() {
//        $this->set('listOfSavedSites', $listOfSavedSites);
//        $this->set('listOfUnsavedSites', $listOfUnsavedSites);
//        $this->Session->setFlash(__($listOfSavedSites .'<br>'. $listOfUnsavedSites, true));
    }

    function test() {
        $this->data['LitfileVerizon']['litmaster_verizon_id'] = 22;
        $this->data['LitfileVerizon']['file_name'] = "AliSucks.png";
        $this->data['LitfileVerizon']['file_type'] = "image/png";
        $this->data['LitfileVerizon']['file_size'] = 420;
        $this->data['LitfileVerizon']['file_tags'] = 1;
        debug($this->data);
        App::import('model', 'LitfileVerizon');
        $litFileVerizon = new LitfileVerizon();
        if ($litFileVerizon->save($this->data)) {
            echo "Passed";
        } else {
            echo "Failed";
        }
        debug($litFileVerizon->save($this->data));
        debug($litFileVerizon->validationErrors);
        exit;
        $this->autoRender = false;
        $data = $this->Session->read('mydatata');
        var_dump($data);
        $this->LitmasterVerizon->create();
        debug($this->LitmasterVerizon->save($data));
    }

}

?>
