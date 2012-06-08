<?php
class SecondQasController extends AppController {

	var $name = 'SecondQas';

	function index() {
		$this->SecondQa->recursive = 0;
		$this->set('secondQas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid second qa', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('secondQa', $this->SecondQa->read(null, $id));
	}

	function add() {
		if (!empty($this->data) && $this->RequestHandler->isAjax()) {
                    configure::write('debug', 0);
                    $this->layout = 'ajax';
                    $this->autoRender = false;
                    $response = null;
                    if($this->data['SecondQa']['report_id'] == "NYA"){
                        $response = array(
                            'error' => 1,
                            'message' => (__('Report hasn\'t been created yet. Please start the report.', true))
                        );
                        return json_encode($response);
                    }
                    $this->__checkID();
                    $this->SecondQa->create();
                    if ($this->SecondQa->save($this->data)) {
                            $response = array(
                                    'error'=> 0,
                                    'message' => (__('Data for Second QA Group has been saved', true))
                             );
                            return json_encode($response);
                    } else {
                            $response = array(
                                    'error'=> 1,
                                    'message' => (__('Data for Second QA Group could not be saved. Please, try again.', true))
                             );
                            $response['data']['SecondQa'] = $this->SecondQa->invalidFields();
                    }
                    return json_encode($response);
		}
	}

        function __checkID(){
            $conditions = array('report_id'=>  $this->data['SecondQa']['report_id'],
                    'date'=>  $this->data['SecondQa']['date']);
            $id = $this->SecondQa->field('id', $conditions);
            $this->data['SecondQa']['id'] = $id;
        }

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid second qa', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SecondQa->save($this->data)) {
				$this->Session->setFlash(__('The second qa has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The second qa could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SecondQa->read(null, $id);
		}
		$reports = $this->SecondQa->Report->find('list');
		$this->set(compact('reports'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for second qa', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SecondQa->delete($id)) {
			$this->Session->setFlash(__('Second qa deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Second qa was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
