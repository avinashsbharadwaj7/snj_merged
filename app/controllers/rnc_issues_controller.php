<?php
class RncIssuesController extends AppController {

	var $name = 'RncIssues';
        var $helpers = array('Html','Form','RncDatabaseFields', 'Javascript', 'Ajax', 'Logs');

	function index() {
		$this->RncIssue->recursive = 0;
		$this->set('rncIssues', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid rnc issue', true));
			$this->redirect(array('action' => 'index'));
		}
                $this->data = $this->RncIssue->read(null, $id);
		$this->set('rncIssue', $this->data);
	}

	function add($reportId =null, $stepId = null, $stepDetail = null) {
            $this->autoLayout = false;
		if (!empty($this->data)) {
			$this->RncIssue->create();
			if ($this->RncIssue->save($this->data)) {
                                 //$this->sendEmail($distributionList, $emailList_user, $moduleName, $template, $action);
				 $this->set('saved', true);
                                 $this->render('show_message');
			} else {
				$this->Session->setFlash(__('The issue couldn\'t be saved. Please try again.', true));
			}
		}
                $this->set(compact("reportId", "stepId", "stepDetail"));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid rnc issue', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->RncIssue->save($this->data)) {
				$this->Session->setFlash(__('The Isses Updated Successfully.', true));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The issue could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->RncIssue->read(null, $id);
		}
		$rncReports = $this->RncIssue->RncReport->find('list');
		$this->set(compact('rncReports'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for rnc issue', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->RncIssue->delete($id)) {
			$this->Session->setFlash(__('Rnc issue deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Rnc issue was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>