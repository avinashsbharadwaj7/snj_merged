<?php
    echo $html->css("lte-lit");
    echo $this->Html->script(array('jquery.js', 'lte_add_modify.js'));
    $signum = Authsome::get('username');
?>

<li><?php echo $this->Html->link(__('Back', true), array('controller' => 'ir_modules', 'action' => 'index')); ?> </li>
<h2>Bulk Record Upload</h2>

<fieldset>
    <legend><?php __('NDS Excel Upload'); ?></legend>
<?php
    echo $this->Form->create('Uploadexcelrecord', array('type' => 'file'));
    echo $this->Form->input('Uploadexcelrecord.date_created', array("label"=>"Date", "type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
    echo $this->Form->input('Uploadexcelrecord.created_by', array('readonly'=>'readonly', 'value'=>$signum));
    echo $this->Form->input('Uploadexcelrecord.filetype', array("label"=>"File Type", 'type'=>'select', 'options'=>array(" "=>" ", "Market Launch"=>"Market Launch", "Post Activity Check"=>"Post Activity Check")));
    echo "<br>";
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