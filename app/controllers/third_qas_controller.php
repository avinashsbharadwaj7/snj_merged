<?php
class ThirdQasController extends AppController {

	var $name = 'ThirdQas';

	function index() {
		$this->ThirdQa->recursive = 0;
		$this->set('thirdQas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid third qa', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('thirdQa', $this->ThirdQa->read(null, $id));
	}

	function add() {
		if (!empty($this->data) && $this->RequestHandler->isAjax()) {
                    configure::write('debug', 0);
                    $this->layout = 'ajax';
                    $this->autoRender = false;
                    $response = null;
                    if($this->data['ThirdQa']['report_id'] == "NYA"){
                        $response = array(
                            'error' => 1,
                            'message' => (__('Report hasn\'t been created yet. Please start the report.', true))
                        );
                        return json_encode($response);
                    }
                    $this->__checkID();
                    $this->ThirdQa->create();
                    if ($this->ThirdQa->save($this->data)) {
                            $response = array(
                                    'error'=> 0,
                                    'message' => (__('Data for Third QA Group has been saved', true))
                             );
                            return json_encode($response);
                    } else {
                            $response = array(
                                    'error'=> 1,
                                    'message' => (__('Data for Third QA Group could not be saved. Please, try again.', true))
                             );
                            $response['data']['ThirdQa'] = $this->ThirdQa->invalidFields();
                    }
                    return json_encode($response);
		}
	}

        function __checkID(){
            $conditions = array('report_id'=>  $this->data['ThirdQa']['report_id'],
                    'date'=>  $this->data['ThirdQa']['date']);
            $id = $this->ThirdQa->field('id', $conditions);
            $this->data['ThirdQa']['id'] = $id;
        }

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid third qa', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ThirdQa->save($this->data)) {
				$this->Session->setFlash(__('The third qa has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The third qa could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ThirdQa->read(null, $id);
		}
		$reports = $this->ThirdQa->Report->find('list');
		$this->set(compact('reports'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for third qa', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ThirdQa->delete($id)) {
			$this->Session->setFlash(__('Third qa deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Third qa was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>