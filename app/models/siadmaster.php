<?php
class Siadmaster extends AppModel {
	var $name = 'Siadmaster';
        
        var $hasMany = array('Siadfile', 'Siadsite');
        
        var $validate = array(
            'engineer_signum' => array(
                'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please Enter Engineer Signum.',
                ),
            ),
            'engineer_name' => array(
                'rule_1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please Enter Engineer Name.',
                ),
            ),
            'date_created' => array(
                 'rule_2' => array(
                    'rule' => array('date','ymd'),
                    'message' => "Date must be in this format: YYYY-MM-DD",
                    'allowEmpty' => true

                ),
            ),
        );
        
        public function beforeValidate() {
            // remove tabs from input fields
            $field_list = array(
                            'record_comments',
                            'email',
                          );
            for($i = 0; $i < count($field_list); $i++) {
                if(isset($this->data['Siadmaster'][$field_list[$i]])) {
                    $this->data['Siadmaster'][$field_list[$i]] = str_replace("\t", ' ', $this->data['Siadmaster'][$field_list[$i]]);
                }
            }
            return true;
        }
}
?>