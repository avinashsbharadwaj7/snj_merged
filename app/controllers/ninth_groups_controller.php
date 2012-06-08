<?php
class NinthGroupsController extends AppController {

	var $name = 'NinthGroups';

	function index() {
		$this->NinthGroup->recursive = 0;
		$this->set('ninthGroups', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ninth group', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('ninthGroup', $this->NinthGroup->read(null, $id));
	}

	function add() {
		if (!empty($this->data) && $this->RequestHandler->isAjax()) {
                    configure::write('debug', 0);
                    $this->layout = 'ajax';
                    $this->autoRender = false;
                    $response = null;
                    if($this->data['NinthGroup']['report_id'] == "NYA"){
                        $response = array(
                            'error' => 1,
                            'message' => (__('Report hasn\'t been created yet. Please start the report.', true))
                        );
                        return json_encode($response);
                    }
                    $this->__checkID();
                    $this->NinthGroup->create();
                    if ($this->NinthGroup->save($this->data)) {
                            $response = array(
                                    'error'=> 0,
                                    'message' => (__('Data for Ninth Group has been saved', true))
                             );
                            return json_encode($response);
                    } else {
                            $response = array(
                                    'error'=> 1,
                                    'message' => (__('Data for Ninth Group could not be saved. Please, try again.', true))
                             );
                            $response['data']['NinthGroup'] = $this->NinthGroup->invalidFields();
                    }
                    return json_encode($response);
		}
	}

        function __checkID(){
            $conditions = array('report_id'=>  $this->data['NinthGroup']['report_id'],
                    'date'=>  $this->data['NinthGroup']['date']);
            $id = $this->NinthGroup->field('id', $conditions);
            $this->data['NinthGroup']['id'] = $id;
        }
        
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ninth group', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->NinthGroup->save($this->data)) {
				$this->Session->setFlash(__('The ninth group has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ninth group could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->NinthGroup->read(null, $id);
		}
		$reports = $this->NinthGroup->Report->find('list');
		$this->set(compact('reports'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ninth group', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->NinthGroup->delete($id)) {
			$this->Session->setFlash(__('Ninth group deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ninth group was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>