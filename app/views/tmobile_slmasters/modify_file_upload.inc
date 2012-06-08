<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php  if($check==false){ ?>
<fieldset>
    
     <h4>File Upload</h4>
     <?php
                echo $this->Form->input('TmobileSlfile.file',array('type'=>'file'));
		echo $this->Form->hidden('TmobileSlfile.file.id');
		echo $this->Form->hidden('TmobileSlfile.file.path');
     ?>
   <font color='red' size='1'>Your previous upload will be deleted.</font>  
</fieldset>
<?php } ?>

<fieldset>

    <h4>Files Attached</h4>
    <?php
    $filedata = $modify_fields_full['TmobileSlfile'];
    if(isset($filedata['file_name'])){
    if (($filedata['file_name']) != "") { ?>
        <font color='blue'><b><?php echo $filedata['file_name']." - "; ?></b></font>
        <?php echo $this->Html->link(__('Download File', true), array('action' => 'download', $modify_fields_full['TmobileSlmaster']['id'])); ?>
        <br/>
    <?php }}
    ?>
    <div style="clear: both;"></div>
</fieldset>
