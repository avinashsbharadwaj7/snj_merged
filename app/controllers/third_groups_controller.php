<?php
class ThirdGroupsController extends AppController {

	var $name = 'ThirdGroups';

	function index() {
		$this->ThirdGroup->recursive = 0;
		$this->set('thirdGroups', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid third group', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('thirdGroup', $this->ThirdGroup->read(null, $id));
	}

	function add() {
		if (!empty($this->data) && $this->RequestHandler->isAjax()) {
                    configure::write('debug', 0);
                    $this->layout = 'ajax';
                    $this->autoRender = false;
                    $response = null;
                    if($this->data['ThirdGroup']['report_id'] == "NYA"){
                        $response = array(
                            'error' => 1,
                            'message' => (__('Report hasn\'t been created yet. Please start the report.', true))
                        );
                        return json_encode($response);
                    }
                    $this->__checkID();
                    $this->ThirdGroup->create();
                    if ($this->ThirdGroup->save($this->data)) {
                            $response = array(
                                    'error'=> 0,
                                    'message' => (__('Data for Third Group has been saved', true))
                             );
                            return json_encode($response);
                    } else {
                            $response = array(
                                    'error'=> 1,
                                    'message' => (__('Data for Third Group could not be saved. Please, try again.', true))
                             );
                            $response['data']['ThirdGroup'] = $this->ThirdGroup->invalidFields();
                    }
                    return json_encode($response);
		}
	}

        function __checkID(){
            $conditions = array('report_id'=>  $this->data['ThirdGroup']['report_id'],
                    'date'=>  $this->data['ThirdGroup']['date']);
            $id = $this->ThirdGroup->field('id', $conditions);
            $this->data['ThirdGroup']['id'] = $id;
        }

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid third group', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ThirdGroup->save($this->data)) {
				$this->Session->setFlash(__('The third group has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The third group could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ThirdGroup->read(null, $id);
		}
		$reports = $this->ThirdGroup->Report->find('list');
		$this->set(compact('reports'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for third group', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ThirdGroup->delete($id)) {
			$this->Session->setFlash(__('Third group deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Third group was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>