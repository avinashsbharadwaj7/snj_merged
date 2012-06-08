<?php
class PagesController extends AppController {
	var $name = 'Pages';
	var $helpers = array('Html', 'Session');
	var $uses = array();

	function display() {
            $this->redirect(array('controller'=>'users', 'action' => 'login'));
	}
}
