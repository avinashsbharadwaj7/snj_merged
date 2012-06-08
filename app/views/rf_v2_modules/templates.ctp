<?php
echo $html->css(array('rnc/style', 'rnc/view', 'rnc/css_menu', 'rnc/bcp'));
echo $this->Html->div("links", $this->Html->link('General Template',array("action" => "download_file", "PQR_Template_091311.xls")));
echo $this->Html->div("links", $this->Html->link('Template for Pre Launch Activity',array("action" => "download_file", "PQR_Template_091311_PreLaunch.xls")));
echo $this->Html->div("links", $this->Html->link('Template for Post Launch Activity',array("action" => "download_file", "PQR_Template_091311_PostLaunch.xls")));
?>