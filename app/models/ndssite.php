<?php
class Ndssite extends AppModel {
	var $name = 'Ndssite';
        var $belongsTo = 'Ndsmaster';
        
        public function beforeValidate() {
            // remove tabs from input fields
            $field_list = array(
                'comments_precheck',
                'comments_postcheck'
            );
            for($i = 0; $i < count($field_list); $i++) {
                if(isset($this->data['Ndssite'][$field_list[$i]])) {
                    $this->data['Ndssite'][$field_list[$i]] = str_replace("\t", ' ', $this->data['Ndssite'][$field_list[$i]]);
                }
            }
            return true;
        }
}
?>