<?php
class TenthGroupsController extends AppController {

	var $name = 'TenthGroups';

	function index() {
		$this->TenthGroup->recursive = 0;
		$this->set('tenthGroups', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid tenth group', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('tenthGroup', $this->TenthGroup->read(null, $id));
	}

	function add() {
		if (!empty($this->data) && $this->RequestHandler->isAjax()) {
                    configure::write('debug', 0);
                    $this->layout = 'ajax';
                    $this->autoRender = false;
                    $response = null;
                    if($this->data['TenthGroup']['report_id'] == "NYA"){
                        $response = array(
                            'error' => 1,
                            'message' => (__('Report hasn\'t been created yet. Please start the report.', true))
                        );
                        return json_encode($response);
                    }
                    $this->__checkID();
                    $this->TenthGroup->create();
                    if ($this->TenthGroup->save($this->data)) {
                            $response = array(
                                    'error'=> 0,
                                    'message' => (__('Data for Tenth Group has been saved', true))
                             );
                            return json_encode($response);
                    } else {
                            $response = array(
                                    'error'=> 1,
                                    'message' => (__('Data for Tenth Group could not be saved. Please, try again.', true))
                             );
                            $response['data']['TenthGroup'] = $this->TenthGroup->invalidFields();
                    }
                    return json_encode($response);
		}
	}

        function __checkID(){
            $conditions = array('report_id'=>  $this->data['TenthGroup']['report_id'],
                    'date'=>  $this->data['TenthGroup']['date']);
            $id = $this->TenthGroup->field('id', $conditions);
            $this->data['TenthGroup']['id'] = $id;
        }
        
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid tenth group', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->TenthGroup->save($this->data)) {
				$this->Session->setFlash(__('The tenth group has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tenth group could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->TenthGroup->read(null, $id);
		}
		$reports = $this->TenthGroup->Report->find('list');
		$this->set(compact('reports'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for tenth group', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->TenthGroup->delete($id)) {
			$this->Session->setFlash(__('Tenth group deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Tenth group was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>