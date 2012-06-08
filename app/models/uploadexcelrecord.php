<?php
class Uploadexcelrecord extends AppModel {
	var $name = 'Uploadexcelrecord';
        var $hasMany = 'Irndsfile';
        
        var $validate = array(
                    'filetype' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please select the file type.',
                ),
            ));
}
?>