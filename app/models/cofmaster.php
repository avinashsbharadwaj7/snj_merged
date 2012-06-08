<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php

class Cofmaster extends AppModel
{
    
    var $name = 'Cofmaster';
    var $validate = array(
    'change_initiatedby'=>array(
          'notempty' => array(
           'rule' => array('notempty'),
           'message' => 'Please select Change Initiated by.',
           'last' => true)
        ),
    'change_reason'=>array(
          'notempty' => array(
           'rule' => array('notempty'),
           'message' => 'Please select reason.',
           'last' => true)
        ),
        'time_estimate'=>array(
          'notempty' => array(
           'rule' => array('time'),
           'message' => 'Please check if the date format is HH:MM.'
           )
        ),
    'network_num' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Network Number cannot be empty.',
                'last' => true
            ),
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Numbers only.',
                'last' => true
            ),
            'minLength' => array(
                'rule' => array('between', 8, 8),
                'message' => 'Network Number has to be 8 digits.',
                'last' => true
            )
        ),    
    'operator_name'=>array(
           'notempty' => array(
           'rule' => array('notempty'),
           'message' => 'Please select the operator.',
           'last' => true)
        ),
    'activity_type'=>array(
            'notEmpty'=>array(
            'rule'=>'notEmpty',
            'message'=>'Please select an activity.'
        )
    )
    );
    
     var $hasOne= array(
        'CofFile' => array(
            'className' => 'CofFile',
            'foreignKey' => 'cofmaster_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );
    
}
?>