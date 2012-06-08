<?php
class InterfaceOptionsController extends AppController {

	var $name = 'InterfaceOptions';

	function index() {
		$this->InterfaceOption->recursive = 0;
		$this->set('interfaceOptions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid interface option', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('interfaceOption', $this->InterfaceOption->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->InterfaceOption->create();
			if ($this->InterfaceOption->save($this->data)) {
				$this->Session->setFlash(__('The interface option has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The interface option could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid interface option', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->InterfaceOption->save($this->data)) {
				$this->Session->setFlash(__('The interface option has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The interface option could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->InterfaceOption->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for interface option', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->InterfaceOption->delete($id)) {
			$this->Session->setFlash(__('Interface option deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Interface option was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>