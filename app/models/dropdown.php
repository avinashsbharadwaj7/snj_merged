<?php
/*
 * @id emoibhu
 * @name Moiz Bhukhiya
 */
?>
<?php
class Dropdown extends AppModel {
	var $name = 'Dropdown';

        public function options($for, $module_id) {
            return $this->find('all', array('conditions'=>array('field'=>$for, "module_id"=>$module_id), 'order'=> 'weight'));
        }
}