<?php

class DistributionListsController  extends AppController {
        public $name="DistributionLists";
        var $helpers = array('Html', 'Form' );
        
        public $components = array('Session');
	public $uses = array('DistributionList','EmailList','Vieworganization' ,'Viewcustomer','Viewregion','User' );
        
        
        public function index() {   
            
            $signum = Authsome::get('username');
            $Ulist = $this->User->findByusername($signum);
            $UserId = $Ulist['User']['id'];
            $query = "select name from distribution_lists where id in (select dl_id from email_lists where user_id=".$UserId.")";
            $this->set('distributionlists',$this->DistributionList->query($query));
           }
        
        function subscribe()     
        {            
               //action logic goes here..        }
            //$orgs =  array("--Select--") + $this->Vieworganization->getOrgs();
            $orgs =  $this->Vieworganization->getOrgs();
            //$orgs = array("0"=>"--Select--", "1"=>"ALL") + $orgs;
            $this->set("orgs", $orgs);
            
            //$customers = array("--Select--", "ALL") + $this->Viewcustomer->getCustomers();
            $customers = $this->Viewcustomer->getCustomers();
            $this->set("customers", $customers);
            
            //$regions = array("--Select--", "ALL") +  $this->Viewregion->getRegions();
            $regions =  $this->Viewregion->getRegions();
            $this->set("regions", $regions);
            
           
            $dls = array("--Select--") + $this->DistributionList->getLists();
            $this->set("dls", $dls);
            
            if (!empty($this->data)) 
            {
                 
            //get list id
            $dlListName =  $this->data['DistributionList']['name'];  
            $list = $this->DistributionList->findByname($dlListName);
            if(Empty($list))
            {
                print_r("list does not exist");
                if($dlListName != "")
                {
                 $newId= $this->add();
                 $list = $this->DistributionList->findByname($dlListName);
                }
            }
            
            $listId = $list['DistributionList']['id'];
            
            //get userid
            $signum = Authsome::get('username');
            $Ulist = $this->User->findByusername($signum);
            $Uid = $Ulist['User']['id'];
            
            //check if this user subscribed to this list already
            $thisUserList = $this->EmailList->find('first', array('conditions' => array('dl_id' => $listId,'user_id'=>$Uid)));
            //$message = $this->Session->
            if(Empty($thisUserList))
            {
                $this->data['EmailList']['dl_id']=$listId;
                $this->data['EmailList']['user_id']=$Uid;
                $this->EmailList->create();
                $this->EmailList->save($this->data);
                
                $this->Session->setFlash('You have now subscribed to this distribution list: '.$this->data['DistributionList']['uname']);
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                 $this->Session->setFlash('You have already subscribed to this distribution list:'.$this->data['DistributionList']['uname']);
                 $this->redirect(array('action' => 'index'));
            }
            
            }
            
        }
                                   
           
                      
        
         function add()     
        {            //action logic goes here..        }
            
			if ($this->DistributionList->save($this->data))
			{
			 
			  $this->Session->setFlash('This distribution list has been created:');
			 
			}
			else
			{
				$this->Session->setFlash('Erros creating new list:'.$this->data['DistributionList']['name']);
			}
                 
        }
        
        }
?>
