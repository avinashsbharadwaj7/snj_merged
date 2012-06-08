<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<fieldset>
    
     <h4>File Upload</h4>
     <?php
                echo $this->Form->input('TmobileSlfile.file',array('type'=>'file'));
		echo $this->Form->hidden('TmobileSlfile.file.id');
		echo $this->Form->hidden('TmobileSlfile.file.path');
     ?>
   <font color='red' size='1'>Please compress all the files you need to upload and upload just one file.</font>  
</fieldset>
