<fieldset>
    <h4>Project Information</h4>

	<?php
	echo $this->Form->input("title", array( 'label'=>'Title','type'=>'textarea' ) );   
	echo $this->Form->input("project", array( 'label'=>'Project','type'=>'textarea' ) ); 
	echo $this->Form->input("description", array( 'label'=>'Description','type'=>'textarea' ) );   
	echo $this->Form->input("link", array( 'label'=>'Link','type'=>'textarea' ) );      
	
    ?>
</fieldset>