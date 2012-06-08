<?php
/*
 * For the dropdown_dependents database
 */
?>
<?php
class DropdownDependent extends AppModel {
	var $name = 'DropdownDependent';
        
        public function dependencies($field) {
            return $this->find('all', array('conditions'=>array('field'=>$field), 'order'=> 'id'));
        }
}