<html>
    <head>
            <?php echo $html->link("Back",array('action' => 'index') ); ?>
           <h3><u><b>Script Load Reporting - Modify</b></u></h3>
    </head>
    <body>

        <?php echo $this->Form->create('Slmaster',array('action' => 'modify','enctype' => 'multipart/form-data')); ?>
        <?php

			$modify_fields = $modify_fields_full['Slmaster'];
            include_once('modify_check_rights.inc');
            include_once('modify_dropdown_logic.inc');

            $Today = date("Y-m-d");
            
        ?>
        <span class='freetext'><?php echo "Date : ".$Today; ?></span>
        <?php include_once('modify_report_details.inc'); ?>
        <?php include_once('modify_engineer_details.inc'); ?>
        <?php include_once('modify_project_information.inc'); ?>
        <?php include_once('modify_activity_information.inc'); ?>
		
		
		<fieldset>
			<legend><?php __('Attach Files'); ?></legend>						
			<div id="add_files_sl">
				<?php
				if (!empty($modify_fields_full['Slfile'])):
					$databaseFields->addFilesSl(count($modify_fields_full['Slfile']));	
				elseif(!empty($this->data['Slfile'])):
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
		
		

        <fieldset>
		<div class="submit">
                <input name="Email" type="submit" value="Update without Email" />
            </div>
        <?php //echo $this->Form->end($options = array('name' => 'Email','label' => 'Update without Email'));   ?>
        <?php echo $this->Form->end($options = array('name' => 'Email','label' => 'Update with Email'));   ?>
        </fieldset>
    </body>
</html>