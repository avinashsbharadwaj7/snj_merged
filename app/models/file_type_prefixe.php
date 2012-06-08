<?php
/*
 * For the dropdown_dependents database
 */
?>
<?php
class FileTypePrefixe extends AppModel {
	var $name = 'FileTypePrefixe';
        
        public function getPrefixes($name) {
            return $this->find('all', array('conditions'=>array('file_tag'=>$name), 'order'=> 'id'));
        }
        
        public function getPrefix($name) {
            return $this->find('first', array('conditions'=>array('file_tag'=>$name)));
        }
}