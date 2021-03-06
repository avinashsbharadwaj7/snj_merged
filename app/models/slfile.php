<?php

class Slfile extends AppModel {
    var $name = 'Slfile';
	
	var $belongsTo = array(
		'Slmaster' => array(
			'className' => 'Slmaster',
			'foreignKey' => 'slmaster_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	var $actsAs = array(
                    'FileUpload.FileUpload' => array(
                        'uploadDir' => '/home/logs/SLR/logs',
                        'forceWebroot' => false, //if false, files will be upload to the exact path of uploadDir
                        'fields' => array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size', 'error' => 'file_error', 'tag'=>'file_tag'),
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
								'gz','pkg','rar','sit',
								'sitx','tar.gz','zip',
								'zipx'),
                        'required' => false, //default is false, if true a validation error would occur if a file wsan't uploaded.
                        'maxFileSize' => false, //bytes OR false to turn off maxFileSize (default false)
                        'massSave' => true,
                        'unique' => true, //filenames will overwrite existing files of the same name. (default true)
                        'fileNameFunction' => 'appendFileName' //execute the Sha1 function on a filename before saving it (default false)
                    )
                );
	 function appendFileName($fileName) {
			$date = date("Y-m-d-H-i-s");
            return 'SL_' . $date . '__' . $fileName;
        }
        
        function getUploadPath() {
            return $this->actsAs['FileUpload.FileUpload']['uploadDir'];
        }
        
        function getFileName($slmaster_id) {
            return $this->find('first', array('conditions'=>array('slmaster_id'=>$slmaster_id)));
        }
	
	
}	