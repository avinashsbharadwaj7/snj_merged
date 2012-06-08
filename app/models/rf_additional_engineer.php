<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class RfAdditionalEngineer extends AppModel{
    var $name = 'RfAdditionalEngineer';

    var $belongsTo = array(
        'RfModule' => array(
            'className' => 'RfModule',
            'foreignKey' => 'rf_module_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    function  beforeSave($options = array()) {
        parent::beforeSave($options);
        $id = $this->field('id', array('rf_module_id'=> $this->data['RfAdditionalEngineer']['rf_module_id'], 'engineer_signum'=>$this->data['RfAdditionalEngineer']['engineer_signum']));
        $this->delete($id);
        return true;
    }
}

?>
