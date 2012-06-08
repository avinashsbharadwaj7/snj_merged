<?php
class RfAdditionalEngineersController extends AppController {

	var $name = 'RfAdditionalEngineers';

	function index() {
		$this->RfAdditionalEngineer->recursive = 0;
		$this->set('RfAdditionalEngineers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ir additional engineer', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('RfAdditionalEngineer', $this->RfAdditionalEngineer->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->RfAdditionalEngineer->create();
			if ($this->RfAdditionalEngineer->saveAll($this->data)) {
				$this->Session->setFlash(__('The RF additional engineer has been saved', true));
				$this->redirect(array('action' => 'view'));
			} else {
				$this->Session->setFlash(__('The RF additional engineer could not be saved. Please, try again.', true));
			}
		}
		$irModules = $this->RfAdditionalEngineer->RfModule->find('list');
		$this->set(compact('rfModules'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid RF additional engineer', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->RfAdditionalEngineer->save($this->data)) {
				$this->Session->setFlash(__('The RF additional engineer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The RF additional engineer could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->RfAdditionalEngineer->read(null, $id);
		}
		$rfModules = $this->RfAdditionalEngineer->RfModule->find('list');
		$this->set(compact('irModules'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for RF additional engineer', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->RfAdditionalEngineer->delete($id)) {
			$this->Session->setFlash(__('Rf additional engineer deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('RF additional engineer was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>