<?php
    echo $html->css("lte-lit");
    echo $this->Html->script(array('jquery.js', 'lte_add_modify.js'));
    $signum = Authsome::get('username');
?>

<li><?php echo $this->Html->link(__('Back', true), array('controller' => 'litmasters', 'action' => 'index')); ?> </li>
<h2>Bulk Record Upload</h2>

<fieldset>
    <legend><?php __('Excel Spreadsheet Input'); ?></legend>
<?php
    echo $this->Form->create('BulkLteRecord', array('type' => 'file'));
    echo $this->Form->input('BulkLteRecord.date_created', array("label"=>"Date", "type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
    echo $this->Form->input('BulkLteRecord.created_by', array('readonly'=>'readonly', 'value'=>$signum));
    if(isset($this->data['BulkLteFile'][0]['file']['error']) && is_array($this->data['BulkLteFile'][0]['file']) && $this->data['BulkLteFile'][0]['file']['error'] == 0) {
        if(isset($this->data['BulkLteFile'][0]['origFileName']) && is_array($this->data['BulkLteFile'][0])) {
            echo $this->Form->input('BulkLteFile.0.file', array('type'=>'text', 'readonly'=>'readonly', 'label'=>'File Upload', 'value'=>$this->data['BulkLteFile'][0]['file']['name'], 'after'=>$this->Html->link(__('Change', true), "javascript:void(0)", array('id'=>'upload0Click', 'onClick'=>"showUploaderWithUndo('upload0Click', 'BulkLteFile0File', 0, 'BulkLteFile', '" . $this->data['BulkLteFile'][0]['origFileName'] . "'); return false"))));
        }
        else {
            echo $this->Form->input('BulkLteFile.0.file', array('type'=>'text', 'readonly'=>'readonly', 'label'=>'File Upload', 'value'=>$this->data['BulkLteFile'][0]['file']['name'], 'after'=>$this->Html->link(__('Change', true), "javascript:void(0)", array('id'=>'upload0Click', 'onClick'=>"showUploader('upload0Click', 'BulkLteFile0File', 0, 'BulkLteFile'); return false"))));
        }
    }
    else {
        echo $this->Form->input('BulkLteFile.0.file', array('type'=>'file', 'label'=>'File Upload'));
    }
    echo $this->Form->end($options = array('name' => 'Email','id' => 'submitEmail', 'label' => 'Submit'));
?>
    <div id="workingPlaceholder" style="width:0px;"></div>
</fieldset>

<?PHP
    echo $this->Html->script(array('lte_bindings.js'));
?>