<?php
class IrFile extends AppModel {
	var $name = 'IrFile';
        var $actsAs = array(
                    'FileUpload.FileUpload' => array(
                        
                        //'uploadDir' => '../../repository/ir',
                        'uploadDir' => '/home/logs/IR/logs/ir',
                        'forceWebroot' => false, //if false, files will be upload to the exact path of uploadDir
                        'fields' => array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size', 'tag'=>'file_tag'),
						'allowedTypes' => array(
								'xls','xlsx','db','mbd',
								'txt','pdf','doc','docx',
								'log','rtf','wpd','wps',
								'csv','dat','pps','ppt',
								'pptx','sdf','xml','bmp',
								'gif','jpg','png','psd',
								'thm','tif','svg','sql',
								'html','htm','js','php',
								'bin','mim','7z','deb',
								'gz','pkg','rar'=>array('application/octet-stream'),'sit',
								'sitx','tar.gz','zip',
								'zipx','pdf' => array('application/pdf')),
                        'required' => false, //default is false, if true a validation error would occur if a file wsan't uploaded.
                        'maxFileSize' => false, //bytes OR false to turn off maxFileSize (default false)
                        'massSave' => true,
                        'unique' => true, //filenames will overwrite existing files of the same name. (default true)
                        'fileNameFunction' => 'appendFileName' //execute the Sha1 function on a filename before saving it (default false)
                    )
                );
        
        function appendFileName($fileName) {
            
            return 'IR_' . $this->data['IrFile']['irmodule_id'] . '__' . $fileName;
        }
        
        function getUploadPath() {
            return $this->actsAs['FileUpload.FileUpload']['uploadDir'];
        }
        
        function getFileName($irmoduleID, $fileTag) {
            return $this->find('first', array('conditions'=>array('irmodule_id'=>$irmoduleID, 'file_tag'=>$fileTag)));
        }
        
        private function __getPrefix($file_tag) {
            App::import('model','FileTypePrefixe');
            $fileTypePrefixe = new FileTypePrefixe();
            return array_pop(array_pop($fileTypePrefixe->getPrefix($file_tag)));
        }
}
?>