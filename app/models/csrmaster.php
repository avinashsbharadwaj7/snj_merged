<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
class Csrmaster extends AppModel {
	var $name = 'Csrmaster';
        var $hasMany = 'Csrfile';
        
        var $validate = array(
                'nic_signum' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter the Engineer Signum.',
                ),
            ),
                'network_number' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                    'rule' => array('between', 8, 8), 
                'message' => 'The Network Number should be 8 characters in length.',
                ),
            ),
                'csr_type' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',                    
                'message' => 'This field cannot be empty',
                ),
            ),
                'organization' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',                    
                'message' => 'This field cannot be empty',
                ),
            ),
                 'customer' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                'message' => 'This field cannot be empty',
                ),
            ),
                'network_type' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',                    
                'message' => 'This field cannot be empty',
                ),
            ),
                'node_type' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                'message' => 'This field cannot be empty',
                ),
            ),
                'site_name' => array(
                    'rule_1' => array(
                    'rule' => 'notEmpty',
                'message' => 'This field cannot be empty',
                ),
            )
            
   );
}
?>