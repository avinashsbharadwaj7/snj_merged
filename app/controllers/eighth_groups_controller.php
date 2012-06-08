<?php
class EighthGroupsController extends AppController {

	var $name = 'EighthGroups';
        var $autoRender = false;

	function index() {
		$this->EighthGroup->recursive = 0;
		$this->set('eighthGroups', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid eighth group', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('eighthGroup', $this->EighthGroup->read(null, $id));
	}

	function add() {
		if (!empty($this->data) && $this->RequestHandler->isAjax()) {
                    configure::write('debug', 0);
                    $this->layout = 'ajax';
                    $this->autoRender = false;
                    $response = null;
                    if($this->data['EighthGroup']['report_id'] == "NYA"){
                        $response = array(
                            'error' => 1,
                            'message' => (__('Report hasn\'t been created yet. Please start the report.', true))
                        );
                        return json_encode($response);
                    }
                    $this->__checkID();
                    $this->EighthGroup->create();
                    if ($this->EighthGroup->save($this->data)) {
                            $response = array(
                                    'error'=> 0,
                                    'message' => (__('Data for Eighth Group has been saved', true))
                             );
                            return json_encode($response);
                    } else {
                            $response = array(
                                    'error'=> 1,
                                    'message' => (__('Data for Eighth Group could not be saved. Please, try again.', true))
                             );
                            $response['data']['EighthGroup'] = $this->EighthGroup->invalidFields();
                    }
                    return json_encode($response);
		}
	}

        function __checkID(){
            $conditions = array('report_id'=>  $this->data['EighthGroup']['report_id'],
                    'date'=>  $this->data['EighthGroup']['date']);
            $id = $this->EighthGroup->field('id', $conditions);
            $this->data['EighthGroup']['id'] = $id;
        }

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid eighth group', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EighthGroup->save($this->data)) {
				$this->Session->setFlash(__('The eighth group has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The eighth group could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EighthGroup->read(null, $id);
		}
		$reports = $this->EighthGroup->Report->find('list');
		$this->set(compact('reports'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for eighth group', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EighthGroup->delete($id)) {
			$this->Session->setFlash(__('Eighth group deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Eighth group was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>