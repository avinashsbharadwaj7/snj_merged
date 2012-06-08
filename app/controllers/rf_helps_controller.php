<?php
class RfHelpsController extends AppController {

	var $name = 'RfHelps';

	function index() {
		$this->RfHelp->recursive = 0;
		$this->set('rfHelps', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid rf help', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('rfHelp', $this->RfHelp->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->RfHelp->create();
			if ($this->RfHelp->save($this->data)) {
				$this->Session->setFlash(__('The rf help has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rf help could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid rf help', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->RfHelp->save($this->data)) {
				$this->Session->setFlash(__('The rf help has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rf help could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->RfHelp->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for rf help', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->RfHelp->delete($id)) {
			$this->Session->setFlash(__('Rf help deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Rf help was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>