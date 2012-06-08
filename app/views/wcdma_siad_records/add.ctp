<?php
    echo $html->css("lte-lit");   
    $signum = Authsome::get('username');
?>
<li><?php echo $this->Html->link(__('Back', true), array('controller' => 'wcdma_siad_records', 'action' => 'index')); ?> </li>
<h2>WCDMA - SIAD Support</h2>

<fieldset>
    <legend><?php __('WCDMA-SIAD Excel Upload'); ?></legend>
<?php
    echo $this->Form->create('WcdmaSiadRecord', array('type' => 'file'));
    echo $this->Form->input('WcdmaSiadRecord.date_created', array("label"=>"Date", "type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
    echo $this->Form->input('WcdmaSiadRecord.created_by', array('readonly'=>'readonly', 'value'=>$signum));     
    echo "<br>";
    if((isset($this->data['WcdmaSiadFile'][0]['file']['error']) && is_array($this->data['WcdmaSiadFile'][0]['file'])) && $this->data['WcdmaSiadFile'][0]['file']['error'] == 0)
    {
     echo $this->Form->input('WcdmaSiadFile.0.file', array('type'=>'text', 'readonly'=>'readonly', 'label'=>'File Name', 'value'=>$this->data['WcdmaSiadFile'][0]['file']['name'], 'after'=>$this->Html->link(__('Change', true), "javascript:void(0)", array('id'=>'upload0Click', 'onClick'=>"showUploader('upload0Click', 'WcdmaSiadFile0File', 0, 'WcdmaSiadFile'); return false"))));
    }
    else 
    {
     echo $this->Form->input('WcdmaSiadFile.0.file', array('type'=>'file', 'label'=>'File Name'));
    }
    echo $this->Form->end($options = array('label' => 'Submit'));

?>
</fieldset>