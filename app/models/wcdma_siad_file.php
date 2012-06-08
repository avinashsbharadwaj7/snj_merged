<?php
class WcdmaSiadFile extends AppModel {
	var $name = 'WcdmaSiadFile';
        var $belongsTo = 'WcdmaSiadRecord';
        var $actsAs = array(
                        'FileUpload.FileUpload' => array(
                        //'uploadDir' => '../../repository/wcdma_siad',
                        'uploadDir' => '/irt/app/webroot/files/wcdma_siad',    
                        'forceWebroot' => false, //if false, files will be upload to the exact path of uploadDir
                        'fields' => array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size', 'tag'=>'file_tag'),
                        'allowedTypes' => array('xls'),
                        'required' => true, //default is false, if true a validation error would occur if a file wsan't uploaded.
                        'maxFileSize' => false, //bytes OR false to turn off maxFileSize (default false)
                        'massSave' => true,
                        'unique' => true, //filenames will overwrite existing files of the same name. (default true)
                        'fileNameFunction' => 'appendFileName' //execute the Sha1 function on a filename before saving it (default false)
                    )
                );
        
        function appendFileName($fileName) {
            //return $fileName;
            return 'WCDMA_SIAD_' . $this->data['WcdmaSiadFile']['wcdma_siad_record_id'] .'_'. $fileName;
        }
        
        private function __getPrefix($file_tag) {
            App::import('model','FileTypePrefixe');
            $fileTypePrefixe = new FileTypePrefixe();
            return array_pop(array_pop($fileTypePrefixe->getPrefix($file_tag)));
        }
        
        function getUploadPath() {
            return $this->actsAs['FileUpload.FileUpload']['uploadDir'];
        }
        
        function getFileName($fileID, $fileTag) {
            return $this->find('first', array('conditions'=>array('wcdma_siad_record_id'=>$fileID, 'file_tag'=>$fileTag)));
        }

}