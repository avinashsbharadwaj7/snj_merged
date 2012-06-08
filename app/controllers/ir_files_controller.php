<?php
class IrFilesController extends AppController {
    

	var $name = 'IrFiles';

	function index() {
		$this->IrFile->recursive = 0;
		$this->set('irFiles', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ir file', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('irFile', $this->IrFile->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->IrFile->create();
			if ($this->IrFile->save($this->data)) {
				$this->Session->setFlash(__('The ir file has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ir file could not be saved. Please, try again.', true));
			}
		}
		$irModules = $this->IrFile->IrModule->find('list');
		$this->set(compact('irModules'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ir file', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->IrFile->save($this->data)) {
				$this->Session->setFlash(__('The ir file has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ir file could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->IrFile->read(null, $id);
		}
		$irModules = $this->IrFile->IrModule->find('list');
		$this->set(compact('irModules'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ir file', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->IrFile->delete($id)) {
			$this->Session->setFlash(__('Ir file deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ir file was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>