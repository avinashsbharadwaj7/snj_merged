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
class MyHtmlHelper extends Helper {
    public $helpers = array('Html', 'Session', 'Form', 'Javascript', 'Ajax');
    private $__map = null;
    public  $myAdd = "add";
    public $myEdit = "edit";
    public $myData = null;
    private $__model = null;
    public $dependencyTree = array();
    public $firstLoad = false;

    function init(){
        if($this->params['isAjax'] != true){
            $this->firstLoad = true;
        }
    }

    function input($fieldName, $options = array()){
        $myModel = $this->model();
        if(!array_key_exists($fieldName, $this->__map)){//Independent Fields
            if($this->params['isAjax'] != true){
                return $this->Form->input($fieldName, $options);
            }
        }else{//Dependent Fields
            if($this->params['isAjax'] != true){
                if($this->params['action'] == $this->myAdd){
                    return $this->__renderObserveFields($fieldName);
                }
                if($this->params['action'] == $this->myEdit){
                    $output = null;
                    if($this->__containsValidValue($fieldName)){
                        $output .= $this->Ajax->div($fieldName."_placeholder", array("class"=>"placeholder"));
                        $output .= $this->Form->input($fieldName, $options);
                        $output .= $this->Ajax->divEnd($fieldName."_placeholder", array("class"=>"placeholder"));
                        $output .= $this->__renderObserveFields($fieldName, FALSE);
                    }else{
                        $output .= $this->__renderObserveFields($fieldName);
                    }
                    return $output;
                }
            }else{
                if($this->__containsValidValue($fieldName)){
                    if($fieldName == $this->params['pass'][0]){
                        $fieldName = $this->__model . "." . $fieldName;
                        return $this->Form->input($fieldName, $options);
                    }
                }
            }
        }
    }

    function __containsValidValue($fieldName){
        if(!empty($this->myData)){
            if(array_key_exists($fieldName, $this->__map)){
                $myEntities = $this->__map[$fieldName];
                foreach($myEntities as $key => $entity){
                    $myModel = null;
                    if(isset($entity['model'])){
                        $myModel = ($entity['model'] != null && !empty($entity['model'])) ? $entity['model'] : $this->model();
                    }else{
                        $myModel = $this->model();
                    }
                    if(empty($myModel)){
                        $myModel = $this->__model;
                    }
                    if(isset($this->myData[$myModel][$key])){
                        if(isset($entity['hasCallback'])){
                            if($entity['hasCallback']){
                                return call_user_func(array($this, $entity['callback']), $entity['values'], $this->myData[$myModel][$key]);
                            }
                        }
                        if(!in_array($this->myData[$myModel][$key], $entity['values'])){
                            return false;
                        }
                    }else{
                        return false;
                    }
                    if(isset($this->params['pass'][1])){
                        $this->__getDependencyTree($fieldName);
                        $dependants = $this->dependencyTree;
                        $isValid = true;
                        if(is_array($dependants)){
                            foreach($dependants as $dependant){
                                $isValid = $isValid && $this->__containsValidValue($dependant);
                            }
                            return $isValid;
                        }else{
                            return true;
                        }
                    }
                }
                return true;
            }
        }
        return false;
    }

    function setDependencyMap($map = null){
        $this->__map = $map;
    }

    function __renderObserveFields($fieldName, $renderDiv = true){
        $myEntities = $this->__map[$fieldName];
        $returnHtml = null;
        if($renderDiv){
            $returnHtml .= $this->Ajax->div($fieldName."_placeholder", array("class"=>"placeholder"));
            $returnHtml .= $this->Ajax->divEnd($fieldName."_placeholder", array("class"=>"placeholder"));
        }
        foreach($myEntities as $key => $entity){
            $id = $this->__getHtmlId($key, $entity);
            $returnHtml .= $this->observeField($id, array("update"=>$fieldName."_placeholder",
                'form'=>$this->model(). Inflector::camelize($this->params['action']). 'Form',
                'url' => array('controller'=>$this->params['controller'], 'action'=>$this->params['action'], $fieldName)));
        }
        $returnHtml .= $this->__renderObserveFieldsForDepenencies($fieldName);
        return $returnHtml;
    }
    
    function __renderObserveFieldsForDepenencies($fieldName = null){
        $this->__getDependencyTree($fieldName, true);
        $dependencies = $this->dependencyTree;
        $returnHtml = null;
        if(is_array($dependencies)){
            foreach($dependencies as $key => $entity){
                if(array_key_exists($entity, $this->__map)){
                    $myEntities = $this->__map[$entity];
                    foreach($myEntities as $myKey => $myEntity){
                        $id = $this->__getHtmlId($myKey, $myEntity);
                        $returnHtml .= $this->observeField($id, array("update"=>$fieldName."_placeholder",
                        'form'=>$this->model(). Inflector::camelize($this->params['action']). 'Form',
                        'url' => array('controller'=>$this->params['controller'], 'action'=>$this->params['action'], $fieldName, "extendedCheck")));
                    }
                }
            }
        }
        return $returnHtml;
    }

    function __getHtmlId($key, $entity){
        if(isset($entity['id'])){
            if($entity['id'] != null && !empty($entity['id'])){
                return $entity['id'];
            }
        }
        if(isset($entity['model'])){
            if($entity['model'] != null && !empty($entity['model'])){
                return $entity['model'].Inflector::camelize($key);
            }
        }
        return $this->model().Inflector::camelize($key);
    }

    function create($model = null, $options = array()){
        $this->__model = $model;
        if($this->params['isAjax'] != true){
            return $this->Form->create($model, $options);
        }
    }

    function end($options = array()){
        if($this->params['isAjax'] != true){
            return $this->Form->end($options);
        }
    }

    function observeField($id = null, $options = array()){
        $url = $this->Html->url($options['url']);
        return $this->Javascript->codeBlock(
                "j('#$id').live('change', function(){j.ajax({url: '$url', data: j('#{$options['form']}').serialize(), type: 'POST',
                success: function(data){j('#{$options['update']}').html(data)}})})"
        );
    }

    function __getDependencyTree($fieldName = null, $first = false){
        if($first)
            $this->dependencyTree = array();
        $fieldTree = array();
        if(empty($fieldName) || $fieldName == null){
            return $fieldTree;
        }
        if(is_array($fieldName)){
            foreach($fieldName as $singleField){
                $this->__getDependencyTree($this->__checkDependency($singleField), $fieldTree);
            }
        }else{
            $this->__getDependencyTree($this->__checkDependency($fieldName), $fieldTree);
        }
    }

    function __checkDependency($fieldName = null){
        if(empty($fieldName))
            return;
        if(!array_key_exists($fieldName, $this->__map))
            return null;
        $entities = $this->__map[$fieldName];
        $myFieldTree = null;
        foreach($entities as $key => $entity){
            $myFieldTree[] = $key;
            $this->dependencyTree[] = $key;
        }
        if(count($myFieldTree) == 1)
            $myFieldTree = $myFieldTree[0];
        return $myFieldTree;
    }

    function renderHtml($html){
        if($this->firstLoad){
            return $html;
        }
        return null;
    }

    function renderHtmlWithDependency($html, $fieldName){
        if($this->__containsValidValue($fieldName)){
            echo $html;
        }
    }

    function ajaxLink($text = null, $options1= null, $options2 = null){
        if($this->firstLoad){
            return $this->Ajax->link($text, $options1, $options2);
        }
        return null;
    }

    function greater($values, $myValue){
        foreach($values as $value){
            if($myValue < $value)
                return false;
        }
        return true;
    }

}
?>