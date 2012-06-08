<?php
class LogFilesController extends AppController {

	var $name = 'LogFiles';

	function index() {
		$this->LogFile->recursive = 0;
		$this->set('logFiles', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid log file', true));
			$this->redirect(array('action' => 'index'));
		}
                $this->data = $this->LogFile->read(null, $id);
                $this->view = "Media";
                configure::write("debug", 0);
                $pathInfo = pathinfo($this->data['LogFile']['file_name']);
                $params = array(
                    'id' => $this->data['LogFile']['id'],
                    'name' => $this->data['LogFile']['file_name'],
                    'extension' => $pathInfo['extension'],
                    'mimeType' => $this->data['LogFile']['mime_type'], // extends internal list of mimeTypes
                    'path' => APP . DS . 'webroot' . DS . 'files' . DS . 'rnc' . $this->data['LogFile']['file_path'],
                    'fileSize' => $this->data['LogFile']['file_size']
                );
                if(file_exists($params['path'])){
                    $this->__sendHeaders($params);
                    readfile($params['path']);
                    exit();
                }
	}

	function add() {
            $this->autoRender = false;
            $this->layout = 'ajax';
            configure::write('debug', 0);
            if(empty ($this->data)){
                $this->redirect(array("controller"=>"reports", "action"=>"add"));
            }
            if($this->data['LogFile']['file']){
                $folder = APP ."webroot". DS . "files" .DS."rnc". DS.$this->data['LogFile']['report_id'];
                if(!is_dir($folder)) mkdir($folder);
                $folder = $folder.DS.$this->data['LogFile']['belongs_to'];
                if(!is_dir($folder)) mkdir($folder);
                $new_name = $folder .DS.$this->data['LogFile']['file']['name'];
                try{
                    $this->assertValidUpload($this->data['LogFile']['file']['error']);
                    if($this->data['LogFile']['report_id'] == "NYA"){
                        throw new Exception('Report hasn\'t been created yet. Please start the report.');
                    }
                    if(!in_array($this->data['LogFile']['file_category'], array("kget", "image", "log", "qa_log"))){
                        throw new Exception('The file does has no association defined.');
                    }
                    if(empty($this->data['LogFile']['belongs_to'])){
                        throw new Exception('The file category hasn\'t been defined. Please refresh the page.');
                    }
                    if(!$this->__validateFileType($this->data['LogFile']['file']['type'],$this->data['LogFile']['file_category'])){
                        throw new Exception('Invalid file type for the given category.');
                    }
                    if(file_exists($new_name)){
                        throw new Exception('Same file exists. Please change the file name before uploading');
                    }
                    if (!is_uploaded_file($this->data['LogFile']['file']['tmp_name'])) {
                        throw new Exception('File is not an uploaded file');
                    }
                    if(!move_uploaded_file($this->data['LogFile']['file']['tmp_name'], $new_name)){
                        throw new Exception('File Upload Failed!');
                    }
                    if(!$this->__addEntry($new_name)){
                        throw new Exception('Unable to add entry. Please upload again.');
                    }
                    App::import("Helper", "Html");
                    $html = new HtmlHelper();
                    $htmlToRender = $html->div('files_list',
                            $html->link($this->data['LogFile']['file_name'],'/log_files/view/'.$this->data['LogFile']['id']) .
                            $html->link('delete', '/log_files/delete/'.$this->data['LogFile']['id'], array("class"=>"delete_file")));
                    $htmlToRender = str_replace('"', "'", $htmlToRender);
                    $htmlToRender = str_replace("<", "\\u003C", $htmlToRender);
                    $htmlToRender = str_replace(">", "\\u003E", $htmlToRender);
                    $response = array('error'=> 0,'message' => (__('File Uploaded!' , true)), 'category'=>$this->data['LogFile']['file_category'], 'html'=>$htmlToRender);
                    return json_encode($response);
                }  catch (Exception $e){
                    $response = array('error'=>1, 'message'=> (__($e->getMessage(), true)), 'type'=>$this->data['LogFile']['file']['type']);
                    return json_encode($response);
                }
            }
        }

        function list_files(){
            $this->layout = 'ajax';
            configure::write("debug", 0);
            $conditions = array("report_id"=>$this->data['LogFile']['report_id'], "belongs_to"=>$this->data['LogFile']['belongs_to']);
            $files = $this->LogFile->find("all", array("conditions"=>$conditions));
            $this->set(compact('files'));
        }

	function delete($id = null) {
            $this->autoRender = false;
            $this->layout = 'ajax';
            configure::write('debug', 0);
            $response = null;
            if (!$id) {
                    $response = array('error'=>1, 'message'=>(__('Invalid id for log file', true)));
            }
            $this->data = $this->LogFile->read(null, $id);
            $filename = APP ."webroot". DS . "files" .DS."rnc". $this->data['LogFile']['file_path'];
            if(file_exists($filename)){
                unlink($filename);
            }
            if ($this->LogFile->delete($id)) {
                    $response = array('error'=>0, 'message'=>(__('Log file deleted', true)));
            }else{
                $response = array('error'=>1, 'message'=>(__('Log file was not deleted', true)));
            }
            return json_encode($response);
	}

        function __validateFileType($type, $category){
            if($category == "log" || $category == "qa_log"){
                if(!in_array($type, array('text/xml', 'text/plain', 'application/octet-stream', 'application/zip',"application/x-zip-compressed"))){
                    return false;
                }
            }
            if($category == "image"){
                if(!in_array($type, array('image/jpeg', 'image/png', 'application/zip', 'image/x-jpeg', 'image/x-png', 'image/pjpeg', "application/x-zip-compressed"))){
                    return false;
                }
            }
            if($category == "kget"){
                if(!in_array($type, array('application/octet-stream', 'application/zip', "application/x-zip-compressed"))){
                    return false;
                }
            }
            if(!$category || empty($category)){
                return false;
            }
            return true;
        }

        function assertValidUpload($code) {
            if ($code == UPLOAD_ERR_OK) {
                return;
            }

            switch ($code) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    $msg = 'File is too large';
                    break;

                case UPLOAD_ERR_PARTIAL:
                    $msg = 'File was only partially uploaded';
                    break;

                case UPLOAD_ERR_NO_FILE:
                    $msg = 'No File was uploaded';
                    break;

                case UPLOAD_ERR_NO_TMP_DIR:
                    $msg = 'Upload folder not found';
                    break;

                case UPLOAD_ERR_CANT_WRITE:
                    $msg = 'Unable to write uploaded file';
                    break;

                case UPLOAD_ERR_EXTENSION:
                    $msg = 'Upload failed due to extension';
                    break;

                default:
                    $msg = 'Unknown error';
            }

            throw new Exception($msg);
        }

        function __addEntry($file_name){
            $data["LogFile"] = array(
                "report_id" => $this->data['LogFile']['report_id'],
                "file_name" => $this->data['LogFile']['file']['name'],
                "mime_type" => $this->data['LogFile']['file']['type'],
                "file_size" => $this->data['LogFile']['file']['size'],
                "upload_time" => date('Y-m-d G:i:s'),
                "file_category" => $this->data['LogFile']['file_category'],
                "file_path" => DS. $this->data['LogFile']['report_id'] .DS.$this->data['LogFile']['belongs_to'] .DS. $this->data['LogFile']['file']['name'],
                "belongs_to" => $this->data['LogFile']['belongs_to']);
            if($this->LogFile->save($data)){
                $data['LogFile']['id'] = $this->LogFile->id;
                $this->data = $data;
                return true;
            }
            if(file_exists($file_name)){
                unlink($file_name);
            }
            return false;
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
}
?>
