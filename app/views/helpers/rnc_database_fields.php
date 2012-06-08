<?php

/*
 * @id emoibhu
 * @name Moiz Bhukhiya
 */

class RncDatabaseFieldsHelper extends Helper {

    public $helpers = array('Html', 'Session', 'Form', 'Javascript', 'Ajax');
    private $__type = null;
    private $__id = null;
    private $__name = null;

    function makeFields($fields) {
        $result = "";
        foreach ($fields as $field) {
            if ($field['Field']['dependent'] == 1) {
                $result .= "<div class='placeholders' id='{$field['Field']['name']}Placeholder'></div>";
            } else {
                $options = (in_array($field['Field']['input_type'], array('radio', 'select'))) ? $this->getOptions($field['Field']['name'], $field['Field']['module_id']) : null;
                $result .= $this->Form->input($field['Field']['name'],
                                array(
                                    'options' => $options,
                                    'label' => $field['Field']['label'],
                                    'type' => $field['Field']['input_type'],
                                    'div' => array('class' => $field['Field']['class'])
                                )
                );
            }
        }
        return $result;
    }

    function getOptions($for, $module_id) {
        App::import('model', 'RncDropdown');
        $dropdowns = new RncDropdown();
        $options = $dropdowns->options($for, $module_id);
        $results = array("" => "");
        foreach ($options as $option) {
            $results[$option['RncDropdown']['value']] = $option['RncDropdown']['label'];
        }
        return $results;
    }

    function generateConditions($fields) {
        foreach ($fields as $field) {

        }
    }

    function getLabel($field) {
        $htm = $this->Form->label($field);
        preg_match('/">(.*?)<\/label>/', $htm, $label);
        return $label[1];
    }

    function removeSpecialCharacters($field) {

        $remove = array("\n", "\r\n", "\r", "<p>", "</p>", "<h1>", "</h1>", "\t");
        $field = str_replace($remove, ' ', $field);
        return $field;
    }

    function  addNoteLink($field = null) {
         $html = $this->Form->button('+',array('div'=>false, 'class'=>'add_note', 'value'=>'+', 'alt'=>'Add Note'));
         if(empty($field))
            return $html;
         $html .= $this->Html->image('up_alt.png', array('class'=>'upload_file_img', 'title'=>'Upload Files', 'alt'=>$field));
         $html .= $this->Html->image('down_alt.png', array('class'=>'download_file_img', 'title'=>'Download Files', 'alt'=>$field));
         $html .= $this->Html->link("Report Problem/Shift Interrupt", array("controller" => "rnc_issues","action" => "add"), array('class' => "report_problem", "alt" => "$field"));
         return $html;
    }

    function getClass($value = null){
        if(!$value)
            return null;
        if($value === "Yes")
            return "completed-task";
        if($value === "No")
            return "incomplete-task";
        if($value === "NA")
            return "not-applicable-task";
        return null;
        
    }

}

?>
