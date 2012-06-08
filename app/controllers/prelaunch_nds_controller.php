<?php

Class Prelaunch_ndsController extends AppController
{
    var $name = 'Prelaunch_nds';
    var $helpers = array('Html', 'Form', 'Javascript', 'DatabaseFields', 'Ajax', 'ShowFields', 'DatePicker');
    var $components = array('Session');  
    var $uses  =array('Prelaunch_nd'); 
    
   function parse($fileID)
    {
     
}
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
