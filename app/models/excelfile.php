
<?php

class excelfile extends AppModel
{
    var $name = 'pruploads';
    var $actsAs = array(
 			'FileUpload.FileUpload' => array(
							'uploadDir' => 'C:/wamp/www/pqr',
							'forceWebroot' => false, //if false, files will be upload to the exact path of uploadDir
							'fields' => array('name'=>'name','size' => 'size','date' => 'date','created'=>'created','type'=>'type'),
							'allowedTypes' => array('pdf' => array('application/pdf'),'xls' =>array('application/vnd.ms-excel')),
							'required' => false, //default is false, if true a validation error would occur if a file wsan't uploaded.
							'maxFileSize' => false, //bytes OR false to turn off maxFileSize (default false)
							'unique' => true,//filenames will overwrite existing files of the same name. (default true)
                                                        'massSave' => true,
							'fileNameFunction' => false //execute the Sha1 function on a filename before saving it (default false)
						)
					);
    
    
            function getFileName($id) {
            return $this->find('first', array('conditions'=>array('id'=>$id)));
        }
        
        
        function getUploadPath() {
            return $this->actsAs['FileUpload.FileUpload']['uploadDir'];
        }
}

?>
