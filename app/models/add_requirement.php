<?php
class AddRequirement extends AppModel {
   var $name = 'AddRequirement'; 
   
   var $validate = array(
        'designation' => array(
            'rule' => 'notEmpty',
            'message' => 'This field cannot be empty'
        )
       );
}
?>   
   