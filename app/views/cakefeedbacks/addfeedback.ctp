
    <li><?php echo $html->link("Back",array('action' => 'feedbackindex') ); ?>
           <h3><u><b>PQR - Feedback/Request Form</b></u></h3>        
    </head>
	<fieldset>			
			<?php 
				echo $this->Form->create('Cakefeedback',array('onsubmit'=>'return validateFormFB_feedback()'));
				echo $this->Form->input("signum", array( 'READONLY' => true, 'value' => $signum, 'label'=>'Signum', 'type'=>'text') );
				echo $this->Form->input("name", array( 'READONLY' => true, 'value' => $name, 'label'=>'Name', 'type'=>'text') );
				echo $this->Form->input("module", array('options' => $modules, 'label'=>'Module', 'empty'=>'','type'=>'select') );
				echo $this->Form->input("category", array('options'=>array('Feedback'=>'Feedback','Request'=>'Request'),'empty'=>'','label'=>'Feedback or Request?', 'type'=>'select', 'id'=>'category'));
			?>			
			<div id = 'Div_feedback'>
				<?php echo $this->Form->input("notes_fb", array('label'=>'Feedback', 'type'=>'textarea', 'id'=>'notes_fb') ); ?>
			</div>
			<div id = 'Div_request'>
				<?php 
					echo $this->Form->input("notes_req", array('label'=>'Request', 'type'=>'textarea','id'=>'notes_req') ); 
					echo $this->Form->input("priority", array('options'=>array('1'=>'High','2'=>'Medium','3'=>'Low'),'empty'=>'','label'=>'Priority', 'type'=>'select'));
				?>				
			</div>
			<?php echo $this->Form->hidden("notes"); ?>
			<?php //echo $this->Form->hidden("feedback_number"); ?>
			<?php echo $this->Form->end(array("label" => 'Submit')); ?>
	</fieldset>
	