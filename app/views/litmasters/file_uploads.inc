<?PHP
    $file_count = (isset($this->data['LitfileSupplementary']) && count($this->data['LitfileSupplementary']) > 0) ? count($this->data['LitfileSupplementary']) : 1;
?>

<fieldset>
    <legend><?php __('File Uploads'); ?></legend>
    <div id="uploadBoxHolder">    
        <?php
            for($i = 0; $i < $file_count; $i++) {
                if(isset($this->data['LitfileSupplementary'][$i]['file']['error']) && is_array($this->data['LitfileSupplementary'][$i]['file']) && $this->data['LitfileSupplementary'][$i]['file']['error'] == 0) {
                    if(isset($this->data['LitfileSupplementary'][$i]['origFileName']) && is_array($this->data['LitfileSupplementary'][$i])) {
                        echo $this->Form->input('LitfileSupplementary.' . $i . '.file', array('type'=>'text', 'readonly'=>'readonly', 'label'=>'File', 'value'=>$this->data['LitfileSupplementary'][$i]['file']['name'], 'after'=>$this->Html->link(__('Change', true), "javascript:void(0)", array('id'=>'upload' . $i . 'Click', 'onClick'=>"showUploaderWithUndo('upload" . $i . "Click', 'LitfileSupplementary" . $i . "File', " . $i . ", 'LitfileSupplementary', '" . $this->data['LitfileSupplementary'][$i]['origFileName'] . "'); return false"))));
                    }
                    else {
                        echo $this->Form->input('LitfileSupplementary.' . $i . '.file', array('type'=>'text', 'readonly'=>'readonly', 'label'=>'File', 'value'=>$this->data['LitfileSupplementary'][$i]['file']['name'], 'after'=>$this->Html->link(__('Change', true), "javascript:void(0)", array('id'=>'upload' . $i . 'Click', 'onClick'=>"showUploader('upload" . $i . "Click', 'LitfileSupplementary" . $i . "File', " . $i . ", 'LitfileSupplementary'); return false"))));
                    }
                }
                else {
                    echo $this->Form->input('LitfileSupplementary.' . $i . '.file', array('type'=>'file', 'label'=>'File'));
                }
            }
        ?>
    </div>
    <?PHP
//        echo '[' . $this->Html->link('+', 'javascript:void(0)', array('onClick'=>"triggerUpdaterAppend('uploadBoxHolder', 'litmasters'); return false")) . ']';
    ?>
</fieldset>
