<fieldset>
    <legend><?php __('Site Records'); ?></legend>
<?php
    
    if(isset($this->data['Siadfile'][3]['file']['error']) && is_array($this->data['Siadfile'][3]['file']) && $this->data['Siadfile'][3]['file']['error'] == 0) {
        if(isset($this->data['Siadfile'][3]['origFileName']) && is_array($this->data['Siadfile'][3])) {
            echo $this->Form->input('Siadfile.3.file', array('type'=>'text', 'readonly'=>'readonly', 'label'=>'File', 'value'=>$this->data['Siadfile'][3]['file']['name'], 'after'=>$this->Html->link(__('Change', true), "javascript:void(0)", array('id'=>'upload3Click', 'onClick'=>"showUploaderWithUndo('upload3Click', 'Siadfile3File', 3, 'Siadfile', '" . $this->data['Siadfile'][3]['origFileName'] . "'); return false"))));
        }
        else {
            echo $this->Form->input('Siadfile.3.file', array('type'=>'text', 'readonly'=>'readonly', 'label'=>'File', 'value'=>$this->data['Siadfile'][3]['file']['name'], 'after'=>$this->Html->link(__('Change', true), "javascript:void(0)", array('id'=>'upload3Click', 'onClick'=>"showUploader('upload3Click', 'Siadfile3File', 3, 'Siadfile'); return false"))));
        }
    }
    else {
        echo $this->Form->input('Siadfile.3.file', array('type'=>'file', 'label'=>'File'));
    }
?>
</fieldset>
