<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<fieldset>
    
     <h4>File Upload</h4>
     <?php
   
   
   if((isset($this->data['Csrfile'][0]['file']['error']) && is_array($this->data['Csrfile'][0]['file'])) && $this->data['Csrfile'][0]['file']['error'] == 0)
   {
    echo $this->Form->input('Csrfile.0.file', array('type'=>'text', 'readonly'=>'readonly', 'label'=>'File Name', 'value'=>$this->data['Csrfile'][0]['file']['name'], 'after'=>$this->Html->link(__('Change', true), "javascript:void(0)", array('id'=>'upload0Click', 'onClick'=>"showUploader('upload0Click', 'Csrfile0File', 0, 'Csrfile'); return false"))));
   }
   else 
   {
    echo $this->Form->input('Csrfile.0.file', array('type'=>'file', 'label'=>'File Name'));
   }
        
     ?>
     
</fieldset>
