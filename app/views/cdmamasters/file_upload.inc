
<fieldset>
    
     <h4>File Upload</h4>
     <?php
   
   
   if((isset($this->data['Cdmafile'][0]['file']['error']) && is_array($this->data['Cdmafile'][0]['file'])) && $this->data['Cdmafile'][0]['file']['error'] == 0)
   {
    echo $this->Form->input('Cdmafile.0.file', array('type'=>'text', 'readonly'=>'readonly', 'label'=>'File Name', 'value'=>$this->data['Cdmafile'][0]['file']['name'], 'after'=>$this->Html->link(__('Change', true), "javascript:void(0)", array('id'=>'upload0Click', 'onClick'=>"showUploader('upload0Click', 'Cdmafile0File', 0, 'Cdmafile'); return false"))));
   }
   else 
   {
    echo $this->Form->input('Cdmafile.0.file', array('type'=>'file', 'label'=>'File Name'));
   }
        
     ?>
     
</fieldset>
