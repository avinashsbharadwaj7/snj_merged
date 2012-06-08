<?php
class Siadfile extends AppModel {
	var $name = 'Siadfile';
        var $actsAs = array(
                    'FileUpload.FileUpload' => array(
                        'uploadDir' => '/irt/app/webroot/files/siad',
                        'forceWebroot' => false, //if false, files will be upload to the exact path of uploadDir
                        'fields' => array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size', 'tag'=>'file_tag'),
                        'allowedTypes' => array('xls', 'xml', 'xlsx', 'csv'),
                        'required' => true, //default is false, if true a validation error would occur if a file wsan't uploaded.
                        'maxFileSize' => false, //bytes OR false to turn off maxFileSize (default false)
                        'massSave' => true,
                        'unique' => true, //filenames will overwrite existing files of the same name. (default true)
                        'fileNameFunction' => 'appendFileName' //execute the Sha1 function on a filename before saving it (default false)
                    )
                );
        
        function appendFileName($fileName) {
            $prefix = $this->__getPrefix($this->data['Siadfile']['file_tag']); 
            return 'SIAD_' . $this->data['Siadfile']['siadmaster_id'] . '__' . $prefix . '__' . $fileName;
        }
        
        function getUploadPath() {
            return $this->actsAs['FileUpload.FileUpload']['uploadDir'];
        }
        
        function deleteFile($siadmasterID, $fileTag) {
            $fileName = $this->find('first', array('conditions'=>array('siadmaster_id'=>$siadmasterID, 'file_tag'=>$fileTag)));
            if(is_array($fileName) && isset($fileName['Siadfile']) && is_array($fileName['Siadfile'])) {
                //returned a hit
                $fileName = $fileName['Siadfile']['file_name'];
            }
            //delete file
            if(@unlink($this->getUploadPath() . DS . $fileName)){
                return true;
            }
            else {
                return false;
            }
        }
        
        function getFileName($siadmasterID, $fileTag) {
            return $this->find('first', array('conditions'=>array('siadmaster_id'=>$siadmasterID, 'file_tag'=>$fileTag)));
        }
        
        private function __getPrefix($file_tag) {
            App::import('model','FileTypePrefixe');
            $fileTypePrefixe = new FileTypePrefixe();
            return array_pop(array_pop($fileTypePrefixe->getPrefix($file_tag)));
        }
}
?>