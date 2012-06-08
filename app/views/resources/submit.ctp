<li id="backButton"><?php echo $this->Html->link(__('Back', true), array('controller' => 'resources', 'action' => 'add/'.$jobId."/".$taskId)); ?></li> 
<?php
  echo $html->css(array(  'snj/960'
                        , 'snj/snj'
                        , 'snj/redmond/jquery-ui-1.8.16.custom'
                       ));
  echo $javascript->link(array(  'snj/jquery-1.6.2.min'
                               , 'snj/jquery-ui-1.8.16.custom.min'
                               , 'snj/jquery.uiforms'
                              ));
?>
<?php 

    echo $javascript->link(array( 'gen_validatorv4.js', 'snj/jquery.uiforms' ));
	
	if ($flag == 0)
	{
		echo "ALL RESOURCES WERE SUCCESSFULLY SUBMITTED";
		
	}
	
	else
	{
		echo "ENTER YOUR COMMENTS HERE";
		
		echo $this->Form->create('resource');
		
		echo $this->Form->input('job_id', array ('type' => 'hidden', 'value' => $jobId));
		echo $this->Form->input('task_id', array ('type' => 'hidden', 'value' =>$taskId));
		
		echo $this->Form->input('approved', array ('type' => 'checkbox'));
		echo $this->Form->input('approval_comments', array ('label' => "Enter reason for MOP Risk level",'type' => 'textarea'));
                
		if ($flag == 2)
		{
			echo $this->Form->input('approval_comments_more', array ('label' => "Enter reason for more resources than expected",'type' => 'textarea'));
		}
		
		echo $this->Form->end('SUBMIT');
	}

?>	

<!--
<script type="text/javascript" language="javascript">
 var frmvalidator  = new Validator("resourceSubmitForm");
  frmvalidator.addValidation("resourceApprovalComments","required","You must enter the Approval Comments!");
  frmvalidator.addValidation("resourceApprovalCommentsMore","required","You must enter the Approval Comments!");
  
 
</script>

-->