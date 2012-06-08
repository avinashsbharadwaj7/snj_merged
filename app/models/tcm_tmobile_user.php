<?php

class TcmTmobileUser extends AppModel{
    var $name = "TcmTmobileUser";
    var $belongsTo = array(
        'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
    );

    function getAllTcmEngineers()
    {
        $users =null;
        $engineers = $this->find("all");
        foreach ($engineers as $engineer){
                $user = $this->User->read(null, $engineer["TcmTmobileUser"]["user_id"]);
                $user['TcmTmobileUser']['region'] = $engineer['TcmTmobileUser']['region'];
                $user['TcmTmobileUser']['tcm_rights'] = $engineer['TcmTmobileUser']['tcm_rights'];
                $users[] = $user;
            }
             return $users;
    }
    
    function getAllTcmEngineersByRegion($region = null){
        if($region != null && !empty($region)){
            $users = null;
            $engineers = $this->find("all", array("conditions"=>array("TcmTmobileUser.region"=>$region)));
            foreach ($engineers as $engineer){
                $user = $this->User->read(null, $engineer["TcmTmobileUser"]["user_id"]);
                $user['TcmTmobileUser']['region'] = $engineer['TcmTmobileUser']['region'];
                $user['TcmTmobileUser']['tcm_rights'] = $engineer['TcmTmobileUser']['tcm_rights'];
                $users[] = $user;
            }
            return $users;
        }
        return null;
    }
    
    function getTcmLeadsByRegion($region=null)
    {
        if($region != null && !empty($region)){
            $users = null;
            $engineers = $this->find("all", array("conditions"=>array("TcmTmobileUser.region"=>$region,"TcmTmobileUser.tcm_rights"=>array('2','3'),)));
            foreach ($engineers as $engineer){
                $user = $this->User->read(null, $engineer["TcmTmobileUser"]["user_id"]);
                $user['TcmTmobileUser']['region'] = $engineer['TcmTmobileUser']['region'];
                $user['TcmTmobileUser']['tcm_rights'] = $engineer['TcmTmobileUser']['tcm_rights'];
                $users[] = $user;
            }
            return $users;
        }
        return null;
    }
}
?>
