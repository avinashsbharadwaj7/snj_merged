<?php

class LitfileVerizon extends AppModel {

    var $name = 'LitfileVerizon';
    var $belongsTo = array(
        'LitmasterVerizon' => array(
            'className' => 'LitmasterVerizon',
            'foreignKey' => 'litmaster_verizon_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
//    var $dbFields = array(
//        'report_id' => 'report_id',
//        'file_name' => 'file_name',
//        'file_type' => 'file_type',
//        'file_size' => 'file_size',
//        'file_path' => 'file_path'
//    );

//        var $actsAs = array(
//                    'FileUpload.FileUpload' => array(
//                        'uploadDir' => '../../repository/litfile_verizon',
//                        'forceWebroot' => false, //if false, files will be upload to the exact path of uploadDir
//                        'fields' => array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size'),
//                         'allowedTypes' => array(
//								'xls','xlsx','db','mbd',
//								'txt','pdf','doc','docx',
//								'log','rtf','wpd','wps',
//								'csv','dat','pps','ppt',
//								'pptx','sdf','xml','bmp',
//								'gif','jpg','png','psd',
//								'thm','tif','svg','sql',
//								'html','htm','js','php',
//								'bin','mim','7z','deb',
//								'gz','pkg','rar','sit',
//								'sitx','tar.gz','zip',
//								'zipx'),
//                        'required' => false, //default is false, if true a validation error would occur if a file wsan't uploaded.
//                        'maxFileSize' => false, //bytes OR false to turn off maxFileSize (default false)
//                        'massSave' => true,
//                        'unique' => true, //filenames will overwrite existing files of the same name. (default true)
//                        'fileNameFunction' => 'appendFileName' //execute the Sha1 function on a filename before saving it (default false)
//                    )
//                );

    function appendFileName($fileName) {
        return 'LIT_Verizon_' . $fileName;
    }

    function getUploadPath() {
        return $this->actsAs['FileUpload.FileUpload']['uploadDir'];
    }

    function getFileName($litmasterID) {
        return $this->find('first', array('conditions' => array('litmaster_verizon_id' => $litmasterID)));
    }

    private function __getPrefix($file_tag) {
        App::import('model', 'FileTypePrefixe');
        $fileTypePrefixe = new FileTypePrefixe();
        return array_pop(array_pop($fileTypePrefixe->getPrefix($file_tag)));
    }

}

?>