<?php
class IrAdditionalEngineersController extends AppController {

	var $name = 'IrAdditionalEngineers';
        
	function index() {
		$this->IrAdditionalEngineer->recursive = 0;
		$this->set('irAdditionalEngineers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ir additional engineer', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('irAdditionalEngineer', $this->IrAdditionalEngineer->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->IrAdditionalEngineer->create();
			if ($this->IrAdditionalEngineer->save($this->data)) {
				$this->Session->setFlash(__('The ir additional engineer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ir additional engineer could not be saved. Please, try again.', true));
			}
		}
		$irModules = $this->IrAdditionalEngineer->IrModule->find('list');
		$this->set(compact('irModules'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ir additional engineer', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->IrAdditionalEngineer->save($this->data)) {
				$this->Session->setFlash(__('The ir additional engineer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ir additional engineer could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->IrAdditionalEngineer->read(null, $id);
		}
		$irModules = $this->IrAdditionalEngineer->IrModule->find('list');
		$this->set(compact('irModules'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ir additional engineer', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->IrAdditionalEngineer->delete($id)) {
			$this->Session->setFlash(__('Ir additional engineer deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ir additional engineer was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>