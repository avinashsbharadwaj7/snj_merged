<?php
class SnjsController extends AppController {
    
  var $name = 'Snjs';   
  var $helpers = array('Html','Session','Ajax');        
  public $uses = array('Groupid');
  
  
            
  function snjcall()
  {
                
  }
            
  public function beforeFilter()
  {
      $this->set('pmgroupid', $this->Groupid->getGroupID(Groupid::PM_GROUP));
      $this->set('lmgroupid', $this->Groupid->getGroupID(Groupid::LM_GROUP));
      $this->set('enggroupid', $this->Groupid->getGroupID(Groupid::ENG_GROUP));
  }
}

?>
