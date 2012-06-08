<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class HelpBoxHelper extends Helper {

    public $helpers = array('Html', 'Session', 'Form', 'Javascript', 'Ajax');
    //@TODO: Tooltip image is not displaying yet.
    function display($field) {
        App::import('model', 'RfHelp');
        $RfHelp = new RfHelp();
        $text = $RfHelp->getHelpText($field);
        if($text != null)
            $html = $this->Html->image('/img/help16.png', array("alt" => "Help", "title"=>$text[0]['RfHelp']['text'], "class"=>"img_helpbox vtip", "id"=>"img_".$field));
        else
            $html = $this->Html->image('/img/help16.png', array("alt" => "Help", "title"=>"Not Available", "class"=>"img_helpbox vtip", "id"=>"img_".$field));
        return $html;
    }

}

?>
