<?php
class FifthGroupsController extends AppController {

	var $name = 'FifthGroups';
        var $autoRender = false;

	function index() {
		$this->FifthGroup->recursive = 0;
		$this->set('fifthGroups', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid fifth group', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('fifthGroup', $this->FifthGroup->read(null, $id));
	}

	function add() {
		if (!empty($this->data) && $this->RequestHandler->isAjax()) {
                    configure::write('debug', 0);
                    $this->layout = 'ajax';
                    $this->autoRender = false;
                    $response = null;
                    if($this->data['FifthGroup']['report_id'] == "NYA"){
                        $response = array(
                            'error' => 1,
                            'message' => (__('Report hasn\'t been created yet. Please start the report.', true))
                        );
                        return json_encode($response);
                    }
                    $this->__checkID();
                    $this->FifthGroup->create();
                    if ($this->FifthGroup->save($this->data)) {
                            $response = array(
                                    'error'=> 0,
                                    'message' => (__('Data for Fifth Group has been saved', true))
                             );
                            return json_encode($response);
                    } else {
                            $response = array(
                                    'error'=> 1,
                                    'message' => (__('Data for Fifth Group could not be saved. Please, try again.', true))
                             );
                            $response['data']['FifthGroup'] = $this->FifthGroup->invalidFields();
                    }
                    return json_encode($response);
		}
	}

        function __checkID(){
            $conditions = array('report_id'=>  $this->data['FifthGroup']['report_id'],
                    'date'=>  $this->data['FifthGroup']['date']);
            $id = $this->FifthGroup->field('id', $conditions);
            $this->data['FifthGroup']['id'] = $id;
        }
        
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid fifth group', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->FifthGroup->save($this->data)) {
				$this->Session->setFlash(__('The fifth group has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fifth group could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FifthGroup->read(null, $id);
		}
		$reports = $this->FifthGroup->Report->find('list');
		$this->set(compact('reports'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for fifth group', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FifthGroup->delete($id)) {
			$this->Session->setFlash(__('Fifth group deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Fifth group was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>