<html>
    <head>

           <li><?php echo $html->link("Back",array('action' => 'preadd') ); ?></li>

           <h3><u><b>Script Load Reporting - Add</b></u></h3>
    </head>
    <body>
        <?php
            echo $this->Form->create('Slmaster',array('type'=>'file','enctype' => 'multipart/form-data'));
            include_once('add_dropdown_logic.inc');
       
            $date_created = date("Y-m-d");
            
        ?>
        <span class='freetext'><?php echo "Date : ".$date_created; ?></span>
        <?php include_once('add_engineer_details.inc'); ?>
        <?php include_once('add_project_information.inc'); ?>
        <?php include_once('add_activity_information.inc'); ?>
	
		<fieldset>
			<legend><?php __('Attach Files'); ?></legend>
			<div id="add_files_sl">
				<?php
				if (!empty($this->data['Slfile'])):						
					$databaseFields->addFilesSl(count($this->data['Slfile']));
				else:
					$databaseFields->addFilesSl(1);
				endif;
			?>
			</div>
			
		<?php
			echo $this->Ajax->link("+", array('controller' => 'slmasters', 'action' => 'updater'), array("update" => "add_files_sl", "position" => "bottom", "style"=>"color:green;font-size:10px"));	
		?>
		</fieldset>		

        <?php //pr($this->validationErrors);   ?>
        <fieldset>
		<div class="submit">
                <input name="Email" type="submit" value="Submit without Email" />
        </div>
        <?php //echo $this->Form->end($options = array('name' => 'Email','label' => 'Submit without Email'));   ?>
        <?php echo $this->Form->end($options = array('name' => 'Email','label' => 'Submit with Email'));   ?>
        </fieldset>
    </body>
</html>