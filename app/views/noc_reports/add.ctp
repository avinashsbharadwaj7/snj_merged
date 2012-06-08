<html>
    <head>

           <li><?php echo $html->link("Back",array('action' => 'index') ); ?></li>

           <h3><u><b>NOC Report - Add</b></u></h3>
    </head>
    <body>
        <?php
            echo $this->Form->create('NocReport');       
            $date_created = date("Y-m-d H:i:s");
            
        ?>
        <span class='freetext'><?php echo "Date : ".$date_created; ?></span>
        <?php include_once('add_engineer_details.inc'); ?>
        <?php include_once('add_project_information.inc'); ?>
        <?php include_once('add_activity_information.inc'); ?>
		
		
	
		
        <fieldset>
		<?php	echo $this->Form->input("email", array( 'label'=>'Email Addresses', 'type'=>'textarea' ) );?>
		<font color='red' size='1'>The email ids have to be separated with a semi-colon(;)</font>
		<div class="submit">
                <input name="Email" type="submit" value="Submit without Email" />
        </div>
        <?php //echo $this->Form->end($options = array('name' => 'Email','label' => 'Submit without Email'));   ?>
        <?php echo $this->Form->end($options = array('name' => 'Email','label' => 'Submit with Email'));   ?>
        </fieldset>
    </body>
</html>