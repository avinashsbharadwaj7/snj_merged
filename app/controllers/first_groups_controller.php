<?php
class FirstGroupsController extends AppController {

	var $name = 'FirstGroups';
        var $autoRender = false;

	function index() {
		$this->FirstGroup->recursive = 0;
		$this->set('firstGroups', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid first group', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('firstGroup', $this->FirstGroup->read(null, $id));
	}

	function add() {
		if (!empty($this->data) && $this->RequestHandler->isAjax()) {
                    configure::write('debug', 0);
                    $this->layout = 'ajax';
                    $this->autoRender = false;
                    $response = null;
                    if($this->data['FirstGroup']['report_id'] == "NYA"){
                        $response = array(
                            'error' => 1,
                            'message' => (__('Report hasn\'t been created yet. Please start the report.', true))
                        );
                        return json_encode($response);
                    }
                    $this->__checkID();
                    $this->FirstGroup->create();
                    if ($this->FirstGroup->save($this->data)) {
                            $response = array(
                                    'error'=> 0,
                                    'message' => (__('Data for First Group has been saved', true))
                             );
                            return json_encode($response);
                    } else {
                            $response = array(
                                    'error'=> 1,
                                    'message' => (__('Data for First Group could not be saved. Please, try again.', true))
                             );
                            $response['data']['FirstGroup'] = $this->FirstGroup->invalidFields();
                    }
                    return json_encode($response);
		}
	}
        
        function __checkID(){
            $conditions = array('report_id'=>  $this->data['FirstGroup']['report_id'],
                    'date'=>  $this->data['FirstGroup']['date']);
            $id = $this->FirstGroup->field('id', $conditions);
            $this->data['FirstGroup']['id'] = $id;
        }

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid first group', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->FirstGroup->save($this->data)) {
				$this->Session->setFlash(__('The first group has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The first group could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FirstGroup->read(null, $id);
		}
		$reports = $this->FirstGroup->Report->find('list');
		$this->set(compact('reports'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for first group', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FirstGroup->delete($id)) {
			$this->Session->setFlash(__('First group deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('First group was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>