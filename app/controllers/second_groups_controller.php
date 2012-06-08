<?php
class SecondGroupsController extends AppController {

	var $name = 'SecondGroups';
        var $autoRender = false;

	function index() {
		$this->SecondGroup->recursive = 0;
		$this->set('secondGroups', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid second group', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('secondGroup', $this->SecondGroup->read(null, $id));
	}

	function add() {
		if (!empty($this->data) && $this->RequestHandler->isAjax()) {
                    configure::write('debug', 0);
                    $this->layout = 'ajax';
                    $this->autoRender = false;
                    $response = null;
                    if($this->data['SecondGroup']['report_id'] == "NYA"){
                        $response = array(
                            'error' => 1,
                            'message' => (__('Report hasn\'t been created yet. Please start the report.', true))
                        );
                        return json_encode($response);
                    }
                    $this->__checkID();
                    $this->SecondGroup->create();
                    if ($this->SecondGroup->save($this->data)) {
                            $response = array(
                                    'error'=> 0,
                                    'message' => (__('Data for Second Group has been saved', true))
                             );
                            return json_encode($response);
                    } else {
                            $response = array(
                                    'error'=> 1,
                                    'message' => (__('Data for Second Group could not be saved. Please, try again.', true))
                             );
                            $response['data']['SecondGroup'] = $this->SecondGroup->invalidFields();
                    }
                    return json_encode($response);
		}
	}

        function __checkID(){
            $conditions = array('report_id'=>  $this->data['SecondGroup']['report_id'],
                    'date'=>  $this->data['SecondGroup']['date']);
            $id = $this->SecondGroup->field('id', $conditions);
            $this->data['SecondGroup']['id'] = $id;
        }
        
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid second group', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SecondGroup->save($this->data)) {
				$this->Session->setFlash(__('The second group has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The second group could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SecondGroup->read(null, $id);
		}
		$reports = $this->SecondGroup->Report->find('list');
		$this->set(compact('reports'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for second group', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SecondGroup->delete($id)) {
			$this->Session->setFlash(__('Second group deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Second group was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>