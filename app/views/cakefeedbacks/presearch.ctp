<html>
    <head>
            <li><?php echo $html->link("Back",array('action' => 'feedbackindex') ); ?>
           <h3><u><b>PQR - Feedback/Request Search</b></u></h3>
    </head>
    <?php
								
				$pagination = array(
							'10'=>'10',							
							'20'=>'20',							
							'25'=>'25',							
							'30'=>'30',							
							'35'=>'35',							
							'40'=>'40',
							'45'=>'45',
							'50'=>'50',							
							);
							
				
				
                echo $this->Form->create('Cakefeedback',array('action'=>'search'));
                echo $this->Form->input('id');
				echo $this->Form->input('signum');
				echo $this->Form->input('name');
                echo $this->Form->input('module', array('options' => $modules, 'empty'=>''));                
                echo $this->Form->input('category', array('options' => array('Request'=>'Request','Feedback'=>'Feedback'), 'empty'=>''));                
                echo $this->Form->input('priority', array('options' => array('1'=>'High','2'=>'Medium','3'=>'Low'), 'empty'=>''));                
                echo $this->Form->input('status', array('options' => array('0'=>'Pending','1'=>'Completed','2'=>'Completed'), 'empty'=>''));                          			           
				echo $this->Form->input('pagination_count', array('options' => $pagination, 'label' => 'Results Per Page'));  				           
				echo $datePicker->picker('From',array('READONLY'=>true));
				echo $datePicker->picker('To',array('READONLY'=>true));
    ?>
               
        <?php echo $this->Form->end(array("label" => 'Search'));?>
    </fieldset>
</html>
