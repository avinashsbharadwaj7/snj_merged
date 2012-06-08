<?php
class IrIssuesController extends AppController {

	var $name = 'IrIssues';

	function index() {
		$this->IrIssue->recursive = 0;
		$this->set('irIssues', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ir issue', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('irIssue', $this->IrIssue->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->IrIssue->create();
			if ($this->IrIssue->save($this->data)) {
				$this->Session->setFlash(__('The ir issue has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ir issue could not be saved. Please, try again.', true));
			}
		}
		$irModules = $this->IrIssue->IrModule->find('list');
		$this->set(compact('irModules'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ir issue', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->IrIssue->save($this->data)) {
				$this->Session->setFlash(__('The ir issue has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ir issue could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->IrIssue->read(null, $id);
		}
		$irModules = $this->IrIssue->IrModule->find('list');
		$this->set(compact('irModules'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ir issue', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->IrIssue->delete($id)) {
			$this->Session->setFlash(__('Ir issue deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ir issue was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>