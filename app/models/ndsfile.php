<?php
class Ndsfile extends AppModel {
	var $name = 'Ndsfile';
        var $actsAs = array(
                    'FileUpload.FileUpload' => array(
                        'uploadDir' => '/irt/app/webroot/files/nds',
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
            $prefix = $this->__getPrefix($this->data['Ndsfile']['file_tag']); 
            return 'NDS_' . $this->data['Ndsfile']['ndsmaster_id'] . '__' . $prefix . '__' . $fileName;
        }
        
        function getUploadPath() {
            return $this->actsAs['FileUpload.FileUpload']['uploadDir'];
        }
        
        function getFileName($ndsmasterID, $fileTag) {
            return $this->find('first', array('conditions'=>array('ndsmaster_id'=>$ndsmasterID, 'file_tag'=>$fileTag)));
        }
        
        private function __getPrefix($file_tag) {
            App::import('model','FileTypePrefixe');
            $fileTypePrefixe = new FileTypePrefixe();
            return array_pop(array_pop($fileTypePrefixe->getPrefix($file_tag)));
        }
}
?>