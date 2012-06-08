<?php
class FourthGroupsController extends AppController {

	var $name = 'FourthGroups';
        var $components = array('RequestHandler');
        var $autoRender = false;

	function index() {
		$this->FourthGroup->recursive = 0;
		$this->set('fourthGroups', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid fourth group', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('fourthGroup', $this->FourthGroup->read(null, $id));
	}

	function add() {
		if (!empty($this->data) && $this->RequestHandler->isAjax()) {
                    configure::write('debug', 0);
                    $this->layout = 'ajax';
                    $this->autoRender = false;
                    $response = null;
                    if($this->data['FourthGroup']['report_id'] == "NYA"){
                        $response = array(
                            'error' => 1,
                            'message' => (__('Report hasn\'t been created yet. Please start the report.', true))
                        );
                        return json_encode($response);
                    }
                    $this->__checkID();
                    $this->FourthGroup->create();
                    if ($this->FourthGroup->save($this->data)) {
                            $response = array(
                                    'error'=> 0,
                                    'message' => (__('Data for Fourth Group has been saved', true))
                             );
                            return json_encode($response);
                    } else {
                            $response = array(
                                    'error'=> 1,
                                    'message' => (__('Data for Fourth Group could not be saved. Please, try again.', true))
                             );
                            $response['data']['FourthGroup'] = $this->FourthGroup->invalidFields();
                    }
                    return json_encode($response);
		}
	}

        function __checkID(){
            $conditions = array('report_id'=>  $this->data['FourthGroup']['report_id'],
                    'date'=>  $this->data['FourthGroup']['date']);
            $id = $this->FourthGroup->field('id', $conditions);
            $this->data['FourthGroup']['id'] = $id;
        }

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid fourth group', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->FourthGroup->save($this->data)) {
				$this->Session->setFlash(__('The fourth group has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fourth group could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FourthGroup->read(null, $id);
		}
		$reports = $this->FourthGroup->Report->find('list');
		$this->set(compact('reports'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for fourth group', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FourthGroup->delete($id)) {
			$this->Session->setFlash(__('Fourth group deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Fourth group was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>