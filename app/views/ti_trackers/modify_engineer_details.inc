<fieldset>
    <h4>Engineer Details</h4>
    <?php
    
    echo $this->Form->input("signum", array( 'READONLY' => true,'value' => $modify_fields['signum'],'label'=>'Engineer Signum', 'type'=>'text' ) );
    echo $this->Form->input("name", array( 'READONLY' => true, 'value' => $modify_fields['name'],'label'=>'Engineer Name', 'type'=>'text' ) );
	
	?>
</fieldset>