<?php
class RfPostLaunchReportsController extends AppController {

	var $name = 'RfPostLaunchReports';

	function index() {
		$this->RfPostLaunchReport->recursive = 0;
		$this->set('rfPostLaunchReports', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid rf post launch report', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('rfPostLaunchReport', $this->RfPostLaunchReport->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->RfPostLaunchReport->create();
			if ($this->RfPostLaunchReport->save($this->data)) {
				$this->Session->setFlash(__('The rf post launch report has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rf post launch report could not be saved. Please, try again.', true));
			}
		}
		$rfModules = $this->RfPostLaunchReport->RfModule->find('list');
		$this->set(compact('rfModules'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid rf post launch report', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->RfPostLaunchReport->save($this->data)) {
				$this->Session->setFlash(__('The rf post launch report has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rf post launch report could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->RfPostLaunchReport->read(null, $id);
		}
		$rfModules = $this->RfPostLaunchReport->RfModule->find('list');
		$this->set(compact('rfModules'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for rf post launch report', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->RfPostLaunchReport->delete($id)) {
			$this->Session->setFlash(__('Rf post launch report deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Rf post launch report was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>