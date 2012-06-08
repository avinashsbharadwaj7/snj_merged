<?php
    echo $html->css("lte-lit");
    echo $this->Html->script(array('jquery.js', 'lte_add_modify.js'));
    $signum = Authsome::get('username');
?>
<h2>Upload Record</h2>
<fieldset>
    <legend><?php __('PQR File Upload'); ?></legend>
<?php

    echo $this->Form->create('Pqrfileupload', array('type' => 'file'));
    echo $this->Form->input('Pqrfileupload.date_created', array('id'=>'date',"label"=>"Date", "type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
    echo $this->Form->input('Pqrfileupload.created_by', array('id'=>'created','readonly'=>'readonly', 'value'=>$signum));
    echo $this->Form->input('Pqrfileupload.filetype', array('id'=>'type',"label"=>"File Type", 'type'=>'select', 'options'=>array(" "=>" ", "market"=>"Market Launch NDX", "pre"=>"Prelaunch NDS")));
    
    if((isset($this->data['Irndsfile'][0]['file']['error']) && is_array($this->data['Irndsfile'][0]['file'])) && $this->data['Irndsfile'][0]['file']['error'] == 0)
    {
     echo $this->Form->input('Irndsfile.0.file', array('type'=>'text', 'readonly'=>'readonly', 'label'=>'File Name', 'value'=>$this->data['Irndsfile'][0]['file']['name'], 'after'=>$this->Html->link(__('Change', true), "javascript:void(0)", array('id'=>'upload0Click', 'onClick'=>"showUploader('upload0Click', 'Irndsfile0File', 0, 'Irndsfile'); return false"))));
    }
    else 
    {
     echo $this->Form->input('Irndsfile.0.file', array('type'=>'file', 'label'=>'File Name'));
    }
    echo $this->Form->end($options = array('label' => 'Submit'));
?>
</fieldset>
    
    
    
    
    
    
