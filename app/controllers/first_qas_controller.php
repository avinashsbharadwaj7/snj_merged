<?php
class FirstQasController extends AppController {

	var $name = 'FirstQas';

	function index() {
		$this->FirstQa->recursive = 0;
		$this->set('firstQas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid first qa', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('firstQa', $this->FirstQa->read(null, $id));
	}

	function add() {
		if (!empty($this->data) && $this->RequestHandler->isAjax()) {
                    configure::write('debug', 0);
                    $this->layout = 'ajax';
                    $this->autoRender = false;
                    $response = null;
                    if($this->data['FirstQa']['report_id'] == "NYA"){
                        $response = array(
                            'error' => 1,
                            'message' => (__('Report hasn\'t been created yet. Please start the report.', true))
                        );
                        return json_encode($response);
                    }
                    $this->__checkID();
                    $this->FirstQa->create();
                    if ($this->FirstQa->save($this->data)) {
                            $response = array(
                                    'error'=> 0,
                                    'message' => (__('Data for First QA Group has been saved', true))
                             );
                            return json_encode($response);
                    } else {
                            $response = array(
                                    'error'=> 1,
                                    'message' => (__('Data for First QA Group could not be saved. Please, try again.', true))
                             );
                            $response['data']['FirstQa'] = $this->FirstQa->invalidFields();
                    }
                    return json_encode($response);
		}
	}

        function __checkID(){
            $conditions = array('report_id'=>  $this->data['FirstQa']['report_id'],
                    'date'=>  $this->data['FirstQa']['date']);
            $id = $this->FirstQa->field('id', $conditions);
            $this->data['FirstQa']['id'] = $id;
        }

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid first qa', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->FirstQa->save($this->data)) {
				$this->Session->setFlash(__('The first qa has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The first qa could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FirstQa->read(null, $id);
		}
		$reports = $this->FirstQa->Report->find('list');
		$this->set(compact('reports'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for first qa', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FirstQa->delete($id)) {
			$this->Session->setFlash(__('First qa deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('First qa was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>