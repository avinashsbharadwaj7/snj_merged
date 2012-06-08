<?php
class Irndsfile extends AppModel {
	var $name = 'Irndsfile';
        var $actsAs = array(
                    'FileUpload.FileUpload' => array(
                        'uploadDir' => '../../repository/irnds',
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
            return 'IR_' . $this->data['Irndsfile']['uploadexcelrecord_id'] .'_'. $fileName;
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
            return $this->find('first', array('conditions'=>array('uploadexcelrecord_id'=>$fileID, 'file_tag'=>$fileTag)));
        }
        
}
?>