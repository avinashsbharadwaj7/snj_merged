<?php
/*
    Document   : rnc_drpodowns_controller
    Created on : Jul 21, 2011, 2:46:32 PM
    Author     : emoibhu
    Description: Drop Down controller for RNC module
*/

class RncDropdownsController extends AppController {

	var $name = 'RncDropdowns';
        var $helpers = array('Paginator', 'Html', 'Form');

	function index() {
		$this->RncDropdown->recursive = 0;
		$this->set('rncDropdowns', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid dropdown', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('rncDropdown', $this->RncDropdown->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->RncDropdown->create();
			if ($this->RncDropdown->save($this->data)) {
				$this->Session->setFlash(__('The dropdown has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dropdown could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid rnc dropdown', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->RncDropdown->save($this->data)) {
				$this->Session->setFlash(__('The rnc dropdown has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rnc dropdown could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->RncDropdown->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for dropdown', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->RncDropdown->delete($id)) {
			$this->Session->setFlash(__('Rnc dropdown deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Rnc dropdown was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>