<?php
class RncEngineersController extends AppController {

	var $name = 'RncEngineers';

	function index() {
		$this->RncEngineer->recursive = 0;
		$this->set('rncEngineers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid rnc engineer', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('rncEngineer', $this->RncEngineer->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->RncEngineer->create();
			if ($this->RncEngineer->save($this->data)) {
				$this->Session->setFlash(__('The rnc engineer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rnc engineer could not be saved. Please, try again.', true));
			}
		}
		$reports = $this->RncEngineer->Report->find('list');
		$this->set(compact('reports'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid rnc engineer', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->RncEngineer->save($this->data)) {
				$this->Session->setFlash(__('The rnc engineer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rnc engineer could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->RncEngineer->read(null, $id);
		}
		$reports = $this->RncEngineer->Report->find('list');
		$this->set(compact('reports'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for rnc engineer', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->RncEngineer->delete($id)) {
			$this->Session->setFlash(__('Rnc engineer deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Rnc engineer was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>