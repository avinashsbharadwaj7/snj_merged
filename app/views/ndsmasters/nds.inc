<fieldset>
    <legend><?php __('Pre / Post Check'); ?></legend>
<?php
    
    if(isset($this->data['Ndsfile'][0]['file']['error']) && is_array($this->data['Ndsfile'][0]['file']) && $this->data['Ndsfile'][0]['file']['error'] == 0) {
        if(isset($this->data['Ndsfile'][0]['origFileName']) && is_array($this->data['Ndsfile'][0])) {
            echo $this->Form->input('Ndsfile.0.file', array('type'=>'text', 'readonly'=>'readonly', 'label'=>'Pre-Check', 'value'=>$this->data['Ndsfile'][0]['file']['name'], 'after'=>$this->Html->link(__('Change', true), "javascript:void(0)", array('id'=>'upload0Click', 'onClick'=>"showUploaderWithUndo('upload0Click', 'Ndsfile0File', 0, 'Ndsfile', '" . $this->data['Ndsfile'][0]['origFileName'] . "'); return false"))));
        }
        else {
            echo $this->Form->input('Ndsfile.0.file', array('type'=>'text', 'readonly'=>'readonly', 'label'=>'Pre-Check', 'value'=>$this->data['Ndsfile'][0]['file']['name'], 'after'=>$this->Html->link(__('Change', true), "javascript:void(0)", array('id'=>'upload0Click', 'onClick'=>"showUploader('upload0Click', 'Ndsfile0File', 0, 'Ndsfile'); return false"))));
        }
    }
    else {
        echo $this->Form->input('Ndsfile.0.file', array('type'=>'file', 'label'=>'Pre-Check'));
    }
    
    if(isset($this->data['Ndsfile'][1]['file']['error']) && is_array($this->data['Ndsfile'][1]['file']) && $this->data['Ndsfile'][1]['file']['error'] == 0) {
        if(isset($this->data['Ndsfile'][1]['origFileName']) && is_array($this->data['Ndsfile'][1])) {
            echo $this->Form->input('Ndsfile.1.file', array('type'=>'text', 'readonly'=>'readonly', 'label'=>'Post-Check', 'value'=>$this->data['Ndsfile'][1]['file']['name'], 'after'=>$this->Html->link(__('Change', true), "javascript:void(0)", array('id'=>'upload1Click', 'onClick'=>"showUploaderWithUndo('upload1Click', 'Ndsfile1File', 1, 'Ndsfile', '" . $this->data['Ndsfile'][1]['origFileName'] . "'); return false"))));
        }
        else {
            echo $this->Form->input('Ndsfile.1.file', array('type'=>'text', 'readonly'=>'readonly', 'label'=>'Post-Check', 'value'=>$this->data['Ndsfile'][1]['file']['name'], 'after'=>$this->Html->link(__('Change', true), 'javascript:void(0)', array('id'=>'upload1Click', 'onClick'=>"showUploader('upload1Click', 'Ndsfile1File', 1, 'Ndsfile'); return false"))));
        }
    }
    else {
        echo $this->Form->input('Ndsfile.1.file', array('type'=>'file', 'label'=>'Post-Check'));
    }
?>
</fieldset>
