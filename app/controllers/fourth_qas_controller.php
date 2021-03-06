<?php
class FourthQasController extends AppController {

	var $name = 'FourthQas';

	function index() {
		$this->FourthQa->recursive = 0;
		$this->set('fourthQas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid fourth qa', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('fourthQa', $this->FourthQa->read(null, $id));
	}

	function add() {
		if (!empty($this->data) && $this->RequestHandler->isAjax()) {
                    configure::write('debug', 0);
                    $this->layout = 'ajax';
                    $this->autoRender = false;
                    $response = null;
                    if($this->data['FourthQa']['report_id'] == "NYA"){
                        $response = array(
                            'error' => 1,
                            'message' => (__('Report hasn\'t been created yet. Please start the report.', true))
                        );
                        return json_encode($response);
                    }
                    $this->__checkID();
                    $this->FourthQa->create();
                    if ($this->FourthQa->save($this->data)) {
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
                            $response['data']['FourthQa'] = $this->FourthQa->invalidFields();
                    }
                    return json_encode($response);
		}
	}

        function __checkID(){
            $conditions = array('report_id'=>  $this->data['FourthQa']['report_id'],
                    'date'=>  $this->data['FourthQa']['date']);
            $id = $this->FourthQa->field('id', $conditions);
            $this->data['FourthQa']['id'] = $id;
        }

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid fourth qa', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->FourthQa->save($this->data)) {
				$this->Session->setFlash(__('The fourth qa has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fourth qa could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FourthQa->read(null, $id);
		}
		$reports = $this->FourthQa->Report->find('list');
		$this->set(compact('reports'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for fourth qa', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FourthQa->delete($id)) {
			$this->Session->setFlash(__('Fourth qa deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Fourth qa was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>