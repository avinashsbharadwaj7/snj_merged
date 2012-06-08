<?php

/*
 * Helper to work with Dependent and Independent fields
 *
 */

/**
 * Description of my_html
 * 
 * @author emoibhu
 */
class MyJsHtmlHelper extends Helper {

    public $helpers = array('Html', 'Session', 'Form', 'Javascript', 'Ajax');
    private $__map = null;
    private $__model = null;

    function init($model = null, $map = null) {
        $this->__map = $map;
        $this->__model = $model;
    }

    function observeFields() {
        $return = null;
        $hideJs = null;
        $condJs = null;
        foreach ($this->__map as $field => $dependencies) {
            $id = $this->__model . Inflector::camelize($field);
            foreach ($dependencies as $key => $dependency) {
                $comment = "\n//--$key--\n";
                if ((isset($dependency['directId']) ? (($dependency['directId']) ? true : false) : false)) {
                    $dependentId = $key;
                    $hideJs .= "j('#$dependentId').hide();\n";
                    if (is_array($dependency['values'])) {
                        $condJs .= "\nif(j.inArray(j(this).val()," . json_encode($dependency['values']) . ") != -1){\n";
                        $condJs .= "j('#$dependentId').show();\n}";
                        $condJs .= "else{j('#$dependentId').val('');j('#$dependentId').hide();\n}";
                    } else {
                        $condJs .= "\nif(j(this).val().match(" . $dependency['values'] . ") != null){\n";
                        $condJs .= "j('#$dependentId').show();\n}";
                        $condJs .= "else{j('#$dependentId').val('');j('#$dependentId').hide();\n}";
                    }
                }elseif(isset($dependency['callback'])) {
                    $dependentId = $this->__model . Inflector::camelize($key);;
                    $hideJs .= "j('#$dependentId').parent().hide();\n";
                    $condJs .= "\nif({$dependency['callback']}(j(this).val()," . json_encode($dependency['values']) . ")){\n";
                    $condJs .= "j('#$dependentId').parent().show();\n}";
                    $condJs .= "else{j('#$dependentId').val('');j('#$dependentId').parent().hide();\n}";
                }else {
                    $dependentId = $this->__model . Inflector::camelize($key);
                    $hideJs .= "j('#$dependentId').parent().hide();\n";
                    if (is_array($dependency['values'])) {
                        $condJs .= "\nif(j.inArray(j(this).val()," . json_encode($dependency['values']) . ") != -1){\n";
                        $condJs .= "j('#$dependentId').parent().show();\n}";
                        $condJs .= "else{j('#$dependentId').val('');j('#$dependentId').parent().hide();\n}";
                    }else{
                        $condJs .= "\nif(j(this).val().match(" . $dependency['values'] . ") != null){\n";
                        $condJs .= "j('#$dependentId').parent().show();\n}";
                        $condJs .= "else{j('#$dependentId').val('');j('#$dependentId').parent().hide();\n}";
                    }
                }
            }
            $return .= $comment . $hideJs . "j('#$id').change(function(){{$condJs}});";
            $condJs = $hideJs = null;
        }
        return $this->Javascript->codeBlock($return);
    }

}

?>