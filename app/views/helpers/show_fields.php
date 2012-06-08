<?php 
/* Show field helper
 * Make sure to put the dependencies in the 'dropdown_dependents' table (cake DB)
 * 
 * @author Brian Ricks
 * 
 */ 

class ShowFieldsHelper extends Helper { 
    public $helpers = array('Html', 'Session','Form');
    
    public function display($field, $value) {
        App::import('model','DropdownDependent');
        $dropdownDependents = new DropdownDependent();
        $field_dependencies = $dropdownDependents->dependencies($field);
        foreach($field_dependencies as $current_dependency) {
            /* match each dependency to the passed value */
            if($current_dependency['DropdownDependent']['value'] == $value) {
                return $current_dependency['DropdownDependent']['tag'];
            }
        }
        return 0;
    }
} 
?> 