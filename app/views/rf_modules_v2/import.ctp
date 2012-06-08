<?php
/* id: emoibhu
 * name: Moiz Bhukhiya
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if($toDisplay){
    foreach ($toDisplay as $id => $status){
        echo "ID: " . ($status) ? $this->Html->div('ingest_success', $id) : $this->Html->div('ingest_failed', $id);
    }
}
?>

<fieldset>
    <legend><?php __('File Upload');?></legend>
    <?php
        echo $this->Form->create('RfModule', array('type'=>'file'));
        echo $this->Form->input('template_type', array("options"=>array("General", "Post Launch", "Pre Launch")));
        echo $this->Form->input('xlfile',array('type'=>'file', 'label'=>'Upload File'));
        echo $this->Form->submit('Upload');
        echo $this->Form->end();
    ?>
</fieldset>
