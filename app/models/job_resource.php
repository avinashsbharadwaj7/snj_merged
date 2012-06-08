<?php

class JobResource extends AppModel {
    var $name = 'JobResource';
//    var $uses = array('JobResource');
    
    var $validate = array(
        'name' => array(
            'rule' => 'notEmpty',
            'message' => 'Please enter engineer signum.'
        ),
        'signum' => array(
            'rule' => 'notEmpty',
            'message' => 'Please enter engineer signum.'
        ),
        'active' => array(
            'rule' => 'notEmpty',
            'message' => 'Please enter Yes/No.'
        ),
        'resource_pool' => array(
            'rule' => 'notEmpty',
            'message' => 'Please enter pool.'
        ),
        'resource_product_area' => array(
            'rule' => 'notEmpty',
            'message' => 'Please enter product area.'
        ),
    );
}
?>
