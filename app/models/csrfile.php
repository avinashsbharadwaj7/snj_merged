<?php
class Csrfile extends AppModel {
	var $name = 'Csrfile';
        var $actsAs = array(
                    'FileUpload.FileUpload' => array(
                        'uploadDir' => '../../repository/csr',
                        'forceWebroot' => false, //if false, files will be upload to the exact path of uploadDir
                        'fields' => array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size', 'tag'=>'file_tag'),
                        'allowedTypes' => array('pdf' => array('application/pdf'), 'doc', 'txt', 'rtf', 'docx', 'xls', 'zip', '7z', 'rar'),
                        'required' => false, //default is false, if true a validation error would occur if a file wsan't uploaded.
                        'maxFileSize' => false, //bytes OR false to turn off maxFileSize (default false)
                        'massSave' => true,
                        'unique' => true, //filenames will overwrite existing files of the same name. (default true)
                        'fileNameFunction' => 'appendFileName' //execute the Sha1 function on a filename before saving it (default false)
                    )
                );
        
        function appendFileName($fileName) {
            
            return 'CSR_' . $this->data['Csrfile']['csrmaster_id'] .'_'. $fileName;
        }
        
        private function __getPrefix($file_tag) {
            App::import('model','FileTypePrefixe');
            $fileTypePrefixe = new FileTypePrefixe();
            return array_pop(array_pop($fileTypePrefixe->getPrefix($file_tag)));
        }
}
?>