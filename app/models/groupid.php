<?php
class Groupid extends AppModel {
    public $name = 'Groupid';
    var $useTable = false;
    
    const PM_GROUP  = 1;
    const LM_GROUP  = 2;
    const ENG_GROUP = 3;
    
    private static $PM_GROUP_ID = 10021;
    private static $LM_GROUP_ID = 35024;
    private static $ENG_GROUP_ID = 20001;
    private static $UNKNOWN_GROUP_ID = 0;
    
    static function getGroupID($groupName)
    {
       $ret = self::$UNKNOWN_GROUP_ID;
        
       switch ($groupName) 
       {
           case self::PM_GROUP:
               $ret  = self::$PM_GROUP_ID;
               break;
               
           case self::LM_GROUP:
               $ret  = self::$LM_GROUP_ID;
               break;
               
           case self::ENG_GROUP:
               $ret  = self::$ENG_GROUP_ID;
               break;
       }
       return $ret;
    }
}


