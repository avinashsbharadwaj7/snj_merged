<?php

class AppController extends Controller {

    var $components = array('Session', 'SparkPlug.Authsome' => array('model' => 'User', 'Session'), 'RequestHandler');
    var $helpers = array('Javascript', 'Ajax', 'Session', 'DatabaseFields', 'HelpBox');
    var $uses = array('SparkPlug.UserGroup');

    //var $layout = "permarinus_blue";

    function beforeFilter() {
        parent::beforeFilter();
        SparkPlugIt($this);
    }

    /* Stateful file uploading functions */

    function prepareUploadState($modelName) {
        if (isset($this->data[$modelName]) && is_array($this->data[$modelName])) {
            $temp_arr = array();
            foreach ($this->data[$modelName] as $upload_slot => $upload) {
                if (is_array($upload) && isset($upload['file_name']) && isset($upload['file_tag'])) {
                    // post-upload style formatting
                    $temp_arr[$upload['file_tag']]['id'] = $upload['id'];
                    $temp_arr[$upload['file_tag']]['isCommitted'] = true;
                    $temp_arr[$upload['file_tag']]['origFileName'] = $upload['file_name'];
                    $temp_arr[$upload['file_tag']]['file'] = array(
                        'name' => $upload['file_name'],
                        'error' => 0,
                    );
                }
            }
            $this->Session->write('upload_state_' . $modelName, $temp_arr);
            $this->data[$modelName] = $temp_arr;
        }
    }

    function saveUploadState($modelName) {
	
        $upload_state = array();
        if ($this->Session->check('upload_state_' . $modelName)) {
            $upload_state = $this->Session->read('upload_state_' . $modelName);
        }
        foreach ($this->data[$modelName] as $upload_slot => $upload) {
            if (is_array($upload['file'])) {
                $upload['file_tag'] = $upload_slot;
                if ($upload['file']['error'] == 0) {
                    // Copy the tmp file as a new name to prevent premature deletion.
                    $new_tmp_name = $upload['file']['tmp_name'] . '_1';
                    copy($upload['file']['tmp_name'], $new_tmp_name);
                    $upload['file']['tmp_name'] = $new_tmp_name;
                }
                if (isset($upload_state[$upload_slot]) && is_array($upload_state[$upload_slot])) {
                    if (!isset($upload_state[$upload_slot]['isCommitted'])) {
                        // We have another file that has been uploaded (temp)
                        // Note the previous tmp_name so we can delete it
                        $upload['file']['tmp_name_prev'] = $upload_state[$upload_slot]['file']['tmp_name'];
                    }
                    if (isset($upload_state[$upload_slot]['id'])) {
                        // record the id of the committed file
                        $upload['id'] = $upload_state[$upload_slot]['id'];
                    }
                    if (isset($upload_state[$upload_slot]['origFileName'])) {
                        // record the original uploaded filename of the committed file
                        $upload['origFileName'] = $upload_state[$upload_slot]['origFileName'];
                    }
                }
                $upload_state[$upload_slot] = $upload;
            }
        }
        $this->data[$modelName] = $upload_state;
        $this->Session->write('upload_state_' . $modelName, $upload_state);
    }

    function deleteUploadState($modelName) {
        $this->Session->delete('upload_state_' . $modelName);
    }
	
function sendEmail($distributionList,$emailList_user,$template,$subject){
				/*if($emailList_user == 'empty')
					$emailList_user = "";
				$distributionList = explode(";",$distributionList);				
                                
				App::import('model','DistributionList');
				$DistributionList_model = new DistributionList();
				$dl_ids = $DistributionList_model->find("all",array('conditions'=>array('name'=>$distributionList)));				
				$i=0;				
				foreach($dl_ids as $temp_ids):
					$ids[$i] = $temp_ids['DistributionList']['id'];
					$names[$i] = $temp_ids['DistributionList']['name'];
					$i++;
				endforeach;
					
				App::import('model','EmailList');
				$EmailList_model = new EmailList();
				$user_ids_temp = $EmailList_model->find("all",array('fields' => array('user_id'),'conditions'=>array('dl_id'=>$ids)));
				$j=0;
				foreach($user_ids_temp as $uis):
					$user_ids[$j] = $uis['EmailList']['user_id'];
					$j++;
				endforeach;		
				
				App::import('model','User');
				$User_model = new User();
				$ret = $User_model->find("all",array('fields' => 'email','conditions'=>array('User.id' => $user_ids)));				
				$to_emails = "";
				foreach($ret as $temp):
					$to_emails = $to_emails.$temp['User']['email'].";";
				endforeach;
				
				$self = Authsome::get('email');			
				$to_emails = $to_emails.$emailList_user.";".$self.";";*/
				
				//$this->Email->to = $to_emails;
				$this->Email->to = 'edugarcia@me.com';
				$this->Email->bcc = 'PDLNAMIRTA@ex1.eamcs.ericsson.se';
				$this->Email->replyTo = 'PDLNAMIRTA@ex1.eamcs.ericsson.se';
				$this->Email->return = 'PDLNAMIRTA@ex1.eamcs.ericsson.se';

				$this->Email->subject = $subject;
				$this->Email->from = 'PQR_notification@ericsson.com';
				$this->Email->template = $template;
				$this->Email->sendAs = 'html';
				$this->Email->send();
    }

}

?>
