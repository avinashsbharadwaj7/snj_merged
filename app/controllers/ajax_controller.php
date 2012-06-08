<?php
class AjaxController extends AppController {
	var $name = 'Ajax';
	var $uses = array('Snjscopeofwork','User','Resource','Mop');

	function beforeRender(){
		parent::beforeRender();
		$this->layout = 'ajax';
	}

	function index(){

	}
        
        public function getResourceName()
        {
            $user_signum =  $this->data['Resource']['user_signum'];
            $list = $this->User->findByusername($user_signum);
            $this->set('resource',$list['User']['first_name']." ".$list['User']['last_name']);
            //$this->set('resource',$user_signum);
        }

        public function getSignumName()
        {
            $user_signum = strtoupper($this->data['Resource']['user_signum']);
            $resList = array("--Select--");
            if($user_signum != "")  
            {
                 $conditions = array("upper(username) LIKE" => $user_signum."%");
                  $list1 = $this->User->find('list', array('conditions' => $conditions, 'fields'=>array('username','username','limit'=>10)));
                  $resList = $resList + $list1;
            }
            $this->set('list',$resList);
          }
                 
         public function getSignumLname()
        {
                  
        $fname=($this->data['User']['first_name']);
        $lname= ($this->data['User']['last_name']);
        
        
          $resList = array("--Select--");
       
         if($fname != "" && $lname != "")  
        {
                    
            $conditions = array('AND'=>array(
                   "first_name" =>  array("first_name LIKE" => $fname."%"),
                   "last_name" => array("last_name LIKE" => $lname."%")));
        }
           
        if($fname == "" && $lname != "")
        {
            $conditions =  array("last_name LIKE" => $lname."%");
          
        }
        
         if($fname != "" && $lname == "")
        {
            $conditions =  array("first_name LIKE" => $fname."%");
          
        }
        
                //$conditions = $condition1.$condition2;
        
         $list2 = $this->User->find('list', array('conditions' => $conditions, 'fields'=>array('username','username')));
          $resList = $resList + $list2;
        // $this->set('list',$resList);
          //$resList = array("Hi there!");
           $this->set('list',$resList);
           
        }
        
        public function getDesignation()
        {
           $user_signum =  $this->data['Resource']['user_signum'];
            $list = $this->User->findByusername($user_signum);
            $this->set('designation',$list['User']['designation']);
         }
         
         public function getMops(){
		$sowid =  $this->data['Job']['Scope_of_work'];
                //print_r("sow".$sowid);
                
                  //  $Newlist = Array();
                 $Newlist[0] = '--Select--';
		$list = $this->Mop->find('list',array(
			'fields' => array('mop_id','mop_name'),
			'conditions' => array('Mop.scope_of_work' => $sowid)));
		
		$resList = array("--Select--") + $list;
                //$resList = array($list[0]);
                
		$this->set('list', $resList);
	}
        
	public function getScopeOfWorks(){
	
		//$sows = array("--Select--") + $this->Snjscopeofwork->getSoooWs($this->data['Job']['Organization']);
		//debug ($sows);
		
		$orgid =  $this->data['Job']['Organization'];
                 $Newlist = Array();
                 //$Newsnlist[0] = '--Select--';
		$list = $this->Snjscopeofwork->find('list',array(
			'fields' => array('idsnj_scope_of_work','snj_sow_description'),
			'conditions' => array('idsnj_dd_fk' => $orgid),
		));
		
		$resList = array("--Select--") + $list;
                
                
		$this->set('list', $resList);
	}
	
	 public function getNodeTypes(){
        $nodeid = $this->data['Job']['Technology'];
		debug ("IN HERE");
		$Newlist = Array ();
				
        $list = $this->SnjScopeOfWork->find('list',array(
			'fields'=>array('idsnj_scope_of_work','snj_sow_description'),
			'conditions'=>array('SnjScopeOfWork.idsnj_dd_fk'=>$nodeid),));
	$resList = array("--Select--") + $list;		
        echo($resList);
       $this->set('list', $resList);
    }

}