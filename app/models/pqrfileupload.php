<?php

class Pqrfileupload extends AppModel
{
    var $name = 'Pqrfileupload';
    var $belongsTo = array('Prelaunch_nd','Marketlaunch_ntx','Market_launch_alarm');
        
        var $validate = array(
                    'filetype' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please select the file type.',
                ),
            ));
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
