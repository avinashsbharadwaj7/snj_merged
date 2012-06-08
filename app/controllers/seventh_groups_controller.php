<?php
class SeventhGroupsController extends AppController {

	var $name = 'SeventhGroups';

	function index() {
		$this->SeventhGroup->recursive = 0;
		$this->set('seventhGroups', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid seventh group', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('seventhGroup', $this->SeventhGroup->read(null, $id));
	}

	function add() {
		if (!empty($this->data) && $this->RequestHandler->isAjax()) {
                    configure::write('debug', 0);
                    $this->layout = 'ajax';
                    $this->autoRender = false;
                    $response = null;
                    if($this->data['SeventhGroup']['report_id'] == "NYA"){
                        $response = array(
                            'error' => 1,
                            'message' => (__('Report hasn\'t been created yet. Please start the report.', true))
                        );
                        return json_encode($response);
                    }
                    $this->__checkID();
                    $this->SeventhGroup->create();
                    if ($this->SeventhGroup->save($this->data)) {
                            $response = array(
                                    'error'=> 0,
                                    'message' => (__('Data for Seventh Group has been saved', true))
                             );
                            return json_encode($response);
                    } else {
                            $response = array(
                                    'error'=> 1,
                                    'message' => (__('Data for Seventh Group could not be saved. Please, try again.', true))
                             );
                            $response['data']['SeventhGroup'] = $this->SeventhGroup->invalidFields();
                    }
                    return json_encode($response);
		}
	}

        function __checkID(){
            $conditions = array('report_id'=>  $this->data['SeventhGroup']['report_id'],
                    'date'=>  $this->data['SeventhGroup']['date']);
            $id = $this->SeventhGroup->field('id', $conditions);
            $this->data['SeventhGroup']['id'] = $id;
        }

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid seventh group', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SeventhGroup->save($this->data)) {
				$this->Session->setFlash(__('The seventh group has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The seventh group could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SeventhGroup->read(null, $id);
		}
		$reports = $this->SeventhGroup->Report->find('list');
		$this->set(compact('reports'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for seventh group', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SeventhGroup->delete($id)) {
			$this->Session->setFlash(__('Seventh group deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Seventh group was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>