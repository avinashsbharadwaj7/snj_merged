<?php
class EleventhGroupsController extends AppController {

	var $name = 'EleventhGroups';
        var $autoRender = false;

	function index() {
		$this->EleventhGroup->recursive = 0;
		$this->set('eleventhGroups', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid eleventh group', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('eleventhGroup', $this->EleventhGroup->read(null, $id));
	}

	function add() {
		if (!empty($this->data) && $this->RequestHandler->isAjax()) {
                    configure::write('debug', 0);
                    $this->layout = 'ajax';
                    $this->autoRender = false;
                    $response = null;
                    if($this->data['EleventhGroup']['report_id'] == "NYA"){
                        $response = array(
                            'error' => 1,
                            'message' => (__('Report hasn\'t been created yet. Please start the report.', true))
                        );
                        return json_encode($response);
                    }
                    $this->__checkID();
                    $this->EleventhGroup->create();
                    if ($this->EleventhGroup->save($this->data)) {
                            $response = array(
                                    'error'=> 0,
                                    'message' => (__('Data for Eleventh Group has been saved', true))
                             );
                            return json_encode($response);
                    } else {
                            $response = array(
                                    'error'=> 1,
                                    'message' => (__('Data for Eleventh Group could not be saved. Please, try again.', true))
                             );
                            $response['data']['EleventhGroup'] = $this->EleventhGroup->invalidFields();
                    }
                    return json_encode($response);
		}
	}

        function __checkID(){
            $conditions = array('report_id'=>  $this->data['EleventhGroup']['report_id'],
                    'date'=>  $this->data['EleventhGroup']['date']);
            $id = $this->EleventhGroup->field('id', $conditions);
            $this->data['EleventhGroup']['id'] = $id;
        }
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid eleventh group', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EleventhGroup->save($this->data)) {
				$this->Session->setFlash(__('The eleventh group has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The eleventh group could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EleventhGroup->read(null, $id);
		}
		$reports = $this->EleventhGroup->Report->find('list');
		$this->set(compact('reports'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for eleventh group', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EleventhGroup->delete($id)) {
			$this->Session->setFlash(__('Eleventh group deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Eleventh group was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>