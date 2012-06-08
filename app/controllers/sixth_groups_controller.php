<?php
class SixthGroupsController extends AppController {

	var $name = 'SixthGroups';

	function index() {
		$this->SixthGroup->recursive = 0;
		$this->set('sixthGroups', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid sixth group', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('sixthGroup', $this->SixthGroup->read(null, $id));
	}

	function add() {
		if (!empty($this->data) && $this->RequestHandler->isAjax()) {
                    configure::write('debug', 0);
                    $this->layout = 'ajax';
                    $this->autoRender = false;
                    $response = null;
                    if($this->data['SixthGroup']['report_id'] == "NYA"){
                        $response = array(
                            'error' => 1,
                            'message' => (__('Report hasn\'t been created yet. Please start the report.', true))
                        );
                        return json_encode($response);
                    }
                    $this->__checkID();
                    $this->SixthGroup->create();
                    if ($this->SixthGroup->save($this->data)) {
                            $response = array(
                                    'error'=> 0,
                                    'message' => (__('Data for Sixth Group has been saved', true))
                             );
                            return json_encode($response);
                    } else {
                            $response = array(
                                    'error'=> 1,
                                    'message' => (__('Data for Sixth Group could not be saved. Please, try again.', true))
                             );
                            $response['data']['SixthGroup'] = $this->SixthGroup->invalidFields();
                    }
                    return json_encode($response);
		}
	}

        function __checkID(){
            $conditions = array('report_id'=>  $this->data['SixthGroup']['report_id'],
                    'date'=>  $this->data['SixthGroup']['date']);
            $id = $this->SixthGroup->field('id', $conditions);
            $this->data['SixthGroup']['id'] = $id;
        }

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid sixth group', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SixthGroup->save($this->data)) {
				$this->Session->setFlash(__('The sixth group has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sixth group could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SixthGroup->read(null, $id);
		}
		$reports = $this->SixthGroup->Report->find('list');
		$this->set(compact('reports'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for sixth group', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SixthGroup->delete($id)) {
			$this->Session->setFlash(__('Sixth group deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Sixth group was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>