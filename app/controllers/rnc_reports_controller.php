<?php
class RncReportsController extends AppController {

	var $name = 'RncReports';
        var $components = array('RequestHandler', 'Email');
        var $helpers = array('Html','Form','RncDatabaseFields', 'Javascript', 'Ajax', 'Logs');
        var $uses = array('RncReport');

        function  beforeFilter() {
            parent::beforeFilter();
            $this->layout = "rnc";
        }
        
	function index(){
            
        }
        
        function listAll() {
                $this->paginate = array('limit' => 25);
		$this->RncReport->recursive = 0;
		$this->set('rncReports', $this->paginate());
	}

        function listMyReports(){
            $username = Authsome::get("username");
            $this->paginate = array('conditions' => array('RncReport.engineer_signum' => $username), 'limit' => 25);
            $this->RncReport->recursive = 0;
            $this->set('rncReports', $this->paginate());
            $this->render("list_all");
        }

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid report', true));
			$this->redirect(array('action' => 'index'));
		}
		$report_id = $this->RncReport->field('id', array('report_number'=>$id), 'version DESC');
                $this->data = $this->RncReport->read(null, $report_id);
                if(empty($this->data)){
                	$this->Session->setFlash(__('Invalid report', true));
			$this->redirect(array('action' => 'index'));
                }
                $this->set("readyForQa", ($this->data['RncReport']['status'] == "Completed") ? true: false);
                $this->__computeData();
                $this->__setVariables($report_id);
                include_once APP.'views'.DS.'elements'.DS.'rnc_stuff'.DS.'rnc_fields.ctp';
                $this->set(compact("rncFields"));
                $this->set("groups", $this->__getMap());
	}

	function add() {
                $this->set("readyForQa", false);
                if (empty($this->data)) {
                    $this->__setVariables();
                }
                if (!empty($this->data) && $this->RequestHandler->isAjax()) {
                    configure::write('debug', 0);
                    $this->layout = 'ajax';
                    $this->autoRender = false;
                    $response = null;
                    $this->__checkReportNumber();
                    $this->RncReport->create();
                    if ($this->RncReport->save($this->data)) {
                            $response = array(
                                    'error'=> 0,
                                    'message' => (__('The report has been saved', true)),
                                    'id' => $this->RncReport->id,
                                    'report_number' => $this->data['RncReport']['report_number']
                             );
                            return json_encode($response);
                    } else {
                            $response = array(
                                    'error'=> 1,
                                    'message' => (__('The report could not be saved. Please, try again.', true))
                             );
                            $response['data']['RncReport'] = $this->RncReport->invalidFields();
                            return json_encode($response);
                    }
		}
	}
        
	function edit($id = null) {
            $this->set('hasId', (!$id)? true:false);
            $this->set("readyForQa", false);
            $this->__showMyReports();
            if (!$id && !empty($this->data['RncReport']['editId'])) {
                $this->redirect(array('action' => 'edit', $this->data['RncReport']['editId']));                
            }
            if(empty($this->data) && !empty($id)) {
                $report_id = $this->RncReport->field('id', array('report_number'=>$id), 'version DESC');
                if($report_id != false){
                    $this->data = $this->RncReport->read(null, $report_id);
                    if(!empty($this->data)){
                        if($this->data['RncReport']['status'] == "Completed"){
                            $this->set("readyForQa", true);
                        }
                        $this->__computeData();
                        $this->__setVariables($report_id);
                        $this->render('add');
                    }
                }
                if (empty($this->data)) {
                    $this->Session->setFlash(__('Invalid report id'.$id, true));
                    $this->redirect(array('action' => 'edit'));
                }
            }
	}
	
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for report', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->RncReport->delete($id)) {
			$this->Session->setFlash(__('Report deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Report was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

        function graphicalOverview(){
            
        }

        function getGroupData($report_id = null){
            $this->autoRender = false;
            configure::write('debug', 0);
            if($report_id == "NYA"){
                return json_encode(FALSE);
            }
            $this->data = $this->RncReport->read(null, $report_id);
            $this->__computeData();
            $returnJson = $this->__processOverviewData();
            $returnJson = $this->__processForChart($returnJson);
            return json_encode($returnJson);
        }

        function __processForChart($inputJson=null){
            $map = $this->__getMap();
            $totalSteps = $this->__getNumberOfSteps();
            $outputJson = null;
            foreach($inputJson as $key => $group){
                if(preg_match("/Group$/", $key) > 0){
                    $outputJson["yes"][$map[$key]] = $group["yes"] === "NA" ? 0 : $group["yes"];
                    $outputJson["no"][$map[$key]] = $group["no"] === "NA" ? 0 : $group["no"];
                    $outputJson["na"][$map[$key]] = $group["na"] === "NA" ? 0 : $group["na"];
                    $outputJson["noAnswer"][$map[$key]] = $totalSteps[$map[$key]] - $outputJson["yes"][$map[$key]] - $outputJson["no"][$map[$key]] - $outputJson["na"][$map[$key]];
                }
            }
            ksort($outputJson["yes"]);ksort($outputJson["no"]);ksort($outputJson["na"]);ksort($outputJson["noAnswer"]);
            return $outputJson;
        }

        function getChartData(){
            $returnJson = null;
            $regions = array('North Central', 'South Central', 'North East', 'South East', 'North West', 'South West');
            foreach($regions as $region){
                $returnJson['started'][] = $this->RncReport->find('count', array("conditions"=> array("RncReport.region"=>$region, "RncReport.status"=>"Started")));
                $returnJson['inProgress'][] = $this->RncReport->find('count', array("conditions"=> array("RncReport.region"=>$region, "RncReport.status"=>"In Progress")));
                $returnJson['onHold'][] = $this->RncReport->find('count', array("conditions"=> array("RncReport.region"=>$region, "RncReport.status"=>"on Hold")));
                $returnJson['completed'][] = $this->RncReport->find('count', array("conditions"=> array("RncReport.region"=>$region, "RncReport.status"=>"Completed")));
                $returnJson['cannotComplete'][] = $this->RncReport->find('count', array("conditions"=> array("RncReport.region"=>$region, "RncReport.status"=>"Cannot Complete")));
            }
            $this->autoRender = false;
            configure::write('debug', 0);
            return json_encode($returnJson);
        }

        function qaPool(){
            $this->paginate = array('conditions' => array('RncReport.status' => "Completed", "RncReport.qa_status"=>NULL, "RncReport.qa_engineer_signum"=>NULL), 'limit' => 25);
            $this->RncReport->recursive = 0;
            $this->set('rncReports', $this->paginate());
        }

        function myQaPool(){
            $username = Authsome::get("username");
            $this->paginate = array('conditions' => array('RncReport.status' => "Completed", "RncReport.qa_engineer_signum"=>$username), 'limit' => 25);
            $this->RncReport->recursive = 0;
            $this->set('rncReports', $this->paginate());
            $this->render("qa_pool");
        }

        function __checkReportNumber(){
            if($this->data['RncReport']['report_number'] === "NYA")
                $this->data['RncReport']['report_number'] = $this->RncReport->getNextReportNumber();
        }

        function __setVariables($report_id = null){
            //$allColumns = $this->__processOverviewData();
            $thisData = $this->data;
            $yn = array("Yes"=>"Yes","No"=>"No");
            $_yn = array(""=>"", "Yes"=>"Yes", "No"=>"No");
            $ny = array("No"=>"No","Yes"=>"Yes");
            $nyn = array("No"=>"No","Yes"=>"Yes", "NA"=>"NA");
            $_nyn = array(""=>"","No"=>"No","Yes"=>"Yes", "NA"=>"NA");
            $report_id = (!$report_id) ? "NYA" : $report_id;
            $report_number = (!$this->data['RncReport']['report_number']) ? "NYA" : $this->data['RncReport']['report_number'];
            $this->set(compact("yn",'_yn','ny','nyn','_nyn', "thisData", "report_id", "report_number"));
        }

        function __computeData(){
            $data = $this->data;
            foreach ($data as $key => $group){
                if(preg_match("/Group$|Qa$/", $key) > 0){
                    $count = count($group);
                    if($count > 0){
                        $data[$key] = $group[$count-1];
                    }
                }
            }
            $this->data = $data;
        }

        function __processOverviewData(){
            $data = $this->data;
            if(empty($data))
                return null;
            foreach($data as $key => $table){
                if(preg_match("/Group$|Qa$/", $key) > 0){
                    if(empty($table)){
                        $ret[$key]['status'] = "Not Started";
                        $ret[$key]['date_completed'] = "NA";
                        $ret[$key]['yes'] = "NA";
                        $ret[$key]['no'] = "NA";
                        $ret[$key]['na'] = "NA";
                        continue;
                    }
                    $isComplete = true;
                    $yes = $no = $na = 0;
                    foreach($table as $attr => $row){
                        if(preg_match("/_notes$/", $attr) > 0){
                            $f = preg_replace("/_notes$/", "", $attr);
                            if(empty($table[$f]) || $table[$f] == ""){
                                $isComplete = false;
                            }
                            if($table[$f] == "Yes"){
                                $yes++;
                            }
                            if($table[$f] == "No"){
                                $no++;
                            }
                            if($table[$f] == "NA"){
                                $na++;
                            }
                        }
                    }
                    $ret[$key]['status'] = ($isComplete) ? "Completed" : "Not Completed";
                    $ret[$key]['date_completed'] = $data[$key]['date'];
                    $ret[$key]['yes'] = $yes;
                    $ret[$key]['no'] = $no;
                    $ret[$key]['na'] = $na;
                }
            }
            return $ret;
        }

        function __showMyReports(){
            $username = Authsome::get("username");
            $myReports = $this->RncReport->find('all', array("conditions"=>array("engineer_signum"=>$username)));
            $this->set(compact("myReports"));
        }

        function __getMap(){
            return array(
                "FirstGroup" => 0,"SecondGroup" => 1,"ThirdGroup" => 2,"FourthGroup" => 3,"FifthGroup" => 4,
                "SixthGroup" => 5, "SeventhGroup" => 6, "EighthGroup" => 7, "NinthGroup" => 8, "TenthGroup" => 9,
                "EleventhGroup" => 10, "FirstQa" => 11, "SecondQa" => 12, "ThirdQa" =>13, "FourthQa" => 14
            );
        }

        function __getNumberOfSteps(){
            return array(20, 13, 20, 4, 11, 13, 10, 6, 14, 8, 25, 30, 22, 4, 5);
        }

        function requestEmail($id = null){
            if(!$id || empty($id)){
                return false;
            }
            $this->autoRender = false;
            configure::write('debug', 2);
            App::import('model','EmailList');
            $emailList = new EmailList();
            $list = $emailList->DistributionList->find("all", array("conditions" => array("DistributionList.name"=> array("RNC", "management"))));
            $emails = array();
            foreach($list as $row){
                $row = $row["EmailList"];
                $emails = array_merge($emails, $row);
            }
            App::import('model','User');
            $user = new User();
            $to = array();
            foreach($emails as $value){
                $to[] = $user->field("email", array('id' => $value["user_id"]));
            }
            $emailsFromForm = explode(";", $this->data["RncEmail"]["email_list"]);
            $to = array_merge($to, $emailsFromForm);
            $to[] = Authsome::get("email");
            $to = array_unique($to);
            $to = array_filter($to);
            $to = implode(";",$to);
            $report_id = $id;
            $this->data = $this->RncReport->read(null, $report_id);
            if(empty($this->data)){
                    $this->Session->setFlash(__('Invalid report', true));
                    $this->redirect(array('action' => 'index'));
            }
            $this->set("readyForQa", ($this->data['RncReport']['status'] == "Completed") ? true: false);
            $this->__computeData();
            $this->__setVariables($report_id);
            include_once APP.'views'.DS.'elements'.DS.'rnc_stuff'.DS.'rnc_fields.ctp';
            $this->set(compact("rncFields"));
            $this->set("groups", $this->__getMap());
            $from = 'PQR RNC Admin<RNC.Noticication.Do.Not.Reply@pqr.ericsson.com>';
            $this->__sendEmail($to, $from, "RNC Report #".$this->data['RncReport']["report_number"], "rnc_report");
            $response = array(
                'error'=> 0,
                'message' => (__('The email is on its way...', true)),
                'debug' => $to);
            return json_encode($response);
        }

        function __sendEmail($to, $from, $subject, $element){
            $this->Email->from = $from;
            $this->Email->to = $to;
            $this->Email->subject = $subject;
            $this->Email->template = $element;
            $this->Email->sendAs = 'html';
            $this->Email->send();
        }
}
?>