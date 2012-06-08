<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class EmailListsController extends AppController {
        
	var $name = 'EmailLists';
        
        public function add()
        {
             if (!empty($this->data)) {
                if ($this->EmaiList->save($this->data)) {
                    $this->Session->setFlash('Your email subscription has been saved.');
                }
                else
                    $this->Session->setFlash('Your email subscription cannot be saved.');
             }
        }
}
?>
