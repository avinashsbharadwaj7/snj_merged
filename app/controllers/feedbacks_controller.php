<?php
class FeedbacksController extends AppController {

	var $name = 'Feedbacks';
        var $components = array('Session');
       // var $layout = 'permarinus_blue';

        function add(){
            if (!empty($this->data)) {
					if ($this->Feedback->save($this->data)) {
                                            $id=$this->Feedback->id;
						$this->Session->setFlash('Your feedback has been saved.');
						$this->redirect(array('controller'=> 'feedbacks','action' => 'view', $id));
					}
				}
        }
        function view($id) {
                            $this->set('feedbacks', $this->Feedback->findById($id));
			}

        function listall(){
                            $this->set('feedbacks', $this->Feedback->find('all'));
        }

}
?>