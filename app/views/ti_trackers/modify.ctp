<html>
    <head>
            <?php echo $html->link("Back",array('action' => 'index') ); ?>
           <h3><u><b>NPI TI Tracker - Modify</b></u></h3>
    </head>
    <body>

        <?php echo $this->Form->create('TiTracker',array('action' => 'modify')); ?> 
        <?php

			$modify_fields = $modify_fields_full['TiTracker'];
                        echo $this->Form->hidden('id', array('value'=>$modify_fields['id']) );
            $Today = date("Y-m-d H:i:s");
            
        ?>
        <span class='freetext'><?php echo "Date : ".$Today; ?></span><br><br>
        <span class='freetext'><?php echo "NPI TI Number : TI".$modify_fields['id']; ?></span>
		
        <?php include_once('modify_engineer_details.inc'); ?>
        <?php include_once('modify_project_information.inc'); ?>
		
	<?php	echo $this->Form->input("email", array( 'label'=>'Email Addresses', 'type'=>'textarea' ) );?>
	<font color='red' size='1'>The email ids have to be separated with a semi-colon(;)</font>
        <fieldset>
		<div class="submit">
                <input name="Email" type="submit" value="Update without Email" />
            </div>
        <?php echo $this->Form->end($options = array('name' => 'Email','label' => 'Update with Email'));   ?>
        </fieldset>
    </body>
</html>