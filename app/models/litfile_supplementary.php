<?php
class LitfileSupplementary extends AppModel {
	var $name = 'LitfileSupplementary';
        var $actsAs = array(
                    'FileUpload.FileUpload' => array(
                        'uploadDir' => '/irt/app/webroot/files/lit/files',
                        'forceWebroot' => false, //if false, files will be upload to the exact path of uploadDir
                        'fields' => array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size', 'tag'=>'file_tag'),
                        'allowedTypes' => array('pdf' => array('application/pdf'), 'doc', 'txt', 'rtf', 'docx', 'xls', 'xlsx', 'csv', 'xml', '7z', 'zip', 'odt'),
                        'required' => false, //default is false, if true a validation error would occur if a file wsan't uploaded.
                        'maxFileSize' => false, //bytes OR false to turn off maxFileSize (default false)
                        'massSave' => true,
                        'unique' => true, //filenames will overwrite existing files of the same name. (default true)
                        'fileNameFunction' => 'appendFileName' //execute the Sha1 function on a filename before saving it (default false)
                    )
                );
        
        function appendFileName($fileName) {
            return 'LIT_' . $this->data['LitfileSupplementary']['litmaster_id'] . '__' . $fileName;
        }
        
        function getFileName($litmasterID, $fileTag) {
            return $this->find('first', array('conditions'=>array('litmaster_id'=>$litmasterID, 'file_tag'=>$fileTag)));
        }
        
        function getUploadPath() {
            return $this->actsAs['FileUpload.FileUpload']['uploadDir'];
        }
}
?>