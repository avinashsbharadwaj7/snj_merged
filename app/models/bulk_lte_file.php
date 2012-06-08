<?php
class BulkLteFile extends AppModel {
	var $name = 'BulkLteFile';
        var $actsAs = array(
                    'FileUpload.FileUpload' => array(
                        'uploadDir' => '/irt/app/webroot/files/lit/bulk',
                        'forceWebroot' => false, //if false, files will be upload to the exact path of uploadDir
                        'fields' => array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size', 'tag'=>'file_tag'),
                        'allowedTypes' => array('xls', 'xlsx', 'csv', 'xml'),
                        'required' => true, //default is false, if true a validation error would occur if a file wsan't uploaded.
                        'maxFileSize' => false, //bytes OR false to turn off maxFileSize (default false)
                        'massSave' => true,
                        'unique' => true, //filenames will overwrite existing files of the same name. (default true)
                        'fileNameFunction' => 'appendFileName' //execute the Sha1 function on a filename before saving it (default false)
                    )
                );
        
        function appendFileName($fileName) {
            return 'LIT_BULK_' . $this->data['BulkLteFile']['bulk_lte_record_id'] . '__' . $fileName;
        }
        
        function getUploadPath() {
            return $this->actsAs['FileUpload.FileUpload']['uploadDir'];
        }
        
        function getFileName($fileID, $fileTag) {
            return $this->find('first', array('conditions'=>array('bulk_lte_record_id'=>$fileID, 'file_tag'=>$fileTag)));
        }
}
?>