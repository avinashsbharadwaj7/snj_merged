<?php
class ReportsController extends AppController {
    
	var $name = 'Reports';
	var $uses = array('Report','IrModule','Dropdown','Slmaster');
        var $helpers = array('Html', 'Session', 'Form', 'Js', 'DatePicker','Paginator');
        var $components = array('Session', 'Email', 'RequestHandler');
        var $paginate = array(
            'IrModule'    => array(
                'limit'    => 20,
                'page'    => 1,
                'order'    => array(
                'IrModule.id'    => 'asc')
            ),
            'Slmaster'    => array(
                'limit'    => 20,
                'page'    => 1,
                'order'    => array(
                'Slmaster.id'    => 'asc')
            ),
        );

        //**************************************Excel************************************************

        //**************************************IR***************************************************

        function irform()
        {
            $this->loadModel('Dropdown');
            $this->set("dropdown_fields", $this->Dropdown->find("all",array('fields'=>array('field','value') ,'order' => array('weight ASC','value'), "conditions"=>array("module_id"=>"1"))));
        }


        function irconds()
        {
                 if ( isset( $this->passedArgs['search'] ) )
                   {
                        $this->passedArgs = str_replace("x", "%", $this->passedArgs);
                        if($this->passedArgs['search'] == "Y")
                        {
                            $yr = $this->passedArgs['year'];
                            $cond = array("customer LIKE "=>$this->passedArgs['customer'], "region LIKE "=>$this->passedArgs['region'], "activity_type LIKE "=>$this->passedArgs['activity'], "engineer_work_location LIKE "=>$this->passedArgs['work_location'], "mop_used LIKE "=>$this->passedArgs['MOP_Used'], "substr(date_activity_performed,3,2)"=>substr($yr,2,2));
                        }
                        else if($this->passedArgs['search'] == "D")
                        {
                            $cond = array("customer LIKE "=>$this->passedArgs['customer'], "region LIKE "=>$this->passedArgs['region'], "activity_type LIKE "=>$this->passedArgs['activity'], "engineer_work_location LIKE "=>$this->passedArgs['work_location'], "mop_used LIKE "=>$this->passedArgs['MOP_Used'], "STR_TO_DATE(date_activity_performed, '%m/%d/%y') BETWEEN ? AND ?"=>array($this->passedArgs['From'],$this->passedArgs['To']));
                        }
                   }
                   elseif ( isset( $this->params['url']) )
                   {
                        if($this->params['url']['search'] == "Y")
                        {
                            $yr = $this->params['url']['year'];
                            $cond = array("customer LIKE "=>$this->params['url']['customer'], "region LIKE "=>$this->params['url']['region'], "activity_type LIKE "=>$this->params['url']['activity'], "engineer_work_location LIKE "=>$this->params['url']['work_location'], "mop_used LIKE "=>$this->params['url']['MOP_Used'], "substr(date_activity_performed,3,2)"=>substr($yr,2,2));
                       }
                        else if($this->params['url']['search'] == "D")
                        {
                            $cond = array("customer LIKE "=>$this->params['url']['customer'], "region LIKE "=>$this->params['url']['region'], "activity_type LIKE "=>$this->params['url']['activity'], "engineer_work_location LIKE "=>$this->params['url']['work_location'], "mop_used LIKE "=>$this->params['url']['MOP_Used'], "STR_TO_DATE(date_activity_performed, '%m/%d/%y') BETWEEN ? AND ?"=>array($this->params['url']['From'],$this->params['url']['To']));
                        }
                   }
                return $cond;
        }
        
	function ir()
	{
                  $condition = $this->irconds();
                  $data = $this->paginate('IrModule',$condition);
                  $this->set('srmasters', $data);	
                  $this->Session->write('cond',$condition);
				
        }
	
	function irexcel()
	{
	
		  /*$options['joins'] = array(
								array(
									'table' => 'ir_issues',
									'alias' => 'IrIssues',
									'type' => 'inner',
									'conditions'=> array('IrIssues.ir_module_id = IrModule.id')
								)
					);
				  
				 $temp =  $this->IrModule->find('all',$options);
				 var_dump($temp);
				 $this->set("row",$temp);*/

                
                ini_set('memory_limit', '-1');
                $cond = $this->Session->read("cond");
		$this->layout = 'ajax';
		$results = $this->IrModule->find('all',array("conditions"=>$cond));
                $this->set("row", $results);
		//var $helpers = array('Excel' => array($results));
		//loadHelper('Excel');
		//var_dump($helpers);
	}

   


        //*******************************************************************************************



        //******************************************CSR**************************************************


        function csrform()
        {
            //$this->loadModel('Dropdown');
            //$this->set("dropdown_fields", $this->Dropdown->find("all",array('fields'=>array('field','value') ,'order' => array('weight ASC','value'), "conditions"=>array("module_id"=>"1"))));
        }


        function csrconds()
        {
                 if ( isset( $this->passedArgs['search'] ) )
                   {
                        if($this->passedArgs['Network_Number'] == "")
                            $this->passedArgs['Network_Number'] = '%';
                        if($this->passedArgs['Engineer_Signum'] == "")
                            $this->passedArgs['Engineer_Signum'] = '%';
                        
                        if($this->passedArgs['search'] == "Y")
                        {
                            $yr = $this->passedArgs['year'];
                            $cond = array("CSR_Project_Network_number LIKE "=>$this->passedArgs['Network_Number'], "CSR_signum LIKE "=>$this->passedArgs['Engineer_Signum'], "substr(CSRDateinit,7)"=>substr($yr,2,2));
                        }
                        else if($this->passedArgs['search'] == "D")
                        {
                            $cond = array("CSR_Project_Network_number LIKE "=>$this->passedArgs['Network_Number'], "CSR_signum LIKE "=>$this->passedArgs['Engineer_Signum'], "STR_TO_DATE(CSRDateinit, '%m/%d/%y') BETWEEN ? AND ?"=>array($this->passedArgs['From'],$this->passedArgs['To']));
                        }
                   }
                   elseif ( isset( $this->params['url']) )
                   {
                        if($this->params['url']['Network_Number'] == "")
                            $this->params['url']['Network_Number'] = '%';
                        if($this->params['url']['Engineer_Signum'] == "")
                            $this->params['url']['Engineer_Signum'] = '%';
                        
                        if($this->params['url']['search'] == "Y")
                        {
                            $yr = $this->params['url']['year'];
                            $cond = array("CSR_Project_Network_number LIKE "=>$this->params['url']['Network_Number'], "CSR_signum LIKE "=>$this->params['url']['Engineer_Signum'], "substr(CSRDateinit,7)"=>substr($yr,2,2));
                       }
                        else if($this->params['url']['search'] == "D")
                        {
                            $cond = array("CSR_Project_Network_number LIKE "=>$this->params['url']['Network_Number'], "CSR_signum LIKE "=>$this->params['url']['Engineer_Signum'], "STR_TO_DATE(CSRDateinit, '%m/%d/%y') BETWEEN ? AND ?"=>array($this->params['url']['From'],$this->params['url']['To']));
                        }
                   }
                return $cond;
        }

	function csr()
	{
                  $condition = $this->csrconds();
                  $data = $this->paginate('Csrmaster',$condition);
                  $this->set('csrmasters', $data);
        }

        function csrexcel()
	{
                ini_set('memory_limit','1024M');
                $this->layout = 'ajax';
                $condition = $this->csrconds();
                echo $condition;
                $this->set("csrmasters", $this->Csrmaster->find("all",$condition));
	}


        //***********************************************************************************************



         //******************************************SL**************************************************


        function slform()
        {
            $this->loadModel('Dropdown');
            $this->set("dropdown_fields", $this->Dropdown->find("all",array('order' => array('weight ASC','value'), "conditions"=>array("module_id"=>"2"))));
        }


        function slconds()
        {                
                 if ( !empty($this->data ) )
                   {
                        $this->data = $this->data['Report'];
                        $iss_arr;
                        if($this->data['issues'] == "Y")
                            $iss_arr = array("Successful with issues - Follow-up Required","Ongoing","Canceled/Rescheduled");
                        else
                            $iss_arr = array("Successful");
                        if($this->data['search'] == "Y")
                        {                           
                            $yr = $this->data['year'];
                            $cond = array("customer LIKE "=>$this->data['customer'], "region LIKE "=>$this->data['region'], "mop_used LIKE "=>$this->data['MOP Used'],"work_location LIKE "=>$this->data['work_location'],"activity_type LIKE "=>$this->data['activity_type'],"OR"=>array("activity_result" => $iss_arr),"slr_report_status LIKE "=>$this->data['closed'], "substr(date_activity_performed,3,2)"=>substr($yr,2,2));
                        }
                        else if($this->data['search'] == "D")
                        {                            
                            $cond = array("customer LIKE "=>$this->data['customer'], "region LIKE "=>$this->data['region'], "mop_used LIKE "=>$this->data['MOP Used'],"work_location LIKE "=>$this->data['work_location'],"activity_type LIKE "=>$this->data['activity_type'],"OR"=>array("activity_result" => $iss_arr),"slr_report_status LIKE "=>$this->data['closed'], "STR_TO_DATE(date_activity_performed, '%Y-%m-%d') BETWEEN ? AND ?"=>array($this->data['From'],$this->data['To']));
                        }
                        $this->Session->write('cond',$cond);
                   }
        }

	function sl()
	{
                $this->slconds();
                $cond = $this->Session->read("cond");
                $data = $this->paginate('Slmaster',$cond);
                $this->set('slmasters', $data);                 
        }

        function slexcel()
	{
                ini_set('memory_limit','-1');
                $this->layout = 'ajax';
                $cond = $this->Session->read("cond");
                $this->set("row", $this->Slmaster->find("all",array('conditions' => $cond)));
	}


        //***********************************************************************************************

	
}
?>