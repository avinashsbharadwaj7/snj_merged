<?php 
/*  */
?>

<fieldset>
    
     <h4>File Upload</h4>
     <?php
                echo $this->Form->input('LitfileVerizon.file',array('type'=>'file'));
		echo $this->Form->hidden('LitfileVerizon.file.id');
		echo $this->Form->hidden('LitfileVerizon.file.path');
     ?>
   <font color='red' size='1'>Please compress all the files you need to upload and upload as one file.</font>  
</fieldset>
