<fieldset>
    <h4>Activity Information</h4>

	<?php
	$yes_no = array('Yes'=>'Yes','No'=>'No');
    echo $this->Form->input("activity_type", array( 'options' => $this->ntpdropdownLogics->getDropdown('activity_type',$dropdown_fields), 'label'=>'Activity Type', 'type'=>'select','empty'=>'', 'id' => 'activity_type') );
    echo $this->Form->input("issue", array( 'label'=>'Issue Faced' ,'type'=>'textarea' ) );    
	echo $this->Form->input("cause_of_the_problem", array( 'options' => $this->ntpdropdownLogics->getDropdown('cause_of_the_problem',$dropdown_fields), 'label'=>'Cause of the problem', 'type'=>'select','empty'=>'', 'id' => 'cause_of_the_problem') );
    echo $this->Form->input("solution", array( 'label'=>'Solution' ,'type'=>'textarea' ) );
	
	echo $this->Form->input("issue_resolved", array( 'options'=>$yes_no,'label'=>'Issue Resolved', 'type'=>'select','empty' =>'','id'=>'issue_resolved') );
	echo "<span id='issue_not_resolved_container'>";
		echo $this->Form->input("issue_not_resolved_reason", array( 'label'=>'Reason why issue was not resolved' ,'type'=>'textarea' ) );    
		echo $this->Form->input("escalated_to", array( 'options'=>$this->ntpdropdownLogics->getDropdown('escalated_to',$dropdown_fields),'label'=>'Escalated to', 'type'=>'select','empty' =>'') );
	echo "</span>";
	echo $this->Form->input("time_taken_for_activity", array( 'label'=>'Time Taken for activity', 'type'=>'text' ));
	echo $this->Form->input("comments", array( 'label'=>'Comments', 'type'=>'textarea' ) );   
	
    ?>
</fieldset>